<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');



//admin dashbord
Route::get('/admin',[AdminDashboardController::class, 'index']);





