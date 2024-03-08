<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'facebook',
        'telegram',
        'instagram',
        'vk',
        'phone',
        'email',
        'img',
    ];

    protected $casts = [
        'category' => 'bigint',
    ];
}
