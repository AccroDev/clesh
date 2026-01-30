const fieldTypes = {
    'Text': {
        icon: 'match_case',
        props: ['label', 'name', 'default', 'multiline']
    },
    'HTMLText': {
        icon: 'code_blocks',
        props: ['label', 'name', 'multiline', 'allowHeadings', 'default', 'defaultAlign', 'textColor', "backgroundColor"]
    },
    'Number': {
        icon: 'pin',
        props: ['label', 'name', 'default', 'help']
    },
    'Range': {
        icon: 'tune',
        props: ['label', 'name', 'default', 'min', 'max', 'step']
    },
    'Select': {
        icon: 'list',
        props: ['label', 'name', 'options', 'default']
    },
    'Checkbox': {
        icon: 'check_box',
        props: ['label', 'name', 'default']
    },
    'Color': {
        icon: 'palette',
        props: ['label', 'name', 'default']
    },
    'Image': {
        icon: 'image',
        props: ['label', 'name', 'default']
    },
    'ImageUrl': {
        icon: 'link',
        props: ['label', 'name', 'placeholder']
    },
    'DatePicker': {
        icon: 'calendar_month',
        props: ['label', 'name', 'format']
    },
    'Repeater': {
        icon: 'reorder',
        props: ['label', 'name', 'addLabel', 'min', 'max', 'fields', 'collapsed']
    },
    'Alignment': {
        icon: 'format_align_center',
        props: ['label', 'name', 'default']
    },
    'TextAlign': {
        icon: 'format_align_left',
        props: ['label', 'name', 'default']
    },
    'Row': {
        icon: 'view_column',
        props: ['label', 'name']
    }
};
let schemaFields = [];
let currentTargetFieldPath = null;
let collapsedPaths = new Set(); // Pour stocker l'état déplié/replié

const getObjectByPath = (obj, path) => {
    return path.split('.').reduce((prev, curr) => prev && prev[curr], obj);
};

export const initSchemaBuilder = () => {
    const root = document.getElementById('schema-builder-root');
    if (!root) return;

    const addBtn = document.getElementById('add-field-btn');
    const modal = document.getElementById('type-modal');
    const typeGrid = document.getElementById('type-grid');

    // 1. Générer la grille de types
    typeGrid.innerHTML = '';
    Object.keys(fieldTypes).forEach(type => {
        const btn = document.createElement('button');
        btn.type = "button";
        btn.className = "flex items-center gap-3 p-3 rounded-lg border border-slate-100 hover:border-indigo-500 hover:bg-indigo-50 transition-all text-left";
        btn.innerHTML = `
            <span class="material-symbols-outlined text-slate-400">${fieldTypes[type].icon}</span>
            <span class="text-xs font-bold text-slate-700">${type}</span>
        `;
        btn.addEventListener('click', () => addField(type));
        typeGrid.appendChild(btn);
    });

    // 2. Événements
    addBtn.addEventListener('click', () => {
        currentTargetFieldPath = null;
        modal.classList.remove('hidden');
    });

    root.addEventListener('click', (e) => {
        const deleteBtn = e.target.closest('.js-remove-field');
        if (deleteBtn) removeField(deleteBtn.dataset.path);

        const subBtn = e.target.closest('.js-add-subfield');
        if (subBtn) {
            currentTargetFieldPath = subBtn.dataset.path;
            modal.classList.remove('hidden');
        }

        // Logique de Toggle (Plier/Déplier)
        const toggleBtn = e.target.closest('.js-toggle-collapse');
        if (toggleBtn) {
            const path = toggleBtn.dataset.path;
            if (collapsedPaths.has(path)) collapsedPaths.delete(path);
            else collapsedPaths.add(path);
            renderFields();
        }
    });

    root.addEventListener('input', (e) => {
        const input = e.target.closest('.js-field-input');
        if (input) {
            updateFieldProperty(input.dataset.path, input.dataset.prop, input.value);
        }
    });
};

/**
 * Transforme le schéma visuel en JSON propre pour le textarea
 */
const syncToTextarea = () => {
    const cleanSchema = JSON.parse(JSON.stringify(schemaFields));

    const process = (fields) => {
        fields.forEach(f => {
            // Transformation de la chaîne "Label:val, Label2:val2" en [{label, value}]
            if (f.type === 'Select' && typeof f.options === 'string' && f.options.trim() !== "") {
                f.options = f.options.split(',').map(opt => {
                    const [l, v] = opt.split(':').map(s => s.trim());
                    return { label: l || v, value: v || l };
                });
            }
            if (f.type === 'Repeater' && f.fields) process(f.fields);
        });
    };

    process(cleanSchema);
    document.getElementById('final-json-output').value = JSON.stringify(cleanSchema);
};

