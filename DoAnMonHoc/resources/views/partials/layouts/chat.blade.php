<button onclick="toggleChat()" class="fixed bottom-6 right-6 z-[60] w-14 h-14 rounded-full bg-brown-primary dark:bg-neon-red text-white shadow-2xl flex items-center justify-center hover:scale-110 transition-transform duration-300 group">
    <i class="fas fa-comment-dots text-2xl group-hover:hidden"></i>
    <i class="fas fa-times text-2xl hidden group-hover:block"></i>
    
    <span class="absolute inline-flex h-full w-full rounded-full bg-brown-primary dark:bg-neon-red opacity-75 animate-ping -z-10"></span>
</button>

<div id="chat-window" class="fixed bottom-24 right-6 z-[60] w-80 sm:w-96 transform scale-90 opacity-0 pointer-events-none transition-all duration-300 origin-bottom-right">
    
    <div class="glass bg-white/90 dark:bg-slate-900/90 border border-white/50 dark:border-white/10 rounded-3xl shadow-2xl overflow-hidden flex flex-col h-[500px]">
        
        <div class="p-4 bg-brown-primary/10 dark:bg-neon-red/10 border-b border-stone-200 dark:border-slate-700 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-800">
                    <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white dark:border-slate-800 rounded-full"></span>
                </div>
                <div>
                    <h4 class="font-bold text-brown-dark dark:text-white text-sm">CSKH BookStore</h4>
                    <p class="text-xs text-stone-500 dark:text-slate-400">Thường trả lời sau 5p</p>
                </div>
            </div>
            <button onclick="toggleChat()" class="text-stone-400 hover:text-red-500 transition"><i class="fas fa-times"></i></button>
        </div>

        <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-stone-50/50 dark:bg-black/20 custom-scrollbar">
            
            <div class="flex gap-3">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-8 h-8 rounded-full self-end border border-stone-200 dark:border-slate-700">
                <div class="bg-white dark:bg-slate-800 p-3 rounded-2xl rounded-bl-none shadow-sm border border-stone-100 dark:border-slate-700 max-w-[80%]">
                    <p class="text-sm text-stone-600 dark:text-slate-300">Chào bạn! 👋<br>Mình có thể giúp gì cho bạn về sách hôm nay không?</p>
                    <span class="text-[10px] text-stone-400 mt-1 block">10:00 AM</span>
                </div>
            </div>

            <div class="flex gap-3 flex-row-reverse">
                <div class="bg-brown-primary dark:bg-neon-red p-3 rounded-2xl rounded-br-none shadow-md max-w-[80%] text-white">
                    <p class="text-sm">Mình muốn tìm sách về Marketing ạ.</p>
                    <span class="text-[10px] text-white/70 mt-1 block text-right">10:05 AM</span>
                </div>
            </div>

             <div class="flex gap-3">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-8 h-8 rounded-full self-end border border-stone-200 dark:border-slate-700">
                <div class="bg-white dark:bg-slate-800 p-3 rounded-2xl rounded-bl-none shadow-sm border border-stone-100 dark:border-slate-700">
                    <div class="flex space-x-1 h-4 items-center">
                        <div class="w-2 h-2 bg-stone-400 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-stone-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                        <div class="w-2 h-2 bg-stone-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="p-3 border-t border-stone-200 dark:border-slate-700 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md">
            <form onsubmit="event.preventDefault();" class="flex gap-2">
                <input type="text" placeholder="Nhập tin nhắn..." class="w-full px-4 py-2.5 rounded-full bg-stone-100 dark:bg-slate-800 border-none focus:ring-2 focus:ring-brown-primary dark:focus:ring-neon-red text-sm dark:text-white transition-all">
                <button type="submit" class="w-10 h-10 rounded-full bg-brown-primary dark:bg-neon-red text-white flex items-center justify-center hover:shadow-lg transition-transform hover:scale-105">
                    <i class="fas fa-paper-plane text-sm"></i>
                </button>
            </form>
        </div>

    </div>
</div>

<script>
    function toggleChat() {
        const chatWindow = document.getElementById('chat-window');
        
        if (chatWindow.classList.contains('opacity-0')) {
            // Mở chat
            chatWindow.classList.remove('opacity-0', 'pointer-events-none', 'scale-90');
            chatWindow.classList.add('opacity-100', 'scale-100');
        } else {
            // Đóng chat
            chatWindow.classList.remove('opacity-100', 'scale-100');
            chatWindow.classList.add('opacity-0', 'pointer-events-none', 'scale-90');
        }
    }
</script>