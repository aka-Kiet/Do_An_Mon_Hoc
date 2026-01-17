<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    @foreach($viewData["products"] as $product)
    <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
        <div class="h-64 overflow-hidden relative p-4">

            {{-- Logic hiển thị nhãn New --}}
            @if($product->created_at->diffInDays(now()) < 7)
            <span class="absolute top-4 left-4 z-20 bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded-md shadow-md">NEW</span>
            @endif
            
            {{-- NÚT YÊU THÍCH THÔNG MINH --}}
            @auth
            {{-- Đã đăng nhập --}}
            <form action="{{ route('profile.favorites.toggle', $product->id) }}" method="POST" class="absolute top-6 right-6 z-20">
                @csrf
                <button type="submit" class="w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center transition-all duration-300 shadow-sm hover:scale-110 
                    {{ Auth::user()->favorites->contains($product->id) ? 'text-red-500 bg-white' : 'text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300' }}">
                    
                    {{-- Kiểm tra xem user đã thích chưa để đổi icon --}}
                    <i class="{{ Auth::user()->favorites->contains($product->id) ? 'fas' : 'far' }} fa-heart text-lg"></i>
                </button>
            </form>
            @else
            {{-- Chưa đăng nhập -> Chuyển qua login --}}
            <a href="{{ route('login') }}" class="absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 transition-all duration-300 shadow-sm hover:scale-110">
                <i class="far fa-heart text-lg"></i>
            </a>
            @endauth
            
            {{-- 1. GẮN LINK VÀO ẢNH --}}
            <a href="{{ route('product.show', ['id' => $product->id]) }}" class="block w-full h-full">
                <img src="{{ asset($product->image) }}" class="w-full h-full object-contain rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
            </a>

            {{-- 2. OVERLAY VỚI 2 NÚT TRÒN (MẮT + GIỎ) --}}
            {{-- Lưu ý: pointer-events-none ở cha để không che, pointer-events-auto ở nút để click được --}}
            <div class="absolute inset-0 bg-stone-900/10 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px] gap-3 pointer-events-none">
                
                {{-- Nút Xem chi tiết --}}
                <a href="{{ route('product.show', ['id' => $product->id]) }}" 
                   class="pointer-events-auto w-10 h-10 rounded-full bg-white text-stone-700 dark:bg-slate-700 dark:text-white flex items-center justify-center shadow-lg hover:bg-brown-primary hover:text-white dark:hover:bg-neon-red transition-all duration-300 transform translate-y-4 group-hover:translate-y-0"
                   title="Xem chi tiết">
                    <i class="fas fa-eye"></i>
                </a>

                {{-- Nút Thêm giỏ hàng --}}
                <button class="pointer-events-auto w-10 h-10 rounded-full bg-brown-primary text-white dark:bg-neon-red flex items-center justify-center shadow-lg hover:bg-brown-dark dark:hover:bg-red-700 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0 delay-75"
                        title="Thêm vào giỏ">
                    <i class="fas fa-cart-plus"></i>
                </button>

            </div>
        </div>
        
        <div class="px-5 pb-5 pt-2">
            {{-- 3. GẮN LINK VÀO TÊN SÁCH --}}
            <a href="{{ route('product.show', ['id' => $product->id]) }}">
                <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors hover:underline">
                    {{ $product->name }}
                </h3>
            </a>
            
            <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">
                {{ optional($product->author)->name ?? 'Đang cập nhật' }}
            </p>
            
            <div class="flex justify-between items-center">
                <div>
                    {{-- Giá giả định (Example) --}}
                    <span class="text-sm text-stone-400 line-through mr-1">
                        {{ number_format($product->price * 1.2, 0, ',', '.') }}đ
                    </span>
                    
                    <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">
                        {{ number_format($product->price, 0, ',', '.') }}đ
                    </span>
                </div>
                
                {{-- Đánh giá --}}
                <div class="flex items-center text-yellow-500 text-xs">
                    <i class="fas fa-star mr-1"></i>
                    <span class="font-medium">
                        {{ number_format($product->avg_rating ?? 0, 1) }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

<div class="mt-12 flex justify-center space-x-2">
    {{ $viewData["products"]->links() }}
</div>