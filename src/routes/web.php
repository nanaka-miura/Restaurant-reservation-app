<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;


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

Route::get('/', [ShopController::class, 'index']);
Route::get('/search', [ShopController::class, 'search']);
Route::get('/detail/{id}', [ShopController::class, 'detail']);
Route::post('/register', [AuthController::class, 'store']);
Route::get('/thanks', function () {
    return view('thanks');
});
Route::post('/login', [AuthController::class, 'login']);
Route::get('/admin/login', [AuthController::class, 'adminLogin']);
Route::get('/shop/login', [AuthController::class, 'shopLogin']);
Route::post('/admin/login', [AuthController::class, 'adminDoLogin']);
Route::post('/shop/login', [AuthController::class, 'shopDoLogin']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['signed'])
    ->name('verification.verify');

Route::middleware(['auth'])->group(function() {
    Route::post('/like/{id}', [ShopController::class, 'like']);
    Route::post('/detail/{id}', [ShopController::class, 'reservation']);
    Route::post('/cancel/{id}', [ShopController::class, 'cancel']);
    Route::get('/mypage', [UserController::class, 'mypage']);
    Route::get('/mypage/change/{id}', [ShopController::class, 'change']);
    Route::post('/mypage/change/{id}', [ShopController::class, 'changeStore']);
    Route::get('/mypage/rating/{id}', [ShopController::class, 'rating']);
    Route::post('/mypage/rating/{id}', [ShopController::class, 'ratingStore']);
    Route::get('/reserve/thanks', [ShopController::class, 'thanks']);
});

Route::middleware(['auth:admin'])->group(function() {
    Route::get('/admin/mypage', [AdminController::class, 'adminMypage']);
    Route::post('/admin/mypage', [AdminController::class, 'representativeRegister']);
    Route::get('/shop/mypage', [AdminController::class, 'shopMypage']);
    Route::get('/shop/create', [AdminController::class, 'shopCreate']);
    Route::post('/shop/create', [AdminController::class, 'storeShop']);
    Route::get('/shop/reservation-confirmation', [AdminController::class, 'confirmation']);
    Route::get('/shop/update', [AdminController::class, 'shopUpdate']);
    Route::post('/shop/update', [AdminController::class, 'editShopDetails']);
});