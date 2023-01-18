<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\HospitalController;
use App\Http\Controllers\Backend\Admin\LabTestController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\DashbaordController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//frontend---
Route::get('/', [FrontendController::class, 'index'])->name('index');
// Route::post('/get_category', [FrontendController::class, 'get_category'])->name('get.category');
Route::get('/hospital/{id}/category', [FrontendController::class, 'category'])->name('single.category');
Route::get('/hospital/category/{id}/labtest', [FrontendController::class, 'labtest'])->name('labtest');
Route::get('/hospital/category/labtest/single/{id}', [FrontendController::class, 'single_labtest'])->name('single.labtest');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/all_labs/test', [FrontendController::class, 'all_labs_test'])->name('all_labs.test');
Route::get('/appointment_page', [FrontendController::class, 'appointment_page'])->name('appointment_page');
Route::middleware('web')->group(function(){
    Route::post('cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::get('/dashboard', [DashbaordController::class, 'dashbaord'])->name('frontend.dashboard');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('/test/list', [DashbaordController::class, 'order_list'])->name('order.list');
    Route::get('/test/report/view/{id}', [DashbaordController::class, 'test_report_view'])->name('test.report.view');
    Route::get('/user/appointment/report', [DashbaordController::class, 'user_appointment_report'])->name('user.appointment.report');
    Route::post('/appiontmant', [FrontendController::class, 'appiontmant'])->name('appiontmant');
});
// admin route---
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login/store', [AdminController::class, 'login_store'])->name('admin.login.store');
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::get('/labtest/report', [LabTestController::class, 'labtest_report'])->name('admin.labtest.report');
    Route::get('/testreport/status/{id}', [LabTestController::class, 'test_status'])->name('admin.testreport.status');
    Route::get('/testreport/create/{id}', [LabTestController::class, 'report_create'])->name('labtest.report.create');
    Route::post('/testreport/store', [LabTestController::class, 'testreport_store'])->name('admin.test.report.store');


    Route::get('/appointment/list', [DashboardController::class, 'appointment_list'])->name('admin.appointment');
    Route::get('/appointment/status/{id}', [DashboardController::class, 'appointment_status'])->name('admin.appointment.status');

    Route::middleware('roles')->group(function () {
        //admin register
        Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
        Route::post('/register/store', [AdminController::class, 'register_store'])->name('admin.register.store');
        // hospital ----
        Route::resource('hospital', HospitalController::class);
    });


    //categpry--
    Route::resource('category', CategoryController::class);
    Route::post('/getcategory', [CategoryController::class, 'getcategory'])->name('hospital.based.category');
    Route::resource('labtest', LabTestController::class);
});
