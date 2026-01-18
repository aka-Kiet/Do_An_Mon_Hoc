@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-16 text-center">
    <div class="max-w-2xl mx-auto bg-white dark:bg-slate-800 rounded-3xl shadow-xl p-8">
        
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-check text-3xl text-green-600"></i>
        </div>

        <h1 class="text-3xl font-extrabold text-brown-dark dark:text-white mb-4">Đặt Hàng Thành Công!</h1>
        <p class="text-stone-500 dark:text-slate-400 mb-8">Cảm ơn bạn đã mua sách. Mã đơn hàng của bạn là: <span class="font-bold text-brown-primary">#{{ $order->id }}</span></p>

        @if($order->status == 'pending')
            
            {{-- LOGIC: Chỉ hiện QR nếu chọn Banking --}}
            @if($order->payment_method == 'banking') 
                <div class="bg-blue-50 dark:bg-slate-700/50 rounded-2xl p-6 border border-dashed border-blue-300 dark:border-slate-600 mb-6">
                    <h3 class="font-bold text-lg text-stone-800 dark:text-white mb-4">Thanh toán chuyển khoản</h3>
                    
                    {{-- Ảnh QR Code --}}
                    <img src="{{ $qrUrl }}" class="w-64 mx-auto rounded-xl shadow-lg border border-white mb-4">
                    
                    <p class="text-sm text-stone-500 dark:text-slate-400">
                        Quét mã để thanh toán đơn hàng <strong class="text-brown-primary">#{{ $order->id }}</strong>
                    </p>
                </div>
            @else
                {{-- Nếu là COD thì hiện thông báo khác --}}
                <div class="bg-yellow-50 dark:bg-slate-700/50 rounded-2xl p-6 border border-dashed border-yellow-300 dark:border-slate-600 mb-6">
                    <h3 class="font-bold text-lg text-stone-800 dark:text-white mb-2">Thanh toán khi nhận hàng</h3>
                    <p class="text-stone-500 dark:text-slate-400">
                        Vui lòng chuẩn bị số tiền <strong class="text-brown-primary">{{ number_format($order->total_price) }}đ</strong> khi shipper giao hàng đến nhé!
                    </p>
                </div>
            @endif

        @endif

        <div class="mt-8 flex gap-4 justify-center">
            <a href="{{ route('profile.orders') }}" class="px-6 py-3 rounded-xl border border-stone-200 text-stone-600 font-bold hover:bg-stone-50 transition">
                Xem đơn hàng
            </a>
            <a href="{{ route('product.index') }}" class="px-6 py-3 rounded-xl bg-brown-primary text-white font-bold hover:bg-brown-dark transition">
                Tiếp tục mua sắm
            </a>
        </div>

    </div>
</div>
@endsection