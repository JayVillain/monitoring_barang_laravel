<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| Routes yang bisa diakses tanpa login
|
*/

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Halaman login admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// Logout admin
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


/*
|--------------------------------------------------------------------------
| Protected Routes (Admin Only)
|--------------------------------------------------------------------------
|
| Routes ini hanya bisa diakses setelah login admin
|
*/
Route::middleware(['admin.auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD Barang
    Route::resource('items', ItemController::class);

    // CRUD Transaksi
    Route::resource('transactions', TransactionController::class);

});