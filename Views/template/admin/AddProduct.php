<?php

use Models\Getter;

$editItem = isset($_GET["edit"]) ? Getter::get("produits", [
    "id" =>  $_GET["edit"]
]) : null;  

?>
<div class="bg-white dark:bg-[#1c140d] rounded-xl border border-[#e6e0db] dark:border-white/10 p-6 mb-8 shadow-sm">
    <h2 class="text-[#181411] dark:text-white text-lg font-bold mb-4">Quick Add Product</h2>
    
    <form method="post" action="/admin/product/add" enctype="multipart/form-data" class="flex flex-col gap-6">
        
        <form method="post" action="/admin/product/add" enctype="multipart/form-data" class="flex flex-col gap-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
        
        <label class="cursor-pointer group" for="image">
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-[#897261] uppercase tracking-wider">Preview (Click to upload)</label>
                <div id="preview-container" class="h-50 w-full rounded-lg border border-dashed border-[#e6e0db] dark:border-white/10 flex items-center justify-center overflow-hidden bg-gray-50 dark:bg-background-dark group-hover:border-primary transition-colors">
                    <?php if(isset($editItem["image"])): ?>
                        <img src="/<?=  $editItem["image"]  ?>" class="h-full w-full object-cover">
                    <?php else: ?>
                        <span class="material-symbols-outlined text-gray-400 text-4xl">image</span>
                        <?php endif; ?>
                    </div>
                    <input type="file" name="image" id="image" class="image-preview-input hidden" data-target="preview-container" accept="image/*" />
                    <?php if(isset($editItem["id"])): ?>
                        <input type="text" name="editItem" value="<?= $editItem["id"]; ?>" id="image" class="image-preview-input hidden"/> 
                    <?php endif; ?>
            </div>
        </label>

        <div class="flex flex-col gap-4">
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-[#897261] uppercase tracking-wider">Product Name</label>
                <input value="<?= isset($editItem["nom"]) ? $editItem["nom"] : '' ?>" class="h-11 rounded-lg border-[#e6e0db] dark:border-white/10 bg-background-light dark:bg-background-dark focus:border-primary text-sm" name="nom" type="text" placeholder="Name" />
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-[#897261] uppercase tracking-wider">Category</label>
                <select default="<?= isset($editItem["categori"]) ? $editItem["categori"] : '' ?>" class="h-11 rounded-lg border-[#e6e0db] dark:border-white/10 bg-background-light dark:bg-background-dark text-sm" name="categori">
                    <option>Electronics</option>
                    <option>Home & Living</option>
                </select>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-[#897261] uppercase tracking-wider">Price & Devise</label>
                <div class="flex gap-1">
                    <input value="<?= isset($editItem["prix"]) ? $editItem["prix"] : '' ?>" class="h-11 w-2/3 rounded-lg border-[#e6e0db] dark:border-white/10 bg-background-light text-sm" type="number" name="prix" placeholder="0.00" />
                    <select default="<?= isset($editItem["devise"]) ? $editItem["devise"] : '' ?>" class="h-11 w-1/3 rounded-lg border-[#e6e0db] dark:border-white/10 bg-background-light text-sm" name="devise">
                        <option value="$">USD</option>
                        <option value="FC">CDF</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-4">
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-[#897261] uppercase tracking-wider">Description</label>
                <textarea name="description"  class="h-[105px] rounded-lg border-[#e6e0db] dark:border-white/10 bg-background-light dark:bg-background-dark focus:border-primary text-sm p-3 resize-none" placeholder="Enter details...">
                    <?= isset($editItem["description"]) ? $editItem["description"] : '' ?>
                </textarea>
            </div>
            
            <button type="submit" class="bg-primary text-white font-bold h-11 rounded-lg hover:bg-opacity-90 transition-all flex items-center justify-center gap-2 w-full mt-auto">
                <span class="material-symbols-outlined">add</span> Add Product
            </button>
        </div>

    </div>
</form>
        
    </form>
</div>