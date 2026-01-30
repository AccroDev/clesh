 <?php

    use Controllers\ProductController;

    $allProducts = ProductController::listProducts(); ?>

 <main class="flex-grow max-w-400 mx-auto w-full px-6 md:px-20 lg:px-40 py-8">
     <!-- Breadcrumbs -->
     <nav class="flex flex-wrap gap-2 mb-6">
         <a class="text-[#897261] dark:text-gray-400 text-sm font-medium hover:text-primary transition-colors" href="#">Home</a>
         <span class="text-[#897261] text-sm">/</span>
         <a class="text-[#897261] dark:text-gray-400 text-sm font-medium hover:text-primary transition-colors" href="#">Shop</a>
         <span class="text-[#897261] text-sm">/</span>
         <span class="text-primary text-sm font-semibold">All Products</span>
     </nav>
     <div class="flex flex-col lg:flex-row gap-8">
         <!-- Sidebar Navigation (Filters) -->
         <aside class="w-full lg:w-64 shrink-0">
             <div class="flex flex-col gap-6 bg-white dark:bg-white/5 p-6 rounded-xl border border-[#f4f2f0] dark:border-white/10">
                 <!-- Search Bar within Sidebar -->
                 <div>
                     <h3 class="text-sm font-bold uppercase tracking-wider text-[#897261] mb-3">Search</h3>
                     <label class="flex flex-col w-full">
                         <div class="flex w-full items-stretch rounded-lg h-10">
                             <div class="text-[#897261] flex bg-[#f4f2f0] dark:bg-white/10 items-center justify-center px-3 rounded-l-lg">
                                 <span class="material-symbols-outlined text-xl">search</span>
                             </div>
                             <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg text-[#181411] dark:text-white focus:outline-0 focus:ring-1 focus:ring-primary border-none bg-[#f4f2f0] dark:bg-white/10 px-3 text-sm font-normal" placeholder="Search furniture..." />
                         </div>
                     </label>
                 </div>
                 <!-- Categories -->
                 <div>
                     <div class="flex items-center justify-between mb-4">
                         <h3 class="text-sm font-bold uppercase tracking-wider text-[#897261]">Categories</h3>
                     </div>
                     <div class="flex flex-col gap-2">
                         <div class="flex items-center justify-between px-3 py-2 rounded-lg bg-primary/10 text-primary cursor-pointer">
                             <div class="flex items-center gap-3">
                                 <span class="material-symbols-outlined text-xl">grid_view</span>
                                 <span class="text-sm font-semibold">All Items</span>
                             </div>
                             <span class="text-xs font-bold">42</span>
                         </div>
                         <div class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-background-light dark:hover:bg-white/5 transition-colors cursor-pointer">
                             <div class="flex items-center gap-3">
                                 <span class="material-symbols-outlined text-xl">chair</span>
                                 <span class="text-sm font-medium">Furniture</span>
                             </div>
                             <span class="text-xs text-[#897261]">18</span>
                         </div>
                         <div class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-background-light dark:hover:bg-white/5 transition-colors cursor-pointer">
                             <div class="flex items-center gap-3">
                                 <span class="material-symbols-outlined text-xl">light</span>
                                 <span class="text-sm font-medium">Lighting</span>
                             </div>
                             <span class="text-xs text-[#897261]">12</span>
                         </div>
                         <div class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-background-light dark:hover:bg-white/5 transition-colors cursor-pointer">
                             <div class="flex items-center gap-3">
                                 <span class="material-symbols-outlined text-xl">pill</span>
                                 <span class="text-sm font-medium">Decor</span>
                             </div>
                             <span class="text-xs text-[#897261]">12</span>
                         </div>
                     </div>
                 </div>
                 <!-- Price Range Slider -->
                 <div>
                     <h3 class="text-sm font-bold uppercase tracking-wider text-[#897261] mb-4">Price Range</h3>
                     <div class="px-2">
                         <div class="relative h-1.5 w-full bg-[#f4f2f0] dark:bg-white/10 rounded-full">
                             <div class="absolute h-full w-2/3 bg-primary rounded-full left-0"></div>
                             <div class="absolute top-1/2 -translate-y-1/2 left-0 h-4 w-4 bg-white border-2 border-primary rounded-full shadow-sm cursor-pointer"></div>
                             <div class="absolute top-1/2 -translate-y-1/2 left-2/3 h-4 w-4 bg-white border-2 border-primary rounded-full shadow-sm cursor-pointer"></div>
                         </div>
                         <div class="flex justify-between mt-3 text-xs font-medium text-[#897261]">
                             <span>$0</span>
                             <span>$1,000+</span>
                         </div>
                     </div>
                 </div>
                 <!-- Sort By -->
                 <div>
                     <h3 class="text-sm font-bold uppercase tracking-wider text-[#897261] mb-3">Sort By</h3>
                     <select class="form-select w-full rounded-lg border-none bg-[#f4f2f0] dark:bg-white/10 text-sm focus:ring-1 focus:ring-primary py-2.5">
                         <option>Popularity</option>
                         <option>Price: Low to High</option>
                         <option>Price: High to Low</option>
                         <option>Newest Arrivals</option>
                     </select>
                 </div>
             </div>
         </aside>
         <!-- Product Listing Area -->
         <div class="flex-1">
             <div class="flex items-baseline justify-between mb-6 px-4 lg:px-0">
                 <h1 class="text-2xl font-bold">Modern Collection</h1>
                 <span class="text-sm text-[#897261]">Showing 42 products</span>
             </div>
             <!-- Products Grid -->
             <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                 <!-- Product Card 1 -->
                 <?php foreach ($allProducts as $key => $product): ?>
                     <div class="group flex flex-col bg-white dark:bg-white/5 rounded-xl border border-[#f4f2f0] dark:border-white/10 overflow-hidden hover:shadow-xl hover:shadow-primary/5 transition-all duration-300">

                         <div class="relative aspect-[4/5] overflow-hidden bg-[#f4f2f0]">
                             <img class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110"
                                 src="<?= !empty($product['image']) ? $product['image'] : '/assets/placeholder.png' ?>"
                                 alt="<?= htmlspecialchars($product['nom']) ?>" />

                             <div class="absolute top-3 left-3">
                                 <span class="text-[10px] font-bold bg-white/90 backdrop-blur px-2 py-1 rounded shadow-sm uppercase tracking-wider text-[#181411]">
                                     <?= htmlspecialchars($product['categorie'] ?? 'New') ?>
                                 </span>
                             </div>

                             <div class="absolute top-3 right-3">
                                 <a href="/add-to-cart?product_id=<?= $product['id'] ?>" class="size-9 rounded-full bg-white/90 backdrop-blur flex items-center justify-center text-[#181411] hover:text-primary transition-colors shadow-sm">
                                     <span class="material-symbols-outlined text-xl">shopping_cart</span>
                                </a>
                             </div>
                         </div>

                         <div class="p-5 flex flex-col flex-1">
                             <div class="flex justify-between items-start mb-1 gap-2">
                                 <h3 class="font-bold text-lg group-hover:text-primary transition-colors line-clamp-2 h-[3.5rem] leading-tight flex-1">
                                     <?= htmlspecialchars($product['nom']) ?>
                                 </h3>
                                 <span class="text-primary font-bold whitespace-nowrap pt-1">
                                     <?= $product['devise'] . number_format($product['prix'], 0) ?>
                                 </span>
                             </div>

                             <p class="text-sm text-[#897261] dark:text-gray-400 mb-4 line-clamp-2">
                                 <?= !empty($product['description']) ? htmlspecialchars($product['description']) : "No description available for this masterpiece." ?>
                             </p>

                             <a href="/product/<?= str_replace(" ","-",$product['nom']) . '-' . $product['id'] ?>" class="mt-auto w-full py-2.5 bg-primary text-white text-sm font-bold rounded-lg hover:bg-primary/90 transition-colors flex items-center justify-center gap-2">
                                 View Details
                             </a>
                         </div>
                     </div>
                 <?php endforeach; ?>
             </div>
             <!-- Pagination -->
             <div class="mt-12 flex justify-center items-center gap-2">
                 <button class="flex items-center justify-center size-10 rounded-lg border border-[#f4f2f0] dark:border-white/10 hover:bg-primary/10 transition-colors">
                     <span class="material-symbols-outlined">chevron_left</span>
                 </button>
                 <button class="size-10 rounded-lg bg-primary text-white font-bold">1</button>
                 <button class="size-10 rounded-lg border border-[#f4f2f0] dark:border-white/10 hover:bg-primary/10 transition-colors">2</button>
                 <button class="size-10 rounded-lg border border-[#f4f2f0] dark:border-white/10 hover:bg-primary/10 transition-colors">3</button>
                 <span class="px-2 text-[#897261]">...</span>
                 <button class="size-10 rounded-lg border border-[#f4f2f0] dark:border-white/10 hover:bg-primary/10 transition-colors">12</button>
                 <button class="flex items-center justify-center size-10 rounded-lg border border-[#f4f2f0] dark:border-white/10 hover:bg-primary/10 transition-colors">
                     <span class="material-symbols-outlined">chevron_right</span>
                 </button>
             </div>
         </div>
     </div>
 </main>