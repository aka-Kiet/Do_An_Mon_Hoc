

<section class="mb-16">

    <!-- TIÊU ĐỀ PHẦN + LINK "XEM TẤT CẢ" -->
    <div class="flex justify-between items-end mb-8">
        <h2 class="text-3xl font-bold text-brown-dark dark:text-white border-l-4 border-brown-primary dark:border-neon-red pl-4 transition-colors">
            Khám Phá Danh Mục
        </h2>
        <a href="#" class="hidden md:flex items-center text-sm font-semibold text-stone-500 hover:text-brown-primary dark:text-slate-400 dark:hover:text-neon-red transition-colors group">
            Tất cả danh mục <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
        </a>
    </div>

    <!-- GRID CHỨA CÁC DANH MỤC -->
    {{-- <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

        <a href="#" class="group relative p-6 rounded-3xl glass bg-white/40 dark:bg-slate-800/40 border border-white/50 dark:border-white/5 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl dark:hover:shadow-[0_0_20px_rgba(244,63,94,0.3)] dark:hover:border-rose-500/50 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-rose-100/0 to-rose-100/50 dark:from-rose-900/0 dark:to-rose-900/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            
            <div class="relative z-10 flex flex-col items-center text-center space-y-3">
                <div class="w-14 h-14 rounded-full bg-rose-100 text-rose-600 dark:bg-rose-900/50 dark:text-rose-400 flex items-center justify-center text-2xl mb-1 group-hover:scale-110 transition-transform duration-300 shadow-sm">
                    <i class="fas fa-feather-alt"></i>
                </div>
                <h3 class="font-bold text-lg text-stone-800 dark:text-white group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors">Văn Học</h3>
                <span class="text-xs font-medium text-stone-500 dark:text-slate-400 bg-white/50 dark:bg-black/30 px-3 py-1 rounded-full backdrop-blur-sm">1.2k cuốn</span>
            </div>
        </a>

        <a href="#" class="group relative p-6 rounded-3xl glass bg-white/40 dark:bg-slate-800/40 border border-white/50 dark:border-white/5 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl dark:hover:shadow-[0_0_20px_rgba(59,130,246,0.3)] dark:hover:border-blue-500/50 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-100/0 to-blue-100/50 dark:from-blue-900/0 dark:to-blue-900/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            
            <div class="relative z-10 flex flex-col items-center text-center space-y-3">
                <div class="w-14 h-14 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400 flex items-center justify-center text-2xl mb-1 group-hover:scale-110 transition-transform duration-300 shadow-sm">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="font-bold text-lg text-stone-800 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Kinh Tế</h3>
                <span class="text-xs font-medium text-stone-500 dark:text-slate-400 bg-white/50 dark:bg-black/30 px-3 py-1 rounded-full backdrop-blur-sm">850 cuốn</span>
            </div>
        </a>

        <a href="#" class="group relative p-6 rounded-3xl glass bg-white/40 dark:bg-slate-800/40 border border-white/50 dark:border-white/5 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl dark:hover:shadow-[0_0_20px_rgba(245,158,11,0.3)] dark:hover:border-amber-500/50 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-amber-100/0 to-amber-100/50 dark:from-amber-900/0 dark:to-amber-900/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            
            <div class="relative z-10 flex flex-col items-center text-center space-y-3">
                <div class="w-14 h-14 rounded-full bg-amber-100 text-amber-600 dark:bg-amber-900/50 dark:text-amber-400 flex items-center justify-center text-2xl mb-1 group-hover:scale-110 transition-transform duration-300 shadow-sm">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="font-bold text-lg text-stone-800 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors">Kỹ Năng</h3>
                <span class="text-xs font-medium text-stone-500 dark:text-slate-400 bg-white/50 dark:bg-black/30 px-3 py-1 rounded-full backdrop-blur-sm">2.4k cuốn</span>
            </div>
        </a>

        <a href="#" class="group relative p-6 rounded-3xl glass bg-white/40 dark:bg-slate-800/40 border border-white/50 dark:border-white/5 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl dark:hover:shadow-[0_0_20px_rgba(168,85,247,0.3)] dark:hover:border-purple-500/50 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-100/0 to-purple-100/50 dark:from-purple-900/0 dark:to-purple-900/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            
            <div class="relative z-10 flex flex-col items-center text-center space-y-3">
                <div class="w-14 h-14 rounded-full bg-purple-100 text-purple-600 dark:bg-purple-900/50 dark:text-purple-400 flex items-center justify-center text-2xl mb-1 group-hover:scale-110 transition-transform duration-300 shadow-sm">
                    <i class="fas fa-palette"></i>
                </div>
                <h3 class="font-bold text-lg text-stone-800 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">Nghệ Thuật</h3>
                <span class="text-xs font-medium text-stone-500 dark:text-slate-400 bg-white/50 dark:bg-black/30 px-3 py-1 rounded-full backdrop-blur-sm">600 cuốn</span>
            </div>
        </a>

    </div> --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

@php
$colors = [
    'Văn Học'    => 'rose',
    'Kinh Tế'    => 'blue',
    'Kỹ Năng'    => 'amber',
    'Nghệ Thuật' => 'purple',
];
@endphp

@foreach($categories as $cat)
    @php
        $color = $colors[$cat->name] ?? 'rose';
    @endphp

    <a href="#"
       class="group relative p-6 rounded-3xl glass bg-white/40 dark:bg-slate-800/40
              border border-white/50 dark:border-white/5
              hover:-translate-y-2 transition-all duration-300
              hover:shadow-xl
              dark:hover:border-{{ $color }}-500/50
              overflow-hidden">

        <!-- nền hover -->
        <div class="absolute inset-0 bg-gradient-to-br
             from-{{ $color }}-100/0
             to-{{ $color }}-100/50
             dark:from-{{ $color }}-900/0
             dark:to-{{ $color }}-900/30
             opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        </div>

        <div class="relative z-10 flex flex-col items-center text-center space-y-3">

            <!-- icon -->
            <div class="w-14 h-14 rounded-full
                 bg-{{ $color }}-100
                 text-{{ $color }}-600
                 dark:bg-{{ $color }}-900/50
                 dark:text-{{ $color }}-400
                 flex items-center justify-center text-2xl mb-1
                 group-hover:scale-110 transition-transform duration-300 shadow-sm">
                <i class="{{ $cat->icon }}"></i>
            </div>

            <!-- tên -->
            <h3 class="font-bold text-lg text-stone-800 dark:text-white
                group-hover:text-{{ $color }}-600
                dark:group-hover:text-{{ $color }}-400 transition-colors">
                {{ $cat->name }}
            </h3>

            <!-- số sách -->
            <span class="text-xs font-medium text-stone-500 dark:text-slate-400
                bg-white/50 dark:bg-black/30 px-3 py-1 rounded-full backdrop-blur-sm">
                {{ $cat->books_count }} cuốn
            </span>

        </div>
    </a>

@endforeach

</div>
</section>