<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name',
        'image',
        'area',
        'genre_id',
        'menu_id',
        'content'
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function scopeAreaSearch($query, $area)
    {
        if (!empty($area)) {
            $query->where('area', $area);

        }
    }

    public function scopeGenreSearch($query, $genre)
    {
        if (!empty($genre)) {
            $query->where('genre_id', $genre);
        }
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
    }
}
