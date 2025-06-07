<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocietiesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/account/register', [AuthController::class, 'register'])->name('account.register');
Route::post('/account/register-process', [AuthController::class, 'registerProcess'])->name('account.registerProcess');

Route::get('/account/login', [AuthController::class, 'login'])->name('account.login');
Route::post('/account/login-process', [AuthController::class, 'loginProcess'])->name('account.loginProcess');

Route::post('/logout', [AuthController::class, 'logout'])->name('account.logout');


// Super Admin Routes
Route::middleware(['super_admin'])->group(function () {
    Route::get('/super_admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('super.admin.dashboard');

    Route::get('/super_admin/assign_admin', function () {
        return view('admin.assign_admin');
    })->name('assign.admin');

    Route::get('/super_admin/add_society', function () {
        return view('admin.add_society');
    })->name('super.admin.addSociety');
    Route::post('/super_admin/registerSociety', [SocietiesController::class, 'registerSociety'])->name('registerSociety');

    
    Route::get('/super_admin/view_events', function () {
        return view('admin.view_events');
    })->name('view.events');
});


Route::get('/admin', function () {
    return "Admin Page";
})->name('admin.dashboard');