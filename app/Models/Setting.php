<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'description', 'adresse', 'phone', 'email', 'logo', 'favicon', 'facbook', ];
}
