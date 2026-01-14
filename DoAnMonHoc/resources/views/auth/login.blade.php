<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - BookStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-stone-100 dark:bg-slate-900 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-4xl bg-white dark:bg-slate-800 rounded-[30px] shadow-2xl overflow-hidden flex flex-col lg:flex-row h-[600px]">
        
        <div class="hidden lg:block w-5/12 relative group">
            <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                 class="w-full h-full object-cover transition-transform duration-[3s] group-hover:scale-110" alt="Login bg">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
            <div class="absolute bottom-10 left-8 right-8 text-white z-10">
                <p class="text-2xl font-serif italic mb-2">"A room without books is like a body without a soul."</p>
                <p class="text-xs font-bold uppercase tracking-widest text-yellow-400 opacity-90">— Cicero</p>
            </div>
        </div>

        <div class="w-full lg:w-7/12 p-8 md:p-12 flex flex-col justify-center relative">
            
            <a href="{{ route('home.index') }}" class="absolute top-6 right-6 text-stone-400 hover:text-stone-600 dark:text-slate-500 dark:hover:text-white transition">
                <i class="fas fa-home text-xl"></i>
            </a>

            <div class="mb-8">
                <h2 class="text-3xl font-extrabold text-stone-800 dark:text-white">Đăng Nhập</h2>
                <p class="text-stone-500 dark:text-slate-400 mt-2">Chào mừng bạn quay trở lại với BookStore.</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-600 rounded-xl text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf <div class="relative">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email của bạn" 
                        class="w-full pl-12 pr-4 py-3 rounded-xl bg-stone-50 dark:bg-slate-700 border border-stone-200 dark:border-slate-600 focus:ring-2 focus:ring-yellow-500 focus:outline-none transition-all dark:text-white">
                    <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-stone-400"></i>
                </div>

                <div class="relative">
                    <input type="password" name="password" placeholder="Mật khẩu" 
                        class="w-full pl-12 pr-4 py-3 rounded-xl bg-stone-50 dark:bg-slate-700 border border-stone-200 dark:border-slate-600 focus:ring-2 focus:ring-yellow-500 focus:outline-none transition-all dark:text-white">
                    <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-stone-400"></i>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded text-yellow-600 focus:ring-yellow-500">
                        <span class="ml-2 text-stone-600 dark:text-slate-400">Ghi nhớ đăng nhập</span>
                    </label>
                    <a href="#" class="font-bold text-yellow-600 hover:text-yellow-700 dark:text-yellow-400">Quên mật khẩu?</a>
                </div>

                <button type="submit" class="w-full py-3 rounded-xl bg-yellow-600 text-white font-bold text-lg hover:bg-yellow-700 shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                    Đăng Nhập
                </button>

                <div class="mt-6 text-center text-stone-600 dark:text-slate-400">
                    Chưa có tài khoản? 
                    <a href="{{ route('register') }}" class="font-bold text-yellow-600 dark:text-yellow-400 hover:underline">
                        Đăng ký ngay
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>