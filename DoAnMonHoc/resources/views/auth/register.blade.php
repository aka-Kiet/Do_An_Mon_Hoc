<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản - BookStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'brown-primary': '#8D6E63',
                        'brown-dark': '#5D4037',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-stone-100 dark:bg-slate-900 flex items-center justify-center min-h-screen p-4 transition-colors duration-300">

    <div class="w-full max-w-4xl bg-white dark:bg-slate-800 rounded-[30px] shadow-2xl overflow-hidden flex flex-col lg:flex-row min-h-[700px] transition-colors duration-300 relative">
        
        {{-- NÚT HOME (Về trang chủ) --}}
        <a href="{{ route('home.index') }}" class="absolute top-6 right-6 z-20 w-10 h-10 rounded-full flex items-center justify-center bg-stone-100 dark:bg-slate-700 text-stone-500 hover:bg-brown-primary hover:text-white dark:text-slate-400 dark:hover:bg-red-600 dark:hover:text-white transition-all shadow-sm">
            <i class="fas fa-home"></i>
        </a>

        {{-- CỘT TRÁI: ẢNH (Ẩn trên mobile) --}}
        <div class="hidden lg:block w-5/12 relative group overflow-hidden">
            <img src="https://images.unsplash.com/photo-1455390582262-044cdead277a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                 class="w-full h-full object-cover transition-transform duration-[3s] group-hover:scale-110" alt="Register bg">
            
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
            
            <div class="absolute bottom-12 left-8 right-8 text-white z-10">
                <i class="fas fa-pen-fancy text-3xl text-brown-primary dark:text-red-500 opacity-80 mb-4"></i>
                <p class="text-xl font-serif italic mb-4 leading-relaxed opacity-90">"Start writing your own story today."</p>
                <div class="flex items-center gap-2">
                    <span class="w-8 h-[2px] bg-brown-primary dark:bg-red-500"></span>
                    <p class="text-xs font-bold uppercase tracking-widest text-stone-300">BookStore Community</p>
                </div>
            </div>
        </div>

        {{-- CỘT PHẢI: FORM --}}
        <div class="w-full lg:w-7/12 p-8 md:p-12 flex flex-col justify-center relative bg-white dark:bg-slate-800">
            
            <div class="mb-8 text-center lg:text-left">
                <h2 class="text-4xl font-extrabold text-brown-dark dark:text-white mb-2 tracking-tight">Tạo Tài Khoản</h2>
                <p class="text-stone-500 dark:text-slate-400">Tham gia cùng cộng đồng yêu sách ngay hôm nay.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 text-red-600 dark:text-red-400 rounded-r-xl text-sm">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf
            
                {{-- Input Họ Tên --}}
                <div>
                    <label class="block mb-2 text-sm font-bold text-stone-700 dark:text-slate-300">
                        Họ và tên hiển thị
                    </label>
                    <div class="relative">
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Ví dụ: Nguyễn Văn A" 
                            class="w-full pl-11 pr-4 py-3 rounded-xl border border-stone-200 bg-stone-50 text-stone-800 placeholder-stone-400
                            focus:outline-none focus:ring-2 focus:ring-brown-primary focus:border-transparent
                            dark:bg-slate-700 dark:border-slate-600 dark:text-white dark:placeholder-slate-400 dark:focus:ring-red-600
                            transition-all duration-200">
                        <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 dark:text-slate-500"></i>
                    </div>
                </div>
            
                {{-- Input Email --}}
                <div>
                    <label class="block mb-2 text-sm font-bold text-stone-700 dark:text-slate-300">
                        Địa chỉ Email
                    </label>
                    <div class="relative">
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="Ví dụ: name@email.com" 
                            class="w-full pl-11 pr-4 py-3 rounded-xl border border-stone-200 bg-stone-50 text-stone-800 placeholder-stone-400
                            focus:outline-none focus:ring-2 focus:ring-brown-primary focus:border-transparent
                            dark:bg-slate-700 dark:border-slate-600 dark:text-white dark:placeholder-slate-400 dark:focus:ring-red-600
                            transition-all duration-200">
                        <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 dark:text-slate-500"></i>
                    </div>
                </div>
            
                {{-- Input Password --}}
                <div>
                    <label class="block mb-2 text-sm font-bold text-stone-700 dark:text-slate-300">
                        Mật khẩu
                    </label>
                    <div class="relative">
                        <input type="password" name="password" required placeholder="Tối thiểu 6 ký tự" 
                            class="w-full pl-11 pr-4 py-3 rounded-xl border border-stone-200 bg-stone-50 text-stone-800 placeholder-stone-400
                            focus:outline-none focus:ring-2 focus:ring-brown-primary focus:border-transparent
                            dark:bg-slate-700 dark:border-slate-600 dark:text-white dark:placeholder-slate-400 dark:focus:ring-red-600
                            transition-all duration-200">
                        <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 dark:text-slate-500"></i>
                    </div>
                </div>
            
                {{-- Confirm Password --}}
                <div>
                    <label class="block mb-2 text-sm font-bold text-stone-700 dark:text-slate-300">
                        Xác nhận mật khẩu
                    </label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" required placeholder="Nhập lại mật khẩu" 
                            class="w-full pl-11 pr-4 py-3 rounded-xl border border-stone-200 bg-stone-50 text-stone-800 placeholder-stone-400
                            focus:outline-none focus:ring-2 focus:ring-brown-primary focus:border-transparent
                            dark:bg-slate-700 dark:border-slate-600 dark:text-white dark:placeholder-slate-400 dark:focus:ring-red-600
                            transition-all duration-200">
                        <i class="fas fa-check-circle absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 dark:text-slate-500"></i>
                    </div>
                </div>
            
                {{-- Checkbox --}}
                <div class="flex items-start text-sm pt-2">
                    <label class="flex items-start cursor-pointer">
                        <input type="checkbox" required 
                            class="mt-1 w-4 h-4 rounded border-stone-300 text-brown-primary focus:ring-brown-primary 
                            dark:bg-slate-700 dark:border-slate-600 dark:checked:bg-red-600 dark:focus:ring-red-600">
                        <span class="ml-2 text-stone-600 dark:text-slate-400 leading-tight">
                            Tôi đồng ý với <a href="#" class="font-bold text-brown-primary hover:text-brown-dark dark:text-red-500 dark:hover:text-red-400 hover:underline">Điều khoản</a> & <a href="#" class="font-bold text-brown-primary hover:text-brown-dark dark:text-red-500 dark:hover:text-red-400 hover:underline">Chính sách</a> của BookStore.
                        </span>
                    </label>
                </div>
            
                {{-- Submit Button --}}
                <button type="submit" class="w-full py-3.5 rounded-xl bg-brown-primary dark:bg-red-600 text-white font-bold text-lg 
                    hover:bg-brown-dark dark:hover:bg-red-700 shadow-lg hover:shadow-xl dark:shadow-red-600/30 
                    transition-all transform hover:-translate-y-1 active:scale-95">
                    Đăng Ký Ngay
                </button>
            
                <div class="mt-6 text-center text-stone-600 dark:text-slate-400">
                    Đã có tài khoản? 
                    <a href="{{ route('login') }}" class="font-bold text-brown-primary hover:text-brown-dark dark:text-red-500 dark:hover:text-red-400 hover:underline">
                        Đăng nhập ngay
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    {{-- NÚT CHUYỂN DARK MODE (FIXED BOTTOM LEFT) --}}
    <button id="theme-toggle" 
        class="fixed bottom-6 left-6 z-50 w-12 h-12 rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 focus:outline-none transform hover:scale-110
        bg-white text-brown-primary border-2 border-brown-primary
        dark:bg-slate-800 dark:text-red-500 dark:border-red-500">

        {{-- Icon Mặt trời (Hiện khi Dark mode) --}}
        <i id="theme-toggle-light-icon" class="fas fa-sun text-xl hidden"></i>

        {{-- Icon Mặt trăng (Hiện khi Light mode) --}}
        <i id="theme-toggle-dark-icon" class="fas fa-moon text-xl hidden"></i>
    </button>
    {{-- SCRIPT XỬ LÝ DARK MODE --}}
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // 1. Kiểm tra trạng thái hiện tại khi load trang
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            // Đang là Dark Mode -> Hiện icon Mặt trời để bấm chuyển sang sáng
            themeToggleLightIcon.classList.remove('hidden');
            document.documentElement.classList.add('dark');
        } else {
            // Đang là Light Mode -> Hiện icon Mặt trăng để bấm chuyển sang tối
            themeToggleDarkIcon.classList.remove('hidden');
            document.documentElement.classList.remove('dark');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        // 2. Xử lý sự kiện click
        themeToggleBtn.addEventListener('click', function() {

            // Đổi icon
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // Nếu đang có class dark thì xóa đi (Về sáng)
            if (localStorage.getItem('color-theme') === 'dark') {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                // Nếu chưa có thì thêm vào (Về tối)
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        });
    </script>
</body>
</html>