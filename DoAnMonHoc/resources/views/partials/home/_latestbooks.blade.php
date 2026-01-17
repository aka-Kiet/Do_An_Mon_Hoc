<section class="mb-20">

    <!-- GRID CHỨA 3 CỘT -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-stretch">

        <!-- CỘT 1: SẢN PHẨM MỚI -->
        <div class="flex flex-col space-y-6 h-full">

            <!-- Tiêu đề cột -->
            <h3 class="text-2xl font-bold text-brown-dark dark:text-white border-l-4 border-brown-primary dark:border-neon-red pl-3 uppercase tracking-wide">
                Sản Phẩm Mới
            </h3>
            
            <!-- Danh sách 3 sản phẩm mới -->
            
            <div class="flex flex-col space-y-4 flex-4">
                <!-- loading item -->
                @foreach($latestBooks as $book)
                <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2 min-h-[120px]">
                    <img src="{{ asset($book->image) }}" alt="Book" class="w-24 h-36 object-contain bg-white dark:bg-slate-800 p-1 rounded-lg shadow-md">
                    <div class="flex-1 min-w-0">
                        <span class="text-[10px] font-bold text-white bg-green-500 px-2 py-0.5 rounded-full mb-1 inline-block">NEW</span>
                        <h4 class="font-bold text-stone-800 dark:text-slate-100 line-clamp-2 min-h-[2.5rem] group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">{{ $book->name }}</h4>
                        <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">{{ $book->author->name}}</p>
                        <span class="text-lg font-bold text-brown-primary dark:text-neon-red">{{ number_format($book->price, 0, ',', '.') }}đ</span>
                    </div>
                </a>
                @endforeach

            </div>

            <!-- Link xem thêm -->
            <div class="pt-2 text-right">
                <a href="#" class="text-sm font-bold text-stone-500 hover:text-brown-primary dark:text-slate-400 dark:hover:text-neon-red transition-colors flex items-center justify-end group">
                    Xem thêm <i class="fas fa-chevron-right ml-1 text-xs transition-transform group-hover:translate-x-1"></i>
                </a>
            </div>
        </div>

        <!-- CỘT 2: BÁN CHẠY NHẤT -->
        <div class="flex flex-col space-y-6 h-full">

            <!-- Tiêu đề cột -->
            <h3 class="text-2xl font-bold text-brown-dark dark:text-white border-l-4 border-yellow-500 dark:border-yellow-400 pl-3 uppercase tracking-wide">
                Bán Chạy Nhất
            </h3>
            
            <!-- Danh sách 3 sản phẩm bán chạy -->
            <div class="flex flex-col space-y-4 flex-4">

                <!-- loading item -->
                @foreach ($bestSellerBooks as $book)
                    <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2 min-h-[120px]">
                        <img src="{{ asset($book->image) }}" alt="Book" class="w-24 h-36 object-contain bg-white dark:bg-slate-800 p-1 rounded-lg shadow-md">
                        <div class="flex-1 min-w-0">
                            <span class="text-[10px] font-bold text-white bg-red-500 px-2 py-0.5 rounded-full mb-1 inline-block">HOT 🔥</span>
                            <h4 class="font-bold text-stone-800 dark:text-slate-100 line-clamp-2 min-h-[2.5rem] group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">{{ $book->name }}</h4>
                            <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">{{ $book->author->name }}</p>
                            <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">
                                Đã bán:
                                @if($book->sold_quantity >= 1000)
                                    {{ number_format($book->sold_quantity / 1000, 1) }}K🔥
                                @else
                                    {{ $book->sold_quantity }}🔥
                                @endif
                            </p>
                            <span class="text-lg font-bold text-brown-primary dark:text-neon-red">{{ number_format($book->price, 0, ',', '.') }}đ</span>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Link xem thêm -->
            <div class="pt-2 text-right">
                <a href="#" class="text-sm font-bold text-stone-500 hover:text-brown-primary dark:text-slate-400 dark:hover:text-neon-red transition-colors flex items-center justify-end group">
                    Xem thêm <i class="fas fa-chevron-right ml-1 text-xs transition-transform group-hover:translate-x-1"></i>
                </a>
            </div>
        </div>

        <!-- CỘT 3: ĐÁNH GIÁ CAO -->
        <div class="flex flex-col space-y-6 h-full">

            <!-- Tiêu đề cột -->
            <h3 class="text-2xl font-bold text-brown-dark dark:text-white border-l-4 border-blue-500 dark:border-blue-400 pl-3 uppercase tracking-wide">
                Đánh Giá Cao
            </h3>
            
            <!-- Danh sách 3 sản phẩm đánh giá cao -->
            <div class="flex flex-col space-y-4 flex-4">

                <!-- loading item -->
                @foreach ($topRatedBooks as $book)
                <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2 min-h-[120px]">
                    <img src="{{ asset($book->image) }}" alt="Book" class="w-24 h-36 object-contain bg-white dark:bg-slate-800 p-1 rounded-lg shadow-md">
                    <div class="flex-1 min-w-0">
                        {{-- Đánh giá sách --}}
                        <div class="flex items-center text-yellow-400 text-[10px] mb-1">
                            <i class="fas fa-star mr-1"></i> {{-- 1 icon sao đại diện --}}
                            
                            <span class="text-stone-600 dark:text-slate-300 font-medium">
                                {{ number_format($book->avg_rating ?? 0, 1) }} {{-- Hiển thị điểm số (VD: 4.8) --}}
                            </span>
                        </div>
                        <h4 class="font-bold text-stone-800 dark:text-slate-100 line-clamp-2 min-h-[2.5rem] group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">{{ $book->name }}</h4>
                        <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">{{ $book->author->name }}</p>
                        <span class="text-lg font-bold text-brown-primary dark:text-neon-red">{{ number_format($book->price, 0, ',', '.') }}đ</span>
                    </div>
                </a>
                @endforeach
            </div>

            <!-- Link xem thêm -->
            <div class="pt-2 text-right">
                <a href="#" class="text-sm font-bold text-stone-500 hover:text-brown-primary dark:text-slate-400 dark:hover:text-neon-red transition-colors flex items-center justify-end group">
                    Xem thêm <i class="fas fa-chevron-right ml-1 text-xs transition-transform group-hover:translate-x-1"></i>
                </a>
            </div>
        </div>

    </div>
    
</section>