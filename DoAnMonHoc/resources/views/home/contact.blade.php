@extends('layouts.app')

@section('content')

<main class="pt-24 pb-12 flex-grow">

    {{-- ================= TIÊU ĐỀ ================= --}}
    <section class="container mx-auto px-6 mb-16 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-brown-dark dark:text-white mb-4 animate-fade-in-up">
            Kết Nối Với
            <span
                class="text-transparent bg-clip-text bg-gradient-to-r from-brown-primary to-yellow-600 dark:from-neon-red dark:to-purple-500">
                BookStore
            </span>
        </h1>
        <p class="text-stone-600 dark:text-slate-400 max-w-2xl mx-auto">
            Chúng tôi luôn sẵn sàng lắng nghe ý kiến đóng góp, thắc mắc hoặc đơn giản là chia sẻ niềm đam mê sách cùng bạn.
        </p>
    </section>

    {{-- ================= NỘI DUNG ================= --}}
    <section class="container mx-auto px-6 mb-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            {{-- ===== THÔNG TIN LIÊN HỆ ===== --}}
            <div class="lg:col-span-5 space-y-8">

                <div class="grid gap-6">

                    {{-- ĐỊA CHỈ --}}
                    <div
                        class="glass p-6 rounded-2xl flex items-start space-x-4 bg-white/40 dark:bg-slate-900/40 hover:-translate-y-1 transition-transform duration-300 group">
                        <div
                            class="w-12 h-12 rounded-full bg-brown-primary/10 dark:bg-neon-red/10 text-brown-primary dark:text-neon-red flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-brown-dark dark:text-white mb-1">Địa Chỉ</h3>
                            <p class="text-stone-600 dark:text-slate-300 text-sm">
                                Số 123, Đường Sách Nguyễn Văn Bình, Quận 1, TP. Hồ Chí Minh.
                            </p>
                        </div>
                    </div>

                    {{-- HOTLINE --}}
                    <div
                        class="glass p-6 rounded-2xl flex items-start space-x-4 bg-white/40 dark:bg-slate-900/40 hover:-translate-y-1 transition-transform duration-300 group">
                        <div
                            class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-brown-dark dark:text-white mb-1">Hotline</h3>
                            <p class="text-stone-600 dark:text-slate-300 text-sm mb-1">
                                0909 123 456 (Bán lẻ)
                            </p>
                            <p class="text-stone-600 dark:text-slate-300 text-sm">
                                0909 999 888 (Hợp tác)
                            </p>
                        </div>
                    </div>

                    {{-- EMAIL --}}
                    <div
                        class="glass p-6 rounded-2xl flex items-start space-x-4 bg-white/40 dark:bg-slate-900/40 hover:-translate-y-1 transition-transform duration-300 group">
                        <div
                            class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-500/10 text-green-600 dark:text-green-400 flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-brown-dark dark:text-white mb-1">Email</h3>
                            <p class="text-stone-600 dark:text-slate-300 text-sm">cskh@bookstore.vn</p>
                            <p class="text-stone-600 dark:text-slate-300 text-sm">careers@bookstore.vn</p>
                        </div>
                    </div>

                </div>

                {{-- BẢN ĐỒ --}}
                <div
                    class="glass p-2 rounded-3xl h-64 lg:h-80 bg-white/30 dark:bg-slate-900/30 overflow-hidden relative group">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4946681007846!2d106.69837831474896!3d10.773374292323565!"
                        width="100%" height="100%" style="border:0; border-radius:1rem;" loading="lazy"
                        class="grayscale group-hover:grayscale-0 transition-all duration-700">
                    </iframe>
                    <div
                        class="absolute bottom-4 right-4 bg-white/90 dark:bg-black/80 px-4 py-1 rounded-full text-xs font-bold text-brown-dark dark:text-neon-red shadow-lg">
                        BookStore Location
                    </div>
                </div>

            </div>

            {{-- ===== FORM LIÊN HỆ ===== --}}
            <div class="lg:col-span-7">
                <form action="{{ route('contact.store') }}" method="POST"
                    class="glass p-8 md:p-10 rounded-[40px] bg-white/50 dark:bg-slate-900/60 relative overflow-hidden">

                    @csrf

                    <div
                        class="absolute -top-20 -right-20 w-64 h-64 bg-brown-primary/10 dark:bg-neon-red/5 rounded-full blur-3xl">
                    </div>

                    {{-- THÔNG BÁO --}}
                    @if (session('success'))
                        <div class="mb-6 p-4 rounded-xl bg-green-100 text-green-800 font-semibold">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 p-4 rounded-xl bg-red-100 text-red-700">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h2 class="text-2xl font-bold text-brown-dark dark:text-white mb-6 relative z-10">
                        Gửi Tin Nhắn Cho Chúng Tôi
                    </h2>

                    <div class="space-y-6 relative z-10">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block mb-1 text-sm font-bold text-slate-700 dark:text-slate-200">
                                    Họ và tên
                                </label>
                                <input type="text" name="name" required
                                    class="w-full px-5 py-3 rounded-xl bg-white dark:bg-slate-800 text-slate-800 dark:text-white">
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-bold text-slate-700 dark:text-slate-200">
                                    Email
                                </label>
                                <input type="email" name="email" required
                                    class="w-full px-5 py-3 rounded-xl bg-white dark:bg-slate-800 text-slate-800 dark:text-white">
                            </div>
                        </div>

                        <div>
                            <label class="block mb-1 text-sm font-bold text-slate-700 dark:text-slate-200">
                                Chủ đề
                            </label>
                            <select name="subject"
                                class="w-full px-5 py-3 rounded-xl bg-white dark:bg-slate-800 text-slate-800 dark:text-white">
                                <option>Hỗ trợ đơn hàng</option>
                                <option>Tư vấn sản phẩm</option>
                                <option>Hợp tác kinh doanh</option>
                                <option>Khác</option>
                            </select>
                        </div>

                        <div>
                            <label class="block mb-1 text-sm font-bold text-slate-700 dark:text-slate-200">
                                Nội dung
                            </label>
                            <textarea name="message" rows="5" required
                                class="w-full px-5 py-3 rounded-xl bg-white dark:bg-slate-800 text-slate-800 dark:text-white"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full py-4 rounded-xl bg-brown-primary text-white font-bold hover:opacity-90 transition">
                            <i class="fas fa-paper-plane mr-2"></i> Gửi Ngay
                        </button>

                    </div>
                </form>
            </div>

        </div>
    </section>

</main>

@endsection
