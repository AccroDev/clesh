<?php
use Controllers\PanierController;

// Récupération des données dynamiques
$cart = PanierController::getCartDetails();
$items = $cart['items'] ?? [];
$totalCount = count($items);
$devise = $cart['devise'] ?? '$';
$subtotal = $cart['total_amount'] ?? 0;

// Simulation de frais (tu pourras les dynamiser plus tard)
$shipping = $totalCount > 0 ? 15.00 : 0;
$tax = $subtotal * 0.05; // Exemple 5%
$grandTotal = $subtotal + $shipping + $tax;
?>

<main class="flex-1 px-6 lg:px-20 py-10">
    <div class="max-w-[1200px] mx-auto grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">
        <div class="lg:col-span-2 flex flex-col gap-6">
            <div class="flex flex-wrap justify-between items-end gap-3 pb-4">
                <div class="flex flex-col gap-2">
                    <h1 class="text-[#181411] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Your Shopping Bag</h1>
                    <p class="text-[#897261] dark:text-[#a59182] text-base font-normal">
                        <?= $totalCount ?> <?= $totalCount > 1 ? 'items' : 'item' ?> in your cart
                    </p>
                </div>
                <a class="text-primary text-sm font-bold underline hover:no-underline" href="/products">Continue Shopping</a>
            </div>

            <div class="@container">
                <div class="overflow-hidden rounded-xl border border-[#e6e0db] dark:border-[#3d2e24] bg-white dark:bg-[#2d2118]">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white dark:bg-[#2d2118] border-b border-[#e6e0db] dark:border-[#3d2e24]">
                                <th class="px-6 py-4 text-[#181411] dark:text-white text-xs font-bold uppercase tracking-wider">Product</th>
                                <th class="px-6 py-4 text-[#181411] dark:text-white text-xs font-bold uppercase tracking-wider hidden sm:table-cell text-center">Quantity</th>
                                <th class="px-6 py-4 text-[#181411] dark:text-white text-xs font-bold uppercase tracking-wider text-right">Price</th>
                                <th class="px-6 py-4 text-[#897261] dark:text-[#a59182] text-xs font-bold uppercase tracking-wider text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#e6e0db] dark:divide-[#3d2e24]">
                            <?php if ($totalCount > 0): ?>
                                <?php foreach ($items as $item): ?>
                                    <tr class="group hover:bg-background-light dark:hover:bg-[#352a22] transition-colors" data-cart-item="<?= $item['product_id'] ?>">
                                        <td class="px-6 py-6">
                                            <div class="flex items-center gap-4">
                                                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg w-20 h-20 shadow-sm border border-[#e6e0db] dark:border-[#3d2e24]" 
                                                    style='background-image: url("<?= $item['image'] ?: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBlnGTYBqMi_jX12LH6cYiYPt7YUi1APQvsqbwpTvIqTCuwUo9QH9ENJsZX1ARogJsxxjo75l6or8t7OQ4QhInIL3zG8OuYen2aHcKJTpGuZeXjgH16uGv87ZlqG-EHePzTGBPffKHpaG0IVGN-KH0eRUeXlMDqIhPr3eKjCNyWoZ2JqpTm4ocWwPpZLb5-R-qT6itF4-UMImqjhTljlrIfnXJPyl0z2fkGNaYYZAm855Bm3pRGW8r5f40Yf0ftXZqtRSNYIcg0xgY2' ?>");'>
                                                </div>
                                                <div class="flex flex-col">
                                                    <span class="text-[#181411] dark:text-white font-bold text-sm line-clamp-1"><?= htmlspecialchars($item['nom']) ?></span>
                                                    <span class="text-[#897261] dark:text-[#a59182] text-xs"><?= htmlspecialchars($item['categorie']) ?></span>
                                                    
                                                    <div class="js-loader hidden items-center gap-1.5 mt-1">
                                                        <div class="w-3 h-3 border-2 border-primary border-t-transparent rounded-full animate-spin"></div>
                                                        <span class="text-[10px] text-primary font-medium">Modification en cours...</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6 hidden sm:table-cell">
                                            <div class="flex items-center border border-[#e6e0db] dark:border-[#4d3b2e] rounded-lg w-fit mx-auto bg-white dark:bg-[#221810]">
                                                <button class="px-3 py-1 hover:text-primary transition-colors js-qty-btn" data-action="minus" data-id="<?= $item['product_id'] ?>">-</button>
                                                <span class="js-qty-display px-3 py-1 text-sm font-medium border-x border-[#e6e0db] dark:border-[#4d3b2e] min-w-[40px] text-center">
                                                    <?= $item['quantite'] ?>
                                                </span>
                                                <button class="px-3 py-1 hover:text-primary transition-colors js-qty-btn" data-action="plus" data-id="<?= $item['product_id'] ?>">+</button>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6 text-[#181411] dark:text-white font-bold text-sm text-right js-item-subtotal">
                                            <?= $devise . number_format($item['sous_total'], 2) ?>
                                        </td>
                                        <td class="px-6 py-6 text-right">
                                            <button class="text-[#897261] hover:text-red-500 transition-colors js-delete-btn" data-id="<?= $item['product_id'] ?>">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="px-6 py-20 text-center text-[#897261]">
                                        Your bag is empty. <a href="/products" class="text-primary underline">Start shopping</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <aside class="flex flex-col gap-6 lg:sticky lg:top-24">
            <div class="rounded-xl border border-[#e6e0db] dark:border-[#3d2e24] bg-white dark:bg-[#2d2118] p-6 shadow-sm">
                <h2 class="text-[#181411] dark:text-white text-xl font-bold leading-tight tracking-[-0.015em] pb-6 border-b border-[#f4f2f0] dark:border-[#3d2e24]">Order Summary</h2>
                <div class="py-4 space-y-4">
                    <div class="flex justify-between items-center">
                        <p class="text-[#897261] dark:text-[#a59182] text-sm font-normal">Subtotal</p>
                        <p class="text-[#181411] dark:text-white text-sm font-bold"><?= $devise . number_format($subtotal, 2) ?></p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-[#897261] dark:text-[#a59182] text-sm font-normal">Estimated Shipping</p>
                        <p class="text-[#181411] dark:text-white text-sm font-bold"><?= $devise . number_format($shipping, 2) ?></p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-[#897261] dark:text-[#a59182] text-sm font-normal">Estimated Tax</p>
                        <p class="text-[#181411] dark:text-white text-sm font-bold"><?= $devise . number_format($tax, 2) ?></p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#f4f2f0] dark:border-[#3d2e24] flex justify-between items-center">
                        <p class="text-[#181411] dark:text-white text-lg font-black">Total</p>
                        <p class="text-primary text-2xl font-black js_total_cart"><?= $devise . number_format($grandTotal, 2) ?></p>
                    </div>
                </div>
                <button class="w-full mt-4 flex items-center justify-center gap-2 cursor-pointer rounded-lg h-12 bg-primary text-white text-base font-bold hover:bg-opacity-90 transition-all shadow-lg shadow-primary/20 disabled:opacity-50 disabled:cursor-not-allowed" <?= $totalCount === 0 ? 'disabled' : '' ?>>
                    <span>Proceed to Checkout</span>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
                <div class="mt-6 flex items-center justify-center gap-2 text-[#897261] dark:text-[#a59182] text-xs">
                    <span class="material-symbols-outlined text-[16px]">lock</span>
                    <span>Secure SSL Encrypted Checkout</span>
                </div>
            </div>

            <div class="rounded-xl bg-primary/10 dark:bg-primary/5 p-4 border border-primary/20">
                <p class="text-primary font-bold text-sm mb-1">Promo Code?</p>
                <div class="flex gap-2">
                    <input class="form-input flex-1 rounded-lg border-[#e6e0db] dark:border-[#3d2e24] bg-white dark:bg-[#221810] text-sm focus:ring-primary focus:border-primary px-3 py-2" placeholder="Enter code" />
                    <button class="px-4 py-2 bg-white dark:bg-[#3d2e24] text-[#181411] dark:text-white text-xs font-bold rounded-lg border border-[#e6e0db] dark:border-[#3d2e24] hover:bg-gray-50 dark:hover:bg-[#4d3b2e] transition-colors">Apply</button>
                </div>
            </div>
        </aside>
    </div>
</main>