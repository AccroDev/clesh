<?php

use Models\Getter;

  $user = Getter::get("users",["id" => $params["id"] ]); ?>
<main class="px-4 md:px-20 lg:px-40 flex flex-1 justify-center py-8">
    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
        <!-- Breadcrumbs -->
        <div class="flex flex-wrap gap-2 px-4 mb-2">
            <a class="text-warm-gray dark:text-warm-gray/70 text-sm font-medium leading-normal flex items-center gap-1 hover:text-primary transition-colors" href="#">
                <span class="material-symbols-outlined text-sm">group</span> Users
            </a>
            <span class="text-warm-gray text-sm font-medium leading-normal">/</span>
            <span class="text-charcoal dark:text-white text-sm font-semibold leading-normal">Jane Doe</span>
        </div>
        <!-- Profile Header -->
        <div class="flex p-4 @container bg-white dark:bg-background-dark/50 rounded-xl border border-primary/5 shadow-sm mb-6">
            <div class="flex w-full flex-col gap-4 @[520px]:flex-row @[520px]:justify-between @[520px]:items-center">
                <div class="flex items-center gap-6">
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full min-h-24 w-24 ring-4 ring-primary/10 shadow-lg" data-alt="Portrait of Jane Doe" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBCifbotBzE1h8yzCZPyVBDlOIRSVqafMTsMbnGPcwx7RRBKF2t9YXfQdOj7WHKZpyt-Vhu5AjNCdM5V9eC94ZzA1FDfrZuaHC4eXN0nAxbZOdxf8Bk7AFOuHKM4P3xlYJz7NkMNZ5ZsIosOvAQt7zuqvEgO3R82MyL_fwNX9hkLACy-k3-vTz79Vg5D9ZAJslx3P9BOJIR-e5gWBJyWyXfEDECssrM1oOyfXl5DZPjhio9bAR3yh4h05hMyIxoJMrqf2eq6vc");'></div>
                    <div class="flex flex-col justify-center">
                        <h1 class="text-charcoal dark:text-white text-[28px] font-bold leading-tight tracking-[-0.015em]"><?=$user['name'] ?></h1>
                        <p class="text-warm-gray dark:text-warm-gray/80 text-base font-normal leading-normal"><?=$user['email'] ?></p>
                        <div class="mt-2 flex gap-2">
                            <span class="px-2 py-0.5 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-xs font-semibold rounded">Active</span>
                            <span class="px-2 py-0.5 bg-primary/10 dark:bg-primary/20 text-primary text-xs font-semibold rounded">ID: 48102</span>
                        </div>
                    </div>
                </div>
                <button class="flex min-w-[120px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary/10 hover:bg-primary/20 text-primary text-sm font-bold leading-normal tracking-[0.015em] transition-all">
                    <span class="material-symbols-outlined mr-2 text-lg">history</span>
                    <span class="truncate">View Activity</span>
                </button>
            </div>
        </div>
        <!-- Permissions Section -->
        <form action="/admin/user/edit/<?= $user['id'] ?>" method="post"  class="bg-white dark:bg-background-dark/50 rounded-xl border border-primary/5 shadow-sm overflow-hidden">
            <div class="border-b border-primary/5">
                <h2 class="text-charcoal dark:text-white text-[20px] font-bold leading-tight tracking-[-0.015em] px-6 pb-4 pt-6">Account Permissions</h2>
            </div>
            <div class="p-6">
                <p class="text-warm-gray dark:text-warm-gray/80 text-sm mb-4">Select the administrative level for this user. These permissions control access to core system features and data.</p>
                <div class="flex flex-col gap-4">
                    <!-- Standard Option -->
                    <label class="group flex items-center gap-4 rounded-xl border-2 border-solid border-primary/10 p-5 cursor-pointer hover:border-primary/40 transition-all bg-white dark:bg-transparent">
                        <input <?= $user['accreditation']== 1 ? 'checked' : '' ?> class="h-6 w-6 border-2 border-primary/30 bg-transparent text-transparent checked:border-primary checked:bg-[image:--radio-dot-svg] focus:outline-none focus:ring-0 focus:ring-offset-0 transition-all" name="account_type" value="1" type="radio" />
                        <div class="flex grow flex-col">
                            <div class="flex items-center gap-2">
                                <p class="text-charcoal dark:text-white text-base font-bold leading-normal">Standard</p>
                            </div>
                            <p class="text-warm-gray dark:text-warm-gray/70 text-sm font-normal leading-normal">Basic access to view orders and manage personal profile. No administrative rights.</p>
                        </div>
                        <span class="material-symbols-outlined text-warm-gray/30 group-hover:text-primary transition-colors">person</span>
                    </label>
                    <!-- Admin Option -->
                    <label class="group flex items-center gap-4 rounded-xl border-2 border-solid border-primary/10 p-5 cursor-pointer hover:border-primary/40 transition-all bg-white dark:bg-transparent">
                        <input <?= $user['accreditation'] == 2 ? 'checked' : '' ?> class="h-6 w-6 border-2 border-primary/30 bg-transparent text-transparent checked:border-primary checked:bg-[image:--radio-dot-svg] focus:outline-none focus:ring-0 focus:ring-offset-0 transition-all" name="account_type" value="2" type="radio" />
                        <div class="flex grow flex-col">
                            <div class="flex items-center gap-2">
                                <p class="text-charcoal dark:text-white text-base font-bold leading-normal">Admin</p>
                            </div>
                            <p class="text-warm-gray dark:text-warm-gray/70 text-sm font-normal leading-normal">Manage products, view analytics, and process customer refunds. Ideal for support staff.</p>
                        </div>
                        <span class="material-symbols-outlined text-warm-gray/30 group-hover:text-primary transition-colors">admin_panel_settings</span>
                    </label>
                    <!-- SuperAdmin Option -->
                    <label class="group flex items-center gap-4 rounded-xl border-2 border-solid border-primary/10 p-5 cursor-pointer hover:border-primary/40 transition-all bg-white dark:bg-transparent">
                        <input <?= $user['accreditation'] == 3 ? 'checked' : '' ?> class="h-6 w-6 border-2 border-primary/30 bg-transparent text-transparent checked:border-primary checked:bg-[image:--radio-dot-svg] focus:outline-none focus:ring-0 focus:ring-offset-0 transition-all" name="account_type" value="3" type="radio" />
                        <div class="flex grow flex-col">
                            <div class="flex items-center gap-2">
                                <p class="text-charcoal dark:text-white text-base font-bold leading-normal">SuperAdmin</p>
                            </div>
                            <p class="text-warm-gray dark:text-warm-gray/70 text-sm font-normal leading-normal">Full system access, including financial settings and user management. Full control.</p>
                        </div>
                        <span class="material-symbols-outlined text-warm-gray/30 group-hover:text-primary transition-colors">verified_user</span>
                    </label>
                </div>
            </div>
            <!-- Form Footer -->
            <div class="bg-primary/5 dark:bg-white/5 p-6 flex items-center justify-between mt-4">
                <button class="text-warm-gray hover:text-charcoal dark:hover:text-white text-sm font-bold transition-colors">
                    Discard Changes
                </button>
                <button type="submit" class="flex min-w-[200px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] shadow-lg shadow-primary/20 hover:bg-primary/90 transition-all active:scale-[0.98]">
                    <span class="material-symbols-outlined mr-2">save</span>
                    <span>Update Permissions</span>
                </button>
            </div>
        </form>
        <!-- Additional Context Section -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4 px-4">
            <div class="p-4 rounded-lg bg-primary/5 border border-primary/10">
                <div class="flex items-center gap-3 text-primary mb-2">
                    <span class="material-symbols-outlined">info</span>
                    <h3 class="font-bold">Last Updated</h3>
                </div>
                <p class="text-sm text-warm-gray">This user's permissions were last modified on October 24th, 2023 by Administrator (ID: 001).</p>
            </div>
            <div class="p-4 rounded-lg bg-primary/5 border border-primary/10">
                <div class="flex items-center gap-3 text-primary mb-2">
                    <span class="material-symbols-outlined">security</span>
                    <h3 class="font-bold">Security Note</h3>
                </div>
                <p class="text-sm text-warm-gray">Granting SuperAdmin access provides visibility into sensitive financial records. Use with caution.</p>
            </div>
        </div>
    </div>
</main>
