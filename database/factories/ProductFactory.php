<?php

namespace Database\Factories;

use App\Models\Product; // Import model Product để sử dụng hằng số và factory liên kết.
use App\Models\Category; // Import model Category để liên kết sản phẩm với danh mục.
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * ProductFactory:
 * - Factory dùng để tạo dữ liệu mẫu cho model `Product`.
 * - Thường được sử dụng trong quá trình test hoặc seed dữ liệu.
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 * - Xác định rằng factory này mở rộng từ lớp cơ bản `Factory` và được liên kết với model `Product`.
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     * Hàm này định nghĩa các giá trị mặc định để tạo dữ liệu mẫu cho model `Product`.
     *
     * @return array<string, mixed>
     * - Trả về một mảng các cặp key-value tương ứng với các cột trong bảng `products`.
     */
    public function definition(): array
    {
        return [
            // Tạo dữ liệu mẫu cho cột 'name':
            // Sử dụng phương thức `sentence()` từ thư viện Faker để tạo một câu ngẫu nhiên làm tên sản phẩm.
            'name' => fake()->sentence(),

            // Tạo dữ liệu mẫu cho cột 'description':
            // Sử dụng phương thức `paragraph()` từ thư viện Faker để tạo một đoạn văn mô tả sản phẩm.
            'description' => fake()->paragraph(),

            // Tạo dữ liệu mẫu cho cột 'price':
            // Sử dụng phương thức `numerify()` từ thư viện Faker để tạo một số ngẫu nhiên (5 chữ số) làm giá sản phẩm.
            'price' => fake()->numerify('#####'),

            // Đặt giá trị mặc định cho cột 'currency' sử dụng hằng số từ model Product.
            'currency' => Product::DEFAULT_CURRENCY,

            // Đặt giá trị mặc định cho cột 'display_image_url' sử dụng hằng số từ model Product.
            'display_image_url' => Product::DEFAULT_IMAGE,

            // Tạo dữ liệu mẫu cho cột 'category_id':
            // Sử dụng factory của model Category để tự động tạo một danh mục liên kết với sản phẩm.
            'category_id' => Category::factory(),
        ];
    }
}
