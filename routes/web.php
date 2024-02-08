<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserDashboardController;
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

Route::prefix('user')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('user.login.form');
    Route::post('login', [LoginController::class, 'login'])->name('user.login');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('user.register.form');
    Route::post('register', [RegisterController::class, 'register'])->name('user.register');
    Route::post('logout', [LoginController::class, 'logout'])->name('user.logout');
});

Route::prefix('admin')->group(function () {
    Route::get('register', [AdminController::class, 'showRegistrationForm'])->name('admin.register.form');
    Route::post('register', [AdminController::class, 'register'])->name('admin.register');
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('login', [AdminController::class, 'login'])->name('admin.login');
});

Route::get('user/dashboard', [UserDashboardController::class, 'index'])->name('home');
Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->middleware('auth:admin');

Route::get('tickets/new', [TicketController::class, 'new']);
Route::post('tickets/create', [TicketController::class, 'create'])->name('ticket.create');
Route::get('tickets', [TicketController::class, 'index'])->name('ticket.index');

//Auth::routes();
