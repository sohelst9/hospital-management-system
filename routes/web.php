<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\HospitalController;
use App\Http\Controllers\Backend\Admin\LabTestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin route---
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login/store', [AdminController::class, 'login_store'])->name('admin.login.store');
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin.dashboard');
    //admin register
    Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('/register/store', [AdminController::class, 'register_store'])->name('admin.register.store');
    // hospital ----
    Route::resource('hospital', HospitalController::class)->middleware('roles');

    //categpry--
    Route::resource('category', CategoryController::class);
    Route::resource('labtest', LabTestController::class);
});
