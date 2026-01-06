<div id="login-modal" class="fixed inset-0 z-[60] hidden transition-opacity duration-300 opacity-0" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <div class="fixed inset-0 bg-stone-900/40 dark:bg-black/80 backdrop-blur-sm transition-opacity" onclick="closeLoginModal()"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            
            <div class="relative transform overflow-hidden rounded-[30px] text-left shadow-2xl transition-all sm:my-8 w-full max-w-4xl glass bg-white/80 dark:bg-slate-900/90 border border-white/50 dark:border-white/10 scale-95 opacity-0 transition-all duration-300" id="modal-panel">
                
                <button type="button" onclick="closeLoginModal()" class="absolute top-4 right-4 z-50 w-10 h-10 rounded-full flex items-center justify-center bg-stone-200/50 dark:bg-slate-700/50 hover:bg-stone-300 dark:hover:bg-slate-600 transition-colors text-stone-600 dark:text-slate-200">
                    <i class="fas fa-times"></i>
                </button>

                <div class="flex flex-col lg:flex-row h-[550px]">
                    
                    <div class="hidden lg:block w-5/12 relative overflow-hidden group">
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                             class="w-full h-full object-cover transition-transform duration-[3s] group-hover:scale-110" alt="Login bg">
                        <div class="absolute inset-0 bg-gradient-to-t from-brown-dark/90 via-brown-dark/20 to-transparent dark:from-black/90 dark:via-black/40 dark:to-transparent"></div>
                        <div class="absolute bottom-10 left-8 right-8 text-white z-10">
                            <p class="text-2xl font-serif italic mb-2">"A room without books is like a body without a soul."</p>
                            <p class="text-xs font-bold uppercase tracking-widest text-brown-primary dark:text-neon-red opacity-90">— Cicero</p>
                        </div>
                    </div>

                    <div class="w-full lg:w-7/12 p-8 md:p-10 flex flex-col justify-center relative">
                        
                        <div class="absolute top-0 right-0 w-32 h-32 bg-brown-primary/10 dark:bg-neon-red/10 rounded-full blur-3xl pointer-events-none"></div>

                        <div class="mb-6">
                            <h2 class="text-3xl font-extrabold text-brown-dark dark:text-white">Đăng Nhập</h2>
                            <p class="text-stone-500 dark:text-slate-400 text-sm mt-1">Chào mừng bạn quay trở lại với BookStore.</p>
                        </div>

                        <form action="#" method="POST" class="space-y-5">
                            <div class="relative">
                                <input type="email" placeholder="Email của bạn" 
                                    class="w-full pl-12 pr-4 py-3 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:border-brown-primary dark:focus:border-neon-red focus:outline-none focus:ring-2 focus:ring-brown-primary/20 dark:focus:ring-neon-red/20 transition-all dark:text-white placeholder-stone-400 dark:placeholder-slate-500">
                                <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 dark:text-slate-500"></i>
                            </div>

                            <div class="relative">
                                <input id="popup-password" type="password" placeholder="Mật khẩu" 
                                    class="w-full pl-12 pr-12 py-3 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-stone-200 dark:border-slate-700 focus:border-brown-primary dark:focus:border-neon-red focus:outline-none focus:ring-2 focus:ring-brown-primary/20 dark:focus:ring-neon-red/20 transition-all dark:text-white placeholder-stone-400 dark:placeholder-slate-500">
                                <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 dark:text-slate-500"></i>
                                <button type="button" onclick="togglePopupPassword()" class="absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 dark:text-slate-500 hover:text-brown-primary dark:hover:text-white cursor-pointer">
                                    <i id="popup-eye-icon" class="far fa-eye"></i>
                                </button>
                            </div>

                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center">
                                    <input type="checkbox" id="popup-remember" class="custom-checkbox w-4 h-4 rounded border-stone-300 dark:border-slate-600 focus:ring-brown-primary dark:focus:ring-neon-red cursor-pointer">
                                    <label for="popup-remember" class="ml-2 text-stone-600 dark:text-slate-400 cursor-pointer select-none">Ghi nhớ</label>
                                </div>
                                <a href="#" class="font-bold text-brown-primary hover:text-brown-dark dark:text-neon-red dark:hover:text-red-400">Quên mật khẩu?</a>
                            </div>

                            <button type="submit" class="w-full py-3 rounded-xl bg-brown-primary text-white font-bold text-lg hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700 shadow-lg hover:shadow-xl dark:shadow-[0_0_15px_rgba(255,23,68,0.4)] transition-all transform hover:-translate-y-1">
                                Đăng Nhập
                            </button>

                            <div class="grid grid-cols-2 gap-3 mt-4">
                                <button type="button" class="flex items-center justify-center py-2 rounded-lg border border-stone-200 dark:border-slate-700 hover:bg-white dark:hover:bg-slate-800 transition text-sm font-bold text-stone-600 dark:text-slate-300">
                                    <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" class="w-4 h-4 mr-2" alt="Google"> Google
                                </button>
                                <button type="button" class="flex items-center justify-center py-2 rounded-lg border border-stone-200 dark:border-slate-700 hover:bg-white dark:hover:bg-slate-800 transition text-sm font-bold text-stone-600 dark:text-slate-300">
                                    <img src="https://cdn-icons-png.flaticon.com/512/5968/5968764.png" class="w-4 h-4 mr-2" alt="FB"> Facebook
                                </button>
                            </div>

                            <div class="mt-4 text-center text-sm text-stone-600 dark:text-slate-400">
                                Chưa có tài khoản? 
                                <button type="button" onclick="switchToRegister()" class="font-bold text-brown-primary dark:text-neon-red hover:underline">
                                    Đăng ký ngay
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>