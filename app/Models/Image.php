<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable=[
        'furniture_id',
        'image_path',
        'is_main'
    ];

    public function furniture(){
        return $this->belongsTo(Furntiure::class);
    }

}
