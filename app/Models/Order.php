<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    function user(){
        return $this->belongsTo(User::class);
    }
    
    function order_detailes(){
        return $this->hasMany(OrderDetail::class);
    }
    
    function products(){
        return $this->belongsToMany(Product::class , "order_detailes", "order_id");
    }
    
}
