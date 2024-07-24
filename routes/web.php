<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthRouteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('client.layouts.master');
// });

// Route::get('login',                     [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('login',                    [AuthController::class, 'login']);

// Route::get('register',                  [AuthController::class, 'showRegisterForm'])->name('register');
// Route::post('register',                 [AuthController::class, 'register']);

// Route::post('logout',                   [AuthController::class, 'logout'])->name('logout');

// Route::get('password/reset',            [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
// Route::post('password/email',           [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

// // Route đặt lại mật khẩu
// Route::get('password/reset/{token}',    [AuthController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset',           [AuthController::class, 'reset'])->name('password.update');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
