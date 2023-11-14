<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProducColortSize extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'product_size_id', 'product_color_id', 'quantity', 'price_two', 'discount', 'status',];
    protected $table = 'product_color_sizes';
    public function product_color(){
        return $this->belongsTo(ProductColor::class);
    }
    public function product_size(){
        return $this->belongsTo(ProductSize::class);
    }
    // public function order_details(){
    //     return $this->hasMany(OrderDetails::class);
    // }
}
