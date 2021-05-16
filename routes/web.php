<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('mypage');
Route::group(['prefix' => 'home', 'as' => 'home.'], function () {
    
    Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
});

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');
        
});

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
    Route::get('/', [CartController::class, 'getCartInfo'])->name('cart-info'); 
    Route::post('cart/{id}', [CartController::class, 'addCart'])->name('add-cart');
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('check_order_step_by_step');
       // dd(123);
    Route::post('checkout-complete', [CartController::class, 'checkoutComplete'])->name('checkout-complete');
    Route::post('send-verify-code', [CartController::class, 'sendVerifyCode'])->middleware(['auth'])->name('send-verify-code');
    Route::post('confirm-verify-code', [CartController::class, 'confirmVerifyCode'])->middleware(['auth'])->name('confirm-verify-code');
});
