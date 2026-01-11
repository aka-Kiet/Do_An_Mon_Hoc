@extends('layouts.app')

@section('content')

<main class="pt-28 pb-12 px-4 container mx-auto flex-grow">
        
    <div class="mb-8 flex items-center text-sm text-stone-500 dark:text-slate-400">
        <a href="index.html" class="hover:text-brown-primary dark:hover:text-neon-red">Trang chủ</a>
        <span class="mx-2">/</span>
        <a href="shop.html" class="hover:text-brown-primary dark:hover:text-neon-red">Sản phẩm</a>
        <span class="mx-2">/</span>
        <span class="font-bold text-brown-dark dark:text-white">Nhà Giả Kim</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 mb-20">
        
        <div class="lg:col-span-5 space-y-4">
            <div class="glass p-4 rounded-3xl bg-white/40 dark:bg-slate-900/40 relative overflow-hidden group">
                <img id="mainImage" src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                     alt="Main Product" class="w-full h-auto rounded-xl object-cover transition-transform duration-500 group-hover:scale-110 cursor-zoom-in">
                <button class="absolute top-6 right-6 z-20 w-10 h-10 rounded-full glass bg-white/60 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red transition-all shadow-md">
                    <i class="far fa-heart text-xl"></i>
                </button>
            </div>
            
            <div class="flex space-x-4 overflow-x-auto pb-2">
                <button onclick="changeImage(this.src)" src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-20 h-20 rounded-xl glass p-1 cursor-pointer border-2 border-brown-primary dark:border-neon-red">
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover rounded-lg">
                </button>
                <button onclick="changeImage(this.src)" src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-20 h-20 rounded-xl glass p-1 cursor-pointer border-2 border-transparent hover:border-brown-primary dark:hover:border-neon-red">
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover rounded-lg">
                </button>
                <button onclick="changeImage(this.src)" src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-20 h-20 rounded-xl glass p-1 cursor-pointer border-2 border-transparent hover:border-brown-primary dark:hover:border-neon-red">
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover rounded-lg">
                </button>
            </div>
        </div>

        <div class="lg:col-span-7 space-y-6">
            
            <div class="flex items-center space-x-4 text-sm font-medium">
                <span class="px-3 py-1 rounded-full bg-brown-primary/10 text-brown-primary dark:bg-neon-red/10 dark:text-neon-red">Văn học</span>
                <span class="text-stone-500 dark:text-slate-400">Tác giả: <a href="#" class="text-brown-primary dark:text-neon-red underline">Paulo Coelho</a></span>
            </div>

            <h1 class="text-4xl md:text-5xl font-extrabold text-brown-dark dark:text-white leading-tight">
                Nhà Giả Kim (Tái Bản 2024)
            </h1>

            <div class="flex items-center space-x-4">
                <div class="flex text-yellow-500 text-sm">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <span class="text-stone-500 dark:text-slate-400 text-sm">(120 đánh giá)</span>
                <span class="h-4 w-px bg-stone-300 dark:bg-slate-700"></span>
                <span class="text-green-600 dark:text-green-400 font-bold text-sm"><i class="fas fa-check-circle mr-1"></i>Còn hàng</span>
            </div>

            <div class="glass p-4 rounded-2xl bg-white/50 dark:bg-slate-800/50 inline-block">
                <span class="text-3xl md:text-4xl font-extrabold text-brown-primary dark:text-neon-red dark:drop-shadow-[0_0_8px_rgba(255,23,68,0.5)]">85.000đ</span>
                <span class="text-lg text-stone-400 dark:text-slate-500 line-through ml-2">120.000đ</span>
                <span class="ml-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">-30%</span>
            </div>

            <p class="text-stone-600 dark:text-slate-300 leading-relaxed">
                "Nhà giả kim" là một trong những cuốn sách bán chạy nhất mọi thời đại. Câu chuyện về chàng chăn cừu Santiago đi tìm kho báu sẽ giúp bạn nhận ra rằng: Khi bạn khao khát một điều gì đó, cả vũ trụ sẽ chung sức giúp bạn đạt được điều đó.
            </p>

            <div class="border-t border-stone-200 dark:border-slate-700 pt-6">
                <div class="flex flex-col md:flex-row gap-4 mb-4">
                    
                    <div class="flex items-center glass rounded-full px-4 py-2 bg-white/50 dark:bg-slate-800/50 w-fit">
                        <button onclick="updateQty(-1)" class="w-8 h-8 flex items-center justify-center text-stone-500 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red transition"><i class="fas fa-minus"></i></button>
                        <input id="qtyInput" type="number" value="1" min="1" class="w-12 text-center bg-transparent border-none focus:outline-none font-bold text-brown-dark dark:text-white" readonly>
                        <button onclick="updateQty(1)" class="w-8 h-8 flex items-center justify-center text-stone-500 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red transition"><i class="fas fa-plus"></i></button>
                    </div>

                    <div class="flex gap-4 flex-1">
                        <button class="flex-1 px-6 py-3 rounded-full border-2 border-brown-primary text-brown-primary font-bold hover:bg-brown-primary hover:text-white dark:border-neon-red dark:text-neon-red dark:hover:bg-neon-red dark:hover:text-white transition-all shadow-lg">
                            <i class="fas fa-cart-plus mr-2"></i> Thêm Giỏ Hàng
                        </button>
                        <button class="flex-1 px-6 py-3 rounded-full bg-brown-primary text-white font-bold hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700 hover:shadow-xl dark:hover:shadow-[0_0_20px_rgba(255,23,68,0.4)] transition-all">
                            Mua Ngay
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex gap-6 text-sm text-stone-500 dark:text-slate-400">
                <div class="flex items-center"><i class="fas fa-shield-alt mr-2 text-brown-primary dark:text-neon-red"></i> Bảo hành đổi trả</div>
                <div class="flex items-center"><i class="fas fa-truck mr-2 text-brown-primary dark:text-neon-red"></i> Freeship nội thành</div>
            </div>

        </div>
    </div>

    <section class="mb-20">
        <div class="glass rounded-[40px] p-1 bg-white/30 dark:bg-slate-900/30 overflow-hidden">
            
            <div class="flex border-b border-white/20 dark:border-slate-700">
                <button onclick="openTab(event, 'desc')" class="tab-btn active px-8 py-4 font-bold text-stone-600 dark:text-slate-400 hover:text-brown-primary dark:hover:text-neon-red transition-all">Mô Tả Sản Phẩm</button>
                <button onclick="openTab(event, 'details')" class="tab-btn px-8 py-4 font-bold text-stone-600 dark:text-slate-400 hover:text-brown-primary dark:hover:text-neon-red transition-all">Thông Tin Chi Tiết</button>
                <button onclick="openTab(event, 'reviews')" class="tab-btn px-8 py-4 font-bold text-stone-600 dark:text-slate-400 hover:text-brown-primary dark:hover:text-neon-red transition-all">Đánh Giá (120)</button>
            </div>

            <div class="p-8 md:p-12 min-h-[300px]">
                
                <div id="desc" class="tab-content block animate-fade-in text-stone-700 dark:text-slate-300 leading-relaxed space-y-4">
                    <p class="font-bold text-lg text-brown-dark dark:text-white">"Nhà Giả Kim" - Hành trình theo đuổi ước mơ.</p>
                    <p>Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người.</p>
                    <p>Tiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách bán được 900 bản. Nhưng số phận của cuốn sách với định mệnh của người đi tìm kho báu ở kim tự tháp cũng giống nhau: phải trải qua hành trình dài mới đến được đích.</p>
                </div>

                <div id="details" class="tab-content hidden animate-fade-in">
                    <table class="w-full text-left border-collapse text-stone-700 dark:text-slate-300">
                        <tbody>
                            <tr class="border-b border-stone-200 dark:border-slate-700"><td class="py-3 font-bold w-1/3">Mã hàng</td><td class="py-3">8935235226278</td></tr>
                            <tr class="border-b border-stone-200 dark:border-slate-700"><td class="py-3 font-bold w-1/3">Nhà xuất bản</td><td class="py-3">NXB Văn Học</td></tr>
                            <tr class="border-b border-stone-200 dark:border-slate-700"><td class="py-3 font-bold w-1/3">Tác giả</td><td class="py-3">Paulo Coelho</td></tr>
                            <tr class="border-b border-stone-200 dark:border-slate-700"><td class="py-3 font-bold w-1/3">Số trang</td><td class="py-3">228</td></tr>
                            <tr><td class="py-3 font-bold w-1/3">Trọng lượng</td><td class="py-3">300g</td></tr>
                        </tbody>
                    </table>
                </div>

                <div id="reviews" class="tab-content hidden animate-fade-in space-y-6">
                    <div class="flex gap-4 border-b border-stone-200 dark:border-slate-700 pb-6">
                        <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden shrink-0"><img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-full h-full object-cover"></div>
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <h4 class="font-bold text-brown-dark dark:text-white">Hoàng Nam</h4>
                                <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                            </div>
                            <p class="text-sm text-stone-600 dark:text-slate-400 mb-2">12/01/2026</p>
                            <p class="text-stone-700 dark:text-slate-300">Sách rất hay, giao hàng nhanh, đóng gói cẩn thận. Shop uy tín, sẽ ủng hộ dài dài.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden shrink-0"><img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-full h-full object-cover"></div>
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <h4 class="font-bold text-brown-dark dark:text-white">Minh Thư</h4>
                                <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                            </div>
                            <p class="text-sm text-stone-600 dark:text-slate-400 mb-2">10/01/2026</p>
                            <p class="text-stone-700 dark:text-slate-300">Bìa sách đẹp, giấy chất lượng. Nội dung thì khỏi bàn, quá kinh điển rồi.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-2xl font-bold text-brown-dark dark:text-white mb-8 border-l-4 border-brown-primary dark:border-neon-red pl-4">
            Sách Cùng Thể Loại
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
                <div class="h-64 overflow-hidden relative p-4">
                    <button class="absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all shadow-sm"><i class="far fa-heart"></i></button>
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                </div>
                <div class="px-5 pb-5 pt-2">
                    <h3 class="font-bold text-stone-800 dark:text-white truncate">Cà Phê Cùng Tony</h3>
                    <span class="text-lg font-extrabold text-brown-primary dark:text-neon-red">120.000đ</span>
                </div>
            </div>
            <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
                <div class="h-64 overflow-hidden relative p-4">
                     <button class="absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all shadow-sm"><i class="far fa-heart"></i></button>
                    <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                </div>
                <div class="px-5 pb-5 pt-2">
                    <h3 class="font-bold text-stone-800 dark:text-white truncate">Đắc Nhân Tâm</h3>
                    <span class="text-lg font-extrabold text-brown-primary dark:text-neon-red">76.000đ</span>
                </div>
            </div>
            <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
                <div class="h-64 overflow-hidden relative p-4">
                     <button class="absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all shadow-sm"><i class="far fa-heart"></i></button>
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                </div>
                <div class="px-5 pb-5 pt-2">
                    <h3 class="font-bold text-stone-800 dark:text-white truncate">Tuổi Trẻ Đáng Giá</h3>
                    <span class="text-lg font-extrabold text-brown-primary dark:text-neon-red">80.000đ</span>
                </div>
            </div>
             <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
                <div class="h-64 overflow-hidden relative p-4">
                     <button class="absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all shadow-sm"><i class="far fa-heart"></i></button>
                    <img src="https://images.unsplash.com/photo-1592496431122-2349e0fbc666?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                </div>
                <div class="px-5 pb-5 pt-2">
                    <h3 class="font-bold text-stone-800 dark:text-white truncate">Tư Duy Ngược</h3>
                    <span class="text-lg font-extrabold text-brown-primary dark:text-neon-red">99.000đ</span>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection