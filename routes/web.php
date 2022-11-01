<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

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
});

// seller route
Route::group(['middleware' => ['auth', 'seller'], 'prefix' => 'seller'], function () {
    Route::get('/', [WebsiteController::class, 'SellerIndex'])->name('seller.dashboard');
});

// buyer
Route::group(['middleware' => ['auth', 'buyer', 'verified'], 'prefix' => 'buyer'], function () {
    Route::get('/', [WebsiteController::class, 'BuyerIndex'])->name('buyer.dashboard');
});

Route::get('/test', function () {
    return view('components/website.baselayout');
});

require __DIR__ . '/auth.php';
