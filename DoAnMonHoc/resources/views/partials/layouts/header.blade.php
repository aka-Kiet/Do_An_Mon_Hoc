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

                {{-- 1. TRANG CHỦ --}}
                <a href="{{ route('home.index') }}" 
                   class="nav-item {{ request()->routeIs('home.index') ? 'active' : '' }}">
                    Trang Chủ
                </a>
            
                {{-- 2. SẢN PHẨM --}}
                <a href="{{ route('product.index') }}" 
                   class="nav-item {{ request()->routeIs('product.*') ? 'active' : '' }}">
                    Sản Phẩm
                </a>
            
                {{-- 3. GIỚI THIỆU --}}
                <a href="{{ route('home.about') }}" 
                   class="nav-item {{ request()->routeIs('home.about') ? 'active' : '' }}">
                    Giới Thiệu
                </a>
            
                {{-- 4. LIÊN HỆ --}}
                <a href="{{ route('home.contact') }}" 
                   class="nav-item {{ request()->routeIs('home.contact') ? 'active' : '' }}">
                    Liên Hệ
                </a>
            
                {{-- 5. CHÍNH SÁCH --}}
                <a href="{{ route('home.policy') }}" 
                   class="nav-item {{ request()->routeIs('home.policy') ? 'active' : '' }}">
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

                <a href="{{ route('cart.index') }}" 
                class="cart-btn group flex items-center gap-1 {{ request()->routeIs('cart.index') ? 'active' : '' }}">

                    <div class="relative p-2 transition text-inherit">
                        <i class="fas fa-shopping-bag text-xl"></i>

                        @if ($headerCartCount > 0)
                            <span
                                class="cart-badge absolute top-0 right-0 bg-brown-primary dark:bg-neon-red
                                    text-white text-[10px] font-bold rounded-full h-4 w-4 flex
                                    items-center justify-center shadow-md">
                                {{ $headerCartCount }}
                            </span>
                        @endif
                    </div>

                    {{-- Không hiển thị tiền, chỉ giữ DOM cho JS --}}
                    <span class="cart-total hidden font-bold text-sm transition text-inherit">
                        {{ number_format($headerCartTotal) }}đ
                    </span>
                </a>


                <!-- Nút Đăng nhập / Đăng ký (hiển thị từ md trở lên) -->
                <div class="relative group z-50">

                    {{-- 1. TRƯỜNG HỢP ĐÃ ĐĂNG NHẬP --}}
                    @auth
                        <button class="flex items-center gap-3 py-1.5 px-3 rounded-full border border-transparent hover:border-stone-200 hover:bg-stone-50 dark:hover:bg-slate-800 transition-all">
                            
                            <div class="w-9 h-9 rounded-full bg-brown-primary text-white dark:bg-neon-red flex items-center justify-center font-bold text-lg shadow-md">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                
                            <div class="text-left hidden lg:block">
                                <p class="text-[10px] text-stone-400 dark:text-slate-400 font-bold uppercase tracking-wider">Xin chào,</p>
                                <p class="text-sm font-bold text-brown-dark dark:text-white leading-none max-w-[100px] truncate">
                                    {{ Auth::user()->name }}
                                </p>
                            </div>
                            
                            <i class="fas fa-chevron-down text-xs text-stone-400 ml-1 transition-transform group-hover:rotate-180"></i>
                        </button>
                
                        <div class="absolute right-0 top-full mt-2 w-60 bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-stone-100 dark:border-slate-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right">
                            
                            <div class="p-4 border-b border-stone-100 dark:border-slate-700 bg-stone-50/50 dark:bg-slate-800/50 rounded-t-2xl">
                                <p class="text-sm font-bold text-stone-800 dark:text-white">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-stone-500 dark:text-slate-400 truncate">{{ Auth::user()->email }}</p>
                            </div>
                
                            <ul class="py-2">
                                <li>
                                    <a href="{{ route('profile.index') }}" class="flex items-center px-4 py-2.5 text-sm text-stone-600 dark:text-slate-300 hover:bg-stone-50 dark:hover:bg-slate-800 hover:text-brown-primary dark:hover:text-neon-red transition-colors">
                                        <span class="w-8 text-center mr-1"><i class="fas fa-user"></i></span> 
                                        Tài khoản của tôi
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2.5 text-sm text-stone-600 dark:text-slate-300 hover:bg-stone-50 dark:hover:bg-slate-800 hover:text-brown-primary dark:hover:text-neon-red transition-colors">
                                        <span class="w-8 text-center mr-1"><i class="fas fa-box-open"></i></span> 
                                        Đơn mua
                                    </a>
                                </li>
                                
                                <li class="border-t border-stone-100 dark:border-slate-700 my-1"></li>
                                
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-full text-left flex items-center px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors font-bold">
                                            <span class="w-8 text-center mr-1"><i class="fas fa-sign-out-alt"></i></span> 
                                            Đăng xuất
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                
                    {{-- 2. TRƯỜNG HỢP CHƯA ĐĂNG NHẬP (Code cũ của bạn) --}}
                    @guest
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('login') }}" class="px-4 py-1.5 rounded-full font-bold text-sm text-stone-600 hover:text-brown-primary hover:bg-stone-100 dark:text-slate-300 dark:hover:text-white dark:hover:bg-slate-800 transition-all">
                                Đăng nhập
                            </a>
                    
                            <a href="{{ route('register') }}" class="px-5 py-1.5 rounded-full font-bold text-sm bg-brown-primary text-white hover:bg-brown-dark dark:bg-transparent dark:border dark:border-neon-red dark:text-neon-red dark:hover:bg-neon-red dark:hover:text-white transition-all">
                                Đăng ký
                            </a>
                        </div>
                    @endguest
                
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