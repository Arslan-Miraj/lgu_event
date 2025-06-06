<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/account/register', [AuthController::class, 'register'])->name('account.register');
Route::post('/account/register-process', [AuthController::class, 'registerProcess'])->name('account.registerProcess');

Route::get('/account/login', [AuthController::class, 'login'])->name('account.login');

// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::get('/signup', function () {
    return view('auth.signup');
});
