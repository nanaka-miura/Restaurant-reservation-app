<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'menu_id',
        'date',
        'time',
        'number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime',
    ];
}
