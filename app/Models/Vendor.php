<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    
    public function products(){
        return $this->hasMany(Product::class);
    }
    
    public function categories(){
        return $this->belongsToMany(Category::class , "products", "vendor_id");
    }
}
