<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Color extends Model
{
    use HasFactory;

    protected $fillable=[
      'name'
    ];

    public function furniture(){
        return $this->belongsToMany(Furniture::class, 'furniture_colors')->withPivot('quantity');
    }
}
