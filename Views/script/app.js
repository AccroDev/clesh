import '../style/style.css'
import { initPageForm } from './pageManager.js';
import { updateBtnState } from './visualEditor.js';

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
});