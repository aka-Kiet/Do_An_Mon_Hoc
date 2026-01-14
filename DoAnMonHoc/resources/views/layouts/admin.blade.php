<!DOCTYPE html>
<html lang="vi" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BookStore</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/admin_style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Outfit', 'sans-serif'] },
                    colors: {
                        'brown-primary': '#8D6E63',
                        'brown-dark': '#5D4037',
                        'neon-red': '#FF1744',
                    }
                }
            }
        }
    </script>

</head>

<body class="text-stone-800 dark:text-slate-200 antialiased">

    <div class="flex min-h-screen">

        <aside class="w-64 fixed h-full z-20 glass bg-white/90 dark:bg-slate-900/90 border-r border-white/20 dark:border-white/5 flex flex-col transition-transform duration-300 -translate-x-full lg:translate-x-0" id="sidebar">
            
            <div class="h-20 flex items-center justify-center border-b border-stone-200 dark:border-slate-800">
                <a href="#" class="text-2xl font-extrabold tracking-tighter">
                    <span class="text-brown-dark dark:text-white"><i class="fas fa-book-open mr-2"></i>Book</span><span class="dark:text-neon-red">Admin</span>
                </a>
            </div>

            <nav class="flex-grow py-6 px-4 space-y-2 overflow-y-auto">
                <p class="text-xs font-bold text-stone-400 dark:text-slate-500 uppercase px-4 mb-2 tracking-wider">Tổng quan</p>
                
                <a href="/admin.html" class="nav-item active flex items-center px-4 py-3 rounded-lg font-medium hover:bg-stone-100 dark:hover:bg-slate-800 transition-all">
                    <i class="fas fa-th-large w-6"></i> Dashboard
                </a>
                
                <p class="text-xs font-bold text-stone-400 dark:text-slate-500 uppercase px-4 mb-2 mt-6 tracking-wider">Quản lý</p>
                
                <a href="./admin_product.html" class="nav-item flex items-center px-4 py-3 rounded-lg font-medium text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-800 hover:text-brown-primary dark:hover:text-neon-red transition-all">
                    <i class="fas fa-book w-6"></i> Sản phẩm
                </a>
                <a href="./admin_category.html" class="nav-item flex items-center px-4 py-3 rounded-lg font-medium text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-800 hover:text-brown-primary dark:hover:text-neon-red transition-all">
                    <i class="fas fa-list-alt w-6"></i> Danh mục
                </a>
                <a href="./admin_order.html" class="nav-item flex items-center px-4 py-3 rounded-lg font-medium text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-800 hover:text-brown-primary dark:hover:text-neon-red transition-all">
                    <div class="relative">
                        <i class="fas fa-shopping-cart w-6"></i>
                        <span class="absolute -top-1 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </div>
                    Đơn hàng
                </a>
                <a href="./admin_user.html"class="nav-item flex items-center px-4 py-3 rounded-lg font-medium text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-800 hover:text-brown-primary dark:hover:text-neon-red transition-all">
                    <i class="fas fa-users w-6"></i> Khách hàng
                </a>

                <p class="text-xs font-bold text-stone-400 dark:text-slate-500 uppercase px-4 mb-2 mt-6 tracking-wider">Hệ thống</p>
                
                <a href="./admin.html" class="nav-item flex items-center px-4 py-3 rounded-lg font-medium text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-800 hover:text-brown-primary dark:hover:text-neon-red transition-all">
                    <i class="fas fa-cog w-6"></i> Cài đặt
                </a>
            </nav>

            <form action="{{ route('logout') }}" method="POST">
                    @csrf
                <div class="p-4 border-t border-stone-200 dark:border-slate-800">
                    <a href="#" class="flex items-center px-4 py-2 rounded-lg text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all font-bold">
                        <i class="fas fa-sign-out-alt w-6"></i><button type="submit">Đăng xuất</button> 
                    </a>
                </div>
            </form>
        </aside>

        <div class="flex-1 flex flex-col lg:ml-64 transition-all">
            
            <header class="h-20 glass bg-white/50 dark:bg-slate-900/50 border-b border-white/20 dark:border-white/5 sticky top-0 z-10 px-6 flex justify-between items-center backdrop-blur-md transition-colors duration-300">
    
                <button id="sidebar-toggle" class="lg:hidden text-2xl text-brown-dark dark:text-white mr-4 focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            
                <div class="relative hidden md:block w-96">
                    <input type="text" placeholder="Tìm kiếm đơn hàng, sản phẩm..." class="w-full pl-10 pr-4 py-2 rounded-full bg-white/60 dark:bg-slate-800/60 border border-stone-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-brown-primary dark:focus:ring-neon-red text-stone-700 dark:text-white transition-all placeholder-stone-400 dark:placeholder-slate-500">
                    <i class="fas fa-search absolute left-3 top-2.5 text-stone-400 dark:text-slate-500"></i>
                </div>
            
                <div class="flex items-center space-x-4">
                    <button id="theme-toggle" class="w-10 h-10 rounded-full hover:bg-stone-200 dark:hover:bg-slate-800 text-stone-600 dark:text-yellow-400 transition-colors flex items-center justify-center">
                        <i id="theme-icon" class="fas fa-moon text-lg"></i>
                    </button>
            
                    <div class="relative group">
                        
                        <button class="flex items-center space-x-3 pl-4 border-l border-stone-300 dark:border-slate-700 focus:outline-none">
                            <div class="text-right hidden md:block">
                                <p class="text-sm font-bold text-brown-dark dark:text-white leading-tight">
                                    {{ Auth::user()->name }}
                                </p>
                                <p class="text-[10px] font-bold text-stone-500 dark:text-slate-400 uppercase tracking-wider">
                                    {{ Auth::user()->role === 'admin' ? 'Administrator' : 'Nhân viên' }}
                                </p>
                            </div>
                            
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&color=fff" 
                                 alt="Admin Avatar" 
                                 class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-700 shadow-sm object-cover">
                        </button>
            
                        <div class="absolute right-0 top-full mt-2 w-48 bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-stone-100 dark:border-slate-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-right z-50">
                            <div class="py-1">
                                <p class="px-4 py-2 text-xs text-stone-400 dark:text-slate-500 border-b border-stone-100 dark:border-slate-700 truncate">
                                    {{ Auth::user()->email }}
                                </p>
                                
                                <a href="#" class="block px-4 py-2 text-sm text-stone-700 dark:text-slate-300 hover:bg-stone-100 dark:hover:bg-slate-700 hover:text-brown-primary">
                                    <i class="fas fa-user-cog mr-2"></i> Hồ sơ
                                </a>
                                
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 font-medium transition-colors">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Đăng xuất
                                    </button>
                                </form>
                            </div>
                        </div>
            
                    </div>
                </div>
            </header>

            <main class="p-6 space-y-8">
                
                @yield('content')

            </main>
        </div>
    </div>

    <script src="js/admin_script.js"></script>

</body>
</html>