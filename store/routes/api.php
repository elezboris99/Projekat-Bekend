<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\AuthController;


//Route::get('/products', [ProductController::class, 'index' ]);
//Route::get('/products/{id}', [ProductController::class, 'show' ]);
//Route::get('/invoices', [InvoiceController::class, 'index' ]);
//Route::get('/invoices/{id}', [InvoiceController::class, 'show' ]);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::resource('products', ProductController::class)->only('index', 'show');



Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {  return auth()->user();});

    Route::resource('/products', ProductController::class)->only(['update','store','destroy']);
    Route::resource('/invoices', InvoiceController::class);
    
    Route::resource('users', UserController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
});

