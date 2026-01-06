
// --- Theme Toggle Logic ---
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

// --- Sidebar Link Active State on Scroll (Optional UX Enhancement) ---
// Đoạn này giúp highlight mục lục khi cuộn
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.policy-link');

window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (scrollY >= (sectionTop - 150)) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href').includes(current)) {
            link.classList.add('active');
        }
    });
});

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
