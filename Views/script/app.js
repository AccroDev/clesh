import '../style/style.css'
import { adminAddComponents } from './adminAddComponents.js';

// On vérifie si le bouton existe
document.addEventListener('DOMContentLoaded', () => {
    const editBtn = document.querySelector('.edit_accrodev_page');
    if (editBtn) {
        editBtn.addEventListener('click', () => {
            import('./visualEditor.js')
                .then(module => module.initVisualEditor())
                .catch(err => console.error(err));
        });
    }

    adminAddComponents();
});


