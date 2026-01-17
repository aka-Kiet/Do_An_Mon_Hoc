<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Nhà Giả Kim (BÁN CHẠY NHẤT)
        Book::create([
            'name' => 'Nhà Giả Kim',
            'slug' => 'nha-gia-kim',
            'image' => 'images/books/nha-gia-kim-back.jpg',
            'short_description' => 'Cuốn sách bán chạy chỉ sau Kinh Thánh.',
            'description' => 'Hành trình đi tìm kho báu của chàng chăn cừu Santiago, dạy chúng ta về ước mơ và định mệnh.',
            'price' => 79000,
            'sale_price' => 69000, // Có giảm giá
            'quantity' => 100,     // <--- Khớp với cột 'quantity' trong migration mới
            'sold_quantity' => 15000, 
            'avg_rating' => 1,   // <--- Khớp với cột 'avg_rating'
            'total_reviews' => 200,
            'category_id' => 1, // Văn Học
            'author_id' => 4,   // Paulo Coelho
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 2. Marketing 5.0 (MỚI NHẤT)
        Book::create([
            'name' => 'Marketing 5.0: Công nghệ vị nhân sinh',
            'slug' => 'marketing-5-0',
            'image' => 'images/books/marketing-back.jpg',
            'short_description' => 'Cập nhật xu hướng Marketing trong kỷ nguyên AI.',
            'description' => 'Philip Kotler mang đến góc nhìn mới về sự kết hợp giữa công nghệ và yếu tố con người.',
            'price' => 199000,
            'sale_price' => null, // Không giảm
            'quantity' => 500,
            'sold_quantity' => 10, // Mới ra nên bán ít
            'avg_rating' => 0,
            'total_reviews' => 0,
            'category_id' => 2, // Kinh Tế
            'author_id' => 5,   // Philip Kotler
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 3. Harry Potter (ĐÁNH GIÁ CAO & BÁN CHẠY)
        Book::create([
            'name' => 'Harry Potter và Hòn Đá Phù Thủy',
            'slug' => 'harry-potter-1',
            'image' => 'images/books/harry-potter-back.jpg',
            'short_description' => 'Khởi đầu huyền thoại cậu bé phù thủy.',
            'description' => 'Cuốn sách đưa người đọc vào thế giới phép thuật đầy màu sắc tại Hogwarts.',
            'price' => 150000,
            'sale_price' => 120000,
            'quantity' => 200,
            'sold_quantity' => 9800,
            'avg_rating' => 4.8, // Điểm cao
            'total_reviews' => 1500,
            'category_id' => 1, // Văn Học
            'author_id' => 2,   // J.K. Rowling
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 4. Tuổi Trẻ Đáng Giá Bao Nhiêu (KỸ NĂNG - BÁN CHẠY)
        Book::create([
            'name' => 'Tuổi Trẻ Đáng Giá Bao Nhiêu',
            'slug' => 'tuoi-tre-dang-gia-bao-nhieu',
            'image' => 'images/books/tuoi-tre-back.jpg',
            'short_description' => 'Cuốn sách gối đầu giường của người trẻ Việt.',
            'description' => 'Bạn hối tiếc vì không nắm bắt lấy một cơ hội nào đó, chẳng có ai phải mất ngủ. Bạn trải qua những ngày tháng nhạt nhẽo với công việc bạn căm ghét, người ta chẳng hề bận lòng.',
            'price' => 89000,
            'sale_price' => null, // Không giảm giá
            'quantity' => 100,
            'sold_quantity' => 12500, // Số lượng bán cao -> Lên top Bán Chạy
            'avg_rating' => 4.9,      // Điểm đánh giá cao ngất ngưởng
            'total_reviews' => 3000,
            'category_id' => 4, // Tâm Lý & Kỹ Năng
            'author_id' => 3,   // Rosie Nguyễn
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 5. Kính Vạn Hoa (THIẾU NHI - GIÁ RẺ)
        Book::create([
            'name' => 'Kính Vạn Hoa - Tập 1',
            'slug' => 'kinh-van-hoa-1',
            'image' => 'images/books/kinh-van-hoa-back.jpg',
            'short_description' => 'Tuổi thơ dữ dội của Quý Ròm, Tiểu Long và nhỏ Hạnh.',
            'description' => 'Những câu chuyện học trò tinh nghịch, hài hước và đầy ý nghĩa về tình bạn.',
            'price' => 55000,
            'sale_price' => 49000, // Giảm giá nhẹ
            'quantity' => 300,
            'sold_quantity' => 5000,
            'avg_rating' => 3.5,
            'total_reviews' => 850,
            'category_id' => 3, // Thiếu Nhi
            'author_id' => 1,   // Nguyễn Nhật Ánh
            'is_active' => true,
            'is_featured' => false,
        ]);

        Book::create([
            'name' => 'Dòng Sông Mất Trí Nhớ',
            'slug' => 'dong-song-mat-tri-nho',
            'image' => 'images/books/dong-song.jpg',
            'short_description' => 'Tiểu thuyết cảm xúc',
            'description' => 'Câu chuyện ký ức và con người',
            'price' => 88000,
            'sale_price' => null,
            'quantity' => 150,
            'sold_quantity' => 3200,
            'avg_rating' => 4.7,
            'total_reviews' => 420,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 1,
            'author_id' => 1,
        ]);

        Book::create([
            'name' => 'Thành Phố Không Ngủ',
            'slug' => 'thanh-pho-khong-ngu',
            'image' => 'images/books/thanh-pho.jpg',
            'short_description' => 'Tiểu thuyết đô thị',
            'description' => 'Nhịp sống và số phận con người',
            'price' => 99000,
            'sale_price' => 89000,
            'quantity' => 120,
            'sold_quantity' => 2800,
            'avg_rating' => 4.6,
            'total_reviews' => 380,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 1,
            'author_id' => 2,
        ]);

        Book::create([
            'name' => 'Những Lá Thư Không Gửi',
            'slug' => 'nhung-la-thu-khong-gui',
            'image' => 'images/books/thu.jpg',
            'short_description' => 'Văn học lãng mạn',
            'description' => 'Những lá thư của ký ức',
            'price' => 75000,
            'sale_price' => null,
            'quantity' => 200,
            'sold_quantity' => 4100,
            'avg_rating' => 4.8,
            'total_reviews' => 600,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 1,
            'author_id' => 3,
        ]);

        Book::create([
            'name' => 'Đêm Dài Của Gió',
            'slug' => 'dem-dai-cua-gio',
            'image' => 'images/books/gio.jpg',
            'short_description' => 'Tiểu thuyết tâm lý',
            'description' => 'Hành trình vượt qua bóng tối',
            'price' => 105000,
            'sale_price' => 95000,
            'quantity' => 100,
            'sold_quantity' => 2600,
            'avg_rating' => 4.5,
            'total_reviews' => 300,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 1,
            'author_id' => 2,
        ]);

        Book::create([
            'name' => 'Người Về Từ Hư Vô',
            'slug' => 'nguoi-ve-tu-hu-vo',
            'image' => 'images/books/hu-vo.jpg',
            'short_description' => 'Văn học hiện đại',
            'description' => 'Cuộc tìm kiếm bản thân',
            'price' => 120000,
            'sale_price' => 110000,
            'quantity' => 90,
            'sold_quantity' => 2300,
            'avg_rating' => 4.7,
            'total_reviews' => 350,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 1,
            'author_id' => 1,
        ]);

        Book::create([
            'name' => 'Mùa Thu Trên Phố Nhỏ',
            'slug' => 'mua-thu-tren-pho-nho',
            'image' => 'images/books/mua-thu.jpg',
            'short_description' => 'Truyện nhẹ nhàng',
            'description' => 'Những cảm xúc bình dị',
            'price' => 69000,
            'sale_price' => null,
            'quantity' => 180,
            'sold_quantity' => 5000,
            'avg_rating' => 4.9,
            'total_reviews' => 780,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 1,
            'author_id' => 4,
        ]);

        Book::create([
            'name' => 'Ký Ức Màu Tro',
            'slug' => 'ky-uc-mau-tro',
            'image' => 'images/books/tro.jpg',
            'short_description' => 'Tiểu thuyết nội tâm',
            'description' => 'Hồi ức và mất mát',
            'price' => 87000,
            'sale_price' => null,
            'quantity' => 140,
            'sold_quantity' => 3400,
            'avg_rating' => 4.6,
            'total_reviews' => 410,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 1,
            'author_id' => 3,
        ]);

        Book::create([
            'name' => 'Căn Phòng Số 13',
            'slug' => 'can-phong-so-13',
            'image' => 'images/books/phong-13.jpg',
            'short_description' => 'Truyện trinh thám',
            'description' => 'Bí ẩn căn phòng khép kín',
            'price' => 110000,
            'sale_price' => 99000,
            'quantity' => 110,
            'sold_quantity' => 2900,
            'avg_rating' => 4.8,
            'total_reviews' => 520,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 1,
            'author_id' => 2,
        ]);

        Book::create([
            'name' => 'Lặng Thầm Yêu',
            'slug' => 'lang-tham-yeu',
            'image' => 'images/books/yeu.jpg',
            'short_description' => 'Văn học tình cảm',
            'description' => 'Một tình yêu thầm lặng',
            'price' => 65000,
            'sale_price' => null,
            'quantity' => 250,
            'sold_quantity' => 6200,
            'avg_rating' => 4.9,
            'total_reviews' => 950,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 1,
            'author_id' => 4,
        ]);

        Book::create([
            'name' => 'Hồi Ức Sau Mưa',
            'slug' => 'hoi-uc-sau-mua',
            'image' => 'images/books/mua-ky-uc.jpg',
            'short_description' => 'Tiểu thuyết đời sống',
            'description' => 'Những ký ức sau cơn mưa',
            'price' => 90000,
            'sale_price' => null,
            'quantity' => 160,
            'sold_quantity' => 3600,
            'avg_rating' => 4.7,
            'total_reviews' => 480,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 1,
            'author_id' => 1,
        ]);
                // ===== MARKETING – KINH DOANH =====

        Book::create([
            'name' => 'Marketing 4.0 Thực Chiến',
            'slug' => 'marketing-4-thuc-chien',
            'image' => 'images/books/marketing-4.jpg',
            'short_description' => 'Marketing hiện đại',
            'description' => 'Ứng dụng marketing thời số',
            'price' => 189000,
            'sale_price' => 169000,
            'quantity' => 300,
            'sold_quantity' => 1500,
            'avg_rating' => 4.6,
            'total_reviews' => 210,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 2,
            'author_id' => 5, // Philip Kotler
        ]);

        Book::create([
            'name' => 'Tư Duy Bán Hàng Đột Phá',
            'slug' => 'tu-duy-ban-hang-dot-pha',
            'image' => 'images/books/ban-hang.jpg',
            'short_description' => 'Kinh doanh',
            'description' => 'Chiến lược bán hàng hiệu quả',
            'price' => 159000,
            'sale_price' => null,
            'quantity' => 280,
            'sold_quantity' => 1200,
            'avg_rating' => 4.5,
            'total_reviews' => 180,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 2,
            'author_id' => 6, // Dale Carnegie
        ]);

        Book::create([
            'name' => 'Khởi Nghiệp Tinh Gọn',
            'slug' => 'khoi-nghiep-tinh-gon',
            'image' => 'images/books/startup.jpg',
            'short_description' => 'Startup',
            'description' => 'Tư duy lean startup',
            'price' => 199000,
            'sale_price' => 179000,
            'quantity' => 220,
            'sold_quantity' => 980,
            'avg_rating' => 4.7,
            'total_reviews' => 260,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 2,
            'author_id' => 5, // Philip Kotler
        ]);

        Book::create([
            'name' => 'Nghệ Thuật Đàm Phán',
            'slug' => 'nghe-thuat-dam-phan',
            'image' => 'images/books/dam-phan.jpg',
            'short_description' => 'Kỹ năng',
            'description' => 'Đàm phán trong kinh doanh',
            'price' => 149000,
            'sale_price' => null,
            'quantity' => 240,
            'sold_quantity' => 1100,
            'avg_rating' => 4.6,
            'total_reviews' => 200,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 2,
            'author_id' => 6, // Dale Carnegie
        ]);

        Book::create([
            'name' => 'Chiến Lược Giá Thông Minh',
            'slug' => 'chien-luoc-gia',
            'image' => 'images/books/gia.jpg',
            'short_description' => 'Quản trị',
            'description' => 'Chiến lược định giá',
            'price' => 175000,
            'sale_price' => 155000,
            'quantity' => 200,
            'sold_quantity' => 900,
            'avg_rating' => 4.5,
            'total_reviews' => 160,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 2,
            'author_id' => 7, // James Clear (quản trị – tư duy)
        ]);

        // ===== KỸ NĂNG – TÂM LÝ =====

        Book::create([
            'name' => 'Tư Duy Tích Cực',
            'slug' => 'tu-duy-tich-cuc',
            'image' => 'images/books/tich-cuc.jpg',
            'short_description' => 'Phát triển bản thân',
            'description' => 'Suy nghĩ tích cực mỗi ngày',
            'price' => 89000,
            'sale_price' => null,
            'quantity' => 300,
            'sold_quantity' => 4100,
            'avg_rating' => 4.8,
            'total_reviews' => 600,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 3,
            'author_id' => 8, // Napoleon Hill
        ]);

        Book::create([
            'name' => 'Quản Lý Cảm Xúc',
            'slug' => 'quan-ly-cam-xuc',
            'image' => 'images/books/cam-xuc.jpg',
            'short_description' => 'Tâm lý',
            'description' => 'Kiểm soát cảm xúc hiệu quả',
            'price' => 115000,
            'sale_price' => 99000,
            'quantity' => 260,
            'sold_quantity' => 2500,
            'avg_rating' => 4.7,
            'total_reviews' => 420,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 3,
            'author_id' => 9, // Yuval Noah Harari (tâm lý – hành vi)
        ]);

        Book::create([
            'name' => 'Sức Mạnh Của Thói Quen',
            'slug' => 'suc-manh-thoi-quen',
            'image' => 'images/books/thoi-quen.jpg',
            'short_description' => 'Kỹ năng sống',
            'description' => 'Thay đổi thói quen để thành công',
            'price' => 135000,
            'sale_price' => 119000,
            'quantity' => 240,
            'sold_quantity' => 3100,
            'avg_rating' => 4.9,
            'total_reviews' => 900,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 3,
            'author_id' => 7, // James Clear
        ]);

        Book::create([
            'name' => 'Giao Tiếp Thông Minh',
            'slug' => 'giao-tiep-thong-minh',
            'image' => 'images/books/giao-tiep.jpg',
            'short_description' => 'Kỹ năng mềm',
            'description' => 'Nâng cao giao tiếp',
            'price' => 125000,
            'sale_price' => null,
            'quantity' => 220,
            'sold_quantity' => 1900,
            'avg_rating' => 4.6,
            'total_reviews' => 300,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 3,
            'author_id' => 6, // Dale Carnegie
        ]);

        Book::create([
            'name' => 'Bình Tĩnh Trong Hỗn Loạn',
            'slug' => 'binh-tinh-trong-hon-loan',
            'image' => 'images/books/binh-tinh.jpg',
            'short_description' => 'Tâm lý học',
            'description' => 'Giữ bình tĩnh mọi hoàn cảnh',
            'price' => 125000,
            'sale_price' => 109000,
            'quantity' => 210,
            'sold_quantity' => 1600,
            'avg_rating' => 4.7,
            'total_reviews' => 280,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 3,
            'author_id' => 10, // Haruki Murakami (nội tâm – cảm xúc)
        ]);

        // ===== THIẾU NHI – GIÁO DỤC =====

        Book::create([
            'name' => '100 Câu Chuyện Đạo Đức',
            'slug' => '100-cau-chuyen-dao-duc',
            'image' => 'images/books/dao-duc.jpg',
            'short_description' => 'Thiếu nhi',
            'description' => 'Bài học đạo đức cho bé',
            'price' => 69000,
            'sale_price' => null,
            'quantity' => 400,
            'sold_quantity' => 7200,
            'avg_rating' => 4.9,
            'total_reviews' => 1200,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 4,
            'author_id' => 11, // Stephen R. Covey
        ]);

        Book::create([
            'name' => 'Truyện Kể Trước Giờ Ngủ',
            'slug' => 'truyen-ke-ngu',
            'image' => 'images/books/truyen-ngu.jpg',
            'short_description' => 'Thiếu nhi',
            'description' => 'Truyện hay cho bé',
            'price' => 75000,
            'sale_price' => null,
            'quantity' => 380,
            'sold_quantity' => 6800,
            'avg_rating' => 4.8,
            'total_reviews' => 1050,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 4,
            'author_id' => 11,
        ]);

        Book::create([
            'name' => 'Bé Học Toán Thông Minh',
            'slug' => 'be-hoc-toan',
            'image' => 'images/books/be-toan.jpg',
            'short_description' => 'Giáo dục',
            'description' => 'Phát triển tư duy toán',
            'price' => 85000,
            'sale_price' => 75000,
            'quantity' => 360,
            'sold_quantity' => 5400,
            'avg_rating' => 4.7,
            'total_reviews' => 890,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 4,
            'author_id' => 12, // Tony Robbins (giáo dục – động lực)
        ]);

        Book::create([
            'name' => 'Khám Phá Thế Giới',
            'slug' => 'kham-pha-the-gioi',
            'image' => 'images/books/the-gioi.jpg',
            'short_description' => 'Thiếu nhi',
            'description' => 'Khám phá khoa học',
            'price' => 99000,
            'sale_price' => null,
            'quantity' => 340,
            'sold_quantity' => 4700,
            'avg_rating' => 4.8,
            'total_reviews' => 760,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 4,
            'author_id' => 11,
        ]);
                // ===== CÔNG NGHỆ – LẬP TRÌNH =====

        Book::create([
            'name' => 'Lập Trình PHP Cơ Bản',
            'slug' => 'lap-trinh-php',
            'image' => 'images/books/php.jpg',
            'short_description' => 'Lập trình',
            'description' => 'PHP cho người mới',
            'price' => 185000,
            'sale_price' => 165000,
            'quantity' => 200,
            'sold_quantity' => 1400,
            'avg_rating' => 4.6,
            'total_reviews' => 190,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 5,
            'author_id' => 13,
        ]);

        Book::create([
            'name' => 'Laravel Thực Chiến',
            'slug' => 'laravel-thuc-chien',
            'image' => 'images/books/laravel.jpg',
            'short_description' => 'Lập trình web',
            'description' => 'Laravel MVC thực tế',
            'price' => 220000,
            'sale_price' => 199000,
            'quantity' => 180,
            'sold_quantity' => 1600,
            'avg_rating' => 4.9,
            'total_reviews' => 420,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 5,
            'author_id' => 13,
        ]);

        Book::create([
            'name' => 'JavaScript Từ Zero',
            'slug' => 'javascript-tu-zero',
            'image' => 'images/books/js.jpg',
            'short_description' => 'Lập trình',
            'description' => 'JavaScript nền tảng',
            'price' => 195000,
            'sale_price' => null,
            'quantity' => 190,
            'sold_quantity' => 1500,
            'avg_rating' => 4.7,
            'total_reviews' => 360,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 5,
            'author_id' => 14,
        ]);

        Book::create([
            'name' => 'MySQL Tối Ưu',
            'slug' => 'mysql-toi-uu',
            'image' => 'images/books/mysql.jpg',
            'short_description' => 'Database',
            'description' => 'Tối ưu truy vấn SQL',
            'price' => 180000,
            'sale_price' => 165000,
            'quantity' => 170,
            'sold_quantity' => 1300,
            'avg_rating' => 4.6,
            'total_reviews' => 280,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 5,
            'author_id' => 13,
        ]);

        Book::create([
            'name' => 'Clean Code',
            'slug' => 'clean-code',
            'image' => 'images/books/clean-code.jpg',
            'short_description' => 'Lập trình',
            'description' => 'Viết code chuẩn mực',
            'price' => 230000,
            'sale_price' => 210000,
            'quantity' => 160,
            'sold_quantity' => 1700,
            'avg_rating' => 4.9,
            'total_reviews' => 500,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 5,
            'author_id' => 15,
        ]);

        // ===== VĂN HỌC – THIẾU NIÊN =====

        Book::create([
            'name' => 'Kafka Bên Bờ Biển',
            'slug' => 'kafka-ben-bo-bien',
            'image' => 'images/books/kafka.jpg',
            'short_description' => 'Tiểu thuyết huyền ảo',
            'description' => 'Hiện thực huyền ảo Nhật Bản',
            'price' => 145000,
            'sale_price' => null,
            'quantity' => 110,
            'sold_quantity' => 4900,
            'avg_rating' => 4.7,
            'total_reviews' => 820,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 1,
            'author_id' => 10,
        ]);

        Book::create([
            'name' => 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh',
            'slug' => 'toi-thay-hoa-vang',
            'image' => 'images/books/hoa-vang.jpg',
            'short_description' => 'Văn học thiếu niên',
            'description' => 'Tuổi thơ trong trẻo',
            'price' => 95000,
            'sale_price' => null,
            'quantity' => 200,
            'sold_quantity' => 9800,
            'avg_rating' => 4.9,
            'total_reviews' => 2100,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 1,
            'author_id' => 1,
        ]);

        Book::create([
            'name' => 'Cho Tôi Xin Một Vé Đi Tuổi Thơ',
            'slug' => 've-di-tuoi-tho',
            'image' => 'images/books/tuoi-tho.jpg',
            'short_description' => 'Văn học thiếu nhi',
            'description' => 'Ký ức tuổi thơ',
            'price' => 90000,
            'sale_price' => null,
            'quantity' => 220,
            'sold_quantity' => 10500,
            'avg_rating' => 4.9,
            'total_reviews' => 2300,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 1,
            'author_id' => 1,
        ]);

        // ===== KINH DOANH – TÀI CHÍNH =====

        Book::create([
            'name' => 'Quản Trị Marketing',
            'slug' => 'quan-tri-marketing',
            'image' => 'images/books/quan-tri.jpg',
            'short_description' => 'Marketing nền tảng',
            'description' => 'Chiến lược marketing tổng thể',
            'price' => 205000,
            'sale_price' => null,
            'quantity' => 150,
            'sold_quantity' => 1800,
            'avg_rating' => 4.7,
            'total_reviews' => 420,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 2,
            'author_id' => 5,
        ]);
        Book::create([
            'name' => 'Cha Giàu Cha Nghèo',
            'slug' => 'cha-giau-cha-ngheo',
            'image' => 'images/books/cha-giau.jpg',
            'short_description' => 'Tài chính cá nhân',
            'description' => 'Tư duy về tiền bạc',
            'price' => 125000,
            'sale_price' => null,
            'quantity' => 300,
            'sold_quantity' => 15000,
            'avg_rating' => 4.9,
            'total_reviews' => 4000,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 2,
            'author_id' => 8, // Robert Kiyosaki
        ]);
                // ===== PHÁT TRIỂN BẢN THÂN – KỸ NĂNG =====

        Book::create([
            'name' => 'Atomic Habits',
            'slug' => 'atomic-habits',
            'image' => 'images/books/atomic.jpg',
            'short_description' => 'Thói quen',
            'description' => 'Thay đổi nhỏ – kết quả lớn',
            'price' => 155000,
            'sale_price' => null,
            'quantity' => 260,
            'sold_quantity' => 13800,
            'avg_rating' => 4.9,
            'total_reviews' => 3600,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 3,
            'author_id' => 7,
        ]);

        Book::create([
            'name' => 'Đắc Nhân Tâm',
            'slug' => 'dac-nhan-tam',
            'image' => 'images/books/dac-nhan-tam.jpg',
            'short_description' => 'Giao tiếp',
            'description' => 'Nghệ thuật giao tiếp',
            'price' => 135000,
            'sale_price' => null,
            'quantity' => 280,
            'sold_quantity' => 22000,
            'avg_rating' => 5.0,
            'total_reviews' => 6200,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 3,
            'author_id' => 6,
        ]);

        Book::create([
            'name' => 'Nghĩ Giàu Làm Giàu',
            'slug' => 'nghi-giau-lam-giau',
            'image' => 'images/books/nghi-giau.jpg',
            'short_description' => 'Tư duy thành công',
            'description' => 'Triết lý làm giàu',
            'price' => 145000,
            'sale_price' => null,
            'quantity' => 240,
            'sold_quantity' => 12000,
            'avg_rating' => 4.8,
            'total_reviews' => 3300,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 3,
            'author_id' => 8,
        ]);

        Book::create([
            'name' => '7 Thói Quen Của Người Thành Đạt',
            'slug' => '7-thoi-quen',
            'image' => 'images/books/7-thoi-quen.jpg',
            'short_description' => 'Kỹ năng lãnh đạo',
            'description' => 'Tư duy hiệu quả',
            'price' => 175000,
            'sale_price' => null,
            'quantity' => 210,
            'sold_quantity' => 9800,
            'avg_rating' => 4.9,
            'total_reviews' => 2900,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 3,
            'author_id' => 11,
        ]);

        Book::create([
            'name' => 'Đánh Thức Con Người Phi Thường',
            'slug' => 'danh-thuc-con-nguoi',
            'image' => 'images/books/phi-thuong.jpg',
            'short_description' => 'Truyền cảm hứng',
            'description' => 'Phát triển tiềm năng',
            'price' => 185000,
            'sale_price' => null,
            'quantity' => 190,
            'sold_quantity' => 8600,
            'avg_rating' => 4.8,
            'total_reviews' => 2100,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 3,
            'author_id' => 12,
        ]);

        // ===== THIỀN – TÂM LINH =====

        Book::create([
            'name' => 'Sống Tỉnh Thức',
            'slug' => 'song-tinh-thuc',
            'image' => 'images/books/tinh-thuc.jpg',
            'short_description' => 'Triết lý sống',
            'description' => 'Sống trọn vẹn hiện tại',
            'price' => 125000,
            'sale_price' => null,
            'quantity' => 170,
            'sold_quantity' => 6500,
            'avg_rating' => 4.7,
            'total_reviews' => 1800,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 3,
            'author_id' => 14,
        ]);

        Book::create([
            'name' => 'Giận',
            'slug' => 'gian',
            'image' => 'images/books/gian.jpg',
            'short_description' => 'Chánh niệm',
            'description' => 'Chuyển hóa cảm xúc',
            'price' => 110000,
            'sale_price' => null,
            'quantity' => 160,
            'sold_quantity' => 7800,
            'avg_rating' => 4.8,
            'total_reviews' => 2000,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 3,
            'author_id' => 15,
        ]);

        Book::create([
            'name' => 'An Lạc Từng Bước Chân',
            'slug' => 'an-lac',
            'image' => 'images/books/an-lac.jpg',
            'short_description' => 'Thiền',
            'description' => 'An lạc mỗi ngày',
            'price' => 115000,
            'sale_price' => null,
            'quantity' => 150,
            'sold_quantity' => 6900,
            'avg_rating' => 4.8,
            'total_reviews' => 1900,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 3,
            'author_id' => 15,
        ]);

        // ===== LỊCH SỬ – KHOA HỌC =====

        Book::create([
            'name' => 'Sapiens',
            'slug' => 'sapiens',
            'image' => 'images/books/sapiens.jpg',
            'short_description' => 'Lịch sử nhân loại',
            'description' => 'Lược sử loài người',
            'price' => 195000,
            'sale_price' => null,
            'quantity' => 180,
            'sold_quantity' => 12000,
            'avg_rating' => 4.9,
            'total_reviews' => 3500,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 5,
            'author_id' => 9,
        ]);

        Book::create([
            'name' => 'Homo Deus',
            'slug' => 'homo-deus',
            'image' => 'images/books/homo-deus.jpg',
            'short_description' => 'Tương lai nhân loại',
            'description' => 'Con người và AI',
            'price' => 205000,
            'sale_price' => null,
            'quantity' => 160,
            'sold_quantity' => 9000,
            'avg_rating' => 4.8,
            'total_reviews' => 2400,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 5,
            'author_id' => 9,
        ]);

        Book::create([
            'name' => '21 Bài Học Cho Thế Kỷ 21',
            'slug' => '21-bai-hoc',
            'image' => 'images/books/21.jpg',
            'short_description' => 'Thế giới hiện đại',
            'description' => 'Những vấn đề toàn cầu',
            'price' => 215000,
            'sale_price' => null,
            'quantity' => 150,
            'sold_quantity' => 8200,
            'avg_rating' => 4.8,
            'total_reviews' => 2100,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 5,
            'author_id' => 9,
        ]);

        // ===== TRINH THÁM =====

        Book::create([
            'name' => 'Mật Mã Da Vinci',
            'slug' => 'mat-ma-da-vinci',
            'image' => 'images/books/da-vinci.jpg',
            'short_description' => 'Trinh thám',
            'description' => 'Bí ẩn lịch sử – tôn giáo',
            'price' => 175000,
            'sale_price' => null,
            'quantity' => 190,
            'sold_quantity' => 14000,
            'avg_rating' => 4.9,
            'total_reviews' => 4200,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 1,
            'author_id' => 13,
        ]);

        // ===== VĂN HỌC – TIỂU THUYẾT =====

        Book::create([
            'name' => 'Biên Niên Ký Chim Vặn Dây Cót',
            'slug' => 'bien-nien-ky-chim-van-day-cot',
            'image' => 'images/books/chim-van.jpg',
            'short_description' => 'Tiểu thuyết hiện thực huyền ảo',
            'description' => 'Một trong những tác phẩm lớn của Murakami',
            'price' => 165000,
            'sale_price' => null,
            'quantity' => 110,
            'sold_quantity' => 6200,
            'avg_rating' => 4.8,
            'total_reviews' => 1300,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 1,
            'author_id' => 10,
        ]);

        Book::create([
            'name' => 'Ngồi Khóc Trên Cây',
            'slug' => 'ngoi-khoc-tren-cay',
            'image' => 'images/books/ngoi-khoc.jpg',
            'short_description' => 'Văn học thiếu niên',
            'description' => 'Câu chuyện trong trẻo về tuổi học trò',
            'price' => 95000,
            'sale_price' => null,
            'quantity' => 210,
            'sold_quantity' => 8800,
            'avg_rating' => 4.9,
            'total_reviews' => 1900,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 1,
            'author_id' => 1,
        ]);

        Book::create([
            'name' => 'Cô Gái Đến Từ Hôm Qua',
            'slug' => 'co-gai-den-tu-hom-qua',
            'image' => 'images/books/co-gai.jpg',
            'short_description' => 'Văn học tuổi mới lớn',
            'description' => 'Tuổi thơ và những rung động đầu đời',
            'price' => 90000,
            'sale_price' => null,
            'quantity' => 230,
            'sold_quantity' => 10200,
            'avg_rating' => 4.9,
            'total_reviews' => 2100,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 1,
            'author_id' => 1,
        ]);
        Book::create([
            'name' => 'Brida',
            'slug' => 'brida',
            'image' => 'images/books/brida.jpg',
            'short_description' => 'Tiểu thuyết triết lý',
            'description' => 'Hành trình tâm linh và tình yêu',
            'price' => 125000,
            'sale_price' => null,
            'quantity' => 160,
            'sold_quantity' => 5400,
            'avg_rating' => 4.7,
            'total_reviews' => 1100,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 1,
            'author_id' => 4,
        ]);
                // ===== KINH DOANH – MARKETING =====

        Book::create([
            'name' => 'Marketing Căn Bản',
            'slug' => 'marketing-can-ban',
            'image' => 'images/books/marketing-can-ban.jpg',
            'short_description' => 'Marketing',
            'description' => 'Kiến thức marketing nền tảng',
            'price' => 185000,
            'sale_price' => null,
            'quantity' => 170,
            'sold_quantity' => 2100,
            'avg_rating' => 4.6,
            'total_reviews' => 480,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 2,
            'author_id' => 5,
        ]);

        Book::create([
            'name' => 'Influence – Tâm Lý Học Thuyết Phục',
            'slug' => 'tam-ly-hoc-thuyet-phuc',
            'image' => 'images/books/influence.jpg',
            'short_description' => 'Bán hàng – tâm lý',
            'description' => 'Nguyên lý ảnh hưởng trong giao tiếp',
            'price' => 195000,
            'sale_price' => null,
            'quantity' => 150,
            'sold_quantity' => 3200,
            'avg_rating' => 4.8,
            'total_reviews' => 900,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 2,
            'author_id' => 6,
        ]);

        Book::create([
            'name' => 'Làm Ít Được Nhiều',
            'slug' => 'lam-it-duoc-nhieu',
            'image' => 'images/books/lam-it.jpg',
            'short_description' => 'Hiệu suất',
            'description' => 'Tối ưu năng suất cá nhân',
            'price' => 155000,
            'sale_price' => null,
            'quantity' => 180,
            'sold_quantity' => 4100,
            'avg_rating' => 4.7,
            'total_reviews' => 1200,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 2,
            'author_id' => 7,
        ]);

        // ===== KỸ NĂNG SỐNG – PHÁT TRIỂN BẢN THÂN =====

        Book::create([
            'name' => 'Không Bao Giờ Là Thất Bại',
            'slug' => 'khong-bao-gio-that-bai',
            'image' => 'images/books/never-fail.jpg',
            'short_description' => 'Truyền cảm hứng',
            'description' => 'Thành công từ tư duy đúng',
            'price' => 145000,
            'sale_price' => null,
            'quantity' => 200,
            'sold_quantity' => 7600,
            'avg_rating' => 4.8,
            'total_reviews' => 2100,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 3,
            'author_id' => 12,
        ]);

        Book::create([
            'name' => 'Tư Duy Nhanh Và Chậm',
            'slug' => 'tu-duy-nhanh-va-cham',
            'image' => 'images/books/tu-duy.jpg',
            'short_description' => 'Tâm lý học',
            'description' => 'Cách con người ra quyết định',
            'price' => 175000,
            'sale_price' => null,
            'quantity' => 170,
            'sold_quantity' => 8900,
            'avg_rating' => 4.8,
            'total_reviews' => 2400,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 3,
            'author_id' => 11,
        ]);

        Book::create([
            'name' => 'Đi Tìm Lẽ Sống',
            'slug' => 'di-tim-le-song',
            'image' => 'images/books/di-tim.jpg',
            'short_description' => 'Ý nghĩa cuộc sống',
            'description' => 'Câu chuyện về sức mạnh tinh thần',
            'price' => 135000,
            'sale_price' => null,
            'quantity' => 190,
            'sold_quantity' => 8200,
            'avg_rating' => 4.9,
            'total_reviews' => 2600,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 3,
            'author_id' => 15,
        ]);

        Book::create([
            'name' => 'Bí Mật',
            'slug' => 'bi-mat',
            'image' => 'images/books/bi-mat.jpg',
            'short_description' => 'Luật hấp dẫn',
            'description' => 'Sức mạnh của niềm tin',
            'price' => 125000,
            'sale_price' => null,
            'quantity' => 220,
            'sold_quantity' => 15000,
            'avg_rating' => 4.7,
            'total_reviews' => 5000,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 3,
            'author_id' => 12,
        ]);

        // ===== TÂM LINH – THIỀN =====

        Book::create([
            'name' => 'Can Đảm Biến Thách Thức Thành Sức Mạnh',
            'slug' => 'can-dam-bien-thach-thuc',
            'image' => 'images/books/can-dam.jpg',
            'short_description' => 'Triết lý sống',
            'description' => 'Sức mạnh nội tâm',
            'price' => 115000,
            'sale_price' => null,
            'quantity' => 160,
            'sold_quantity' => 4300,
            'avg_rating' => 4.6,
            'total_reviews' => 980,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 3,
            'author_id' => 14,
        ]);

        Book::create([
            'name' => 'Phép Lạ Của Sự Tỉnh Thức',
            'slug' => 'phep-la-tinh-thuc',
            'image' => 'images/books/phep-la.jpg',
            'short_description' => 'Chánh niệm',
            'description' => 'Sống tỉnh thức mỗi ngày',
            'price' => 120000,
            'sale_price' => null,
            'quantity' => 150,
            'sold_quantity' => 5700,
            'avg_rating' => 4.8,
            'total_reviews' => 1400,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 3,
            'author_id' => 15,
        ]);

        // ===== LỊCH SỬ – KHOA HỌC – NHÂN LOẠI =====

        Book::create([
            'name' => 'Lược Sử Ngày Mai',
            'slug' => 'luoc-su-ngay-mai',
            'image' => 'images/books/ngay-mai.jpg',
            'short_description' => 'Tương lai loài người',
            'description' => 'Tầm nhìn về thế giới tương lai',
            'price' => 205000,
            'sale_price' => null,
            'quantity' => 160,
            'sold_quantity' => 6700,
            'avg_rating' => 4.8,
            'total_reviews' => 1800,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 5,
            'author_id' => 9,
        ]);

        Book::create([
            'name' => 'Con Người 2.0',
            'slug' => 'con-nguoi-2-0',
            'image' => 'images/books/con-nguoi-2.jpg',
            'short_description' => 'Khoa học – công nghệ',
            'description' => 'Con người trong kỷ nguyên số',
            'price' => 215000,
            'sale_price' => null,
            'quantity' => 140,
            'sold_quantity' => 5200,
            'avg_rating' => 4.7,
            'total_reviews' => 1300,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 5,
            'author_id' => 9,
        ]);

        // ===== TRINH THÁM =====

        Book::create([
            'name' => 'Thiên Thần & Ác Quỷ',
            'slug' => 'thien-than-ac-quy',
            'image' => 'images/books/thien-than.jpg',
            'short_description' => 'Trinh thám',
            'description' => 'Âm mưu và bí mật Vatican',
            'price' => 165000,
            'sale_price' => null,
            'quantity' => 180,
            'sold_quantity' => 9800,
            'avg_rating' => 4.9,
            'total_reviews' => 3000,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 1,
            'author_id' => 13,
        ]);

        Book::create([
            'name' => 'Điểm Dối Lừa',
            'slug' => 'diem-doi-lua',
            'image' => 'images/books/diem-doi-lua.jpg',
            'short_description' => 'Trinh thám – khoa học',
            'description' => 'Sự thật và âm mưu',
            'price' => 155000,
            'sale_price' => null,
            'quantity' => 170,
            'sold_quantity' => 7100,
            'avg_rating' => 4.8,
            'total_reviews' => 2100,
            'is_active' => true,
            'is_featured' => false,
            'category_id' => 1,
            'author_id' => 13,
        ]);

        // ===== THIẾU NHI – GIÁO DỤC =====

        Book::create([
            'name' => 'Harry Potter và Chiếc Cốc Lửa',
            'slug' => 'harry-potter-coc-lua',
            'image' => 'images/books/hp-coc-lua.jpg',
            'short_description' => 'Giả tưởng thiếu nhi',
            'description' => 'Giải đấu Tam Pháp Thuật',
            'price' => 155000,
            'sale_price' => null,
            'quantity' => 260,
            'sold_quantity' => 16000,
            'avg_rating' => 4.9,
            'total_reviews' => 4200,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 4,
            'author_id' => 2,
        ]);

        Book::create([
            'name' => 'Harry Potter và Hội Phượng Hoàng',
            'slug' => 'harry-potter-phuong-hoang',
            'image' => 'images/books/hp-phuong-hoang.jpg',
            'short_description' => 'Giả tưởng thiếu nhi',
            'description' => 'Cuộc chiến chống Voldemort',
            'price' => 165000,
            'sale_price' => null,
            'quantity' => 240,
            'sold_quantity' => 15800,
            'avg_rating' => 4.9,
            'total_reviews' => 4100,
            'is_active' => true,
            'is_featured' => true,
            'category_id' => 4,
            'author_id' => 2,
        ]);

    }
}

