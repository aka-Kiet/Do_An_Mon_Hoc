@extends('layouts.app')

@section('content')

<main class="pt-20 flex-grow min-h-screen bg-stone-50 dark:bg-slate-900 transition-colors duration-300">
    
    {{-- 1. HERO SECTION: GIỚI THIỆU CHUNG --}}
    <section class="relative h-[350px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                 class="w-full h-full object-cover opacity-70 dark:opacity-30 fixed-bg-effect" alt="Background">
            <div class="absolute inset-0 bg-gradient-to-b from-white/60 via-white/20 to-stone-50 dark:from-slate-950 dark:via-slate-900/60 dark:to-slate-900"></div>
        </div>
        <div class="relative z-10 text-center px-4 max-w-4xl">
            <span class="px-4 py-1 rounded-full border border-brown-primary/50 text-brown-primary dark:text-neon-red dark:border-neon-red/50 bg-white/50 dark:bg-slate-800/50 backdrop-blur text-sm font-bold uppercase tracking-widest mb-4 inline-block">
                Về Chúng Tôi
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-brown-dark dark:text-white mb-6 drop-shadow-sm">
                BookStore - <span class="text-transparent bg-clip-text bg-gradient-to-r from-brown-primary to-yellow-600 dark:from-neon-red dark:to-purple-500">Kết Nối Tri Thức</span>
            </h1>
            <p class="text-lg text-stone-700 dark:text-slate-300 font-medium glass p-4 rounded-2xl border border-white/40 dark:border-white/10 mx-auto max-w-2xl">
                Nơi mang đến những cuốn sách giá trị và trải nghiệm mua sắm tuyệt vời nhất.
            </p>
        </div>
    </section>

    {{-- 2. HỒ SƠ DOANH NGHIỆP & CHÍNH SÁCH --}}
    <section class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Cột trái: Thông tin công ty --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="glass p-8 rounded-3xl bg-white/60 dark:bg-slate-800/40 border border-white/50 dark:border-slate-700 shadow-xl relative overflow-hidden">
                    {{-- Trang trí --}}
                    <div class="absolute top-0 right-0 w-24 h-24 bg-brown-primary/10 dark:bg-neon-red/10 rounded-bl-[100px]"></div>
                    
                    <h2 class="text-2xl font-bold text-brown-dark dark:text-white mb-6 flex items-center">
                        <i class="fas fa-building mr-3 text-brown-primary dark:text-neon-red"></i> Hồ Sơ
                    </h2>
                    
                    <ul class="space-y-4 text-stone-600 dark:text-slate-300">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-signature mt-1 text-brown-primary dark:text-red-500"></i>
                            <div>
                                <span class="font-bold block text-stone-800 dark:text-white">Tên đơn vị:</span>
                                Công Ty Cổ Phần BookStore Việt Nam
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt mt-1 text-brown-primary dark:text-red-500"></i>
                            <div>
                                <span class="font-bold block text-stone-800 dark:text-white">Địa chỉ:</span>
                                123 Đường Sách, Phường Bến Nghé, Quận 1, TP. Hồ Chí Minh
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-briefcase mt-1 text-brown-primary dark:text-red-500"></i>
                            <div>
                                <span class="font-bold block text-stone-800 dark:text-white">Lĩnh vực:</span>
                                Kinh doanh xuất bản phẩm, văn hóa phẩm, tổ chức sự kiện sách.
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-certificate mt-1 text-brown-primary dark:text-red-500"></i>
                            <div>
                                <span class="font-bold block text-stone-800 dark:text-white">MST:</span>
                                0102030405
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Cột phải: Các chính sách (Grid 2x2) --}}
            <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Chính sách 1 --}}
                <div class="glass p-6 rounded-2xl bg-white/50 dark:bg-slate-800/30 hover:bg-white dark:hover:bg-slate-800 transition-all border border-stone-200 dark:border-slate-700 group">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h3 class="text-xl font-bold text-stone-800 dark:text-white mb-2">Vận chuyển & Giao nhận</h3>
                    <p class="text-sm text-stone-500 dark:text-slate-400">Miễn phí giao hàng cho đơn từ 300k. Giao hỏa tốc trong 2h tại nội thành TP.HCM và Hà Nội.</p>
                </div>

                {{-- Chính sách 2 --}}
                <div class="glass p-6 rounded-2xl bg-white/50 dark:bg-slate-800/30 hover:bg-white dark:hover:bg-slate-800 transition-all border border-stone-200 dark:border-slate-700 group">
                    <div class="w-12 h-12 rounded-xl bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-stone-800 dark:text-white mb-2">Đổi trả & Hoàn tiền</h3>
                    <p class="text-sm text-stone-500 dark:text-slate-400">Đổi trả miễn phí trong 7 ngày nếu sách lỗi in ấn, hư hỏng do vận chuyển. Hoàn tiền 100%.</p>
                </div>

                {{-- Chính sách 3 --}}
                <div class="glass p-6 rounded-2xl bg-white/50 dark:bg-slate-800/30 hover:bg-white dark:hover:bg-slate-800 transition-all border border-stone-200 dark:border-slate-700 group">
                    <div class="w-12 h-12 rounded-xl bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 dark:text-yellow-400 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-stone-800 dark:text-white mb-2">Bảo mật thông tin</h3>
                    <p class="text-sm text-stone-500 dark:text-slate-400">Cam kết bảo mật tuyệt đối thông tin khách hàng. Không chia sẻ với bên thứ ba.</p>
                </div>

                {{-- Chính sách 4 --}}
                <div class="glass p-6 rounded-2xl bg-white/50 dark:bg-slate-800/30 hover:bg-white dark:hover:bg-slate-800 transition-all border border-stone-200 dark:border-slate-700 group">
                    <div class="w-12 h-12 rounded-xl bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-crown"></i>
                    </div>
                    <h3 class="text-xl font-bold text-stone-800 dark:text-white mb-2">Khách hàng thân thiết</h3>
                    <p class="text-sm text-stone-500 dark:text-slate-400">Tích điểm đổi quà, ưu đãi đặc biệt vào ngày sinh nhật và các dịp lễ lớn.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. DANH SÁCH BLOG (TIN TỨC) --}}
    <section class="py-16 bg-white/50 dark:bg-slate-800/50 backdrop-blur-sm border-y border-stone-200 dark:border-slate-700">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <span class="text-brown-primary dark:text-neon-red font-bold text-sm tracking-wider uppercase">Cập nhật</span>
                    <h2 class="text-3xl font-extrabold text-brown-dark dark:text-white mt-2">Tin Tức & Hoạt Động</h2>
                </div>
                <a href="#" class="hidden md:inline-flex items-center text-stone-500 hover:text-brown-primary dark:hover:text-neon-red font-bold transition">
                    Xem tất cả <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Demo Blog Item 1 --}}
                <article class="group bg-white dark:bg-slate-900 rounded-2xl shadow-lg hover:shadow-xl transition overflow-hidden border border-stone-100 dark:border-slate-700">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=80" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 left-4 bg-brown-primary dark:bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full">Sự kiện</div>
                    </div>
                    <div class="p-6">
                        <div class="text-xs text-stone-400 mb-2 flex items-center gap-2">
                            <i class="far fa-calendar-alt"></i> 15/10/2023
                        </div>
                        <h3 class="text-xl font-bold text-stone-800 dark:text-white mb-3 line-clamp-2 group-hover:text-brown-primary dark:group-hover:text-neon-red transition">
                            Hội sách Mùa Thu 2023 - Giảm giá lên đến 50%
                        </h3>
                        <p class="text-stone-500 dark:text-slate-400 text-sm line-clamp-3 mb-4">
                            Cùng hòa mình vào không gian văn hóa đọc sôi động với hàng ngàn đầu sách hấp dẫn đang chờ đón bạn.
                        </p>
                        <a href="#" class="text-brown-primary dark:text-neon-red font-bold text-sm hover:underline">Đọc tiếp</a>
                    </div>
                </article>

                {{-- Demo Blog Item 2 --}}
                <article class="group bg-white dark:bg-slate-900 rounded-2xl shadow-lg hover:shadow-xl transition overflow-hidden border border-stone-100 dark:border-slate-700">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&w=800&q=80" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">Thông báo</div>
                    </div>
                    <div class="p-6">
                        <div class="text-xs text-stone-400 mb-2 flex items-center gap-2">
                            <i class="far fa-calendar-alt"></i> 10/10/2023
                        </div>
                        <h3 class="text-xl font-bold text-stone-800 dark:text-white mb-3 line-clamp-2 group-hover:text-brown-primary dark:group-hover:text-neon-red transition">
                            Thông báo lịch nghỉ lễ và kế hoạch giao hàng
                        </h3>
                        <p class="text-stone-500 dark:text-slate-400 text-sm line-clamp-3 mb-4">
                            BookStore xin thông báo lịch nghỉ lễ Quốc Khánh và thời gian xử lý đơn hàng trong dịp lễ.
                        </p>
                        <a href="#" class="text-brown-primary dark:text-neon-red font-bold text-sm hover:underline">Đọc tiếp</a>
                    </div>
                </article>

                {{-- Demo Blog Item 3 --}}
                <article class="group bg-white dark:bg-slate-900 rounded-2xl shadow-lg hover:shadow-xl transition overflow-hidden border border-stone-100 dark:border-slate-700">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=800&q=80" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 left-4 bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full">Cộng đồng</div>
                    </div>
                    <div class="p-6">
                        <div class="text-xs text-stone-400 mb-2 flex items-center gap-2">
                            <i class="far fa-calendar-alt"></i> 05/10/2023
                        </div>
                        <h3 class="text-xl font-bold text-stone-800 dark:text-white mb-3 line-clamp-2 group-hover:text-brown-primary dark:group-hover:text-neon-red transition">
                            Tổng kết quỹ thiện nguyện "Sách cho em"
                        </h3>
                        <p class="text-stone-500 dark:text-slate-400 text-sm line-clamp-3 mb-4">
                            Hành trình mang 1000 cuốn sách giáo khoa và truyện tranh đến với trẻ em vùng cao Tây Bắc.
                        </p>
                        <a href="#" class="text-brown-primary dark:text-neon-red font-bold text-sm hover:underline">Đọc tiếp</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- 4. BÀI VIẾT SẢN PHẨM (SEARCH & PAGINATION) --}}
    <section class="container mx-auto px-4 py-16" id="product-reviews">
        <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-6">
            <div>
                <h2 class="text-3xl font-extrabold text-brown-dark dark:text-white">Review & Giới Thiệu Sách</h2>
                <p class="text-stone-500 dark:text-slate-400 mt-2">Góc nhìn chuyên sâu về những tác phẩm nổi bật.</p>
            </div>

            {{-- Form Tìm Kiếm Bài Viết --}}
            <form action="" method="GET" class="relative w-full md:w-96 group">
                <input type="text" name="q" placeholder="Tìm kiếm bài viết review..." 
                       class="w-full pl-12 pr-4 py-3 rounded-full border border-stone-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-stone-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-brown-primary dark:focus:ring-neon-red transition shadow-sm">
                <button type="submit" class="absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 group-focus-within:text-brown-primary dark:group-focus-within:text-neon-red transition">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        {{-- Danh sách bài viết sản phẩm (Grid List) --}}
        <div class="space-y-6">
            {{-- Demo Article Item 1 --}}
            <div class="flex flex-col md:flex-row gap-6 p-4 rounded-3xl bg-white dark:bg-slate-800 shadow-sm border border-stone-100 dark:border-slate-700 hover:shadow-lg transition group">
                <div class="w-full md:w-64 h-48 rounded-2xl overflow-hidden shrink-0">
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=800&q=80" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="flex-1 flex flex-col justify-center">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2 py-1 rounded bg-stone-100 dark:bg-slate-700 text-xs font-bold text-stone-600 dark:text-slate-300">Văn học</span>
                        <span class="text-xs text-stone-400"><i class="far fa-clock"></i> 5 phút đọc</span>
                    </div>
                    <h3 class="text-2xl font-bold text-brown-dark dark:text-white mb-2 group-hover:text-brown-primary dark:group-hover:text-neon-red transition">
                        [Review] Nhà Giả Kim - Hành trình đi tìm kho báu của chính mình
                    </h3>
                    <p class="text-stone-600 dark:text-slate-400 mb-4 line-clamp-2">
                        "Khi bạn khao khát một điều gì đó, cả vũ trụ sẽ hợp lực giúp bạn đạt được điều đó." - Một cuốn sách kinh điển về ước mơ và định mệnh.
                    </p>
                    <div class="flex items-center justify-between">
                        <a href="#" class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-brown-primary dark:bg-red-600 text-white font-bold text-sm hover:bg-brown-dark dark:hover:bg-red-700 transition">
                            Đọc chi tiết <i class="fas fa-arrow-right"></i>
                        </a>
                        <div class="flex items-center gap-4 text-stone-400 text-sm">
                            <span><i class="far fa-eye"></i> 1.2k</span>
                            <span><i class="far fa-heart"></i> 450</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Demo Article Item 2 --}}
            <div class="flex flex-col md:flex-row gap-6 p-4 rounded-3xl bg-white dark:bg-slate-800 shadow-sm border border-stone-100 dark:border-slate-700 hover:shadow-lg transition group">
                <div class="w-full md:w-64 h-48 rounded-2xl overflow-hidden shrink-0">
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=800&q=80" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="flex-1 flex flex-col justify-center">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2 py-1 rounded bg-stone-100 dark:bg-slate-700 text-xs font-bold text-stone-600 dark:text-slate-300">Kinh tế</span>
                        <span class="text-xs text-stone-400"><i class="far fa-clock"></i> 8 phút đọc</span>
                    </div>
                    <h3 class="text-2xl font-bold text-brown-dark dark:text-white mb-2 group-hover:text-brown-primary dark:group-hover:text-neon-red transition">
                        Top 5 cuốn sách về Tài chính cá nhân bạn nên đọc trước tuổi 30
                    </h3>
                    <p class="text-stone-600 dark:text-slate-400 mb-4 line-clamp-2">
                        Quản lý tài chính không khó như bạn nghĩ. Hãy bắt đầu với những kiến thức cơ bản từ những chuyên gia hàng đầu.
                    </p>
                    <div class="flex items-center justify-between">
                        <a href="#" class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-brown-primary dark:bg-red-600 text-white font-bold text-sm hover:bg-brown-dark dark:hover:bg-red-700 transition">
                            Đọc chi tiết <i class="fas fa-arrow-right"></i>
                        </a>
                        <div class="flex items-center gap-4 text-stone-400 text-sm">
                            <span><i class="far fa-eye"></i> 850</span>
                            <span><i class="far fa-heart"></i> 230</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pagination (Mẫu) --}}
        <div class="mt-12 flex justify-center">
            <nav class="flex gap-2">
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white dark:bg-slate-800 border border-stone-200 dark:border-slate-700 text-stone-500 hover:bg-brown-primary hover:text-white dark:hover:bg-neon-red transition">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-brown-primary dark:bg-neon-red text-white font-bold shadow-lg">1</a>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white dark:bg-slate-800 border border-stone-200 dark:border-slate-700 text-stone-600 dark:text-slate-300 hover:bg-brown-primary hover:text-white dark:hover:bg-neon-red transition">2</a>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white dark:bg-slate-800 border border-stone-200 dark:border-slate-700 text-stone-600 dark:text-slate-300 hover:bg-brown-primary hover:text-white dark:hover:bg-neon-red transition">3</a>
                <span class="w-10 h-10 flex items-center justify-center text-stone-400">...</span>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white dark:bg-slate-800 border border-stone-200 dark:border-slate-700 text-stone-500 hover:bg-brown-primary hover:text-white dark:hover:bg-neon-red transition">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>

    </section>

</main>

@endsection