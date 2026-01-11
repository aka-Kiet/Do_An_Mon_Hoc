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
        // 1. Sách BÁN CHẠY (sold_quantity cao)
        Book::create([
            'name' => 'Tony Buổi Sáng - Trên Đường Băng',
            'slug' => 'tony-buoi-sang',
            'price' => 120000,
            'sold_quantity' => 12500, // Số to để hiện "12.5k"
            'category_id' => 3, // Giả sử ID 3 là Kỹ năng
            'author_id' => 1,   // ID tác giả mẫu
            'image' => 'books/tony.jpg',
        ]);

        // 2. Sách ĐÁNH GIÁ CAO (avg_rating = 5.0)
        Book::create([
            'name' => 'Nhà Giả Kim',
            'slug' => 'nha-gia-kim',
            'price' => 85000,
            'avg_rating' => 5.0, // 5 sao
            'category_id' => 1,  // Văn học
            'author_id' => 4,    // Paulo Coelho
            'image' => 'books/alchemist.jpg',
        ]);

        // 3. Sách MỚI (Mặc định created_at là bây giờ nên nó sẽ là mới nhất)
        Book::create([
            'name' => 'Tâm Lý Học Tội Phạm',
            'slug' => 'tam-ly-hoc-toi-pham',
            'price' => 150000,
            'category_id' => 3,
            'image' => 'books/criminal.jpg',
        ]);
    }
}
