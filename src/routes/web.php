<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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
Route::get('/done', [ShopController::class, 'done']);
Route::get('/detail', [ShopController::class, 'detail']);
Route::get('/thanks', [AuthController::class, 'thanks']);
Route::get('/mypage', [UserController::class, 'mypage']);