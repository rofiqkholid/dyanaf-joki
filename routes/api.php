<?php

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

// Payment API
Route::post('/payment/checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('api.payment.checkout');
Route::post('/payment/checkout-cv', [App\Http\Controllers\OrderController::class, 'checkoutCV'])->name('api.payment.checkout.cv');
Route::post('/payment/cancel', [App\Http\Controllers\OrderController::class, 'cancel'])->name('api.payment.cancel');
Route::post('/payment/success', [App\Http\Controllers\OrderController::class, 'success'])->name('api.payment.success');

// Core API Payment
Route::post('/payment/core/charge', [App\Http\Controllers\OrderController::class, 'coreCharge'])->name('api.payment.core.charge');
Route::get('/payment/status/{orderId}', [App\Http\Controllers\OrderController::class, 'checkStatus'])->name('api.payment.status');


// Public API (if needed)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
