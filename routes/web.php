<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
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

// public route
Route::get('/', [WebsiteController::class, 'index'])->name('page.index');

Route::get('register-success', [WebsiteController::class, 'AfterRegister'])->name('after-register');

Route::get('/about', [WebsiteController::class, 'About'])->name('page.about');
Route::get('/cara-berbelanja', [WebsiteController::class, 'HowToShop'])->name('page.howtoshop');

// admin route
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [WebsiteController::class, 'AdminIndex'])->name('admin.dashboard');

    Route::resource('/bank', BankController::class);

    Route::resource('/user', UserController::class);

    Route::get('/payment', [OrderController::class, 'paymentIndex'])->name('order.payment');

    Route::post('/payment-update/{id}', [OrderController::class, 'paymentUpdate'])->name('order.payment-update');

    Route::get('/order-detail/{id}', [OrderController::class, 'createShipping'])->name('admin-order.detail');
});

// seller route
Route::group(['middleware' => ['auth', 'seller', 'verified'], 'prefix' => 'seller'], function () {
    Route::get('/', [WebsiteController::class, 'SellerIndex'])->name('seller.dashboard');

    Route::resource('/product', ProductController::class);

    Route::get('/order', [OrderController::class, 'indexOrder'])->name('order.index-order');

    Route::get('/order-detail/{id}', [OrderController::class, 'showOrder'])->name('order.detail');

    Route::get('/upload-shipping/{id}', [OrderController::class, 'createShipping'])->name('order.create-shipping');

    Route::post('/upload-shipping/{id}', [OrderController::class, 'storeShipping'])->name('order.store-shipping');
});

// buyer
Route::group(['middleware' => ['auth', 'buyer', 'verified'], 'prefix' => 'buyer'], function () {
    Route::get('/', [WebsiteController::class, 'BuyerIndex'])->name('buyer.dashboard');

    Route::post('/add-to-cart/{id}', [CustomerController::class, 'addToCart'])->name('buyer.addToCart');

    Route::get('/show-cart', [CustomerController::class, 'showCart'])->name('buyer.showCart');

    Route::get('/payment', [CustomerController::class, 'order'])->name('buyer.payment');

    Route::post('/checkout', [CustomerController::class, 'checkout'])->name('buyer.checkout');

    Route::get('/order-history', [CustomerController::class, 'orderHistory'])->name('buyer.order-history');

    Route::get('/payment-order/{id}', [CustomerController::class, 'paymentView'])->name('buyer.payment-view');

    Route::post('/payment-upload/{id}', [CustomerController::class, 'paymentUpload'])->name('buyer.payment-upload');

    Route::get('/order-detail/{id}', [CustomerController::class, 'OrderDetail'])->name('buyer.order-detail');

    Route::post('/order-history',[CustomerController::class, 'receiveProduct'])->name('buyer.receive-product');

    Route::post('/order-history/{id}',[CustomerController::class, 'cancelOrder'])->name('buyer.cancel-product');

});

Route::get('product-detail/{id}', [CustomerController::class, 'showProductDetail'])->name('buyer.show-product-detail');

Route::get('/test', function () {
    return view('admin/pages.profile');
});

require __DIR__ . '/auth.php';
