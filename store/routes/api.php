<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UserController;

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
//Route::get('/products', [ProductController::class, 'index' ]);
//Route::get('/products/{id}', [ProductController::class, 'show' ]);
//Route::get('/invoices', [InvoiceController::class, 'index' ]);
//Route::get('/invoices/{id}', [InvoiceController::class, 'show' ]);



Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);
Route::resource('invoices', InvoiceController::class);



