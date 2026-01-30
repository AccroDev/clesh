import { handleQuantityChange } from "./Handlers";

export const listeners = [
    {
        selector: '.js-qty-btn',
        callback: handleQuantityChange
    },
]

/**
 * Attache dynamiquement des événements à une liste de sélecteurs.
 * @param {Array} listeners - Tableau d'objets { selector, callback, event? }
 */
export const initEventListeners = (listeners) => {
    listeners.forEach(({ selector, callback, event = 'click' }) => {
        const elements = document.querySelectorAll(selector);

        if (elements.length === 0) {
            console.warn(`Élément non trouvé pour le sélecteur: ${selector}`);
            return;
        }
        elements.forEach(element => {
            element.addEventListener(event, (e) => {
                callback(e, element);
            });
        });
    });
};