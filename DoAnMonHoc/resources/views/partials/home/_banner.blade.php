<section class="relative mb-16 h-[500px] rounded-3xl overflow-hidden shadow-2xl group">

    <!-- Container chính chứa tất cả các slide -->
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

    <!-- NÚT ĐIỀU HƯỚNG TRƯỚC / SAU (chỉ hiện khi hover section) -->
    <button id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full glass bg-white/30 dark:bg-black/30 hover:bg-white/80 dark:hover:bg-neon-red/80 text-white dark:text-white flex items-center justify-center backdrop-blur-md transition-all duration-300 opacity-0 group-hover:opacity-100 z-20">
        <i class="fas fa-chevron-left text-xl"></i>
    </button>
    <button id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full glass bg-white/30 dark:bg-black/30 hover:bg-white/80 dark:hover:bg-neon-red/80 text-white dark:text-white flex items-center justify-center backdrop-blur-md transition-all duration-300 opacity-0 group-hover:opacity-100 z-20">
        <i class="fas fa-chevron-right text-xl"></i>
    </button>

    <!-- DOTS (chỉ báo slide hiện tại & điều hướng click) -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-3 z-20">
        <button class="indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300 active-dot ring-2 ring-offset-2 ring-brown-primary dark:ring-neon-red" data-slide="0"></button>
        <button class="indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300" data-slide="1"></button>
        <button class="indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300" data-slide="2"></button>
    </div>
</section>