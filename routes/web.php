<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;





// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('admin.dashboard');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});

// Frontend routes
Route::get('/', [ProductController::class, 'showFrontendProducts'])->name('frontend.products');

















