<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });



// Show registration/login page
Route::get('/auth', [UserAuthController::class, 'show'])->name('user.auth');

// Show registration/login page
Route::get('/register', [UserAuthController::class, 'showRegistration'])->name('user.register');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.register.post');


Route::get('/login', [UserAuthController::class, 'showLogin'])->name('user.login');
Route::post('/login', [UserAuthController::class, 'login'])->name('user.login.post');


// Frontend routes
Route::get('/', [AdminDashboardController::class, 'showFrontendProducts'])
->name('home')
->middleware(['user.role:user']);


// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/products', [AdminDashboardController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [AdminDashboardController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [AdminDashboardController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [AdminDashboardController::class, 'destroy'])->name('products.destroy');
});




