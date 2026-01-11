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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();

            // 1. Thông tin định danh
            $table->string('name');              // Tên tác giả (VD: Nguyễn Nhật Ánh)
            $table->string('slug')->unique();    // URL (VD: nguyen-nhat-anh)

            // 2. Thông tin bổ sung (Hiển thị trang chi tiết tác giả)
            $table->text('bio')->nullable();     // Tiểu sử / Giới thiệu
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
