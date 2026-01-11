@extends('layouts.app')

@section('content')

<main class="pt-28 pb-12 px-4 container mx-auto flex-grow">
        
    <h1 class="text-3xl font-extrabold text-brown-dark dark:text-white mb-8 flex items-center">
        <i class="fas fa-shopping-cart mr-3"></i> Giỏ Hàng Của Bạn
        <span class="text-lg font-normal text-stone-500 dark:text-slate-400 ml-3">(3 sản phẩm)</span>
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 space-y-4">
            
            <div class="hidden md:grid grid-cols-12 gap-4 text-sm font-bold text-stone-500 dark:text-slate-400 pb-2 px-4 uppercase tracking-wide">
                <div class="col-span-6">Sản phẩm</div>
                <div class="col-span-2 text-center">Đơn giá</div>
                <div class="col-span-2 text-center">Số lượng</div>
                <div class="col-span-2 text-right">Thành tiền</div>
            </div>

            <div class="glass p-4 rounded-2xl bg-white/40 dark:bg-slate-900/40 relative group transition-all hover:bg-white/60 dark:hover:bg-slate-800/60">
                <button class="absolute top-2 right-2 text-stone-400 hover:text-red-500 dark:text-slate-500 dark:hover:text-neon-red p-2 transition"><i class="fas fa-trash-alt"></i></button>
                
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                    <div class="col-span-6 flex items-center gap-4">
                        <div class="w-20 h-24 rounded-lg overflow-hidden shrink-0 border border-stone-200 dark:border-slate-700">
                            <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-brown-dark dark:text-white">Cà Phê Cùng Tony</h3>
                            <p class="text-xs text-stone-500 dark:text-slate-400">Tác giả: Tony Buổi Sáng</p>
                            <p class="text-xs text-stone-500 dark:text-slate-400 mt-1 md:hidden">120.000đ</p>
                        </div>
                    </div>

                    <div class="col-span-2 text-center hidden md:block font-medium dark:text-slate-300">120.000đ</div>

                    <div class="col-span-6 md:col-span-2 flex justify-center">
                        <div class="flex items-center glass rounded-full px-3 py-1 bg-white/50 dark:bg-slate-800/50">
                            <button onclick="updateCartQty(this, -1)" class="w-6 h-6 flex items-center justify-center text-stone-500 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red"><i class="fas fa-minus text-xs"></i></button>
                            <input type="number" value="1" min="1" class="w-8 text-center bg-transparent border-none focus:outline-none font-bold text-sm text-brown-dark dark:text-white" readonly>
                            <button onclick="updateCartQty(this, 1)" class="w-6 h-6 flex items-center justify-center text-stone-500 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red"><i class="fas fa-plus text-xs"></i></button>
                        </div>
                    </div>

                    <div class="col-span-6 md:col-span-2 text-right">
                        <span class="block md:hidden text-xs text-stone-500">Tổng:</span>
                        <span class="font-bold text-brown-primary dark:text-neon-red text-lg">120.000đ</span>
                    </div>
                </div>
            </div>

            <div class="glass p-4 rounded-2xl bg-white/40 dark:bg-slate-900/40 relative group transition-all hover:bg-white/60 dark:hover:bg-slate-800/60">
                <button class="absolute top-2 right-2 text-stone-400 hover:text-red-500 dark:text-slate-500 dark:hover:text-neon-red p-2 transition"><i class="fas fa-trash-alt"></i></button>
                
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                    <div class="col-span-6 flex items-center gap-4">
                        <div class="w-20 h-24 rounded-lg overflow-hidden shrink-0 border border-stone-200 dark:border-slate-700">
                            <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-brown-dark dark:text-white">Nhà Giả Kim</h3>
                            <p class="text-xs text-stone-500 dark:text-slate-400">Tác giả: Paulo Coelho</p>
                            <p class="text-xs text-stone-500 dark:text-slate-400 mt-1 md:hidden">85.000đ</p>
                        </div>
                    </div>
                    <div class="col-span-2 text-center hidden md:block font-medium dark:text-slate-300">85.000đ</div>
                    <div class="col-span-6 md:col-span-2 flex justify-center">
                        <div class="flex items-center glass rounded-full px-3 py-1 bg-white/50 dark:bg-slate-800/50">
                            <button onclick="updateCartQty(this, -1)" class="w-6 h-6 flex items-center justify-center text-stone-500 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red"><i class="fas fa-minus text-xs"></i></button>
                            <input type="number" value="2" min="1" class="w-8 text-center bg-transparent border-none focus:outline-none font-bold text-sm text-brown-dark dark:text-white" readonly>
                            <button onclick="updateCartQty(this, 1)" class="w-6 h-6 flex items-center justify-center text-stone-500 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red"><i class="fas fa-plus text-xs"></i></button>
                        </div>
                    </div>
                    <div class="col-span-6 md:col-span-2 text-right">
                        <span class="block md:hidden text-xs text-stone-500">Tổng:</span>
                        <span class="font-bold text-brown-primary dark:text-neon-red text-lg">170.000đ</span>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <a href="shop.html" class="inline-flex items-center font-bold text-stone-500 hover:text-brown-primary dark:text-slate-400 dark:hover:text-neon-red transition">
                    <i class="fas fa-arrow-left mr-2"></i> Tiếp tục mua sắm
                </a>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="glass p-6 rounded-3xl bg-white/50 dark:bg-slate-900/60 sticky top-28 border border-white/60 dark:border-white/10">
                <h3 class="text-xl font-bold text-brown-dark dark:text-white mb-6 border-b border-stone-200 dark:border-slate-700 pb-4">Cộng Giỏ Hàng</h3>
                
                <div class="space-y-3 mb-6 text-stone-600 dark:text-slate-300">
                    <div class="flex justify-between">
                        <span>Tạm tính</span>
                        <span class="font-bold">290.000đ</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Phí vận chuyển</span>
                        <span class="font-bold text-green-600 dark:text-green-400">Miễn phí</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span>Mã giảm giá</span>
                        <span class="text-stone-400 italic">Chưa áp dụng</span>
                    </div>
                </div>

                <div class="relative mb-6">
                    <input type="text" placeholder="Nhập mã giảm giá" class="w-full pl-4 pr-20 py-2.5 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:outline-none focus:border-brown-primary dark:focus:border-neon-red dark:text-white transition-all text-sm">
                    <button class="absolute right-1 top-1 bottom-1 px-4 rounded-lg bg-brown-primary text-white text-xs font-bold hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700 transition">Áp dụng</button>
                </div>

                <div class="border-t border-stone-200 dark:border-slate-700 my-4 pt-4">
                    <div class="flex justify-between items-end">
                        <span class="font-bold text-lg text-brown-dark dark:text-white">Tổng cộng</span>
                        <span class="text-2xl font-extrabold text-brown-primary dark:text-neon-red">290.000đ</span>
                    </div>
                    <p class="text-right text-xs text-stone-500 dark:text-slate-500 mt-1">(Đã bao gồm VAT)</p>
                </div>

                <button class="w-full py-4 rounded-xl bg-brown-primary text-white font-bold text-lg hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700 shadow-xl hover:shadow-2xl dark:shadow-[0_0_20px_rgba(255,23,68,0.4)] transition-all duration-300 transform hover:-translate-y-1">
                    Tiến Hành Thanh Toán
                </button>

                <div class="mt-6 flex justify-center gap-3 text-2xl text-stone-400 dark:text-slate-600">
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fab fa-cc-paypal"></i>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection