<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    
    public $timestamps = false ;
    protected $table ='products';
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
}
