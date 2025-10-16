<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    use HasFactory;

    protected $fillable = [
        'furniture_name',
        'description',
        'price',
        'brand_id',
        'category_id'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'furniture_colors')->withPivot('quantity');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
