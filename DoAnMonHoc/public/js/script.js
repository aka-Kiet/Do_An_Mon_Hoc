const themeToggleBtn = document.getElementById('theme-toggle');
const themeIcon = document.getElementById('theme-icon');
const htmlElement = document.documentElement;

// Logic check theme
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

    // --- SLIDESHOW LOGIC ---
const slides = document.querySelectorAll('.slide');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const indicators = document.querySelectorAll('.indicator');
let currentSlide = 0;
const totalSlides = slides.length;
let slideInterval;

// Hàm hiển thị slide theo index
function showSlide(index) {
    // Reset tất cả slides
    slides.forEach((slide) => {
        slide.classList.remove('opacity-100', 'z-10', 'active');
        slide.classList.add('opacity-0', 'z-0');
    });

    // Reset indicators
    indicators.forEach((dot) => {
        dot.classList.remove('active-dot', 'ring-2', 'ring-offset-2', 'ring-brown-primary', 'dark:ring-neon-red');
        dot.classList.add('bg-white/50');
    });

    // Hiển thị slide hiện tại
    slides[index].classList.remove('opacity-0', 'z-0');
    slides[index].classList.add('opacity-100', 'z-10', 'active');

    // Highlight indicator
    indicators[index].classList.add('active-dot', 'ring-2', 'ring-offset-2', 'ring-brown-primary', 'dark:ring-neon-red');
    indicators[index].classList.remove('bg-white/50');
}

// Chuyển slide tiếp theo
function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
}

// Chuyển slide trước đó
function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    showSlide(currentSlide);
}

// Gán sự kiện click cho nút
nextBtn.addEventListener('click', () => {
    nextSlide();
    resetTimer();
});

prevBtn.addEventListener('click', () => {
    prevSlide();
    resetTimer();
});

// Gán sự kiện cho các chấm tròn
indicators.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        currentSlide = index;
        showSlide(currentSlide);
        resetTimer();
    });
});

// Tự động chạy slide
function startTimer() {
    slideInterval = setInterval(nextSlide, 5000); // 5 giây chuyển 1 lần
}

function resetTimer() {
    clearInterval(slideInterval);
    startTimer();
}

// Khởi chạy lần đầu
showSlide(0);
startTimer();

// Xử lý Mobile Menu
const mobileBtn = document.getElementById('mobile-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

mobileBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    
    // Đổi icon từ 3 gạch sang dấu X
    const icon = mobileBtn.querySelector('i');
    if (mobileMenu.classList.contains('hidden')) {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    } else {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
    }
});


