<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnquiryController;
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



//get login form
Route::get('/login', [AdminController::class, 'login']);

//login Submit
Route::post('/login-submit', [UserController::class, 'loginSubmit'])->name('submitLogin');

Route::get('/', [HomeController::class, 'index']);

//book a table
Route::post('/book-a-table', [ReservationsController::class, 'reserveTable'])->name('bookTable');

//send an enquiry
Route::post('/send-message', [EnquiryController::class, 'sendEnquiry'])->name('sendMessage');
