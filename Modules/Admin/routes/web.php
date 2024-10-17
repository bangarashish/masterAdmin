<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\DashboardController;
use Modules\Admin\Http\Controllers\UserController;
use Modules\Admin\Http\Controllers\ForgotPasswordController;
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

// Route::group([], function () {
//     Route::resource('admin', AdminController::class)->names('admin');
// });


// Route::get('admin', [AdminController::class, 'index'])->name('admin');
// Route::post('login', [AdminController::class, 'login'])->name('admin.login');

// Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
// Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// Route::middleware('admin.access')->group(function(){

//     Route::get('dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
//     Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
//     //  Users route
//     Route::get('user', [UserController::class, 'index'])->name('user.index');
//     Route::get('user/create', [UserController::class, 'create'])->name('user.create');
// });



Route::prefix('admin')->group(function(){ 
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::post('login', [AdminController::class, 'login'])->name('admin.login');
    
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
    Route::middleware('admin.access')->group(function(){
        Route::get('dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        // users
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    });
});


// Route::prefix('admin')->group(function() { 
//     // Public Routes
//     Route::get('/', [AdminController::class, 'index'])->name('admin');
//     Route::post('login', [AdminController::class, 'login'])->name('admin.login');

//     Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
//     Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
//     Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
//     Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//     // Protected Routes
//     Route::middleware('admin.access')->group(function() {
//         Route::get('dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
//         Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
//         Route::get('user', [UserController::class, 'index'])->name('user.index');
//         Route::get('user/create', [UserController::class, 'create'])->name('user.create');
//     });
// });



