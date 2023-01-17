<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\HospitalController;
use App\Http\Controllers\Backend\Admin\LabTestController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//frontend---
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/hospital/{id}/category', [FrontendController::class, 'category'])->name('single.category');
Route::get('/hospital/category/{id}/labtest', [FrontendController::class, 'labtest'])->name('labtest');
Route::get('/hospital/category/labtest/single/{id}', [FrontendController::class, 'single_labtest'])->name('single.labtest');
// admin route---
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login/store', [AdminController::class, 'login_store'])->name('admin.login.store');
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::middleware('roles')->group(function () {
        //admin register
        Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
        Route::post('/register/store', [AdminController::class, 'register_store'])->name('admin.register.store');
        // hospital ----
        Route::resource('hospital', HospitalController::class);
    });


    //categpry--
    Route::resource('category', CategoryController::class);
    Route::resource('labtest', LabTestController::class);
});
