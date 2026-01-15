@extends('layouts.app')

@section('content')
{{-- ĐÃ SỬA: pt-28 để tránh header che --}}
<div class="container mx-auto px-4 pt-28 pb-10 min-h-[600px]">
    
    <div class="flex flex-col md:flex-row gap-8">
        
        {{-- SIDEBAR --}}
        <div class="w-full md:w-1/4">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 sticky top-24 transition-colors duration-300">
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-stone-100 dark:border-slate-700">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" 
                         class="w-14 h-14 rounded-full shadow-md">
                    <div>
                        <p class="font-bold text-stone-800 dark:text-white">{{ $user->name }}</p>
                        <p class="text-xs text-stone-500 dark:text-slate-400">Thành viên</p>
                    </div>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('profile.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-700 transition">
                        <i class="fas fa-user w-5 text-center"></i> Thông tin tài khoản
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-700 transition">
                        <i class="fas fa-shopping-bag w-5 text-center"></i> Lịch sử đơn hàng
                    </a>
                    
                    {{-- 👇 ĐANG Ở TRANG NÀY: Thêm dark:bg-red-600 --}}
                    <a href="{{ route('profile.password') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-brown-primary dark:bg-red-600 text-white font-bold transition shadow-lg shadow-brown-primary/30 dark:shadow-red-600/30">
                        <i class="fas fa-key w-5 text-center"></i> Đổi mật khẩu
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20 transition">
                            <i class="fas fa-sign-out-alt w-5 text-center"></i> Đăng xuất
                        </button>
                    </form>
                </nav>
            </div>
        </div>

        {{-- MAIN CONTENT: FORM ĐỔI MẬT KHẨU --}}
        <div class="w-full md:w-3/4">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8 transition-colors duration-300">
                
                <h2 class="text-2xl font-bold text-brown-dark dark:text-white mb-6 flex items-center gap-2">
                    {{-- ĐÃ SỬA: Màu đỏ dark mode --}}
                    <span class="w-2 h-8 bg-brown-primary dark:bg-red-600 rounded-full transition-colors"></span>
                    Đổi Mật Khẩu
                </h2>

                {{-- Thông báo thành công --}}
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 rounded-xl border border-green-200 dark:border-green-800 flex items-center gap-2">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                {{-- Thông báo lỗi validate --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400 rounded-xl border border-red-200 dark:border-red-800 text-sm">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('profile.password.update') }}" method="POST" class="max-w-lg">
                    @csrf
                    
                    <div class="space-y-5">
                        
                        {{-- 1. MẬT KHẨU CŨ --}}
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Mật khẩu hiện tại</label>
                            <div class="relative">
                                {{-- ĐÃ SỬA: Focus ring màu đỏ --}}
                                <input type="password" name="current_password" required placeholder="Nhập mật khẩu đang dùng"
                                    class="w-full pl-4 pr-10 py-3 rounded-xl border border-stone-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-brown-primary dark:focus:ring-red-600 focus:outline-none transition">
                                <i class="fas fa-lock absolute right-4 top-1/2 -translate-y-1/2 text-stone-400"></i>
                            </div>
                        </div>

                        {{-- 2. MẬT KHẨU MỚI --}}
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Mật khẩu mới</label>
                            <div class="relative">
                                <input type="password" name="password" required placeholder="Tối thiểu 6 ký tự"
                                    class="w-full pl-4 pr-10 py-3 rounded-xl border border-stone-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-brown-primary dark:focus:ring-red-600 focus:outline-none transition">
                                <i class="fas fa-key absolute right-4 top-1/2 -translate-y-1/2 text-stone-400"></i>
                            </div>
                        </div>

                        {{-- 3. XÁC NHẬN MẬT KHẨU --}}
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Nhập lại mật khẩu mới</label>
                            <div class="relative">
                                <input type="password" name="password_confirmation" required placeholder="Nhập lại chính xác mật khẩu trên"
                                    class="w-full pl-4 pr-10 py-3 rounded-xl border border-stone-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-brown-primary dark:focus:ring-red-600 focus:outline-none transition">
                                <i class="fas fa-check-circle absolute right-4 top-1/2 -translate-y-1/2 text-stone-400"></i>
                            </div>
                        </div>

                    </div>

                    <div class="mt-8">
                        {{-- ĐÃ SỬA: Button màu đỏ dark mode --}}
                        <button type="submit" class="px-8 py-3 rounded-xl bg-brown-primary dark:bg-red-600 text-white font-bold hover:bg-brown-dark dark:hover:bg-red-700 shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                            Cập nhật mật khẩu
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection