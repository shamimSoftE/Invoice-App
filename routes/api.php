<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get_all_invoice', [InvoiceController::class, 'index']);
Route::get('/search_invoice', [InvoiceController::class, 'search']);
Route::get('/create_invoice', [InvoiceController::class, 'create']);

// customer all list
Route::get('get_all_customer',[CustomerController::class, 'customerList']);
Route::get('/search_customer',[CustomerController::class, 'customerSearch']);
Route::post('/customer_store',[CustomerController::class, 'customerStore']);
Route::get('/customer/edit/{id}',[CustomerController::class, 'customerEdit']);
Route::post('/customer/update',[CustomerController::class, 'customerUpdate']);
Route::get('/customer/delete/{id}',[CustomerController::class, 'customerDelete']);
