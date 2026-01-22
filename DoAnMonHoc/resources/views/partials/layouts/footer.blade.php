<footer class="mt-auto bg-stone-50 dark:bg-slate-900 border-t border-stone-200 dark:border-slate-800 transition-colors duration-300">
    
    {{-- PHẦN CHÍNH --}}
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-12">

            {{-- CỘT 1: THƯƠNG HIỆU & MẠNG XÃ HỘI (Chiếm 4 phần) --}}
            <div class="lg:col-span-4 space-y-6">
                {{-- Logo / Tên Website --}}
                <a href="/" class="inline-block">
                    @if(isset($settings['logo']) && !empty($settings['logo']))
                        <img src="{{ asset($settings['logo']) }}" alt="Logo" class="h-12 w-auto object-contain">
                    @else
                        <span class="text-3xl font-extrabold text-brown-dark dark:text-white tracking-tighter flex items-center gap-2">
                            <i class="fas fa-book-open text-brown-primary dark:text-neon-red"></i>
                            {{ $settings['website_name'] ?? 'BookStore' }}
                        </span>
                    @endif
                </a>

                {{-- Mô tả ngắn --}}
                <p class="text-stone-500 dark:text-slate-400 text-sm leading-relaxed text-justify">
                    {{ $settings['site_description'] ?? 'Nơi lan tỏa văn hóa đọc với hàng ngàn đầu sách chọn lọc. Chất lượng - Uy tín - Tận tâm.' }}
                </p>

                {{-- Social Media (Đưa về đây cho gọn) --}}
                <div class="flex flex-wrap gap-3">
                    @php
                        $socials = [
                            ['key' => 'facebook',  'icon' => 'fab fa-facebook-f', 'color' => 'hover:bg-[#1877F2]'],
                            ['key' => 'instagram', 'icon' => 'fab fa-instagram',  'color' => 'hover:bg-[#E4405F]'],
                            ['key' => 'youtube',   'icon' => 'fab fa-youtube',    'color' => 'hover:bg-[#FF0000]'],
                            ['key' => 'tiktok',    'icon' => 'fab fa-tiktok',     'color' => 'hover:bg-black dark:hover:bg-white dark:hover:text-black'],
                        ];
                    @endphp

                    @foreach($socials as $social)
                        @if(!empty($settings[$social['key']]))
                            <a href="{{ $settings[$social['key']] }}" target="_blank" 
                               class="w-9 h-9 rounded-full bg-white dark:bg-slate-800 border border-stone-200 dark:border-slate-700 flex items-center justify-center text-stone-500 dark:text-slate-400 hover:text-white {{ $social['color'] }} transition-all duration-300 shadow-sm hover:-translate-y-1">
                                <i class="{{ $social['icon'] }}"></i>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- CỘT 2: LIÊN KẾT NHANH (Chiếm 2 phần) --}}
            <div class="lg:col-span-2">
                <h4 class="font-bold text-stone-800 dark:text-white mb-6 relative inline-block">
                    Khám Phá
                    <span class="absolute -bottom-2 left-0 w-8 h-1 bg-brown-primary dark:bg-neon-red rounded-full"></span>
                </h4>
                <ul class="space-y-3 text-sm text-stone-600 dark:text-slate-400">
                    <li><a href="{{ route('home.index') }}" class="hover:text-brown-primary dark:hover:text-neon-red transition-colors duration-200"><i class="fas fa-chevron-right text-[10px] mr-2 opacity-50"></i>Trang chủ</a></li>
                    <li><a href="{{ route('product.index') }}" class="hover:text-brown-primary dark:hover:text-neon-red transition-colors duration-200"><i class="fas fa-chevron-right text-[10px] mr-2 opacity-50"></i>Sách mới</a></li>
                    <li><a href="{{ route('home.about') }}" class="hover:text-brown-primary dark:hover:text-neon-red transition-colors duration-200"><i class="fas fa-chevron-right text-[10px] mr-2 opacity-50"></i>Giới thiệu</a></li>
                    <li><a href="#" class="hover:text-brown-primary dark:hover:text-neon-red transition-colors duration-200"><i class="fas fa-chevron-right text-[10px] mr-2 opacity-50"></i>Blog & Tin tức</a></li>
                </ul>
            </div>

            {{-- CỘT 3: HỖ TRỢ (Chiếm 3 phần) --}}
            <div class="lg:col-span-3">
                <h4 class="font-bold text-stone-800 dark:text-white mb-6 relative inline-block">
                    Hỗ Trợ Khách Hàng
                    <span class="absolute -bottom-2 left-0 w-8 h-1 bg-brown-primary dark:bg-neon-red rounded-full"></span>
                </h4>
                <ul class="space-y-3 text-sm text-stone-600 dark:text-slate-400">
                    <li><a href="{{ route('home.policy') }}" class="hover:text-brown-primary dark:hover:text-neon-red transition-colors duration-200"><i class="fas fa-chevron-right text-[10px] mr-2 opacity-50"></i>Chính sách bảo mật</a></li>
                    <li><a href="{{ route('home.policy') }}" class="hover:text-brown-primary dark:hover:text-neon-red transition-colors duration-200"><i class="fas fa-chevron-right text-[10px] mr-2 opacity-50"></i>Điều khoản dịch vụ</a></li>
                    <li><a href="{{ route('home.policy') }}" class="hover:text-brown-primary dark:hover:text-neon-red transition-colors duration-200"><i class="fas fa-chevron-right text-[10px] mr-2 opacity-50"></i>Chính sách đổi trả</a></li>
                    <li><a href="{{ route('home.contact') }}" class="hover:text-brown-primary dark:hover:text-neon-red transition-colors duration-200"><i class="fas fa-chevron-right text-[10px] mr-2 opacity-50"></i>Liên hệ góp ý</a></li>
                </ul>
            </div>

            {{-- CỘT 4: THÔNG TIN LIÊN HỆ (Chiếm 3 phần) --}}
            <div class="lg:col-span-3">
                <h4 class="font-bold text-stone-800 dark:text-white mb-6 relative inline-block">
                    Liên Hệ
                    <span class="absolute -bottom-2 left-0 w-8 h-1 bg-brown-primary dark:bg-neon-red rounded-full"></span>
                </h4>
                
                <ul class="space-y-4 text-sm text-stone-600 dark:text-slate-400">
                    <li class="flex items-start gap-3">
                        <div class="mt-1 w-8 h-8 rounded bg-brown-primary/10 dark:bg-slate-800 flex items-center justify-center text-brown-primary dark:text-neon-red shrink-0">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <span class="leading-relaxed">{{ $settings['address'] ?? 'Đang cập nhật địa chỉ...' }}</span>
                    </li>

                    <li class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-brown-primary/10 dark:bg-slate-800 flex items-center justify-center text-brown-primary dark:text-neon-red shrink-0">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <a href="tel:{{ $settings['hotline'] ?? '' }}" class="hover:text-brown-primary dark:hover:text-white font-bold transition">
                            {{ $settings['hotline'] ?? 'Đang cập nhật...' }}
                        </a>
                    </li>

                    <li class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-brown-primary/10 dark:bg-slate-800 flex items-center justify-center text-brown-primary dark:text-neon-red shrink-0">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <a href="mailto:{{ $settings['email'] ?? '' }}" class="hover:text-brown-primary dark:hover:text-white transition break-all">
                            {{ $settings['email'] ?? 'support@bookstore.vn' }}
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        {{-- NEWSLETTER & COPYRIGHT --}}
        <div class="mt-12 pt-8 border-t border-stone-200 dark:border-slate-800">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                
                {{-- Copyright --}}
                <div class="text-xs text-stone-500 dark:text-slate-500 text-center md:text-left">
                    <p>&copy; {{ date('Y') }} <strong>{{ $settings['website_name'] ?? 'BookStore' }}</strong>. All rights reserved.</p>
                    <p class="mt-1">Thiết kế và phát triển bởi Team BookStore.</p>
                </div>

                {{-- Payment Methods --}}
                <div class="flex items-center gap-4 opacity-70 grayscale hover:grayscale-0 transition-all duration-500">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png" class="h-4 object-contain" alt="Visa">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/1280px-Mastercard-logo.svg.png" class="h-6 object-contain" alt="Mastercard">
                    <img src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png" class="h-6 object-contain" alt="Momo">
                    <div class="h-6 px-2 bg-stone-200 dark:bg-slate-700 rounded text-[10px] flex items-center font-bold text-stone-600 dark:text-slate-300">COD</div>
                </div>
            </div>
        </div>
    </div>
</footer>