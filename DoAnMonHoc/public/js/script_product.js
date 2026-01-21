/**
 * ==========================================
 * 1. CÁC HÀM XỬ LÝ FORM (ADMIN & CLIENT)
 * ==========================================
 */

// Hàm Preview Ảnh Đại Diện
function previewMainImage(input) {
    const preview = document.getElementById('avatar_preview');
    const oldImage = document.getElementById('avatar_old');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            if (preview) {
                preview.src = e.target.result;
                preview.classList.remove('hidden'); // Hiện ảnh mới
            }
            if (oldImage) {
                oldImage.classList.add('hidden'); // Ẩn ảnh cũ nếu có
            }
        }

        reader.readAsDataURL(input.files[0]); // Đọc file
    }
}

// Hàm Preview Gallery (Nhiều ảnh)
function previewGalleryImages(input) {
    const container = document.getElementById('gallery_preview_container');
    
    // Kiểm tra nếu container tồn tại thì mới chạy tiếp
    if (container) {
        container.innerHTML = ''; // Xóa các preview cũ nếu chọn lại

        if (input.files) {
            const filesAmount = input.files.length;

            for (let i = 0; i < filesAmount; i++) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    // Tạo thẻ img
                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.className = 'h-24 w-full object-cover rounded border';
                    
                    // Đưa vào container
                    container.appendChild(img);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }
    }
}

/**
 * ==========================================
 * 2. CÁC HÀM GIAO DIỆN (THEME, MENU, ANIMATION)
 * (Chạy khi DOM đã tải xong)
 * ==========================================
 */
document.addEventListener('DOMContentLoaded', function() {

    // --- Theme Toggle Logic ---
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');
    const htmlElement = document.documentElement;

    // Chỉ chạy nếu nút theme tồn tại (tránh lỗi ở trang Admin không có nút này)
    if (themeToggleBtn && themeIcon) {
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            htmlElement.classList.add('dark');
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
        } else {
            htmlElement.classList.remove('dark');
            themeIcon.classList.remove('fa-sun');
            themeIcon.classList.add('fa-moon');
        }

        themeToggleBtn.addEventListener('click', () => {
            if (htmlElement.classList.contains('dark')) {
                htmlElement.classList.remove('dark');
                localStorage.theme = 'light';
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            } else {
                htmlElement.classList.add('dark');
                localStorage.theme = 'dark';
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            }
        });
    }

    // --- Heart Animation Logic ---
    const favButtons = document.querySelectorAll('.favorite-btn');
    if (favButtons.length > 0) {
        favButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const icon = this.querySelector('i');
                if (icon) {
                    if (icon.classList.contains('far')) {
                        icon.classList.remove('far');
                        icon.classList.add('fas', 'text-red-500', 'dark:text-neon-red', 'animate-pop');
                    } else {
                        icon.classList.remove('fas', 'text-red-500', 'dark:text-neon-red', 'animate-pop');
                        icon.classList.add('far');
                    }
                }
            });
        });
    }

    // --- Mobile Menu Logic ---
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileBtn && mobileMenu) {
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            
            // Đổi icon từ 3 gạch sang dấu X
            const icon = mobileBtn.querySelector('i');
            if (icon) {
                if (mobileMenu.classList.contains('hidden')) {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                } else {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                }
            }
        });
    }
});