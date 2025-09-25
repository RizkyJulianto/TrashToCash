<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\CashSubmissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MerchandiseSubmissionController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


Route::get('/dashboard/user', [DashboardController::class, 'index'])->name('user.dashboard');
Route::get('/dashboard/user/trash-submission', [TrashController::class, 'index'])->name('trash-submission');
Route::post('/dashboard/user/trash-submission', [TrashController::class, 'store'])->name('create.trash-submission');
Route::get('/dashboard/user/point-submission', [PointController::class, 'index'])->name('point-submission');
Route::get('/dashboard/user/history', [HistoryController::class, 'index'])->name('history');
Route::get('/dashboard/user/point-submission/product', [ProductController::class, 'index'])->name('product');
Route::get('/dashboard/user/point-submission/cash', [CashController::class, 'index'])->name('cash');

// Auth Routes

// Users
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [AuthController::class, 'attemptLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showUserRegisterForm'])->name('user.register');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register');
Route::get('/forgot-password', function() {
    return view('livewire.pages.auth.forgot-password');
})->name('forgot-password');

// Mitra
Route::get('/register/mitra', [AuthController::class, 'showMitraRegisterForm'])->name('mitra.register');
Route::post('/register/mitra', [AuthController::class, 'registerMitra'])->name('register.mitra');


Route::get('/dashboard/admin', function() {
    return view('dashboard.admin.admin');
})->name('admin.dashboard');

Route::get('/dashboard/mitra', function() {
    return view('dashboard.mitra.mitra');
})->name('mitra.dashboard');

