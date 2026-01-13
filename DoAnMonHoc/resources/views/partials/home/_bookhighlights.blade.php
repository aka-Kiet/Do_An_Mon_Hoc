<section>
    <!-- TIÊU ĐỀ PHẦN + LINK "XEM TẤT CẢ" -->
    <div class="flex justify-between items-end mb-8">
        <h2 class="text-2xl font-bold text-brown-dark dark:text-white border-l-4 border-brown-primary dark:border-neon-red pl-3 transition-colors">
           Sách Nổi Bật <i class="fas fa-star text-yellow-400"></i>
        </h2>
        <a href="#" class="text-sm font-semibold underline text-stone-500 dark:text-slate-400 hover:text-brown-primary dark:hover:text-neon-red transition-colors">
            Xem tất cả
        </a>
    </div>

    <!-- GRID CHỨA CÁC SẢN PHẨM SÁCH -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        
        <!-- SẢN PHẨM SÁCH (Card) - Mẫu lặp lại 4 lần -->
         @foreach ($highlightBooks as $book)
        <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">

            <!-- PHẦN HÌNH ẢNH + NÚT YÊU THÍCH + NÚT THÊM GIỎ (overlay hover) -->
            <div class="h-64 overflow-hidden relative p-4">
                
                <!-- Nút yêu thích (tim) - góc trên phải -->
                <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110">
                    <i class="far fa-heart text-lg"></i>
                </button>
        
                <!-- Ảnh bìa sách với hiệu ứng zoom khi hover -->
                <img src="{{ asset($book->image) }}" 
                     alt="{{ $book->name }}" class="w-full h-full object-contain rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                
                <!-- Overlay khi hover: nút "Thêm vào giỏ" hiện lên -->
                <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                    <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110">
                        <i class="fas fa-cart-plus mr-1"></i> Thêm
                    </button>
                </div>
            </div>
            
            <!-- PHẦN THÔNG TIN SÁCH (tên, tác giả, giá, đánh giá) -->
            <div class="px-5 pb-5 pt-2">
                <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">
                    {{ $book->name }}
                </h3>
                <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">{{ $book->author->name }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red dark:drop-shadow-[0_0_5px_rgba(255,23,68,0.5)]">{{ number_format($book->price) }}đ</span>
                    <div class="flex text-yellow-500 text-xs">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>