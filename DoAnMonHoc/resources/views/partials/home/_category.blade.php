

<section class="mb-16">

    <!-- TIÊU ĐỀ PHẦN + LINK "XEM TẤT CẢ" -->
    <div class="flex justify-between items-end mb-8">
        <h2 class="text-3xl font-bold text-brown-dark dark:text-white border-l-4 border-brown-primary dark:border-neon-red pl-4 transition-colors">
            Khám Phá Danh Mục
        </h2>
        {{-- <a href="#" class="hidden md:flex items-center text-sm font-semibold text-stone-500 hover:text-brown-primary dark:text-slate-400 dark:hover:text-neon-red transition-colors group">
            Tất cả danh mục <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
        </a> --}}
        <button
            type="button"
            id="toggleCategories"
            class="hidden md:flex items-center text-sm font-semibold
                text-stone-500 hover:text-brown-primary
                dark:text-slate-400 dark:hover:text-neon-red
                transition-colors group">

            <span id="toggleText">Tất cả danh mục</span>
            <i id="toggleIcon"
            class="fas fa-chevron-down ml-2 transition-transform duration-300"></i>
        </button>
    </div>

    <!-- GRID CHỨA CÁC DANH MỤC -->
    <div id="categoryGrid" class="grid grid-cols-2 md:grid-cols-4 gap-6">

        @php
        $colors = [
            'Văn Học'    => 'rose',
            'Kinh Tế'    => 'blue',
            'Kỹ Năng'    => 'amber',
            'Nghệ Thuật' => 'purple',
            'Tâm lý & Kỹ năng' => 'orange',
        ];
        @endphp
        @foreach($categories as $cat)
            @php
                $color = $colors[$cat->name] ?? 'rose';
            @endphp

            <a href="{{ route('product.index', ['categories[]' => $cat->id]) }}"
            class="category-item group relative p-6 rounded-3xl glass bg-white/40 dark:bg-slate-800/40
                    border border-white/50 dark:border-white/5
                    hover:-translate-y-2 transition-all duration-300
                    hover:shadow-xl
                    dark:hover:border-{{ $color }}-500/50
                    overflow-hidden">

                <!-- nền hover -->
                <div class="absolute inset-0 bg-gradient-to-br
                    from-{{ $color }}-100/0
                    to-{{ $color }}-100/50
                    dark:from-{{ $color }}-900/0
                    dark:to-{{ $color }}-900/30
                    opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>

                <div class="relative z-10 flex flex-col items-center text-center space-y-3">

                    <!-- icon -->
                    <div class="w-14 h-14 rounded-full
                        bg-{{ $color }}-100
                        text-{{ $color }}-600
                        dark:bg-{{ $color }}-900/50
                        dark:text-{{ $color }}-400
                        flex items-center justify-center text-2xl mb-1
                        group-hover:scale-110 transition-transform duration-300 shadow-sm">
                        <i class="{{ $cat->icon }}"></i>
                    </div>

                    <!-- tên -->
                    <h3 class="font-bold text-lg text-stone-800 dark:text-white
                        group-hover:text-{{ $color }}-600
                        dark:group-hover:text-{{ $color }}-400 transition-colors">
                        {{ $cat->name }}
                    </h3>

                    <!-- số sách -->
                    <span class="text-xs font-medium text-stone-500 dark:text-slate-400
                        bg-white/50 dark:bg-black/30 px-3 py-1 rounded-full backdrop-blur-sm">
                        {{ $cat->books_count }} cuốn
                    </span>

                </div>
            </a>
        @endforeach
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const btn = document.getElementById('toggleCategories');
        const grid = document.getElementById('categoryGrid');
        const items = grid?.querySelectorAll('.category-item');
        const text = document.getElementById('toggleText');
        const icon = document.getElementById('toggleIcon');

        if (!btn || !items || items.length <= 4) return;

        let expanded = false;
        const LIMIT = 4;

        function render() {
            items.forEach((item, index) => {
                item.classList.toggle('hidden', !expanded && index >= LIMIT);
            });

            text.textContent = expanded ? 'Thu gọn' : 'Tất cả danh mục';
            icon.classList.toggle('rotate-180', expanded);
        }

        render();

        btn.addEventListener('click', function () {
            expanded = !expanded;
            render();
        });
    });
    </script>

</section>