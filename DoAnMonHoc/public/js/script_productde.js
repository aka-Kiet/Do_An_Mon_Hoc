document.addEventListener('DOMContentLoaded', function() {
    // 1. Khởi chạy Realtime
    fetchRealtimeData();
    setInterval(fetchRealtimeData, 5000);

    // 2. Setup Theme Toggle (Chỉ chạy nếu tìm thấy nút)
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');
    const htmlElement = document.documentElement;

    if (themeToggleBtn && themeIcon) {
        // Init theme state
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            htmlElement.classList.add('dark');
            themeIcon.classList.replace('fa-moon', 'fa-sun');
        } else {
            htmlElement.classList.remove('dark');
            themeIcon.classList.replace('fa-sun', 'fa-moon');
        }

        themeToggleBtn.addEventListener('click', () => {
            if (htmlElement.classList.contains('dark')) {
                htmlElement.classList.remove('dark');
                localStorage.theme = 'light';
                themeIcon.classList.replace('fa-sun', 'fa-moon');
            } else {
                htmlElement.classList.add('dark');
                localStorage.theme = 'dark';
                themeIcon.classList.replace('fa-moon', 'fa-sun');
            }
        });
    }

    // 3. Setup Mobile Menu (Chỉ chạy nếu tìm thấy nút)
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileBtn && mobileMenu) {
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            const icon = mobileBtn.querySelector('i');
            if (icon) {
                if (mobileMenu.classList.contains('hidden')) {
                    icon.classList.replace('fa-times', 'fa-bars');
                } else {
                    icon.classList.replace('fa-bars', 'fa-times');
                }
            }
        });
    }
});

// --- CÁC HÀM XỬ LÝ (Global Functions) ---

// 1. Logic Gallery
function changeImage(src) {
    const mainImg = document.getElementById('mainImage');
    if(mainImg) {
        mainImg.src = src;
        // Hiệu ứng nhẹ
        mainImg.style.opacity = 0;
        setTimeout(() => mainImg.style.opacity = 1, 200);
    }
}

// 2. Logic Tabs
function openTab(evt, tabName) {
    var i, tabContent, tabBtns;
    
    // Ẩn tất cả nội dung
    tabContent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabContent.length; i++) {
        tabContent[i].classList.add("hidden");
        tabContent[i].classList.remove("block");
    }

    // Bỏ active ở buttons
    tabBtns = document.getElementsByClassName("tab-btn");
    for (i = 0; i < tabBtns.length; i++) {
        tabBtns[i].classList.remove("active"); 
        // Nếu dùng style active riêng (ví dụ text màu khác), hãy remove class đó tại đây
    }

    // Hiện tab được chọn
    const target = document.getElementById(tabName);
    if(target) {
        target.classList.remove("hidden");
        target.classList.add("block");
    }
    evt.currentTarget.classList.add("active");
}

// 3. Logic Số lượng
function updateQty(change) {
    const input = document.getElementById('qtyInput');
    if(!input) return;

    const maxStock = parseInt(input.getAttribute('data-max'));
    let currentQty = parseInt(input.value) || 1;
    let newQty = currentQty + change;

    if (newQty < 1) newQty = 1;
    if (newQty > maxStock) {
        alert("Đã đạt giới hạn tồn kho!");
        newQty = maxStock;
    }
    input.value = newQty;
}

function checkManualQty(input) {
    const maxStock = parseInt(input.getAttribute('data-max'));
    let val = parseInt(input.value);

    if (isNaN(val) || val < 1) {
        alert("Số lượng không hợp lệ");
        input.value = 1;
    } else if (val > maxStock) {
        alert("Kho chỉ còn " + maxStock + " sản phẩm");
        input.value = maxStock;
    }
}

