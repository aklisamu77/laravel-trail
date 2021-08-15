<?php

use Illuminate\Support\Facades\Route;

use Laravel\Socialite\Facades\Socialite;


use App\Http\Controllers\HelloController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CalcController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// socialize auth
Route::get('/auth/redirect/{driver}', function ($driver) {
    return Socialite::driver($driver)->redirect();
});
// social rigister or login
Route::get('/auth/callback/{driver}', [LoginController::class , "registerOrLogin"]);


// Category
Route::prefix('category')->middleware('auth')->group(function (){
   
    Route::get('/',                 [CategoryController::class , "index"])->name('category');
    //Route::any('/search/', [CategoryController::class , "search"])->name('search');
    /*Route::get('/search/{search}',  [CategoryController::class , "search"])->name('search');
    Route::get('/search/{search}/page/{pageid}', [CategoryController::class , "search"])->name('search.page');
    Route::get('/page/{pageid}',    [CategoryController::class , "index"])->name('category.page');
    Route::get('/{id}/edit',        [CategoryController::class , "edit"])->name('category.edit');
    Route::post('/',                [CategoryController::class , "store"])->name('category.store');
    Route::post('/{id}/',           [CategoryController::class , "update"])->name('category.update');
    Route::delete('/{id}/delete',   [CategoryController::class , "destroy"])->name('category.destroy');*/
    
});

// Category
Route::prefix('order')->middleware('auth')->group(function (){
   
    Route::get('/',                 [OrderController::class , "index"])->name('order');
    
});

// Product
Route::prefix('product')->middleware('auth')->group(function (){
   
    Route::get('/{pageid??}',       [ProductController::class , "index"])->name('product');
    Route::get('/category/{category_id}/{currentPage??}',
                        [ProductController::class , "categoryShow"])->name('product.category');
    Route::get('/vendor/{vendor_id}/{currentPage??}',
                        [ProductController::class , "vendorShow"])->name('product.vendor');
    
    Route::post('/',                [ProductController::class , "store"])->name('product.store');
    Route::get('/{id}/edit',        [ProductController::class , "edit"])->name('product.edit');
    Route::post('/{id}/',           [ProductController::class , "update"])->name('product.update');
    Route::delete('/{id}/delete',   [ProductController::class , "destroy"])->name('product.destroy');
    
    Route::get('/search/{search}/{pageid??}',  [ProductController::class , "search"])->name('product.search');
    
    //Route::any('/search/', [CategoryController::class , "search"])->name('search');
    //Route::get('/search/{search}/page/{pageid}', [ProductController::class , "search"])->name('product.search.page');
    //Route::get('/page/{pageid}',    [ProductController::class , "index"])->name('product.page');

});

// vendor
Route::prefix('vendor')->middleware('auth')->group(function (){
   
    Route::get('/{pageid??}',       [VendorController::class , "index"])->name('vendor');
    //Route::get('/category/{category_id}/{currentPage??}',       [ProductController::class , "categoryShow"])->name('product.category');
    
    Route::post('/',                [VendorController::class , "store"])->name('vendor.store');
    Route::get('/{id}/edit',        [VendorController::class , "edit"])->name('vendor.edit');
    Route::post('/{id}/',           [VendorController::class , "update"])->name('vendor.update');
    Route::delete('/{id}/delete',   [VendorController::class , "destroy"])->name('vendor.destroy');
    
    Route::get('/search/{search}/{pageid??}',  [VendorController::class , "search"])->name('vendor.search');
    
    //Route::any('/search/', [CategoryController::class , "search"])->name('search');
    //Route::get('/search/{search}/page/{pageid}', [ProductController::class , "search"])->name('product.search.page');
    //Route::get('/page/{pageid}',    [ProductController::class , "index"])->name('product.page');

});


// login 
Route::get('/login',[LoginController::class , "index"])->name('login');
Route::post('/login',[LoginController::class , "authenticate"])->name('login.auth');
Route::get('/logout',[LoginController::class , "logout"])->name('logout');

Route::get('lang/{lang}',function($lang){
    
    //app()->setLocale(  );
    session()->put( 'lang' , ( $lang == 'ar' ) ? 'ar' : 'en' );
    return redirect()->back();

});

Route::get('hi/{age}',function($age){
    
    echo 'hi your age is '.$age;    
        
})->middleware('age');

Route::get('/counter',function(){
   return View('master',['count'=>0]); 
});

Route::get('/test',function(){
   $arr = array(
                /* start */
                /* end */
                );
   echo '<pre>';
   var_dump($arr);
});