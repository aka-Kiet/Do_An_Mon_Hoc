@extends('layouts.app')

@push('styles')

<link rel="stylesheet" href="{{ asset('css/style_policy.css') }}">

@endpush

@section('content')

<main class="pt-24 pb-12 flex-grow">
        
    <section class="container mx-auto px-6 mb-12 text-center">
        <h1 class="text-3xl md:text-5xl font-extrabold text-brown-dark dark:text-white mb-4">
            Chính Sách & <span class="text-transparent bg-clip-text bg-gradient-to-r from-brown-primary to-yellow-600 dark:from-neon-red dark:to-purple-500">Quy Định</span>
        </h1>
        <p class="text-stone-600 dark:text-slate-400 max-w-2xl mx-auto">
            Chúng tôi cam kết mang lại trải nghiệm mua sắm minh bạch và an tâm nhất cho khách hàng.
        </p>
    </section>

    <div class="container mx-auto px-6 flex flex-col lg:flex-row gap-10">
        
        <aside class="w-full lg:w-1/4 h-fit lg:sticky lg:top-28">
            <div class="glass rounded-3xl p-6 bg-white/50 dark:bg-slate-900/60">
                <h3 class="font-bold text-lg mb-4 text-brown-dark dark:text-white border-b border-stone-200 dark:border-slate-700 pb-2">Mục Lục</h3>
                <nav class="flex flex-col space-y-2">
                    <a href="#giao-hang" class="policy-link px-4 py-2 rounded-lg text-stone-600 dark:text-slate-300 hover:bg-stone-100 dark:hover:bg-slate-800 transition-all">
                        1. Chính Sách Giao Hàng
                    </a>
                    <a href="#phi-ship" class="policy-link px-4 py-2 rounded-lg text-stone-600 dark:text-slate-300 hover:bg-stone-100 dark:hover:bg-slate-800 transition-all">
                        2. Biểu Phí Vận Chuyển
                    </a>
                    <a href="#doi-tra" class="policy-link px-4 py-2 rounded-lg text-stone-600 dark:text-slate-300 hover:bg-stone-100 dark:hover:bg-slate-800 transition-all">
                        3. Chính Sách Đổi Trả
                    </a>
                    <a href="#thanh-toan" class="policy-link px-4 py-2 rounded-lg text-stone-600 dark:text-slate-300 hover:bg-stone-100 dark:hover:bg-slate-800 transition-all">
                        4. Phương Thức Thanh Toán
                    </a>
                </nav>
            </div>
            
            <div class="mt-6 glass rounded-3xl p-6 bg-brown-primary/10 dark:bg-neon-red/10 border border-brown-primary/20 dark:border-neon-red/20 text-center">
                <i class="fas fa-headset text-3xl text-brown-primary dark:text-neon-red mb-3"></i>
                <h4 class="font-bold text-brown-dark dark:text-white">Cần hỗ trợ gấp?</h4>
                <p class="text-xs text-stone-600 dark:text-slate-300 mb-3">Liên hệ hotline để được giải đáp nhanh nhất.</p>
                <a href="tel:0909123456" class="inline-block px-4 py-2 bg-brown-primary text-white dark:bg-neon-red rounded-full text-sm font-bold hover:shadow-lg transition">Gọi 0909 123 456</a>
            </div>
        </aside>

        <div class="w-full lg:w-3/4 space-y-12">

            <section id="giao-hang" class="glass p-8 md:p-10 rounded-[40px] bg-white/40 dark:bg-slate-900/40 relative scroll-mt-28">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 flex items-center justify-center text-xl">
                        <i class="fas fa-truck-fast"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-brown-dark dark:text-white">Chính Sách Giao Hàng</h2>
                </div>
                
                <div class="space-y-4 text-stone-700 dark:text-slate-300 leading-relaxed">
                    <p>BookStore hợp tác với các đơn vị vận chuyển uy tín (Giao Hàng Nhanh, Viettel Post, Shopee Express) để đảm bảo sách đến tay bạn nhanh nhất và nguyên vẹn nhất.</p>
                    <ul class="list-disc pl-5 space-y-2">
                        <li><strong>Thời gian xử lý đơn hàng:</strong> Trong vòng 24h kể từ khi đặt hàng (trừ Chủ Nhật & Lễ Tết).</li>
                        <li><strong>Khu vực Nội thành (TP.HCM, HN):</strong> Giao trong 1-2 ngày làm việc. Có hỗ trợ giao hỏa tốc 2h (Grab/Ahamove).</li>
                        <li><strong>Khu vực Tỉnh/Thành khác:</strong> Giao trong 3-5 ngày làm việc tùy địa lý.</li>
                    </ul>
                </div>
            </section>

            <section id="phi-ship" class="glass p-8 md:p-10 rounded-[40px] bg-white/40 dark:bg-slate-900/40 relative scroll-mt-28">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-500/20 text-green-600 dark:text-green-400 flex items-center justify-center text-xl">
                        <i class="fas fa-coins"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-brown-dark dark:text-white">Biểu Phí Vận Chuyển</h2>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-stone-200 dark:border-slate-700">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-brown-primary/10 dark:bg-slate-800">
                                <th class="p-4 font-bold text-brown-dark dark:text-white">Khu Vực</th>
                                <th class="p-4 font-bold text-brown-dark dark:text-white">Đơn Hàng Dưới 300k</th>
                                <th class="p-4 font-bold text-brown-dark dark:text-white">Đơn Hàng Trên 300k</th>
                            </tr>
                        </thead>
                        <tbody class="text-stone-700 dark:text-slate-300 text-sm">
                            <tr class="border-b border-stone-200 dark:border-slate-700 hover:bg-white/30 dark:hover:bg-slate-800/50 transition">
                                <td class="p-4">Nội thành TP.HCM</td>
                                <td class="p-4">20.000đ</td>
                                <td class="p-4 font-bold text-green-600 dark:text-green-400">Miễn Phí</td>
                            </tr>
                            <tr class="border-b border-stone-200 dark:border-slate-700 hover:bg-white/30 dark:hover:bg-slate-800/50 transition">
                                <td class="p-4">Nội thành Hà Nội</td>
                                <td class="p-4">30.000đ</td>
                                <td class="p-4 font-bold text-green-600 dark:text-green-400">Miễn Phí</td>
                            </tr>
                            <tr class="hover:bg-white/30 dark:hover:bg-slate-800/50 transition">
                                <td class="p-4">Các Tỉnh Thành Khác</td>
                                <td class="p-4">35.000đ - 45.000đ</td>
                                <td class="p-4">Hỗ trợ 20k phí ship</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="mt-4 text-xs italic text-stone-500 dark:text-slate-500">* Phí ship thực tế có thể thay đổi tùy thuộc vào cân nặng của gói hàng.</p>
            </section>

            <section id="doi-tra" class="glass p-8 md:p-10 rounded-[40px] bg-white/40 dark:bg-slate-900/40 relative scroll-mt-28">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-full bg-red-100 dark:bg-neon-red/20 text-red-600 dark:text-neon-red flex items-center justify-center text-xl">
                        <i class="fas fa-undo-alt"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-brown-dark dark:text-white">Chính Sách Đổi Trả</h2>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-3">
                        <h3 class="font-bold text-brown-primary dark:text-neon-red border-b border-dashed border-stone-300 pb-1 mb-3">Điều Kiện Chấp Nhận</h3>
                        <ul class="space-y-2 text-sm text-stone-700 dark:text-slate-300">
                            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i> Sách bị lỗi in ấn, mất trang, rách, móp méo do vận chuyển.</li>
                            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i> Giao sai sách, thiếu sách so với đơn đặt hàng.</li>
                            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i> Sản phẩm còn nguyên màng co (nếu có), chưa qua sử dụng.</li>
                            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i> Thời gian đổi trả: Trong vòng <strong>7 ngày</strong> kể từ khi nhận hàng.</li>
                        </ul>
                    </div>
                    
                    <div class="bg-white/30 dark:bg-slate-800/30 p-5 rounded-2xl">
                         <h3 class="font-bold text-brown-primary dark:text-neon-red border-b border-dashed border-stone-300 pb-1 mb-3">Quy Trình Xử Lý</h3>
                         <div class="space-y-4 relative">
                            <div class="flex gap-3">
                                <div class="w-6 h-6 rounded-full bg-stone-200 dark:bg-slate-600 flex items-center justify-center text-xs font-bold">1</div>
                                <p class="text-sm text-stone-700 dark:text-slate-300">Chụp ảnh/Quay video tình trạng sách lỗi.</p>
                            </div>
                            <div class="flex gap-3">
                                <div class="w-6 h-6 rounded-full bg-stone-200 dark:bg-slate-600 flex items-center justify-center text-xs font-bold">2</div>
                                <p class="text-sm text-stone-700 dark:text-slate-300">Liên hệ Fanpage hoặc Hotline để thông báo.</p>
                            </div>
                            <div class="flex gap-3">
                                <div class="w-6 h-6 rounded-full bg-stone-200 dark:bg-slate-600 flex items-center justify-center text-xs font-bold">3</div>
                                <p class="text-sm text-stone-700 dark:text-slate-300">Gửi hàng về địa chỉ kho (Phí ship do BookStore chịu nếu lỗi từ chúng tôi).</p>
                            </div>
                         </div>
                    </div>
                </div>
            </section>

             <section id="thanh-toan" class="glass p-8 md:p-10 rounded-[40px] bg-white/40 dark:bg-slate-900/40 relative scroll-mt-28">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-500/20 text-purple-600 dark:text-purple-400 flex items-center justify-center text-xl">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-brown-dark dark:text-white">Phương Thức Thanh Toán</h2>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="flex flex-col items-center p-4 rounded-xl border border-stone-200 dark:border-slate-700 bg-white/50 dark:bg-slate-800/50">
                        <i class="fas fa-money-bill-wave text-3xl text-green-500 mb-2"></i>
                        <span class="text-sm font-bold dark:text-slate-200">COD (Tiền mặt)</span>
                    </div>
                    <div class="flex flex-col items-center p-4 rounded-xl border border-stone-200 dark:border-slate-700 bg-white/50 dark:bg-slate-800/50">
                        <i class="fas fa-university text-3xl text-blue-500 mb-2"></i>
                        <span class="text-sm font-bold dark:text-slate-200">Chuyển Khoản</span>
                    </div>
                    <div class="flex flex-col items-center p-4 rounded-xl border border-stone-200 dark:border-slate-700 bg-white/50 dark:bg-slate-800/50">
                        <i class="fas fa-qrcode text-3xl text-purple-500 mb-2"></i>
                        <span class="text-sm font-bold dark:text-slate-200">Momo / ZaloPay</span>
                    </div>
                     <div class="flex flex-col items-center p-4 rounded-xl border border-stone-200 dark:border-slate-700 bg-white/50 dark:bg-slate-800/50">
                        <i class="fab fa-cc-visa text-3xl text-indigo-500 mb-2"></i>
                        <span class="text-sm font-bold dark:text-slate-200">Visa / Master</span>
                    </div>
                </div>
            </section>

        </div>
    </div>
</main>

@endsection

{{-- Thêm code js riêng --}}
@push('scripts')

<script src="{{ asset('js/script_policy.js') }}"></script>

@endpush