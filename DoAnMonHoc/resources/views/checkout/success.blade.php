@extends('layouts.app')

@section('content')
{{-- CONTAINER: Thêm pt-32 để đẩy nội dung xuống dưới Header, min-h-screen để căn giữa đẹp hơn --}}
<div class="container mx-auto px-4 pt-32 pb-16 text-center min-h-screen">
    
    {{-- CARD: Glassmorphism --}}
    <div class="max-w-2xl mx-auto rounded-3xl p-8 md:p-12
        bg-white/60 dark:bg-slate-800/40 backdrop-blur-xl 
        border border-stone-200/50 dark:border-slate-700/50 
        shadow-2xl transition-all duration-300 relative overflow-hidden">
        
        {{-- Hiệu ứng trang trí nền (Glow nhẹ) --}}
        <div class="absolute -top-10 -left-10 w-32 h-32 bg-green-400/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-brown-primary/20 dark:bg-red-500/20 rounded-full blur-3xl"></div>

        {{-- Icon Thành công --}}
        <div class="w-24 h-24 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg animate-bounce-slow">
            <i class="fas fa-check text-4xl text-green-600 dark:text-green-400"></i>
        </div>

        <h1 class="text-3xl md:text-4xl font-extrabold text-brown-dark dark:text-white mb-4 tracking-tight">
            Đặt Hàng Thành Công!
        </h1>
        
        <p class="text-stone-500 dark:text-slate-300 mb-8 text-lg">
            Cảm ơn bạn đã tin tưởng BookStore.<br>
            Mã đơn hàng của bạn là: 
            <span class="font-extrabold text-brown-primary dark:text-red-500 text-xl block mt-2">
                #{{ $order->id }}
            </span>
        </p>

        @if($order->status == 'pending')
            
            {{-- LOGIC: Chỉ hiện QR nếu chọn Banking --}}
            @if($order->payment_method == 'banking') 
                <div class="bg-white/50 dark:bg-slate-900/50 rounded-2xl p-6 border border-stone-200 dark:border-slate-600 mb-8 shadow-inner max-w-sm mx-auto">
                    <h3 class="font-bold text-lg text-stone-800 dark:text-white mb-4 flex items-center justify-center gap-2">
                        <i class="fas fa-qrcode text-stone-400"></i> Thanh toán chuyển khoản
                    </h3>
                    
                    {{-- Ảnh QR Code (Có viền trắng để nổi trên nền tối) --}}
                    <div class="p-2 bg-white rounded-xl shadow-sm inline-block mb-4">
                        <img src="{{ $qrUrl }}" class="w-56 h-56 object-contain rounded-lg">
                    </div>
                    
                    <p class="text-sm text-stone-500 dark:text-slate-400">
                        Quét mã để thanh toán cho đơn hàng <strong class="text-brown-primary dark:text-red-500">#{{ $order->id }}</strong>
                    </p>
                    <p class="text-xs text-stone-400 mt-2 italic">
                        (Hệ thống sẽ tự động cập nhật sau khi nhận được tiền)
                    </p>
                </div>

            @else
                {{-- Nếu là COD --}}
                <div class="bg-yellow-50/80 dark:bg-yellow-900/20 rounded-2xl p-6 border border-yellow-200 dark:border-yellow-700/50 mb-8 max-w-lg mx-auto">
                    <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900/50 rounded-full flex items-center justify-center mx-auto mb-3 text-yellow-600 dark:text-yellow-400">
                        <i class="fas fa-shipping-fast text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-stone-800 dark:text-white mb-2">Thanh toán khi nhận hàng</h3>
                    <p class="text-stone-600 dark:text-slate-300">
                        Vui lòng chuẩn bị số tiền 
                        <strong class="text-brown-primary dark:text-red-500 text-lg mx-1">{{ number_format($order->total_price) }}đ</strong> 
                        để thanh toán cho shipper khi nhận hàng nhé!
                    </p>
                </div>
            @endif

        @endif

        {{-- Buttons --}}
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('profile.orders') }}" 
               class="w-full sm:w-auto px-8 py-3.5 rounded-xl border border-stone-300 dark:border-slate-600 text-stone-600 dark:text-slate-300 font-bold hover:bg-stone-50 dark:hover:bg-slate-700 transition">
                <i class="fas fa-file-invoice mr-2"></i> Xem đơn hàng
            </a>
            
            <a href="{{ route('product.index') }}" 
               class="w-full sm:w-auto px-8 py-3.5 rounded-xl bg-brown-primary dark:bg-red-600 text-white font-bold hover:bg-brown-dark dark:hover:bg-red-700 shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                <i class="fas fa-shopping-basket mr-2"></i> Tiếp tục mua sắm
            </a>
        </div>

    </div>
</div>
@endsection