<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RentalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('api')->group(function () {

    Route::resource('customers', CustomerController::class);    
    Route::resource('games', GameController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order-items', OrderItemController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::resource('rentals', RentalController::class);

    Route::get('orders-report', 'App\Http\Controllers\ReportController@orders');
    Route::get('games-report', 'App\Http\Controllers\ReportController@games');
    Route::get('customers-report', 'App\Http\Controllers\ReportController@customers');
});
