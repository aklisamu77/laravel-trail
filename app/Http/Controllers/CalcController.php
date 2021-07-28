<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    //
    function add(Request $request ){
        dd($request->x+$request->y+$request->z);
        
    }
    
    function show($sum = null){
        return view('my_calc')->with('sum',$sum);
    }
    
    function sum(Request $request ){
        echo $sum = ($request->x+$request->y+$request->z);
        //return view('my_calc')->with('sum',$sum);
        //return redirect('show')->with('sum',$sum);
    }
}
