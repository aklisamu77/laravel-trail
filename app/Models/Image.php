<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Image extends Model
{
    use HasFactory;
    protected $table ='images';
        protected  $primaryKey = 'id';  

    protected $fillable = [
        "url",
        "imageable_id",
        "imageable_type",
    ];
    public function imageable(){
        return $this->morphTo();
    }
}
