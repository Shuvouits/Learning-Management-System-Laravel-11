<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\instructor\InstructorController;

use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');  */


Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');


Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/setting', [ProfileController::class, 'setting'])->name('setting');
    Route::post('/password/setting', [ProfileController::class, 'passwordSetting'])->name('passwordSetting');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');

    Route::post('/logout', [AdminController::class, 'destroy'])
        ->name('logout');
});


Route::middleware(['auth', 'verified', 'role:instructor'])->group(function () {
    Route::get('/instructor/dashboard', [InstructorController::class, 'dashboard'])->name('instructor.dashboard');
});

Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});


/*

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});  */

require __DIR__.'/auth.php';
