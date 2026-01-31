<?php 
    $user = $_SESSION['user'];
    $avatar = $user['avatar'] ?? null;
    $initiale = strtoupper(substr($user['nom'] ?? 'U', 0, 1));
?>
<header class="sticky top-0 z-50 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-solid border-[#f4f2f0] dark:border-[#3d2e21]">
    <div class="max-w-[1280px] mx-auto flex items-center justify-between px-6 lg:px-10 py-4">
        <div class="flex items-center gap-12">
            <div class="flex items-center gap-3 text-primary">
                <div class="size-6">
                    <svg fill="currentColor" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 6H42L36 24L42 42H6L12 24L6 6Z"></path>
                    </svg>
                </div>
                <h2 class="text-[#181411] dark:text-white text-xl font-black tracking-tight">MINIMALIST</h2>
            </div>
            <nav class="hidden md:flex items-center gap-8">
                <a class="text-[#181411] dark:text-[#f4f2f0] text-sm font-semibold hover:text-primary transition-colors" href="/">Home</a>
                <a class="text-[#181411] dark:text-[#f4f2f0] text-sm font-semibold hover:text-primary transition-colors" href="/products">Products</a>
                <a href="/apropos" class="text-[#181411] dark:text-[#f4f2f0] text-sm font-semibold hover:text-primary transition-colors">A propos</a>
            </nav>
        </div>
        <div class="flex flex-1 justify-end items-center gap-6">
            <div class="hidden lg:flex flex-1 max-w-sm">
                <label class="relative w-full">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[#897261] material-symbols-outlined">search</span>
                    <input class="w-full h-10 pl-10 pr-4 rounded-lg border-none bg-[#f4f2f0] dark:bg-[#3d2e21] text-sm placeholder:text-[#897261] focus:ring-1 focus:ring-primary transition-all" placeholder="Search curated goods..." type="text" />
                </label>
            </div>
            <div class="flex items-center gap-4">
                <a href="/cart" class="relative flex items-center gap-1 text-slate-600 hover:text-primary transition-colors">
                    <span class="material-symbols-outlined text-[28px]">shopping_cart</span>
                    <span class="absolute -top-1 -right-1 flex h-4 w-4 items-center justify-center rounded-full bg-primary text-[10px] text-white font-bold shadow-sm">2</span>
                </a>

                <?php if (isset($_SESSION['user'])): ?>
                    <a href="/profile" class="flex items-center gap-3 p-1 pr-3 rounded-md bg-gray-200 hover:bg-[#d45d0f transition-all border border-transparent hover:border-slate-100">
                       <?php if ($avatar && file_exists($_SERVER['DOCUMENT_ROOT'] . $avatar)): ?>
                            <img src="<?= $avatar ?>" 
                                alt="Profile" 
                                class="w-8 h-8 rounded-full object-cover border border-slate-200 shadow-sm">
                        <?php else: ?>
                            <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center group-hover:border-primary transition-colors">
                                <span class="text-xs font-black text-slate-900 leading-none"><?= $initiale ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="hidden md:flex flex-col items-start leading-tight">
                            <span class="text-sm font-bold text-black line-clamp-1">
                                <?= htmlspecialchars($_SESSION['user']['nom'] ?? 'Utilisateur') ?>
                            </span>
                            <span class="text-[11px] text-black font-medium">
                                <?= htmlspecialchars($_SESSION['user']['email'] ?? 'N/A') ?>
                            </span>
                        </div>
                    </a>

                <?php else: ?>
                    <a href="/login" class="flex items-center gap-2 bg-primary text-white text-sm font-bold px-6 py-2.5 rounded-xl hover:bg-[#d45d0f] hover:shadow-lg hover:shadow-primary/20 transition-all active:scale-95">
                        <span class="material-symbols-outlined text-sm">login</span>
                        Login
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>