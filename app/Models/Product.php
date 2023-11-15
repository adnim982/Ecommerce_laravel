<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id', 'name', 'description', 'image', 'price', 'discount_price', 'category_id'];
    protected $table = 'products'; 
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }
    public function order_details(){
        return $this->hasMany(OrderDetails::class);
    }
    public function product_color_sizes(){
        return $this->hasMany(ProductColorSize::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function product_colors(){
        return $this->hasMany(ProductColor::class);
    }
}