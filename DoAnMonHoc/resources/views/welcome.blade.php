@extends('layouts.app')

@section('content')

<main class="pt-24 pb-12 px-4 container mx-auto">
        
    <!-- Phần Mở Đầu & Hero Slider (Banner trượt) -->
    <section class="relative mb-16 h-[500px] rounded-3xl overflow-hidden shadow-2xl group">

        <div id="hero-slider" class="relative w-full h-full">
    
            <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-100 z-10" data-index="0">
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1507842217343-583bb726cc2e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                         class="w-full h-full object-cover" alt="Library">
                    <div class="absolute inset-0 bg-gradient-to-r from-white/90 via-white/40 to-transparent dark:from-black/90 dark:via-black/50 dark:to-transparent transition-colors duration-500"></div>
                </div>
                
                <div class="absolute inset-0 flex items-center px-8 md:px-20">
                    <div class="max-w-xl space-y-6 transform translate-y-0 transition-transform duration-700 delay-300 slide-content">
                        <span class="inline-block py-1 px-3 rounded-lg bg-brown-primary/20 text-brown-dark font-bold text-sm tracking-widest dark:text-neon-red dark:bg-neon-red/10 border border-brown-primary/30 dark:border-neon-red/50 backdrop-blur-md">
                            BỘ SƯU TẬP MỚI
                        </span>
                        <h1 class="text-5xl md:text-7xl font-bold text-brown-dark dark:text-white leading-tight">
                            Tri thức là <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brown-primary to-yellow-600 dark:from-neon-red dark:to-purple-500">Vô Tận</span>
                        </h1>
                        <p class="text-lg text-stone-600 dark:text-slate-300 font-medium max-w-md glass p-4 rounded-xl border-l-4 border-brown-primary dark:border-neon-red">
                            Khám phá kho tàng sách cổ điển và hiện đại. Nơi mỗi trang sách là một chân trời mới.
                        </p>
                        <button class="px-8 py-3 rounded-full bg-brown-primary text-white font-bold hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700 dark:hover:shadow-[0_0_20px_rgba(255,23,68,0.6)] transition-all duration-300 shadow-lg hover:translate-x-2">
                            Khám Phá Ngay <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
    
            <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-0 z-0" data-index="1">
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1516110833967-0b5716ca1387?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                         class="w-full h-full object-cover" alt="AI Technology">
                    <div class="absolute inset-0 bg-gradient-to-r from-stone-900/90 via-stone-800/50 to-transparent dark:from-black/90 dark:via-blue-900/40 dark:to-transparent"></div>
                </div>
                
                <div class="absolute inset-0 flex items-center px-8 md:px-20">
                    <div class="max-w-xl space-y-6 transform translate-y-10 transition-transform duration-700 delay-300 slide-content">
                        <span class="inline-block py-1 px-3 rounded-lg bg-blue-500/20 text-blue-800 dark:text-cyan-400 font-bold text-sm tracking-widest border border-blue-500/30 backdrop-blur-md">
                            CÔNG NGHỆ 2026
                        </span>
                        <h1 class="text-5xl md:text-7xl font-bold text-white leading-tight">
                            Tương lai <br>
                            <span class="text-cyan-500 dark:text-cyan-400 drop-shadow-[0_0_10px_rgba(34,211,238,0.8)]">Kỹ Thuật Số</span>
                        </h1>
                        <p class="text-lg text-gray-200 font-medium max-w-md glass p-4 rounded-xl border-l-4 border-cyan-500">
                            Cập nhật những xu hướng công nghệ mới nhất: AI, Blockchain và Vũ trụ ảo.
                        </p>
                        <button class="px-8 py-3 rounded-full bg-cyan-600 text-white font-bold hover:bg-cyan-700 hover:shadow-[0_0_20px_rgba(8,145,178,0.6)] transition-all duration-300 shadow-lg hover:translate-x-2">
                            Xem Sách Tech <i class="fas fa-microchip ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
    
            <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-0 z-0" data-index="2">
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1518621736915-f3b1c41bfd00?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                         class="w-full h-full object-cover" alt="Reading">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute inset-0 bg-black/20"></div>
                </div>
                
                <div class="absolute inset-0 flex items-center justify-center text-center px-4">
                    <div class="max-w-3xl space-y-6 transform translate-y-10 transition-transform duration-700 delay-300 slide-content">
                        <h1 class="text-5xl md:text-7xl font-serif font-bold text-white drop-shadow-lg">
                            Những Câu Chuyện <br>
                            <span class="italic text-yellow-400">Chạm Đến Trái Tim</span>
                        </h1>
                        <p class="text-xl text-white font-light drop-shadow-md">
                            Tuyển tập tiểu thuyết lãng mạn bán chạy nhất tháng này.
                        </p>
                        <button class="px-10 py-3 rounded-full bg-white text-stone-900 font-bold hover:bg-yellow-400 transition-all duration-300 shadow-xl hover:-translate-y-1">
                            Đọc Thử <i class="fas fa-book-open ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
    
        </div>
    
        <button id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full glass bg-white/30 dark:bg-black/30 hover:bg-white/80 dark:hover:bg-neon-red/80 text-white dark:text-white flex items-center justify-center backdrop-blur-md transition-all duration-300 opacity-0 group-hover:opacity-100 z-20">
            <i class="fas fa-chevron-left text-xl"></i>
        </button>
        <button id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full glass bg-white/30 dark:bg-black/30 hover:bg-white/80 dark:hover:bg-neon-red/80 text-white dark:text-white flex items-center justify-center backdrop-blur-md transition-all duration-300 opacity-0 group-hover:opacity-100 z-20">
            <i class="fas fa-chevron-right text-xl"></i>
        </button>
    
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-3 z-20">
            <button class="indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300 active-dot ring-2 ring-offset-2 ring-brown-primary dark:ring-neon-red" data-slide="0"></button>
            <button class="indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300" data-slide="1"></button>
            <button class="indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300" data-slide="2"></button>
        </div>
    </section>

    <!-- Phần Danh Mục Sách (Categories) -->
    <section class="mb-16">
        <div class="flex justify-between items-end mb-8">
            <h2 class="text-3xl font-bold text-brown-dark dark:text-white border-l-4 border-brown-primary dark:border-neon-red pl-4 transition-colors">
                Khám Phá Danh Mục
            </h2>
            <a href="#" class="hidden md:flex items-center text-sm font-semibold text-stone-500 hover:text-brown-primary dark:text-slate-400 dark:hover:text-neon-red transition-colors group">
                Tất cả danh mục <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
            </a>
        </div>
    
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    
            <a href="#" class="group relative p-6 rounded-3xl glass bg-white/40 dark:bg-slate-800/40 border border-white/50 dark:border-white/5 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl dark:hover:shadow-[0_0_20px_rgba(244,63,94,0.3)] dark:hover:border-rose-500/50 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-rose-100/0 to-rose-100/50 dark:from-rose-900/0 dark:to-rose-900/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                <div class="relative z-10 flex flex-col items-center text-center space-y-3">
                    <div class="w-14 h-14 rounded-full bg-rose-100 text-rose-600 dark:bg-rose-900/50 dark:text-rose-400 flex items-center justify-center text-2xl mb-1 group-hover:scale-110 transition-transform duration-300 shadow-sm">
                        <i class="fas fa-feather-alt"></i>
                    </div>
                    <h3 class="font-bold text-lg text-stone-800 dark:text-white group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors">Văn Học</h3>
                    <span class="text-xs font-medium text-stone-500 dark:text-slate-400 bg-white/50 dark:bg-black/30 px-3 py-1 rounded-full backdrop-blur-sm">1.2k cuốn</span>
                </div>
            </a>
    
            <a href="#" class="group relative p-6 rounded-3xl glass bg-white/40 dark:bg-slate-800/40 border border-white/50 dark:border-white/5 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl dark:hover:shadow-[0_0_20px_rgba(59,130,246,0.3)] dark:hover:border-blue-500/50 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-100/0 to-blue-100/50 dark:from-blue-900/0 dark:to-blue-900/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                <div class="relative z-10 flex flex-col items-center text-center space-y-3">
                    <div class="w-14 h-14 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400 flex items-center justify-center text-2xl mb-1 group-hover:scale-110 transition-transform duration-300 shadow-sm">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="font-bold text-lg text-stone-800 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Kinh Tế</h3>
                    <span class="text-xs font-medium text-stone-500 dark:text-slate-400 bg-white/50 dark:bg-black/30 px-3 py-1 rounded-full backdrop-blur-sm">850 cuốn</span>
                </div>
            </a>
    
            <a href="#" class="group relative p-6 rounded-3xl glass bg-white/40 dark:bg-slate-800/40 border border-white/50 dark:border-white/5 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl dark:hover:shadow-[0_0_20px_rgba(245,158,11,0.3)] dark:hover:border-amber-500/50 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-100/0 to-amber-100/50 dark:from-amber-900/0 dark:to-amber-900/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                <div class="relative z-10 flex flex-col items-center text-center space-y-3">
                    <div class="w-14 h-14 rounded-full bg-amber-100 text-amber-600 dark:bg-amber-900/50 dark:text-amber-400 flex items-center justify-center text-2xl mb-1 group-hover:scale-110 transition-transform duration-300 shadow-sm">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="font-bold text-lg text-stone-800 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors">Kỹ Năng</h3>
                    <span class="text-xs font-medium text-stone-500 dark:text-slate-400 bg-white/50 dark:bg-black/30 px-3 py-1 rounded-full backdrop-blur-sm">2.4k cuốn</span>
                </div>
            </a>
    
            <a href="#" class="group relative p-6 rounded-3xl glass bg-white/40 dark:bg-slate-800/40 border border-white/50 dark:border-white/5 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl dark:hover:shadow-[0_0_20px_rgba(168,85,247,0.3)] dark:hover:border-purple-500/50 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-100/0 to-purple-100/50 dark:from-purple-900/0 dark:to-purple-900/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                <div class="relative z-10 flex flex-col items-center text-center space-y-3">
                    <div class="w-14 h-14 rounded-full bg-purple-100 text-purple-600 dark:bg-purple-900/50 dark:text-purple-400 flex items-center justify-center text-2xl mb-1 group-hover:scale-110 transition-transform duration-300 shadow-sm">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3 class="font-bold text-lg text-stone-800 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">Nghệ Thuật</h3>
                    <span class="text-xs font-medium text-stone-500 dark:text-slate-400 bg-white/50 dark:bg-black/30 px-3 py-1 rounded-full backdrop-blur-sm">600 cuốn</span>
                </div>
            </a>
    
        </div>
    </section>

    <!-- Phần Sách Mới Nhất (Product Grid) -->
    <section>
        <div class="flex justify-between items-end mb-8">
            <h2 class="text-2xl font-bold text-brown-dark dark:text-white border-l-4 border-brown-primary dark:border-neon-red pl-3 transition-colors">
                Sách Mới Nhất
            </h2>
            <a href="#" class="text-sm font-semibold underline text-stone-500 dark:text-slate-400 hover:text-brown-primary dark:hover:text-neon-red transition-colors">
                Xem tất cả
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            
            <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">

                <div class="h-64 overflow-hidden relative p-4">
                    
                    <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110">
                        <i class="far fa-heart text-lg"></i>
                    </button>
            
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Book" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                    
                    <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                        <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110">
                            <i class="fas fa-cart-plus mr-1"></i> Thêm
                        </button>
                    </div>
                </div>
                
                <div class="px-5 pb-5 pt-2">
                    <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">
                        Cà Phê Cùng Tony
                    </h3>
                    <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Tony Buổi Sáng</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red dark:drop-shadow-[0_0_5px_rgba(255,23,68,0.5)]">120.000đ</span>
                        <div class="flex text-yellow-500 text-xs">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">

                <div class="h-64 overflow-hidden relative p-4">
                    
                    <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110">
                        <i class="far fa-heart text-lg"></i>
                    </button>
            
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Book" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                    
                    <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                        <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110">
                            <i class="fas fa-cart-plus mr-1"></i> Thêm
                        </button>
                    </div>
                </div>
                
                <div class="px-5 pb-5 pt-2">
                    <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">
                        Cà Phê Cùng Tony
                    </h3>
                    <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Tony Buổi Sáng</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red dark:drop-shadow-[0_0_5px_rgba(255,23,68,0.5)]">120.000đ</span>
                        <div class="flex text-yellow-500 text-xs">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">

                <div class="h-64 overflow-hidden relative p-4">
                    
                    <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110">
                        <i class="far fa-heart text-lg"></i>
                    </button>
            
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Book" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                    
                    <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                        <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110">
                            <i class="fas fa-cart-plus mr-1"></i> Thêm
                        </button>
                    </div>
                </div>
                
                <div class="px-5 pb-5 pt-2">
                    <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">
                        Cà Phê Cùng Tony
                    </h3>
                    <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Tony Buổi Sáng</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red dark:drop-shadow-[0_0_5px_rgba(255,23,68,0.5)]">120.000đ</span>
                        <div class="flex text-yellow-500 text-xs">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">

                <div class="h-64 overflow-hidden relative p-4">
                    
                    <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110">
                        <i class="far fa-heart text-lg"></i>
                    </button>
            
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Book" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                    
                    <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                        <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110">
                            <i class="fas fa-cart-plus mr-1"></i> Thêm
                        </button>
                    </div>
                </div>
                
                <div class="px-5 pb-5 pt-2">
                    <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">
                        Cà Phê Cùng Tony
                    </h3>
                    <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Tony Buổi Sáng</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red dark:drop-shadow-[0_0_5px_rgba(255,23,68,0.5)]">120.000đ</span>
                        <div class="flex text-yellow-500 text-xs">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Phần Banner Quảng Cáo (Exclusive Collection) -->
    <section class="mt-24 mb-16 relative w-full h-[500px] rounded-[40px] overflow-hidden group shadow-2xl mx-auto">

        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" 
                 alt="Library Background" 
                 class="w-full h-full object-cover transform scale-100 group-hover:scale-110 transition-transform duration-[2s] ease-in-out">
        </div>
    
        <div class="absolute inset-0 bg-gradient-to-r from-stone-50/95 via-stone-100/70 to-transparent dark:from-slate-950/95 dark:via-slate-900/80 dark:to-transparent transition-colors duration-500"></div>
    
        <div class="absolute inset-0 flex items-center px-8 md:px-20">
            
            <div class="w-full md:w-3/5 relative z-10 space-y-6">
                
                <div class="inline-flex items-center space-x-2 glass px-4 py-2 rounded-full bg-brown-primary/10 text-brown-primary border-brown-primary/30 dark:bg-neon-red/10 dark:text-neon-red dark:border-neon-red/50 backdrop-blur-md shadow-sm">
                    <i class="fas fa-award"></i>
                    <span class="text-sm font-bold tracking-wider">BỘ SƯU TẬP ĐỘC QUYỀN</span>
                </div>
    
                <h2 class="text-5xl md:text-7xl font-extrabold text-brown-dark dark:text-white leading-tight drop-shadow-sm">
                    Đánh Thức <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brown-primary via-yellow-500 to-yellow-600 dark:from-neon-red dark:via-pink-500 dark:to-purple-600">
                        Trí Tuệ Của Bạn
                    </span>
                </h2>
    
                <p class="text-xl text-stone-700 dark:text-slate-300 max-w-lg font-medium leading-relaxed">
                    Tuyển tập những tác phẩm kinh điển làm thay đổi tư duy nhân loại. Phiên bản bìa cứng giới hạn chỉ có tại BookStore.
                </p>
                <div class="flex flex-wrap gap-4">
                    <!-- NÚT KHÁM PHÁ -->
                    <a href="{{ route('product.index') }}"
                    class="px-8 py-4 rounded-full bg-brown-primary text-white font-bold
                            hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700
                            transition-all duration-300 shadow-xl hover:shadow-2xl hover:-translate-y-1
                            flex items-center">
                        Khám Phá Ngay <i class="fas fa-arrow-right ml-3"></i>
                    </a>

                    <!-- NÚT REVIEW -->
                    <a href="#reviews"
                    class="px-8 py-4 rounded-full glass bg-white/50 text-brown-dark font-bold
                            hover:bg-white dark:bg-slate-800/50 dark:text-white
                            dark:hover:bg-slate-800/80 transition-all duration-300
                            flex items-center hover:-translate-y-1">
                        Xem Review
                    </a>
                </div>
            </div>
    
            <div class="hidden md:block w-2/5 relative h-full pointer-events-none">
                <div class="absolute top-1/2 right-0 -translate-y-1/2 w-[380px] h-[480px] glass bg-white/30 dark:bg-slate-900/40 rounded-3xl border-[1.5px] border-white/40 dark:border-white/10 p-5 rotate-6 group-hover:rotate-0 transition-all duration-700 ease-out shadow-[0_20px_50px_rgba(0,0,0,0.1)] dark:shadow-[0_20px_50px_rgba(0,0,0,0.5)] backdrop-blur-md overflow-hidden group/card">
                    
                    <div class="relative w-full h-full rounded-2xl overflow-hidden shadow-inner">
                        <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover" alt="Featured Book Cover">
                        <div class="absolute inset-0 bg-brown-primary/10 dark:bg-blue-900/20 mix-blend-overlay"></div>
                    </div>
    
                    <div class="absolute inset-0 rounded-3xl border-2 border-transparent dark:group-hover:border-neon-red/40 dark:group-hover:shadow-[inset_0_0_30px_rgba(255,23,68,0.2)] transition-all duration-700 pointer-events-none"></div>
                </div>
            </div>
    
        </div>
    </section>

    <!-- Phần Danh Sách Top Sản Phẩm (3 Columns) -->
    <section class="mb-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
    
            <div class="flex flex-col space-y-6">
                <h3 class="text-2xl font-bold text-brown-dark dark:text-white border-l-4 border-brown-primary dark:border-neon-red pl-3 uppercase tracking-wide">
                    Sản Phẩm Mới
                </h3>
                
                <div class="flex flex-col space-y-4">
                    <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2">
                        <img src="https://images.unsplash.com/photo-1541963463532-d68292c34b19?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Book" class="w-20 h-28 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                        <div class="flex-1 min-w-0">
                            <span class="text-[10px] font-bold text-white bg-green-500 px-2 py-0.5 rounded-full mb-1 inline-block">NEW</span>
                            <h4 class="font-bold text-stone-800 dark:text-slate-100 truncate group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Tâm Lý Học Tội Phạm</h4>
                            <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">J. M. Macdonald</p>
                            <span class="text-lg font-bold text-brown-primary dark:text-neon-red">150.000đ</span>
                        </div>
                    </a>
    
                    <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2">
                        <img src="https://images.unsplash.com/photo-1592496431122-2349e0fbc666?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Book" class="w-20 h-28 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                        <div class="flex-1 min-w-0">
                            <span class="text-[10px] font-bold text-white bg-green-500 px-2 py-0.5 rounded-full mb-1 inline-block">NEW</span>
                            <h4 class="font-bold text-stone-800 dark:text-slate-100 truncate group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Tư Duy Ngược</h4>
                            <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">Nguyễn Anh Dũng</p>
                            <span class="text-lg font-bold text-brown-primary dark:text-neon-red">99.000đ</span>
                        </div>
                    </a>
    
                    <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2">
                        <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Book" class="w-20 h-28 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                        <div class="flex-1 min-w-0">
                             <span class="text-[10px] font-bold text-white bg-green-500 px-2 py-0.5 rounded-full mb-1 inline-block">NEW</span>
                            <h4 class="font-bold text-stone-800 dark:text-slate-100 truncate group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Đắc Nhân Tâm</h4>
                            <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">Dale Carnegie</p>
                            <span class="text-lg font-bold text-brown-primary dark:text-neon-red">76.000đ</span>
                        </div>
                    </a>
                </div>
    
                <div class="pt-2 text-right">
                    <a href="#" class="text-sm font-bold text-stone-500 hover:text-brown-primary dark:text-slate-400 dark:hover:text-neon-red transition-colors flex items-center justify-end group">
                        Xem thêm <i class="fas fa-chevron-right ml-1 text-xs transition-transform group-hover:translate-x-1"></i>
                    </a>
                </div>
            </div>
    
            <div class="flex flex-col space-y-6">
                <h3 class="text-2xl font-bold text-brown-dark dark:text-white border-l-4 border-yellow-500 dark:border-yellow-400 pl-3 uppercase tracking-wide">
                    Bán Chạy Nhất
                </h3>
                
                <div class="flex flex-col space-y-4">
                    <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2">
                        <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Book" class="w-20 h-28 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                        <div class="flex-1 min-w-0">
                            <span class="text-[10px] font-bold text-white bg-red-500 px-2 py-0.5 rounded-full mb-1 inline-block">HOT 🔥</span>
                            <h4 class="font-bold text-stone-800 dark:text-slate-100 truncate group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Tony Buổi Sáng</h4>
                            <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">Đã bán: 12.5k</p>
                            <span class="text-lg font-bold text-brown-primary dark:text-neon-red">120.000đ</span>
                        </div>
                    </a>
    
                    <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2">
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Book" class="w-20 h-28 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                        <div class="flex-1 min-w-0">
                            <span class="text-[10px] font-bold text-white bg-red-500 px-2 py-0.5 rounded-full mb-1 inline-block">HOT 🔥</span>
                            <h4 class="font-bold text-stone-800 dark:text-slate-100 truncate group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Hacking Growth</h4>
                            <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">Đã bán: 8.2k</p>
                            <span class="text-lg font-bold text-brown-primary dark:text-neon-red">210.000đ</span>
                        </div>
                    </a>
    
                    <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2">
                        <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Book" class="w-20 h-28 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                        <div class="flex-1 min-w-0">
                             <span class="text-[10px] font-bold text-white bg-red-500 px-2 py-0.5 rounded-full mb-1 inline-block">HOT 🔥</span>
                            <h4 class="font-bold text-stone-800 dark:text-slate-100 truncate group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Design Patterns</h4>
                            <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">Đã bán: 5.1k</p>
                            <span class="text-lg font-bold text-brown-primary dark:text-neon-red">350.000đ</span>
                        </div>
                    </a>
                </div>
    
                <div class="pt-2 text-right">
                    <a href="#" class="text-sm font-bold text-stone-500 hover:text-brown-primary dark:text-slate-400 dark:hover:text-neon-red transition-colors flex items-center justify-end group">
                        Xem thêm <i class="fas fa-chevron-right ml-1 text-xs transition-transform group-hover:translate-x-1"></i>
                    </a>
                </div>
            </div>
    
            <div class="flex flex-col space-y-6">
                <h3 class="text-2xl font-bold text-brown-dark dark:text-white border-l-4 border-blue-500 dark:border-blue-400 pl-3 uppercase tracking-wide">
                    Đánh Giá Cao
                </h3>
                
                <div class="flex flex-col space-y-4">
                    <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2">
                        <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Book" class="w-20 h-28 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                        <div class="flex-1 min-w-0">
                            <div class="flex text-yellow-400 text-[10px] mb-1">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <h4 class="font-bold text-stone-800 dark:text-slate-100 truncate group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Nhà Giả Kim</h4>
                            <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">Paulo Coelho</p>
                            <span class="text-lg font-bold text-brown-primary dark:text-neon-red">85.000đ</span>
                        </div>
                    </a>
    
                    <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2">
                        <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Book" class="w-20 h-28 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                        <div class="flex-1 min-w-0">
                            <div class="flex text-yellow-400 text-[10px] mb-1">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <h4 class="font-bold text-stone-800 dark:text-slate-100 truncate group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Harry Potter</h4>
                            <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">J.K. Rowling</p>
                            <span class="text-lg font-bold text-brown-primary dark:text-neon-red">250.000đ</span>
                        </div>
                    </a>
    
                    <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2">
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Book" class="w-20 h-28 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                        <div class="flex-1 min-w-0">
                            <div class="flex text-yellow-400 text-[10px] mb-1">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            </div>
                            <h4 class="font-bold text-stone-800 dark:text-slate-100 truncate group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Cha Giàu Cha Nghèo</h4>
                            <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">Robert Kiyosaki</p>
                            <span class="text-lg font-bold text-brown-primary dark:text-neon-red">110.000đ</span>
                        </div>
                    </a>
                </div>
    
                <div class="pt-2 text-right">
                    <a href="#" class="text-sm font-bold text-stone-500 hover:text-brown-primary dark:text-slate-400 dark:hover:text-neon-red transition-colors flex items-center justify-end group">
                        Xem thêm <i class="fas fa-chevron-right ml-1 text-xs transition-transform group-hover:translate-x-1"></i>
                    </a>
                </div>
            </div>
    
        </div>
    </section>

    <!-- Phần Thư Viện Ảnh (Masonry Gallery) -->
    <section class="mb-8">
        <div class="flex justify-between items-end mb-8">
            <h2 class="text-3xl font-bold text-brown-dark dark:text-white border-l-4 border-brown-primary dark:border-neon-red pl-4 transition-colors">
                Góc Nghệ Thuật
            </h2>
            <p class="text-sm text-stone-500 dark:text-slate-400 italic hidden md:block">
                "Sách là giấc mơ bạn cầm trên tay."
            </p>
        </div>
    
        <div class="columns-2 md:columns-4 gap-4 space-y-4 p-2">
    
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer">
                <img src="https://images.unsplash.com/photo-1507842217343-583bb726cc2e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                     alt="Library" class="w-full h-auto rounded-2xl transform transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                    <span class="text-white font-serif italic text-lg border-b border-white pb-1">Cổ Điển</span>
                </div>
            </div>
    
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer">
                <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                     alt="Book & Coffee" class="w-full h-auto rounded-2xl transform transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                    <span class="text-white font-serif italic text-lg border-b border-white pb-1">Thư Giãn</span>
                </div>
            </div>
    
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer border-2 border-transparent dark:hover:border-neon-red/50 transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1614726365723-49cfae9e992a?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                     alt="Neon Book" class="w-full h-auto rounded-2xl transform transition-transform duration-700 group-hover:scale-110 grayscale hover:grayscale-0 transition-all">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                    <span class="text-neon-red font-bold text-lg border-b border-neon-red pb-1 shadow-[0_0_10px_rgba(255,23,68,0.8)]">Cyberpunk</span>
                </div>
            </div>
    
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer">
                <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                     alt="Bookshelf" class="w-full h-auto rounded-2xl transform transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                    <span class="text-white font-serif italic text-lg border-b border-white pb-1">Tri Thức</span>
                </div>
            </div>
    
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer bg-brown-primary dark:bg-stone-800 p-6 flex items-center justify-center text-center h-[200px]">
                <div class="relative z-10">
                    <i class="fas fa-quote-left text-3xl text-white/30 mb-2"></i>
                    <p class="text-white font-serif text-xl italic">
                        "A room without books is like a body without a soul."
                    </p>
                    <p class="text-white/60 text-xs mt-2 uppercase tracking-widest">- Cicero -</p>
                </div>
                <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:bg-white/20 transition-all"></div>
            </div>
    
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer">
                <img src="https://images.unsplash.com/photo-1519681393798-38e43269d877?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                     alt="Reading" class="w-full h-auto rounded-2xl transform transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                    <span class="text-white font-serif italic text-lg border-b border-white pb-1">Đam Mê</span>
                </div>
            </div>
    
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer">
                <img src="https://images.unsplash.com/photo-1550399105-c4db5fb85c18?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                     alt="Open Book" class="w-full h-auto rounded-2xl transform transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                    <span class="text-white font-serif italic text-lg border-b border-white pb-1">Khám Phá</span>
                </div>
            </div>
    
             <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer">
                <img src="https://images.unsplash.com/photo-1535905557558-afc4877a26fc?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                     alt="Magic Book" class="w-full h-auto rounded-2xl transform transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                    <span class="text-white font-serif italic text-lg border-b border-white pb-1">Phép Thuật</span>
                </div>
            </div>
    
        </div>
    </section>
</main>

@endsection