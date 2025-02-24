<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name', // ФИО покупателя
        'product_id',    // ID товара
        'quantity',     // Количество
        'total_price',  // Итоговая цена
        'status',       // Статус заказа
        'comment',      // Комментарий
        'created_at',   // Дата создания
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
