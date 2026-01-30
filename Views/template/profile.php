<?php

    if(!isset($_SESSION['user'])){
        header("Location: /login");
        exit();
    }

?>
<!-- Main Content Area -->
<main class="flex flex-1 justify-center py-10 px-4 md:px-10 lg:px-40">
    <div class="layout-content-container flex flex-col max-w-[960px] flex-1 gap-8">
        <!-- Profile Header -->
        <section class="bg-white dark:bg-[#1a120b] rounded-xl border border-[#e6e0db] dark:border-[#3d2f25] p-6 shadow-sm">
            <div class="flex @container">
                <div class="flex w-full flex-col gap-6 @[520px]:flex-row @[520px]:justify-between @[520px]:items-center">
                    <div class="flex items-center gap-6">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full min-h-24 w-24 border-4 border-primary/10" data-alt="Large user profile circular avatar" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD5pNndSnJT3BKZPYBWMqkWPOY7Mud4QnAn0R3ZNdrbtCUEvGxc9W582TytSE-ZNZJpNQIWJXLP8i1vYXlbLDN6BjWgtHwznUoL35UQCTM2PfuJHBLF19y8Q3mrrEM1OBknLk4PhAgLQCderlWbgSo9aLxwrPjXHvKVrhz1Q6CxZB7vaRhlje_eXqf14NLKjNpoCS0ymL4BXdu475GznwwMXklN8WzaZbmi_ZznPEzWLwC1Q2fSdp878YEgeh9SO5gR2Thlrdg");'></div>
                        <div class="flex flex-col justify-center">
                            <div class="flex items-center gap-2">
                                <p class="text-[#181411] dark:text-white text-2xl font-bold leading-tight tracking-[-0.015em]"><?= isset($_SESSION["user"]["nom"]) ? $_SESSION["user"]["nom"] : ''  ?></p>
                                <span class="bg-primary/10 text-primary text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider">Gold Member</span>
                            </div>
                            <p class="text-[#897261] dark:text-[#a68e7d] text-base font-normal flex items-center gap-2 mt-1">
                                <span class="material-symbols-outlined text-sm">mail</span><?= isset($_SESSION["user"]["email"]) ? $_SESSION["user"]["email"] : ''  ?>
                            </p>
                            <p class="text-[#897261] dark:text-[#a68e7d] text-base font-normal flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">call</span><?= isset($_SESSION["user"]["numero"]) ? $_SESSION["user"]["numero"] : '0000 00 000'  ?>
                            </p>
                            <a href="/logout" class="text-blue-800 dark:text-[#a68e7d] text-base font-normal flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">logout</span> Se Deconecter
                            </a>
                        </div>
                    </div>
                    <div class="flex gap-3 w-full @[480px]:w-auto">
                        <a href="/admin" class="flex-1 @[480px]:flex-none flex min-w-[120px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-5 bg-primary text-white text-sm font-bold leading-normal transition-opacity hover:opacity-90">
                            <span class="truncate">Dashboard</span>
                        </a>
                        <button class="flex min-w-[40px] cursor-pointer items-center justify-center rounded-lg h-10 px-2 bg-[#f4f2f0] dark:bg-[#2b1f16] text-[#181411] dark:text-white hover:bg-primary/10 transition-colors">
                            <span class="material-symbols-outlined">settings</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Orders Section -->
        <section class="flex flex-col gap-4">
            <div class="flex items-end justify-between px-4">
                <h2 class="text-[#181411] dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em]">My Orders</h2>
                <p class="text-[#897261] text-sm font-medium">Total: 42 orders</p>
            </div>
            <!-- Tabs Component -->
            <div class="bg-white dark:bg-[#1a120b] rounded-t-xl border-x border-t border-[#e6e0db] dark:border-[#3d2f25]">
                <div class="flex border-b border-[#e6e0db] dark:border-[#3d2f25] px-6 gap-8 overflow-x-auto scrollbar-hide">
                    <a class="flex flex-col items-center justify-center border-b-[3px] border-primary text-primary pb-[13px] pt-4 whitespace-nowrap" href="#">
                        <p class="text-sm font-bold leading-normal tracking-[0.015em]">All Orders</p>
                    </a>
                    <a class="flex flex-col items-center justify-center border-b-[3px] border-transparent text-[#897261] pb-[13px] pt-4 whitespace-nowrap hover:text-[#181411] dark:hover:text-white transition-colors" href="#">
                        <p class="text-sm font-bold leading-normal tracking-[0.015em]">Processing</p>
                    </a>
                    <a class="flex flex-col items-center justify-center border-b-[3px] border-transparent text-[#897261] pb-[13px] pt-4 whitespace-nowrap hover:text-[#181411] dark:hover:text-white transition-colors" href="#">
                        <p class="text-sm font-bold leading-normal tracking-[0.015em]">Shipped</p>
                    </a>
                    <a class="flex flex-col items-center justify-center border-b-[3px] border-transparent text-[#897261] pb-[13px] pt-4 whitespace-nowrap hover:text-[#181411] dark:hover:text-white transition-colors" href="#">
                        <p class="text-sm font-bold leading-normal tracking-[0.015em]">Delivered</p>
                    </a>
                </div>
            </div>
            <!-- Table Component -->
            <div class="bg-white dark:bg-[#1a120b] rounded-b-xl border border-[#e6e0db] dark:border-[#3d2f25] shadow-sm overflow-hidden">
                <div class="w-full @container">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-[#fcfbf9] dark:bg-[#2b1f16]">
                                    <th class="px-6 py-4 text-[#181411] dark:text-white text-xs font-bold uppercase tracking-wider">Order ID</th>
                                    <th class="px-6 py-4 text-[#181411] dark:text-white text-xs font-bold uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-4 text-[#181411] dark:text-white text-xs font-bold uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-[#181411] dark:text-white text-xs font-bold uppercase tracking-wider">Total</th>
                                    <th class="px-6 py-4 text-[#897261] text-xs font-bold uppercase tracking-wider text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#e6e0db] dark:divide-[#3d2f25]">
                                <!-- Row 1 -->
                                <tr class="hover:bg-primary/5 dark:hover:bg-primary/10 transition-colors cursor-pointer group">
                                    <td class="px-6 py-4 whitespace-nowrap text-[#181411] dark:text-white text-sm font-semibold">#ORD-7721</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-[#897261] dark:text-[#a68e7d] text-sm">Oct 24, 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2 px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 rounded-full w-fit">
                                            <span class="size-1.5 rounded-full bg-green-500"></span>
                                            <span class="text-xs font-bold uppercase">Delivered</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-[#181411] dark:text-white text-sm font-medium">$120.00</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <button class="text-primary hover:underline text-sm font-bold">View Details</button>
                                    </td>
                                </tr>
                                <!-- Row 2 -->
                                <tr class="hover:bg-primary/5 dark:hover:bg-primary/10 transition-colors cursor-pointer group">
                                    <td class="px-6 py-4 whitespace-nowrap text-[#181411] dark:text-white text-sm font-semibold">#ORD-8104</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-[#897261] dark:text-[#a68e7d] text-sm">Nov 02, 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2 px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 rounded-full w-fit">
                                            <span class="size-1.5 rounded-full bg-blue-500"></span>
                                            <span class="text-xs font-bold uppercase">Shipped</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-[#181411] dark:text-white text-sm font-medium">$45.50</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <button class="text-primary hover:underline text-sm font-bold">Track</button>
                                    </td>
                                </tr>
                                <!-- Row 3 -->
                                <tr class="hover:bg-primary/5 dark:hover:bg-primary/10 transition-colors cursor-pointer group">
                                    <td class="px-6 py-4 whitespace-nowrap text-[#181411] dark:text-white text-sm font-semibold">#ORD-9022</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-[#897261] dark:text-[#a68e7d] text-sm">Nov 15, 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2 px-3 py-1 bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400 rounded-full w-fit">
                                            <span class="size-1.5 rounded-full bg-amber-500"></span>
                                            <span class="text-xs font-bold uppercase">Processing</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-[#181411] dark:text-white text-sm font-medium">$210.00</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <button class="text-primary hover:underline text-sm font-bold">View Details</button>
                                    </td>
                                </tr>
                                <!-- Row 4 -->
                                <tr class="hover:bg-primary/5 dark:hover:bg-primary/10 transition-colors cursor-pointer group">
                                    <td class="px-6 py-4 whitespace-nowrap text-[#181411] dark:text-white text-sm font-semibold">#ORD-9155</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-[#897261] dark:text-[#a68e7d] text-sm">Dec 01, 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2 px-3 py-1 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 rounded-full w-fit">
                                            <span class="size-1.5 rounded-full bg-red-500"></span>
                                            <span class="text-xs font-bold uppercase">Canceled</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-[#181411] dark:text-white text-sm font-medium">$88.25</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <button class="text-[#897261] hover:text-[#181411] dark:hover:text-white text-sm font-bold">Reorder</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Table Footer -->
                <div class="flex items-center justify-between px-6 py-4 bg-[#fcfbf9] dark:bg-[#2b1f16] border-t border-[#e6e0db] dark:border-[#3d2f25]">
                    <p class="text-[#897261] text-xs font-medium uppercase">Showing 4 of 42 orders</p>
                    <div class="flex gap-2">
                        <button class="p-2 rounded-lg bg-white dark:bg-[#1a120b] border border-[#e6e0db] dark:border-[#3d2f25] text-[#181411] dark:text-white opacity-50 cursor-not-allowed">
                            <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                        </button>
                        <button class="p-2 rounded-lg bg-white dark:bg-[#1a120b] border border-[#e6e0db] dark:border-[#3d2f25] text-[#181411] dark:text-white hover:border-primary hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Secondary Info Cards -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white dark:bg-[#1a120b] p-6 rounded-xl border border-[#e6e0db] dark:border-[#3d2f25]">
                <div class="flex items-center gap-3 mb-4">
                    <span class="material-symbols-outlined text-primary">location_on</span>
                    <h3 class="font-bold text-lg">Default Address</h3>
                </div>
                <p class="text-[#897261] dark:text-[#a68e7d] text-sm leading-relaxed">
                    123 Highland Avenue, Suite 400<br />
                    Beverly Hills, CA 90210<br />
                    United States
                </p>
                <button class="mt-4 text-primary text-sm font-bold hover:underline">Change Address</button>
            </div>
            <div class="bg-white dark:bg-[#1a120b] p-6 rounded-xl border border-[#e6e0db] dark:border-[#3d2f25]">
                <div class="flex items-center gap-3 mb-4">
                    <span class="material-symbols-outlined text-primary">credit_card</span>
                    <h3 class="font-bold text-lg">Payment Methods</h3>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-6 bg-slate-100 dark:bg-slate-800 rounded flex items-center justify-center">
                        <span class="text-[10px] font-bold text-slate-500">VISA</span>
                    </div>
                    <p class="text-[#897261] dark:text-[#a68e7d] text-sm">Visa ending in **** 4242</p>
                </div>
                <button class="mt-4 text-primary text-sm font-bold hover:underline">Manage Cards</button>
            </div>
        </section>
    </div>
</main>