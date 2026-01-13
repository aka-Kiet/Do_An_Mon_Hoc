<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book_images', function (Blueprint $table) {
            $table->id();

            // 1. Liên kết với bảng Books
            // Nếu xóa sách -> Xóa luôn bộ sưu tập ảnh của sách đó
            $table->foreignId('book_id')->constrained()->onDelete('cascade');

            // 2. Đường dẫn ảnh
            $table->string('image_path'); 

            // 3. Thứ tự hiển thị (Để bạn sắp xếp ảnh nào đứng trước, đứng sau)
            $table->integer('sort_order')->default(0); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_images');
    }
};
