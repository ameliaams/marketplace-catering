<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\Merchant\MenuController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:merchant'])->group(function () {
    Route::prefix('merchant')->group(function () {
        Route::controller(MerchantController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('merchant.dashboard');
            Route::get('/order', 'orderList')->name('merchant.order');
            Route::get('/profile', 'showProfile')->name('merchant.profile');
        });
        Route::controller(MenuController::class)->group(function () {
            Route::get('/menu', 'menuKatering')->name('merchant.menu');
            Route::get('/menu/addMenu', 'create')->name('merchant.addmenu');
            Route::post('/menu/store', 'store')->name('merchant.store');
            Route::get('/menu/{food}/edit', 'edit')->name('merchant.edit');
            Route::put('/menu/{food}/update', 'update')->name('merchant.update');
            Route::delete('menu/{food}', 'destroy')->name('merchant.delete');
        });
    });
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::controller(CustomerController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('user.dashboard');
            Route::get('/catering', 'menuKatering')->name('user.catering');
        });
    });
});
