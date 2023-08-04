<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerfiyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\UserCardController;
use App\Http\Controllers\Backend\CalculationController;
use App\Http\Controllers\Backend\JarController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// register
Route::get('/register', [RegisterController::class, 'registerPageShow'])->name('register');
Route::post('/register/store', [RegisterController::class, 'registerStore'])->name('register.store');
Route::get('/verify', [VerfiyController::class, 'verify'])->name('verify');
Route::post('/verify/send', [VerfiyController::class, 'verifySend'])->name('verify.send');
// login
Route::get('/login', [LoginController::class, 'loginPage'])->name('login');
Route::post('/login/store', [LoginController::class, 'loginStore'])->name('login.store');
Route::get('/logouts', [LoginController::class, 'logouts'])->name('logouts');


// admin panel start
Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('admin.dashboard');
});
Route::controller(AccountController::class)->group(function () {
    Route::get('/অ্যাকাউন্ট-ম্যানেজার', 'index')->name('admin.account.manager');
    Route::get('/অ্যাকাউন্ট-ম্যানেজার/পারমিশন/{id}', 'permission')->name('admin.account.manager.permission');
    Route::get('/অ্যাকাউন্ট-ম্যানেজার/destory/{id}', 'destroy')->name('admin.account.manager.destroy');
});
Route::controller(UserCardController::class)->group(function () {
    Route::get('/গ্রাহক-কার্ড', 'index')->name('admin.user.card');
    Route::post('/গ্রাহক-কার্ড/store', 'store')->name('admin.user.card.store');
    Route::get('/গ্রাহক-কার্ড/গ্রাহকের-তথ্য/{id}', 'show')->name('admin.user.card.show');
    Route::put('গ্রাহক-কার্ড/update/{id}', 'update')->name('admin.user.card.update');
    Route::get('/গ্রাহক-কার্ড/destory/{id}', 'destroy')->name('admin.user.card.destroy');
});
Route::controller(CalculationController::class)->group(function () {
    Route::post('/গ্রাহকের-হিসাব/store', 'store')->name('admin.customer.calculation.store');
    Route::get('/গ্রাহকের-হিসাব/ইডিট-করুন/{id}', 'edit')->name('admin.customer.calculation.edit');
    Route::put('/গ্রাহকের-হিসাব/update/{id}', 'update')->name('admin.customer.calculation.update');
    Route::get('/গ্রাহকের-হিসাব/destroy/{id}', 'destroy')->name('admin.customer.calculation.destroy');
});


Route::controller(JarController::class)->group(function () {
    Route::get('/জারের-দাম', 'index')->name('admin.jar.price');
    Route::post('/জারের-দাম/store', 'store')->name('admin.jar.store');
    Route::get('/জারের-দাম/ইডিট/{id}', 'edit')->name('admin.jar.edit');
    Route::put('/জারের-দাম/update/{id}', 'update')->name('admin.jar.update');
    Route::get('/জারের-দাম/delete/{id}', 'destroy')->name('admin.jar.destroy');
});

// admin panel end

