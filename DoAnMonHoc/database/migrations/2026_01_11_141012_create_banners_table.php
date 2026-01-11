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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();

            // 1. Nội dung hiển thị
            $table->string('title')->nullable();       // Tiêu đề lớn (VD: Tương lai Kỹ Thuật Số)
            $table->string('badge')->nullable();       // Nhãn nhỏ (VD: CÔNG NGHỆ 2026)
            $table->text('description')->nullable();   // Mô tả ngắn
            $table->string('image_path');                   // Đường dẫn ảnh (bắt buộc)

            // 2. Quản lý hiển thị
            $table->integer('sort_order')->default(0); // Thứ tự sắp xếp (số nhỏ hiện trước)
            $table->boolean('is_active')->default(true); // Ẩn/Hiện

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
