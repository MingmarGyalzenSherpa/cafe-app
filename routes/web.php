<?php

use App\Http\Controllers\CashierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EnquiryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\ItemsController;
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

//Order Table Dashboard
Route::get('/order-table', [OrderController::class, 'createOrderTable'])->middleware('auth')->name('orderTableDashboard');

// Order Dashboard
Route::get('/order-dashboard/table/{tableID}/cat/{catID?}', [OrderController::class, 'createOrder'])->middleware('auth')->name('orderDashboard');

//Add Order
Route::post('/add-order', [OrderController::class, 'addOrder'])->middleware('auth')->name('addOrder');



//Cashier Dashboard
Route::get('/cashier-dashboard', [CashierController::class, 'create'])->middleware("auth")->name('cashierDashboard');

//Cashier billing
Route::get('/bill/{id}', [CashierController::class, 'billDashboard'])->middleware('auth')->name('billDashboard');

Route::get('/bill/increase-qty/{id}', [CashierController::class, 'increaseQty'])->middleware('auth')->name('increaseQty');
Route::get('/bill/decrease-qty/{id}', [CashierController::class, 'decreaseQty'])->middleware('auth')->name('decreaseQty');




Route::get('/', [HomeController::class, 'index'])->name('index');

//Manager Dashboard
Route::get('/manager-dashboard', [ManagerController::class, 'create'])->middleware('auth')->name('managerDashboard');

//categories list
Route::get('/categories', [ManagerController::class, 'showCategories'])->middleware('auth')->name('showCategories');

//employee list
Route::get('/employees', [ManagerController::class, 'showEmployees'])->middleware('auth')->name('showEmployees');

//items dashboard
Route::get('/items/', [ManagerController::class, 'showItems'])->middleware('auth')->name('showItems');

//add-item
Route::post('/add-item', [ItemsController::class, 'addItem'])->middleware('auth')->name('addItem');

//edit-item
Route::get('/edit-item/{id}', [ManagerController::class, 'editItem'])->middleware('auth')->name('editItem');

//save-edit-item
Route::post('/save-edit-item', [ManagerController::class, 'saveEditItem'])->middleware('auth')->name('saveEditItem');

//delete-item
Route::get('/delete-item/', [ManagerController::class, 'deleteItem'])->middleware('auth')->name('deleteItem');

//book a table
Route::post('/book-a-table', [ReservationsController::class, 'reserveTable'])->name('bookTable');

//send an enquiry
Route::post('/send-message', [EnquiryController::class, 'sendEnquiry'])->name('sendMessage');
