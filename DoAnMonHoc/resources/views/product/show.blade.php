@extends('layouts.app')

@section('content')

@php
    $book = $viewData['book'];
    $relatedBooks = $viewData['relatedBooks'];
    $title = $viewData['title'];
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
                <button class="absolute top-6 right-6 z-20 w-10 h-10 rounded-full glass bg-white/60 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red transition-all shadow-md">
                    <i class="far fa-heart text-xl"></i>
                </button>
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
                    <span class="font-medium">
                        {{ number_format($book->avg_rating ?? 0, 1) }}
                    </span>
                </div>
                <span class="text-stone-500 dark:text-slate-400 text-sm">({{ $book->total_reviews }} đánh giá)</span>
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
                <form action="{{-- thêm route phần giỏ hàng dô đây --}}" method="POST">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <div class="flex flex-col md:flex-row gap-4 mb-4">
                        
                        <div class="flex items-center glass rounded-full px-4 py-2 bg-white/50 dark:bg-slate-800/50 w-fit">
                            <button type="button" onclick="updateQty(-1)" class="w-8 h-8 flex items-center justify-center text-stone-500 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red transition">
                                <i class="fas fa-minus"></i>
                            </button>
                            
                            <input id="qtyInput" name="quantity" type="number" value="1" min="1" class="w-12 text-center bg-transparent border-none focus:outline-none font-bold text-brown-dark dark:text-white" readonly>
                            
                            <button type="button" onclick="updateQty(1)" class="w-8 h-8 flex items-center justify-center text-stone-500 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red transition">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <div class="flex gap-4 flex-1">
                            <button id="btn-add-cart" 
                                class="flex-1 px-6 py-3 rounded-full border-2 border-brown-primary text-brown-primary font-bold hover:bg-brown-primary hover:text-white dark:border-neon-red dark:text-neon-red dark:hover:bg-neon-red dark:hover:text-white transition-all shadow-lg {{ $book->quantity == 0 ? 'opacity-50 cursor-not-allowed pointer-events-none' : '' }}">
                                <i class="fas fa-cart-plus mr-2"></i> Thêm Giỏ Hàng
                            </button>

                            <button id="btn-buy-now" 
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
                <button onclick="openTab(event, 'reviews')" class="tab-btn px-8 py-4 font-bold text-stone-600 dark:text-slate-400 hover:text-brown-primary dark:hover:text-neon-red transition-all">Đánh Giá ({{ $book->total_reviews }})</button>
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
                    <!--Có nhận xét-->
                    @if($book->reviews->count() > 0)
                        @foreach($book->reviews as $review)
                            <div class="flex gap-4 border-b border-stone-200 dark:border-slate-700 pb-6">
