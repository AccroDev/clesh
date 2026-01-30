<?php

use Controllers\ProductController;

$allProducts = ProductController::listProducts();
$selectedItems =isset($_GET["selected"]) ? $_GET["selected"] : null;
?>
<!-- Right: Product Table (Wider) -->
<div class="flex-1 bg-white dark:bg-[#1c140d] rounded-xl border border-[#e6e0db] dark:border-white/10 overflow-hidden shadow-sm order-2 lg:order-2">
    <div class="p-4 border-b border-[#e6e0db] dark:border-white/10 flex flex-col sm:flex-row justify-between items-center gap-4">
        <div class="relative w-full sm:max-w-xs">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[#897261]">search</span>
            <input class="w-full pl-10 h-10 rounded-lg border-[#e6e0db] dark:border-white/10 bg-background-light dark:bg-background-dark text-sm focus:border-primary focus:ring-primary" placeholder="Filter products..." type="text" />
        </div>
        <div class="flex gap-2 w-full sm:w-auto">
            <button class="flex items-center gap-2 px-3 h-10 border border-[#e6e0db] dark:border-white/10 rounded-lg text-sm font-medium hover:bg-background-light dark:hover:bg-background-dark">
                <span class="material-symbols-outlined">filter_list</span>
                Filter
            </button>
            <button class="flex items-center gap-2 px-3 h-10 border border-[#e6e0db] dark:border-white/10 rounded-lg text-sm font-medium hover:bg-background-light dark:hover:bg-background-dark">
                <span class="material-symbols-outlined">download</span>
                Export
            </button>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-background-light/50 dark:bg-background-dark/50">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold text-[#897261] uppercase tracking-wider"></th>
                    <th class="px-6 py-4 text-xs font-bold text-[#897261] uppercase tracking-wider">Product Name</th>
                    <th class="px-6 py-4 text-xs font-bold text-[#897261] uppercase tracking-wider">Category</th>
                    <th class="px-6 py-4 text-xs font-bold text-[#897261] uppercase tracking-wider">Price</th>
                    <th class="px-6 py-4 text-xs font-bold text-[#897261] uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#e6e0db] dark:divide-white/10">
                <?php foreach ($allProducts as $key => $product):
                    // On vérifie si l'ID actuel correspond à celui dans l'URL
                    $isActive = (isset($_GET['selected']) && $_GET['selected'] == $product["id"]);
                ?>
                    <tr class="js_product_item cursor-pointer transition-colors group <?= $isActive ? 'bg-primary/10 dark:bg-primary/5 border-l-4 border-l-primary' : 'hover:bg-primary/5' ?>"
                        data-id="<?= $product["id"] ?>">

                        <td class="px-6 py-4">
                            <input class="text-primary focus:ring-primary"
                                name="product-select"
                                type="radio"
                                <?= $isActive ? 'checked' : '' ?> />
                        </td>

                        <td class="px-6 py-4 <?= $isActive ? 'font-bold text-primary' : 'font-medium' ?>">
                            <?= htmlspecialchars($product["nom"]) ?>
                        </td>

                        <td class="px-6 py-4 text-[#897261]">
                            <?= htmlspecialchars($product["categorie"] ?? 'Home & Living') ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= $product["devise"] . ' ' . number_format($product["prix"], 2) ?>
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-full text-[11px] font-bold uppercase <?= $key % 2 === 0 ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' ?>">
                                <?= $key % 2 === 0 ? 'In Stock' : 'Low Stock' ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>