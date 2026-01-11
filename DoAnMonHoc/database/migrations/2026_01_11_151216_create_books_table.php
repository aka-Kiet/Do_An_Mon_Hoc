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
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            // 1. Thông tin cơ bản
            $table->string('name');              // Tên sách
            $table->string('slug')->unique();    // URL (VD: tam-ly-hoc-toi-pham)
            $table->string('image')->nullable(); // Ảnh bìa
            $table->text('description')->nullable(); // Mô tả chi tiết

            // 2. Giá bán & Kho
            $table->decimal('price', 12, 0);     // Giá gốc (150000)
            $table->integer('quantity')->default(0); // Số lượng trong kho

            // 3. Chỉ số (Dùng để hiển thị các cột New, Hot, Rating)
            $table->integer('sold_quantity')->default(0);   // Đã bán (Dùng xếp hạng "Bán chạy nhất")
            $table->float('avg_rating', 3, 2)->default(0);  // Điểm đánh giá (Dùng xếp hạng "Đánh giá cao")
            $table->integer('total_reviews')->default(0);   // Tổng số lượt đánh giá

            // 4. Trạng thái
            $table->boolean('is_active')->default(true);    // Còn kinh doanh không
            $table->boolean('is_featured')->default(false); // Sách nổi bật (Gắn nhãn HOT thủ công)

            // 5. KHÓA NGOẠI (Liên kết bảng Cha)
            // Liên kết Danh mục
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            // Liên kết Tác giả
            $table->foreignId('author_id')->nullable()->constrained('authors')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
