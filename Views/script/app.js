import '../style/style.css'
import { initPageForm } from './pageManager.js';
import { updateBtnState } from './visualEditor.js';
import { listeners, initEventListeners } from './Helpers.js';
import { initSchemaBuilder } from './SchemaComponentBuilder.js';

document.addEventListener('DOMContentLoaded', () => {
    const editBtn = document.querySelector('#edit_accrodev_page');
    if (editBtn) {
        editBtn.addEventListener('click', async () => {
            const pageId = editBtn.dataset.page_id;

            try {
                updateBtnState("loading", "chargement des contenu")
                const response = await fetch(`/admin/pages/get-content?id=${pageId}`);
                const data = await response.json();
                const initialContent = data.contenue || '[]';

                updateBtnState("loading", "chargement de l'editeur")
                const { openVisualEditor } = await import('./visualEditor.js');
                await openVisualEditor(pageId, initialContent);
                updateBtnState("editing", "Edition")

            } catch (err) {
                console.error("Erreur lors du chargement de l'éditeur:", err);
            }
        });
    }
    initPageForm()

    document.querySelectorAll('.image-preview-input').forEach(input => {
        input.addEventListener('change', function () {
            const targetId = this.getAttribute('data-target');
            const previewContainer = document.getElementById(targetId);
            const file = this.files[0];

            if (file && previewContainer) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewContainer.innerHTML = `<img src="${e.target.result}" class="h-full w-full object-cover" />`;
                }
                reader.readAsDataURL(file);
            }
        });
    });


    // alert system 
    const toast = document.getElementById('status-toast');
    const closeBtn = document.getElementById('close-toast');
    if (toast) {
        setTimeout(() => {
            toast.classList.remove('translate-y-10', 'opacity-0');
        }, 100);

        // Fermeture manuelle
        closeBtn?.addEventListener('click', () => {
            hideToast(toast);
        });

        // Auto-fermeture après 5s
        setTimeout(() => {
            hideToast(toast);
        }, 5000);
    }

    function hideToast(el) {
        el.classList.add('opacity-0', 'translate-y-10');
        setTimeout(() => el.remove(), 500);
    }

    //admin

    const productItems = document.querySelectorAll('.js_product_item');

    productItems.forEach(item => {
        // Optionnel : On ajoute un curseur pointer pour l'UX
        item.style.cursor = 'pointer';

        item.addEventListener('click', function (e) {
            // Empêcher la redirection si on clique sur un bouton d'action (edit/delete)
            if (e.target.closest('button') || e.target.closest('a')) {
                return;
            }

            const productId = this.getAttribute('data-id');

            if (productId) {
                // 2. On récupère l'URL actuelle
                const currentUrl = new URL(window.location.href);

                // 3. On met à jour le paramètre 'selected' 
                currentUrl.searchParams.set('selected', productId);

                // 4. Redirection vers la nouvelle URL
                window.location.href = currentUrl.toString();
            }
        });
    });

    initEventListeners(listeners)
    initSchemaBuilder();
});