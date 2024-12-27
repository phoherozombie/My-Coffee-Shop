<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Hàm `up()` được gọi khi chạy lệnh `php artisan migrate`.
     * Nó định nghĩa cách mà bảng `categories` sẽ được tạo trong cơ sở dữ liệu.
     */
    public function up(): void
    {
        // Tạo bảng 'categories' trong cơ sở dữ liệu
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Tạo cột 'id' với kiểu dữ liệu tự tăng (auto-increment) và là khóa chính.
            $table->string('name'); // Tạo cột 'name' với kiểu dữ liệu chuỗi (string), không được để trống.
            $table->string('description')->nullable(); // Tạo cột 'description' với kiểu dữ liệu chuỗi (string), có thể để trống (nullable).
            $table->timestamps(); // Tạo 2 cột 'created_at' và 'updated_at' để lưu thời gian tạo và cập nhật bản ghi.
        });
    }

    /**
     * Reverse the migrations.
     * Hàm `down()` được gọi khi chạy lệnh `php artisan migrate:rollback`.
     * Nó định nghĩa cách bảng `categories` sẽ được xóa (hoặc hoàn tác).
     */
    public function down(): void
    {
        // Xóa bảng 'categories' nếu tồn tại
        Schema::dropIfExists('categories');
    }
};
