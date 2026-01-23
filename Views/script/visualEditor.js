import {
    VisualEditor, Text, HTMLText, Select, Checkbox, Color,
    Number as NumberField, Range, ImageUrl, DatePicker,
    Repeater, Row, Tabs, Alignment, TextAlign
} from "@boxraiser/visual-editor";

/**
 * Mappage des noms de types provenant de la BDD vers les classes de l'éditeur
 */
const FIELD_MAP = {
    'Text': Text,
    'HTMLText': HTMLText,
    'Select': Select,
    'Checkbox': Checkbox,
    'Color': Color,
    'Repeater': Repeater,
    'Row': Row,
    'Number': NumberField,
    'Range': Range,
    'ImageUrl': ImageUrl,
    'Image': ImageUrl, // Support des deux noms au cas où
    'DatePicker': DatePicker,
    'Tabs': Tabs,
    'Alignment': Alignment,
    'TextAlign': TextAlign
};

/**
 * Transforme récursivement le JSON de la BDD en instances de champs pour l'éditeur
 */
function mapFields(fieldsJson) {
    if (!fieldsJson) return [];
    return fieldsJson.map(field => {
        const FieldClass = FIELD_MAP[field.type];
        if (!FieldClass) {
            console.warn(`Type de champ inconnu: ${field.type}`);
            return null;
        }

        const { name, type, fields, ...options } = field;

        // Gestion récursive pour les lignes (Row)
        if (type === 'Row' && fields) {
            return FieldClass(mapFields(fields));
        }

        // Gestion récursive pour les répéteurs (Repeater)
        if (type === 'Repeater' && fields) {
            options.fields = mapFields(fields);
        }

        return FieldClass(name, options);
    }).filter(f => f !== null);
}

// --- État persistant du module ---
let editorInstance = null;
let cachedComponents = null; // Stocke la structure des composants pour éviter les fetch inutiles

/**
 * Fonction principale pour ouvrir et gérer l'éditeur
 */
export async function openVisualEditor(pageId, initialContent) {

    // 1. Initialiser l'instance et définir le Custom Element (Une seule fois à vie)
    if (!editorInstance) {
        editorInstance = new VisualEditor({});
        if (!customElements.get('visual-editor')) {
            editorInstance.defineElement();
        }
    }

    // 2. Nettoyage : On supprime l'ancien tag s'il existe pour éviter les conflits React
    const oldTag = document.querySelector('visual-editor');
    if (oldTag) {
        oldTag.remove();
    }

    // 3. Création d'un nouvel élément DOM vierge
    const editorTag = document.createElement('visual-editor');
    editorTag.setAttribute('id', 'editor');
    editorTag.setAttribute('name', 'content');
    editorTag.setAttribute('preview', '/preview');
    editorTag.setAttribute('iconsUrl', '/assets/editor/[name].svg');
    editorTag.setAttribute('insertPosition', 'end');
    editorTag.setAttribute('value', initialContent);

    // Création d'un formulaire invisible pour emballer l'éditeur
    const form = document.createElement('form');
    form.id = 've-save-form';

    // Écouteur de fermeture : on détruit l'élément pour libérer la mémoire et React
    editorTag.addEventListener('close', () => {
        updateBtnState("close", "")
        editorTag.remove();
    });

    // 4. Chargement des composants (Utilise le cache si disponible)
    if (!cachedComponents) {
        try {
            const response = await fetch('/admin/components/get', { method: 'POST' });
            if (response.ok) {
                cachedComponents = await response.json();
            } else {
                console.error('Erreur serveur lors de la récupération des composants');
            }
        } catch (err) {
            console.error('Erreur réseau lors du chargement des composants:', err);
        }
    }

    // 5. Enregistrement des composants dans l'instance
    if (cachedComponents) {
        cachedComponents.forEach(config => {
            editorInstance.registerComponent(config.name, {
                title: config.title,
                category: config.category,
                fields: mapFields(config.fields)
            });
        });
    }



    // 6. Injection dans le DOM (Déclenche le rendu React interne)
    form.appendChild(editorTag);
    document.body.appendChild(form);
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const content = editorTag.value;
        updateBtnState("beforesubmit", "Encours d'envoie...")

        const response = await fetch('/admin/pages/update-content', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                pageId,
                content
            })
        });

        if (response.ok) {
            alert('Page mise à jour !');
        }
        updateBtnState("submit", "Modification Effectué")
    });
    return editorTag;
}

/**
 * Modifier l'etat du button editer
 * @param {"close" | "beforesubmit" | "submit" | "loading" | "editing"} state
 * @param {string} message 
 */
export function updateBtnState(state, message) {
    const editBtn = document.querySelector('#edit_accrodev_page');
    if (!editBtn) return;

    // Base du bouton avec transitions et flou de fond (backdrop-blur)
    editBtn.className = "fixed bottom-6 right-6 flex items-center gap-3 px-6 py-3 rounded-full shadow-2xl transition-all duration-500 transform active:scale-95 z-[99999999] text-white font-medium backdrop-blur-sm";

    let icon;
    let span = createElement("span", "text-sm tracking-wide");
    span.innerHTML = message;

    switch (state) {
        case 'editing':
            editBtn.classList.add('hidden');
            break;

        case 'close':
            icon = createElement("i", 'fas fa-edit text-lg');
            break;

        case 'loading':
            icon = createElement("span", 'w-5 h-5 border-2 border-white/30 border-t-white rounded-full animate-spin');
            break;

        case 'beforesubmit':
            icon = createElement("i", 'fas fa-save text-lg');
            break;

        case 'submit':
            icon = createElement("i", 'fas fa-check-double text-lg');
            setTimeout(() => updateBtnState('editing', ''), 3000);
            break;
    }

    // Reconstruction du bouton
    editBtn.innerHTML = "";
    editBtn.append(icon);
    if (message) editBtn.append(span);
}

/**
 * Crée un élément DOM avec des classes
 * @param {string} tagName - Le nom de la balise (ex: 'div', 'button', 'i')
 * @param {string|string[]} classes - Une chaîne de caractères ou un tableau de classes
 * @returns {HTMLElement}
 */
export function createElement(tagName, classes = []) {
    const el = document.createElement(tagName);

    if (classes) {
        // Si c'est une string avec des espaces (ex: "bg-red text-white"), on split
        if (typeof classes === 'string') {
            const classList = classes.split(' ').filter(c => c.trim() !== '');
            el.classList.add(...classList);
        }
        // Si c'est déjà un tableau
        else if (Array.isArray(classes)) {
            el.classList.add(...classes);
        }
    }

    return el;
}