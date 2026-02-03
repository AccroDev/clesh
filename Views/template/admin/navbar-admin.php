<?php $router = $GLOBALS["router"]; ?>
<!-- Side Navigation Bar -->
<aside class="fixed left-0 z-55 w-64 bg-white dark:bg-background-dark border-r border-[#e6e0db] dark:border-white/10 flex flex-col h-full shrink-0">
    <div class="p-6 flex flex-col gap-8 h-full">
        <!-- Brand Profile -->
        <div class="flex gap-3 items-center">
            <div class="bg-primary/20 bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 flex items-center justify-center overflow-hidden" data-alt="Profile avatar of a store administrator" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD1d1dYmUtwSW2aC1f9kLGyT24dGEeItR6FnUYeNWC16AM5oOglqeTCz7WJUs5OXiLd8ZDuGAqId87cE_1WIPLD2IZ1wYstJDy2pyaoYGaLEy9zoMZGZtzlef64fR8ujz4B8xVTeLzR_4rTRZ3n09L2UFfTmK2NK3mCK7LWWVsRSZJt2U6yqzaM6b9C7MzEhNJHm7aSBmsd69LoGhhXd-paHQeGIsWP7WfwZq5dhmYGeu7DIGE7I4OBhDlN3c9obsvZqUydWfc")'>
            </div>
            <div class="flex flex-col">
                <h1 class="text-[#181411] dark:text-white text-base font-bold leading-normal"><?= $_SESSION["user"]['nom'] ?></h1>
                <p class="text-[#897261] dark:text-gray-400 text-xs font-normal">Super utilisateur</p>
            </div>
        </div>
        <!-- Nav Links -->
        <nav class="flex flex-col gap-1 grow">
            <a href="/admin" class="flex items-center gap-3 px-3 py-2.5 cursor-pointer rounded-lg <?= isset($router->matchname) && $router->matchname === 'admin' ? 'bg-primary text-white' : 'text-[#181411] hover:bg-background-light'  ?> ">
                <span class="material-symbols-outlined text-xl">dashboard</span>
                <p class="text-sm font-medium">tableau de bord</p>
            </a>
            <a href="/admin/orders" class="flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer <?= isset($router->matchname) && $router->matchname === 'admin/orders' ? 'bg-primary text-white' : 'text-[#181411] hover:bg-background-light'  ?> ">
                <span class="material-symbols-outlined text-xl">shopping_cart</span>
                <p class="text-sm font-medium">Ordres</p>
            </a>
            <a href="/admin/customers" class="flex items-center gap-3 px-3 py-2.5 cursor-pointer rounded-lg <?= isset($router->matchname) && $router->matchname === 'admin/customers' ? 'bg-primary text-white' : 'text-[#181411] hover:bg-background-light'  ?> ">
                <span class="material-symbols-outlined text-xl">group</span>
                <p class="text-sm font-medium">Client</p>
            </a>
            <a href="/admin/product" class="flex items-center gap-3 px-3 py-2.5 cursor-pointer rounded-lg <?= isset($router->matchname) && $router->matchname === 'admin/Products' ? 'bg-primary text-white' : 'text-[#181411] hover:bg-background-light'  ?> ">
                <span class="material-symbols-outlined text-xl">inventory_2</span>
                <p class="text-sm font-medium">Produits</p>
            </a>
            <a href="/admin/components" class="flex items-center gap-3 px-3 py-2.5 cursor-pointer rounded-lg <?= isset($router->matchname) && $router->matchname === 'admin/components' ? 'bg-primary text-white' : 'text-[#181411] hover:bg-background-light'  ?> ">
                <span class="material-symbols-outlined text-xl">Cards</span>
                <p class="text-sm font-medium">Composant</p>
            </a>
            <a href="/admin/pages" class="flex items-center gap-3 px-3 py-2.5 cursor-pointer rounded-lg dark:text-gray-300 <?= isset($router->matchname) && $router->matchname === 'admin/addPages' ? 'bg-primary text-white' : 'text-[#181411] hover:bg-background-light'  ?> ">
                <span class="material-symbols-outlined text-xl">Article</span>
                <p class="text-sm font-medium">Pages</p>
            </a>
        </nav>
        <!-- Bottom Nav -->
        <div class="flex flex-col gap-1 border-t border-[#e6e0db] dark:border-white/10 pt-4">
            <div class="flex items-center gap-3 px-3 py-2.5 cursor-pointer rounded-lg hover:bg-background-light dark:hover:bg-white/5 text-[#181411] dark:text-gray-300">
                <span class="material-symbols-outlined text-xl">settings</span>
                <p class="text-sm font-medium">paramètres</p>
            </div>
            <a href="/logout" class="flex items-center gap-3 px-3 py-2.5 cursor-pointer rounded-lg hover:bg-background-light dark:hover:bg-white/5 text-[#e71008]">
                <span class="material-symbols-outlined text-xl">logout</span>
                <p class="text-sm font-medium">Se Deconnecter</p>
            </a>
        </div>
    </div>
</aside>