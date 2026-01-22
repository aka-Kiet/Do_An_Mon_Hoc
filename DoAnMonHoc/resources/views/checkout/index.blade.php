@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10 min-h-[600px]">
    
    <h1 class="text-3xl font-extrabold text-brown-dark dark:text-white mb-8 flex items-center">
        <i class="fas fa-money-check-alt mr-3"></i> Thanh Toán
    </h1>

    {{-- 👇 PHẦN 1: THÔNG BÁO LỖI CHUNG (Global Alert) --}}
    {{-- Hiển thị khi Redirect từ Controller về (ví dụ: Hết hàng, Lỗi Transaction) --}}
    @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm" role="alert">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle text-xl mr-3"></i>
                <div>
                    <p class="font-bold">Có lỗi xảy ra!</p>
                    <p>{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    {{-- Hiển thị tổng hợp lỗi validate (nếu muốn xem danh sách lỗi) --}}
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded mb-6">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- 👆 KẾT THÚC PHẦN THÔNG BÁO --}}

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- CỘT TRÁI: THÔNG TIN GIAO HÀNG --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-brown-dark dark:text-white mb-6 border-b border-stone-100 dark:border-slate-700 pb-4">
                        1. Thông tin giao hàng
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Họ tên --}}
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Họ và tên người nhận <span class="text-red-500">*</span></label>
                            
                            {{-- Thêm class check lỗi @error --}}
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                                class="w-full px-4 py-3 rounded-xl border dark:bg-slate-700 dark:text-white focus:ring-2 focus:outline-none transition
                                {{ $errors->has('name') ? 'border-red-500 focus:ring-red-500' : 'border-stone-200 dark:border-slate-600 focus:ring-brown-primary' }}">
                            
                            {{-- Hiển thị lỗi chi tiết --}}
                            @error('name')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Số điện thoại --}}
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Số điện thoại <span class="text-red-500">*</span></label>
                            
                            {{-- Thêm class check lỗi @error --}}
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" required
                                class="w-full px-4 py-3 rounded-xl border dark:bg-slate-700 dark:text-white focus:ring-2 focus:outline-none transition
                                {{ $errors->has('phone') ? 'border-red-500 focus:ring-red-500' : 'border-stone-200 dark:border-slate-600 focus:ring-brown-primary' }}">
                            
                            {{-- Hiển thị lỗi chi tiết (VD: Phải là 10 số) --}}
                            @error('phone')
                                <p class="text-red-500 text-xs italic mt-1"><i class="fas fa-exclamation-triangle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Địa chỉ (Full width) --}}
                        <div class="col-span-1 md:col-span-2 space-y-2">
                            <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Địa chỉ nhận hàng <span class="text-red-500">*</span></label>
                            
                            {{-- Thêm class check lỗi @error --}}
                            <input type="text" name="address" value="{{ old('address', $user->address) }}" required placeholder="Số nhà, tên đường, phường/xã, quận/huyện..."
                                class="w-full px-4 py-3 rounded-xl border dark:bg-slate-700 dark:text-white focus:ring-2 focus:outline-none transition
                                {{ $errors->has('address') ? 'border-red-500 focus:ring-red-500' : 'border-stone-200 dark:border-slate-600 focus:ring-brown-primary' }}">
                            
                            {{-- Hiển thị lỗi chi tiết --}}
                            @error('address')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Ghi chú --}}
                        <div class="col-span-1 md:col-span-2 space-y-2">
                            <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Ghi chú đơn hàng (Tùy chọn)</label>
                            <textarea name="note" rows="2" placeholder="Ví dụ: Giao hàng vào giờ hành chính..."
                                class="w-full px-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-brown-primary focus:outline-none transition">{{ old('note') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Phương thức thanh toán --}}
                <div class="space-y-3">
                    {{-- Lựa chọn 1: COD --}}
                    <label class="flex items-center p-4 border border-stone-200 dark:border-slate-600 rounded-xl cursor-pointer transition-all hover:border-brown-primary hover:bg-brown-primary/5 dark:hover:border-neon-red dark:hover:bg-slate-700 has-[:checked]:border-brown-primary has-[:checked]:bg-brown-primary/5 dark:has-[:checked]:border-neon-red dark:has-[:checked]:bg-slate-700">
                        <input type="radio" name="payment_method" value="cod" checked class="w-5 h-5 text-brown-primary focus:ring-brown-primary dark:text-neon-red dark:focus:ring-neon-red">
                        <div class="ml-4">
                            <span class="block font-bold text-stone-800 dark:text-white">Thanh toán khi nhận hàng (COD)</span>
                            <span class="text-xs text-stone-500 dark:text-slate-400">Bạn chỉ phải thanh toán khi đã nhận được hàng.</span>
                        </div>
                        <i class="fas fa-money-bill-wave ml-auto text-2xl text-brown-primary dark:text-neon-red"></i>
                    </label>
                
                    {{-- Lựa chọn 2: Chuyển khoản --}}
                    <label class="flex items-center p-4 border border-stone-200 dark:border-slate-600 rounded-xl cursor-pointer transition-all hover:border-blue-500 hover:bg-blue-50 dark:hover:border-blue-400 dark:hover:bg-slate-700 has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50 dark:has-[:checked]:border-blue-400 dark:has-[:checked]:bg-slate-700">
                        <input type="radio" name="payment_method" value="banking" class="w-5 h-5 text-blue-600 focus:ring-blue-500">
                        <div class="ml-4">
                            <span class="block font-bold text-stone-800 dark:text-white">Chuyển khoản ngân hàng (QR)</span>
                            <span class="text-xs text-stone-500 dark:text-slate-400">Quét mã VietQR - Tự động xác nhận.</span>
                        </div>
                        <i class="fas fa-qrcode ml-auto text-2xl text-blue-600 dark:text-blue-400"></i>
                    </label>
                </div>
            </div>

            {{-- CỘT PHẢI: TÓM TẮT ĐƠN HÀNG --}}
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 sticky top-28">
                    <h3 class="text-xl font-bold text-brown-dark dark:text-white mb-6 border-b border-stone-100 dark:border-slate-700 pb-4">
                        Đơn hàng của bạn
                    </h3>

                    {{-- Danh sách item thu gọn --}}
                    <div class="max-h-[300px] overflow-y-auto pr-2 mb-6 space-y-4 custom-scrollbar">
                        @foreach($viewData['cart']->items as $item)
                            <div class="flex gap-3">
                                <div class="w-16 h-20 rounded border border-stone-200 overflow-hidden shrink-0">
                                    <img src="{{ $item->book->image_url }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-bold text-stone-800 dark:text-white line-clamp-2">{{ $item->book->name }}</h4>
                                    <div class="flex justify-between mt-1 text-xs">
                                        <span class="text-stone-500 dark:text-slate-400">x{{ $item->quantity }}</span>
                                        <span class="font-bold text-brown-primary dark:text-neon-red">{{ number_format($item->book->price * $item->quantity) }}đ</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Tính tiền --}}
                    <div class="space-y-3 mb-6 pt-4 border-t border-stone-100 dark:border-slate-700 text-sm text-stone-600 dark:text-slate-300">
                        <div class="flex justify-between">
                            <span>Tạm tính</span>
                            <span class="font-bold">{{ number_format($viewData['subtotal']) }}đ</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Phí vận chuyển</span>
                            <span class="font-bold text-green-600">Miễn phí</span>
                        </div>
                    </div>

                    <div class="border-t border-stone-200 dark:border-slate-700 my-4 pt-4">
                        <div class="flex justify-between items-end">
                            <span class="font-bold text-lg text-brown-dark dark:text-white">Tổng cộng</span>
                            <span class="text-2xl font-extrabold text-brown-primary dark:text-neon-red">
                                {{ number_format($viewData['total']) }}đ
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-xl bg-brown-primary text-white font-bold text-lg hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700 shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        XÁC NHẬN ĐẶT HÀNG
                    </button>
                    
                    <p class="text-center text-xs text-stone-400 mt-4">
                        Bằng việc đặt hàng, bạn đồng ý với <a href="#" class="underline hover:text-brown-primary">Điều khoản dịch vụ</a> của chúng tôi.
                    </p>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection