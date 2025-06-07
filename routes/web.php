<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/account/register', [AuthController::class, 'register'])->name('account.register');
Route::post('/account/register-process', [AuthController::class, 'registerProcess'])->name('account.registerProcess');

Route::get('/account/login', [AuthController::class, 'login'])->name('account.login');
Route::post('/account/login-process', [AuthController::class, 'loginProcess'])->name('account.loginProcess');

Route::post('/logout', [AuthController::class, 'logout'])->name('account.logout');


Route::get('/super_admin/dashboard', function () {
    return view('admin.dashboard');
})->name('super.admin.dashboard');

Route::get('/assign_admin', function () {
    return view('admin.assign_admin');
});

Route::get('/admin', function () {
    return "Admin Page";
})->name('admin.dashboard');


Route::get('/add_society', function () {
    return view('admin.add_society');
});

Route::get('/view_events', function () {
    return view('admin.view_events');
});