<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\ReservationsController;

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
    return view('authentication/login');
});

//login user
Route::post('/login-user', [UserController::class, 'loginUser'])->name('loginUser');

Route::get('/', [HomeController::class, 'index']);

//book a table
Route::post('/book-a-table', [ReservationsController::class, 'reserveTable'])->name('bookTable');