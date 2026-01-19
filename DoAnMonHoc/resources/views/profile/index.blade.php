@extends('layouts.app')

@section('content')
{{-- ĐÃ SỬA: Thêm pt-28 để tránh bị Header che, pb-10 để giữ khoảng cách dưới --}}
<div class="container mx-auto px-4 pt-28 pb-10 min-h-[600px]">
    
    <div class="flex flex-col md:flex-row gap-8">
        
        {{-- SIDEBAR: MENU TRÁI --}}
        <div class="w-full md:w-1/4">
            {{-- sticky top-24 giữ nguyên để sidebar trượt theo khi cuộn --}}
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 sticky top-24 transition-colors duration-300">
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-stone-100 dark:border-slate-700">
                    {{-- <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" 
                         class="w-14 h-14 rounded-full shadow-md"> --}}
                    {{-- <div class="w-9 h-9 rounded-full bg-brown-primary text-white dark:bg-neon-red flex items-center justify-center font-bold text-lg shadow-md">
                            {{ substr(Auth::user()->name, 0, 1) }}
                    </div> --}}

                    <x-user-avatar :name="Auth::user()->name" />
                    <div>
                        <p class="font-bold text-stone-800 dark:text-white">{{ $user->name }}</p>
                        <p class="text-xs text-stone-500 dark:text-slate-400">Thành viên thân thiết</p>
                    </div>
                </div>

                <nav class="space-y-2">
                    
                    <a href="{{ route('profile.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-brown-primary dark:bg-red-600 text-white font-bold transition shadow-lg shadow-brown-primary/30 dark:shadow-red-600/30">
                        <i class="fas fa-user w-5 text-center"></i> Thông tin tài khoản
                    </a>
                    
                    <a href="{{ route('profile.orders') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-700 transition">
                        <i class="fas fa-shopping-bag w-5 text-center"></i> Đơn mua
                    </a>

                    <a href="{{ route('profile.favorites') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-700 transition">
                        <i class="fas fa-heart w-5 text-center"></i> Sản phẩm yêu thích
                    </a>

                    <a href="{{ route('profile.password') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-stone-600 dark:text-slate-400 hover:bg-stone-100 dark:hover:bg-slate-700 transition">
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

        {{-- MAIN CONTENT: FORM PHẢI --}}
        <div class="w-full md:w-3/4">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8 transition-colors duration-300">
                
                <h2 class="text-2xl font-bold text-brown-dark dark:text-white mb-6 flex items-center gap-2">
                    {{-- ĐÃ SỬA: Vạch trang trí chuyển sang đỏ ở dark mode --}}
                    <span class="w-2 h-8 bg-brown-primary dark:bg-red-600 rounded-full transition-colors"></span>
                    Hồ Sơ Của Tôi
                </h2>

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 rounded-xl border border-green-200 dark:border-green-800 flex items-center gap-2">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        {{-- 1. HỌ VÀ TÊN --}}
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Họ và tên</label>
                            {{-- ĐÃ SỬA: Focus ring màu đỏ (dark:focus:ring-red-600) --}}
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                                class="w-full px-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-brown-primary dark:focus:ring-red-600 focus:outline-none transition">
                        </div>

                        {{-- 2. EMAIL --}}
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Email (Không thể thay đổi)</label>
                            <input type="email" value="{{ $user->email }}" disabled
                                class="w-full px-4 py-3 rounded-xl border border-stone-200 bg-stone-100 text-stone-500 cursor-not-allowed dark:bg-slate-900 dark:border-slate-700 dark:text-slate-500">
                        </div>

                        {{-- 3. SỐ ĐIỆN THOẠI --}}
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Số điện thoại</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Nhập số điện thoại"
                                class="w-full px-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-brown-primary dark:focus:ring-red-600 focus:outline-none transition">
                        </div>

                        {{-- 4. GIỚI TÍNH --}}
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Giới tính</label>
                            <select name="gender" class="w-full px-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-brown-primary dark:focus:ring-red-600 focus:outline-none transition">
                                <option value="">-- Chọn giới tính --</option>
                                <option value="nam" {{ $user->gender == 'nam' ? 'selected' : '' }}>Nam</option>
                                <option value="nu" {{ $user->gender == 'nu' ? 'selected' : '' }}>Nữ</option>
                                <option value="khac" {{ $user->gender == 'khac' ? 'selected' : '' }}>Khác</option>
                            </select>
                        </div>

                        {{-- 5. NGÀY SINH --}}
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Ngày sinh</label>
                            <input type="date" name="birthday" value="{{ old('birthday', $user->birthday) }}"
                                class="w-full px-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-brown-primary dark:focus:ring-red-600 focus:outline-none transition">
                        </div>

                        {{-- 6. ĐỊA CHỈ --}}
                        <div class="col-span-1 md:col-span-2 space-y-2">
                            <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Địa chỉ giao hàng</label>
                            <input type="text" name="address" value="{{ old('address', $user->address) }}" placeholder="Số nhà, tên đường, phường/xã..."
                                class="w-full px-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-brown-primary dark:focus:ring-red-600 focus:outline-none transition">
                        </div>

                    </div>

                    <div class="mt-8 flex justify-end">
                        {{-- ĐÃ SỬA: Nút Lưu màu đỏ khi dark mode --}}
                        <button type="submit" class="px-8 py-3 rounded-xl bg-brown-primary dark:bg-red-600 text-white font-bold hover:bg-brown-dark dark:hover:bg-red-700 shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                            Lưu Thay Đổi
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection