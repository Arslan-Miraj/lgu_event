<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SocietyDashboard;
use App\Http\Controllers\SocietiesController;
use App\Http\Controllers\SuperAdminDashboardController;

Route::get('/event_detail', function () {
    return view('society_admin.event_details');
});

Route::get('/event_list', function () {
    return view('society_admin.event_list');
}); 
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/upcoming-events', [HomeController::class, 'upcoming_events'])->name('upcoming_events');

Route::get('/account/register', [AuthController::class, 'register'])->name('account.register');
Route::post('/account/register-process', [AuthController::class, 'registerProcess'])->name('account.registerProcess');

Route::get('/account/login', [AuthController::class, 'login'])->name('account.login');
Route::post('/account/login-process', [AuthController::class, 'loginProcess'])->name('account.loginProcess');

Route::post('/logout', [AuthController::class, 'logout'])->name('account.logout');


// Super Admin Routes
Route::middleware(['super_admin'])->group(function () {
    Route::get('/super_admin/dashboard', [SuperAdminDashboardController::class, 'index'])->name('super.admin.dashboard');
    Route::get('/super_admin/societies', [SuperAdminDashboardController::class, 'societies_list'])->name('super.admin.societies_list');
    Route::get('/super_admin/societies/{id}/edit', [SuperAdminDashboardController::class, 'edit'])->name('super.admin.edit_society');
    Route::put('/super_admin/societies/{id}', [SuperAdminDashboardController::class, 'update'])->name('super.admin.update_society');
    Route::delete('/super_admin/societies/{id}', [SuperAdminDashboardController::class, 'delete'])->name('super.admin.delete_society');


    Route::get('/super_admin/assign_admin', function () {
        return view('admin.assign_admin');
    })->name('assign.admin');

    Route::get('/super_admin/add_society', function () {
        return view('admin.add_society');
    })->name('super.admin.addSociety');
    Route::post('/super_admin/registerSociety', [SocietiesController::class, 'registerSociety'])->name('registerSociety');

    
    Route::get('/super_admin/lists', function () {
        return view('admin.society_lists');
    })->name('view.events');
});

// Society Admin Routes
Route::middleware(['society_admin'])->group(function () {
    Route::get('/admin/dashboard', [SocietyDashboard::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/head_profile', [SocietyDashboard::class, 'viewHeadProfile'])->name('admin.viewHeadProfile');
    Route::post('/admin/update_head_profile', [SocietyDashboard::class, 'updateHeadProfile'])->name('admin.updateHeadProfile');

    Route::get('/admin/society_profile', [SocietiesController::class, 'viewSocietyProfile'])->name('admin.viewSocietyProfile');
    Route::post('/admin/update_society_profile', [SocietiesController::class, 'updateSocietyProfile'])->name('admin.updateSocietyProfile');

    Route::get('/admin/society_member_profile', [SocietiesController::class, 'viewSocietyMemberProfile'])->name('admin.viewSocietyMemberProfile');
    


    Route::get('/admin/event', [EventController::class, 'index'])->name('admin.viewEvent');
    Route::post('/admin/create-event', [EventController::class, 'create_event'])->name('admin.createEvent');

});

// Route::get('/admin/dashboard', [SocietyDashboard::class, 'index']);


// Route::get('/count', [SuperAdminDashboardController::class, 'showSocieties']);