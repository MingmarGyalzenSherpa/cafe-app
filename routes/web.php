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
use App\Models\Enquiry;
use App\Models\Reservations;

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


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/login', [UserController::class, 'login'])->name('login');

//login Submit
Route::post('/login-submit', [UserController::class, 'submitLogin'])->name('submitLogin');

//Order Table Dashboard
Route::get('/order-table', [OrderController::class, 'createOrderTable'])->middleware('auth')->name('orderTableDashboard');

// Order Dashboard
Route::get('/order-dashboard/table/{tableID}/cat/{catID?}', [OrderController::class, 'createOrder'])->middleware('auth')->name('orderDashboard');

//Add Order
Route::post('/add-order', [OrderController::class, 'addOrder'])->middleware('auth')->name('addOrder');

//confirm order
Route::get('/confirm-order/table/{tableID}', [OrderController::class, 'confirmOrder'])->middleware('auth')->name('confirmOrder');



//Cashier Dashboard
Route::get('/cashier-dashboard', [CashierController::class, 'create'])->middleware("auth")->name('cashierDashboard');

//Cashier billing
Route::get('/bill/{id}', [CashierController::class, 'billDashboard'])->middleware('auth')->name('billDashboard');

//bill Payment
Route::get('/bill-payment/{id}/{total}', [CashierController::class, 'billPayment'])->middleware('auth')->name('billPayment');

//confirm payment
Route::post('/confirm-payment', [CashierController::class, 'confirmPayment'])->middleware('auth')->name('confirmPayment');


//incre/decre in quantity in bill 
Route::get('/bill/increase-qty/{id}', [CashierController::class, 'increaseQty'])->middleware('auth')->name('increaseQty');
Route::get('/bill/decrease-qty/{id}', [CashierController::class, 'decreaseQty'])->middleware('auth')->name('decreaseQty');


//Manager Dashboard
Route::get('/manager-dashboard', [ManagerController::class, 'create'])->middleware('auth')->name('managerDashboard');

//categories list
Route::get('/categories', [ManagerController::class, 'showCategories'])->middleware('auth')->name('showCategories');

//add-category
Route::post('/add-category', [ManagerController::class, 'addCategory'])->middleware('auth')->name('addCategory');

//edit-category
Route::get('/edit-category/{id}', [ManagerController::class, 'editCategory'])->middleware('auth')->name('editCategory');

//save-edited-category
Route::post('/save-edit-category', [ManagerController::class, 'saveEditCategory'])->middleware('auth')->name('saveEditCategory');

//delete-category
Route::get('/delete-category', [ManagerController::class, 'deleteCategory'])->middleware('auth')->name('deleteCategory');

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

//show reservations
Route::get('/show-reservations/{status?}', [ManagerController::class, 'showReservations'])->middleware('auth')->name('showReservations');

//approve reservations
Route::get('/approve-reservation/{id}', [ReservationsController::class, 'approveReservation'])->middleware('auth')->name('approveReservation');

//delete reservations
Route::get('/delete-reservations/{id}', [ReservationsController::class, 'deleteReservation'])->middleware('auth')->name('deleteReservation');


//send an enquiry
Route::post('/send-message', [EnquiryController::class, 'sendEnquiry'])->name('sendMessage');

//show enquiry
Route::get('/show-message', [ManagerController::class, 'showMessages'])->middleware('auth')->name('showMessages');

//delete message
Route::get('/delete-message/{id}', [EnquiryController::class, 'deleteMessage'])->middleware('auth')->name('deleteMessage');
