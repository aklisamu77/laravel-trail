<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    function cats($name){
        $cat = new Category();
        $cat->name = $name;
        $cat->comment = 'this is inserted section.';
        $cat->save();
        var_dump($cat);
    }
    
    function list_cat(){
        return Category::all();
    }
}
