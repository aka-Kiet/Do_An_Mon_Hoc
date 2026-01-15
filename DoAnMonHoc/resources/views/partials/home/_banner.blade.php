<section class="relative mb-16 h-[500px] rounded-3xl overflow-hidden shadow-2xl group">

    {{-- Kiểm tra xem có banner nào không --}}
    @if(isset($banners) && $banners->count() > 0)

        <div id="hero-slider" class="relative w-full h-full">

            @foreach($banners as $key => $banner)
                {{-- Logic: Slide đầu tiên (key = 0) sẽ hiện luôn (opacity-100), các slide sau ẩn đi (opacity-0) --}}
                <div class="slide absolute inset-0 transition-opacity duration-1000 {{ $key == 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}" 
                     data-index="{{ $key }}">
                    
                    {{-- 1. ẢNH NỀN --}}
                    <div class="absolute inset-0">
                        <img src="{{ asset($banner->image_path) }}" 
                        class="w-full h-full object-cover" 
                        alt="{{ strip_tags($banner->title) }}">
                        {{-- Lớp phủ màu gradient (Giữ nguyên style của slide 1) --}}
                        <div class="absolute inset-0 bg-gradient-to-r from-white/90 via-white/40 to-transparent dark:from-black/90 dark:via-black/50 dark:to-transparent transition-colors duration-500"></div>
                    </div>
                    
                    {{-- 2. NỘI DUNG CHỮ --}}
                    <div class="absolute inset-0 flex items-center px-8 md:px-20">
                        {{-- Logic Animation: Slide đầu tiên ở vị trí chuẩn (y-0), slide ẩn thì tụt xuống chút (y-10) để chờ trồi lên --}}
                        <div class="max-w-xl space-y-6 transform transition-transform duration-700 delay-300 slide-content {{ $key == 0 ? 'translate-y-0' : 'translate-y-10' }}">
                            
                            {{-- Badge (Ví dụ: BỘ SƯU TẬP MỚI) --}}
                            @if($banner->badge)
                                <span class="inline-block py-1 px-3 rounded-lg bg-brown-primary/20 text-brown-dark font-bold text-sm tracking-widest dark:text-neon-red dark:bg-neon-red/10 border border-brown-primary/30 dark:border-neon-red/50 backdrop-blur-md uppercase">
                                    {{ $banner->badge }}
                                </span>
                            @endif

                            {{-- Tiêu đề lớn --}}
                            <h1 class="text-5xl md:text-7xl font-bold text-brown-dark dark:text-white leading-tight">
                                {!! $banner->title !!}
                            </h1>

                            {{-- Mô tả --}}
                            <p class="text-lg text-stone-600 dark:text-slate-300 font-medium max-w-md glass p-4 rounded-xl border-l-4 border-brown-primary dark:border-neon-red">
                                {{ $banner->description }}
                            </p>

                            {{-- Nút bấm --}}
                            <button class="px-8 py-3 rounded-full bg-brown-primary text-white font-bold hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700 dark:hover:shadow-[0_0_20px_rgba(255,23,68,0.6)] transition-all duration-300 shadow-lg hover:translate-x-2">
                                Khám Phá Ngay <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <button id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full glass bg-white/30 dark:bg-black/30 hover:bg-white/80 dark:hover:bg-neon-red/80 text-white dark:text-white flex items-center justify-center backdrop-blur-md transition-all duration-300 opacity-0 group-hover:opacity-100 z-20">
            <i class="fas fa-chevron-left text-xl"></i>
        </button>
        <button id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full glass bg-white/30 dark:bg-black/30 hover:bg-white/80 dark:hover:bg-neon-red/80 text-white dark:text-white flex items-center justify-center backdrop-blur-md transition-all duration-300 opacity-0 group-hover:opacity-100 z-20">
            <i class="fas fa-chevron-right text-xl"></i>
        </button>

        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-3 z-20">
            @foreach($banners as $key => $banner)
                <button class="indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300 {{ $key == 0 ? 'active-dot ring-2 ring-offset-2 ring-brown-primary dark:ring-neon-red bg-white' : '' }}" 
                        data-slide="{{ $key }}">
                </button>
            @endforeach
        </div>

    @else
        {{-- Màn hình chờ nếu chưa có dữ liệu --}}
        <div class="w-full h-full flex items-center justify-center bg-gray-200">
            <p class="text-gray-500">Chưa có banner (Vui lòng thêm trong Database)</p>
        </div>
    @endif

</section>