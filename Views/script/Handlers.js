const qtyTimers = {}; // Stocke les timeouts par ID produit

export const handleQuantityChange = (e, btn) => {
    const id = btn.dataset.id;
    const action = btn.dataset.action;
    const row = btn.closest('[data-cart-item]');
    const display = row.querySelector('.js-qty-display');
    const loader = row.querySelector('.js-loader');

    // 1. Mise à jour immédiate de l'UI (visuel seulement)
    let currentQty = parseInt(display.innerText);
    currentQty = (action === 'plus') ? currentQty + 1 : Math.max(1, currentQty - 1);
    display.innerText = currentQty;

    // 2. Afficher le petit loader "Modification en cours"
    loader.classList.remove('hidden');
    loader.classList.add('flex');

    // 3. Logique de Debounce (on attend 2 secondes d'inactivité avant d'envoyer)
    // J'ai mis 2000ms au lieu de 10s car 10s est très long pour un user, mais tu peux changer.
    clearTimeout(qtyTimers[id]);

    qtyTimers[id] = setTimeout(async () => {
        try {
            const response = await fetch('/cart/update', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ product_id: id, quantity: currentQty })
            });
            const result = await response.json();

            if (result.success) {
                const totalElements = document.querySelectorAll('.js_total_cart');
                const devise = "$";
                totalElements.forEach(el => {
                    const formattedTotal = parseFloat(result.new_total).toLocaleString('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                    el.innerText = `${devise}${formattedTotal}`;
                });
            }
        } catch (error) {
            console.error("Erreur mise à jour panier", error);
        } finally {
            // Cacher le loader après la réponse
            loader.classList.add('hidden');
            loader.classList.remove('flex');
        }
    }, 2000);
};