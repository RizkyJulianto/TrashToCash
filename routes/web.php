<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\CashSubmissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MerchandiseSubmissionController;
use App\Http\Controllers\mitra\ProductController;
use App\Http\Controllers\ProductSubmissionController;
use App\Http\Controllers\mitra\ProductVerificationController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\ShowTpsController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landingpage');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login', [AuthController::class, 'attemptLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'showUserRegisterForm'])->name('user.register');
    Route::post('/register', [AuthController::class, 'registerUser'])->name('register');
    Route::get('/register/mitra', [AuthController::class, 'showMitraRegisterForm'])->name('form-mitra.register');
    Route::post('/register/mitra', [AuthController::class, 'registerMitra'])->name('register.mitra');
    Route::get('/forgot-password', function () {
        return view('livewire.pages.auth.forgot-password');
    })->name('forgot-password');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// Users
Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/dashboard/user', [DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/dashboard/user/trash-submission', [TrashController::class, 'index'])->name('trash-submission');
    Route::post('/dashboard/user/trash-submission', [TrashController::class, 'store'])->name('add.trash-submission');
    Route::get('/dashboard/user/trash-submission/details/{id}', [TrashController::class, 'show'])->name('detail.trash-submission');
    Route::get('/dashboard/user/trash-submission/qrcode/download/{id}', [TrashController::class, 'downloadQrCode'])->name('download.qrcode');
    Route::get('/dashboard/user/add/trash-submission', [TrashController::class, 'create'])->name('form.trash-submission');
    Route::get('/dashboard/user/edit/trash-submission/{transaction}', [TrashController::class, 'edit'])->name('form-edit.trash-submission');
    Route::put('/dashboard/user/edit/trash-submission/{transaction}', [TrashController::class, 'update'])->name('edit.trash-submission');
    Route::post('/dashboard/user/trash-submission/cancel/{id}', [TrashController::class, 'cancel'])->name('cancel.trash-submission');
    Route::get('/dashboard/user/tps', [ShowTpsController::class, 'show'])->name('list.tps');
    Route::get('/dashboard/user/point-submission', [PointController::class, 'index'])->name('point-submission');
    Route::get('/dashboard/user/point-submission/products', [ProductSubmissionController::class, 'index'])->name('products');
    Route::get('/dashboard/user/point-submission/products/details/{id}', [PointController::class, 'show'])->name('detail.product-submission');
    Route::get('/dashboard/user/point-submission/cash/details/{id}', [PointController::class, 'show'])->name('detail.cash-submission');
    Route::post('/dashboard/user/point-submission/products/{product}', [ProductSubmissionController::class, 'redeem'])->name('redeem.products');
    Route::get('/dashboard/user/point-submission/redeem-options', [CashController::class, 'index'])->name('redeem.options');
    Route::get('/dashboard/user/point-submission/bank', [CashController::class, 'showBankForm'])->name('form.bank-reedem');
    Route::post('/dashboard/user/point-submission/bank', [CashController::class, 'store'])->name('add.bank-redeem');
    Route::get('/dashboard/user/point-submission/ewallet', [CashController::class, 'showEwalletForm'])->name('form.ewallet-reedem');
    Route::post('/dashboard/user/point-submission/ewallet', [CashController::class, 'storeWallet'])->name('add.wallet-redeem');

    Route::get('/dashboard/user/history', [HistoryController::class, 'index'])->name('history');
});






// Mitra
Route::middleware(['auth', 'role:Mitra'])->group(function () {
    Route::get('/dashboard/mitra', [DashboardController::class, 'index'])->name('mitra.dashboard');
    Route::get('/dashboard/mitra/products', [ProductController::class, 'index'])->name('list.product');
    Route::get('/dashboard/mitra/add/products', [ProductController::class, 'create'])->name('form.add-product');
    Route::post('/dashboard/mitra/add/products', [ProductController::class, 'store'])->name('add-product');
    Route::get('/dashboard/mitra/edit/products/{id}', [ProductController::class, 'edit'])->name('form.edit-product');
    Route::put('/dashboard/mitra/edit/products/{id}', [ProductController::class, 'update'])->name('edit-product');
    Route::delete('/dashboard/mitra/delete/products/{id}', [ProductController::class, 'destroy'])->name('delete-product');
    Route::get('/dashboard/mitra/products/details/{id}', [ProductController::class, 'show'])->name('detail.product');
    Route::get('/dashboard/mitra/products/submissions', [ProductVerificationController::class, 'index'])->name('list.product-submissions');
});

Route::middleware(['auth', 'role:Admin'])->group(function () {

    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin.admin');
    })->name('admin.dashboard');
});
