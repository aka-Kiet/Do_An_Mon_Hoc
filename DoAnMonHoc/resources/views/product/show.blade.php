@extends('layouts.app')

@section('content')

@php
    $book = $viewData['book'];
    $relatedBooks = $viewData['relatedBooks'];
    $title = $viewData['title'];
    $isFavorite = Auth::check() && Auth::user()->favorites->contains($book->id);
@endphp

<main class="pt-28 pb-12 px-4 container mx-auto flex-grow">
        
    <div class="mb-8 flex items-center text-sm text-stone-500 dark:text-slate-400">
        <a href="index.html" class="hover:text-brown-primary dark:hover:text-neon-red">Trang chủ</a>
        <span class="mx-2">/</span>
        <a href="shop.html" class="hover:text-brown-primary dark:hover:text-neon-red">Sản phẩm</a>
        <span class="mx-2">/</span>
        <span class="font-bold text-brown-dark dark:text-white">{{ $book->name }}</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 mb-20">
        
        <div class="lg:col-span-5 space-y-4">
            <!--ảnh chính-->
            <div class="glass p-4 rounded-3xl bg-white/40 dark:bg-slate-900/40 relative overflow-hidden group">
                <img id="mainImage" src="{{ asset($book->image) }}" 
                     alt="{{ $book->name }}" class="w-full h-auto rounded-xl object-cover transition-transform duration-500 group-hover:scale-110 cursor-zoom-in">
                @auth
                    <form action="{{ route('profile.favorites.toggle', $book->id) }}" method="POST" class="absolute top-6 right-6 z-20">
                        @csrf
                        <button type="submit" class="w-10 h-10 rounded-full glass flex items-center justify-center transition-all shadow-md group{{ $isFavorite ? 'bg-red-50 text-red-500' : 'bg-white/60 dark:bg-black/40 text-stone-500 hover:bg-white hover:text-red-500' }}">
                            
                            @if($isFavorite)
                                <i class="fas fa-heart text-xl animate-pulse"></i>
                            @else
                                <i class="far fa-heart text-xl"></i>
                            @endif
                        </button>
                    </form>
                    @else
                        <a href="{{ route('login') }}" class="absolute top-6 right-6 z-20 w-10 h-10 rounded-full glass flex items-center justify-center bg-white/60 text-stone-500 hover:bg-white hover:text-red-500 transition-all shadow-md">
                            <i class="far fa-heart text-xl"></i>
                @endauth
            </div>
            <!--ảnh thumbnail-->
            <div class="flex space-x-4 overflow-x-auto pb-2">
                <button onclick="changeImage('{{ asset($book->image) }}')" class="w-20 h-20 rounded-xl glass p-1 cursor-pointer border-2 border-brown-primary dark:border-neon-red">
                    <img src="{{ asset($book->image) }}" class="w-full h-full object-cover rounded-lg">
                </button>
                <!--ảnh khác-->
                @if($book->images && $book->images->count() > 0)
                    @foreach($book->images as $img)
                        <button onclick="changeImage('{{ asset($img->image_path) }}')" class="w-20 h-20 rounded-xl glass p-1 cursor-pointer border-2 border-transparent hover:border-brown-primary dark:hover:border-neon-red">
                            <img src="{{ asset($img->image_path) }}" class="w-full h-full object-cover rounded-lg">
                        </button>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="lg:col-span-7 space-y-6">
            
            <div class="flex items-center space-x-4 text-sm font-medium">
                <span class="px-3 py-1 rounded-full bg-brown-primary/10 text-brown-primary dark:bg-neon-red/10 dark:text-neon-red">{{ $book->category-> name }}</span>
                <span class="text-stone-500 dark:text-slate-400">Tác giả: <a href="#" class="text-brown-primary dark:text-neon-red underline">{{ $book->author-> name }}</a></span>
            </div>

            <h1 class="text-4xl md:text-5xl font-extrabold text-brown-dark dark:text-white leading-tight">
                {{ $book->name }}
            </h1>

            <div class="flex items-center space-x-4">
                <!--Đánh giá-->
                <div class="flex items-center text-yellow-500 text-xs">
                    <i class="fas fa-star mr-1"></i>
                    <span id="avg-rating-display" class="font-medium">
                        {{ number_format($book->reviews_avg_rating ?? 0, 1) }}
                    </span>
                </div>
                <span class="text-stone-500 dark:text-slate-400 text-sm">(<span id="total-reviews-display">{{ $book->reviews_count }}</span> đánh giá)</span>
                <span class="h-4 w-px bg-stone-300 dark:bg-slate-700"></span>
                <!--Kiểm tra số lượng-->
                <div id="stock-status-container">
                    @if($book->quantity > 0)
                        <span class="text-green-600 dark:text-green-400 font-bold text-sm">
                            <i class="fas fa-check-circle mr-1"></i>Còn hàng ({{ $book->quantity }})
                        </span>
                    @else
                        <span class="text-red-500 font-bold text-sm">
                            <i class="fas fa-times-circle mr-1"></i>Hết hàng
                        </span>
                    @endif
                </div>
            </div>
            <!--Giá tiền-->
            <div class="glass p-4 rounded-2xl bg-white/50 dark:bg-slate-800/50 inline-block">
                @if($book->sale_price && $book->sale_price < $book->price)
                    <span class="text-3xl md:text-4xl font-extrabold text-brown-primary dark:text-neon-red dark:drop-shadow-[0_0_8px_rgba(255,23,68,0.5)]">
                        {{ number_format($book->sale_price, 0, ',', '.') }}đ
                    </span>
                    <span class="text-lg text-stone-400 dark:text-slate-500 line-through ml-2">
                        {{ number_format($book->price, 0, ',', '.') }}đ
                    </span>
                    <span class="ml-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
                        -{{ $viewData['discountPercent'] }}%
                    </span>
                @else
                    <span class="text-3xl md:text-4xl font-extrabold text-brown-primary">
                        {{ number_format($book->price, 0, ',', '.') }}đ
                    </span>
                @endif
            </div>

            <p class="text-stone-600 dark:text-slate-300 leading-relaxed">
                {{ $book->short_description }}
            </p>
            <!--Phần giỏ hàng-->
            <div class="border-t border-stone-200 dark:border-slate-700 pt-6">

            <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">

                <div class="flex flex-col md:flex-row gap-4 mb-4">
                    <div class="flex items-center glass rounded-full px-4 py-2 bg-white/50 dark:bg-slate-800/50 w-fit">
                        <button type="button" onclick="updateQty(-1)" class="w-8 h-8 flex items-center justify-center text-stone-500 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red transition">
                            <i class="fas fa-minus"></i>
                        </button>
                        
                        <input id="qtyInput" name="quantity" type="number" value="1" min="1" data-max="{{ $book->quantity }}" onchange="checkManualQty(this)" class="w-16 text-center bg-transparent border-none focus:outline-none font-bold text-brown-dark dark:text-white appearance-none m-0">
                        
                        <button type="button" onclick="updateQty(1)" class="w-8 h-8 flex items-center justify-center text-stone-500 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red transition">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>

                    <div class="flex gap-4 flex-1">
                        <button type="submit" name="action" value="add"
                            class="flex-1 px-6 py-3 rounded-full border-2 border-brown-primary text-brown-primary font-bold hover:bg-brown-primary hover:text-white dark:border-neon-red dark:text-neon-red dark:hover:bg-neon-red dark:hover:text-white transition-all shadow-lg {{ $book->quantity == 0 ? 'opacity-50 cursor-not-allowed pointer-events-none' : '' }}">
                            <i class="fas fa-cart-plus mr-2"></i> Thêm Giỏ Hàng
                        </button>

                        <button type="submit" name="action" value="buy"
                            class="flex-1 px-6 py-3 rounded-full bg-brown-primary text-white font-bold hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700 hover:shadow-xl dark:hover:shadow-[0_0_20px_rgba(255,23,68,0.4)] transition-all {{ $book->quantity == 0 ? 'opacity-50 cursor-not-allowed pointer-events-none' : '' }}">
                            Mua Ngay
                        </button>
                    </div>
                </div>
            </form>

            </div>

            <div class="flex gap-6 text-sm text-stone-500 dark:text-slate-400">
                <div class="flex items-center"><i class="fas fa-shield-alt mr-2 text-brown-primary dark:text-neon-red"></i> Bảo hành đổi trả</div>
                <div class="flex items-center"><i class="fas fa-truck mr-2 text-brown-primary dark:text-neon-red"></i> Freeship nội thành</div>
            </div>

        </div>
    </div>

    <section class="mb-20">
        <div class="glass rounded-[40px] p-1 bg-white/30 dark:bg-slate-900/30 overflow-hidden">
            
            <div class="flex border-b border-white/20 dark:border-slate-700">
                <button onclick="openTab(event, 'desc')" class="tab-btn active px-8 py-4 font-bold text-stone-600 dark:text-slate-400 hover:text-brown-primary dark:hover:text-neon-red transition-all">Mô Tả Sản Phẩm</button>
                <button onclick="openTab(event, 'details')" class="tab-btn px-8 py-4 font-bold text-stone-600 dark:text-slate-400 hover:text-brown-primary dark:hover:text-neon-red transition-all">Thông Tin Chi Tiết</button>
                <button onclick="openTab(event, 'reviews')" class="tab-btn px-8 py-4 font-bold text-stone-600 dark:text-slate-400 hover:text-brown-primary dark:hover:text-neon-red transition-all">Đánh Giá ({{ $book->reviews_count }})</button>
            </div>

            <div class="p-8 md:p-12 min-h-[300px]">
                <!--Mô tả-->
                <div id="desc" class="tab-content block animate-fade-in text-stone-700 dark:text-slate-300 leading-relaxed space-y-4">
                    <p class="font-bold text-lg text-brown-dark dark:text-white">{{$book->name}}</p>
                    <p>{{$book->description}}</p>
                </div>
                <!--Thông tin chi tiết-->
                <div id="details" class="tab-content hidden animate-fade-in">
                    <table class="w-full text-left border-collapse text-stone-700 dark:text-slate-300">
                        <tbody>
                            <tr class="border-b border-stone-200 dark:border-slate-700"><td class="py-3 font-bold w-1/3">Danh mục</td><td class="py-3">{{$book->category->name}}</td></tr>
                            <tr class="border-b border-stone-200 dark:border-slate-700"><td class="py-3 font-bold w-1/3">Tác giả</td><td class="py-3">{{$book->author->name}}</td></tr>
                        </tbody>
                    </table>
                </div>
