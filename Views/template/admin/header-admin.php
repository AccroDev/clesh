<!-- Top Navigation Bar -->
<header class="sticky top-0 z-50 bg-white dark:bg-background-dark/80 backdrop-blur-md border-b border-solid border-[#f4f2f0] dark:border-[#3d2e21]">
    <div class="max-w-[1280px] mx-auto flex items-center justify-between px-6 lg:px-10 py-4">
        <div class="flex items-center gap-12">
            <div class="flex items-center gap-3 text-primary">
                <div class="size-6">
                    <svg fill="currentColor" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 6H42L36 24L42 42H6L12 24L6 6Z"></path>
                    </svg>
                </div>
                <h2 class="text-[#181411] dark:text-white text-xl font-black tracking-tight">DESIRE</h2>
            </div>
            <nav class="hidden md:flex items-center gap-8">
                <a class="text-[#181411] dark:text-[#f4f2f0] text-sm font-semibold hover:text-primary transition-colors" href="/">Acceil</a>
                <a href="/products" class="text-[#181411] dark:text-[#f4f2f0] text-sm font-semibold hover:text-primary transition-colors"  >Produits</a>
                <a href="/apropos" class="text-[#181411] dark:text-[#f4f2f0] text-sm font-semibold hover:text-primary transition-colors">A propos</a>
            </nav>
        </div>
        <div class="flex flex-1 justify-end items-center gap-6">
            <div class="hidden lg:flex flex-1 max-w-sm">
                <label class="relative w-full">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[#897261] material-symbols-outlined">search</span>
                    <input class="w-full h-10 pl-10 pr-4 rounded-lg border-none bg-[#f4f2f0] dark:bg-[#3d2e21] text-sm placeholder:text-[#897261] focus:ring-1 focus:ring-primary transition-all" placeholder="Recherche..." type="text" />
                </label>
            </div>
            <div class="flex items-center gap-4">
                <a href="/profile" class="flex items-center gap-1 hover:text-primary transition-colors">
                    <span class="material-symbols-outlined">person</span>
                </a>
                <a href="/cart" class="relative flex items-center gap-1 hover:text-primary transition-colors">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <span class="absolute -top-1 -right-1 flex h-4 w-4 items-center justify-center rounded-full bg-primary text-[10px] text-white font-bold">2</span>
</a>
                <a href="/login" class="hidden md:flex bg-primary text-white text-sm font-bold px-5 py-2 rounded-lg hover:bg-[#d45d0f] transition-all">
                    Se connecter
            </a>
            </div>
        </div>
    </div>
</header>