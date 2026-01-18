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

        // 6. Đắc Nhân Tâm (Thuộc Category 5: Tâm Lý & Kỹ Năng)
        Book::create([
            'name' => 'Đắc Nhân Tâm',
            'slug' => 'dac-nhan-tam',
            'image' => 'images/books/dac-nhan-tam-back.jpg',
            'short_description' => 'Nghệ thuật thu phục lòng người.',
            'description' => 'Cuốn sách nổi tiếng nhất mọi thời đại về nghệ thuật giao tiếp và ứng xử, giúp bạn thành công trong cả công việc lẫn cuộc sống.',
            'price' => 86000,
            'sale_price' => 65000,
            'quantity' => 1000,
            'sold_quantity' => 50000,
            'avg_rating' => 5,
            'total_reviews' => 8900,
            'category_id' => 5, // <--- Cập nhật: Tâm Lý & Kỹ Năng
            'author_id' => 6,   // Dale Carnegie
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 7. Cánh Đồng Bất Tận (Thuộc Category 1: Văn Học)
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
            'category_id' => 1, // <--- Văn Học
            'author_id' => 7,   // Nguyễn Ngọc Tư
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 8. Rừng Na Uy (Thuộc Category 1: Văn Học)
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
            'category_id' => 1, // <--- Văn Học
            'author_id' => 8,   // Haruki Murakami
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 9. Số Đỏ (Thuộc Category 1: Văn Học)
        Book::create([
            'name' => 'Số Đỏ',
            'slug' => 'so-do',
            'image' => 'images/books/so-do-back.jpg',
            'short_description' => 'Kiệt tác trào phúng của Vũ Trọng Phụng.',
            'description' => 'Hành trình thăng tiến nực cười của Xuân Tóc Đỏ, phơi bày bộ mặt giả tạo của xã hội tư sản Âu hóa.',
            'price' => 60000,
            'sale_price' => 45000,
            'quantity' => 600,
            'sold_quantity' => 4500,
            'avg_rating' => 4.8,
            'total_reviews' => 1200,
            'category_id' => 1, // <--- Văn Học
            'author_id' => 9,   // Vũ Trọng Phụng
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 10. Dạy Con Làm Giàu - Tập 1 (Thuộc Category 2: Kinh Tế)
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
            'category_id' => 2, // <--- Kinh Tế
            'author_id' => 10,  // Robert Kiyosaki
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 11. Mắt Biếc (Category 1: Văn Học)
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
            'category_id' => 1, // <--- Văn Học
            'author_id' => 1,   // Nguyễn Nhật Ánh
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 12. Kafka Bên Bờ Biển (Category 1: Văn Học)
        Book::create([
            'name' => 'Kafka Bên Bờ Biển',
            'slug' => 'kafka-ben-bo-bien',
            'image' => 'images/books/kafka-back.jpg',
            'short_description' => 'Một tiểu thuyết li kỳ và đầy rẫy những ẩn dụ.',
            'description' => 'Câu chuyện đan xen giữa chàng trai 15 tuổi bỏ nhà đi và ông lão Nakata biết nói chuyện với mèo.',
            'price' => 145000,
            'sale_price' => null,
            'quantity' => 80,
            'sold_quantity' => 1500,
            'avg_rating' => 4.6,
            'total_reviews' => 400,
            'category_id' => 1, // <--- Văn Học
            'author_id' => 8,   // Haruki Murakami
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 13. Quẳng Gánh Lo Đi Và Vui Sống (Category 5: Tâm Lý & Kỹ Năng)
        Book::create([
            'name' => 'Quẳng Gánh Lo Đi Và Vui Sống',
            'slug' => 'quang-ganh-lo-di',
            'image' => 'images/books/quang-ganh-lo-di-back.jpg',
            'short_description' => 'Liều thuốc tinh thần cho cuộc sống hiện đại.',
            'description' => 'Những lời khuyên thiết thực giúp bạn giảm căng thẳng, lo âu và tìm thấy niềm vui trong cuộc sống hàng ngày.',
            'price' => 76000,
            'sale_price' => 50000,
            'quantity' => 450,
            'sold_quantity' => 9000,
            'avg_rating' => 4.7,
            'total_reviews' => 1300,
            'category_id' => 5, // <--- Tâm Lý & Kỹ Năng
            'author_id' => 6,   // Dale Carnegie
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 14. Marketing 4.0 (Category 2: Kinh Tế)
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
            'category_id' => 2, // <--- Kinh Tế
            'author_id' => 5,   // Philip Kotler
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 15. Harry Potter và Phòng Chứa Bí Mật (Category 1: Văn Học)
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
            'category_id' => 1, // <--- Văn Học
            'author_id' => 2,   // J.K. Rowling
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 16. Dạy Con Làm Giàu - Tập 2 (Category 2: Kinh Tế)
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
            'category_id' => 2, // <--- Kinh Tế
            'author_id' => 10,  // Robert Kiyosaki
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 17. Cho Tôi Xin Một Vé Đi Tuổi Thơ (Category 1: Văn Học)
        Book::create([
            'name' => 'Cho Tôi Xin Một Vé Đi Tuổi Thơ',
            'slug' => 'cho-toi-xin-mot-ve-di-tuoi-tho',
            'image' => 'images/books/ve-di-tuoi-tho-back.jpg',
            'short_description' => 'Cuốn sách bán chạy nhất năm của Nguyễn Nhật Ánh.',
            'description' => 'Truyện dài mời người lớn quay lại thế giới trẻ thơ 8 tuổi, để vừa cười vui vừa chiêm nghiệm về cuộc sống.',
            'price' => 85000,
            'sale_price' => null,
            'quantity' => 500,
            'sold_quantity' => 25000,
            'avg_rating' => 4.9,
            'total_reviews' => 5000,
            'category_id' => 1, // <--- Văn Học
            'author_id' => 1,   // Nguyễn Nhật Ánh
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 18. Harry Potter và Tên Tù Nhân Ngục Azkaban (Category 1: Văn Học)
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
            'category_id' => 1, // <--- Văn Học
            'author_id' => 2,   // J.K. Rowling
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 19. Ta Ba Lô Trên Đất Á (Category 3: Kỹ Năng)
        Book::create([
            'name' => 'Ta Ba Lô Trên Đất Á',
            'slug' => 'ta-ba-lo-tren-dat-a',
            'image' => 'images/books/ta-ba-lo-back.jpg',
            'short_description' => 'Hành trình bụi bặm của một cô gái trẻ.',
            'description' => 'Cuốn sách kể về những trải nghiệm du lịch bụi thú vị và đầy cảm hứng của Rosie Nguyễn, chia sẻ kinh nghiệm và kỹ năng xê dịch.',
            'price' => 70000,
            'sale_price' => 55000,
            'quantity' => 100,
            'sold_quantity' => 2000,
            'avg_rating' => 4.3,
            'total_reviews' => 300,
            'category_id' => 3, // <--- Kỹ Năng (Phù hợp với sách du ký/kinh nghiệm)
            'author_id' => 3,   // Rosie Nguyễn
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 20. Verónica Quyết Chết (Category 1: Văn Học)
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
            'category_id' => 1, // <--- Văn Học
            'author_id' => 4,   // Paulo Coelho
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 21. Cô Gái Đến Từ Hôm Qua (Category 1: Văn Học)
        Book::create([
            'name' => 'Cô Gái Đến Từ Hôm Qua',
            'slug' => 'co-gai-den-tu-hom-qua',
            'image' => 'images/books/co-gai-den-tu-hom-qua-back.jpg',
            'short_description' => 'Mối tình học trò đầy thơ mộng và tiếc nuối.',
            'description' => 'Câu chuyện đan xen giữa quá khứ và hiện tại của anh chàng Thư thơ thẩn và cô bạn Tiểu Li, mang lại những rung động đầu đời trong trẻo.',
            'price' => 115000,
            'sale_price' => 99000,
            'quantity' => 200,
            'sold_quantity' => 15000,
            'avg_rating' => 4.8,
            'total_reviews' => 3200,
            'category_id' => 1, // <--- Văn Học
            'author_id' => 1,   // Nguyễn Nhật Ánh
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 22. Harry Potter và Chiếc Cốc Lửa (Category 1: Văn Học)
        Book::create([
            'name' => 'Harry Potter và Chiếc Cốc Lửa',
            'slug' => 'harry-potter-4',
            'image' => 'images/books/harry-potter-4-back.jpg',
            'short_description' => 'Cuộc thi đấu Tam Pháp Thuật đầy kịch tính.',
            'description' => 'Harry bất ngờ trở thành quán quân thứ tư của cuộc thi Tam Pháp Thuật và phải đối mặt với sự trở lại bằng xương bằng thịt của Chúa tể Voldemort.',
            'price' => 250000, // Sách dày nên giá cao hơn
            'sale_price' => 210000,
            'quantity' => 120,
            'sold_quantity' => 7900,
            'avg_rating' => 4.9,
            'total_reviews' => 1800,
            'category_id' => 1, // <--- Văn Học
            'author_id' => 2,   // J.K. Rowling
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 23. Doanh Nghiệp Của Thế Kỷ 21 (Category 2: Kinh Tế)
        Book::create([
            'name' => 'Doanh Nghiệp Của Thế Kỷ 21',
            'slug' => 'doanh-nghiep-cua-the-ky-21',
            'image' => 'images/books/doanh-nghiep-21-back.jpg',
            'short_description' => 'Mô hình kinh doanh mạng lưới.',
            'description' => 'Robert Kiyosaki giải thích tại sao kinh doanh theo mạng (network marketing) là mô hình kinh doanh tốt nhất trong bối cảnh kinh tế hiện đại.',
            'price' => 95000,
            'sale_price' => null,
            'quantity' => 300,
            'sold_quantity' => 5000,
            'avg_rating' => 4.2,
            'total_reviews' => 600,
            'category_id' => 2, // <--- Kinh Tế
            'author_id' => 10,  // Robert Kiyosaki
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 24. 1Q84 - Tập 1 (Category 1: Văn Học)
        Book::create([
            'name' => '1Q84 - Tập 1',
            'slug' => '1q84-tap-1',
            'image' => 'images/books/1q84-1-back.jpg',
            'short_description' => 'Thế giới song song đầy bí ẩn năm 1984.',
            'description' => 'Một câu chuyện tình yêu dị biệt, một thế giới với hai mặt trăng và những thế lực đen tối ẩn mình, kiệt tác đồ sộ của Murakami.',
            'price' => 180000,
            'sale_price' => 150000,
            'quantity' => 90,
            'sold_quantity' => 2500,
            'avg_rating' => 4.5,
            'total_reviews' => 450,
            'category_id' => 1, // <--- Văn Học
            'author_id' => 8,   // Haruki Murakami
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 25. Mình Nói Gì Khi Nói Về Hạnh Phúc (Category 5: Tâm Lý & Kỹ Năng)
        Book::create([
            'name' => 'Mình Nói Gì Khi Nói Về Hạnh Phúc',
            'slug' => 'minh-noi-gi-khi-noi-ve-hanh-phuc',
            'image' => 'images/books/noi-ve-hanh-phuc-back.jpg',
            'short_description' => 'Góc nhìn mới mẻ về hạnh phúc của người trẻ.',
            'description' => 'Không phải là những giáo điều sáo rỗng, cuốn sách là những trải nghiệm chân thật của Rosie Nguyễn về cách tìm kiếm niềm vui tự thân.',
            'price' => 82000,
            'sale_price' => 60000,
            'quantity' => 150,
            'sold_quantity' => 4200,
            'avg_rating' => 4.6,
            'total_reviews' => 900,
            'category_id' => 5, // <--- Tâm Lý & Kỹ Năng
            'author_id' => 3,   // Rosie Nguyễn
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 26. Giông Tố (Category 1: Văn Học)
        Book::create([
            'name' => 'Giông Tố',
            'slug' => 'giong-to',
            'image' => 'images/books/giong-to-back.jpg',
            'short_description' => 'Bức tranh xã hội Việt Nam thời Pháp thuộc.',
            'description' => 'Một trong những tác phẩm hiện thực phê phán xuất sắc nhất của Vũ Trọng Phụng, phản ánh sự tha hóa của con người dưới sức mạnh của đồng tiền.',
            'price' => 68000,
            'sale_price' => 55000,
            'quantity' => 100,
            'sold_quantity' => 3500,
            'avg_rating' => 4.6,
            'total_reviews' => 500,
            'category_id' => 1, // <--- Văn Học
            'author_id' => 9,   // Vũ Trọng Phụng
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 27. Thấu Hiểu Tiếp Thị Từ A Đến Z (Category 2: Kinh Tế)
        Book::create([
            'name' => 'Thấu Hiểu Tiếp Thị Từ A Đến Z',
            'slug' => 'thau-hieu-tiep-thi-tu-a-den-z',
            'image' => 'images/books/thau-hieu-tiep-thi-back.jpg',
            'short_description' => '80 khái niệm cốt lõi của Marketing.',
            'description' => 'Philip Kotler giải thích ngắn gọn và súc tích các khái niệm quan trọng nhất trong Marketing, từ thương hiệu, định vị đến quan hệ công chúng.',
            'price' => 135000,
            'sale_price' => 110000,
            'quantity' => 250,
            'sold_quantity' => 6000,
            'avg_rating' => 4.5,
            'total_reviews' => 850,
            'category_id' => 2, // <--- Kinh Tế
            'author_id' => 5,   // Philip Kotler
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 28. Harry Potter và Hội Phượng Hoàng (Category 1: Văn Học)
        Book::create([
            'name' => 'Harry Potter và Hội Phượng Hoàng',
            'slug' => 'harry-potter-5',
            'image' => 'images/books/harry-potter-5-back.jpg',
            'short_description' => 'Tập dài nhất trong series Harry Potter.',
            'description' => 'Harry chịu đựng sự cô lập, sự can thiệp của Bộ Pháp Thuật vào Hogwarts và thành lập Quân đoàn Dumbledore để chuẩn bị cho cuộc chiến.',
            'price' => 280000, // Sách rất dày
            'sale_price' => 240000,
            'quantity' => 140,
            'sold_quantity' => 7500,
            'avg_rating' => 4.8,
            'total_reviews' => 1700,
            'category_id' => 1, // <--- Văn Học
            'author_id' => 2,   // J.K. Rowling
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 29. Tôi Thấy Hoa Vàng Trên Cỏ Xanh (Category 1: Văn Học)
        Book::create([
            'name' => 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh',
            'slug' => 'toi-thay-hoa-vang-tren-co-xanh',
            'image' => 'images/books/hoa-vang-co-xanh-back.jpg',
            'short_description' => 'Vé về tuổi thơ qua lăng kính trong trẻo.',
            'description' => 'Câu chuyện về tình anh em, tình bạn và những rung động đầu đời của cậu bé Thiều ở một làng quê nghèo, đã được chuyển thể thành phim rất thành công.',
            'price' => 125000,
            'sale_price' => 95000,
            'quantity' => 300,
            'sold_quantity' => 18000,
            'avg_rating' => 4.9,
            'total_reviews' => 4200,
            'category_id' => 1, // <--- Văn Học
            'author_id' => 1,   // Nguyễn Nhật Ánh
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 30. Khói Trời Lộng Lẫy (Category 1: Văn Học)
        Book::create([
            'name' => 'Khói Trời Lộng Lẫy',
            'slug' => 'khoi-troi-long-lay',
            'image' => 'images/books/khoi-troi-long-lay-back.jpg',
            'short_description' => 'Tập truyện ngắn đầy ám ảnh của Nguyễn Ngọc Tư.',
            'description' => 'Những phận người nhỏ bé, những mối tình dang dở và nỗi buồn man mác đặc trưng của miền sông nước được khắc họa tinh tế.',
            'price' => 80000,
            'sale_price' => null,
            'quantity' => 80,
            'sold_quantity' => 2200,
            'avg_rating' => 4.4,
            'total_reviews' => 350,
            'category_id' => 1, // <--- Văn Học
            'author_id' => 7,   // Nguyễn Ngọc Tư
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 31. Nghĩ Giàu Làm Giàu (Category 5: Tâm Lý & Kỹ Năng)
        Book::create([
            'name' => 'Nghĩ Giàu Làm Giàu',
            'slug' => 'nghi-giau-lam-giau',
            'image' => 'images/books/nghi-giau-lam-giau-back.jpg',
            'short_description' => 'Cuốn sách chỉ dẫn làm giàu chạy nhất mọi thời đại.',
            'description' => 'Napoleon Hill đúc kết 13 nguyên tắc thành công từ việc nghiên cứu cuộc đời của những người giàu có nhất thế giới, giúp bạn khai phá sức mạnh tư duy.',
            'price' => 110000,
            'sale_price' => 89000,
            'quantity' => 500,
            'sold_quantity' => 30000,
            'avg_rating' => 4.8,
            'total_reviews' => 5200,
            'category_id' => 5, // <--- Tâm Lý & Kỹ Năng (Tư duy làm giàu)
            'author_id' => 11,  // Napoleon Hill
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 32. Dế Mèn Phiêu Lưu Ký (Category 1: Văn Học)
        Book::create([
            'name' => 'Dế Mèn Phiêu Lưu Ký',
            'slug' => 'de-men-phieu-luu-ky',
            'image' => 'images/books/de-men-back.jpg',
            'short_description' => 'Kiệt tác văn học thiếu nhi Việt Nam.',
            'description' => 'Hành trình phiêu lưu của chú Dế Mèn qua thế giới loài vật sinh động, bài học về tình bạn và lòng nhân ái thấm đẫm tính nhân văn.',
            'price' => 50000,
            'sale_price' => 35000, // Giá rẻ phù hợp học sinh
            'quantity' => 400,
            'sold_quantity' => 12000,
            'avg_rating' => 4.9,
            'total_reviews' => 2100,
            'category_id' => 1, // <--- Văn Học
            'author_id' => 12,  // Tô Hoài
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 33. Sherlock Holmes Toàn Tập - Tập 1 (Category 1: Văn Học)
        Book::create([
            'name' => 'Sherlock Holmes Toàn Tập - Tập 1',
            'slug' => 'sherlock-holmes-1',
            'image' => 'images/books/sherlock-holmes-1-back.jpg',
            'short_description' => 'Tượng đài của dòng văn học trinh thám.',
            'description' => 'Những vụ án hóc búa được giải mã bởi óc quan sát và tư duy logic siêu phàm của thám tử Sherlock Holmes và bác sĩ Watson.',
            'price' => 165000,
            'sale_price' => 135000,
            'quantity' => 200,
            'sold_quantity' => 6500,
            'avg_rating' => 4.8,
            'total_reviews' => 1500,
            'category_id' => 1, // <--- Văn Học (Trinh thám)
            'author_id' => 13,  // Arthur Conan Doyle
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 34. Tuyển Tập Nam Cao: Chí Phèo (Category 1: Văn Học)
        Book::create([
            'name' => 'Tuyển Tập Nam Cao: Chí Phèo',
            'slug' => 'chi-pheo-nam-cao',
            'image' => 'images/books/chi-pheo-back.jpg',
            'short_description' => 'Đỉnh cao của văn học hiện thực phê phán.',
            'description' => 'Tập hợp những truyện ngắn xuất sắc nhất của Nam Cao như Chí Phèo, Lão Hạc, Đời Thừa... khắc họa nỗi đau của người nông dân và trí thức nghèo.',
            'price' => 95000,
            'sale_price' => null,
            'quantity' => 150,
            'sold_quantity' => 4000,
            'avg_rating' => 4.7,
            'total_reviews' => 800,
            'category_id' => 1, // <--- Văn Học
            'author_id' => 14,  // Nam Cao
            'is_active' => true,
            'is_featured' => true,
        ]);

        // 35. IT - Gã Hề Ma Quái (Category 1: Văn Học)
        Book::create([
            'name' => 'IT - Gã Hề Ma Quái',
            'slug' => 'it-ga-he-ma-quai',
            'image' => 'images/books/it-stephen-king-back.jpg',
            'short_description' => 'Nỗi ám ảnh kinh hoàng nhất mọi thời đại.',
            'description' => 'Nhóm trẻ "The Losers Club" đối mặt với thực thể tà ác mang hình dạng chú hề Pennywise. Một tác phẩm kinh dị kinh điển của Stephen King.',
            'price' => 220000, // Sách dày
            'sale_price' => 199000,
            'quantity' => 80,
            'sold_quantity' => 1800,
            'avg_rating' => 4.6,
            'total_reviews' => 500,
            'category_id' => 1, // <--- Văn Học (Kinh dị)
            'author_id' => 15,  // Stephen King
            'is_active' => true,
            'is_featured' => false,
        ]);
        
    }
}

