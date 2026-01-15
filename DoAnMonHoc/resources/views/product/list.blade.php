<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    @foreach($viewData["products"] as $product)
    <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
        <div class="h-64 overflow-hidden relative p-4">

            {{-- Logic hiển thị nhãn Giảm giá hoặc Mới (Ví dụ) --}}
            @if($product->created_at->diffInDays(now()) < 7)
            <span class="absolute top-4 left-4 z-20 bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded-md shadow-md">NEW</span>
            @endif
            
            <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
            
            {{-- Hiển thị ảnh sản phẩm --}}
            <img src="{{ asset($product->image) }}" class="w-full h-full object-contain rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
            </div>
        </div>
        <div class="px-5 pb-5 pt-2">
            {{-- Tên sách --}}
            <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">
                {{ $product->name }}
            </h3>
            
            {{-- Tên tác giả (Dùng optional để tránh lỗi nếu author bị null) --}}
            <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">
                {{ optional($product->author)->name ?? 'Đang cập nhật' }}
            </p>
            <div class="flex justify-between items-center">
                <div>
                    {{-- Giá tiền giảm giá (Format: 100.000đ) --}}
                    <span class="text-sm text-stone-400 line-through mr-1">
                        150.000đ
                    </span>
                    
                    
                    <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">
                        {{ number_format($product->price, 0, ',', '.') }}đ
                    </span>
                </div>
                {{-- Đánh giá (Hiển thị số sao trung bình từ DB) --}}
                <div class="flex text-yellow-500 text-xs">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= round($product->avg_rating))
                            <i class="fas fa-star"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>
    @endforeach



    {{-- <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
        <div class="h-64 overflow-hidden relative p-4">
            <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
            <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
            </div>
        </div>
        <div class="px-5 pb-5 pt-2">
            <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Nhà Giả Kim</h3>
            <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Paulo Coelho</p>
            <div class="flex justify-between items-center">
                <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">85.000đ</span>
                <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            </div>
        </div>
    </div>

    <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
        <div class="h-64 overflow-hidden relative p-4">
             <span class="absolute top-4 left-4 z-20 bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded-md shadow-md">NEW</span>
            <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
            <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
            </div>
        </div>
        <div class="px-5 pb-5 pt-2">
            <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Design Patterns</h3>
            <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Gang of Four</p>
            <div class="flex justify-between items-center">
                <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">350.000đ</span>
                <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            </div>
        </div>
    </div>

     <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
        <div class="h-64 overflow-hidden relative p-4">
            <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
            <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
            </div>
        </div>
        <div class="px-5 pb-5 pt-2">
            <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Clean Code</h3>
            <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Robert C. Martin</p>
            <div class="flex justify-between items-center">
                <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">400.000đ</span>
                <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
            </div>
        </div>
    </div>

    <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
        <div class="h-64 overflow-hidden relative p-4">
            <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
            <img src="https://images.unsplash.com/photo-1541963463532-d68292c34b19?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
            </div>
        </div>
        <div class="px-5 pb-5 pt-2">
            <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Tâm Lý Học Tội Phạm</h3>
            <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">J. M. Macdonald</p>
            <div class="flex justify-between items-center">
                <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">150.000đ</span>
                <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
            </div>
        </div>
    </div>

    <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
        <div class="h-64 overflow-hidden relative p-4">
            <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
            <img src="https://images.unsplash.com/photo-1592496431122-2349e0fbc666?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
            </div>
        </div>
        <div class="px-5 pb-5 pt-2">
            <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Tư Duy Ngược</h3>
            <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Nguyễn Anh Dũng</p>
            <div class="flex justify-between items-center">
                <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">99.000đ</span>
                <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            </div>
        </div>
    </div>

    <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
        <div class="h-64 overflow-hidden relative p-4">
            <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
            <img src="https://images.unsplash.com/photo-1592496431122-2349e0fbc666?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
            </div>
        </div>
        <div class="px-5 pb-5 pt-2">
            <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Tư Duy Ngược</h3>
            <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Nguyễn Anh Dũng</p>
            <div class="flex justify-between items-center">
                <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">99.000đ</span>
                <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            </div>
        </div>
    </div>

    <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
        <div class="h-64 overflow-hidden relative p-4">
            <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
            <img src="https://images.unsplash.com/photo-1592496431122-2349e0fbc666?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
            </div>
        </div>
        <div class="px-5 pb-5 pt-2">
            <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Tư Duy Ngược</h3>
            <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Nguyễn Anh Dũng</p>
            <div class="flex justify-between items-center">
                <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">99.000đ</span>
                <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            </div>
        </div>
    </div>

    <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
        <div class="h-64 overflow-hidden relative p-4">
            <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
            <img src="https://images.unsplash.com/photo-1592496431122-2349e0fbc666?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
            </div>
        </div>
        <div class="px-5 pb-5 pt-2">
            <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Tư Duy Ngược</h3>
            <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Nguyễn Anh Dũng</p>
            <div class="flex justify-between items-center">
                <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">99.000đ</span>
                <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            </div>
        </div>
    </div> --}}

</div>

<div class="mt-12 flex justify-center space-x-2">
    {{ $viewData["products"]->links() }}
</div>