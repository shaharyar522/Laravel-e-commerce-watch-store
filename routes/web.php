<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});






//admin dashbord
Route::get('/admin',[AdminDashboardController::class, 'index'])->name('home');


//Product controller

Route::get('/product', [ProductController::class , 'index'])->name('products.index');
Route::post('/productstore', [ProductController::class , 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit']);








