<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'order_id', 'product_color_size_id', 'quantity', 'price', 'discount',];
    protected $table = 'order_details';
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function product_color_size(){
        return $this->belongsTo(ProductColorSize::class);
    }
}
