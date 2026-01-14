
// --- Theme Toggle Logic ---
const themeToggleBtn = document.getElementById('theme-toggle');
const themeIcon = document.getElementById('theme-icon');
const htmlElement = document.documentElement;

// Check theme logic (reuse function)
function checkTheme() {
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        htmlElement.classList.add('dark'); themeIcon.classList.remove('fa-moon'); themeIcon.classList.add('fa-sun');
        return 'dark';
    } else {
        htmlElement.classList.remove('dark'); themeIcon.classList.remove('fa-sun'); themeIcon.classList.add('fa-moon');
        return 'light';
    }
}

let currentTheme = checkTheme();

themeToggleBtn.addEventListener('click', () => {
    if (htmlElement.classList.contains('dark')) {
        htmlElement.classList.remove('dark'); localStorage.theme = 'light'; themeIcon.classList.remove('fa-sun'); themeIcon.classList.add('fa-moon');
        currentTheme = 'light';
    } else {
        htmlElement.classList.add('dark'); localStorage.theme = 'dark'; themeIcon.classList.remove('fa-moon'); themeIcon.classList.add('fa-sun');
        currentTheme = 'dark';
    }
    // Update charts on theme change
    updateCharts();
});

// --- Sidebar Mobile Toggle ---
const sidebarToggle = document.getElementById('sidebar-toggle');
const sidebar = document.getElementById('sidebar');
sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('-translate-x-full');
});

// --- Chart.js Configuration ---
const ctxSales = document.getElementById('salesChart').getContext('2d');
const ctxCategory = document.getElementById('categoryChart').getContext('2d');
let salesChart, categoryChart;

function updateCharts() {
    const isDark = currentTheme === 'dark';
    const textColor = isDark ? '#e2e8f0' : '#475569';
    const gridColor = isDark ? 'rgba(255,255,255,0.1)' : 'rgba(0,0,0,0.05)';
    const accentColor = isDark ? '#FF1744' : '#8D6E63';

    // Destroy old charts if exist
    if(salesChart) salesChart.destroy();
    if(categoryChart) categoryChart.destroy();

    // 1. Sales Chart (Line)
    salesChart = new Chart(ctxSales, {
        type: 'line',
        data: {
            labels: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
            datasets: [{
                label: 'Doanh thu (triệu đ)',
                data: [12, 19, 15, 25, 22, 30, 28],
                borderColor: accentColor,
                backgroundColor: isDark ? 'rgba(255, 23, 68, 0.1)' : 'rgba(141, 110, 99, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: { ticks: { color: textColor }, grid: { display: false } },
                y: { ticks: { color: textColor }, grid: { color: gridColor } }
            }
        }
    });

    // 2. Category Chart (Doughnut)
    categoryChart = new Chart(ctxCategory, {
        type: 'doughnut',
        data: {
            labels: ['Văn học', 'Kinh tế', 'Kỹ năng'],
            datasets: [{
                data: [45, 30, 25],
                backgroundColor: [
                    '#60a5fa', // Blue
                    '#c084fc', // Purple
                    '#f472b6'  // Pink
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { 
                legend: { display: false } 
            },
            cutout: '70%'
        }
    });
}

// Init Charts
updateCharts();

