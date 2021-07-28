<?php

namespace App\Http\Controllers;


Class HelloController extends Controller{
    
    function say_hello($name,$age){
        return view('test.test')
        ->with('name',$name)
        ->with('age',$age);
    }
    
}