<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Nguyễn Nhật Ánh
        Author::create([
            'name' => 'Nguyễn Nhật Ánh',
            'slug' => 'nguyen-nhat-anh',
            'bio'  => 'Nhà văn nổi tiếng chuyên viết cho thanh thiếu niên. Tác giả của "Mắt Biếc", "Kính Vạn Hoa".',
        ]);

        // 2. J.K. Rowling
        Author::create([
            'name' => 'J.K. Rowling',
            'slug' => 'j-k-rowling',
            'bio'  => 'Nữ văn sĩ người Anh, mẹ đẻ của bộ truyện Harry Potter huyền thoại và thế giới phù thủy.',
        ]);

        // 3. Rosie Nguyễn
        Author::create([
            'name' => 'Rosie Nguyễn',
            'slug' => 'rosie-nguyen',
            'bio'  => 'Tác giả, blogger du lịch nổi tiếng với cuốn sách "Tuổi trẻ đáng giá bao nhiêu".',
        ]);

        // 4. Paulo Coelho
        Author::create([
            'name' => 'Paulo Coelho',
            'slug' => 'paulo-coelho',
            'bio'  => 'Tiểu thuyết gia người Brazil. Tác giả của "Nhà Giả Kim" - sách bán chạy mọi thời đại.',
        ]);

        // 5. Philip Kotler
        Author::create([
            'name' => 'Philip Kotler',
            'slug' => 'philip-kotler',
            'bio'  => 'Giáo sư marketing nổi tiếng thế giới, cha đẻ của Marketing hiện đại.',
        ]);

        // 6. Dale Carnegie
        Author::create([
            'name' => 'Dale Carnegie',
            'slug' => 'dale-carnegie',
            'bio'  => 'Nhà văn và diễn thuyết gia người Mỹ, tác giả cuốn sách "Đắc Nhân Tâm" nổi tiếng toàn cầu.',
        ]);

        // 7. Nguyễn Ngọc Tư
        Author::create([
            'name' => 'Nguyễn Ngọc Tư',
            'slug' => 'nguyen-ngoc-tu',
            'bio'  => 'Nhà văn nữ tiêu biểu của văn học đương đại Việt Nam, nổi tiếng với tập truyện "Cánh Đồng Bất Tận".',
        ]);

        // 8. Haruki Murakami
        Author::create([
            'name' => 'Haruki Murakami',
            'slug' => 'haruki-murakami',
            'bio'  => 'Nhà văn Nhật Bản đương đại lừng danh với phong cách siêu thực, tác giả của "Rừng Na Uy", "Kafka bên bờ biển".',
        ]);

        // 9. Vũ Trọng Phụng
        Author::create([
            'name' => 'Vũ Trọng Phụng',
            'slug' => 'vu-trong-phung',
            'bio'  => 'Danh nhân văn hóa Việt Nam, "Ông vua phóng sự đất Bắc" với kiệt tác trào phúng "Số Đỏ".',
        ]);

        // 10. Robert Kiyosaki
        Author::create([
            'name' => 'Robert Kiyosaki',
            'slug' => 'robert-kiyosaki',
            'bio'  => 'Nhà đầu tư, doanh nhân và là tác giả bộ sách tài chính cá nhân bán chạy nhất "Dạy Con Làm Giàu" (Rich Dad Poor Dad).',
        ]);

        // 11. Napoleon Hill
        Author::create([
            'name' => 'Napoleon Hill',
            'slug' => 'napoleon-hill',
            'bio'  => 'Tác giả của cuốn sách "Nghĩ Giàu Làm Giàu" (Think and Grow Rich), người tiên phong trong thể loại phát triển bản thân.',
        ]);

        // 12. Tô Hoài
        Author::create([
            'name' => 'Tô Hoài',
            'slug' => 'to-hoai',
            'bio'  => 'Cây đại thụ của văn học Việt Nam, nổi tiếng với tác phẩm "Dế Mèn Phiêu Lưu Ký" gắn liền với tuổi thơ nhiều thế hệ.',
        ]);

        // 13. Arthur Conan Doyle
        Author::create([
            'name' => 'Arthur Conan Doyle',
            'slug' => 'arthur-conan-doyle',
            'bio'  => 'Nhà văn người Scotland, cha đẻ của nhân vật thám tử lừng danh Sherlock Holmes.',
        ]);

        // 14. Nam Cao
        Author::create([
            'name' => 'Nam Cao',
            'slug' => 'nam-cao',
            'bio'  => 'Nhà văn hiện thực xuất sắc trước 1945, tác giả của những truyện ngắn bất hủ như "Chí Phèo", "Lão Hạc".',
        ]);

        // 15. Stephen King
        Author::create([
            'name' => 'Stephen King',
            'slug' => 'stephen-king',
            'bio'  => 'Ông vua của thể loại kinh dị và giả tưởng, tác giả của "IT" (Gã Hề Ma Quái), "The Shining".',
        ]);
    }
}

