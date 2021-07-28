<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CalcController;
use App\Http\Controllers\CategoryController;
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

// Category
Route::prefix('category')->group(function (){
   
    Route::get('/',                 [CategoryController::class , "index"])->name('category');
    //Route::any('/search/', [CategoryController::class , "search"])->name('search');
    Route::get('/search/{search}',  [CategoryController::class , "search"])->name('search');
    Route::get('/search/{search}/page/{pageid}', [CategoryController::class , "search"])->name('search.page');
    Route::get('/page/{pageid}',    [CategoryController::class , "index"])->name('category.page');
    Route::get('/{id}/edit',        [CategoryController::class , "edit"])->name('category.edit');
    Route::post('/',                [CategoryController::class , "store"])->name('category.store');
    Route::post('/{id}/',           [CategoryController::class , "update"])->name('category.update');
    Route::delete('/{id}/delete',   [CategoryController::class , "destroy"])->name('category.destroy');
    
});

// Product
Route::prefix('product')->group(function (){
   
    Route::get('/{pageid??}',                 [ProductController::class , "index"])->name('product');
    
    Route::post('/',                [ProductController::class , "store"])->name('product.store');
    Route::get('/{id}/edit',        [ProductController::class , "edit"])->name('product.edit');
    Route::post('/{id}/',           [ProductController::class , "update"])->name('product.update');
    Route::delete('/{id}/delete',   [ProductController::class , "destroy"])->name('product.destroy');
    
    Route::get('/search/{search}/{pageid??}',  [ProductController::class , "search"])->name('product.search');
    
    //Route::any('/search/', [CategoryController::class , "search"])->name('search');
    //Route::get('/search/{search}/page/{pageid}', [ProductController::class , "search"])->name('product.search.page');
    //Route::get('/page/{pageid}',    [ProductController::class , "index"])->name('product.page');
    
    
    
    
    
});


Route::get('lang/{lang}',function($lang){
    
    //app()->setLocale(  );
    session()->put( 'lang' , ( $lang == 'ar' ) ? 'ar' : 'en' );
    return redirect()->back();

});

Route::get('hi/{age}',function($age){
    
    echo 'hi your age is '.$age;    
        
})->middleware('age');