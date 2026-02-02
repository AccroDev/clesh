
<!-- Main Content Area -->
<main class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark/50">
    <!-- Top Navbar -->
    <div class="p-8">
        <!-- KPI Statistics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Sales -->
            <div class="bg-white dark:bg-background-dark p-6 rounded-xl border border-border-warm dark:border-white/5 shadow-sm group hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm font-medium text-muted-warm">Total Sales</p>
                        <h3 class="text-2xl font-bold mt-1">$54,230</h3>
                    </div>
                    <span class="p-2 bg-green-100 text-green-600 rounded-lg material-symbols-outlined">trending_up</span>
                </div>
                <div class="h-10 w-full">
                    <!-- Mini Sparkline Placeholder SVG -->
                    <svg class="w-full h-full" preserveaspectratio="none" viewbox="0 0 100 40">
                        <path d="M0 35 Q 20 10, 40 25 T 80 5 T 100 15" fill="none" stroke="#22c55e" stroke-width="2"></path>
                    </svg>
                </div>
                <p class="text-xs font-bold text-green-600 mt-2">+12.5% <span class="text-muted-warm font-normal">from last month</span></p>
            </div>
            <!-- Active Users -->
            <div class="bg-white dark:bg-background-dark p-6 rounded-xl border border-border-warm dark:border-white/5 shadow-sm group hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm font-medium text-muted-warm">Active Users</p>
                        <h3 class="text-2xl font-bold mt-1">1,240</h3>
                    </div>
                    <span class="p-2 bg-blue-100 text-blue-600 rounded-lg material-symbols-outlined">person</span>
                </div>
                <div class="flex items-center gap-1 mt-6">
                    <div class="flex -space-x-2">
                        <div class="w-6 h-6 rounded-full border-2 border-white bg-primary/20 flex items-center justify-center text-[8px] font-bold">JD</div>
                        <div class="w-6 h-6 rounded-full border-2 border-white bg-charcoal/20 flex items-center justify-center text-[8px] font-bold">AS</div>
                        <div class="w-6 h-6 rounded-full border-2 border-white bg-muted-warm/20 flex items-center justify-center text-[8px] font-bold">+5</div>
                    </div>
                    <span class="text-xs text-muted-warm font-medium">Active now</span>
                </div>
                <p class="text-xs font-bold text-blue-600 mt-2">+5% <span class="text-muted-warm font-normal">than last week</span></p>
            </div>
            <!-- New Orders -->
            <div class="bg-white dark:bg-background-dark p-6 rounded-xl border border-border-warm dark:border-white/5 shadow-sm group hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm font-medium text-muted-warm">New Orders</p>
                        <h3 class="text-2xl font-bold mt-1">45</h3>
                    </div>
                    <span class="p-2 bg-orange-100 text-orange-600 rounded-lg material-symbols-outlined">shopping_cart</span>
                </div>
                <div class="w-full bg-background-light dark:bg-white/5 h-1.5 rounded-full mt-8">
                    <div class="bg-orange-500 h-full w-[65%] rounded-full"></div>
                </div>
                <p class="text-xs font-bold text-orange-600 mt-2">65% <span class="text-muted-warm font-normal">of daily goal</span></p>
            </div>
            <!-- Conversion Rate -->
            <div class="bg-white dark:bg-background-dark p-6 rounded-xl border border-border-warm dark:border-white/5 shadow-sm group hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm font-medium text-muted-warm">Conversion Rate</p>
                        <h3 class="text-2xl font-bold mt-1">3.2%</h3>
                    </div>
                    <span class="p-2 bg-purple-100 text-purple-600 rounded-lg material-symbols-outlined">ads_click</span>
                </div>
                <div class="flex items-end gap-1 mt-6">
                    <div class="w-3 h-4 bg-purple-200 rounded-sm"></div>
                    <div class="w-3 h-6 bg-purple-200 rounded-sm"></div>
                    <div class="w-3 h-8 bg-purple-500 rounded-sm"></div>
                    <div class="w-3 h-5 bg-purple-200 rounded-sm"></div>
                </div>
                <p class="text-xs font-bold text-purple-600 mt-2">+0.4% <span class="text-muted-warm font-normal">vs global avg</span></p>
            </div>
        </div>
        <!-- Main Analytics Area: Charts & Activity -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mb-8">
            <!-- Sales Overview Large Chart -->
            <div class="xl:col-span-2 bg-white dark:bg-background-dark rounded-xl border border-border-warm dark:border-white/5 p-8 shadow-sm">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                    <div>
                        <h2 class="text-lg font-bold">Sales Overview</h2>
                        <p class="text-sm text-muted-warm font-medium">Revenue generated over the last 30 days</p>
                    </div>
                    <div class="flex items-center bg-background-light dark:bg-white/5 rounded-lg p-1">
                        <button class="px-4 py-1.5 text-xs font-bold rounded-md bg-white dark:bg-background-dark shadow-sm">30 Days</button>
                        <button class="px-4 py-1.5 text-xs font-medium text-muted-warm">90 Days</button>
                        <button class="px-4 py-1.5 text-xs font-medium text-muted-warm">Year</button>
                    </div>
                </div>
                <div class="relative h-[300px] w-full mt-4">
                    <svg class="w-full h-full overflow-visible" preserveaspectratio="none" viewbox="0 0 800 300">
                        <defs>
                            <lineargradient id="chartGradient" x1="0" x2="0" y1="0" y2="1">
                                <stop offset="0%" stop-color="#e76b55" stop-opacity="0.2"></stop>
                                <stop offset="100%" stop-color="#e76b55" stop-opacity="0"></stop>
                            </lineargradient>
                        </defs>
                        <!-- Grid Lines -->
                        <line opacity="0.5" stroke="#e5dddc" stroke-dasharray="4" stroke-width="1" x1="0" x2="800" y1="50" y2="50"></line>
                        <line opacity="0.5" stroke="#e5dddc" stroke-dasharray="4" stroke-width="1" x1="0" x2="800" y1="150" y2="150"></line>
                        <line opacity="0.5" stroke="#e5dddc" stroke-dasharray="4" stroke-width="1" x1="0" x2="800" y1="250" y2="250"></line>
                        <!-- Chart Area -->
                        <path class="chart-gradient-fill" d="M0 250 C 100 240, 150 100, 250 120 S 400 200, 500 150 S 650 40, 800 80 V 300 H 0 Z"></path>
                        <path d="M0 250 C 100 240, 150 100, 250 120 S 400 200, 500 150 S 650 40, 800 80" fill="none" stroke="#e76b55" stroke-linecap="round" stroke-width="4"></path>
                        <!-- Highlight Dots -->
                        <circle cx="250" cy="120" fill="#e76b55" r="5" stroke="white" stroke-width="2"></circle>
                        <circle cx="500" cy="150" fill="#e76b55" r="5" stroke="white" stroke-width="2"></circle>
                        <circle cx="650" cy="40" fill="#e76b55" r="5" stroke="white" stroke-width="2"></circle>
                    </svg>
                    <!-- X Axis Labels -->
                    <div class="flex justify-between mt-4 px-2">
                        <span class="text-[11px] font-bold text-muted-warm uppercase tracking-wider">Oct 01</span>
                        <span class="text-[11px] font-bold text-muted-warm uppercase tracking-wider">Oct 10</span>
                        <span class="text-[11px] font-bold text-muted-warm uppercase tracking-wider">Oct 20</span>
                        <span class="text-[11px] font-bold text-muted-warm uppercase tracking-wider">Oct 30</span>
                    </div>
                </div>
            </div>
            <!-- Recent Activity Feed -->
            <div class="bg-white dark:bg-background-dark rounded-xl border border-border-warm dark:border-white/5 p-6 shadow-sm overflow-hidden">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-bold">Recent Activity</h2>
                    <button class="text-primary text-xs font-bold hover:underline">View All</button>
                </div>
                <div class="flex flex-col gap-6">
                    <!-- Activity Item 1 -->
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-cover bg-center shrink-0 border border-border-warm" data-alt="Customer avatar for activity feed" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBoeCarhh6ddYDix0eT_1kxbHRuXeBba0tqtBrbJoHqyJROTrQXfPT66yVSmX9S22UquI5NQz7nzCOPBHK4kNmI6JCfwRW_cDlmH_aRjcNe1_68CAbZsKpYnNUNPFIyUvKkCwIOsyDQGAavnNS-9C_qDiAuBtEk7IcZpiv5a2R6R5Vb3CZdio8frLgy8vho_QO13yzPBC93tcVq3T-B4aV8JO9NwpqTAYTXo_C6cuwIwSNjtXTxREQtojCW9JMc4vCoRQPeMRM')"></div>
                        <div class="flex flex-col gap-0.5">
                            <p class="text-sm font-medium"><span class="font-bold">John Doe</span> placed an order <span class="font-bold text-primary">#ORD-9021</span></p>
                            <p class="text-xs text-muted-warm">2 minutes ago</p>
                        </div>
                    </div>
                    <!-- Activity Item 2 -->
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-charcoal text-white flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-sm">person_add</span>
                        </div>
                        <div class="flex flex-col gap-0.5">
                            <p class="text-sm font-medium"><span class="font-bold">New user</span> registered from <span class="font-bold">San Francisco, CA</span></p>
                            <p class="text-xs text-muted-warm">15 minutes ago</p>
                        </div>
                    </div>
                    <!-- Activity Item 3 -->
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-sm">assignment_return</span>
                        </div>
                        <div class="flex flex-col gap-0.5">
                            <p class="text-sm font-medium">Refund processed for <span class="font-bold text-red-500">#ORD-1104</span></p>
                            <p class="text-xs text-muted-warm">1 hour ago</p>
                        </div>
                    </div>
                    <!-- Activity Item 4 -->
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-cover bg-center shrink-0 border border-border-warm" data-alt="Staff avatar for activity feed" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBPhCmJScP2mQn3XRTHlPOO9WzTVprz0JNEzOzEbquGIuLQ-7oB8FI6niB3H6l73bbjuR84B4mlTz70Bdxdo69zUeVpy4i1QcHqdIdhTGJOpFP6R49vFZXaWK1bNCcQmd0Ha0uSQGHFzzVj4HLcCxJT8cSvvyjgkC1dey86rvgpP4z8ES72qSjDB57oyBrs2LRZekxe0hFew8pCbpmacns2_qwhVx7DiGGXghtqNM0fGzdPk98cIG-Q0Eu7Mhuiti5r6QlgEBk')"></div>
                        <div class="flex flex-col gap-0.5">
                            <p class="text-sm font-medium"><span class="font-bold">Sarah Chen</span> updated inventory for <span class="font-bold">Summer Collection</span></p>
                            <p class="text-xs text-muted-warm">4 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Secondary Analytics Row -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Sales by Category (Donut) -->
            <div class="bg-white dark:bg-background-dark rounded-xl border border-border-warm dark:border-white/5 p-8 shadow-sm">
                <h2 class="text-lg font-bold mb-6">Sales by Category</h2>
                <div class="flex items-center justify-around flex-wrap gap-8">
                    <div class="relative w-44 h-44">
                        <!-- Donut Chart SVG -->
                        <svg class="w-full h-full transform -rotate-90" viewbox="0 0 36 36">
                            <circle cx="18" cy="18" fill="transparent" r="15.9" stroke="#f4f1f0" stroke-width="4"></circle>
                            <circle cx="18" cy="18" fill="transparent" r="15.9" stroke="#e76b55" stroke-dasharray="40 100" stroke-dashoffset="0" stroke-width="4"></circle>
                            <circle cx="18" cy="18" fill="transparent" r="15.9" stroke="#171211" stroke-dasharray="25 100" stroke-dashoffset="-40" stroke-width="4"></circle>
                            <circle cx="18" cy="18" fill="transparent" r="15.9" stroke="#876964" stroke-dasharray="15 100" stroke-dashoffset="-65" stroke-width="4"></circle>
                            <circle cx="18" cy="18" fill="transparent" r="15.9" stroke="#e5dddc" stroke-dasharray="20 100" stroke-dashoffset="-80" stroke-width="4"></circle>
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
                            <span class="text-xl font-bold">1.2k</span>
                            <span class="text-[10px] text-muted-warm font-bold uppercase">Total Units</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="flex items-center gap-3">
                            <span class="w-3 h-3 rounded-full bg-primary"></span>
                            <span class="text-sm font-medium">Electronics</span>
                            <span class="text-sm text-muted-warm ml-auto">40%</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-3 h-3 rounded-full bg-charcoal"></span>
                            <span class="text-sm font-medium">Fashion</span>
                            <span class="text-sm text-muted-warm ml-auto">25%</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-3 h-3 rounded-full bg-muted-warm"></span>
                            <span class="text-sm font-medium">Home &amp; Decor</span>
                            <span class="text-sm text-muted-warm ml-auto">15%</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-3 h-3 rounded-full bg-border-warm"></span>
                            <span class="text-sm font-medium">Beauty</span>
                            <span class="text-sm text-muted-warm ml-auto">20%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Monthly Orders Comparison (Bar) -->
            <div class="bg-white dark:bg-background-dark rounded-xl border border-border-warm dark:border-white/5 p-8 shadow-sm">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-lg font-bold">Monthly Orders Comparison</h2>
                    <div class="flex gap-4">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
                            <span class="text-xs font-medium">This Month</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-charcoal"></span>
                            <span class="text-xs font-medium">Last Month</span>
                        </div>
                    </div>
                </div>
                <div class="h-44 flex items-end justify-between gap-4">
                    <!-- Bar 1 -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full flex justify-center gap-1">
                            <div class="w-4 bg-primary rounded-t-sm" style="height: 120px;"></div>
                            <div class="w-4 bg-charcoal rounded-t-sm" style="height: 100px;"></div>
                        </div>
                        <span class="text-[10px] font-bold text-muted-warm">W1</span>
                    </div>
                    <!-- Bar 2 -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full flex justify-center gap-1">
                            <div class="w-4 bg-primary rounded-t-sm" style="height: 140px;"></div>
                            <div class="w-4 bg-charcoal rounded-t-sm" style="height: 130px;"></div>
                        </div>
                        <span class="text-[10px] font-bold text-muted-warm">W2</span>
                    </div>
                    <!-- Bar 3 -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full flex justify-center gap-1">
                            <div class="w-4 bg-primary rounded-t-sm" style="height: 110px;"></div>
                            <div class="w-4 bg-charcoal rounded-t-sm" style="height: 150px;"></div>
                        </div>
                        <span class="text-[10px] font-bold text-muted-warm">W3</span>
                    </div>
                    <!-- Bar 4 -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full flex justify-center gap-1">
                            <div class="w-4 bg-primary rounded-t-sm" style="height: 160px;"></div>
                            <div class="w-4 bg-charcoal rounded-t-sm" style="height: 120px;"></div>
                        </div>
                        <span class="text-[10px] font-bold text-muted-warm">W4</span>
                    </div>
                    <!-- Bar 5 -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full flex justify-center gap-1">
                            <div class="w-4 bg-primary rounded-t-sm" style="height: 150px;"></div>
                            <div class="w-4 bg-charcoal rounded-t-sm" style="height: 140px;"></div>
                        </div>
                        <span class="text-[10px] font-bold text-muted-warm">W5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
