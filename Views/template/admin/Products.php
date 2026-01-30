<?php

use Models\Getter;

$selectedItem = Getter::get("produits",isset($_GET["selected"])  ? [
    "id" =>  $_GET["selected"]
] : []); 
?>
<main class="flex-1 overflow-y-auto px-4 lg:px-40 py-8">
    <!-- KPI Section -->
    <div class="flex flex-wrap gap-4 mb-8">
        <div class="flex min-w-[200px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#e6e0db] dark:border-white/10 bg-white dark:bg-[#1c140d] shadow-sm">
            <div class="flex items-center justify-between">
                <p class="text-[#897261] text-sm font-medium leading-normal uppercase tracking-wider">Total Products</p>
                <span class="material-symbols-outlined text-primary bg-primary/10 p-2 rounded-lg">inventory_2</span>
            </div>
            <p class="text-[#181411] dark:text-white tracking-tight text-3xl font-bold leading-tight">1,248</p>
            <div class="flex items-center gap-1">
                <span class="material-symbols-outlined text-green-600 text-sm">trending_up</span>
                <p class="text-green-600 text-sm font-semibold">+2.4% <span class="text-[#897261] font-normal">vs last month</span></p>
            </div>
        </div>
        <div class="flex min-w-[200px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#e6e0db] dark:border-white/10 bg-white dark:bg-[#1c140d] shadow-sm">
            <div class="flex items-center justify-between">
                <p class="text-[#897261] text-sm font-medium leading-normal uppercase tracking-wider">Out of Stock</p>
                <span class="material-symbols-outlined text-red-600 bg-red-600/10 p-2 rounded-lg">warning</span>
            </div>
            <p class="text-[#181411] dark:text-white tracking-tight text-3xl font-bold leading-tight">12</p>
            <div class="flex items-center gap-1">
                <span class="material-symbols-outlined text-red-600 text-sm">trending_down</span>
                <p class="text-red-600 text-sm font-semibold">-5.1% <span class="text-[#897261] font-normal">critical items</span></p>
            </div>
        </div>
        <div class="flex min-w-[200px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#e6e0db] dark:border-white/10 bg-white dark:bg-[#1c140d] shadow-sm">
            <div class="flex items-center justify-between">
                <p class="text-[#897261] text-sm font-medium leading-normal uppercase tracking-wider">Total Categories</p>
                <span class="material-symbols-outlined text-primary bg-primary/10 p-2 rounded-lg">category</span>
            </div>
            <p class="text-[#181411] dark:text-white tracking-tight text-3xl font-bold leading-tight">24</p>
            <div class="flex items-center gap-1">
                <p class="text-[#897261] text-sm font-normal">Active categories across 3 regions</p>
            </div>
        </div>
    </div>
    <?php require("Views/template/admin/AddProduct.php");  ?>
    <!-- Main Content Area: Split Table and Preview -->
    <div class="flex flex-col lg:flex-row gap-8">
            <?php require("Views/template/admin/ProductList.php");  ?>
        
        <div class="w-full lg:w-[320px] shrink-0 order-1 lg:order-1">
    <?php if ($selectedItem): ?>
        <div class="sticky top-8 bg-white dark:bg-[#1c140d] rounded-xl border border-[#e6e0db] dark:border-white/10 overflow-hidden shadow-sm">
            <div class="h-48 bg-background-light dark:bg-background-dark relative">
                <div class="absolute inset-0 bg-cover bg-center opacity-90" 
                     style="background-image: url('<?= !empty($selectedItem['image']) ? '/'. $selectedItem['image'] : '/assets/placeholder.png' ?>');">
                </div>
                
                <div class="absolute top-3 right-3 flex gap-1">
                    <button class="size-8 rounded-full bg-white/80 dark:bg-black/40 backdrop-blur-sm flex items-center justify-center text-[#181411] dark:text-white hover:text-primary transition-colors">
                        <span class="material-symbols-outlined !text-sm">edit</span>
                    </button>
                    <button class="size-8 rounded-full bg-white/80 dark:bg-black/40 backdrop-blur-sm flex items-center justify-center text-red-600 hover:bg-red-50 transition-colors">
                        <span class="material-symbols-outlined !text-sm">delete</span>
                    </button>
                </div>
            </div>

            <div class="p-6">
                <div class="flex justify-between items-start mb-2">
                    <span class="text-[10px] font-bold bg-primary/10 text-primary px-2 py-0.5 rounded uppercase tracking-wider">
                        ID: #<?= str_pad($selectedItem['id'], 4, '0', STR_PAD_LEFT) ?>
                    </span>
                    <span class="text-[10px] text-[#897261] italic">
                        <?= isset($selectedItem['created_at']) ? "Added " . date('d M', strtotime($selectedItem['created_at'])) : 'Recently updated' ?>
                    </span>
                </div>

                <h3 class="text-lg font-bold text-[#181411] dark:text-white mb-1"><?= htmlspecialchars($selectedItem['nom']) ?></h3>
                <p class="text-2xl font-bold text-primary mb-4"><?= $selectedItem['devise'] . number_format($selectedItem['prix'], 2) ?></p>

                <div class="space-y-4">
                    <div>
                        <h4 class="text-xs font-bold text-[#897261] uppercase tracking-tighter mb-1.5">Description</h4>
                        <p class="text-sm text-[#181411] dark:text-[#f4f2f0] leading-relaxed">
                            <?= !empty($selectedItem['description']) ? htmlspecialchars($selectedItem['description']) : "No description available for this product." ?>
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 border-t border-[#e6e0db] dark:border-white/10 pt-4">
                        <div>
                            <p class="text-[10px] text-[#897261] font-bold uppercase">Category</p>
                            <p class="text-sm font-bold"><?= htmlspecialchars($selectedItem['categorie'] ?? 'General') ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] text-[#897261] font-bold uppercase">Status</p>
                            <p class="text-sm font-bold text-green-600">Active</p>
                        </div>
                    </div>

                    <button class="w-full h-11 border-2 border-primary text-primary font-bold rounded-lg hover:bg-primary hover:text-white transition-all flex items-center justify-center gap-2 mt-2">
                        <span class="material-symbols-outlined">visibility</span>
                        Full Product Page
                    </button>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="sticky top-8 bg-gray-50 dark:bg-white/5 rounded-xl border-2 border-dashed border-[#e6e0db] dark:border-white/10 p-8 text-center">
            <span class="material-symbols-outlined text-4xl text-[#897261] mb-2">info</span>
            <p class="text-sm text-[#897261]">Select a product to see details</p>
        </div>
    <?php endif; ?>
</div>
    </div>
</main>
</div>