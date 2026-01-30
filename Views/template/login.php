<!-- Main Content: Split Screen -->
<main class="flex-grow flex items-center justify-center py-12 px-6">
    <div class="flex flex-col lg:flex-row max-w-[1100px] w-full bg-white dark:bg-[#2c1f15] rounded-xl overflow-hidden shadow-xl">
        <!-- Left Side: Visual Content -->
        <div class="hidden lg:flex flex-1 relative min-h-[600px] bg-primary/10">
            <div class="absolute inset-0 bg-gradient-to-br from-primary/40 to-primary/80 mix-blend-multiply z-10"></div>
            <img alt="Cozy interior with warm atmosphere" class="absolute inset-0 w-full h-full object-cover" data-alt="Modern interior with warm cozy lighting and plants" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBOycOpSw-97AXdqR0eHQIxQutVxbbaSk3SrPE2jJkUxY4u8Q9bwW_Jx7HMvW9b3A9dG7ViQHtjoEp3Lu9dBaqCJYYKWshuwIwXdQhF8lnSCDXwdT949qR9iY_5tUwHTxnJgQCr1mUFBYeOVPgyf5Wv8x9naAasInP1OSYQ0Uzss95z5p1Fw5sVMKe70OT_H0PZ_cNDsvo0DDafbTzrK7RGYpedVdP0E-DTf9XeqAcOLTzKaZ9SAyJFW4UdENJ9a7_8DVPudpU" />
            <div class="relative z-20 flex flex-col justify-end p-12 text-white">
                <h1 class="text-4xl font-bold mb-4">Curated for Comfort</h1>
                <p class="text-lg opacity-90 max-w-md">Discover a handpicked selection of essentials designed to bring warmth and professional style to your daily life.</p>
            </div>
        </div>
        <!-- Right Side: Form Container -->
        <div class="flex-1 flex flex-col justify-center px-8 py-12 lg:px-16">
            <div class="w-full max-w-[420px] mx-auto">
                <!-- Header Section -->
                <div class="mb-8">
                    <h2 class="text-[#181411] dark:text-white text-3xl font-bold leading-tight tracking-[-0.015em] mb-2">Welcome Back</h2>
                    <p class="text-[#897261] dark:text-[#b0a095] text-base">Please enter your details to sign in.</p>
                </div>
                <!-- Auth Tabs -->
                <div class="pb-6">
                    <div class="flex border-b border-[#e6e0db] dark:border-b-[#4a3a2d] gap-8">
                        <a href="/login" class="flex flex-col items-center justify-center border-b-[3px] border-b-primary text-primary pb-[13px] pt-4" href="#">
                            <p class="text-sm font-bold leading-normal tracking-[0.015em]">Login</p>
                        </a>
                        <a href="/signin" class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-[#897261] dark:text-[#b0a095] pb-[13px] pt-4 hover:text-[#181411] dark:hover:text-white transition-colors" href="/signin">
                            <p class="text-sm font-bold leading-normal tracking-[0.015em]">Sign Up</p>
                        </a>
                    </div>
                </div>
                <!-- Login Form -->
                <form class="space-y-4" action="/api/login" method="post" >
                    <!-- Email Field -->
                    <div class="flex flex-col w-full">
                        <p class="text-[#181411] dark:text-[#e6e0db] text-sm font-medium leading-normal pb-2">Email Address</p>
                        <input class="form-input flex w-full min-w-0 resize-none overflow-hidden rounded-lg text-[#181411] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#e6e0db] dark:border-[#4a3a2d] bg-white dark:bg-[#1a120b] focus:border-primary h-12 placeholder:text-[#897261] p-[15px] text-base font-normal leading-normal" placeholder="hello@example.com" type="email" name="email" />
                    </div>
                    <!-- Password Field -->
                    <div class="flex flex-col w-full">
                        <p class="text-[#181411] dark:text-[#e6e0db] text-sm font-medium leading-normal pb-2">Password</p>
                        <div class="relative flex w-full items-stretch rounded-lg">
                            <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#181411] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#e6e0db] dark:border-[#4a3a2d] bg-white dark:bg-[#1a120b] focus:border-primary h-12 placeholder:text-[#897261] p-[15px] pr-12 text-base font-normal leading-normal" placeholder="Enter your password" type="password" name="password" />
                            <div class="absolute right-0 flex items-center h-full pr-4 text-[#897261] cursor-pointer hover:text-primary">
                                <span class="material-symbols-outlined" style="font-size: 20px;">visibility</span>
                            </div>
                        </div>
                    </div>
                    <!-- Form Helpers -->
                    <div class="flex items-center justify-between py-2">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input class="w-4 h-4 rounded border-[#e6e0db] text-primary focus:ring-primary dark:bg-[#1a120b] dark:border-[#4a3a2d]" type="checkbox" />
                            <span class="text-sm text-[#897261] dark:text-[#b0a095] group-hover:text-[#181411] dark:group-hover:text-white">Remember me</span>
                        </label>
                        <a class="text-sm font-semibold text-primary hover:underline" href="#">Forgot password?</a>
                    </div>
                    <!-- CTA Button -->
                    <button class="w-full flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] mt-4 hover:bg-primary/90 transition-all shadow-md shadow-primary/20" type="submit">
                        Sign In
                    </button>
                    <!-- Divider -->
                    <div class="relative py-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-[#e6e0db] dark:border-[#4a3a2d]"></div>
                        </div>
                        <div class="relative flex justify-center text-xs uppercase"><span class="bg-white dark:bg-[#2c1f15] px-2 text-[#897261]">Or continue with</span></div>
                    </div>
                    <!-- Social Buttons -->
                    <div class="grid grid-cols-2 gap-4">
                        <button class="flex items-center justify-center gap-2 h-12 px-4 border border-[#e6e0db] dark:border-[#4a3a2d] rounded-lg hover:bg-background-light dark:hover:bg-[#1a120b] transition-colors" type="button">
                            <img alt="Google" class="w-5 h-5" data-alt="Google G logo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBBKG8BAXXECBO899JUuFAiz1I5d5L1XU-8c49JPuyFC1e8jcFrOAy9pgtkW_bq8moz0xF0PRPu7wxM309OEgLYLuJr3huaWtWZxTN2DjQgRQjHrZugS1C-R_YbK9j_w-jHcKST4kZPvPZHu7JQDWo_Tbip8CcDMxVFfCkjf8cgFfPG1Z1WbxrdLF936FUYVM8mnn6LM_ge-o3iHOCs7A3VJKGIYnaS4OeN01jjO183rHsjTUMlsa4QJAx9oKVa0uM2NdDPFvY" />
                            <span class="text-sm font-medium text-[#181411] dark:text-[#e6e0db]">Google</span>
                        </button>
                        <button class="flex items-center justify-center gap-2 h-12 px-4 border border-[#e6e0db] dark:border-[#4a3a2d] rounded-lg hover:bg-background-light dark:hover:bg-[#1a120b] transition-colors" type="button">
                            <span class="material-symbols-outlined text-xl">ios</span>
                            <span class="text-sm font-medium text-[#181411] dark:text-[#e6e0db]">Apple</span>
                        </button>
                    </div>
                </form>
                <p class="text-center mt-10 text-sm text-[#897261] dark:text-[#b0a095]">
                    Don't have an account?
                    <a class="text-primary font-bold hover:underline ml-1" href="#">Create Account</a>
                </p>
            </div>
        </div>
    </div>
</main>