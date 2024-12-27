<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Hàm `up()` sẽ được gọi khi chạy lệnh `php artisan migrate`.
     * Nó định nghĩa cách bảng `products` được tạo trong cơ sở dữ liệu.
     */
    public function up(): void
    {
        // Tạo bảng 'products' trong cơ sở dữ liệu
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Tạo cột 'id' với kiểu dữ liệu tự tăng (auto-increment) và là khóa chính.
            $table->string('name'); // Tạo cột 'name' với kiểu dữ liệu chuỗi (string), không được để trống.
            $table->string('description'); // Tạo cột 'description' với kiểu dữ liệu chuỗi, chứa mô tả sản phẩm.
            $table->double('price'); // Tạo cột 'price' với kiểu dữ liệu số thực (double), lưu giá sản phẩm.
            $table->string('currency'); // Tạo cột 'currency' với kiểu dữ liệu chuỗi, lưu đơn vị tiền tệ (e.g., USD, VND).
            $table->string('display_image_url'); // Tạo cột 'display_image_url' với kiểu dữ liệu chuỗi, lưu URL ảnh hiển thị.
            $table->foreignId('category_id')->nullable(); // Tạo cột 'category_id' với kiểu dữ liệu khóa ngoại, có thể để trống.

            // Định nghĩa khóa ngoại cho 'category_id':
            $table->foreign('category_id')
                  ->references('id') // Liên kết với cột 'id' trong bảng 'categories'.
                  ->on('categories') // Tên bảng cha là 'categories'.
                  ->constrained() // Ràng buộc toàn vẹn khóa ngoại (tự động).
                  ->cascadeOnUpdate() // Nếu 'id' của bảng 'categories' thay đổi, cập nhật tương ứng.
                  ->nullOnDelete(); // Nếu bản ghi trong bảng 'categories' bị xóa, set 'category_id' = NULL.
            
            $table->timestamps(); // Tạo 2 cột 'created_at' và 'updated_at' tự động lưu thời gian tạo và cập nhật bản ghi.
        });
    }

    /**
     * Reverse the migrations.
     * Hàm `down()` được gọi khi chạy lệnh `php artisan migrate:rollback`.
     * Nó định nghĩa cách bảng `products` sẽ được xóa.
     */
    public function down(): void
    {
        // Xóa bảng 'products' nếu tồn tại
        Schema::dropIfExists('products');
    }
};
