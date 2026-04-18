<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;

Route::get('/admin/login', [AdminAuthController::class,'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class,'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class,'logout'])->name('admin.logout');

Route::middleware(['admin.auth'])->group(function(){
    Route::get('/dashboard', function(){ return view('dashboard'); })->name('dashboard');
    Route::resource('items', ItemController::class);
    Route::resource('transactions', TransactionController::class);
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
