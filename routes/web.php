<?php

use App\Http\Controllers\CashierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EnquiryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OrderController;
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
Route::get('/login', [UserController::class, 'login'])->name('login');

//login Submit
Route::post('/login-submit', [UserController::class, 'submitLogin'])->name('submitLogin');

// Order Dashboard
Route::get('/order-dashboard/{pk?}', [OrderController::class, 'create'])->middleware('auth')->name('orderDashboard');

//order billing
Route::get('/bill/{id}', [CashierController::class, 'billDashboard'])->middleware('auth')->name('billDashboard');


//Cashier Dashboard
Route::get('/cashier-dashboard', [CashierController::class, 'create'])->middleware('auth')->name('cashierDashboard');

Route::get('/', [HomeController::class, 'index'])->name('index');

//Manager Dashboard
Route::get('/manager-dashboard', [ManagerController::class, 'create'])->middleware('auth')->name('managerDashboard');


//book a table
Route::post('/book-a-table', [ReservationsController::class, 'reserveTable'])->name('bookTable');

//send an enquiry
Route::post('/send-message', [EnquiryController::class, 'sendEnquiry'])->name('sendMessage');
