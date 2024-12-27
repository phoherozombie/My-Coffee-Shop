<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Sử dụng trait HasFactory để hỗ trợ tạo các factory cho model này.
    use HasFactory;

    /**
     * Hằng số DEFAULT_CURRENCY:
     * - Định nghĩa đơn vị tiền tệ mặc định cho sản phẩm.
     * - Giá trị mặc định là 'VNĐ'.
     */
    public const DEFAULT_CURRENCY = 'VNĐ';

    /**
     * Hằng số DEFAULT_IMAGE:
     * - URL hình ảnh mặc định cho sản phẩm.
     * - Dùng khi không có hình ảnh nào được chỉ định.
     */
    public const DEFAULT_IMAGE = 'https://images.unsplash.com/photo-1509042239860-f550ce710b93';
    
    /**
     * Định nghĩa mối quan hệ "nhiều - một" (Many-to-One) giữa Product và Category.
     * - Một sản phẩm (Product) thuộc về một danh mục (Category).
     * - Laravel sẽ tự động tìm cột 'category_id' trong bảng 'products' để thiết lập mối quan hệ.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Accessor: getFormattedPriceAttribute
     * - Trả về giá sản phẩm được định dạng kèm theo đơn vị tiền tệ.
     * - Sử dụng phương thức `number_format` để định dạng giá với dấu phân cách.
     * - Giá trị trả về: Chuỗi gồm giá tiền và đơn vị tiền tệ.
     * 
     * Ví dụ: Nếu `price = 100000` và `currency = VNĐ`, kết quả trả về là '100,000 VNĐ'.
     */
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price) . ' ' . $this->currency;
    }

    /**
     * Phương thức: getFormattedTotalAmount
     * - Tính và trả về tổng số tiền cho một số lượng sản phẩm cụ thể.
     * - Giá trị mặc định của `$quantity` là 1.
     * - Kết quả trả về là chuỗi định dạng gồm tổng tiền và đơn vị tiền tệ.
     * 
     * Ví dụ: Nếu `price = 100000`, `quantity = 3` và `currency = VNĐ`,
     *        kết quả trả về là '300,000 VNĐ'.
     */
    public function getFormattedTotalAmount($quantity = 1)
    {
        return number_format($this->price * $quantity) . ' ' . $this->currency;
    }
}
