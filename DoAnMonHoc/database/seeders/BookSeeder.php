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
        Book::updateOrCreate(
            ['slug' => 'nha-gia-kim'],
            [
                'name' => 'Nhà Giả Kim',
                'image' => 'images/books/nha-gia-kim-back.jpg',
                'short_description' => 'Cuốn sách bán chạy chỉ sau Kinh Thánh.',
                'description' => 'Hành trình đi tìm kho báu của chàng chăn cừu Santiago, dạy chúng ta về ước mơ và định mệnh.',
                'price' => 79000,
                'sale_price' => 69000,
                'quantity' => 100,
                'sold_quantity' => 15000,
                'avg_rating' => 4.8,
                'total_reviews' => 200,
                'category_id' => 1,
                'author_id' => 4,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        Book::updateOrCreate(
            ['slug' => 'marketing-5-0'],
            [
                'name' => 'Marketing 5.0: Công nghệ vị nhân sinh',
                'image' => 'images/books/marketing-back.jpg',
                'short_description' => 'Cập nhật xu hướng Marketing trong kỷ nguyên AI.',
                'description' => 'Philip Kotler mang đến góc nhìn mới về sự kết hợp giữa công nghệ và yếu tố con người.',
                'price' => 199000,
                'sale_price' => null,
                'quantity' => 500,
                'sold_quantity' => 10,
                'avg_rating' => 0,
                'total_reviews' => 0,
                'category_id' => 2,
                'author_id' => 5,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        Book::updateOrCreate(
            ['slug' => 'harry-potter-1'],
            [
                'name' => 'Harry Potter và Hòn Đá Phù Thủy',
                'image' => 'images/books/harry-potter-back.jpg',
                'short_description' => 'Khởi đầu huyền thoại cậu bé phù thủy.',
                'description' => 'Cuốn sách đưa người đọc vào thế giới phép thuật đầy màu sắc tại Hogwarts.',
                'price' => 150000,
                'sale_price' => 120000,
                'quantity' => 200,
                'sold_quantity' => 9800,
                'avg_rating' => 4.8,
                'total_reviews' => 1500,
                'category_id' => 1,
                'author_id' => 2,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        Book::updateOrCreate(
            ['slug' => 'tuoi-tre-dang-gia-bao-nhieu'],
            [
                'name' => 'Tuổi Trẻ Đáng Giá Bao Nhiêu',
                'image' => 'images/books/tuoi-tre-back.jpg',
                'short_description' => 'Cuốn sách gối đầu giường của người trẻ Việt.',
                'description' => 'Bạn hối tiếc vì không nắm bắt lấy một cơ hội nào đó...',
                'price' => 89000,
                'sale_price' => null,
                'quantity' => 100,
                'sold_quantity' => 12500,
                'avg_rating' => 4.9,
                'total_reviews' => 3000,
                'category_id' => 4,
                'author_id' => 3,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        Book::updateOrCreate(
            ['slug' => 'dac-nhan-tam'],
            [
                'name' => 'Đắc Nhân Tâm',
                'image' => 'images/books/dac-nhan-tam-back.jpg',
                'short_description' => 'Nghệ thuật thu phục lòng người.',
                'description' => 'Cuốn sách nổi tiếng nhất mọi thời đại về nghệ thuật giao tiếp.',
                'price' => 86000,
                'sale_price' => 65000,
                'quantity' => 1000,
                'sold_quantity' => 50000,
                'avg_rating' => 5.0,
                'total_reviews' => 8900,
                'category_id' => 5,
                'author_id' => 6,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        Book::updateOrCreate(
            ['slug' => 'canh-dong-bat-tan'],
            [
                'name' => 'Cánh Đồng Bất Tận',
                'image' => 'images/books/canh-dong-bat-tan-back.jpg',
                'short_description' => 'Tác phẩm gây tiếng vang lớn của văn học Việt.',
                'description' => 'Câu chuyện day dứt về phận người trôi nổi miền Tây.',
                'price' => 75000,
                'sale_price' => null,
                'quantity' => 250,
                'sold_quantity' => 3200,
                'avg_rating' => 4.5,
                'total_reviews' => 600,
                'category_id' => 1,
                'author_id' => 7,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        Book::updateOrCreate(
            ['slug' => 'kafka-ben-bo-bien'],
            [
                'name' => 'Kafka Bên Bờ Biển',
                'image' => 'images/books/kafka-back.jpg',
                'short_description' => 'Một tiểu thuyết li kỳ và đầy rẫy những ẩn dụ.',
                'description' => 'Câu chuyện đan xen giữa Kafka và ông lão Nakata.',
                'price' => 145000,
                'sale_price' => null,
                'quantity' => 80,
                'sold_quantity' => 1500,
                'avg_rating' => 4.6,
                'total_reviews' => 400,
                'category_id' => 1,
                'author_id' => 8,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

                // 13. Quẳng Gánh Lo Đi Và Vui Sống
        Book::updateOrCreate(
            ['slug' => 'quang-ganh-lo-di'],
            [
                'name' => 'Quẳng Gánh Lo Đi Và Vui Sống',
                'image' => 'images/books/quang-ganh-lo-di-back.jpg',
                'short_description' => 'Liều thuốc tinh thần cho cuộc sống hiện đại.',
                'description' => 'Những lời khuyên thiết thực giúp bạn giảm căng thẳng, lo âu và tìm thấy niềm vui trong cuộc sống hàng ngày.',
                'price' => 76000,
                'sale_price' => 50000,
                'quantity' => 450,
                'sold_quantity' => 9000,
                'avg_rating' => 4.7,
                'total_reviews' => 1300,
                'category_id' => 5,
                'author_id' => 6,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        // 14. Marketing 4.0
        Book::updateOrCreate(
            ['slug' => 'marketing-4-0'],
            [
                'name' => 'Marketing 4.0: Dịch chuyển từ truyền thống sang công nghệ số',
                'image' => 'images/books/marketing-4-0-back.jpg',
                'short_description' => 'Nền tảng trước khi bước vào Marketing 5.0.',
                'description' => 'Hướng dẫn các doanh nghiệp chuyển đổi số và tiếp cận khách hàng trong kỷ nguyên kết nối.',
                'price' => 115000,
                'sale_price' => 90000,
                'quantity' => 200,
                'sold_quantity' => 3000,
                'avg_rating' => 4.4,
                'total_reviews' => 550,
                'category_id' => 2,
                'author_id' => 5,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 15. Harry Potter và Phòng Chứa Bí Mật
        Book::updateOrCreate(
            ['slug' => 'harry-potter-2'],
            [
                'name' => 'Harry Potter và Phòng Chứa Bí Mật',
                'image' => 'images/books/harry-potter-2-back.jpg',
                'short_description' => 'Năm học thứ hai đầy nguy hiểm tại Hogwarts.',
                'description' => 'Harry trở lại trường và đối mặt với thế lực hắc ám đang tấn công các học sinh gốc Muggle.',
                'price' => 160000,
                'sale_price' => 140000,
                'quantity' => 180,
                'sold_quantity' => 8500,
                'avg_rating' => 4.8,
                'total_reviews' => 1400,
                'category_id' => 1,
                'author_id' => 2,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        // 16. Dạy Con Làm Giàu - Tập 2
        Book::updateOrCreate(
            ['slug' => 'day-con-lam-giau-2'],
            [
                'name' => 'Dạy Con Làm Giàu - Tập 2: Sử Dụng Đồng Vốn',
                'image' => 'images/books/day-con-lam-giau-2-back.jpg',
                'short_description' => 'Làm thế nào để tiền đẻ ra tiền?',
                'description' => 'Tập tiếp theo đi sâu vào việc quản lý dòng tiền và phân biệt rõ ràng 4 nhóm người làm ra tiền (Kim tứ đồ).',
                'price' => 110000,
                'sale_price' => 95000,
                'quantity' => 400,
                'sold_quantity' => 11000,
                'avg_rating' => 4.7,
                'total_reviews' => 1800,
                'category_id' => 2,
                'author_id' => 10,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 17. Cho Tôi Xin Một Vé Đi Tuổi Thơ
        Book::updateOrCreate(
            ['slug' => 'cho-toi-xin-mot-ve-di-tuoi-tho'],
            [
                'name' => 'Cho Tôi Xin Một Vé Đi Tuổi Thơ',
                'image' => 'images/books/ve-di-tuoi-tho-back.jpg',
                'short_description' => 'Cuốn sách bán chạy nhất năm của Nguyễn Nhật Ánh.',
                'description' => 'Truyện dài mời người lớn quay lại thế giới trẻ thơ 8 tuổi.',
                'price' => 85000,
                'sale_price' => null,
                'quantity' => 500,
                'sold_quantity' => 25000,
                'avg_rating' => 4.9,
                'total_reviews' => 5000,
                'category_id' => 1,
                'author_id' => 1,
                'is_active' => true,
                'is_featured' => true,
            ]
        );


                // 18. Harry Potter và Tên Tù Nhân Ngục Azkaban
        Book::updateOrCreate(
            ['slug' => 'harry-potter-3'],
            [
                'name' => 'Harry Potter và Tên Tù Nhân Ngục Azkaban',
                'image' => 'images/books/harry-potter-3-back.jpg',
                'short_description' => 'Tập 3 đen tối và hấp dẫn hơn.',
                'description' => 'Harry đối mặt với Sirius Black - tên tù nhân vượt ngục nguy hiểm, và khám phá ra những bí mật về cha mẹ mình.',
                'price' => 180000,
                'sale_price' => 165000,
                'quantity' => 150,
                'sold_quantity' => 8200,
                'avg_rating' => 4.9,
                'total_reviews' => 1600,
                'category_id' => 1,
                'author_id' => 2,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        // 19. Ta Ba Lô Trên Đất Á
        Book::updateOrCreate(
            ['slug' => 'ta-ba-lo-tren-dat-a'],
            [
                'name' => 'Ta Ba Lô Trên Đất Á',
                'image' => 'images/books/ta-ba-lo-back.jpg',
                'short_description' => 'Hành trình bụi bặm của một cô gái trẻ.',
                'description' => 'Cuốn sách kể về những trải nghiệm du lịch bụi thú vị và đầy cảm hứng của Rosie Nguyễn.',
                'price' => 70000,
                'sale_price' => 55000,
                'quantity' => 100,
                'sold_quantity' => 2000,
                'avg_rating' => 4.3,
                'total_reviews' => 300,
                'category_id' => 3,
                'author_id' => 3,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 20. Verónica Quyết Chết
        Book::updateOrCreate(
            ['slug' => 'veronica-quyet-chet'],
            [
                'name' => 'Verónica Quyết Chết',
                'image' => 'images/books/veronica-quyet-chet-back.jpg',
                'short_description' => 'Hành trình tìm lại ý nghĩa cuộc sống từ cái chết.',
                'description' => 'Câu chuyện về cô gái trẻ Verónica muốn tự tử nhưng thất bại, và trong những ngày cuối đời tại bệnh viện tâm thần.',
                'price' => 88000,
                'sale_price' => null,
                'quantity' => 120,
                'sold_quantity' => 4000,
                'avg_rating' => 4.6,
                'total_reviews' => 750,
                'category_id' => 1,
                'author_id' => 4,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 21. Cô Gái Đến Từ Hôm Qua
        Book::updateOrCreate(
            ['slug' => 'co-gai-den-tu-hom-qua'],
            [
                'name' => 'Cô Gái Đến Từ Hôm Qua',
                'image' => 'images/books/co-gai-den-tu-hom-qua-back.jpg',
                'short_description' => 'Mối tình học trò đầy thơ mộng và tiếc nuối.',
                'description' => 'Câu chuyện đan xen giữa quá khứ và hiện tại của anh chàng Thư và cô bạn Tiểu Li.',
                'price' => 115000,
                'sale_price' => 99000,
                'quantity' => 200,
                'sold_quantity' => 15000,
                'avg_rating' => 4.8,
                'total_reviews' => 3200,
                'category_id' => 1,
                'author_id' => 1,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        // 22. Harry Potter và Chiếc Cốc Lửa
        Book::updateOrCreate(
            ['slug' => 'harry-potter-4'],
            [
                'name' => 'Harry Potter và Chiếc Cốc Lửa',
                'image' => 'images/books/harry-potter-4-back.jpg',
                'short_description' => 'Cuộc thi đấu Tam Pháp Thuật đầy kịch tính.',
                'description' => 'Harry bất ngờ trở thành quán quân thứ tư của cuộc thi Tam Pháp Thuật.',
                'price' => 250000,
                'sale_price' => 210000,
                'quantity' => 120,
                'sold_quantity' => 7900,
                'avg_rating' => 4.9,
                'total_reviews' => 1800,
                'category_id' => 1,
                'author_id' => 2,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        // 23. Doanh Nghiệp Của Thế Kỷ 21
        Book::updateOrCreate(
            ['slug' => 'doanh-nghiep-cua-the-ky-21'],
            [
                'name' => 'Doanh Nghiệp Của Thế Kỷ 21',
                'image' => 'images/books/doanh-nghiep-21-back.jpg',
                'short_description' => 'Mô hình kinh doanh mạng lưới.',
                'description' => 'Robert Kiyosaki giải thích vì sao Network Marketing là mô hình kinh doanh hiệu quả.',
                'price' => 95000,
                'sale_price' => null,
                'quantity' => 300,
                'sold_quantity' => 5000,
                'avg_rating' => 4.2,
                'total_reviews' => 600,
                'category_id' => 2,
                'author_id' => 10,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 24. 1Q84 - Tập 1
        Book::updateOrCreate(
            ['slug' => '1q84-tap-1'],
            [
                'name' => '1Q84 - Tập 1',
                'image' => 'images/books/1q84-1-back.jpg',
                'short_description' => 'Thế giới song song đầy bí ẩn năm 1984.',
                'description' => 'Một câu chuyện tình yêu dị biệt, một thế giới với hai mặt trăng.',
                'price' => 180000,
                'sale_price' => 150000,
                'quantity' => 90,
                'sold_quantity' => 2500,
                'avg_rating' => 4.5,
                'total_reviews' => 450,
                'category_id' => 1,
                'author_id' => 8,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 25. Mình Nói Gì Khi Nói Về Hạnh Phúc
        Book::updateOrCreate(
            ['slug' => 'minh-noi-gi-khi-noi-ve-hanh-phuc'],
            [
                'name' => 'Mình Nói Gì Khi Nói Về Hạnh Phúc',
                'image' => 'images/books/noi-ve-hanh-phuc-back.jpg',
                'short_description' => 'Góc nhìn mới mẻ về hạnh phúc của người trẻ.',
                'description' => 'Không phải là những giáo điều sáo rỗng, cuốn sách là những trải nghiệm chân thật của Rosie Nguyễn về cách tìm kiếm niềm vui tự thân.',
                'price' => 82000,
                'sale_price' => 60000,
                'quantity' => 150,
                'sold_quantity' => 4200,
                'avg_rating' => 4.6,
                'total_reviews' => 900,
                'category_id' => 5,
                'author_id' => 3,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        // 26. Giông Tố
        Book::updateOrCreate(
            ['slug' => 'giong-to'],
            [
                'name' => 'Giông Tố',
                'image' => 'images/books/giong-to-back.jpg',
                'short_description' => 'Bức tranh xã hội Việt Nam thời Pháp thuộc.',
                'description' => 'Một trong những tác phẩm hiện thực phê phán xuất sắc nhất của Vũ Trọng Phụng.',
                'price' => 68000,
                'sale_price' => 55000,
                'quantity' => 100,
                'sold_quantity' => 3500,
                'avg_rating' => 4.6,
                'total_reviews' => 500,
                'category_id' => 1,
                'author_id' => 9,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 27. Thấu Hiểu Tiếp Thị Từ A Đến Z
        Book::updateOrCreate(
            ['slug' => 'thau-hieu-tiep-thi-tu-a-den-z'],
            [
                'name' => 'Thấu Hiểu Tiếp Thị Từ A Đến Z',
                'image' => 'images/books/thau-hieu-tiep-thi-back.jpg',
                'short_description' => '80 khái niệm cốt lõi của Marketing.',
                'description' => 'Philip Kotler giải thích ngắn gọn và súc tích các khái niệm quan trọng nhất trong Marketing.',
                'price' => 135000,
                'sale_price' => 110000,
                'quantity' => 250,
                'sold_quantity' => 6000,
                'avg_rating' => 4.5,
                'total_reviews' => 850,
                'category_id' => 2,
                'author_id' => 5,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 28. Harry Potter và Hội Phượng Hoàng
        Book::updateOrCreate(
            ['slug' => 'harry-potter-5'],
            [
                'name' => 'Harry Potter và Hội Phượng Hoàng',
                'image' => 'images/books/harry-potter-5-back.jpg',
                'short_description' => 'Tập dài nhất trong series Harry Potter.',
                'description' => 'Harry chịu đựng sự cô lập và thành lập Quân đoàn Dumbledore.',
                'price' => 280000,
                'sale_price' => 240000,
                'quantity' => 140,
                'sold_quantity' => 7500,
                'avg_rating' => 4.8,
                'total_reviews' => 1700,
                'category_id' => 1,
                'author_id' => 2,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        // 29. Tôi Thấy Hoa Vàng Trên Cỏ Xanh
        Book::updateOrCreate(
            ['slug' => 'toi-thay-hoa-vang-tren-co-xanh'],
            [
                'name' => 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh',
                'image' => 'images/books/hoa-vang-co-xanh-back.jpg',
                'short_description' => 'Vé về tuổi thơ qua lăng kính trong trẻo.',
                'description' => 'Câu chuyện về tình anh em và tuổi thơ miền quê nghèo.',
                'price' => 125000,
                'sale_price' => 95000,
                'quantity' => 300,
                'sold_quantity' => 18000,
                'avg_rating' => 4.9,
                'total_reviews' => 4200,
                'category_id' => 1,
                'author_id' => 1,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        // 30. Khói Trời Lộng Lẫy
        Book::updateOrCreate(
            ['slug' => 'khoi-troi-long-lay'],
            [
                'name' => 'Khói Trời Lộng Lẫy',
                'image' => 'images/books/khoi-troi-long-lay-back.jpg',
                'short_description' => 'Tập truyện ngắn đầy ám ảnh.',
                'description' => 'Những phận người nhỏ bé và nỗi buồn đặc trưng miền sông nước.',
                'price' => 80000,
                'sale_price' => null,
                'quantity' => 80,
                'sold_quantity' => 2200,
                'avg_rating' => 4.4,
                'total_reviews' => 350,
                'category_id' => 1,
                'author_id' => 7,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 31. Nghĩ Giàu Làm Giàu
        Book::updateOrCreate(
            ['slug' => 'nghi-giau-lam-giau'],
            [
                'name' => 'Nghĩ Giàu Làm Giàu',
                'image' => 'images/books/nghi-giau-lam-giau-back.jpg',
                'short_description' => 'Cuốn sách chỉ dẫn làm giàu chạy nhất mọi thời đại.',
                'description' => 'Napoleon Hill đúc kết 13 nguyên tắc thành công.',
                'price' => 110000,
                'sale_price' => 89000,
                'quantity' => 500,
                'sold_quantity' => 30000,
                'avg_rating' => 4.8,
                'total_reviews' => 5200,
                'category_id' => 5,
                'author_id' => 11,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        //////
        // 32. Dế Mèn Phiêu Lưu Ký
        Book::updateOrCreate(
            ['slug' => 'de-men-phieu-luu-ky'],
            [
                'name' => 'Dế Mèn Phiêu Lưu Ký',
                'image' => 'images/books/de-men-back.jpg',
                'short_description' => 'Kiệt tác văn học thiếu nhi Việt Nam.',
                'description' => 'Hành trình phiêu lưu của chú Dế Mèn, bài học về tình bạn và lòng nhân ái.',
                'price' => 50000,
                'sale_price' => 35000,
                'quantity' => 400,
                'sold_quantity' => 12000,
                'avg_rating' => 4.9,
                'total_reviews' => 2100,
                'category_id' => 1,
                'author_id' => 12,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        // 33. Sherlock Holmes Toàn Tập - Tập 1
        Book::updateOrCreate(
            ['slug' => 'sherlock-holmes-1'],
            [
                'name' => 'Sherlock Holmes Toàn Tập - Tập 1',
                'image' => 'images/books/sherlock-holmes-1-back.jpg',
                'short_description' => 'Tượng đài của dòng văn học trinh thám.',
                'description' => 'Những vụ án hóc búa của Sherlock Holmes và bác sĩ Watson.',
                'price' => 165000,
                'sale_price' => 135000,
                'quantity' => 200,
                'sold_quantity' => 6500,
                'avg_rating' => 4.8,
                'total_reviews' => 1500,
                'category_id' => 1,
                'author_id' => 13,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 34. Tuyển Tập Nam Cao: Chí Phèo
        Book::updateOrCreate(
            ['slug' => 'chi-pheo-nam-cao'],
            [
                'name' => 'Tuyển Tập Nam Cao: Chí Phèo',
                'image' => 'images/books/chi-pheo-back.jpg',
                'short_description' => 'Đỉnh cao văn học hiện thực phê phán.',
                'description' => 'Tập hợp các truyện ngắn tiêu biểu của Nam Cao.',
                'price' => 95000,
                'sale_price' => null,
                'quantity' => 150,
                'sold_quantity' => 4000,
                'avg_rating' => 4.7,
                'total_reviews' => 800,
                'category_id' => 1,
                'author_id' => 14,
                'is_active' => true,
                'is_featured' => true,
            ]
        );

        // 35. IT - Gã Hề Ma Quái
        Book::updateOrCreate(
            ['slug' => 'it-ga-he-ma-quai'],
            [
                'name' => 'IT - Gã Hề Ma Quái',
                'image' => 'images/books/it-stephen-king-back.jpg',
                'short_description' => 'Nỗi ám ảnh kinh hoàng.',
                'description' => 'The Losers Club đối mặt với Pennywise.',
                'price' => 220000,
                'sale_price' => 199000,
                'quantity' => 80,
                'sold_quantity' => 1800,
                'avg_rating' => 4.6,
                'total_reviews' => 500,
                'category_id' => 1,
                'author_id' => 15,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 36. Dòng Sông Mất Trí Nhớ
        Book::updateOrCreate(
            ['slug' => 'dong-song-mat-tri-nho'],
            [
                'name' => 'Dòng Sông Mất Trí Nhớ',
                'image' => 'images/books/dong-song.jpg',
                'short_description' => 'Tiểu thuyết cảm xúc.',
                'description' => 'Câu chuyện ký ức và con người.',
                'price' => 88000,
                'sale_price' => null,
                'quantity' => 150,
                'sold_quantity' => 3200,
                'avg_rating' => 4.7,
                'total_reviews' => 420,
                'category_id' => 1,
                'author_id' => 1,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 37. Thành Phố Không Ngủ
        Book::updateOrCreate(
            ['slug' => 'thanh-pho-khong-ngu'],
            [
                'name' => 'Thành Phố Không Ngủ',
                'image' => 'images/books/thanh-pho.jpg',
                'short_description' => 'Tiểu thuyết đô thị.',
                'description' => 'Nhịp sống và số phận con người.',
                'price' => 99000,
                'sale_price' => 89000,
                'quantity' => 120,
                'sold_quantity' => 2800,
                'avg_rating' => 4.6,
                'total_reviews' => 380,
                'category_id' => 1,
                'author_id' => 2,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 38. Những Lá Thư Không Gửi
        Book::updateOrCreate(
            ['slug' => 'nhung-la-thu-khong-gui'],
            [
                'name' => 'Những Lá Thư Không Gửi',
                'image' => 'images/books/thu.jpg',
                'short_description' => 'Văn học lãng mạn.',
                'description' => 'Những lá thư của ký ức.',
                'price' => 75000,
                'sale_price' => null,
                'quantity' => 200,
                'sold_quantity' => 4100,
                'avg_rating' => 4.8,
                'total_reviews' => 600,
                'category_id' => 1,
                'author_id' => 3,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 39. Đêm Dài Của Gió
        Book::updateOrCreate(
            ['slug' => 'dem-dai-cua-gio'],
            [
                'name' => 'Đêm Dài Của Gió',
                'image' => 'images/books/gio.jpg',
                'short_description' => 'Tiểu thuyết tâm lý.',
                'description' => 'Hành trình vượt qua bóng tối.',
                'price' => 105000,
                'sale_price' => 95000,
                'quantity' => 100,
                'sold_quantity' => 2600,
                'avg_rating' => 4.5,
                'total_reviews' => 300,
                'category_id' => 1,
                'author_id' => 2,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 40. Người Về Từ Hư Vô
        Book::updateOrCreate(
            ['slug' => 'nguoi-ve-tu-hu-vo'],
            [
                'name' => 'Người Về Từ Hư Vô',
                'image' => 'images/books/hu-vo.jpg',
                'short_description' => 'Văn học hiện đại.',
                'description' => 'Cuộc tìm kiếm bản thân.',
                'price' => 120000,
                'sale_price' => 110000,
                'quantity' => 90,
                'sold_quantity' => 2300,
                'avg_rating' => 4.7,
                'total_reviews' => 350,
                'category_id' => 1,
                'author_id' => 1,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 41. Mùa Thu Trên Phố Nhỏ
        Book::updateOrCreate(
            ['slug' => 'mua-thu-tren-pho-nho'],
            [
                'name' => 'Mùa Thu Trên Phố Nhỏ',
                'image' => 'images/books/mua-thu.jpg',
                'short_description' => 'Truyện nhẹ nhàng.',
                'description' => 'Những cảm xúc bình dị.',
                'price' => 69000,
                'sale_price' => null,
                'quantity' => 180,
                'sold_quantity' => 5000,
                'avg_rating' => 4.9,
                'total_reviews' => 780,
                'category_id' => 1,
                'author_id' => 4,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // 42. Ký Ức Màu Tro
        Book::updateOrCreate(
            ['slug' => 'ky-uc-mau-tro'],
            [
                'name' => 'Ký Ức Màu Tro',
                'image' => 'images/books/tro.jpg',
                'short_description' => 'Tiểu thuyết nội tâm.',
                'description' => 'Hồi ức và mất mát.',
                'price' => 87000,
                'sale_price' => null,
                'quantity' => 140,
                'sold_quantity' => 3400,
                'avg_rating' => 4.6,
                'total_reviews' => 410,
                'category_id' => 1,
                'author_id' => 3,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // Căn Phòng Số 13
        Book::updateOrCreate(
            ['slug' => 'can-phong-so-13'],
            [
                'name' => 'Căn Phòng Số 13',
                'image' => 'images/books/phong-13.jpg',
                'short_description' => 'Truyện trinh thám',
                'description' => 'Bí ẩn căn phòng khép kín',
                'price' => 110000,
                'sale_price' => 99000,
                'quantity' => 110,
                'sold_quantity' => 2900,
                'avg_rating' => 4.8,
                'total_reviews' => 520,
                'category_id' => 1,
                'author_id' => 2,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // Lặng Thầm Yêu
        Book::updateOrCreate(
            ['slug' => 'lang-tham-yeu'],
            [
                'name' => 'Lặng Thầm Yêu',
                'image' => 'images/books/yeu.jpg',
                'short_description' => 'Văn học tình cảm',
                'description' => 'Một tình yêu thầm lặng',
                'price' => 65000,
                'sale_price' => null,
                'quantity' => 250,
                'sold_quantity' => 6200,
                'avg_rating' => 4.9,
                'total_reviews' => 950,
                'category_id' => 1,
                'author_id' => 4,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // Hồi Ức Sau Mưa
        Book::updateOrCreate(
            ['slug' => 'hoi-uc-sau-mua'],
            [
                'name' => 'Hồi Ức Sau Mưa',
                'image' => 'images/books/mua-ky-uc.jpg',
                'short_description' => 'Tiểu thuyết đời sống',
                'description' => 'Những ký ức sau cơn mưa',
                'price' => 90000,
                'sale_price' => null,
                'quantity' => 160,
                'sold_quantity' => 3600,
                'avg_rating' => 4.7,
                'total_reviews' => 480,
                'category_id' => 1,
                'author_id' => 1,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // ===== MARKETING – KINH DOANH =====

        // Marketing 4.0 Thực Chiến
        Book::updateOrCreate(
            ['slug' => 'marketing-4-thuc-chien'],
            [
                'name' => 'Marketing 4.0 Thực Chiến',
                'image' => 'images/books/marketing-4.jpg',
                'short_description' => 'Marketing hiện đại',
                'description' => 'Ứng dụng marketing thời số',
                'price' => 189000,
                'sale_price' => 169000,
                'quantity' => 300,
                'sold_quantity' => 1500,
                'avg_rating' => 4.6,
                'total_reviews' => 210,
                'category_id' => 2,
                'author_id' => 5,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // Tư Duy Bán Hàng Đột Phá
        Book::updateOrCreate(
            ['slug' => 'tu-duy-ban-hang-dot-pha'],
            [
                'name' => 'Tư Duy Bán Hàng Đột Phá',
                'image' => 'images/books/ban-hang.jpg',
                'short_description' => 'Kinh doanh',
                'description' => 'Chiến lược bán hàng hiệu quả',
                'price' => 159000,
                'sale_price' => null,
                'quantity' => 280,
                'sold_quantity' => 1200,
                'avg_rating' => 4.5,
                'total_reviews' => 180,
                'category_id' => 2,
                'author_id' => 6,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // Khởi Nghiệp Tinh Gọn
        Book::updateOrCreate(
            ['slug' => 'khoi-nghiep-tinh-gon'],
            [
                'name' => 'Khởi Nghiệp Tinh Gọn',
                'image' => 'images/books/startup.jpg',
                'short_description' => 'Startup',
                'description' => 'Tư duy lean startup',
                'price' => 199000,
                'sale_price' => 179000,
                'quantity' => 220,
                'sold_quantity' => 980,
                'avg_rating' => 4.7,
                'total_reviews' => 260,
                'category_id' => 2,
                'author_id' => 5,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // Nghệ Thuật Đàm Phán
        Book::updateOrCreate(
            ['slug' => 'nghe-thuat-dam-phan'],
            [
                'name' => 'Nghệ Thuật Đàm Phán',
                'image' => 'images/books/dam-phan.jpg',
                'short_description' => 'Kỹ năng',
                'description' => 'Đàm phán trong kinh doanh',
                'price' => 149000,
                'sale_price' => null,
                'quantity' => 240,
                'sold_quantity' => 1100,
                'avg_rating' => 4.6,
                'total_reviews' => 200,
                'category_id' => 2,
                'author_id' => 6,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // Chiến Lược Giá Thông Minh
        Book::updateOrCreate(
            ['slug' => 'chien-luoc-gia'],
            [
                'name' => 'Chiến Lược Giá Thông Minh',
                'image' => 'images/books/gia.jpg',
                'short_description' => 'Quản trị',
                'description' => 'Chiến lược định giá',
                'price' => 175000,
                'sale_price' => 155000,
                'quantity' => 200,
                'sold_quantity' => 900,
                'avg_rating' => 4.5,
                'total_reviews' => 160,
                'category_id' => 2,
                'author_id' => 7,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // ===== KỸ NĂNG – TÂM LÝ =====

        // Tư Duy Tích Cực
        Book::updateOrCreate(
            ['slug' => 'tu-duy-tich-cuc'],
            [
                'name' => 'Tư Duy Tích Cực',
                'image' => 'images/books/tich-cuc.jpg',
                'short_description' => 'Phát triển bản thân',
                'description' => 'Suy nghĩ tích cực mỗi ngày',
                'price' => 89000,
                'sale_price' => null,
                'quantity' => 300,
                'sold_quantity' => 4100,
                'avg_rating' => 4.8,
                'total_reviews' => 600,
                'category_id' => 3,
                'author_id' => 8,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // Quản Lý Cảm Xúc
        Book::updateOrCreate(
            ['slug' => 'quan-ly-cam-xuc'],
            [
                'name' => 'Quản Lý Cảm Xúc',
                'image' => 'images/books/cam-xuc.jpg',
                'short_description' => 'Tâm lý',
                'description' => 'Kiểm soát cảm xúc hiệu quả',
                'price' => 115000,
                'sale_price' => 99000,
                'quantity' => 260,
                'sold_quantity' => 2500,
                'avg_rating' => 4.7,
                'total_reviews' => 420,
                'category_id' => 3,
                'author_id' => 9,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // Sức Mạnh Của Thói Quen
        Book::updateOrCreate(
            ['slug' => 'suc-manh-thoi-quen'],
            [
                'name' => 'Sức Mạnh Của Thói Quen',
                'image' => 'images/books/thoi-quen.jpg',
                'short_description' => 'Kỹ năng sống',
                'description' => 'Thay đổi thói quen để thành công',
                'price' => 135000,
                'sale_price' => 119000,
                'quantity' => 240,
                'sold_quantity' => 3100,
                'avg_rating' => 4.9,
                'total_reviews' => 900,
                'category_id' => 3,
                'author_id' => 7,
                'is_active' => true,
                'is_featured' => false,
            ]
        );

        // Giao Tiếp Thông Minh
        Book::updateOrCreate(
            ['slug' => 'giao-tiep-thong-minh'],
            [
                'name' => 'Giao Tiếp Thông Minh',
                'image' => 'images/books/giao-tiep.jpg',
                'short_description' => 'Kỹ năng mềm',
                'description' => 'Nâng cao giao tiếp',
                'price' => 125000,
                'sale_price' => null,
                'quantity' => 220,
                'sold_quantity' => 1900,
                'avg_rating' => 4.6,
                'total_reviews' => 300,
                'category_id' => 3,
                'author_id' => 6,
                'is_active' => true,
                'is_featured' => false,
            ]
        );
        Book::updateOrCreate(
            ['slug' => 'binh-tinh-trong-hon-loan'],
            [
                'name' => 'Bình Tĩnh Trong Hỗn Loạn',
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
                'author_id' => 10,
            ]
        );
        Book::updateOrCreate(
            ['slug' => '100-cau-chuyen-dao-duc'],
            [
                'name' => '100 Câu Chuyện Đạo Đức',
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
                'author_id' => 11,
            ]
        );

        
        

    }
}
        
        

