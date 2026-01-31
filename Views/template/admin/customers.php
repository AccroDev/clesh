<?php

use Models\Getter;

 $users = Getter::get("users",[],true); ?>

<main class="flex-1 flex flex-col min-w-0"> 
    <div class="p-8 space-y-8">
        <!-- Page Heading -->
        <div class="flex justify-between items-end">
            <div>
                <h2 class="text-3xl font-black text-charcoal dark:text-white tracking-tight">Customer Management</h2>
                <p class="text-[#897261] mt-1">Manage and monitor your customer base and their activities.</p>
            </div>
            <button class="bg-primary hover:bg-primary/90 text-white px-5 py-2 rounded-lg font-bold text-sm flex items-center gap-2 transition-all shadow-sm">
                <span class="material-symbols-outlined text-[18px]">person_add</span>
                Add Customer
            </button>
        </div>
        <!-- Insights Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-white/5 p-6 rounded-xl border border-[#e5e1de] dark:border-white/10 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-[#897261]">Total Users</p>
                        <h3 class="text-2xl font-bold text-charcoal dark:text-white mt-1">12,450</h3>
                    </div>
                    <div class="p-2 bg-primary/10 rounded-lg text-primary">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-1 text-xs">
                    <span class="text-emerald-600 font-bold flex items-center"><span class="material-symbols-outlined text-xs">trending_up</span> 5.2%</span>
                    <span class="text-[#897261]">vs last month</span>
                </div>
            </div>
            <div class="bg-white dark:bg-white/5 p-6 rounded-xl border border-[#e5e1de] dark:border-white/10 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-[#897261]">New Users (Monthly)</p>
                        <h3 class="text-2xl font-bold text-charcoal dark:text-white mt-1">1,120</h3>
                    </div>
                    <div class="p-2 bg-primary/10 rounded-lg text-primary">
                        <span class="material-symbols-outlined">person_add</span>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-1 text-xs">
                    <span class="text-emerald-600 font-bold flex items-center"><span class="material-symbols-outlined text-xs">trending_up</span> 12.5%</span>
                    <span class="text-[#897261]">vs last month</span>
                </div>
            </div>
            <div class="bg-white dark:bg-white/5 p-6 rounded-xl border border-[#e5e1de] dark:border-white/10 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-[#897261]">Active Sessions</p>
                        <h3 class="text-2xl font-bold text-charcoal dark:text-white mt-1">432</h3>
                    </div>
                    <div class="p-2 bg-primary/10 rounded-lg text-primary">
                        <span class="material-symbols-outlined">bolt</span>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-1 text-xs">
                    <span class="text-primary font-bold">Live</span>
                    <span class="text-[#897261]">right now</span>
                </div>
            </div>
        </div>
        <!-- Table Section -->
        <div class="bg-white dark:bg-white/5 rounded-xl border border-[#e5e1de] dark:border-white/10 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-[#e5e1de] dark:border-white/10 flex items-center justify-between bg-cream/50 dark:bg-transparent">
                <h3 class="text-lg font-bold text-charcoal dark:text-white">Customer Directory</h3>
                <div class="flex items-center gap-2">
                    <button class="px-3 py-1.5 text-xs font-bold border border-[#e5e1de] rounded-lg hover:bg-gray-50 dark:hover:bg-white/5 transition-colors flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">filter_list</span>
                        Filter
                    </button>
                    <button class="px-3 py-1.5 text-xs font-bold border border-[#e5e1de] rounded-lg hover:bg-gray-50 dark:hover:bg-white/5 transition-colors flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">download</span>
                        Export
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-background-light dark:bg-white/5">
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#897261]">Name</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#897261]">Email</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#897261]">Registration Date</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#897261]">Total Orders</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#897261] text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#e5e1de] dark:divide-white/10">
                        <?php foreach($users as $user ): ?>
                            <tr class="hover:bg-cream dark:hover:bg-white/5 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="size-9 rounded-full bg-cover bg-center" data-alt="Customer Jane Cooper avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuChHUmL_i-TGx5c3k1rfkA7zI5ptuzaaIKpTbkLDRFbLyzx7ZqhYAaDPzBK_ydnT3PzgNs373R0mrZ2VZw7dceuKSToFbi1ufj28SIIPHwlC9hnCU8AiqX4TpC93IJYV7Z3-fsW4Oa19Pps3iEJWZ4mAOdaYOXZeDNiub2-tHOWH_aEbt-MsQQL2iNGWN7upDW9Q5d_bM1w4jl2yIZQgbAWAJiVRGianvWC0vxAoH17JVDnm7j4TnIHX0XBo0MazcvArWO0EOSnaUGT')"></div>
                                        <span class="font-bold text-sm dark:text-white"><?= $user["name"] ?></span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-[#897261]"><?= $user["email"] ?></td>
                                <td class="px-6 py-4 text-sm text-[#897261]">Oct 12, 2023</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="bg-primary/10 text-primary font-bold px-2 py-0.5 rounded-full text-xs">12 Orders</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-gray-400 hover:text-charcoal dark:hover:text-white transition-colors">
                                        <span class="material-symbols-outlined">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?> 

                    </tbody>
                </table>
                <?php if(empty($users) ): ?> 
    
                        <span class="text-center flex items-center justify-center my-5" >Aucun Utilisateur enregistrer jusque là</span> 
                <?php endif; ?>
            </div>
            <div class="px-6 py-4 flex items-center justify-between border-t border-[#e5e1de] dark:border-white/10 bg-cream/30 dark:bg-transparent">
                <p class="text-sm text-[#897261]">Showing 1 to 4 of 12,450 customers</p>
                <div class="flex gap-2">
                    <button class="px-4 py-2 text-sm font-bold border border-[#e5e1de] rounded-lg disabled:opacity-50 hover:bg-white dark:hover:bg-white/5 transition-colors" disabled="">Previous</button>
                    <button class="px-4 py-2 text-sm font-bold bg-white dark:bg-white/10 border border-[#e5e1de] dark:border-white/20 rounded-lg hover:bg-cream transition-colors">Next</button>
                </div>
            </div>
        </div>
        <!-- Section Footer / Context -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-primary/5 p-6 rounded-xl border border-primary/10">
                <h4 class="text-charcoal dark:text-white font-bold mb-2 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">info</span>
                    Pro Tip
                </h4>
                <p class="text-sm text-[#897261] leading-relaxed">
                    You can bulk edit customers by selecting multiple rows in the directory. Use the filter to segment your audience by order frequency or lifetime value.
                </p>
            </div>
            <div class="bg-background-light dark:bg-white/5 p-6 rounded-xl border border-dashed border-[#e5e1de]">
                <h4 class="text-charcoal dark:text-white font-bold mb-2 flex items-center gap-2">
                    <span class="material-symbols-outlined">analytics</span>
                    Recent Activity
                </h4>
                <ul class="space-y-3">
                    <li class="text-xs flex items-center gap-3">
                        <span class="size-1.5 rounded-full bg-primary"></span>
                        <span class="text-[#897261]"><strong class="text-charcoal dark:text-white">Jane Cooper</strong> updated their shipping address.</span>
                        <span class="text-[10px] text-[#897261] ml-auto">2m ago</span>
                    </li>
                    <li class="text-xs flex items-center gap-3">
                        <span class="size-1.5 rounded-full bg-emerald-500"></span>
                        <span class="text-[#897261]"><strong class="text-charcoal dark:text-white">New Registration:</strong> Michael Scott joined.</span>
                        <span class="text-[10px] text-[#897261] ml-auto">15m ago</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main> 