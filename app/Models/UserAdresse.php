<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdresse extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'adresse', 'city', 'state', 'country', 'phone', 'email', 'name', 'surname',];
    protected $table = 'user_adresses';
    public function user(){
        return $this->belongsTo(User::class);
    }
}
