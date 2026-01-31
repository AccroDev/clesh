<main class="flex flex-1 justify-center py-8">
    <div class="layout-content-container flex flex-col max-w-[1200px] w-full  flex-1 px-4 md:px-10">
        <!-- Breadcrumbs -->
        <nav class="flex flex-wrap gap-2 py-4">
            <a class="text-[#876964] dark:text-[#a88e8a] text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Cart</a>
            <span class="text-[#876964] dark:text-[#a88e8a] text-sm font-medium leading-normal">/</span>
            <a class="text-primary text-sm font-bold leading-normal" href="#">Delivery</a>
            <span class="text-[#876964] dark:text-[#a88e8a] text-sm font-medium leading-normal">/</span>
            <span class="text-[#876964] dark:text-[#a88e8a] text-sm font-medium leading-normal">Payment</span>
        </nav>
        <!-- Page Heading -->
        <div class="flex flex-wrap justify-between gap-3 py-4">
            <div class="flex flex-col gap-1">
                <h1 class="text-[#171211] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Checkout</h1>
                <p class="text-[#876964] dark:text-[#a88e8a] text-base font-normal leading-normal">Review your items and provide delivery details to complete your order.</p>
            </div>
        </div>
        
        <form method="post" action="/cart/confirm" class="grid grid-cols-1 lg:grid-cols-12 gap-12 mt-6 items-start">
            <!-- Left Column: Delivery Information -->
            <div class="lg:col-span-7 flex flex-col gap-8">
                <section class="bg-white dark:bg-[#2d1b18] rounded-xl border border-[#e5dddc] dark:border-[#3d2b27] p-6 shadow-sm">
                    <div class="flex items-center gap-3 border-b border-solid border-[#f4f1f0] dark:border-[#3d2b27] pb-4 mb-6">
                        <span class="material-symbols-outlined text-primary">local_shipping</span>
                        <h2 class="text-[#171211] dark:text-white text-xl font-bold leading-tight">Delivery Information</h2>
                    </div>
                    <div class="flex flex-col gap-5">
                        <!-- TextField: Full Name -->
                        <div class="flex flex-col gap-2">
                            <label class="text-[#171211] dark:text-[#f4f1f0] text-sm font-semibold leading-normal">Full Name</label>
                            <input class="form-input flex w-full rounded-lg text-[#171211] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/20 border border-[#e5dddc] dark:border-[#3d2b27] bg-white dark:bg-[#3d2b27] focus:border-primary h-12 px-4 text-base transition-all" placeholder="John Doe" type="text" name="nom" />
                        </div>
                        <!-- TextField: Phone Number -->
                        <div class="flex flex-col gap-2">
                            <label class="text-[#171211] dark:text-[#f4f1f0] text-sm font-semibold leading-normal">Phone Number</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#876964] material-symbols-outlined text-lg">call</span>
                                <input class="form-input flex w-full rounded-lg text-[#171211] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/20 border border-[#e5dddc] dark:border-[#3d2b27] bg-white dark:bg-[#3d2b27] focus:border-primary h-12 pl-11 pr-4 text-base transition-all" placeholder="+1 (555) 000-0000" type="tel" name="numero" />
                            </div>
                        </div>
                        <!-- TextField: Address -->
                        <div class="flex flex-col gap-2">
                            <label class="text-[#171211] dark:text-[#f4f1f0] text-sm font-semibold leading-normal">Detailed Delivery Address</label>
                            <textarea class="form-input flex w-full rounded-lg text-[#171211] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/20 border border-[#e5dddc] dark:border-[#3d2b27] bg-white dark:bg-[#3d2b27] focus:border-primary p-4 text-base transition-all resize-none" placeholder="Street name, Apartment, Suite, City, ZIP code" rows="4" name="adresse"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col gap-2">
                                <label class="text-[#171211] dark:text-[#f4f1f0] text-sm font-semibold leading-normal">City</label>
                                <input class="form-input flex w-full rounded-lg text-[#171211] dark:text-white border border-[#e5dddc] dark:border-[#3d2b27] bg-white dark:bg-[#3d2b27] focus:border-primary h-12 px-4 text-base transition-all" placeholder="New York" type="text" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-[#171211] dark:text-[#f4f1f0] text-sm font-semibold leading-normal">Zip Code</label>
                                <input class="form-input flex w-full rounded-lg text-[#171211] dark:text-white border border-[#e5dddc] dark:border-[#3d2b27] bg-white dark:bg-[#3d2b27] focus:border-primary h-12 px-4 text-base transition-all" placeholder="10001" type="text" />
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-white dark:bg-[#2d1b18] rounded-xl border border-[#e5dddc] dark:border-[#3d2b27] p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="material-symbols-outlined text-primary">credit_card</span>
                        <h2 class="text-[#171211] dark:text-white text-xl font-bold leading-tight">Payment Method</h2>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1 p-4 border-2 border-primary rounded-lg bg-primary/5 flex items-center justify-between cursor-pointer">
                            <span class="font-medium">Credit / Debit Card</span>
                            <span class="material-symbols-outlined text-primary">radio_button_checked</span>
                        </div>
                        <div class="flex-1 p-4 border border-[#e5dddc] dark:border-[#3d2b27] rounded-lg flex items-center justify-between cursor-pointer hover:bg-background-light dark:hover:bg-[#3d2b27] transition-colors">
                            <span class="font-medium">PayPal</span>
                            <span class="material-symbols-outlined text-[#876964]">radio_button_unchecked</span>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Right Column: Order Summary -->
            <div class="lg:col-span-5 sticky top-8">
                <div class="bg-white dark:bg-[#2d1b18] rounded-xl border border-[#e5dddc] dark:border-[#3d2b27] overflow-hidden shadow-lg">
                    <div class="p-6 border-b border-solid border-[#f4f1f0] dark:border-[#3d2b27]">
                        <h3 class="text-[#171211] dark:text-white text-xl font-bold">Order Summary</h3>
                    </div>
                    <div class="p-6 flex flex-col gap-6">
                        <!-- Item List -->
                        <div class="flex flex-col gap-4 max-h-64 overflow-y-auto pr-2">
                            <div class="flex gap-4 items-center">
                                <div class="size-16 rounded-lg bg-cover bg-center shrink-0 bg-background-light" data-alt="Minimalist ceramic table lamp in warm tones" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDJz3O6EHM_kDV7JKoqYFt9kHZfT3mjS9oe2dY0LQaM_6g47fYoCGi5M5v4AhyubwyigTkp4qnOkTer93G7q2gr7_li4kovAv9HcjExmcEI9H0tnHTj2BdyLyvk7lrD3Fnk6UyeV74JajNfX5jPIgQOwvhEyplqEJbuMzRzFznkvKVOe7hPbVXIP2IUONGj2wlKr2QW5VTbkn_dwkK3ozFOTgUXoXeLvVllePSyhQ4FUdMd0SLFQ6L0pymYWhWG8xZ5FjbUBy8')"></div>
                                <div class="flex flex-col grow">
                                    <p class="text-sm font-bold text-[#171211] dark:text-white">Ceramic Table Lamp</p>
                                    <p class="text-xs text-[#876964] dark:text-[#a88e8a]">Quantity: 1 • Terracotta</p>
                                </div>
                                <p class="text-sm font-bold text-[#171211] dark:text-white">$124.00</p>
                            </div>
                            <div class="flex gap-4 items-center">
                                <div class="size-16 rounded-lg bg-cover bg-center shrink-0 bg-background-light" data-alt="Handwoven linen throw blanket with texture" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC14uU7Buu-maLl4qQukIVmzv0KcMjJMlsheLxr4f-lGzzkeNB5qRaUt8EZwb0n8jAnSwOF8m6RQlTdWACnwHskss1hzXMgILMGkClZCnE8oKnm9vtLlLnGbFQkd09SQuxhRjUubL6I8mRVWxRMa9mZQZYzj1NT5gNVFsCiRypwni9hnXHs761ipeDDN9_Yaq2suyuzUgLIVbJp-RSzPU_Fwb_fbUJgOeIrecFURqkZEkEjvIGfJkQ7yYbuvXiH86B3biflq7E')"></div>
                                <div class="flex flex-col grow">
                                    <p class="text-sm font-bold text-[#171211] dark:text-white">Linen Throw Blanket</p>
                                    <p class="text-xs text-[#876964] dark:text-[#a88e8a]">Quantity: 2 • Sand</p>
                                </div>
                                <p class="text-sm font-bold text-[#171211] dark:text-white">$170.00</p>
                            </div>
                        </div>
                        <!-- Price Breakdown -->
                        <div class="flex flex-col gap-2 border-t border-solid border-[#f4f1f0] dark:border-[#3d2b27] pt-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-[#876964] dark:text-[#a88e8a]">Subtotal</span>
                                <span class="text-[#171211] dark:text-white font-medium">$294.00</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-[#876964] dark:text-[#a88e8a]">Shipping</span>
                                <span class="text-green-600 font-medium">Free</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-[#876964] dark:text-[#a88e8a]">Estimated Tax</span>
                                <span class="text-[#171211] dark:text-white font-medium">$23.52</span>
                            </div>
                        </div>
                        <!-- Total -->
                        <div class="flex justify-between items-center border-t border-solid border-[#f4f1f0] dark:border-[#3d2b27] pt-4">
                            <span class="text-lg font-bold text-[#171211] dark:text-white">Total Amount</span>
                            <span class="text-3xl font-black text-primary">$317.52</span>
                        </div>
                        <!-- Confirm Button -->
                        <button type="submit" class="w-full bg-primary hover:bg-[#d65d49] text-white py-4 rounded-xl font-bold text-lg shadow-lg shadow-primary/20 flex items-center justify-center gap-2 transition-all transform hover:scale-[1.01] active:scale-[0.98]">
                            <span>Confirm Order</span>
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>
                        <div class="flex items-center justify-center gap-2 text-[#876964] dark:text-[#a88e8a] text-xs">
                            <span class="material-symbols-outlined text-sm">lock</span>
                            <span>Secure SSL Encrypted Checkout</span>
                        </div>
                    </div>
                </div>
                <!-- Additional info card -->
                <div class="mt-6 p-4 rounded-lg bg-primary/5 dark:bg-primary/10 border border-primary/20 flex gap-3">
                    <span class="material-symbols-outlined text-primary">info</span>
                    <p class="text-xs text-[#171211] dark:text-[#f4f1f0] leading-normal">
                        Orders placed today are estimated to arrive by <strong>Friday, Oct 27</strong>. Free returns within 30 days.
                    </p>
                </div>
            </div>
        </form>
    </div>
</main>
