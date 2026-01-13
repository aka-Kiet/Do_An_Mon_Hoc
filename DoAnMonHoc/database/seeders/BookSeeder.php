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

        
        
    }
}
