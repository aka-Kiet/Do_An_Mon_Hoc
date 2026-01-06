<header class="fixed w-full top-0 z-50 glass bg-white/80 dark:bg-slate-900/80 border-b border-white/20 dark:border-white/5 transition-all duration-300 backdrop-blur-md">
    <div class="container mx-auto px-6 py-3">
        <div class="flex justify-between items-center h-16">
            
            <!-- LOGO / TÊN THƯƠNG HIỆU -->
            <a href="#" class="text-2xl font-extrabold tracking-tighter hover:scale-105 transition-transform group flex-shrink-0">
                <span class="text-brown-dark dark:text-white dark:group-hover:text-neon-red transition-colors">
                    <i class="fas fa-book-open mr-2"></i>Book
                </span>
                <span class="dark:text-neon-red">Store</span>
            </a>

            <!-- NAVIGATION MENU - DESKTOP (ẩn trên mobile) -->
            <nav class="hidden lg:flex items-center space-x-8">
                <a href="index.html" class="relative font-bold text-brown-primary dark:text-neon-red transition-all group">
                    Trang Chủ
                    <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-1.5 h-1.5 rounded-full bg-brown-primary dark:bg-neon-red shadow-[0_0_8px_currentColor]"></span>
                </a>

                <a href="product.html" class="font-medium text-stone-600 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red dark:hover:drop-shadow-[0_0_5px_rgba(255,23,68,0.8)] transition-all">
                    Sản Phẩm
                </a>
                
                <a href="about.html" class="font-medium text-stone-600 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red dark:hover:drop-shadow-[0_0_5px_rgba(255,23,68,0.8)] transition-all">
                    Giới Thiệu
                </a>
                
                <a href="contact.html" class="font-medium text-stone-600 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red dark:hover:drop-shadow-[0_0_5px_rgba(255,23,68,0.8)] transition-all">
                    Liên Hệ
                </a>

                <a href="policy.html" class="font-medium text-stone-600 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red dark:hover:drop-shadow-[0_0_5px_rgba(255,23,68,0.8)] transition-all">
                    Chính Sách
                </a>
            </nav>

            <!-- CÁC NÚT HÀNH ĐỘNG BÊN PHẢI (Tìm kiếm, Dark mode, Giỏ hàng, Đăng nhập/Đăng ký, Menu mobile) -->
            <div class="flex items-center space-x-3 xl:space-x-4">
                
                <!-- Nút tìm kiếm (chỉ hiển thị trên mobile lớn hơn xl:hidden) -->
                <button class="xl:hidden p-2 text-stone-600 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red transition">
                    <i class="fas fa-search text-lg"></i>
                </button>

                <!-- Nút chuyển đổi Dark/Light mode -->
                <button id="theme-toggle" class="p-2 rounded-full hover:bg-stone-200 dark:hover:bg-slate-800 dark:text-yellow-400 transition-colors">
                    <i id="theme-icon" class="fas fa-moon text-lg"></i>
                </button>

                <!-- Giỏ hàng với badge số lượng sản phẩm -->
                <a href="#" class="relative p-2 hover:text-brown-primary dark:hover:text-neon-red transition mr-2">
                    <i class="fas fa-shopping-bag text-lg"></i>
                    <span class="absolute top-0 right-0 bg-brown-primary dark:bg-neon-red text-white text-[10px] font-bold rounded-full h-4 w-4 flex items-center justify-center shadow-md">3</span>
                </a>

                <!-- Nút Đăng nhập / Đăng ký (hiển thị từ md trở lên) -->
                <div class="hidden md:flex items-center space-x-2">
                    <button onclick="openLoginModal()" class="px-4 py-1.5 rounded-full font-bold text-sm text-stone-600 hover:text-brown-primary hover:bg-stone-100 dark:text-slate-300 dark:hover:text-white dark:hover:bg-slate-800 transition-all duration-300">
                        Đăng nhập
                    </button>

                    <button onclick="openRegisterModal()" class="px-5 py-1.5 rounded-full font-bold text-sm bg-brown-primary text-white hover:bg-brown-dark dark:bg-transparent dark:border dark:border-neon-red dark:text-neon-red dark:hover:bg-neon-red dark:hover:text-white dark:shadow-[0_0_10px_rgba(255,23,68,0.4)] transition-all duration-300">
                        Đăng ký
                    </button>
                </div>
                
                <!-- Nút mở menu mobile (chỉ hiển thị trên mobile) -->
                <button id="mobile-menu-btn" class="lg:hidden text-2xl text-brown-dark dark:text-white pl-2">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- MENU MOBILE - HIỆN KHI NHẤN NÚT BARS -->
    <div id="mobile-menu" class="hidden lg:hidden border-t border-white/20 dark:border-white/5 bg-white/95 dark:bg-slate-900/95 backdrop-blur-xl absolute w-full left-0">
        <div class="container mx-auto px-6 py-4 flex flex-col space-y-4">
            <a href="#" class="font-bold text-brown-primary dark:text-neon-red">Trang Chủ</a>
            <a href="#" class="font-medium text-stone-600 dark:text-slate-300 hover:pl-2 transition-all">Sản Phẩm</a>
            <a href="#" class="font-medium text-stone-600 dark:text-slate-300 hover:pl-2 transition-all">Giới Thiệu</a>
            <a href="#" class="font-medium text-stone-600 dark:text-slate-300 hover:pl-2 transition-all">Liên Hệ</a>
            <a href="#" class="font-medium text-stone-600 dark:text-slate-300 hover:pl-2 transition-all">Chính Sách</a>
            
            <hr class="border-stone-200 dark:border-slate-700">
            
            <!-- Nút Đăng nhập / Đăng ký trong menu mobile -->
            <div class="flex gap-3 pt-2">
                <a href="#" class="flex-1 text-center py-2.5 rounded-lg border border-stone-300 dark:border-slate-600 font-bold text-stone-600 dark:text-slate-300 hover:bg-stone-100 dark:hover:bg-slate-800 transition">
                    Đăng Nhập
                </a>
                <a href="#" class="flex-1 text-center py-2.5 rounded-lg bg-brown-primary text-white dark:bg-neon-red font-bold hover:bg-brown-dark transition shadow-lg">
                    Đăng Ký
                </a>
            </div>
        </div>
    </div>
</header>