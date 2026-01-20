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
            $table->string('slug')->unique();    // URL thân thiện (VD: nha-gia-kim)
            $table->string('image')->nullable(); // Ảnh bìa chính
            $table->text('short_description')->nullable(); // Mô tả ngắn (Hiện ở trang chủ)
            $table->text('description')->nullable();       // Mô tả chi tiết (Hiện ở trang chi tiết)

            // 2. Giá bán & Kho (Đơn giản hóa)
            $table->decimal('price', 12, 0);               // Giá gốc (VD: 100000)
            $table->decimal('sale_price', 12, 0)->nullable(); // Giá giảm (VD: 80000) -> Nếu null thì không giảm
            $table->integer('quantity')->default(0);       // Số lượng đơn giản (Chỉ cần nhập số)

            // 3. Thống kê & Xếp hạng (Tự động cập nhật khi có đơn hàng/review)
            $table->integer('sold_quantity')->default(0);  // Đã bán -> Xếp hạng "BÁN CHẠY"
            $table->float('avg_rating', 3, 2)->default(0); // Điểm trung bình (VD: 4.5) -> Xếp hạng "ĐÁNH GIÁ CAO"
            $table->integer('total_reviews')->default(0);  // Tổng số người đánh giá

            // 4. Trạng thái & Nổi bật
            $table->boolean('is_active')->default(true);    // Ẩn/Hiện sản phẩm
            $table->boolean('is_featured')->default(false); // Gắn nhãn "HOT" thủ công

            // 5. Khóa ngoại (An toàn: Xóa danh mục thì sách không mất, chỉ mất danh mục)
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->foreignId('author_id')->nullable()->constrained('authors')->onDelete('set null');

            $table->timestamps(); // created_at dùng để xếp hạng "SẢN PHẨM MỚI"

            // Xóa mềm
            $table->softDeletes();
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
