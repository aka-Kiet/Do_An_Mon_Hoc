@extends('layouts.app')

@section('content')
{{-- CONTAINER: Thêm pt-28 để tránh Header che --}}
<div class="container mx-auto px-4 pt-28 pb-10 min-h-[600px]">
    
    <div class="flex flex-col md:flex-row gap-8">
        
        {{-- ================= SIDEBAR ================= --}}
        <div class="w-full md:w-1/4">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 sticky top-24 transition-colors duration-300">
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-stone-100 dark:border-slate-700">
                    <div class="w-9 h-9 rounded-full bg-brown-primary text-white dark:bg-neon-red flex items-center justify-center font-bold text-lg shadow-md">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="font-bold text-stone-800 dark:text-white">{{ $user->name }}</p>
                        <p class="text-xs text-stone-500 dark:text-slate-400">Thành viên thân thiết</p>
                    </div>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('profile.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-700 transition">
                        <i class="fas fa-user w-5 text-center"></i> Thông tin tài khoản
                    </a>
                    <a href="{{ route('profile.orders') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-700 transition">
                        <i class="fas fa-shopping-bag w-5 text-center"></i> Đơn mua
                    </a>
                    
                    {{-- ACTIVE TAB: Yêu thích (Thêm dark:bg-red-600) --}}
                    <a href="{{ route('profile.favorites') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-brown-primary dark:bg-red-600 text-white font-bold transition shadow-lg shadow-brown-primary/30 dark:shadow-red-600/30">
                        <i class="fas fa-heart w-5 text-center"></i> Sản phẩm yêu thích
                    </a>
                    
                    <a href="{{ route('profile.password') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-700 transition">
                        <i class="fas fa-key w-5 text-center"></i> Đổi mật khẩu
                    </a>
                    
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20 transition">
                            <i class="fas fa-sign-out-alt w-5 text-center"></i> Đăng xuất
                        </button>
                    </form>
                </nav>
            </div>
        </div>

        {{-- ================= MAIN CONTENT ================= --}}
        <div class="w-full md:w-3/4">
            <h2 class="text-2xl font-bold text-brown-dark dark:text-white mb-6 flex items-center gap-2">
                <i class="fas fa-heart text-brown-primary dark:text-red-500"></i>
                Sản phẩm đã thích <span class="text-stone-500 dark:text-slate-400 text-lg font-normal">({{ $favorites->total() }})</span>
            </h2>

            @if($favorites->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($favorites as $product)
                        <div class="group relative rounded-3xl bg-white dark:bg-slate-800 shadow-md hover:shadow-xl transition-all duration-300 border border-transparent hover:border-brown-primary/30 dark:hover:border-red-500/50 overflow-hidden">
                            
                            {{-- Nút Xóa nhanh (Nổi bật hơn) --}}
                            <form action="{{ route('profile.favorites.toggle', $product->id) }}" method="POST" class="absolute top-3 right-3 z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                @csrf
                                <button type="submit" class="w-9 h-9 rounded-full bg-white dark:bg-slate-700 text-stone-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/30 dark:hover:text-red-400 transition flex items-center justify-center shadow-md transform hover:scale-110" title="Bỏ thích">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>

                            <a href="{{ route('product.show', $product->id) }}" class="block p-4 h-full flex flex-col">
                                {{-- Ảnh sản phẩm --}}
                                <div class="h-56 overflow-hidden rounded-2xl mb-4 relative bg-stone-50 dark:bg-slate-700/50">
                                    <img src="{{ asset($product->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    
                                    {{-- Overlay tối khi hover --}}
                                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors duration-300"></div>
                                </div>
                                
                                {{-- Thông tin --}}
                                <div class="flex-grow">
                                    <h3 class="font-bold text-stone-800 dark:text-white truncate text-lg group-hover:text-brown-primary dark:group-hover:text-red-500 transition-colors">
                                        {{ $product->name }}
                                    </h3>
                                    
                                    <div class="flex items-center justify-between mt-2">
                                        <p class="text-brown-primary dark:text-red-500 font-extrabold text-lg">
                                            {{ number_format($product->price, 0, ',', '.') }}đ
                                        </p>
                                        {{-- Nút mua nhanh giả lập --}}
                                        <span class="w-8 h-8 rounded-full bg-stone-100 dark:bg-slate-700 flex items-center justify-center text-stone-400 group-hover:bg-brown-primary group-hover:text-white dark:group-hover:bg-red-600 transition-colors">
                                            <i class="fas fa-cart-plus text-xs"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-8">
                    {{ $favorites->links() }}
                </div>

            @else
                {{-- Empty State --}}
                <div class="text-center py-24 bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-transparent dark:border-slate-700">
                    <div class="w-24 h-24 bg-stone-50 dark:bg-slate-700/50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-heart-broken text-4xl text-stone-300 dark:text-slate-500"></i>
                    </div>
                    <h3 class="text-xl font-bold text-stone-700 dark:text-white mb-2">Danh sách trống</h3>
                    <p class="text-stone-500 dark:text-slate-400 mb-6">Bạn chưa lưu sản phẩm nào vào danh sách yêu thích.</p>
                    <a href="{{ route('product.index') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-brown-primary dark:bg-red-600 text-white rounded-xl font-bold hover:bg-brown-dark dark:hover:bg-red-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <i class="fas fa-search"></i> Khám phá ngay
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection