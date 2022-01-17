<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;
Route::prefix('admin')->name('admin.')->middleware('theme:admin')->group(function(){
    Route::View('/login', 'auth.login')->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'store'])->name('login');
    Route::get('/manage/users', [App\Http\Controllers\Admin\ManageUsersController::class, 'index'])->name('manage_users');
    Route::get('/manage/vehicle-type', [App\Http\Controllers\Admin\ManageVehicleTypeController::class, 'index'])->name('manage_vehicle_type');    
    Route::get('/manage/localities', [App\Http\Controllers\Admin\ManageLocalitiesController::class, 'index'])->name('manage_localities');
    Route::get('/manage/vehicles', [App\Http\Controllers\Admin\ManageVehicleController::class, 'index'])->name('manage_vehicles');
    Route::post('/manage/vehicles', [App\Http\Controllers\Admin\ManageVehicleController::class, 'insertData'])->name('addVehicle');
    Route::get('/manage/external_admins', [App\Http\Controllers\Admin\ManageExternalAdminController::class, 'index'])->name('manageExternalAdmins');
    Route::post('/manage/external_admins', [App\Http\Controllers\Admin\ManageExternalAdminController::class, 'addExternalAdmin'])->name('addExternalAdmin');
    
    
    Route::middleware(['auth:admin'])->group(function(){
        Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'destroy'])->name('admin.logout');
        Route::View('/home', 'home')->name('home');
    });
});
