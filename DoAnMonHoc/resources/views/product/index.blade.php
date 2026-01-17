@extends('layouts.app')

@section('content')

<main class="pt-28 pb-12 px-4 container mx-auto flex-grow">
    <section class="mb-10 mt-4 text-center">

        <h1 class="text-3xl md:text-4xl font-extrabold text-brown-dark dark:text-white mb-6 animate-fade-in-up">
            Tìm cuốn sách <span class="text-transparent bg-clip-text bg-gradient-to-r from-brown-primary to-yellow-600 dark:from-neon-red dark:to-purple-500">tâm đắc</span> của bạn
        </h1>
    
        <div class="max-w-3xl mx-auto relative group z-10">
            
            <div class="absolute -inset-1 bg-gradient-to-r from-brown-primary to-yellow-500 dark:from-neon-red dark:to-purple-600 rounded-full blur opacity-20 group-hover:opacity-40 transition duration-500"></div>
            
            <div class="relative">
                <input type="text" placeholder="Nhập tên sách, tác giả hoặc ISBN..." 
                    class="w-full py-4 pl-14 pr-36 rounded-full glass bg-white/80 dark:bg-slate-900/80 border-2 border-white/50 dark:border-slate-600 focus:border-brown-primary dark:focus:border-neon-red focus:outline-none focus:ring-4 focus:ring-brown-primary/10 dark:focus:ring-neon-red/20 transition-all shadow-xl text-lg text-stone-700 dark:text-slate-200 placeholder-stone-400 dark:placeholder-slate-500">
                
                <i class="fas fa-search absolute left-6 top-1/2 -translate-y-1/2 text-xl text-stone-400 dark:text-slate-500 group-focus-within:text-brown-primary dark:group-focus-within:text-neon-red transition-colors"></i>
                
                <button class="absolute right-2 top-2 bottom-2 px-8 rounded-full bg-brown-primary text-white font-bold hover:bg-brown-dark dark:bg-neon-red dark:text-white dark:hover:bg-red-700 transition-all shadow-md hover:shadow-lg flex items-center">
                    Tìm Kiếm
                </button>
            </div>
        </div>
    
        <div class="mt-4 flex flex-wrap justify-center items-center gap-2 text-sm text-stone-500 dark:text-slate-400">
            <span class="font-semibold"><i class="fas fa-tags mr-1"></i>Từ khóa hot:</span>
            <a href="#" class="px-3 py-1 rounded-full bg-white/40 dark:bg-slate-800 border border-stone-200 dark:border-slate-700 hover:border-brown-primary dark:hover:border-neon-red hover:text-brown-primary dark:hover:text-neon-red transition-all">Tâm lý học</a>
            <a href="#" class="px-3 py-1 rounded-full bg-white/40 dark:bg-slate-800 border border-stone-200 dark:border-slate-700 hover:border-brown-primary dark:hover:border-neon-red hover:text-brown-primary dark:hover:text-neon-red transition-all">Start-up</a>
            <a href="#" class="px-3 py-1 rounded-full bg-white/40 dark:bg-slate-800 border border-stone-200 dark:border-slate-700 hover:border-brown-primary dark:hover:border-neon-red hover:text-brown-primary dark:hover:text-neon-red transition-all">Tiểu thuyết</a>
        </div>
    
    </section>

    <div class="mb-8 flex items-center text-sm text-stone-500 dark:text-slate-400">
        <a href="#" class="hover:text-brown-primary dark:hover:text-neon-red">Trang chủ</a>
        <span class="mx-2">/</span>
        <span class="font-bold text-brown-dark dark:text-white">Tất cả sách</span>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
        
        {{-- Lọc nâng cao --}}
        <aside class="w-full lg:w-1/4 h-fit lg:sticky lg:top-28 space-y-8">
    
            <form id="filterForm" method="GET" action="{{ route('product.index') }}">
                
                {{-- Giữ lại Từ khóa tìm kiếm và Sắp xếp nếu đang có --}}
                @if(request('search')) <input type="hidden" name="search" value="{{ request('search') }}"> @endif
                @if(request('sort')) <input type="hidden" name="sort" value="{{ request('sort') }}"> @endif
        
                <div class="glass rounded-3xl p-6 bg-white/50 dark:bg-slate-900/60 mb-8">
                    <h3 class="font-bold text-lg mb-4 text-brown-dark dark:text-white border-b border-stone-200 dark:border-slate-700 pb-2">
                        Danh Mục
                    </h3>
                    <ul class="space-y-3">
                        @foreach($viewData["categories"] as $category)
                        <li class="flex items-center">
                            <input 
                                type="checkbox" 
                                name="categories[]" 
                                value="{{ $category->id }}"
                                id="cat_{{ $category->id }}" 
                                class="custom-checkbox w-4 h-4 rounded border-gray-300 dark:border-slate-600 focus:ring-brown-primary dark:focus:ring-neon-red"
                                {{-- Kiểm tra: Nếu ID này có trong URL rồi thì đánh dấu tick --}}
                                {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}
                                {{-- Mẹo: Khi tick vào thì tự submit form luôn cho tiện (giống Tiki/Shopee) --}}
                                onchange="this.form.submit()"
                            >
                            <label for="cat_{{ $category->id }}" class="ml-3 text-stone-600 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red cursor-pointer transition select-none">
                                {{ $category->name }}
                                {{-- <span class="text-xs text-stone-400 ml-1">({{ $category->products_count }})</span> --}}
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>
        
                <div class="glass rounded-3xl p-6 bg-white/50 dark:bg-slate-900/60 mb-8">
                    <h3 class="font-bold text-lg mb-4 text-brown-dark dark:text-white border-b border-stone-200 dark:border-slate-700 pb-2">Khoảng Giá</h3>
                    <div class="space-y-4">
                        <div class="flex space-x-2">
                            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Từ" 
                                   class="w-1/2 bg-white/50 dark:bg-slate-800 border border-stone-200 dark:border-slate-700 rounded-lg px-3 py-1 text-sm focus:outline-none focus:border-brown-primary dark:focus:border-neon-red dark:text-white">
                            
                            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Đến" 
                                   class="w-1/2 bg-white/50 dark:bg-slate-800 border border-stone-200 dark:border-slate-700 rounded-lg px-3 py-1 text-sm focus:outline-none focus:border-brown-primary dark:focus:border-neon-red dark:text-white">
                        </div>
                        
                        <button type="submit" class="w-full py-2 rounded-lg bg-brown-primary text-white text-sm font-bold hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700 transition">
                            Áp Dụng
                        </button>
                    </div>
                </div>
                

        
            </form>
        </aside>

        {{-- Lọc và sản phẩm --}}
        <div class="w-full lg:w-3/4">
            
            {{-- Thanh công cụ tìm kiếm với lọc --}}
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 glass p-4 rounded-2xl bg-white/40 dark:bg-slate-900/40 gap-4">
                
                {{-- 1. Ô TÌM KIẾM (Bên trái) --}}
                <div class="hidden xl:flex relative group w-full md:w-64 transition-all focus-within:md:w-80">
                    <input type="text" id="search-input" placeholder="Tìm kiếm..." 
                        class="w-full bg-stone-100/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 rounded-full py-2 px-4 pl-9 text-sm focus:outline-none focus:ring-2 focus:ring-brown-primary dark:focus:ring-neon-red dark:text-white transition-all"> <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-xs text-gray-400 dark:text-slate-500"></i>
                </div>

                {{-- 2. BỘ LỌC SẮP XẾP (Bên phải) --}}
                <div class="w-full md:w-auto">
                    <form id="filterForm" method="GET" action="{{ route('product.index') }}" class="flex items-center justify-end space-x-3"> 
                        
                        <label class="text-sm font-medium text-stone-500 dark:text-slate-400 whitespace-nowrap">Sắp xếp:</label>
                        
                        <select name="sort" onchange="this.form.submit()" 
                            class="bg-white/80 dark:bg-slate-800 border border-stone-200 dark:border-slate-700 rounded-lg px-4 py-2 text-sm text-stone-700 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-brown-primary dark:focus:ring-neon-red cursor-pointer shadow-sm">
                            
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>
                                Mới nhất
                            </option>
                            
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                                Giá: Thấp đến Cao
                            </option>
                            
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                                Giá: Cao đến Thấp
                            </option>
                            
                            <option value="best_seller" {{ request('sort') == 'best_seller' ? 'selected' : '' }}>
                                Bán chạy nhất
                            </option>
                        
                        </select>
                    </form>
                </div>
            </div>

            {{-- Thẻ sản phẩm - Phần phân trang --}}
            <div id="product-list-container">
                @include('product.list')
            </div>



        </div>

    </div>


    {{-- Top bán chạy --}}
    <section class="mt-20 border-t border-stone-200 dark:border-white/10 pt-12">

        {{-- Phần Header giữ nguyên --}}
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-yellow-100 text-yellow-600 dark:bg-yellow-500/20 dark:text-yellow-400 flex items-center justify-center text-2xl shadow-sm">
                    <i class="fas fa-crown"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-brown-dark dark:text-white uppercase tracking-wide">
                        Top Bán Chạy
                    </h2>
                    <p class="text-xs text-stone-500 dark:text-slate-400 font-medium">Được yêu thích nhất tuần qua</p>
                </div>
            </div>
            
            {{-- <a href="{{ route('product.index', ['sort' => 'best_seller']) }}" class="text-sm font-bold text-brown-primary hover:text-brown-dark dark:text-neon-red dark:hover:text-white transition-colors flex items-center group">
                Xem bảng xếp hạng <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </a> --}}
        </div>
    
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
    
            @foreach($viewData['bestSellers'] as $book)
                {{-- Giữ nguyên class card cũ, chỉ bỏ logic màu mè phức tạp --}}
                <div class="relative group rounded-3xl glass p-4 border border-stone-200 dark:border-slate-700 bg-white/40 dark:bg-slate-900/40 hover:-translate-y-2 transition-all duration-300 shadow-sm hover:shadow-xl">
                    
                    {{-- PHẦN XẾP HẠNG ĐÃ ĐƠN GIẢN HÓA --}}
                    {{-- Chỉ hiện số thứ tự 1, 2, 3... trong vòng tròn --}}
                    <div class="absolute -top-3 -left-3 z-20 w-10 h-10 rounded-full flex items-center justify-center font-extrabold text-white shadow-md border-2 border-white dark:border-slate-800
                        {{ $loop->iteration <= 3 ? 'bg-yellow-500' : 'bg-stone-500' }}">
                        {{ $loop->iteration }}
                    </div>
                    
                    {{-- CÁC PHẦN DƯỚI ĐÂY GIỮ NGUYÊN Y HỆT CŨ --}}
                    
                    {{-- ẢNH BÌA SÁCH --}}
                    <div class="relative overflow-hidden rounded-xl mb-4 aspect-[3/4] shadow-md group-hover:shadow-lg transition-all">
                        <img src="{{ asset($book->image) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="{{ $book->name }}">
                        
                        {{-- Overlay khi hover --}}
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <a href="{{ route('product.show', $book->slug) }}" class="w-12 h-12 rounded-full bg-white text-brown-dark dark:bg-neon-red dark:text-white hover:scale-110 transition shadow-lg flex items-center justify-center" title="Xem chi tiết">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
    
                    {{-- THÔNG TIN SÁCH --}}
                    <div class="text-center px-2">
                        <h3 class="font-bold text-lg text-stone-800 dark:text-white truncate mb-1">
                            <a href="{{ route('product.show', $book->slug) }}" class="hover:text-brown-primary dark:hover:text-neon-red transition-colors">
                                {{ $book->name }}
                            </a>
                        </h3>
                        
                        <div class="flex justify-center items-center gap-2 text-xs text-stone-500 dark:text-slate-400 mb-2">
                            <span class="bg-red-100 text-red-600 px-2 py-0.5 rounded-full font-bold flex items-center gap-1 dark:bg-red-900/30 dark:text-red-400">
                                <i class="fas fa-fire"></i> {{ number_format($book->sold_quantity) }} đã bán
                            </span>
                        </div>
                        
                        <div class="text-xl font-extrabold text-brown-primary dark:text-neon-red">
                            {{ number_format($book->price, 0, ',', '.') }}đ
                        </div>
                    </div>
                </div>
            @endforeach
    
        </div>
    </section>

</main>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search-input');
        const productContainer = document.getElementById('product-list-container');
        let timeout = null; // Biến dùng để delay (Debounce)

        searchInput.addEventListener('keyup', function () {
            // 1. Xóa timeout cũ để không gửi request liên tục khi gõ nhanh
            clearTimeout(timeout);

            // 2. Đặt timeout mới (Chờ 500ms sau khi ngừng gõ mới gửi request)
            timeout = setTimeout(function () {
                let keyword = searchInput.value;
                let url = "{{ route('product.index') }}?search=" + keyword;

                // 3. Gửi AJAX
                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest' // Báo cho Server biết đây là AJAX
                    }
                })
                .then(response => response.text()) // Nhận về HTML
                .then(html => {
                    // 4. Thay thế nội dung cũ bằng nội dung mới
                    productContainer.innerHTML = html;
                })
                .catch(error => console.error('Lỗi:', error));
            }, 500); // 500ms delay
        });
    });
</script>