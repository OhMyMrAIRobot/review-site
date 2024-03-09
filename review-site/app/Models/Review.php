<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'rating',
        'author',
        'shop_id',
        'created_at',
    ];

    protected $casts = [
        'rating' => 'int',
        'shop_id' => 'int',
    ];
}
