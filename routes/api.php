<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomFieldController;

// Public routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);

// Cart routes
Route::post('/cart/add', [CartController::class, 'addToCart']);
Route::get('/cart', [CartController::class, 'getCart']);
Route::put('/cart/update/{cartItem}', [CartController::class, 'updateCartItem']);
Route::delete('/cart/remove/{cartItem}', [CartController::class, 'removeCartItem']);

// Admin routes - protected with middleware
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    // Product management
    Route::resource('admin/products', ProductController::class)->except(['index', 'show']);

    // Category management
    Route::resource('admin/categories', CategoryController::class)->except(['index', 'show']);
    Route::post('admin/categories/bulk-import', [CategoryController::class, 'bulkImport']);

    // Custom field management
    Route::resource('admin/custom-fields', CustomFieldController::class);
});
