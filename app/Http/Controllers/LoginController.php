<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
    
    public function registerOrLogin($driver){
        $dirverUser = Socialite::driver($driver)->user();
        // Get the value from the form
        $user = User::where('email','=',$dirverUser->email)->first();
    
        if (!$user) {
            // rigister new account
            $faker = \Faker\Factory::create();
            //password()
            $user           = new \App\Models\User();
            $user->password = Hash::make($faker->password());
            $user->email    = $dirverUser->email;
            $user->name     = $dirverUser->name?$dirverUser->name:$dirverUser->email;
            $user->save();
            
            if (isset($dirverUser->avatar)){
                // set avatar
                $userInfo = new \App\Models\UserPersonalInfo();
                $userInfo->address = 'Demo address';
                $userInfo->avatar = $dirverUser->avatar;
                $userInfo->save();
                
            }
        }
        // login 
        Auth::login($user);
        return redirect(route('product'))->with('success','Login Success');
    }
    
    
    
}
