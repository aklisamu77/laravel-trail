<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('login');
    }
    
    public function authenticate(Request $request){
        //$credentials = $request->only('login', 'password');

        if (Auth::attempt(['email' => $request->login, 'password'=> $request->password])) {
            // Authentication passed...
            return redirect(route('product'));
        } else return redirect(route('login'))->with('message','Wrong Information');
    }
    
    public function logout(){
        Auth::logout();
        return redirect(route('login'))->with('success','Successfully Logout');
    }
    
}
