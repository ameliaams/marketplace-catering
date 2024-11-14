<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerchantController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:merchant'])->group(function () {
    Route::prefix('merchant')->group(function () {
        Route::controller(MerchantController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('merchant.dashboard');
            Route::get('/menu', 'menuKatering')->name('merchant.menu');
            Route::get('/menu/addMenu', 'create')->name('merchant.addmenu');
            Route::post('/menu/store', 'store')->name('merchant.store');
            Route::get('/menu/{food}/edit', 'edit')->name('merchant.edit');
            Route::put('/menu/{food}/update', 'update')->name('merchant.update');
            Route::delete('menu/{food}', 'destroy')->name('merchant.delete');
            Route::get('/order', 'orderList')->name('merchant.order');
        });
    });


    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->middleware('role:user')->name('user.dashboard');

});

// Route::prefix('attributes')->group(function () {
//     Route::controller(PayrollAttributeController::class)->group(function () {
//         Route::get('/', 'index');
//         Route::get('/{idPayrollAttribute}/edit', 'show');

//         Route::post('/edit', 'edit');
//         Route::post('/', 'store');
//     });
// });
