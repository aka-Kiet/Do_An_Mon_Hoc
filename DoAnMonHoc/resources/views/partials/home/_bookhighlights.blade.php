<section>
    <div class="flex justify-between items-end mb-8">
        <h2 class="text-2xl font-bold text-brown-dark dark:text-white border-l-4 border-brown-primary dark:border-neon-red pl-3 transition-colors">
            Sách Nổi Bật <i class="fas fa-star text-yellow-400"></i>
        </h2>
        <a href="#" class="text-sm font-semibold underline text-stone-500 dark:text-slate-400 hover:text-brown-primary dark:hover:text-neon-red transition-colors">
            Xem tất cả
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        
        @foreach ($highlightBooks as $book)
        <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">

            <div class="h-64 overflow-hidden relative p-4">
                
                <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110">
                    <i class="far fa-heart text-lg"></i>
                </button>
        
                <a href="{{ route('product.show', ['id' => $book->id]) }}" class="block w-full h-full">
                    <img src="{{ asset($book->image) }}" 
                         alt="{{ $book->name }}" class="w-full h-full object-contain rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                </a>
                
                <div class="absolute inset-0 bg-stone-900/10 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px] gap-3">
                    
                    {{-- 1. NÚT XEM CHI TIẾT (Mới thêm) --}}
                    <a href="{{ route('product.show', ['id' => $book->id]) }}" 
                       class="w-10 h-10 rounded-full bg-white text-stone-700 dark:bg-slate-700 dark:text-white flex items-center justify-center shadow-lg hover:bg-brown-primary hover:text-white dark:hover:bg-neon-red transition-all duration-300 transform translate-y-4 group-hover:translate-y-0"
                       title="Xem chi tiết">
                        <i class="fas fa-eye"></i>
                    </a>

                    {{-- 2. NÚT THÊM GIỎ HÀNG --}}
                    <button class="w-10 h-10 rounded-full bg-brown-primary text-white dark:bg-neon-red flex items-center justify-center shadow-lg hover:bg-brown-dark dark:hover:bg-red-700 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0 delay-75"
                            title="Thêm vào giỏ">
                        <i class="fas fa-cart-plus"></i>
                    </button>
                </div>
            </div>
            
            <div class="px-5 pb-5 pt-2">
                <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">
                    {{-- Gắn link vào tên sách --}}
                    <a href="{{ route('product.show', ['id' => $book->id]) }}">
                        {{ $book->name }}
                    </a>
                </h3>
                <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">{{ $book->author->name }}</p>
                
                <div class="flex justify-between items-center">
                    <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red dark:drop-shadow-[0_0_5px_rgba(255,23,68,0.5)]">
                        {{ number_format($book->price) }}đ
                    </span>
                    <div class="flex items-center text-yellow-500 text-xs">
                        <i class="fas fa-star mr-1"></i>
                        <span class="font-medium">
                            {{ number_format($book->avg_rating ?? 0, 1) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>