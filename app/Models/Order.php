<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Furniture;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'date_ordered',
        'total'
    ];

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
    public function products(){
        return $this->belongsToMany(Furniture::class, 'order_products')->withPivot('quantity')->withTimestamps();
    }
}
