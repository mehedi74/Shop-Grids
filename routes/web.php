<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;

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

//all website routes...

Route::get('/', [MyCommerceController::class, 'index'])->name('home');
Route::get('/category{id}', [MyCommerceController::class, 'category'])->name('product.by.category');
Route::get('/subcategory{id}', [MyCommerceController::class, 'subCategory'])->name('product.by.subcategory');
Route::get('/product{id}-detail', [MyCommerceController::class, 'detail'])->name('product.detail');
Route::post('/product{id}-add-cart', [MyCommerceController::class, 'addToCart'])->name('product.add.cart');
Route::get('/product{id}-remove-cart', [MyCommerceController::class, 'deleteFromCart'])->name('product.cart.remove');
Route::post('/product{id}-update-cart', [MyCommerceController::class, 'updateCart'])->name('product.cart.update');
Route::get('/show-cart', [CartController::class, 'index'])->name('show.cart');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/order/cash', [CheckoutController::class, 'placeOrderOnCash'])->name('place-order.cash');

//all customer routes here...
Route::prefix('/customer')->group(function () {
    Route::match(['get', 'post'], 'register', [CustomerController::class, 'register'])->name('customer.register');
    Route::match(['get', 'post'], 'login', [CustomerController::class, 'login'])->name('customer.login');

    //customer  middleware will be added soon..
    Route::middleware('customer.check')->group(function () {
        Route::get('dashboard', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('logout', [CustomerController::class, 'logout'])->name('customer.logout');
    });

});




