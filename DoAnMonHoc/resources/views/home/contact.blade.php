@extends('layouts.app')

@section('content')

<main class="pt-24 pb-12 flex-grow">
        
    <section class="container mx-auto px-6 mb-16 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-brown-dark dark:text-white mb-4 animate-fade-in-up">
            Kết Nối Với <span class="text-transparent bg-clip-text bg-gradient-to-r from-brown-primary to-yellow-600 dark:from-neon-red dark:to-purple-500">BookStore</span>
        </h1>
        <p class="text-stone-600 dark:text-slate-400 max-w-2xl mx-auto">
            Chúng tôi luôn sẵn sàng lắng nghe ý kiến đóng góp, thắc mắc hoặc đơn giản là chia sẻ niềm đam mê sách cùng bạn.
        </p>
    </section>

    <section class="container mx-auto px-6 mb-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <div class="lg:col-span-5 space-y-8">
                
                <div class="grid gap-6">
                    <div class="glass p-6 rounded-2xl flex items-start space-x-4 bg-white/40 dark:bg-slate-900/40 hover:-translate-y-1 transition-transform duration-300 group">
                        <div class="w-12 h-12 rounded-full bg-brown-primary/10 dark:bg-neon-red/10 text-brown-primary dark:text-neon-red flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-brown-dark dark:text-white mb-1">Địa Chỉ</h3>
                            <p class="text-stone-600 dark:text-slate-300 text-sm">
                                Số 123, Đường Sách Nguyễn Văn Bình, Quận 1, TP. Hồ Chí Minh.
                            </p>
                        </div>
                    </div>

                    <div class="glass p-6 rounded-2xl flex items-start space-x-4 bg-white/40 dark:bg-slate-900/40 hover:-translate-y-1 transition-transform duration-300 group">
                        <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-brown-dark dark:text-white mb-1">Hotline</h3>
                            <p class="text-stone-600 dark:text-slate-300 text-sm mb-1">0909 123 456 (Bán lẻ)</p>
                            <p class="text-stone-600 dark:text-slate-300 text-sm">0909 999 888 (Hợp tác)</p>
                        </div>
                    </div>

                    <div class="glass p-6 rounded-2xl flex items-start space-x-4 bg-white/40 dark:bg-slate-900/40 hover:-translate-y-1 transition-transform duration-300 group">
                        <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-500/10 text-green-600 dark:text-green-400 flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-brown-dark dark:text-white mb-1">Email</h3>
                            <p class="text-stone-600 dark:text-slate-300 text-sm">cskh@bookstore.vn</p>
                            <p class="text-stone-600 dark:text-slate-300 text-sm">careers@bookstore.vn</p>
                        </div>
                    </div>
                </div>

                <div class="glass p-2 rounded-3xl h-64 lg:h-80 bg-white/30 dark:bg-slate-900/30 overflow-hidden relative group">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4946681007846!2d106.69837831474896!3d10.773374292323565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4743648f3d%3A0x16ce95918cb14834!2zxJDGsOG7nW5nIFPDoWNoIFRQLiBIQ00!5e0!3m2!1svi!2s!4v1623456789012!5m2!1svi!2s" 
                            width="100%" height="100%" style="border:0; border-radius: 1rem;" allowfullscreen="" loading="lazy" class="grayscale group-hover:grayscale-0 transition-all duration-700"></iframe>
                    <div class="absolute bottom-4 right-4 bg-white/90 dark:bg-black/80 px-4 py-1 rounded-full text-xs font-bold text-brown-dark dark:text-neon-red shadow-lg pointer-events-none">
                        BookStore Location
                    </div>
                </div>

            </div>

            <div class="lg:col-span-7">
                <form action="#" method="POST" class="glass p-8 md:p-10 rounded-[40px] bg-white/50 dark:bg-slate-900/60 relative overflow-hidden">
                    
                    <div class="absolute -top-20 -right-20 w-64 h-64 bg-brown-primary/10 dark:bg-neon-red/5 rounded-full blur-3xl pointer-events-none"></div>

                    <h2 class="text-2xl font-bold text-brown-dark dark:text-white mb-6 relative z-10">Gửi Tin Nhắn Cho Chúng Tôi</h2>
                    
                    <div class="space-y-6 relative z-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="name" class="text-sm font-bold text-stone-600 dark:text-slate-400 ml-1">Họ và tên</label>
                                <input type="text" id="name" placeholder="Ví dụ: Nguyễn Văn A" class="w-full px-5 py-3 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:border-brown-primary dark:focus:border-neon-red focus:outline-none focus:ring-2 focus:ring-brown-primary/20 dark:focus:ring-neon-red/20 transition-all dark:text-white">
                            </div>
                            <div class="space-y-2">
                                <label for="email" class="text-sm font-bold text-stone-600 dark:text-slate-400 ml-1">Email</label>
                                <input type="email" id="email" placeholder="example@email.com" class="w-full px-5 py-3 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:border-brown-primary dark:focus:border-neon-red focus:outline-none focus:ring-2 focus:ring-brown-primary/20 dark:focus:ring-neon-red/20 transition-all dark:text-white">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="subject" class="text-sm font-bold text-stone-600 dark:text-slate-400 ml-1">Chủ đề</label>
                            <select id="subject" class="w-full px-5 py-3 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:border-brown-primary dark:focus:border-neon-red focus:outline-none focus:ring-2 focus:ring-brown-primary/20 dark:focus:ring-neon-red/20 transition-all dark:text-white cursor-pointer">
                                <option>Hỗ trợ đơn hàng</option>
                                <option>Tư vấn sản phẩm</option>
                                <option>Hợp tác kinh doanh</option>
                                <option>Khác</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="message" class="text-sm font-bold text-stone-600 dark:text-slate-400 ml-1">Nội dung tin nhắn</label>
                            <textarea id="message" rows="5" placeholder="Bạn cần hỗ trợ gì..." class="w-full px-5 py-3 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:border-brown-primary dark:focus:border-neon-red focus:outline-none focus:ring-2 focus:ring-brown-primary/20 dark:focus:ring-neon-red/20 transition-all dark:text-white resize-none"></textarea>
                        </div>

                        <button type="submit" class="w-full py-4 rounded-xl bg-brown-primary text-white font-bold text-lg hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700 hover:shadow-lg dark:hover:shadow-[0_0_20px_rgba(255,23,68,0.4)] transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-paper-plane mr-2"></i> Gửi Ngay
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>

    <section class="container mx-auto px-6 mb-12">
        <h2 class="text-2xl font-bold text-center text-brown-dark dark:text-white mb-8 border-t border-stone-200 dark:border-slate-800 pt-8">
            Câu Hỏi Thường Gặp (FAQ)
        </h2>
        <div class="grid md:grid-cols-2 gap-6">
            <div class="glass p-5 rounded-2xl bg-white/30 dark:bg-slate-900/30">
                <h3 class="font-bold text-brown-primary dark:text-neon-red mb-2"><i class="fas fa-question-circle mr-2"></i>Tôi có thể đổi trả sách không?</h3>
                <p class="text-sm text-stone-600 dark:text-slate-300">Có, chúng tôi hỗ trợ đổi trả trong vòng 7 ngày nếu sách có lỗi từ nhà xuất bản hoặc hư hỏng do vận chuyển.</p>
            </div>
            <div class="glass p-5 rounded-2xl bg-white/30 dark:bg-slate-900/30">
                <h3 class="font-bold text-brown-primary dark:text-neon-red mb-2"><i class="fas fa-shipping-fast mr-2"></i>Thời gian giao hàng bao lâu?</h3>
                <p class="text-sm text-stone-600 dark:text-slate-300">Nội thành TP.HCM: 1-2 ngày. Các tỉnh thành khác: 3-5 ngày làm việc.</p>
            </div>
        </div>
    </section>

</main>

@endsection