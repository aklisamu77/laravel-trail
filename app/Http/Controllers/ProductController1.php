<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController1 extends Controller
{
    //
    function save($name){
        $product = new Product();
        $product->name = $name;
        $product->description = 'description about sico ';
        $product->cat = 3;
        $product->save();
        
        
    }
    
    function list(){
        $products  = Category::find(3)->products;
        foreach($products->all() as $product){
                
                echo $product->name .' : '. $product->description.' => '.$product->category->name.'<br>';
        }
                //return ($products->all());
        //return (Product::all());
    }
}