const addField = (type) => {
    const newField = { type: type };
    fieldTypes[type].props.forEach(p => { newField[p] = (p === 'fields') ? [] : ""; });

    if (currentTargetFieldPath === null) schemaFields.push(newField);
    else {
        const parent = getObjectByPath(schemaFields, currentTargetFieldPath);
        parent.fields.push(newField);
    }
    renderFields();
    document.getElementById('type-modal').classList.add('hidden');
};

const removeField = (path) => {
    const parts = path.split('.');
    const index = parts.pop();
    const parentPath = parts.join('.');
    if (parentPath === "") schemaFields.splice(index, 1);
    else getObjectByPath(schemaFields, parentPath).fields.splice(index, 1);
    renderFields();
};

const updateFieldProperty = (path, prop, value) => {
    const field = getObjectByPath(schemaFields, path);
    field[prop] = value;
    syncToTextarea();
};

const renderFields = () => {
    const container = document.getElementById('fields-container');

    const buildHTML = (fields, path = "") => {
        return fields.map((field, index) => {
            const currentPath = path === "" ? `${index}` : `${path}.fields.${index}`;
            const isCollapsed = collapsedPaths.has(currentPath);
            const isRepeater = field.type === 'Repeater';

            return `
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm mb-4 overflow-hidden animate-in slide-in-from-top-1">
                    <div class="bg-slate-50/50 p-3 border-b border-slate-100 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <button type="button" data-path="${currentPath}" class="js-remove-field text-slate-400 hover:text-red-500 transition-colors">
                                <span class="material-symbols-outlined text-lg">delete</span>
                            </button>
                            <span class="material-symbols-outlined text-indigo-500 text-sm">${fieldTypes[field.type]?.icon}</span>
                            <span class="text-[11px] font-black uppercase text-slate-700">${field.type}</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-[10px] font-mono text-slate-300 font-bold">#${index + 1}</span>
                            <button type="button" data-path="${currentPath}" class="js-toggle-collapse text-slate-400 hover:text-indigo-600 transition-transform ${isCollapsed ? '' : 'rotate-180'}">
                                <span class="material-symbols-outlined">keyboard_arrow_down</span>
                            </button>
                        </div>
                    </div>

                    <div class="${isCollapsed ? 'hidden' : 'p-4 space-y-4'}">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            ${fieldTypes[field.type].props.map(prop => {
                if (prop === 'fields') return '';
                const isSelectOpt = field.type === 'Select' && prop === 'options';
                return `
                                    <div class="flex flex-col gap-1">
                                        <div class="flex justify-between items-center">
                                            <label class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">${prop}</label>
                                            ${isSelectOpt ? '<span class="text-[8px] bg-indigo-50 text-indigo-500 px-1 rounded font-bold">Label:valeur, ...</span>' : ''}
                                        </div>
                                        <input type="text" data-path="${currentPath}" data-prop="${prop}" value="${field[prop] || ''}" 
                                            class="js-field-input px-3 py-2 text-sm bg-slate-50 border border-slate-200 rounded-lg outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all">
                                    </div>
                                `;
            }).join('')}
                        </div>

                        ${isRepeater ? `
                            <div class="mt-4 p-4 bg-slate-50 rounded-xl border border-dashed border-slate-200">
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-[10px] font-black text-slate-400 uppercase italic">Champs du Repeater</span>
                                    <button type="button" data-path="${currentPath}" class="js-add-subfield flex items-center gap-1 text-[10px] font-bold text-indigo-600 bg-white border border-indigo-100 px-2 py-1 rounded hover:shadow-sm">
                                        <span class="material-symbols-outlined text-sm">add</span> AJOUTER
                                    </button>
                                </div>
                                <div class="space-y-2 pl-2 border-l-2 border-slate-200">
                                    ${buildHTML(field.fields || [], currentPath)}
                                </div>
                            </div>
                        ` : ''}
                    </div>
                </div>`;
        }).join('');
    };

    container.innerHTML = buildHTML(schemaFields);
    syncToTextarea();
};