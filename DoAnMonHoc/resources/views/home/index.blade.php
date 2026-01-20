{{-- sử dụng layout người dùng --}}
@extends('layouts.app') 

{{-- bắt đầu nội dung --}}
@section('content')

<main class="pt-24 pb-12 px-4 container mx-auto">
        
    <!-- Phần Mở Đầu & Hero Slider (Banner trượt) -->
    @include('partials.home._banner')

    @include('partials.home._services')

    <!-- Phần Danh Mục Sách (Categories) -->
    @include('partials.home._category')

    <!-- Phần Sách Nổi Bật (Product Grid) -->
    @include('partials.home._bookhighlights')

    <!-- Phần Banner Quảng Cáo (Exclusive Collection) -->
    <section class="mt-24 mb-16 relative w-full h-[500px] rounded-[40px] overflow-hidden group shadow-2xl mx-auto">

        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" 
                 alt="Library Background" 
                 class="w-full h-full object-cover transform scale-100 group-hover:scale-110 transition-transform duration-[2s] ease-in-out">
        </div>
    
        <div class="absolute inset-0 bg-gradient-to-r from-stone-50/95 via-stone-100/70 to-transparent dark:from-slate-950/95 dark:via-slate-900/80 dark:to-transparent transition-colors duration-500"></div>
    
        <div class="absolute inset-0 flex items-center px-8 md:px-20">
            
            <div class="w-full md:w-3/5 relative z-10 space-y-6">
                
                <div class="inline-flex items-center space-x-2 glass px-4 py-2 rounded-full bg-brown-primary/10 text-brown-primary border-brown-primary/30 dark:bg-neon-red/10 dark:text-neon-red dark:border-neon-red/50 backdrop-blur-md shadow-sm">
                    <i class="fas fa-award"></i>
                    <span class="text-sm font-bold tracking-wider">BỘ SƯU TẬP ĐỘC QUYỀN</span>
                </div>
    
                <h2 class="text-5xl md:text-7xl font-extrabold text-brown-dark dark:text-white leading-tight drop-shadow-sm">
                    Đánh Thức <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brown-primary via-yellow-500 to-yellow-600 dark:from-neon-red dark:via-pink-500 dark:to-purple-600">
                        Trí Tuệ Của Bạn
                    </span>
                </h2>
    
                <p class="text-xl text-stone-700 dark:text-slate-300 max-w-lg font-medium leading-relaxed">
                    Tuyển tập những tác phẩm kinh điển làm thay đổi tư duy nhân loại. Phiên bản bìa cứng giới hạn chỉ có tại BookStore.
                </p>
    
                <div class="flex flex-wrap gap-4 pt-4">
                    <button class="px-8 py-4 rounded-full bg-brown-primary text-white font-bold hover:bg-brown-dark dark:bg-neon-red dark:text-white dark:hover:bg-red-700 transition-all duration-300 shadow-xl hover:shadow-2xl hover:-translate-y-1 flex items-center">
                        Khám Phá Ngay <i class="fas fa-arrow-right ml-3"></i>
                    </button>
                    <button class="px-8 py-4 rounded-full glass bg-white/50 text-brown-dark font-bold hover:bg-white dark:bg-slate-800/50 dark:text-white dark:hover:bg-slate-800/80 dark:border-white/10 transition-all duration-300 flex items-center hover:-translate-y-1">
                        Xem Review
                    </button>
                </div>
            </div>
    
            <div class="hidden md:block w-2/5 relative h-full pointer-events-none">
                <div class="absolute top-1/2 right-0 -translate-y-1/2 w-[380px] h-[480px] glass bg-white/30 dark:bg-slate-900/40 rounded-3xl border-[1.5px] border-white/40 dark:border-white/10 p-5 rotate-6 group-hover:rotate-0 transition-all duration-700 ease-out shadow-[0_20px_50px_rgba(0,0,0,0.1)] dark:shadow-[0_20px_50px_rgba(0,0,0,0.5)] backdrop-blur-md overflow-hidden group/card">
                    
                    <div class="relative w-full h-full rounded-2xl overflow-hidden shadow-inner">
                        <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover" alt="Featured Book Cover">
                        <div class="absolute inset-0 bg-brown-primary/10 dark:bg-blue-900/20 mix-blend-overlay"></div>
                    </div>
    
                    <div class="absolute inset-0 rounded-3xl border-2 border-transparent dark:group-hover:border-neon-red/40 dark:group-hover:shadow-[inset_0_0_30px_rgba(255,23,68,0.2)] transition-all duration-700 pointer-events-none"></div>
                </div>
            </div>
    
        </div>
    </section>

    <!-- Phần Danh Sách Top Sản Phẩm (3 Columns) -->
    @include('partials.home._latestbooks')

    <!-- Phần Thư Viện Ảnh (Masonry Gallery) -->
    <section class="mb-8">
        <div class="flex justify-between items-end mb-8">
            <h2 class="text-3xl font-bold text-brown-dark dark:text-white border-l-4 border-brown-primary dark:border-neon-red pl-4 transition-colors">
                Góc Nghệ Thuật
            </h2>
            <p class="text-sm text-stone-500 dark:text-slate-400 italic hidden md:block">
                "Sách là giấc mơ bạn cầm trên tay."
            </p>
        </div>
    
        <div class="columns-2 md:columns-4 gap-4 space-y-4 p-2">
    
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer">
                <img src="https://images.unsplash.com/photo-1507842217343-583bb726cc2e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                     onerror="this.src='https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'"
                     alt="Classic Library" 
                     class="w-full h-auto rounded-2xl transform transition-transform duration-700 group-hover:scale-110">
                
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                    <span class="text-white font-serif italic text-lg border-b border-white pb-1">Cổ Điển</span>
                </div>
            </div>
    
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer">
                <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                     alt="Book & Coffee" class="w-full h-auto rounded-2xl transform transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                    <span class="text-white font-serif italic text-lg border-b border-white pb-1">Thư Giãn</span>
                </div>
            </div>
    
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer">
                <img src="https://images.unsplash.com/photo-1555680202-c86f0e12f086?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                     onerror="this.src='https://images.unsplash.com/photo-1581022295087-9306ba216646?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'"
                     alt="Cyberpunk Neon" 
                     class="w-full h-auto rounded-2xl transform transition-transform duration-700 group-hover:scale-110 grayscale hover:grayscale-0 transition-all">
                
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                    <span class="text-white font-serif italic text-lg border-b border-white pb-1">Cyberpunk</span>
                </div>
            </div>
    
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer">
                <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                     alt="Bookshelf" class="w-full h-auto rounded-2xl transform transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                    <span class="text-white font-serif italic text-lg border-b border-white pb-1">Tri Thức</span>
                </div>
            </div>
    
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer bg-brown-primary dark:bg-stone-800 p-6 flex items-center justify-center text-center h-[200px]">
                <div class="relative z-10">
                    <i class="fas fa-quote-left text-3xl text-white/30 mb-2"></i>
                    <p class="text-white font-serif text-xl italic">
                        "A room without books is like a body without a soul."
                    </p>
                    <p class="text-white/60 text-xs mt-2 uppercase tracking-widest">- Cicero -</p>
                </div>
                <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:bg-white/20 transition-all"></div>
            </div>
    
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer">
                <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                     onerror="this.src='https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'"
                     alt="Reading Passion" 
                     class="w-full h-auto rounded-2xl transform transition-transform duration-700 group-hover:scale-110">
                
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                    <span class="text-white font-serif italic text-lg border-b border-white pb-1">Đam Mê</span>
                </div>
            </div>
    
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer">
                <img src="https://images.unsplash.com/photo-1550399105-c4db5fb85c18?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                     alt="Open Book" class="w-full h-auto rounded-2xl transform transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                    <span class="text-white font-serif italic text-lg border-b border-white pb-1">Khám Phá</span>
                </div>
            </div>
    
             <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer">
                <img src="https://images.unsplash.com/photo-1535905557558-afc4877a26fc?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                     alt="Magic Book" class="w-full h-auto rounded-2xl transform transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                    <span class="text-white font-serif italic text-lg border-b border-white pb-1">Phép Thuật</span>
                </div>
            </div>
    
        </div>
    </section>
</main>

@endsection
{{-- kết thúc nội dung --}}