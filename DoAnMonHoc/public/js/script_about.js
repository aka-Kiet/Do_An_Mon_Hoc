// --- Theme Toggle Logic (Giữ nguyên) ---
const themeToggleBtn = document.getElementById('theme-toggle');
const themeIcon = document.getElementById('theme-icon');
const htmlElement = document.documentElement;
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    htmlElement.classList.add('dark'); themeIcon.classList.remove('fa-moon'); themeIcon.classList.add('fa-sun');
} else {
    htmlElement.classList.remove('dark'); themeIcon.classList.remove('fa-sun'); themeIcon.classList.add('fa-moon');
}
themeToggleBtn.addEventListener('click', () => {
    if (htmlElement.classList.contains('dark')) {
        htmlElement.classList.remove('dark'); localStorage.theme = 'light'; themeIcon.classList.remove('fa-sun'); themeIcon.classList.add('fa-moon');
    } else {
        htmlElement.classList.add('dark'); localStorage.theme = 'dark'; themeIcon.classList.remove('fa-moon'); themeIcon.classList.add('fa-sun');
    }
});

// --- Mobile Menu Logic (Giữ nguyên, cần thêm HTML menu nếu muốn dùng) ---
const mobileBtn = document.querySelector('.lg\\:hidden'); // Chọn nút menu mobile
// Thêm logic toggle menu mobile ở đây nếu cần thiết cho trang này.

// --- TEAM SLIDESHOW LOGIC ---
const teamTrack = document.getElementById('teamTrack');
const teamPrevBtn = document.getElementById('teamPrevBtn');
const teamNextBtn = document.getElementById('teamNextBtn');
const teamDots = document.querySelectorAll('.team-dot');
let teamCurrentSlide = 0;
const teamTotalSlides = teamDots.length;

function updateTeamSlidePosition() {
    teamTrack.style.transform = `translateX(-${teamCurrentSlide * 100}%)`;
    // Update Dots
    teamDots.forEach((dot, index) => {
        if (index === teamCurrentSlide) {
            dot.classList.add('active-team-dot', 'bg-brown-primary', 'dark:bg-neon-red', 'scale-125');
            dot.classList.remove('bg-brown-primary/30', 'dark:bg-neon-red/30');
        } else {
            dot.classList.remove('active-team-dot', 'bg-brown-primary', 'dark:bg-neon-red', 'scale-125');
            dot.classList.add('bg-brown-primary/30', 'dark:bg-neon-red/30');
        }
    });
}

teamNextBtn.addEventListener('click', () => {
    teamCurrentSlide = (teamCurrentSlide + 1) % teamTotalSlides;
    updateTeamSlidePosition();
});

teamPrevBtn.addEventListener('click', () => {
    teamCurrentSlide = (teamCurrentSlide - 1 + teamTotalSlides) % teamTotalSlides;
    updateTeamSlidePosition();
});

teamDots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        teamCurrentSlide = index;
        updateTeamSlidePosition();
    });
});

// Initialize first slide state
updateTeamSlidePosition();


// Xử lý Mobile Menu
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