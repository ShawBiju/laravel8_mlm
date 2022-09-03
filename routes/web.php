<?php

use Illuminate\Support\Facades\Route;

// User Panel Start
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
// User Panel End

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

// User Panel Start
Route::get('/', [HomeController::class, 'index'])->name('user.home'); 
Route::get('/login', [LoginController::class, 'index'])->name('user.login');
Route::get('/register', [RegisterController::class, 'index'])->name('user.register');
Route::post('/search-sponsor', [RegisterController::class, 'search_sponsorid'])->name('search.sponsorid');
Route::post('/store', [RegisterController::class, 'store'])->name('user.store');
// User Panel End
