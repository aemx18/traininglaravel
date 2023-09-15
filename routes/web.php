<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');   //bawa view welcome.blade
});


Route::get('/', function () {
    return view('dashboard');   //bawa view dashboard
}) ->name('custom.home');


// Route::get('/product', function () {
//     return   ;   //bawa view welcome.blade
// })-> name('product');

Route::get('/product', [ProductController::class,'index'])->name ('product.index');
Route::get('/product/create', [ProductController::class,'create'])->name ('product.create');
Route::post('/product/store', [ProductController::class,'store'])->name ('product.store');
Route::delete('/products/{product}', [ProductController::class,'destroy'])->name('products.destroy');
Route::get('/products/{id}/edit', [ProductController::class,'edit'])->name('products.edit');
Route::put('products/{product}', [ProductController::class,'update'])->name('products.update');
// Route::post('/products/update', [ProductController::class,'update'])->name ('products.update');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
