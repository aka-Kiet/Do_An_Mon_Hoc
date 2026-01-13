<section class="mb-20">

    <!-- GRID CHỨA 3 CỘT -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

        <!-- CỘT 1: SẢN PHẨM MỚI -->
        <div class="flex flex-col space-y-6">

            <!-- Tiêu đề cột -->
            <h3 class="text-2xl font-bold text-brown-dark dark:text-white border-l-4 border-brown-primary dark:border-neon-red pl-3 uppercase tracking-wide">
                Sản Phẩm Mới
            </h3>
            
            <!-- Danh sách 3 sản phẩm mới -->
            
            <div class="flex flex-col space-y-4">
                <!-- Item 1 -->
                @foreach($latestBooks as $book)
                <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2">
                    <img src="{{ asset($book->image) }}" alt="Book" class="w-20 h-28 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                    <div class="flex-1 min-w-0">
                        <span class="text-[10px] font-bold text-white bg-green-500 px-2 py-0.5 rounded-full mb-1 inline-block">NEW</span>
                        <h4 class="font-bold text-stone-800 dark:text-slate-100 truncate group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">{{ $book->name }}</h4>
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
        <div class="flex flex-col space-y-6">

            <!-- Tiêu đề cột -->
            <h3 class="text-2xl font-bold text-brown-dark dark:text-white border-l-4 border-yellow-500 dark:border-yellow-400 pl-3 uppercase tracking-wide">
                Bán Chạy Nhất
            </h3>
            
            <!-- Danh sách 3 sản phẩm bán chạy -->
            <div class="flex flex-col space-y-4">

                <!-- Item 1 -->
                <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2">
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Book" class="w-20 h-28 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                    <div class="flex-1 min-w-0">
                        <span class="text-[10px] font-bold text-white bg-red-500 px-2 py-0.5 rounded-full mb-1 inline-block">HOT 🔥</span>
                        <h4 class="font-bold text-stone-800 dark:text-slate-100 truncate group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Tony Buổi Sáng</h4>
                        <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">Đã bán: 12.5k</p>
                        <span class="text-lg font-bold text-brown-primary dark:text-neon-red">120.000đ</span>
                    </div>
                </a>

                <!-- Item 2-->
                <a href="#" class="flex items-start gap-4 p-3 rounded-2xl glass hover:bg-white/80 dark:hover:bg-slate-800/80 transition-all duration-300 group hover:translate-x-2">
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Book" class="w-20 h-28 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                    <div class="flex-1 min-w-0">
                        <span class="text-[10px] font-bold text-white bg-red-500 px-2 py-0.5 rounded-full mb-1 inline-block">HOT 🔥</span>
                        <h4 class="font-bold text-stone-800 dark:text-slate-100 truncate group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Hacking Growth</h4>
                        <p class="text-xs text-stone-500 dark:text-slate-400 mb-2">Đã bán: 8.2k</p>
                        <span class="text-lg font-bold text-brown-primary dark:text-neon-red">210.000đ</span>
                    </div>
                </a>

                <!-- Item 3 -->
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

            <!-- Link xem thêm -->
            <div class="pt-2 text-right">
                <a href="#" class="text-sm font-bold text-stone-500 hover:text-brown-primary dark:text-slate-400 dark:hover:text-neon-red transition-colors flex items-center justify-end group">
                    Xem thêm <i class="fas fa-chevron-right ml-1 text-xs transition-transform group-hover:translate-x-1"></i>
                </a>
            </div>
        </div>

        <!-- CỘT 3: ĐÁNH GIÁ CAO -->
        <div class="flex flex-col space-y-6">

            <!-- Tiêu đề cột -->
            <h3 class="text-2xl font-bold text-brown-dark dark:text-white border-l-4 border-blue-500 dark:border-blue-400 pl-3 uppercase tracking-wide">
                Đánh Giá Cao
            </h3>
            
            <!-- Danh sách 3 sản phẩm đánh giá cao -->
            <div class="flex flex-col space-y-4">

                <!-- Item 1 -->
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

                <!-- Item 2 -->
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

                <!-- Item 3 -->
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

            <!-- Link xem thêm -->
            <div class="pt-2 text-right">
                <a href="#" class="text-sm font-bold text-stone-500 hover:text-brown-primary dark:text-slate-400 dark:hover:text-neon-red transition-colors flex items-center justify-end group">
                    Xem thêm <i class="fas fa-chevron-right ml-1 text-xs transition-transform group-hover:translate-x-1"></i>
                </a>
            </div>
        </div>

    </div>
    
</section>