
// --- Theme Toggle ---
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

// --- Cart Quantity Logic (Visual Only) ---
function updateCartQty(btn, change) {
    const input = btn.parentElement.querySelector('input');
    let newVal = parseInt(input.value) + change;
    if (newVal < 1) newVal = 1;
    input.value = newVal;
    // Ở đây bạn sẽ thêm logic Ajax để cập nhật giỏ hàng thật với Laravel
}

// --- Modal Logic (Giản lược để demo) ---
const loginModal = document.getElementById('login-modal');
const regModal = document.getElementById('register-modal');
function openLoginModal() { loginModal.classList.remove('hidden'); setTimeout(()=>loginModal.classList.remove('opacity-0'),10); }
function closeLoginModal() { loginModal.classList.add('opacity-0'); setTimeout(()=>loginModal.classList.add('hidden'),300); }
function openRegisterModal() { regModal.classList.remove('hidden'); setTimeout(()=>regModal.classList.remove('opacity-0'),10); }
function closeRegisterModal() { regModal.classList.add('opacity-0'); setTimeout(()=>regModal.classList.add('hidden'),300); }
