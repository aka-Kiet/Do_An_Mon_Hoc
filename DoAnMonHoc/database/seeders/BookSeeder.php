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

        // 6. Đắc Nhân Tâm (KỸ NĂNG - BEST SELLER TOÀN CẦU)
        Book::create([
            'name' => 'Đắc Nhân Tâm',
            'slug' => 'dac-nhan-tam',
            'image' => 'images/books/dac-nhan-tam-back.jpg',
            'short_description' => 'Nghệ thuật thu phục lòng người.',
            'description' => 'Cuốn sách nổi tiếng nhất mọi thời đại về nghệ thuật giao tiếp và ứng xử, giúp bạn thành công trong cả công việc lẫn cuộc sống.',
            'price' => 86000,
            'sale_price' => 65000, // Giảm sâu để hút khách
            'quantity' => 1000,
            'sold_quantity' => 50000, // Số lượng bán cực khủng
            'avg_rating' => 5,
            'total_reviews' => 8900,
            'category_id' => 4, // Tâm Lý & Kỹ Năng
            'author_id' => 6,   // Dale Carnegie
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 7. Cánh Đồng Bất Tận (VĂN HỌC VIỆT NAM)
        Book::create([
            'name' => 'Cánh Đồng Bất Tận',
            'slug' => 'canh-dong-bat-tan',
            'image' => 'images/books/canh-dong-bat-tan-back.jpg',
            'short_description' => 'Tác phẩm gây tiếng vang lớn của văn học Việt.',
            'description' => 'Câu chuyện day dứt về phận người trôi nổi trên sông nước miền Tây, vừa đau đớn vừa nhân văn.',
            'price' => 75000,
            'sale_price' => null,
            'quantity' => 250,
            'sold_quantity' => 3200,
            'avg_rating' => 4.5,
            'total_reviews' => 600,
            'category_id' => 1, // Văn Học
            'author_id' => 7,   // Nguyễn Ngọc Tư
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 8. Rừng Na Uy (VĂN HỌC NƯỚC NGOÀI - KINH ĐIỂN)
        Book::create([
            'name' => 'Rừng Na Uy',
            'slug' => 'rung-na-uy',
            'image' => 'images/books/rung-na-uy-back.jpg',
            'short_description' => 'Tiểu thuyết lãng mạn pha lẫn u buồn đầy ám ảnh.',
            'description' => 'Một câu chuyện về tình yêu, sự mất mát và sự trưởng thành trong bối cảnh nước Nhật những năm 1960.',
            'price' => 110000,
            'sale_price' => 99000,
            'quantity' => 400,
            'sold_quantity' => 7800,
            'avg_rating' => 4.7,
            'total_reviews' => 2100,
            'category_id' => 1, // Văn Học
            'author_id' => 8,   // Haruki Murakami
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 9. Số Đỏ (VĂN HỌC TRÀO PHÚNG)
        Book::create([
            'name' => 'Số Đỏ',
            'slug' => 'so-do',
            'image' => 'images/books/so-do-back.jpg',
            'short_description' => 'Kiệt tác trào phúng của Vũ Trọng Phụng.',
            'description' => 'Hành trình thăng tiến nực cười của Xuân Tóc Đỏ, phơi bày bộ mặt giả tạo của xã hội tư sản Âu hóa.',
            'price' => 60000,
            'sale_price' => 45000, // Giá rẻ cho học sinh sinh viên
            'quantity' => 600,
            'sold_quantity' => 4500,
            'avg_rating' => 4.8,
            'total_reviews' => 1200,
            'category_id' => 1, // Văn Học
            'author_id' => 9,   // Vũ Trọng Phụng
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 10. Dạy Con Làm Giàu - Tập 1 (KINH TẾ - TÀI CHÍNH)
        Book::create([
            'name' => 'Dạy Con Làm Giàu - Tập 1',
            'slug' => 'day-con-lam-giau-1',
            'image' => 'images/books/day-con-lam-giau-back.jpg',
            'short_description' => 'Để không có tiền vẫn tạo ra tiền.',
            'description' => 'Thay đổi tư duy về tiền bạc, sự khác biệt giữa tài sản và tiêu sản qua lời dạy của hai người cha.',
            'price' => 125000,
            'sale_price' => null,
            'quantity' => 800,
            'sold_quantity' => 20000,
            'avg_rating' => 4.6,
            'total_reviews' => 4500,
            'category_id' => 2, // Kinh Tế
            'author_id' => 10,  // Robert Kiyosaki
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 11. Mắt Biếc (VĂN HỌC - LÃNG MẠN)
        Book::create([
            'name' => 'Mắt Biếc',
            'slug' => 'mat-biec',
            'image' => 'images/books/mat-biec-back.jpg',
            'short_description' => 'Câu chuyện tình yêu buồn nhất của Nguyễn Nhật Ánh.',
            'description' => 'Mối tình đơn phương da diết của Ngạn dành cho Hà Lan, gắn liền với làng Đo Đo và những kỷ niệm tuổi thơ.',
            'price' => 110000,
            'sale_price' => 88000,
            'quantity' => 150,
            'sold_quantity' => 12000,
            'avg_rating' => 4.9,
            'total_reviews' => 2500,
            'category_id' => 1, // Văn Học
            'author_id' => 1,   // Nguyễn Nhật Ánh (Re-use)
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 12. Kafka Bên Bờ Biển (VĂN HỌC - KỲ ẢO)
        Book::create([
            'name' => 'Kafka Bên Bờ Biển',
            'slug' => 'kafka-ben-bo-bien',
            'image' => 'images/books/kafka-back.jpg',
            'short_description' => 'Một tiểu thuyết li kỳ và đầy rẫy những ẩn dụ.',
            'description' => 'Câu chuyện đan xen giữa chàng trai 15 tuổi bỏ nhà đi và ông lão Nakata biết nói chuyện với mèo.',
            'price' => 145000,
            'sale_price' => null, // Không giảm
            'quantity' => 80,
            'sold_quantity' => 1500,
            'avg_rating' => 4.6,
            'total_reviews' => 400,
            'category_id' => 1, // Văn Học
            'author_id' => 8,   // Haruki Murakami (Re-use)
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 13. Quẳng Gánh Lo Đi Và Vui Sống (KỸ NĂNG SỐNG)
        Book::create([
            'name' => 'Quẳng Gánh Lo Đi Và Vui Sống',
            'slug' => 'quang-ganh-lo-di',
            'image' => 'images/books/quang-ganh-lo-di-back.jpg',
            'short_description' => 'Liều thuốc tinh thần cho cuộc sống hiện đại.',
            'description' => 'Những lời khuyên thiết thực giúp bạn giảm căng thẳng, lo âu và tìm thấy niềm vui trong cuộc sống hàng ngày.',
            'price' => 76000,
            'sale_price' => 50000, // Sale mạnh
            'quantity' => 450,
            'sold_quantity' => 9000,
            'avg_rating' => 4.7,
            'total_reviews' => 1300,
            'category_id' => 4, // Tâm Lý & Kỹ Năng
            'author_id' => 6,   // Dale Carnegie (Re-use)
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 14. Marketing 4.0 (KINH TẾ - MARKETING)
        Book::create([
            'name' => 'Marketing 4.0: Dịch chuyển từ truyền thống sang công nghệ số',
            'slug' => 'marketing-4-0',
            'image' => 'images/books/marketing-4-0-back.jpg',
            'short_description' => 'Nền tảng trước khi bước vào Marketing 5.0.',
            'description' => 'Hướng dẫn các doanh nghiệp chuyển đổi số và tiếp cận khách hàng trong kỷ nguyên kết nối.',
            'price' => 115000,
            'sale_price' => 90000,
            'quantity' => 200,
            'sold_quantity' => 3000,
            'avg_rating' => 4.4,
            'total_reviews' => 550,
            'category_id' => 2, // Kinh Tế
            'author_id' => 5,   // Philip Kotler (Re-use)
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 15. Harry Potter và Phòng Chứa Bí Mật (VĂN HỌC - FANTASY)
        Book::create([
            'name' => 'Harry Potter và Phòng Chứa Bí Mật',
            'slug' => 'harry-potter-2',
            'image' => 'images/books/harry-potter-2-back.jpg',
            'short_description' => 'Năm học thứ hai đầy nguy hiểm tại Hogwarts.',
            'description' => 'Harry trở lại trường và đối mặt với thế lực hắc ám đang tấn công các học sinh gốc Muggle.',
            'price' => 160000,
            'sale_price' => 140000,
            'quantity' => 180,
            'sold_quantity' => 8500,
            'avg_rating' => 4.8,
            'total_reviews' => 1400,
            'category_id' => 1, // Văn Học
            'author_id' => 2,   // J.K. Rowling (Re-use)
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 16. Dạy Con Làm Giàu - Tập 2 (KINH TẾ - TÀI CHÍNH)
        Book::create([
            'name' => 'Dạy Con Làm Giàu - Tập 2: Sử Dụng Đồng Vốn',
            'slug' => 'day-con-lam-giau-2',
            'image' => 'images/books/day-con-lam-giau-2-back.jpg',
            'short_description' => 'Làm thế nào để tiền đẻ ra tiền?',
            'description' => 'Tập tiếp theo đi sâu vào việc quản lý dòng tiền và phân biệt rõ ràng 4 nhóm người làm ra tiền trong xã hội (Kim tứ đồ).',
            'price' => 110000,
            'sale_price' => 95000,
            'quantity' => 400,
            'sold_quantity' => 11000,
            'avg_rating' => 4.7,
            'total_reviews' => 1800,
            'category_id' => 2, // Kinh Tế
            'author_id' => 10,  // Robert Kiyosaki (Re-use)
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 17. Cho Tôi Xin Một Vé Đi Tuổi Thơ (VĂN HỌC - THIẾU NHI/NGƯỜI LỚN)
        Book::create([
            'name' => 'Cho Tôi Xin Một Vé Đi Tuổi Thơ',
            'slug' => 'cho-toi-xin-mot-ve-di-tuoi-tho',
            'image' => 'images/books/ve-di-tuoi-tho-back.jpg',
            'short_description' => 'Cuốn sách bán chạy nhất năm của Nguyễn Nhật Ánh.',
            'description' => 'Truyện dài mời người lớn quay lại thế giới trẻ thơ 8 tuổi, để vừa cười vui vừa chiêm nghiệm về cuộc sống.',
            'price' => 85000,
            'sale_price' => null,
            'quantity' => 500,
            'sold_quantity' => 25000, // Best seller
            'avg_rating' => 4.9,
            'total_reviews' => 5000,
            'category_id' => 1, // Văn Học
            'author_id' => 1,   // Nguyễn Nhật Ánh (Re-use)
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 18. Harry Potter và Tên Tù Nhân Ngục Azkaban (VĂN HỌC - FANTASY)
        Book::create([
            'name' => 'Harry Potter và Tên Tù Nhân Ngục Azkaban',
            'slug' => 'harry-potter-3',
            'image' => 'images/books/harry-potter-3-back.jpg',
            'short_description' => 'Tập 3 đen tối và hấp dẫn hơn.',
            'description' => 'Harry đối mặt với Sirius Black - tên tù nhân vượt ngục nguy hiểm, và khám phá ra những bí mật về cha mẹ mình.',
            'price' => 180000,
            'sale_price' => 165000,
            'quantity' => 150,
            'sold_quantity' => 8200,
            'avg_rating' => 4.9,
            'total_reviews' => 1600,
            'category_id' => 1, // Văn Học
            'author_id' => 2,   // J.K. Rowling (Re-use)
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 19. Ta Ba Lô Trên Đất Á (DU KÝ - KỸ NĂNG)
        Book::create([
            'name' => 'Ta Ba Lô Trên Đất Á',
            'slug' => 'ta-ba-lo-tren-dat-a',
            'image' => 'images/books/ta-ba-lo-back.jpg',
            'short_description' => 'Hành trình bụi bặm của một cô gái trẻ.',
            'description' => 'Cuốn sách kể về những trải nghiệm du lịch bụi thú vị và đầy cảm hứng của Rosie Nguyễn trước khi viết "Tuổi trẻ đáng giá bao nhiêu".',
            'price' => 70000,
            'sale_price' => 55000,
            'quantity' => 100,
            'sold_quantity' => 2000,
            'avg_rating' => 4.3,
            'total_reviews' => 300,
            'category_id' => 4, // Kỹ Năng / Du ký
            'author_id' => 3,   // Rosie Nguyễn (Re-use)
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 20. Verónica Quyết Chết (TIỂU THUYẾT TÂM LÝ)
        Book::create([
            'name' => 'Verónica Quyết Chết',
            'slug' => 'veronica-quyet-chet',
            'image' => 'images/books/veronica-quyet-chet-back.jpg',
            'short_description' => 'Hành trình tìm lại ý nghĩa cuộc sống từ cái chết.',
            'description' => 'Câu chuyện về cô gái trẻ Verónica muốn tự tử nhưng thất bại, và trong những ngày cuối đời tại bệnh viện tâm thần, cô mới thực sự học cách sống.',
            'price' => 88000,
            'sale_price' => null,
            'quantity' => 120,
            'sold_quantity' => 4000,
            'avg_rating' => 4.6,
            'total_reviews' => 750,
            'category_id' => 1, // Văn Học
            'author_id' => 4,   // Paulo Coelho (Re-use)
            'is_active' => true,
            'is_featured' => false,
        ]);
        
    }
}
