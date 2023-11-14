<?php

namespace App\Models;

use PhpParser\Builder\Function_;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'parent_id', 'image'];
    protected $table = 'categories';

    public function child(){
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }    
    public function product(){
        return $this->hasMany(Product::class, 'category_id');
    }
    // yajra datatables 
    
}
