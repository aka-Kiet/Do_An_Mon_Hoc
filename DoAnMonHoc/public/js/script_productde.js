
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

// --- Gallery Logic ---
function changeImage(src) {
    document.getElementById('mainImage').src = src;
}

// --- Quantity Logic ---
const qtyInput = document.getElementById('qtyInput');
function updateQty(change) {
    let newVal = parseInt(qtyInput.value) + change;
    if (newVal < 1) newVal = 1;
    qtyInput.value = newVal;
}

// --- Tab Logic ---
function openTab(evt, tabName) {
    var i, tabContent, tabBtn;
    
    // Hide all content
    tabContent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
    }

    // Remove active class from buttons
    tabBtn = document.getElementsByClassName("tab-btn");
    for (i = 0; i < tabBtn.length; i++) {
        tabBtn[i].className = tabBtn[i].className.replace(" active", "");
    }

    // Show current tab and add active class
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

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
