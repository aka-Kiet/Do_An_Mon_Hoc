<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookImage;

class BookImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Giả sử Book ID 1 là "Nhà Giả Kim"
        
        // Ảnh phụ 1: Mặt sau sách
        BookImage::create([
            'book_id' => 1,
            'image_path' => 'images/books/nha-gia-kim-back.jpg',
            'sort_order' => 1,
        ]);

        // Ảnh phụ 2: Chụp các trang bên trong
        BookImage::create([
            'book_id' => 1,
            'image_path' => 'images/books/nha-gia-kim-inside.jpg',
            'sort_order' => 2,
        ]);

        // Ảnh phụ 3: Chụp cùng phụ kiện decor
        BookImage::create([
            'book_id' => 1,
            'image_path' => 'images/books/nha-gia-kim-decor.jpg',
            'sort_order' => 3,
        ]);
    }
}
