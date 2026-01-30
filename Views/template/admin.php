 <div class="bg-background-light dark:bg-background-dark min-h-screen font-display">
     <div class="flex h-screen overflow-hidden">
         
         <!-- Main Content -->
         <main class="flex-1 overflow-y-auto">
             <div class="max-w-7xl mx-auto px-6 py-8">
                 <!-- Page Heading -->
                 <div class="flex flex-wrap justify-between items-end gap-4 mb-8">
                     <div class="flex flex-col gap-2">
                         <h2 class="text-[#181411] dark:text-white text-3xl font-black tracking-tight">Orders Management</h2>
                         <p class="text-[#897261] dark:text-gray-400 text-sm">Review, track, and manage all your customer transactions in one interface.</p>
                     </div>
                     <div class="flex gap-3">
                         <button class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-white/10 border border-[#e6e0db] dark:border-white/10 rounded-lg text-[#181411] dark:text-white text-sm font-bold shadow-sm hover:bg-gray-50 transition-colors">
                             <span class="material-symbols-outlined text-lg">file_download</span>
                             Export CSV
                         </button>
                         <button class="flex items-center gap-2 px-4 py-2 bg-primary rounded-lg text-white text-sm font-bold shadow-sm hover:bg-opacity-90 transition-colors">
                             <span class="material-symbols-outlined text-lg">add</span>
                             Create Order
                         </button>
                     </div>
                 </div>
                 <!-- Stats Overview -->
                 <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                     <div class="bg-white dark:bg-white/5 border border-[#e6e0db] dark:border-white/10 rounded-xl p-6 flex flex-col gap-2 shadow-sm">
                         <div class="flex justify-between items-start">
                             <p class="text-[#897261] dark:text-gray-400 text-sm font-medium uppercase tracking-wider">Total Orders</p>
                             <span class="material-symbols-outlined text-primary">shopping_bag</span>
                         </div>
                         <p class="text-[#181411] dark:text-white text-3xl font-black">1,284</p>
                         <div class="flex items-center gap-1 text-[#07880e] text-xs font-bold">
                             <span class="material-symbols-outlined text-sm">trending_up</span>
                             +12.5% this month
                         </div>
                     </div>
                     <div class="bg-white dark:bg-white/5 border border-[#e6e0db] dark:border-white/10 rounded-xl p-6 flex flex-col gap-2 shadow-sm">
                         <div class="flex justify-between items-start">
                             <p class="text-[#897261] dark:text-gray-400 text-sm font-medium uppercase tracking-wider">Pending Orders</p>
                             <span class="material-symbols-outlined text-primary">schedule</span>
                         </div>
                         <p class="text-[#181411] dark:text-white text-3xl font-black">42</p>
                         <div class="flex items-center gap-1 text-[#07880e] text-xs font-bold">
                             <span class="material-symbols-outlined text-sm">trending_up</span>
                             +5.2% since yesterday
                         </div>
                     </div>
                     <div class="bg-white dark:bg-white/5 border border-[#e6e0db] dark:border-white/10 rounded-xl p-6 flex flex-col gap-2 shadow-sm">
                         <div class="flex justify-between items-start">
                             <p class="text-[#897261] dark:text-gray-400 text-sm font-medium uppercase tracking-wider">Net Revenue</p>
                             <span class="material-symbols-outlined text-primary">payments</span>
                         </div>
                         <p class="text-[#181411] dark:text-white text-3xl font-black">$12,450.00</p>
                         <div class="flex items-center gap-1 text-[#e71008] text-xs font-bold">
                             <span class="material-symbols-outlined text-sm">trending_down</span>
                             -2.4% last 7 days
                         </div>
                     </div>
                 </div>
                 <!-- Filters and Table Container -->
                 <div class="bg-white dark:bg-white/5 border border-[#e6e0db] dark:border-white/10 rounded-xl overflow-hidden shadow-sm">
                     <!-- Search and Tabs Bar -->
                     <div class="flex flex-col md:flex-row md:items-center justify-between border-b border-[#e6e0db] dark:border-white/10 bg-white/50 dark:bg-black/10 px-6">
                         <div class="flex items-center gap-6 overflow-x-auto no-scrollbar">
                             <a class="flex items-center border-b-2 border-primary py-4" href="#">
                                 <p class="text-[#181411] dark:text-white text-sm font-bold">All Orders</p>
                                 <span class="ml-2 bg-[#f4f2f0] dark:bg-white/10 px-2 py-0.5 rounded-full text-[10px] text-[#181411] dark:text-gray-300 font-bold">156</span>
                             </a>
                             <a class="flex items-center border-b-2 border-transparent py-4 text-[#897261] dark:text-gray-400 hover:text-primary transition-colors" href="#">
                                 <p class="text-sm font-bold">Pending</p>
                                 <span class="ml-2 bg-[#f4f2f0]/50 dark:bg-white/5 px-2 py-0.5 rounded-full text-[10px] font-bold">42</span>
                             </a>
                             <a class="flex items-center border-b-2 border-transparent py-4 text-[#897261] dark:text-gray-400 hover:text-primary transition-colors" href="#">
                                 <p class="text-sm font-bold">Processed</p>
                                 <span class="ml-2 bg-[#f4f2f0]/50 dark:bg-white/5 px-2 py-0.5 rounded-full text-[10px] font-bold">114</span>
                             </a>
                         </div>
                         <div class="py-3 w-full md:w-80">
                             <div class="flex items-center bg-[#f4f2f0] dark:bg-white/5 border border-transparent focus-within:border-primary/50 rounded-lg px-3 transition-all">
                                 <span class="material-symbols-outlined text-[#897261] text-xl">search</span>
                                 <input class="w-full bg-transparent border-none focus:ring-0 text-sm py-2 px-2 text-[#181411] dark:text-white placeholder:text-[#897261]" placeholder="Search customer or order ID..." />
                             </div>
                         </div>
                     </div>
                     <!-- Table -->
                     <div class="overflow-x-auto">
                         <table class="w-full text-left">
                             <thead>
                                 <tr class="bg-background-light/50 dark:bg-white/5 text-[#897261] dark:text-gray-400 uppercase text-[11px] font-bold tracking-widest border-b border-[#e6e0db] dark:border-white/10">
                                     <th class="px-6 py-4">Customer</th>
                                     <th class="px-6 py-4">Contact Details</th>
                                     <th class="px-6 py-4">Status</th>
                                     <th class="px-6 py-4">Date</th>
                                     <th class="px-6 py-4 text-right">Actions</th>
                                 </tr>
                             </thead>
                             <tbody class="divide-y divide-[#e6e0db] dark:divide-white/10">
                                 <!-- Row 1 -->
                                 <tr class="hover:bg-background-light/30 dark:hover:bg-white/5 transition-colors">
                                     <td class="px-6 py-4">
                                         <div class="flex items-center gap-3">
                                             <div class="w-9 h-9 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-sm">JD</div>
                                             <div class="flex flex-col">
                                                 <span class="text-[#181411] dark:text-white font-semibold text-sm">Jane Doe</span>
                                                 <span class="text-xs text-[#897261]">ID: #ORD-9421</span>
                                             </div>
                                         </div>
                                     </td>
                                     <td class="px-6 py-4">
                                         <div class="flex flex-col">
                                             <span class="text-sm text-[#181411] dark:text-gray-300">jane.doe@example.com</span>
                                             <span class="text-xs text-[#897261]">+1 (555) 000-1234</span>
                                         </div>
                                     </td>
                                     <td class="px-6 py-4">
                                         <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-[#fff3e0] text-[#e65100]">
                                             <span class="w-1.5 h-1.5 rounded-full bg-[#e65100] mr-2"></span>
                                             Pending
                                         </span>
                                     </td>
                                     <td class="px-6 py-4">
                                         <span class="text-sm text-[#181411] dark:text-gray-300">Oct 24, 2023</span>
                                     </td>
                                     <td class="px-6 py-4 text-right">
                                         <div class="flex justify-end gap-2">
                                             <button class="flex items-center gap-1.5 px-3 py-1.5 bg-[#4caf50]/10 text-[#2e7d32] hover:bg-[#4caf50]/20 rounded text-xs font-bold transition-colors">
                                                 <span class="material-symbols-outlined text-base leading-none">check_circle</span>
                                                 Approve
                                             </button>
                                             <button class="p-1.5 text-[#e71008] hover:bg-[#e71008]/10 rounded transition-colors">
                                                 <span class="material-symbols-outlined text-xl">delete</span>
                                             </button>
                                         </div>
                                     </td>
                                 </tr>
                                 <!-- Row 2 -->
                                 <tr class="hover:bg-background-light/30 dark:hover:bg-white/5 transition-colors">
                                     <td class="px-6 py-4">
                                         <div class="flex items-center gap-3">
                                             <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-sm">MS</div>
                                             <div class="flex flex-col">
                                                 <span class="text-[#181411] dark:text-white font-semibold text-sm">Michael Smith</span>
                                                 <span class="text-xs text-[#897261]">ID: #ORD-9420</span>
                                             </div>
                                         </div>
                                     </td>
                                     <td class="px-6 py-4">
                                         <div class="flex flex-col">
                                             <span class="text-sm text-[#181411] dark:text-gray-300">m.smith@webmail.com</span>
                                             <span class="text-xs text-[#897261]">+1 (555) 111-5678</span>
                                         </div>
                                     </td>
                                     <td class="px-6 py-4">
                                         <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-[#e8f5e9] text-[#2e7d32]">
                                             <span class="w-1.5 h-1.5 rounded-full bg-[#2e7d32] mr-2"></span>
                                             Processed
                                         </span>
                                     </td>
                                     <td class="px-6 py-4">
                                         <span class="text-sm text-[#181411] dark:text-gray-300">Oct 23, 2023</span>
                                     </td>
                                     <td class="px-6 py-4 text-right">
                                         <div class="flex justify-end gap-2">
                                             <span class="text-xs font-medium text-[#897261] italic px-3 py-1.5">No actions needed</span>
                                             <button class="p-1.5 text-[#e71008] hover:bg-[#e71008]/10 rounded transition-colors">
                                                 <span class="material-symbols-outlined text-xl">delete</span>
                                             </button>
                                         </div>
                                     </td>
                                 </tr>
                                 <!-- Row 3 -->
                                 <tr class="hover:bg-background-light/30 dark:hover:bg-white/5 transition-colors">
                                     <td class="px-6 py-4">
                                         <div class="flex items-center gap-3">
                                             <div class="w-9 h-9 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-bold text-sm">AW</div>
                                             <div class="flex flex-col">
                                                 <span class="text-[#181411] dark:text-white font-semibold text-sm">Alice Wong</span>
                                                 <span class="text-xs text-[#897261]">ID: #ORD-9419</span>
                                             </div>
                                         </div>
                                     </td>
                                     <td class="px-6 py-4">
                                         <div class="flex flex-col">
                                             <span class="text-sm text-[#181411] dark:text-gray-300">alice.w@agency.net</span>
                                             <span class="text-xs text-[#897261]">+44 20 7946 0958</span>
                                         </div>
                                     </td>
                                     <td class="px-6 py-4">
                                         <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-[#fff3e0] text-[#e65100]">
                                             <span class="w-1.5 h-1.5 rounded-full bg-[#e65100] mr-2"></span>
                                             Pending
                                         </span>
                                     </td>
                                     <td class="px-6 py-4">
                                         <span class="text-sm text-[#181411] dark:text-gray-300">Oct 23, 2023</span>
                                     </td>
                                     <td class="px-6 py-4 text-right">
                                         <div class="flex justify-end gap-2">
                                             <button class="flex items-center gap-1.5 px-3 py-1.5 bg-[#4caf50]/10 text-[#2e7d32] hover:bg-[#4caf50]/20 rounded text-xs font-bold transition-colors">
                                                 <span class="material-symbols-outlined text-base leading-none">check_circle</span>
                                                 Approve
                                             </button>
                                             <button class="p-1.5 text-[#e71008] hover:bg-[#e71008]/10 rounded transition-colors">
                                                 <span class="material-symbols-outlined text-xl">delete</span>
                                             </button>
                                         </div>
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                     <!-- Pagination -->
                     <div class="px-6 py-4 border-t border-[#e6e0db] dark:border-white/10 flex items-center justify-between bg-white/50 dark:bg-black/5">
                         <p class="text-xs text-[#897261]">Showing 1 to 10 of 156 entries</p>
                         <div class="flex gap-2">
                             <button class="px-3 py-1 bg-[#f4f2f0] dark:bg-white/5 border border-[#e6e0db] dark:border-white/10 rounded text-xs font-bold text-[#897261] hover:bg-white transition-colors disabled:opacity-50" disabled="">Previous</button>
                             <button class="px-3 py-1 bg-primary text-white border border-primary rounded text-xs font-bold">1</button>
                             <button class="px-3 py-1 bg-white dark:bg-white/5 border border-[#e6e0db] dark:border-white/10 rounded text-xs font-bold text-[#181411] dark:text-gray-300 hover:bg-gray-50 transition-colors">2</button>
                             <button class="px-3 py-1 bg-white dark:bg-white/5 border border-[#e6e0db] dark:border-white/10 rounded text-xs font-bold text-[#181411] dark:text-gray-300 hover:bg-gray-50 transition-colors">3</button>
                             <button class="px-3 py-1 bg-white dark:bg-white/5 border border-[#e6e0db] dark:border-white/10 rounded text-xs font-bold text-[#181411] dark:text-gray-300 hover:bg-gray-50 transition-colors">Next</button>
                         </div>
                     </div>
                 </div>
             </div>
         </main>
     </div>
 </div>