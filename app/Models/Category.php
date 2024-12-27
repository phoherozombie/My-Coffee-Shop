<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Sử dụng trait HasFactory để hỗ trợ tạo các factory cho model này.
    use HasFactory;

    /**
     * Định nghĩa mối quan hệ "1-nhiều" (One-to-Many) giữa Category và Product.
     *
     * - Một danh mục (Category) có thể có nhiều sản phẩm (Products).
     * - Phương thức này sẽ trả về một danh sách các sản phẩm thuộc danh mục này.
     */
    public function products()
    {
        // Sử dụng phương thức `hasMany` để thiết lập mối quan hệ.
        // Nó liên kết model `Category` với model `Product`.
        return $this->hasMany(Product::class);
    }
}
