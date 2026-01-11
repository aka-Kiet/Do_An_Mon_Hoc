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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // 1. Thông tin cơ bản
            $table->string('name');              // Tên danh mục (Văn Học, Kinh Tế...)
            $table->string('slug')->unique();    // Đường dẫn SEO (van-hoc, kinh-te...)

            // 2. Giao diện (Icon & Màu sắc)
            $table->string('icon')->nullable();  // Class icon (VD: "fas fa-pen") hoặc đường dẫn ảnh

            // 3. Quản lý hiển thị
            $table->boolean('is_featured')->default(false); // Đánh dấu là "Nổi bật" để hiện trang chủ
            $table->boolean('is_active')->default(true);    // Còn dùng hay tạm ẩn
            $table->integer('sort_order')->default(0);      // Sắp xếp thứ tự

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