// 4. Realtime Logic
function updateRealtimeUI(data) {
    const stockContainer = document.getElementById('stock-status-container');
    const btnAdd = document.getElementById('btn-add-cart');
    const btnBuy = document.getElementById('btn-buy-now');
    const qtyInput = document.getElementById('qtyInput');
    
    // --- XỬ LÝ TỒN KHO ---
    if (data.quantity > 0) {
        // Cập nhật text hiển thị
        stockContainer.innerHTML = `
            <span class="text-green-600 dark:text-green-400 font-bold text-sm">
                <i class="fas fa-check-circle mr-1"></i>Còn hàng (${data.quantity})
            </span>`;
        
        // Mở khóa nút mua
        if(btnAdd) btnAdd.classList.remove('opacity-50', 'pointer-events-none', 'cursor-not-allowed');
        if(btnBuy) btnBuy.classList.remove('opacity-50', 'pointer-events-none', 'cursor-not-allowed');
        
        // Cập nhật giới hạn cho ô nhập số lượng
        if(qtyInput) {
            qtyInput.setAttribute('data-max', data.quantity);
            
            // LOGIC QUAN TRỌNG: 
            // Nếu người dùng đang chọn số lượng > tồn kho mới (ví dụ chọn 5 mà kho còn 3)
            // -> Tự động giảm xuống bằng tồn kho
            let currentVal = parseInt(qtyInput.value);
            if(currentVal > data.quantity) {
                qtyInput.value = data.quantity;
                // Có thể thêm thông báo nhỏ nếu muốn
                // console.log("Đã cập nhật lại số lượng tối đa do kho thay đổi");
            }
        }
    } else {
        // Hết hàng
        stockContainer.innerHTML = `
            <span class="text-red-500 font-bold text-sm">
                <i class="fas fa-times-circle mr-1"></i>Hết hàng
            </span>`;
            
        // Khóa nút mua
        if(btnAdd) btnAdd.classList.add('opacity-50', 'pointer-events-none', 'cursor-not-allowed');
        if(btnBuy) btnBuy.classList.add('opacity-50', 'pointer-events-none', 'cursor-not-allowed');
        
        // Reset input về 0 hoặc 1 tùy logic
        if(qtyInput) qtyInput.value = 1; 
    }
    
    // --- XỬ LÝ ĐÁNH GIÁ (REVIEW) ---
    const reviewEl = document.getElementById('total-reviews-display');
    if(reviewEl) reviewEl.innerText = data.total_reviews;
    
    const ratingEl = document.getElementById('avg-rating-display');
    if (ratingEl) ratingEl.innerText = parseFloat(data.avg_rating).toFixed(1);
}

// 2. Hàm gọi API (Fetch)
function fetchRealtimeData() {
    // Kiểm tra biến config từ Blade
    if (typeof productConfig === 'undefined' || !productConfig.realtimeRoute) return;

    fetch(productConfig.realtimeRoute)
        .then(res => res.json())
        .then(res => {
            if (res.status === 'success') {
                updateRealtimeUI(res.data);
            }
        })
        .catch(e => console.error("Lỗi Realtime:", e));
}

// 5. THÊM VÀO GIỎ HÀNG (Hàm quan trọng còn thiếu)
function addToCart(isBuyNow = false) {
    if (typeof productConfig === 'undefined') {
        alert("Lỗi cấu hình trang!");
        return;
    }

    const qtyInput = document.getElementById('qtyInput');
    const quantity = qtyInput ? qtyInput.value : 1;

    fetch(productConfig.addToCartRoute, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json' // <--- QUAN TRỌNG: Để Laravel trả về JSON thay vì redirect HTML
        },
        body: JSON.stringify({
            book_id: productConfig.bookId,
            quantity: quantity
        })
    })
    .then(response => {
        // Kiểm tra lỗi 401 (Chưa đăng nhập) hoặc 419 (CSRF Token hết hạn/Session hết hạn)
        if (response.status === 401 || response.status === 419) {
            // Xác nhận chuyển trang
            if(confirm("Bạn cần đăng nhập để thực hiện chức năng này!")) {
                window.location.href = productConfig.loginRoute; // Chuyển hướng
            }
            throw new Error("Unauthorized"); // Ngắt chuỗi promise
        }
        
        // Nếu không phải lỗi 200 OK thì ném lỗi ra catch
        if (!response.ok) {
            throw new Error("HTTP error " + response.status);
        }

        return response.json();
    })
    .then(data => {
        if (data.success) {
            if (isBuyNow) {
                window.location.href = productConfig.checkoutRoute; 
            } else {
                alert("Đã thêm sản phẩm vào giỏ hàng!");
            }
        } else {
            alert("Lỗi: " + (data.message || "Không thể thêm vào giỏ hàng"));
        }
    })
    .catch(error => {
        if (error.message !== "Unauthorized") {
            console.error('Error:', error);
        }
    });
}