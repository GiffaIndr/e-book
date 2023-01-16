<?php

use App\Http\Controllers\CommerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['islogin'])->group(function(){
    Route::get('/landing', [CommerController::class, 'index'])->name('landing');
    Route::get('/dashboard/admin/data', [CommerController::class, 'data'])->name('data');
Route::get('/dashboard/admin/users', [CommerController::class, 'users'])->name('users');
Route::get('/dashboard/admin/category', [CommerController::class, 'category'])->name('category');
Route::get('/dashboard/admin', [CommerController::class, 'admin'])->name('dashboard.admin');
Route::get('/landing/screen/{id}', [commerController::class, 'screen'])->name('screen');
Route::get('/screen/pdf/input/{id}', [CommerController::class, 'pdf'])->name('pdf.input');
Route::post('/dashboard/admin/store', [CommerController::class, 'store'])->name('store');
Route::delete('/delete/{id}', [CommerController::class, 'destroy'])->name('delete');
});

Route::get('/logout', [CommerController::class, 'logout'])->name('logout');

Route::middleware(['isguest'])->group(function(){
    Route::get('/', [CommerController::class, 'index'])->name('landing');
    Route::get('/errorlogin', [CommerController::class, 'errorlogin'])->name('errorlogin');
    Route::get('/login', [CommerController::class, 'login'])->name('login');
    Route::get('/register', [CommerController::class, 'register'])->name('register');
    Route::post('/register/input', [CommerController::class, 'registeraccount'])->name('register.input');
Route::post('/login/auth', [CommerController::class, 'auth'])->name('login.auth');
});