<!--ảnh đại diện-->
                                <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden shrink-0"><img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-full h-full object-cover"></div>
                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <h4 class="font-bold text-brown-dark dark:text-white">{{$review->user->name}}</h4>
                                        <div class="flex text-yellow-500 text-sm" id="rating-stars-container">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= round($book->avg_rating))
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star text-gray-300"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
<!--ngày đăng bình luận--><p class="text-sm text-stone-600 dark:text-slate-400 mb-2">12/01/2026</p>
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
                <a href="{{ route('product.show', $item->slug) }}" class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300 block">       
                    <div class="h-64 overflow-hidden relative p-4">
                        <button class="absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all shadow-sm"><i class="far fa-heart"></i></button>
                        <img src="{{asset($item->image)}}" class="{{$item->name}}">
                    </div>
                    <div class="px-5 pb-5 pt-2">
                        <h3 class="font-bold text-stone-800 dark:text-white truncate" title="{{ $item->name }}" >{{$item->name}}</h3>
                        <div class="flex items-center gap-2 mt-1">
                            @if($item->sale_price < $item->price)
                                <span class="text-lg font-extrabold text-brown-primary dark:text-neon-red">
                                    {{ number_format($item->price, 0, ',', '.') }}đ
                                </span>
                            @else
                                <span class="text-lg font-extrabold text-brown-primary dark:text-neon-red">
                                    
                                    {{ number_format($item->sale_price, 0, ',', '.') }}đ
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
    function updateQty(change) {
        // 1. Lấy ô input
        var input = document.getElementById('qtyInput');
        
        // 2. Lấy giá trị hiện tại (chuyển từ chữ sang số)
        var currentQty = parseInt(input.value);
        
        // 3. Nếu giá trị không hợp lệ (NaN), gán bằng 1
        if (isNaN(currentQty)) {
            currentQty = 1;
        }

        // 4. Tính toán số lượng mới
        var newQty = currentQty + change;

        // 5. Kiểm tra điều kiện: Không được nhỏ hơn 1
        if (newQty < 1) {
            newQty = 1;
        }

        // 6. Gán ngược lại vào ô input
        input.value = newQty;
    }
    function openTab(evt, tabName) {
        // 1. Ẩn tất cả nội dung của các tab
        var i, tabcontent, tablinks;
        
        // Lấy tất cả các thẻ có class "tab-content"
        tabcontent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabcontent.length; i++) {
            // Thêm class 'hidden' để ẩn
            tabcontent[i].classList.add("hidden"); 
            // Xóa class 'block' để đảm bảo nó không hiện
            tabcontent[i].classList.remove("block"); 
        }

        // 2. Xóa trạng thái "active" của tất cả các nút
        tablinks = document.getElementsByClassName("tab-btn");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
            // Reset màu chữ về mặc định (nếu cần thiết)
            tablinks[i].classList.remove("text-brown-primary", "dark:text-neon-red");
        }

        // 3. Hiển thị tab được click (tabName)
        // Xóa 'hidden', thêm 'block'
        document.getElementById(tabName).classList.remove("hidden");
        document.getElementById(tabName).classList.add("block");

        // 4. Thêm trạng thái "active" cho nút vừa bấm
        evt.currentTarget.classList.add("active");
    }

//<!---->
    const bookId = "{{ $book->id }}";
    const checkInterval = 5000; // 5 giây kiểm tra 1 lần

    // Hàm cập nhật giao diện
    function updateRealtimeUI(data) {
        // 1. CẬP NHẬT SỐ LƯỢNG 
        const stockContainer = document.getElementById('stock-status-container');
        const btnAdd = document.getElementById('btn-add-cart'); // id nút thêm giỏ hàng
        const btnBuy = document.getElementById('btn-buy-now');  // id nút mua ngay
        
        if (data.quantity > 0) {
            // Nếu trạng thái đang là hết hàng hoặc số lượng thay đổi -> render lại
            stockContainer.innerHTML = `
                <span class="text-green-600 dark:text-green-400 font-bold text-sm animate-pulse">
                    <i class="fas fa-check-circle mr-1"></i>Còn hàng (${data.quantity})
                </span>`;
            
            // Mở lại nút mua nếu trước đó bị disable
            if(btnAdd) btnAdd.classList.remove('opacity-50', 'pointer-events-none');
            if(btnBuy) btnBuy.classList.remove('opacity-50', 'pointer-events-none');
        } else {
            stockContainer.innerHTML = `
                <span class="text-red-500 font-bold text-sm animate-bounce">
                    <i class="fas fa-times-circle mr-1"></i>Hết hàng
                </span>`;
            
            // Disable nút mua
            if(btnAdd) btnAdd.classList.add('opacity-50', 'pointer-events-none');
            if(btnBuy) btnBuy.classList.add('opacity-50', 'pointer-events-none');
        }

        // Cập nhật số review
        const reviewEl = document.getElementById('total-reviews-display');
        if(reviewEl) reviewEl.innerText = data.total_reviews;

        //chưa cập nhật sao
    }

    // gọi về server
    function fetchRealtimeData() {
        fetch(`/product/check-status/${bookId}`)
            .then(res => res.json())
            .then(res => {
                if (res.status === 'success') {
                    updateRealtimeUI(res.data);
                }
            })
            .catch(e => console.error("Lỗi cập nhật realtime:", e));
    }

    setInterval(fetchRealtimeData, checkInterval);
</script>

@endsection



