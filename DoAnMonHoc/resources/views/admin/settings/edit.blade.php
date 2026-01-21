@extends('layouts.admin')

@section('title', 'Cấu hình hệ thống')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Cấu hình Website</h1>
            <p class="text-sm text-gray-500 mt-1">Quản lý thông tin chung, liên hệ và giao diện footer</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm" role="alert">
            <p class="font-bold">Thành công!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-2 space-y-6">
                
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 border-b pb-2">
                        <i class="fas fa-info-circle mr-2 text-blue-500"></i>Thông tin chung
                    </h3>
                    
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tên Website</label>
                            <input type="text" name="website_name" value="{{ $settings['website_name'] ?? '' }}" 
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                                placeholder="VD: BookStore Việt Nam">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mô tả ngắn (Footer)</label>
                            <textarea name="site_description" rows="3"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                                placeholder="VD: BookStore là thiên đường cho những người yêu sách...">{{ $settings['site_description'] ?? '' }}</textarea>
                            <p class="text-xs text-gray-400 mt-1">Đoạn văn bản giới thiệu xuất hiện ở góc trái chân trang.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 border-b pb-2">
                        <i class="fas fa-address-card mr-2 text-green-500"></i>Liên hệ
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hotline / SĐT</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400"><i class="fas fa-phone"></i></span>
                                <input type="text" name="hotline" value="{{ $settings['hotline'] ?? '' }}" 
                                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" placeholder="0909 xxx xxx">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email hỗ trợ</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" value="{{ $settings['email'] ?? '' }}" 
                                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" placeholder="support@bookstore.vn">
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Địa chỉ văn phòng</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400"><i class="fas fa-map-marker-alt"></i></span>
                                <input type="text" name="address" value="{{ $settings['address'] ?? '' }}" 
                                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" placeholder="Số 123, Đường Nguyễn Huệ...">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="lg:col-span-1 space-y-6">
                
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 border-b pb-2">
                        <i class="fas fa-image mr-2 text-purple-500"></i>Logo Website
                    </h3>
                    
                    <div class="text-center">
                        <div class="mb-4 inline-block relative group">
                            <img id="logo-preview" 
                                 src="{{ isset($settings['logo']) ? asset('storage/' . $settings['logo']) : 'https://via.placeholder.com/150?text=No+Logo' }}" 
                                 alt="Logo Preview" 
                                 class="h-32 w-auto object-contain border rounded-lg p-2 bg-gray-50 shadow-inner dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        
                        <label class="block w-full">
                            <span class="sr-only">Chọn logo</span>
                            <input type="file" name="logo" accept="image/*"
                                onchange="document.getElementById('logo-preview').src = window.URL.createObjectURL(this.files[0])"
                                class="block w-full text-sm text-gray-500 dark:text-gray-400
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100 cursor-pointer
                                dark:file:bg-gray-700 dark:file:text-gray-300
                            "/>
                        </label>
                        <p class="text-xs text-gray-400 mt-2">Định dạng: PNG, JPG (Nên dùng ảnh nền trong suốt)</p>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 border-b pb-2">
                        <i class="fas fa-share-alt mr-2 text-pink-500"></i>Mạng xã hội
                    </h3>
                    
                    <div class="space-y-3">
                        <div class="flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400">
                                <i class="fab fa-facebook-f w-4"></i>
                            </span>
                            <input type="text" name="facebook" value="{{ $settings['facebook'] ?? '' }}" 
                                class="flex-1 min-w-0 block w-full px-3 py-2 rounded-r-md border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" placeholder="Link Facebook">
                        </div>

                        <div class="flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400">
                                <i class="fab fa-youtube w-4"></i>
                            </span>
                            <input type="text" name="youtube" value="{{ $settings['youtube'] ?? '' }}" 
                                class="flex-1 min-w-0 block w-full px-3 py-2 rounded-r-md border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" placeholder="Link Youtube">
                        </div>

                        <div class="flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400">
                                <i class="fab fa-tiktok w-4"></i>
                            </span>
                            <input type="text" name="tiktok" value="{{ $settings['tiktok'] ?? '' }}" 
                                class="flex-1 min-w-0 block w-full px-3 py-2 rounded-r-md border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" placeholder="Link Tiktok">
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all transform hover:scale-[1.02]">
                        <i class="fas fa-save mr-2 mt-0.5"></i> LƯU CẤU HÌNH
                    </button>
                </div>
            </div>

        </div>
    </form>

    <div class="mt-10 bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-red-200 dark:border-red-900">
        <h3 class="text-lg font-semibold text-red-600 dark:text-red-400 mb-2 flex items-center">
            <i class="fas fa-exclamation-triangle mr-2"></i> Vùng nguy hiểm
        </h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
            Hành động này sẽ xóa toàn bộ cài đặt hiện tại (bao gồm Logo, Liên hệ, Mạng xã hội) và đưa về nội dung mặc định ban đầu.
        </p>
        
        <form action="{{ route('admin.settings.reset') }}" method="POST" onsubmit="return confirm('CẢNH BÁO QUAN TRỌNG:\n\nBạn có chắc chắn muốn khôi phục lại dữ liệu gốc không?\n\nMọi thay đổi bạn đã nhập sẽ bị mất vĩnh viễn!');">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-50 text-red-700 border border-red-200 rounded-lg hover:bg-red-100 transition flex items-center text-sm font-medium dark:bg-red-900/20 dark:border-red-800 dark:text-red-400 dark:hover:bg-red-900/40">
                <i class="fas fa-history mr-2"></i> Khôi phục mặc định
            </button>
        </form>
    </div>
    </div>
@endsection