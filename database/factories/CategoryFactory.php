<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * CategoryFactory:
 * - Factory dùng để tạo dữ liệu mẫu cho model `Category`.
 * - Thường được sử dụng trong quá trình test hoặc seed dữ liệu.
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 * - Xác định rằng factory này mở rộng từ lớp cơ bản `Factory` và được liên kết với model `Category`.
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     * Hàm này định nghĩa các giá trị mặc định để tạo dữ liệu mẫu cho model `Category`.
     *
     * @return array<string, mixed>
     * - Trả về một mảng các cặp key-value tương ứng với các cột trong bảng `categories`.
     */
    public function definition(): array
    {
        return [
            // Tạo dữ liệu mẫu cho cột 'name':
            // Sử dụng phương thức `sentence()` từ thư viện Faker để tạo một câu ngẫu nhiên.
            'name' => fake()->sentence(),

            // Tạo dữ liệu mẫu cho cột 'description':
            // Sử dụng phương thức `paragraph()` từ thư viện Faker để tạo một đoạn văn bản ngẫu nhiên.
            'description' => fake()->paragraph(),
        ];
    }
}