<!--Đánh giá-->
                <div id="reviews" class="tab-content hidden animate-fade-in space-y-6">
                    <div class="bg-stone-50 dark:bg-slate-800/50 p-6 rounded-2xl border border-stone-200 dark:border-slate-700">
                        <h3 class="text-xl font-bold text-brown-dark dark:text-white mb-4">Gửi đánh giá của bạn</h3>
                        
                        @auth
                            @if(session('error'))
                                <div class="p-3 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                    <i class="fas fa-exclamation-circle mr-1"></i> {{ session('error') }}
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="p-3 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                                    <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('product.review.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-stone-700 dark:text-slate-300 mb-2">Mức độ hài lòng</label>
                                    <div class="flex flex-row-reverse justify-end gap-1 rating-input">
                                        <input type="radio" id="star5" name="rating" value="5" class="hidden peer/5" required />
                                        <label for="star5" class="cursor-pointer text-stone-300 peer-checked/5:text-yellow-400 hover:text-yellow-400 peer-hover/5:text-yellow-400 text-2xl transition-colors"><i class="fas fa-star"></i></label>
                                        
                                        <input type="radio" id="star4" name="rating" value="4" class="hidden peer/4" />
                                        <label for="star4" class="cursor-pointer text-stone-300 peer-checked/4:text-yellow-400 hover:text-yellow-400 peer-hover/4:text-yellow-400 peer-checked/5:text-yellow-400 peer-hover/5:text-yellow-400 text-2xl transition-colors"><i class="fas fa-star"></i></label>
                                        
                                        <input type="radio" id="star3" name="rating" value="3" class="hidden peer/3" />
                                        <label for="star3" class="cursor-pointer text-stone-300 peer-checked/3:text-yellow-400 hover:text-yellow-400 peer-hover/3:text-yellow-400 peer-checked/4:text-yellow-400 peer-hover/4:text-yellow-400 peer-checked/5:text-yellow-400 peer-hover/5:text-yellow-400 text-2xl transition-colors"><i class="fas fa-star"></i></label>
                                        
                                        <input type="radio" id="star2" name="rating" value="2" class="hidden peer/2" />
                                        <label for="star2" class="cursor-pointer text-stone-300 peer-checked/2:text-yellow-400 hover:text-yellow-400 peer-hover/2:text-yellow-400 peer-checked/3:text-yellow-400 peer-hover/3:text-yellow-400 peer-checked/4:text-yellow-400 peer-hover/4:text-yellow-400 peer-checked/5:text-yellow-400 peer-hover/5:text-yellow-400 text-2xl transition-colors"><i class="fas fa-star"></i></label>
                                        
                                        <input type="radio" id="star1" name="rating" value="1" class="hidden peer/1" />
                                        <label for="star1" class="cursor-pointer text-stone-300 peer-checked/1:text-yellow-400 hover:text-yellow-400 peer-hover/1:text-yellow-400 peer-checked/2:text-yellow-400 peer-hover/2:text-yellow-400 peer-checked/3:text-yellow-400 peer-hover/3:text-yellow-400 peer-checked/4:text-yellow-400 peer-hover/4:text-yellow-400 peer-checked/5:text-yellow-400 peer-hover/5:text-yellow-400 text-2xl transition-colors"><i class="fas fa-star"></i></label>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="comment" class="block text-sm font-medium text-stone-700 dark:text-slate-300 mb-2">Nhận xét của bạn</label>
                                    <textarea name="comment" id="comment" rows="3" class="w-full px-4 py-2 rounded-xl bg-white dark:bg-slate-900 border border-stone-300 dark:border-slate-600 focus:ring-2 focus:ring-brown-primary focus:outline-none dark:text-white" placeholder="Sản phẩm thế nào? Hãy chia sẻ cảm nhận của bạn..."></textarea>
                                </div>

                                <div class="flex items-center justify-between">
                                    <p class="text-xs text-stone-500 italic">* Chỉ khách hàng đã mua sản phẩm này mới có thể gửi đánh giá (1 lần/ sản phẩm).</p>
                                    <button type="submit" class="px-6 py-2 bg-brown-primary text-white rounded-lg hover:bg-brown-dark transition-colors dark:bg-neon-red dark:hover:bg-red-700 font-bold shadow-md">
                                        Gửi đánh giá
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="text-center py-4">
                                <p class="text-stone-600 dark:text-slate-400 mb-3">Vui lòng đăng nhập để gửi đánh giá</p>
                                <a href="{{ route('login') }}" class="px-6 py-2 border border-brown-primary text-brown-primary rounded-full hover:bg-brown-primary hover:text-white transition-all dark:border-neon-red dark:text-neon-red dark:hover:bg-neon-red dark:hover:text-white">Đăng nhập ngay</a>
                            </div>
                        @endauth
                    </div>

                    @if($book->reviews->count() > 0)
                        @foreach($book->reviews as $review)
                            <div class="flex gap-4 border-b border-stone-200 dark:border-slate-700 pb-6">
                                <div class="w-9 h-9 rounded-full bg-brown-primary text-white dark:bg-neon-red flex items-center justify-center font-bold text-lg shadow-md flex-shrink-0">
                                    {{ substr($review->user?->name ?? 'A', 0, 1) }}
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <h4 class="font-bold text-brown-dark dark:text-white">{{$review->user->name}}</h4>
                                        <div class="flex text-yellow-500 text-sm" id="rating-stars-container">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $review->rating)
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star text-gray-300"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
<!-- chưa có ngày đăng bình luận--><p class="text-sm text-stone-600 dark:text-slate-400 mb-2">12/01/2026</p>
                                    <p class="text-stone-700 dark:text-slate-300">{{$review->comment}}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
