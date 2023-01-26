<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('orders')->group(function () {
        Route::get('', [OrderController::class, 'getList'])->name('orders.list');
        Route::post('', [OrderController::class, 'store'])->name('orders.create');
    });

    Route::prefix('products')->group(function () {
        Route::get('', [ProductController::class, 'getList'])->name('products.list');
    });
});