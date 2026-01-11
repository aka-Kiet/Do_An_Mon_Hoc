@extends('layouts.app')

@section('content')

<main class="pt-28 pb-12 px-4 container mx-auto flex-grow">
    <section class="mb-10 mt-4 text-center">

        <h1 class="text-3xl md:text-4xl font-extrabold text-brown-dark dark:text-white mb-6 animate-fade-in-up">
            Tìm cuốn sách <span class="text-transparent bg-clip-text bg-gradient-to-r from-brown-primary to-yellow-600 dark:from-neon-red dark:to-purple-500">tâm đắc</span> của bạn
        </h1>
    
        <div class="max-w-3xl mx-auto relative group z-10">
            
            <div class="absolute -inset-1 bg-gradient-to-r from-brown-primary to-yellow-500 dark:from-neon-red dark:to-purple-600 rounded-full blur opacity-20 group-hover:opacity-40 transition duration-500"></div>
            
            <div class="relative">
                <input type="text" placeholder="Nhập tên sách, tác giả hoặc ISBN..." 
                    class="w-full py-4 pl-14 pr-36 rounded-full glass bg-white/80 dark:bg-slate-900/80 border-2 border-white/50 dark:border-slate-600 focus:border-brown-primary dark:focus:border-neon-red focus:outline-none focus:ring-4 focus:ring-brown-primary/10 dark:focus:ring-neon-red/20 transition-all shadow-xl text-lg text-stone-700 dark:text-slate-200 placeholder-stone-400 dark:placeholder-slate-500">
                
                <i class="fas fa-search absolute left-6 top-1/2 -translate-y-1/2 text-xl text-stone-400 dark:text-slate-500 group-focus-within:text-brown-primary dark:group-focus-within:text-neon-red transition-colors"></i>
                
                <button class="absolute right-2 top-2 bottom-2 px-8 rounded-full bg-brown-primary text-white font-bold hover:bg-brown-dark dark:bg-neon-red dark:text-white dark:hover:bg-red-700 transition-all shadow-md hover:shadow-lg flex items-center">
                    Tìm Kiếm
                </button>
            </div>
        </div>
    
        <div class="mt-4 flex flex-wrap justify-center items-center gap-2 text-sm text-stone-500 dark:text-slate-400">
            <span class="font-semibold"><i class="fas fa-tags mr-1"></i>Từ khóa hot:</span>
            <a href="#" class="px-3 py-1 rounded-full bg-white/40 dark:bg-slate-800 border border-stone-200 dark:border-slate-700 hover:border-brown-primary dark:hover:border-neon-red hover:text-brown-primary dark:hover:text-neon-red transition-all">Tâm lý học</a>
            <a href="#" class="px-3 py-1 rounded-full bg-white/40 dark:bg-slate-800 border border-stone-200 dark:border-slate-700 hover:border-brown-primary dark:hover:border-neon-red hover:text-brown-primary dark:hover:text-neon-red transition-all">Start-up</a>
            <a href="#" class="px-3 py-1 rounded-full bg-white/40 dark:bg-slate-800 border border-stone-200 dark:border-slate-700 hover:border-brown-primary dark:hover:border-neon-red hover:text-brown-primary dark:hover:text-neon-red transition-all">Tiểu thuyết</a>
        </div>
    
    </section>

    <div class="mb-8 flex items-center text-sm text-stone-500 dark:text-slate-400">
        <a href="#" class="hover:text-brown-primary dark:hover:text-neon-red">Trang chủ</a>
        <span class="mx-2">/</span>
        <span class="font-bold text-brown-dark dark:text-white">Tất cả sách</span>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
        
        <aside class="w-full lg:w-1/4 h-fit lg:sticky lg:top-28 space-y-8">
            
            <div class="glass rounded-3xl p-6 bg-white/50 dark:bg-slate-900/60">
                <h3 class="font-bold text-lg mb-4 text-brown-dark dark:text-white border-b border-stone-200 dark:border-slate-700 pb-2">Danh Mục</h3>
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <input type="checkbox" id="cat1" class="custom-checkbox w-4 h-4 rounded border-gray-300 dark:border-slate-600 focus:ring-brown-primary dark:focus:ring-neon-red">
                        <label for="cat1" class="ml-3 text-stone-600 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red cursor-pointer transition">Văn học kinh điển <span class="text-xs text-stone-400 ml-1">(120)</span></label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="cat2" class="custom-checkbox w-4 h-4 rounded border-gray-300 dark:border-slate-600">
                        <label for="cat2" class="ml-3 text-stone-600 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red cursor-pointer transition">Kinh tế & Start-up <span class="text-xs text-stone-400 ml-1">(85)</span></label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="cat3" class="custom-checkbox w-4 h-4 rounded border-gray-300 dark:border-slate-600">
                        <label for="cat3" class="ml-3 text-stone-600 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red cursor-pointer transition">Kỹ năng sống <span class="text-xs text-stone-400 ml-1">(240)</span></label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="cat4" class="custom-checkbox w-4 h-4 rounded border-gray-300 dark:border-slate-600">
                        <label for="cat4" class="ml-3 text-stone-600 dark:text-slate-300 hover:text-brown-primary dark:hover:text-neon-red cursor-pointer transition">Công nghệ (IT) <span class="text-xs text-stone-400 ml-1">(50)</span></label>
                    </li>
                </ul>
            </div>

            <div class="glass rounded-3xl p-6 bg-white/50 dark:bg-slate-900/60">
                <h3 class="font-bold text-lg mb-4 text-brown-dark dark:text-white border-b border-stone-200 dark:border-slate-700 pb-2">Khoảng Giá</h3>
                <div class="space-y-4">
                    <div class="flex justify-between text-sm text-stone-600 dark:text-slate-400">
                        <span>0đ</span>
                        <span>500.000đ+</span>
                    </div>
                    <input type="range" class="w-full h-2 bg-stone-200 dark:bg-slate-700 rounded-lg appearance-none cursor-pointer accent-brown-primary dark:accent-neon-red">
                    <div class="flex space-x-2">
                        <input type="number" placeholder="Từ" class="w-1/2 bg-white/50 dark:bg-slate-800 border border-stone-200 dark:border-slate-700 rounded-lg px-3 py-1 text-sm focus:outline-none focus:border-brown-primary dark:focus:border-neon-red dark:text-white">
                        <input type="number" placeholder="Đến" class="w-1/2 bg-white/50 dark:bg-slate-800 border border-stone-200 dark:border-slate-700 rounded-lg px-3 py-1 text-sm focus:outline-none focus:border-brown-primary dark:focus:border-neon-red dark:text-white">
                    </div>
                    <button class="w-full py-2 rounded-lg bg-brown-primary text-white text-sm font-bold hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700 transition">Áp Dụng</button>
                </div>
            </div>

            <div class="glass rounded-3xl p-6 bg-white/50 dark:bg-slate-900/60">
                <h3 class="font-bold text-lg mb-4 text-brown-dark dark:text-white border-b border-stone-200 dark:border-slate-700 pb-2">Đánh Giá</h3>
                <div class="space-y-2 cursor-pointer">
                    <div class="flex items-center space-x-2 text-yellow-400 hover:opacity-80">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <span class="text-sm text-stone-600 dark:text-slate-400">(Từ 5 sao)</span>
                    </div>
                    <div class="flex items-center space-x-2 text-yellow-400 hover:opacity-80">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                        <span class="text-sm text-stone-600 dark:text-slate-400">(Từ 4 sao)</span>
                    </div>
                </div>
            </div>
        </aside>

        <div class="w-full lg:w-3/4">
            
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 glass p-4 rounded-2xl bg-white/40 dark:bg-slate-900/40">
                <p class="text-stone-600 dark:text-slate-400 text-sm mb-4 md:mb-0">
                    Hiển thị <span class="font-bold text-brown-dark dark:text-white">1 - 9</span> trên <span class="font-bold text-brown-dark dark:text-white">45</span> kết quả
                </p>

                <div class="hidden xl:flex relative group w-48 transition-all focus-within:w-64">
                    <input type="text" placeholder="Tìm kiếm..." 
                        class="w-full bg-stone-100/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 rounded-full py-1.5 px-4 pl-9 text-sm focus:outline-none focus:ring-2 focus:ring-brown-primary dark:focus:ring-neon-red dark:text-white transition-all">
                    <i class="fas fa-search absolute left-3 top-2.5 text-xs text-gray-400 dark:text-slate-500"></i>
                </div>

                <div class="flex items-center space-x-4">
                    <label class="text-sm text-stone-500 dark:text-slate-400">Sắp xếp:</label>
                    <select class="bg-white/80 dark:bg-slate-800 border-none rounded-lg px-4 py-2 text-sm text-stone-700 dark:text-slate-200 focus:ring-2 focus:ring-brown-primary dark:focus:ring-neon-red cursor-pointer">
                        <option>Mới nhất</option>
                        <option>Giá: Thấp đến Cao</option>
                        <option>Giá: Cao đến Thấp</option>
                        <option>Bán chạy nhất</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
                    <div class="h-64 overflow-hidden relative p-4">
                        <span class="absolute top-4 left-4 z-20 bg-red-500 text-white text-[10px] font-bold px-2 py-1 rounded-md shadow-md">-20%</span>
                        
                        <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
                        <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                            <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
                        </div>
                    </div>
                    <div class="px-5 pb-5 pt-2">
                        <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Cà Phê Cùng Tony</h3>
                        <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Tony Buổi Sáng</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-sm text-stone-400 line-through mr-1">150.000đ</span>
                                <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">120.000đ</span>
                            </div>
                            <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                        </div>
                    </div>
                </div>

                <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
                    <div class="h-64 overflow-hidden relative p-4">
                        <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
                        <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                            <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
                        </div>
                    </div>
                    <div class="px-5 pb-5 pt-2">
                        <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Nhà Giả Kim</h3>
                        <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Paulo Coelho</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">85.000đ</span>
                            <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        </div>
                    </div>
                </div>

                <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
                    <div class="h-64 overflow-hidden relative p-4">
                         <span class="absolute top-4 left-4 z-20 bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded-md shadow-md">NEW</span>
                        <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
                        <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                            <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
                        </div>
                    </div>
                    <div class="px-5 pb-5 pt-2">
                        <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Design Patterns</h3>
                        <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Gang of Four</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">350.000đ</span>
                            <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        </div>
                    </div>
                </div>

                 <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
                    <div class="h-64 overflow-hidden relative p-4">
                        <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                            <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
                        </div>
                    </div>
                    <div class="px-5 pb-5 pt-2">
                        <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Clean Code</h3>
                        <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Robert C. Martin</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">400.000đ</span>
                            <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                        </div>
                    </div>
                </div>

                <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
                    <div class="h-64 overflow-hidden relative p-4">
                        <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
                        <img src="https://images.unsplash.com/photo-1541963463532-d68292c34b19?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                            <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
                        </div>
                    </div>
                    <div class="px-5 pb-5 pt-2">
                        <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Tâm Lý Học Tội Phạm</h3>
                        <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">J. M. Macdonald</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">150.000đ</span>
                            <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                        </div>
                    </div>
                </div>

                <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
                    <div class="h-64 overflow-hidden relative p-4">
                        <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
                        <img src="https://images.unsplash.com/photo-1592496431122-2349e0fbc666?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                            <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
                        </div>
                    </div>
                    <div class="px-5 pb-5 pt-2">
                        <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Tư Duy Ngược</h3>
                        <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Nguyễn Anh Dũng</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">99.000đ</span>
                            <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        </div>
                    </div>
                </div>

                <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
                    <div class="h-64 overflow-hidden relative p-4">
                        <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
                        <img src="https://images.unsplash.com/photo-1592496431122-2349e0fbc666?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                            <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
                        </div>
                    </div>
                    <div class="px-5 pb-5 pt-2">
                        <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Tư Duy Ngược</h3>
                        <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Nguyễn Anh Dũng</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">99.000đ</span>
                            <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        </div>
                    </div>
                </div>

                <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
                    <div class="h-64 overflow-hidden relative p-4">
                        <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
                        <img src="https://images.unsplash.com/photo-1592496431122-2349e0fbc666?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                            <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
                        </div>
                    </div>
                    <div class="px-5 pb-5 pt-2">
                        <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Tư Duy Ngược</h3>
                        <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Nguyễn Anh Dũng</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">99.000đ</span>
                            <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        </div>
                    </div>
                </div>

                <div class="group relative rounded-3xl glass overflow-hidden neon-hover transition-all duration-300">
                    <div class="h-64 overflow-hidden relative p-4">
                        <button class="favorite-btn absolute top-6 right-6 z-20 w-8 h-8 rounded-full glass bg-white/50 dark:bg-black/40 flex items-center justify-center text-stone-500 hover:text-red-500 hover:bg-white dark:text-slate-300 dark:hover:text-neon-red dark:hover:bg-slate-900 transition-all duration-300 shadow-sm hover:scale-110"><i class="far fa-heart text-lg"></i></button>
                        <img src="https://images.unsplash.com/photo-1592496431122-2349e0fbc666?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover rounded-xl shadow-md transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-stone-900/20 dark:bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 backdrop-blur-[2px]">
                            <button class="bg-white text-brown-dark dark:bg-neon-red dark:text-white px-5 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-110"><i class="fas fa-cart-plus mr-1"></i> Thêm</button>
                        </div>
                    </div>
                    <div class="px-5 pb-5 pt-2">
                        <h3 class="font-bold text-lg truncate text-stone-800 dark:text-slate-100 group-hover:text-brown-primary dark:group-hover:text-neon-red transition-colors">Tư Duy Ngược</h3>
                        <p class="text-xs font-medium text-stone-500 dark:text-slate-400 mb-3">Nguyễn Anh Dũng</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-extrabold text-brown-primary dark:text-neon-red">99.000đ</span>
                            <div class="flex text-yellow-500 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-12 flex justify-center space-x-2">
                <button class="w-10 h-10 rounded-full glass flex items-center justify-center hover:bg-brown-primary hover:text-white dark:hover:bg-neon-red transition-all"><i class="fas fa-chevron-left"></i></button>
                <button class="w-10 h-10 rounded-full bg-brown-primary text-white dark:bg-neon-red flex items-center justify-center font-bold shadow-lg">1</button>
                <button class="w-10 h-10 rounded-full glass flex items-center justify-center hover:bg-brown-primary hover:text-white dark:hover:bg-neon-red transition-all">2</button>
                <button class="w-10 h-10 rounded-full glass flex items-center justify-center hover:bg-brown-primary hover:text-white dark:hover:bg-neon-red transition-all">3</button>
                <span class="w-10 h-10 flex items-center justify-center text-stone-500 dark:text-slate-400">...</span>
                <button class="w-10 h-10 rounded-full glass flex items-center justify-center hover:bg-brown-primary hover:text-white dark:hover:bg-neon-red transition-all"><i class="fas fa-chevron-right"></i></button>
            </div>

        </div>
    </div>

    <section class="mt-20 border-t border-stone-200 dark:border-white/10 pt-12">

        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-yellow-100 text-yellow-600 dark:bg-yellow-500/20 dark:text-yellow-400 flex items-center justify-center text-2xl shadow-sm">
                    <i class="fas fa-crown"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-brown-dark dark:text-white uppercase tracking-wide">
                        Top Bán Chạy
                    </h2>
                    <p class="text-xs text-stone-500 dark:text-slate-400 font-medium">Được yêu thích nhất tuần qua</p>
                </div>
            </div>
            
            <a href="#" class="text-sm font-bold text-brown-primary hover:text-brown-dark dark:text-neon-red dark:hover:text-white transition-colors flex items-center group">
                Xem bảng xếp hạng <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
    
            <div class="relative group rounded-3xl glass p-4 bg-gradient-to-b from-yellow-50/50 to-white/30 dark:from-yellow-900/10 dark:to-slate-900/40 border border-yellow-200/50 dark:border-yellow-500/30 hover:-translate-y-2 transition-all duration-300">
                <div class="absolute -top-4 -left-2 z-20">
                    <img src="https://cdn-icons-png.flaticon.com/512/2583/2583344.png" class="w-12 h-12 drop-shadow-md" alt="Rank 1"> <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-[60%] font-extrabold text-white text-sm">1</span>
                </div>
                
                <div class="relative overflow-hidden rounded-xl mb-3">
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="w-full aspect-[3/4] object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button class="w-10 h-10 rounded-full bg-white text-brown-dark dark:bg-neon-red dark:text-white hover:scale-110 transition shadow-lg flex items-center justify-center">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
    
                <div class="text-center">
                    <h3 class="font-bold text-stone-800 dark:text-white truncate px-2">Cà Phê Cùng Tony</h3>
                    <div class="flex justify-center items-center gap-1 text-xs text-stone-500 dark:text-slate-400 my-1">
                        <i class="fas fa-fire text-red-500"></i> Đã bán: <span class="font-bold text-stone-700 dark:text-slate-200">25.4k</span>
                    </div>
                    <span class="text-lg font-extrabold text-brown-primary dark:text-yellow-400">120.000đ</span>
                </div>
            </div>
    
            <div class="relative group rounded-3xl glass p-4 bg-white/40 dark:bg-slate-900/40 border border-stone-200/50 dark:border-slate-700 hover:-translate-y-2 transition-all duration-300">
                <div class="absolute -top-3 -left-1 z-20 w-10 h-10 rounded-full bg-stone-300 dark:bg-slate-500 flex items-center justify-center font-extrabold text-white shadow-lg border-2 border-white dark:border-slate-800">
                    2
                </div>
                
                <div class="relative overflow-hidden rounded-xl mb-3">
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="w-full aspect-[3/4] object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button class="w-10 h-10 rounded-full bg-white text-brown-dark dark:bg-neon-red dark:text-white hover:scale-110 transition shadow-lg flex items-center justify-center">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
    
                <div class="text-center">
                    <h3 class="font-bold text-stone-800 dark:text-white truncate px-2">Nhà Giả Kim</h3>
                    <div class="flex justify-center items-center gap-1 text-xs text-stone-500 dark:text-slate-400 my-1">
                        <i class="fas fa-fire text-red-500"></i> Đã bán: <span class="font-bold text-stone-700 dark:text-slate-200">18.2k</span>
                    </div>
                    <span class="text-lg font-extrabold text-brown-primary dark:text-neon-red">85.000đ</span>
                </div>
            </div>
    
            <div class="relative group rounded-3xl glass p-4 bg-white/40 dark:bg-slate-900/40 border border-stone-200/50 dark:border-slate-700 hover:-translate-y-2 transition-all duration-300">
                <div class="absolute -top-3 -left-1 z-20 w-10 h-10 rounded-full bg-orange-300 dark:bg-orange-700 flex items-center justify-center font-extrabold text-white shadow-lg border-2 border-white dark:border-slate-800">
                    3
                </div>
                
                <div class="relative overflow-hidden rounded-xl mb-3">
                    <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="w-full aspect-[3/4] object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button class="w-10 h-10 rounded-full bg-white text-brown-dark dark:bg-neon-red dark:text-white hover:scale-110 transition shadow-lg flex items-center justify-center">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
    
                <div class="text-center">
                    <h3 class="font-bold text-stone-800 dark:text-white truncate px-2">Đắc Nhân Tâm</h3>
                    <div class="flex justify-center items-center gap-1 text-xs text-stone-500 dark:text-slate-400 my-1">
                        <i class="fas fa-fire text-red-500"></i> Đã bán: <span class="font-bold text-stone-700 dark:text-slate-200">15.9k</span>
                    </div>
                    <span class="text-lg font-extrabold text-brown-primary dark:text-neon-red">76.000đ</span>
                </div>
            </div>
    
            <div class="relative group rounded-3xl glass p-4 bg-white/40 dark:bg-slate-900/40 border border-stone-200/50 dark:border-slate-700 hover:-translate-y-2 transition-all duration-300">
                <div class="absolute -top-3 -left-1 z-20 w-10 h-10 rounded-full bg-stone-500/50 dark:bg-slate-700 flex items-center justify-center font-bold text-white shadow-lg border-2 border-white dark:border-slate-800 backdrop-blur-sm">
                    4
                </div>
                
                <div class="relative overflow-hidden rounded-xl mb-3">
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="w-full aspect-[3/4] object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button class="w-10 h-10 rounded-full bg-white text-brown-dark dark:bg-neon-red dark:text-white hover:scale-110 transition shadow-lg flex items-center justify-center">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
    
                <div class="text-center">
                    <h3 class="font-bold text-stone-800 dark:text-white truncate px-2">Tuổi Trẻ Đáng Giá</h3>
                    <div class="flex justify-center items-center gap-1 text-xs text-stone-500 dark:text-slate-400 my-1">
                        <i class="fas fa-fire text-red-500"></i> Đã bán: <span class="font-bold text-stone-700 dark:text-slate-200">12.1k</span>
                    </div>
                    <span class="text-lg font-extrabold text-brown-primary dark:text-neon-red">80.000đ</span>
                </div>
            </div>
    
        </div>
    </section>
</main>

@endsection