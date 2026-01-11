@extends('layouts.app')

@section('content')

<main class="pt-20 flex-grow">
        
    <section class="relative h-[400px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" class="w-full h-full object-cover opacity-80 dark:opacity-40 fixed-bg-effect" alt="About Hero">
            <div class="absolute inset-0 bg-gradient-to-b from-white/80 via-white/40 to-transparent dark:from-slate-950 dark:via-slate-900/70 dark:to-transparent"></div>
        </div>
        <div class="relative z-10 text-center px-4 max-w-3xl">
            <h1 class="text-4xl md:text-6xl font-extrabold text-brown-dark dark:text-white mb-4 drop-shadow-sm animate-fade-in-up">
                Chúng Tôi Là <span class="text-transparent bg-clip-text bg-gradient-to-r from-brown-primary to-yellow-600 dark:from-neon-red dark:to-purple-500">BookStore</span>
            </h1>
            <p class="text-lg text-stone-700 dark:text-slate-300 font-medium glass p-4 rounded-2xl border border-white/40 dark:border-white/10 inline-block mx-auto">
                Không chỉ là nơi bán sách, chúng tôi xây dựng một không gian để kết nối tri thức và những tâm hồn đồng điệu.
            </p>
        </div>
    </section>

    <section class="container mx-auto px-6 py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="glass p-8 md:p-12 rounded-[40px] bg-white/40 dark:bg-slate-900/40 border border-white/60 dark:border-white/5 relative overflow-hidden group">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-brown-primary/10 dark:bg-neon-red/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-yellow-500/10 dark:bg-purple-500/10 rounded-full blur-3xl"></div>

                <h2 class="text-3xl font-bold text-brown-dark dark:text-white mb-6 border-l-4 border-brown-primary dark:border-neon-red pl-4">
                    Câu Chuyện Khởi Nguồn
                </h2>
                <div class="space-y-4 text-stone-600 dark:text-slate-300 leading-relaxed relative z-10">
                    <p>
                        Được thành lập vào năm 2020, giữa những biến động của thời đại số, BookStore ra đời với niềm tin giản dị rằng: <strong class="text-brown-primary dark:text-neon-red">Sách giấy vẫn có một vị trí không thể thay thế</strong>.
                    </p>
                    <p>
                        Chúng tôi bắt đầu từ một tiệm sách nhỏ trong ngõ, chuyên sưu tầm những đầu sách văn học kinh điển. Với sự ủng hộ của cộng đồng, chúng tôi đã phát triển thành một không gian đa chiều, kết hợp giữa trải nghiệm đọc sách truyền thống (Vintage) và công nghệ hiện đại (Cyberpunk).
                    </p>
                    <p>
                        Sứ mệnh của chúng tôi là mang đến cho bạn những cuốn sách chất lượng nhất, trong một không gian truyền cảm hứng nhất.
                    </p>
                </div>
            </div>

            <div class="relative h-[500px] rounded-[40px] overflow-hidden shadow-2xl group">
                <img src="https://images.unsplash.com/photo-1568667256549-094345857637?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Our Store Cozy Corner" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 rounded-[40px] border-2 border-transparent dark:group-hover:border-neon-red/40 dark:group-hover:shadow-[inset_0_0_40px_rgba(255,23,68,0.3)] transition-all duration-700 pointer-events-none"></div>
            </div>
        </div>
    </section>

    <section class="bg-brown-primary/5 dark:bg-slate-900/50 py-16">
        <div class="container mx-auto px-6">
             <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="glass p-6 rounded-2xl">
                    <span class="block text-4xl font-extrabold text-brown-primary dark:text-neon-red mb-2">3+</span>
                    <span class="text-sm font-bold text-stone-600 dark:text-slate-400 uppercase">Năm Hoạt Động</span>
                </div>
                <div class="glass p-6 rounded-2xl">
                    <span class="block text-4xl font-extrabold text-brown-primary dark:text-neon-red mb-2">15k+</span>
                    <span class="text-sm font-bold text-stone-600 dark:text-slate-400 uppercase">Sách Đã Bán</span>
                </div>
                <div class="glass p-6 rounded-2xl">
                    <span class="block text-4xl font-extrabold text-brown-primary dark:text-neon-red mb-2">500+</span>
                    <span class="text-sm font-bold text-stone-600 dark:text-slate-400 uppercase">Đầu Sách</span>
                </div>
                 <div class="glass p-6 rounded-2xl">
                    <span class="block text-4xl font-extrabold text-brown-primary dark:text-neon-red mb-2">98%</span>
                    <span class="text-sm font-bold text-stone-600 dark:text-slate-400 uppercase">Hài Lòng</span>
                </div>
             </div>
        </div>
    </section>

    <section class="container mx-auto px-6 py-20 mb-12 relative">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-brown-dark dark:text-white inline-block relative">
                Đội Ngũ Của Chúng Tôi
                <span class="absolute bottom-0 left-0 w-full h-1 bg-brown-primary dark:bg-neon-red rounded-full opacity-30"></span>
            </h2>
            <p class="text-stone-600 dark:text-slate-400 mt-4 max-w-xl mx-auto">Những con người đầy nhiệt huyết đứng sau sự thành công của BookStore.</p>
        </div>

        <div class="relative max-w-4xl mx-auto">
            
            <button id="teamPrevBtn" class="absolute left-0 md:-left-12 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full glass bg-white/50 dark:bg-slate-800/50 flex items-center justify-center text-brown-dark dark:text-white hover:bg-brown-primary hover:text-white dark:hover:bg-neon-red transition shadow-md">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="teamNextBtn" class="absolute right-0 md:-right-12 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full glass bg-white/50 dark:bg-slate-800/50 flex items-center justify-center text-brown-dark dark:text-white hover:bg-brown-primary hover:text-white dark:hover:bg-neon-red transition shadow-md">
                <i class="fas fa-chevron-right"></i>
            </button>

            <div class="overflow-hidden rounded-[3rem] glass shadow-xl">
                <div id="teamTrack" class="flex transition-transform duration-500 ease-out h-[450px]">
                    
                    <div class="min-w-full p-8 md:p-12 flex flex-col items-center justify-center text-center relative group">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-brown-primary/20 dark:bg-neon-red/10 rounded-full blur-[80px] -z-10 group-hover:bg-brown-primary/30 dark:group-hover:bg-neon-red/20 transition-all"></div>

                        <div class="relative w-40 h-40 mb-6 rounded-full p-1 glass border-2 border-brown-primary/30 dark:border-neon-red/50 group-hover:border-brown-primary dark:group-hover:border-neon-red transition-all duration-300">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Member 1" class="w-full h-full object-cover rounded-full">
                        </div>
                        <h3 class="text-2xl font-bold text-brown-dark dark:text-white mb-1">Nguyễn Văn A</h3>
                        <span class="text-sm font-bold text-brown-primary dark:text-neon-red uppercase tracking-wider mb-4">Founder & CEO</span>
                        <p class="text-stone-600 dark:text-slate-300 italic max-w-md leading-relaxed relative">
                            <i class="fas fa-quote-left text-2xl text-brown-primary/20 dark:text-neon-red/20 absolute -top-4 -left-6"></i>
                            "Tầm nhìn của tôi là biến việc đọc sách trở thành một phong cách sống, không chỉ là một sở thích."
                        </p>
                        <div class="flex space-x-4 mt-6">
                            <a href="#" class="text-stone-400 hover:text-brown-primary dark:hover:text-neon-red transition"><i class="fab fa-linkedin text-xl"></i></a>
                            <a href="#" class="text-stone-400 hover:text-brown-primary dark:hover:text-neon-red transition"><i class="fab fa-twitter text-xl"></i></a>
                        </div>
                    </div>

                    <div class="min-w-full p-8 md:p-12 flex flex-col items-center justify-center text-center relative group">
                         <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-blue-500/20 dark:bg-blue-500/10 rounded-full blur-[80px] -z-10 group-hover:bg-blue-500/30 transition-all"></div>
                        <div class="relative w-40 h-40 mb-6 rounded-full p-1 glass border-2 border-blue-500/30 group-hover:border-blue-500 transition-all duration-300">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Member 2" class="w-full h-full object-cover rounded-full">
                        </div>
                        <h3 class="text-2xl font-bold text-brown-dark dark:text-white mb-1">Trần Thị B</h3>
                        <span class="text-sm font-bold text-blue-600 dark:text-blue-400 uppercase tracking-wider mb-4">Head of Marketing</span>
                        <p class="text-stone-600 dark:text-slate-300 italic max-w-md leading-relaxed relative">
                             <i class="fas fa-quote-left text-2xl text-blue-500/20 absolute -top-4 -left-6"></i>
                            "Chúng tôi kể những câu chuyện đằng sau mỗi cuốn sách để kết nối chúng với đúng người đọc."
                        </p>
                         <div class="flex space-x-4 mt-6">
                            <a href="#" class="text-stone-400 hover:text-blue-600 transition"><i class="fab fa-facebook text-xl"></i></a>
                            <a href="#" class="text-stone-400 hover:text-blue-600 transition"><i class="fab fa-instagram text-xl"></i></a>
                        </div>
                    </div>

                    <div class="min-w-full p-8 md:p-12 flex flex-col items-center justify-center text-center relative group">
                         <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-yellow-500/20 dark:bg-yellow-500/10 rounded-full blur-[80px] -z-10 group-hover:bg-yellow-500/30 transition-all"></div>
                        <div class="relative w-40 h-40 mb-6 rounded-full p-1 glass border-2 border-yellow-500/30 group-hover:border-yellow-500 transition-all duration-300">
                            <img src="https://randomuser.me/api/portraits/men/86.jpg" alt="Member 3" class="w-full h-full object-cover rounded-full">
                        </div>
                        <h3 class="text-2xl font-bold text-brown-dark dark:text-white mb-1">Lê Văn C</h3>
                        <span class="text-sm font-bold text-yellow-600 dark:text-yellow-400 uppercase tracking-wider mb-4">Product Manager</span>
                        <p class="text-stone-600 dark:text-slate-300 italic max-w-md leading-relaxed relative">
                            <i class="fas fa-quote-left text-2xl text-yellow-500/20 absolute -top-4 -left-6"></i>
                            "Chất lượng và sự đa dạng của các đầu sách luôn là ưu tiên hàng đầu của tôi khi lựa chọn."
                        </p>
                         <div class="flex space-x-4 mt-6">
                            <a href="#" class="text-stone-400 hover:text-yellow-600 transition"><i class="fab fa-linkedin text-xl"></i></a>
                        </div>
                    </div>

                    <div class="min-w-full p-8 md:p-12 flex flex-col items-center justify-center text-center relative group">
                         <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-purple-500/20 dark:bg-purple-500/10 rounded-full blur-[80px] -z-10 group-hover:bg-purple-500/30 transition-all"></div>
                        <div class="relative w-40 h-40 mb-6 rounded-full p-1 glass border-2 border-purple-500/30 group-hover:border-purple-500 transition-all duration-300">
                            <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Member 4" class="w-full h-full object-cover rounded-full">
                        </div>
                        <h3 class="text-2xl font-bold text-brown-dark dark:text-white mb-1">Phạm Thị D</h3>
                        <span class="text-sm font-bold text-purple-600 dark:text-purple-400 uppercase tracking-wider mb-4">Customer Experience</span>
                        <p class="text-stone-600 dark:text-slate-300 italic max-w-md leading-relaxed relative">
                            <i class="fas fa-quote-left text-2xl text-purple-500/20 absolute -top-4 -left-6"></i>
                            "Hạnh phúc của khách hàng khi tìm được cuốn sách ưng ý là động lực làm việc mỗi ngày của tôi."
                        </p>
                         <div class="flex space-x-4 mt-6">
                            <a href="#" class="text-stone-400 hover:text-purple-600 transition"><i class="fa-solid fa-envelope text-xl"></i></a>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="flex justify-center space-x-2 mt-6">
                <button class="team-dot w-3 h-3 rounded-full bg-brown-primary/30 dark:bg-neon-red/30 hover:bg-brown-primary dark:hover:bg-neon-red transition-all active-team-dot"></button>
                <button class="team-dot w-3 h-3 rounded-full bg-brown-primary/30 dark:bg-neon-red/30 hover:bg-brown-primary dark:hover:bg-neon-red transition-all"></button>
                <button class="team-dot w-3 h-3 rounded-full bg-brown-primary/30 dark:bg-neon-red/30 hover:bg-brown-primary dark:hover:bg-neon-red transition-all"></button>
                <button class="team-dot w-3 h-3 rounded-full bg-brown-primary/30 dark:bg-neon-red/30 hover:bg-brown-primary dark:hover:bg-neon-red transition-all"></button>
            </div>
        </div>
    </section>

</main>

@endsection