<!--nếu k có đánh giá-->
                        <div class="text-center py-8 text-stone-500 dark:text-slate-400">
                            <i class="far fa-comment-dots text-4xl mb-3"></i>
                            <p>Chưa có đánh giá nào cho sản phẩm này.</p>
                            <p>Hãy là người đầu tiên nhận xét!</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-2xl font-bold text-brown-dark dark:text-white mb-8 border-l-4 border-brown-primary dark:border-neon-red pl-4">
            Sách Liên Quan
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($relatedBooks as $item)
                @php
                    // Kiểm tra người dùng có thích sách chưa
                    $isRelatedFavorite = Auth::check() && Auth::user()->favorites->contains($item->id);
                @endphp
                <a href="{{ route('product.show', ['slug' => $item->slug]) }}" class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300 block">            

                    <div class="h-64 overflow-hidden relative p-4">
                        @auth
                            <form action="{{ route('profile.favorites.toggle', $item->id) }}" method="POST" class="absolute top-6 right-6 z-20" onclick="event.stopPropagation();">
                                @csrf
                                <button type="submit" 
                                    class="w-8 h-8 rounded-full glass flex items-center justify-center transition-all shadow-sm{{ $isRelatedFavorite ? 'bg-red-50 text-red-500' : 'bg-white/50 dark:bg-black/40 text-stone-500 hover:bg-white hover:text-red-500' }}">                                 
                                    @if($isRelatedFavorite)
                                        <i class="fas fa-heart"></i>
                                    @else
                                        <i class="far fa-heart"></i>
                                    @endif
                                </button>
                            </form>
                        @endauth
                        <img src="{{asset($item->image)}}" alt="{{$item->name}}" class="w-full h-full object-cover rounded-xl transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="px-5 pb-5 pt-2">
                        <h3 class="font-bold text-stone-800 dark:text-white truncate" title="{{ $item->name }}" >{{$item->name}}</h3>
                        <div class="flex items-center gap-2 mt-1">
                            @if($item->sale_price < $item->price)
                                <span class="text-lg font-extrabold text-brown-primary dark:text-neon-red">
                                    {{ number_format($item->sale_price, 0, ',', '.') }}đ
                                </span>
                                <span class="text-sm line-through text-gray-400">
                                    {{ number_format($item->price, 0, ',', '.') }}đ
                                </span>
                            @else
                                <span class="text-lg font-extrabold text-brown-primary dark:text-neon-red">
                                    {{ number_format($item->price, 0, ',', '.') }}đ
                                </span>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

</main>

<script>
    window.productConfig = {
        bookId: "{{ $book->id }}",
        realtimeRoute: "{{ route('product.checkRealtimeStatus', ['slug' => $book->slug]) }}",
        addToCartRoute: "{{ route('cart.add') }}", 
        checkoutRoute: "{{ route('checkout.index') }}" ,
        loginRoute: "{{ route('login') }}"
    };
</script>

<script src="{{ asset('js/script_productde.js') }}"></script>

@endsection



