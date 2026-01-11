@extends('layouts.app')

@section('content')

<main class="pt-28 pb-12 px-4 container mx-auto flex-grow">
        
    <div class="flex justify-center items-center mb-10 text-sm font-bold">
        <div class="flex items-center text-brown-primary dark:text-neon-red">
            <span class="w-8 h-8 rounded-full border-2 border-current flex items-center justify-center mr-2">1</span> Giỏ hàng
        </div>
        <div class="w-16 h-0.5 bg-brown-primary dark:bg-neon-red mx-4"></div>
        <div class="flex items-center text-brown-primary dark:text-neon-red">
            <span class="w-8 h-8 rounded-full bg-brown-primary text-white dark:bg-neon-red flex items-center justify-center mr-2 shadow-lg">2</span> Thanh toán
        </div>
        <div class="w-16 h-0.5 bg-stone-300 dark:bg-slate-700 mx-4"></div>
        <div class="flex items-center text-stone-400 dark:text-slate-600">
            <span class="w-8 h-8 rounded-full border-2 border-current flex items-center justify-center mr-2">3</span> Hoàn tất
        </div>
    </div>

    <form action="#" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 space-y-6">
            
            <div class="glass p-6 md:p-8 rounded-3xl bg-white/40 dark:bg-slate-900/40">
                <h2 class="text-xl font-bold text-brown-dark dark:text-white mb-6 flex items-center border-b border-stone-200 dark:border-slate-700 pb-2">
                    <i class="fas fa-map-marker-alt mr-3 text-brown-primary dark:text-neon-red"></i> Thông Tin Giao Hàng
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <label class="text-xs font-bold uppercase text-stone-500 dark:text-slate-400 ml-1">Họ tên người nhận</label>
                        <input type="text" placeholder="Nguyễn Văn A" class="w-full px-4 py-3 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:border-brown-primary dark:focus:border-neon-red focus:outline-none focus:ring-2 focus:ring-brown-primary/20 dark:focus:ring-neon-red/20 transition-all dark:text-white">
                    </div>
                    
                    <div class="space-y-1">
                        <label class="text-xs font-bold uppercase text-stone-500 dark:text-slate-400 ml-1">Số điện thoại</label>
                        <input type="tel" placeholder="0909 xxx xxx" class="w-full px-4 py-3 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:border-brown-primary dark:focus:border-neon-red focus:outline-none focus:ring-2 focus:ring-brown-primary/20 dark:focus:ring-neon-red/20 transition-all dark:text-white">
                    </div>

                    <div class="md:col-span-2 space-y-1">
                        <label class="text-xs font-bold uppercase text-stone-500 dark:text-slate-400 ml-1">Email (Để nhận hóa đơn)</label>
                        <input type="email" placeholder="email@example.com" class="w-full px-4 py-3 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:border-brown-primary dark:focus:border-neon-red focus:outline-none focus:ring-2 focus:ring-brown-primary/20 dark:focus:ring-neon-red/20 transition-all dark:text-white">
                    </div>

                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <select class="w-full px-4 py-3 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:outline-none focus:border-brown-primary dark:focus:border-neon-red cursor-pointer">
                            <option>Tỉnh / Thành phố</option>
                            <option>TP. Hồ Chí Minh</option>
                            <option>Hà Nội</option>
                        </select>
                        <select class="w-full px-4 py-3 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:outline-none focus:border-brown-primary dark:focus:border-neon-red cursor-pointer">
                            <option>Quận / Huyện</option>
                        </select>
                        <select class="w-full px-4 py-3 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:outline-none focus:border-brown-primary dark:focus:border-neon-red cursor-pointer">
                            <option>Phường / Xã</option>
                        </select>
                    </div>

                    <div class="md:col-span-2 space-y-1">
                        <label class="text-xs font-bold uppercase text-stone-500 dark:text-slate-400 ml-1">Địa chỉ cụ thể</label>
                        <input type="text" placeholder="Số nhà, tên đường..." class="w-full px-4 py-3 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:border-brown-primary dark:focus:border-neon-red focus:outline-none focus:ring-2 focus:ring-brown-primary/20 dark:focus:ring-neon-red/20 transition-all dark:text-white">
                    </div>
                    
                    <div class="md:col-span-2 space-y-1">
                        <label class="text-xs font-bold uppercase text-stone-500 dark:text-slate-400 ml-1">Ghi chú đơn hàng (Tùy chọn)</label>
                        <textarea rows="2" placeholder="Ví dụ: Giao giờ hành chính..." class="w-full px-4 py-3 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:border-brown-primary dark:focus:border-neon-red focus:outline-none focus:ring-2 focus:ring-brown-primary/20 dark:focus:ring-neon-red/20 transition-all dark:text-white resize-none"></textarea>
                    </div>
                </div>
            </div>

            <div class="glass p-6 md:p-8 rounded-3xl bg-white/40 dark:bg-slate-900/40">
                <h2 class="text-xl font-bold text-brown-dark dark:text-white mb-6 flex items-center border-b border-stone-200 dark:border-slate-700 pb-2">
                    <i class="fas fa-wallet mr-3 text-brown-primary dark:text-neon-red"></i> Phương Thức Thanh Toán
                </h2>

                <div class="space-y-4">
                    <div class="relative">
                        <input type="radio" name="payment" id="cod" class="payment-radio hidden" checked>
                        <label for="cod" class="flex items-center p-4 rounded-xl border-2 border-stone-200 dark:border-slate-700 cursor-pointer hover:bg-white/50 dark:hover:bg-slate-800/50 transition-all">
                            <div class="w-12 h-12 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xl mr-4 shrink-0">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-brown-dark dark:text-white">Thanh toán khi nhận hàng (COD)</h4>
                                <p class="text-xs text-stone-500 dark:text-slate-400">Thanh toán bằng tiền mặt cho shipper khi nhận được hàng.</p>
                            </div>
                        </label>
                    </div>

                    <div class="relative">
                        <input type="radio" name="payment" id="banking" class="payment-radio hidden">
                        <label for="banking" class="flex items-center p-4 rounded-xl border-2 border-stone-200 dark:border-slate-700 cursor-pointer hover:bg-white/50 dark:hover:bg-slate-800/50 transition-all">
                            <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xl mr-4 shrink-0">
                                <i class="fas fa-university"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-brown-dark dark:text-white">Chuyển khoản ngân hàng (QR Code)</h4>
                                <p class="text-xs text-stone-500 dark:text-slate-400">Quét mã QR để thanh toán nhanh chóng qua App ngân hàng.</p>
                            </div>
                        </label>
                    </div>

                    <div class="relative">
                        <input type="radio" name="payment" id="momo" class="payment-radio hidden">
                        <label for="momo" class="flex items-center p-4 rounded-xl border-2 border-stone-200 dark:border-slate-700 cursor-pointer hover:bg-white/50 dark:hover:bg-slate-800/50 transition-all">
                            <div class="w-12 h-12 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center text-xl mr-4 shrink-0">
                                <i class="fas fa-qrcode"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-brown-dark dark:text-white">Ví điện tử (Momo / ZaloPay)</h4>
                                <p class="text-xs text-stone-500 dark:text-slate-400">Liên kết ví điện tử để thanh toán một chạm.</p>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

        </div>

        <div class="lg:col-span-1">
            <div class="glass p-6 rounded-3xl bg-white/50 dark:bg-slate-900/60 sticky top-28 border border-white/60 dark:border-white/10">
                <h3 class="text-xl font-bold text-brown-dark dark:text-white mb-6 border-b border-stone-200 dark:border-slate-700 pb-4">
                    Đơn Hàng (3)
                </h3>
                
                <div class="space-y-4 mb-6 max-h-60 overflow-y-auto pr-2 custom-scrollbar">
                    <div class="flex gap-3">
                        <div class="w-16 h-20 rounded-lg overflow-hidden border border-stone-200 dark:border-slate-700 shrink-0">
                            <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-bold text-brown-dark dark:text-white truncate">Cà Phê Cùng Tony</h4>
                            <div class="flex justify-between mt-1">
                                <span class="text-xs text-stone-500 dark:text-slate-400">x1</span>
                                <span class="text-sm font-bold text-brown-primary dark:text-neon-red">120.000đ</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="w-16 h-20 rounded-lg overflow-hidden border border-stone-200 dark:border-slate-700 shrink-0">
                            <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-bold text-brown-dark dark:text-white truncate">Nhà Giả Kim</h4>
                            <div class="flex justify-between mt-1">
                                <span class="text-xs text-stone-500 dark:text-slate-400">x2</span>
                                <span class="text-sm font-bold text-brown-primary dark:text-neon-red">170.000đ</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center bg-green-100 dark:bg-green-500/10 p-3 rounded-xl mb-4 border border-green-200 dark:border-green-900/30">
                    <span class="text-sm font-bold text-green-700 dark:text-green-400"><i class="fas fa-ticket-alt mr-1"></i> Mã giảm giá</span>
                    <span class="text-sm font-bold text-green-700 dark:text-green-400">-0đ</span>
                </div>

                <div class="space-y-2 border-t border-stone-200 dark:border-slate-700 pt-4">
                    <div class="flex justify-between text-stone-600 dark:text-slate-300 text-sm">
                        <span>Tạm tính</span>
                        <span>290.000đ</span>
                    </div>
                    <div class="flex justify-between text-stone-600 dark:text-slate-300 text-sm">
                        <span>Phí vận chuyển</span>
                        <span class="font-bold text-green-600 dark:text-green-400">Miễn phí</span>
                    </div>
                    <div class="flex justify-between items-end mt-4 pt-4 border-t border-stone-200 dark:border-slate-700">
                        <span class="font-bold text-lg text-brown-dark dark:text-white">Tổng cộng</span>
                        <span class="text-3xl font-extrabold text-brown-primary dark:text-neon-red">290.000đ</span>
                    </div>
                </div>

                <button type="submit" class="w-full mt-6 py-4 rounded-xl bg-brown-primary text-white font-bold text-lg hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700 shadow-xl hover:shadow-2xl dark:shadow-[0_0_20px_rgba(255,23,68,0.4)] transition-all duration-300 transform hover:-translate-y-1">
                    Đặt Hàng Ngay
                </button>
                
                <p class="text-center text-xs text-stone-400 dark:text-slate-500 mt-4">
                    Bằng việc đặt hàng, bạn đồng ý với <a href="#" class="underline hover:text-brown-primary dark:hover:text-neon-red">điều khoản</a> của chúng tôi.
                </p>
            </div>
        </div>

    </form>
</main>

@endsection