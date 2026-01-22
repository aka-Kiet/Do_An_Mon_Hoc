@extends('layouts.app')

@section('content')
{{-- CONTAINER: Thêm pt-28 để tránh Header che --}}
<div class="container mx-auto px-4 pt-28 pb-10 min-h-[600px]">
    
    <div class="flex flex-col md:flex-row gap-8">
        
        {{-- ================= SIDEBAR ================= --}}
        <div class="w-full md:w-1/4">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 sticky top-24 transition-colors duration-300">
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-stone-100 dark:border-slate-700">
                    <x-user-avatar :name="Auth::user()->name" />
                    <div>
                        <p class="font-bold text-stone-800 dark:text-white">{{ $user->name }}</p>
                        <p class="text-xs text-stone-500 dark:text-slate-400">Thành viên thân thiết</p>
                    </div>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('profile.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-700 transition">
                        <i class="fas fa-user w-5 text-center"></i> Thông tin tài khoản
                    </a>
                    
                    <a href="{{ route('profile.orders') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-brown-primary dark:bg-red-600 text-white font-bold transition shadow-lg shadow-brown-primary/30 dark:shadow-red-600/30">
                        <i class="fas fa-shopping-bag w-5 text-center"></i> Lịch sử đơn hàng
                    </a>
                    
                    <a href="{{ route('profile.favorites') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-700 transition">
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
            
            {{-- Nút Quay lại --}}
            <a href="{{ route('profile.orders') }}" class="inline-flex items-center gap-2 text-stone-500 hover:text-brown-primary dark:text-slate-400 dark:hover:text-red-500 mb-6 transition">
                <i class="fas fa-arrow-left"></i> Quay lại danh sách
            </a>

            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden border border-transparent dark:border-slate-700 transition-colors duration-300">
                
                {{-- Header đơn hàng --}}
                <div class="p-6 border-b border-stone-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h2 class="text-xl font-bold text-brown-dark dark:text-white">Chi tiết đơn hàng #{{ $order->id }}</h2>
                        <p class="text-sm text-stone-500 dark:text-slate-400 mt-1">
                            <i class="far fa-clock mr-1"></i> Đặt ngày: {{ $order->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                    
                    @php
                        $statusConfig = [
                            'pending'   => ['label' => 'Chờ xác nhận',    'class' => 'text-yellow-700 bg-yellow-100 border-yellow-200 dark:text-yellow-400 dark:bg-yellow-900/30 dark:border-yellow-700'],
                            'shipping'  => ['label' => 'Đang vận chuyển', 'class' => 'text-blue-700 bg-blue-100 border-blue-200 dark:text-blue-400 dark:bg-blue-900/30 dark:border-blue-700'],
                            'completed' => ['label' => 'Giao thành công', 'class' => 'text-green-700 bg-green-100 border-green-200 dark:text-green-400 dark:bg-green-900/30 dark:border-green-700'],
                            'cancelled' => ['label' => 'Đã hủy',          'class' => 'text-red-700 bg-red-100 border-red-200 dark:text-red-400 dark:bg-red-900/30 dark:border-red-700'],
                        ];
                        $stt = $statusConfig[$order->status] ?? ['label' => $order->status, 'class' => 'text-gray-600 bg-gray-100'];
                    @endphp
                    <span class="px-4 py-2 text-sm font-bold rounded-full border {{ $stt['class'] }}">
                        {{ $stt['label'] }}
                    </span>
                </div>

                {{-- Thông tin người nhận & Địa chỉ --}}
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6 border-b border-stone-100 dark:border-slate-700">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-stone-100 dark:bg-slate-700 flex items-center justify-center text-stone-500 dark:text-slate-400 shrink-0">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-stone-800 dark:text-white mb-1">Thông tin người nhận</h3>
                            <p class="text-sm text-stone-600 dark:text-slate-300">{{ $order->name }}</p>
                            <p class="text-sm text-stone-600 dark:text-slate-300">{{ $order->phone }}</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-stone-100 dark:bg-slate-700 flex items-center justify-center text-stone-500 dark:text-slate-400 shrink-0">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-stone-800 dark:text-white mb-1">Địa chỉ giao hàng</h3>
                            <p class="text-sm text-stone-600 dark:text-slate-300 leading-relaxed">
                                {{ $order->address }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Danh sách sản phẩm --}}
                <div class="p-6">
                    <h3 class="font-bold text-stone-800 dark:text-white mb-4 flex items-center gap-2">
                        <i class="fas fa-box-open text-brown-primary dark:text-red-500"></i> Sản phẩm đã đặt
                    </h3>
                    <div class="space-y-4">
                        @foreach($order->items as $item)
                            <div class="flex items-center gap-4 py-4 border-b border-stone-100 dark:border-slate-700 last:border-0 hover:bg-stone-50 dark:hover:bg-slate-700/50 rounded-lg px-2 transition">
                                {{-- Ảnh sách --}}
                                @if($item->book)
                                    <img src="{{ asset($item->book->image) }}" class="w-16 h-20 object-cover rounded border border-stone-200 dark:border-slate-600 shadow-sm">
                                @else
                                    <div class="w-16 h-20 bg-stone-200 dark:bg-slate-700 rounded flex items-center justify-center border border-stone-200 dark:border-slate-600">
                                        <i class="fas fa-ban text-stone-400"></i>
                                    </div>
                                @endif

                                <div class="flex-1">
                                    <h4 class="font-bold text-stone-800 dark:text-white text-sm line-clamp-2">
                                        {{ $item->book->name ?? 'Sản phẩm ngừng kinh doanh' }}
                                    </h4>
                                    <p class="text-xs text-stone-500 dark:text-slate-400 mt-1">
                                        Đơn giá: {{ number_format($item->price, 0, ',', '.') }}đ
                                    </p>

                                    {{-- 👇👇👇 NÚT ĐÁNH GIÁ (THÊM MỚI Ở ĐÂY) 👇👇👇 --}}
                                    @if($order->status == 'completed' && $item->book)
                                        <a href="{{ route('product.show', $item->book->slug) }}#reviews" 
                                           class="inline-flex items-center gap-1 mt-2 px-3 py-1.5 rounded-lg border border-yellow-300 bg-yellow-50 text-yellow-700 dark:bg-yellow-900/20 dark:text-yellow-400 dark:border-yellow-600 text-xs font-bold hover:bg-yellow-100 dark:hover:bg-yellow-900/40 transition">
                                            <i class="fas fa-star text-yellow-500"></i> Viết đánh giá
                                        </a>
                                    @endif
                                    {{-- 👆👆👆 KẾT THÚC NÚT ĐÁNH GIÁ 👆👆👆 --}}
                                </div>
                                
                                <div class="text-right">
                                    <p class="text-sm text-stone-600 dark:text-slate-400">x{{ $item->quantity }}</p>
                                    <p class="font-bold text-brown-primary dark:text-red-500 text-sm mt-1">
                                        {{ number_format($item->price * $item->quantity, 0, ',', '.') }}đ
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Tổng kết --}}
                <div class="bg-stone-50 dark:bg-slate-900/50 p-6 flex flex-col items-end gap-2 border-t border-stone-100 dark:border-slate-700">
                    <div class="flex justify-between w-full md:w-1/2 text-sm text-stone-600 dark:text-slate-400">
                        <span>Tạm tính:</span>
                        <span>{{ number_format($order->total_price, 0, ',', '.') }}đ</span>
                    </div>
                    <div class="flex justify-between w-full md:w-1/2 text-sm text-stone-600 dark:text-slate-400">
                        <span>Phí vận chuyển:</span>
                        <span class="text-green-600 dark:text-green-400 font-bold">Miễn phí</span>
                    </div>
                    <div class="w-full md:w-1/2 border-t border-stone-200 dark:border-slate-700 my-2"></div>
                    <div class="flex justify-between w-full md:w-1/2 text-xl font-bold text-brown-dark dark:text-white">
                        <span>Tổng cộng:</span>
                        <span class="text-brown-primary dark:text-red-500">{{ number_format($order->total_price, 0, ',', '.') }}đ</span>
                    </div>
                </div>
                
                {{-- Nút Hủy (Chỉ hiện nếu Pending) --}}
                @if($order->status == 'pending')
                    <div class="p-6 bg-white dark:bg-slate-800 border-t border-stone-100 dark:border-slate-700 flex justify-end">
                        <form action="{{ route('profile.orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?');">
                            @csrf
                            <button class="px-6 py-2 rounded-lg bg-red-50 text-red-600 font-bold hover:bg-red-100 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/40 transition border border-red-200 dark:border-red-800/50">
                                Hủy Đơn Hàng
                            </button>
                        </form>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection