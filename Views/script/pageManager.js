export function initPageForm() {
    const form = document.querySelector('#page-creation-form');
    if (!form) return;

    const routeInput = document.getElementById('route-input');
    const parentSelect = document.getElementById('parent_group');
    const prefixDisplay = document.getElementById('prefix-display');
    const submitBtn = document.getElementById('submit-btn');
    const btnSpinner = document.getElementById('btn-spinner');
    const btnText = document.getElementById('btn-text');

    // 1. Toggle visuel (Unique vs Group)
    form.querySelectorAll('input[name="structure_type"]').forEach(input => {
        input.addEventListener('change', (e) => {
            const isGroup = e.target.value === 'group';
            document.getElementById('route-label').innerText = isGroup ? "Pattern de Groupe" : "Route (Slug)";
            routeInput.placeholder = isGroup ? "[slug:*]-[id:i]" : "ma-page-unique";

            // Mise à jour visuelle des bordures des cartes
            document.getElementById('option-unique').className = `relative flex cursor-pointer rounded-xl border bg-white p-5 shadow-sm focus:outline-none ${!isGroup ? 'border-indigo-200 ring-2 ring-indigo-500' : 'border-slate-200'}`;
            document.getElementById('option-group').className = `relative flex cursor-pointer rounded-xl border bg-white p-5 shadow-sm focus:outline-none ${isGroup ? 'border-indigo-200 ring-2 ring-indigo-500' : 'border-slate-200'}`;
        });
    });

    // 2. Préfixe et nettoyage automatique du slug
    parentSelect.addEventListener('change', () => {
        prefixDisplay.innerText = parentSelect.value ? `/${parentSelect.value}/` : '/';
    });

    routeInput.addEventListener('input', (e) => {
        const isGroup = form.querySelector('input[name="structure_type"]:checked').value === 'group';
        if (!isGroup) {
            e.target.value = e.target.value.replace(/\s+/g, '-').toLowerCase();
        }
    });

    // 3. Validation et Envoi
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        let hasError = false;
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        // Reset Errors
        form.querySelectorAll('.error-msg').forEach(el => el.classList.add('hidden'));
        form.querySelectorAll('input, textarea').forEach(el => el.classList.remove('border-red-500', 'ring-1', 'ring-red-500'));

        const showError = (fieldId, msg) => {
            const field = document.getElementById(fieldId);
            field.classList.add('border-red-500', 'ring-1', 'ring-red-500');
            const msgContainer = field.parentElement.querySelector('.error-msg');
            if (msgContainer) {
                msgContainer.innerText = msg;
                msgContainer.classList.remove('hidden');
            }
            hasError = true;
        };

        // Verification logic
        if (!data.title.trim()) showError('title', "Le titre est obligatoire");
        if (!data.description.trim()) showError('description', "La description SEO est obligatoire");

        if (data.structure_type === 'unique') {
            if (!data.route.trim()) showError('route-input', "La route est obligatoire");
            if (/\s/.test(data.route)) showError('route-input', "La route ne doit pas contenir d'espaces");
        } else {
            if (!data.route.trim()) showError('route-input', "Le pattern est obligatoire");
        }

        if (hasError) return;

        // Start Loading
        submitBtn.disabled = true;
        btnSpinner.classList.remove('hidden');
        btnText.innerText = "Traitement...";
        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
                window.location.href = result.redirect || '/admin/pages';
            } else {
                alert(result.error || "Une erreur est survenue");
            }
        } catch (err) {
            console.error(err);
            alert("Erreur réseau");
        } finally {
            submitBtn.disabled = false;
            btnSpinner.classList.add('hidden');
            btnText.innerText = "Enregistrer la page";
        }
    });
}