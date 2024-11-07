<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'area',
        'genre',
        'content'
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
