<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản - BookStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-stone-100 dark:bg-slate-900 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-4xl bg-white dark:bg-slate-800 rounded-[30px] shadow-2xl overflow-hidden flex flex-col lg:flex-row min-h-[650px]">
        
        <div class="hidden lg:block w-5/12 relative group">
            <img src="https://images.unsplash.com/photo-1455390582262-044cdead277a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                 class="w-full h-full object-cover transition-transform duration-[3s] group-hover:scale-110" alt="Register bg">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
            <div class="absolute bottom-10 left-8 right-8 text-white z-10">
                <p class="text-2xl font-serif italic mb-2">"Start writing your own story today."</p>
                <p class="text-xs font-bold uppercase tracking-widest text-yellow-400 opacity-90">BookStore Community</p>
            </div>
        </div>

        <div class="w-full lg:w-7/12 p-8 md:p-12 flex flex-col justify-center relative">
            
            <a href="{{ route('home.index') }}" class="absolute top-6 right-6 text-stone-400 hover:text-stone-600 dark:text-slate-500 dark:hover:text-white transition">
                <i class="fas fa-home text-xl"></i>
            </a>

            <div class="mb-6">
                <h2 class="text-3xl font-extrabold text-stone-800 dark:text-white">Tạo Tài Khoản</h2>
                <p class="text-stone-500 dark:text-slate-400 mt-2">Tham gia cùng cộng đồng yêu sách ngay hôm nay.</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-600 rounded-xl text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf

                <div class="relative">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Họ và tên hiển thị" required
                        class="w-full pl-12 pr-4 py-3 rounded-xl bg-stone-50 dark:bg-slate-700 border border-stone-200 dark:border-slate-600 focus:ring-2 focus:ring-yellow-500 focus:outline-none transition-all dark:text-white">
                    <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-stone-400"></i>
                </div>

                <div class="relative">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Địa chỉ Email" required
                        class="w-full pl-12 pr-4 py-3 rounded-xl bg-stone-50 dark:bg-slate-700 border border-stone-200 dark:border-slate-600 focus:ring-2 focus:ring-yellow-500 focus:outline-none transition-all dark:text-white">
                    <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-stone-400"></i>
                </div>

                <div class="relative">
                    <input type="password" name="password" placeholder="Mật khẩu (Tối thiểu 6 ký tự)" required
                        class="w-full pl-12 pr-4 py-3 rounded-xl bg-stone-50 dark:bg-slate-700 border border-stone-200 dark:border-slate-600 focus:ring-2 focus:ring-yellow-500 focus:outline-none transition-all dark:text-white">
                    <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-stone-400"></i>
                </div>

                <div class="relative">
                    <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" required
                        class="w-full pl-12 pr-4 py-3 rounded-xl bg-stone-50 dark:bg-slate-700 border border-stone-200 dark:border-slate-600 focus:ring-2 focus:ring-yellow-500 focus:outline-none transition-all dark:text-white">
                    <i class="fas fa-check-circle absolute left-4 top-1/2 -translate-y-1/2 text-stone-400"></i>
                </div>

                <div class="flex items-start text-sm">
                    <label class="flex items-start cursor-pointer">
                        <input type="checkbox" required class="mt-1 w-4 h-4 rounded text-yellow-600 focus:ring-yellow-500">
                        <span class="ml-2 text-stone-600 dark:text-slate-400 leading-tight">
                            Tôi đồng ý với <a href="#" class="font-bold text-yellow-600 dark:text-yellow-400 hover:underline">Điều khoản</a> & <a href="#" class="font-bold text-yellow-600 dark:text-yellow-400 hover:underline">Chính sách</a> của BookStore.
                        </span>
                    </label>
                </div>

                <button type="submit" class="w-full py-3 rounded-xl bg-yellow-600 text-white font-bold text-lg hover:bg-yellow-700 shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                    Đăng Ký Ngay
                </button>

                <div class="mt-4 text-center text-stone-600 dark:text-slate-400">
                    Đã có tài khoản? 
                    <a href="{{ route('login') }}" class="font-bold text-yellow-600 dark:text-yellow-400 hover:underline">
                        Đăng nhập ngay
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>