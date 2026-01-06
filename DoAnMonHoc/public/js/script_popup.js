////////////////////////////////////////////////////////////////////////
// Đăng nhập
// --- POPUP LOGIC ---
const loginModal = document.getElementById('login-modal');
const modalPanel = document.getElementById('modal-panel');

// Hàm mở Modal
function openLoginModal() {
    loginModal.classList.remove('hidden');
    // Timeout nhỏ để kích hoạt transition opacity
    setTimeout(() => {
        loginModal.classList.remove('opacity-0');
        modalPanel.classList.remove('scale-95', 'opacity-0');
        modalPanel.classList.add('scale-100', 'opacity-100');
    }, 10);
}

// Hàm đóng Modal
function closeLoginModal() {
    loginModal.classList.add('opacity-0');
    modalPanel.classList.remove('scale-100', 'opacity-100');
    modalPanel.classList.add('scale-95', 'opacity-0');
    
    // Đợi transition xong mới ẩn hẳn div
    setTimeout(() => {
        loginModal.classList.add('hidden');
    }, 300);
}

// Hàm hiện/ẩn mật khẩu trong popup
function togglePopupPassword() {
    const pwdInput = document.getElementById('popup-password');
    const eyeIcon = document.getElementById('popup-eye-icon');
    if (pwdInput.type === 'password') {
        pwdInput.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        pwdInput.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
}


// Đăng ký
// --- MODAL CONTROLLER ---
const loginPanel = document.getElementById('modal-panel'); // Panel của Login

const registerModal = document.getElementById('register-modal');
const registerPanel = document.getElementById('register-panel'); // Panel của Register

// Helper: Mở Modal
function openModal(modal, panel) {
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.classList.remove('opacity-0');
        panel.classList.remove('scale-95', 'opacity-0');
        panel.classList.add('scale-100', 'opacity-100');
    }, 10);
}

// Helper: Đóng Modal
function closeModal(modal, panel) {
    modal.classList.add('opacity-0');
    panel.classList.remove('scale-100', 'opacity-100');
    panel.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

// --- CÁC HÀM GỌI TỪ HTML ---

// 1. Mở Login
function openLoginModal() {
    closeModal(registerModal, registerPanel); // Đóng Register nếu đang mở
    openModal(loginModal, loginPanel);
}

// 2. Đóng Login
function closeLoginModal() {
    closeModal(loginModal, loginPanel);
}

// 3. Mở Register
function openRegisterModal() {
    closeModal(loginModal, loginPanel); // Đóng Login nếu đang mở
    openModal(registerModal, registerPanel);
}

// 4. Đóng Register
function closeRegisterModal() {
    closeModal(registerModal, registerPanel);
}

// 5. Chuyển từ Register -> Login
function switchToLogin() {
    closeRegisterModal();
    setTimeout(openLoginModal, 300); // Đợi đóng xong mới mở cái kia cho mượt
}

// 6. Chuyển từ Login -> Register (Bạn cần thêm onclick="switchToRegister()" vào link ở Popup Login)
function switchToRegister() {
    closeLoginModal();
    setTimeout(openRegisterModal, 300);
}

// --- Logic Password Visibility (Dùng chung) ---
function togglePopupPassword() {
    const input = document.getElementById('popup-password');
    const icon = document.getElementById('popup-eye-icon');
    if (input.type === 'password') {
        input.type = 'text'; icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password'; icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

    ////////////////////////////////////////////////////////////////////////