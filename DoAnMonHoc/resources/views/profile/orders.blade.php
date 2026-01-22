@extends('layouts.app')

@section('content')
{{-- CONTAINER: Thêm pt-28 để tránh Header che --}}
<div class="container mx-auto px-4 pt-28 pb-10 min-h-[600px]">
    
    <div class="flex flex-col md:flex-row gap-8">
        
        {{-- ================= SIDEBAR (Giữ nguyên) ================= --}}
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
                        <i class="fas fa-shopping-bag w-5 text-center"></i> Đơn mua
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
            
            {{-- 1. TABS TRẠNG THÁI --}}
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg mb-6 overflow-x-auto transition-colors duration-300">
                <div class="flex min-w-max border-b border-stone-100 dark:border-slate-700">
                    @php
                        $tabs = [
                            'all' => 'Tất cả',
                            'pending' => 'Chờ xác nhận',
                            'shipping' => 'Đang giao',
                            'completed' => 'Hoàn thành',
                            'cancelled' => 'Đã hủy'
                        ];
                        $currentStatus = $viewData['current_status'] ?? 'all';
                    @endphp

                    @foreach($tabs as $key => $label)
                        <a href="{{ route('profile.orders', ['status' => $key]) }}" 
                           class="px-6 py-4 text-sm font-bold transition-all relative whitespace-nowrap
                           {{ $currentStatus == $key 
                              ? 'text-brown-primary dark:text-red-500 border-b-2 border-brown-primary dark:border-red-500' 
                              : 'text-stone-500 dark:text-slate-400 hover:text-brown-primary dark:hover:text-red-400' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- 2. DANH SÁCH ĐƠN HÀNG --}}
            @if(isset($orders) && $orders->count() > 0)
                <div class="space-y-4">
                    @foreach($orders as $order)
                        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-md p-6 border border-transparent hover:border-stone-200 dark:hover:border-slate-600 transition-all duration-300">
                            
                            {{-- Header đơn hàng --}}
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pb-4 border-b border-stone-100 dark:border-slate-700 mb-4 gap-4">
                                <div>
                                    <span class="text-xs font-bold bg-stone-100 dark:bg-slate-700 text-stone-600 dark:text-slate-300 px-2 py-1 rounded-md">
                                        #DH{{ $order->id }}
                                    </span>
                                    <span class="text-xs text-stone-400 ml-2">
                                        {{ $order->created_at->format('d/m/Y H:i') }}
                                    </span>
                                </div>

                                {{-- Badge Trạng thái --}}
                                @php
                                    $statusConfig = [
                                        'pending'   => ['label' => 'Chờ xác nhận',    'class' => 'text-yellow-700 bg-yellow-100 border-yellow-200 dark:text-yellow-400 dark:bg-yellow-900/30 dark:border-yellow-700'],
                                        'shipping'  => ['label' => 'Đang vận chuyển', 'class' => 'text-blue-700 bg-blue-100 border-blue-200 dark:text-blue-400 dark:bg-blue-900/30 dark:border-blue-700'],
                                        'completed' => ['label' => 'Giao thành công', 'class' => 'text-green-700 bg-green-100 border-green-200 dark:text-green-400 dark:bg-green-900/30 dark:border-green-700'],
                                        'cancelled' => ['label' => 'Đã hủy',          'class' => 'text-red-700 bg-red-100 border-red-200 dark:text-red-400 dark:bg-red-900/30 dark:border-red-700'],
                                    ];
                                    $stt = $statusConfig[$order->status] ?? ['label' => $order->status, 'class' => 'text-gray-600 bg-gray-100'];
                                @endphp
                                <span class="px-3 py-1 text-xs font-bold rounded-full border {{ $stt['class'] }}">
                                    {{ $stt['label'] }}
                                </span>
                            </div>

                            {{-- List sản phẩm --}}
                            <div class="space-y-4">
                                @foreach($order->items as $item)
                                    <div class="flex gap-4">
                                        @if($item->book)
                                            {{-- Sách tồn tại --}}
                                            <div class="w-16 h-20 shrink-0 overflow-hidden rounded-md border border-stone-200 dark:border-slate-600">
                                                <img src="{{ asset($item->book->image) }}" class="w-full h-full object-cover">
                                            </div>
                                            
                                            <div class="flex-1">
                                                <h4 class="font-bold text-stone-800 dark:text-white text-sm line-clamp-2">
                                                    {{ $item->book->name }}
                                                </h4>
                                                <p class="text-xs text-stone-500 dark:text-slate-400 mt-1">
                                                    Số lượng: <span class="font-bold">{{ $item->quantity }}</span>
                                                </p>

                                                {{-- 👇👇👇 NÚT ĐÁNH GIÁ (Chỉ hiện khi đơn đã hoàn thành) --}}
                                                @if($order->status == 'completed')
                                                    <a href="{{ route('product.show', $item->book->slug) }}#reviews" 
                                                       class="inline-flex items-center mt-2 px-3 py-1 rounded-lg border border-yellow-300 bg-yellow-50 text-yellow-700 dark:bg-yellow-900/20 dark:text-yellow-400 dark:border-yellow-600 text-xs font-bold hover:bg-yellow-100 dark:hover:bg-yellow-900/40 transition">
                                                        <i class="fas fa-star mr-1"></i> Viết đánh giá
                                                    </a>
                                                @endif
                                                {{-- 👆👆👆 KẾT THÚC NÚT ĐÁNH GIÁ --}}

                                            </div>
                                        @else
                                            {{-- Sách đã bị xóa --}}
                                            <div class="w-16 h-20 bg-stone-200 dark:bg-slate-700 rounded-md flex items-center justify-center text-stone-400">
                                                <i class="fas fa-ban"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="font-bold text-stone-400 dark:text-slate-500 text-sm italic">
                                                    Sản phẩm ngừng kinh doanh
                                                </h4>
                                                <p class="text-xs text-stone-500 dark:text-slate-400 mt-1">
                                                    x{{ $item->quantity }}
                                                </p>
                                            </div>
                                        @endif

                                        <div class="text-right">
                                            <span class="font-bold text-brown-primary dark:text-red-500 text-sm">
                                                {{ number_format($item->price, 0, ',', '.') }}đ
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Footer đơn hàng: Tổng tiền & Nút bấm --}}
                            <div class="pt-4 border-t border-stone-100 dark:border-slate-700 flex justify-end items-center gap-4">
                                <span class="text-sm text-stone-500 dark:text-slate-400">Tổng tiền:</span>
                                <span class="text-xl font-bold text-brown-dark dark:text-white">
                                    {{ number_format($order->total_price, 0, ',', '.') }}đ
                                </span>
                                
                                {{-- Nút hủy đơn (Chỉ hiện khi pending) --}}
                                @if($order->status == 'pending')
                                    <form action="{{ route('profile.orders.cancel', $order->id) }}" method="POST" 
                                        onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?');">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 rounded-lg border border-red-200 text-red-500 hover:bg-red-50 dark:border-red-900 dark:text-red-400 dark:hover:bg-red-900/20 font-bold text-sm transition">
                                            Hủy đơn
                                        </button>
                                    </form>
                                @endif

                                {{-- Nút xem chi tiết --}}
                                <a href="{{ route('profile.orders.show', $order->id) }}" 
                                    class="ml-4 px-6 py-2 rounded-lg bg-brown-primary text-white font-bold text-sm hover:bg-brown-dark transition">
                                     Xem chi tiết
                                 </a>
                            </div>

                        </div>
                    @endforeach
                </div>
                
                <div class="mt-6">
                    {{-- {{ $orders->links() }} --}}
                </div>

            @else
                {{-- Empty State --}}
                <div class="text-center py-16 bg-white dark:bg-slate-800 rounded-2xl shadow-lg border border-transparent dark:border-slate-700">
                    <div class="w-20 h-20 bg-stone-100 dark:bg-slate-700 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-box-open text-3xl text-stone-400 dark:text-slate-500"></i>
                    </div>
                    <p class="text-stone-500 dark:text-slate-400 font-medium mb-4">Chưa có đơn hàng nào</p>
                    <a href="{{ route('product.index') }}" class="inline-block px-6 py-2 bg-brown-primary dark:bg-red-600 text-white rounded-full font-bold text-sm hover:bg-brown-dark dark:hover:bg-red-700 transition shadow-lg">
                        Mua sắm ngay
                    </a>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection