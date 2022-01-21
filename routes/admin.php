<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;
Route::prefix('admin')->name('admin.')->middleware('theme:admin')->group(function(){
    Route::View('/login', 'auth.login')->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'store'])->name('login');
    Route::get('/manage/users', [App\Http\Controllers\Admin\ManageUsersController::class, 'index'])->name('manage_users');
    Route::get('/manage/vehicle-type', [App\Http\Controllers\Admin\ManageVehicleTypeController::class, 'index'])->name('manage_vehicle_type');
    Route::get('/manage/localities', [App\Http\Controllers\Admin\ManageLocalitiesController::class, 'index'])->name('manage_localities');
    Route::post('/manage/localities/deleted', [App\Http\Controllers\Admin\ManageLocalitiesController::class, 'destroy'])->name('deleteLocality');
    Route::post('/manage/localities/added', [App\Http\Controllers\Admin\ManageLocalitiesController::class, 'addLocality'])->name('addLocality');
    Route::post('/manage/localities/updated', [App\Http\Controllers\Admin\ManageLocalitiesController::class, 'updateLocality'])->name('updateLocality');
    Route::get('/manage/vehicles', [App\Http\Controllers\Admin\ManageVehicleController::class, 'index'])->name('manage_vehicles');
    Route::post('/manage/vehicles', [App\Http\Controllers\Admin\ManageVehicleController::class, 'insertData'])->name('addVehicle');
    Route::post('/manage/vehicles/deleted', [App\Http\Controllers\Admin\ManageVehicleController::class, 'destroy'])->name('deleteVehicle');
    Route::post('/manage/vehicles/updated', [App\Http\Controllers\Admin\ManageVehicleController::class, 'updateVehicle'])->name('updateVehicle');
    Route::get('/manage/external_admins', [App\Http\Controllers\Admin\ManageExternalAdminController::class, 'index'])->name('manageExternalAdmins');
    Route::post('/manage/external_admins', [App\Http\Controllers\Admin\ManageExternalAdminController::class, 'addExternalAdmin'])->name('addExternalAdmin');
    Route::post('/manage/external_admins/deleted', [App\Http\Controllers\Admin\ManageExternalAdminController::class, 'destroy'])->name('deleteExternalAdmin');
    Route::post('/manage/external_admins/updated', [App\Http\Controllers\Admin\ManageExternalAdminController::class, 'updateExternalAdmin'])->name('updateExternalAdmin');
    Route::get('/manage/reservations', [App\Http\Controllers\Admin\ManageReservationsController::class, 'index'])->name('manageReservations');
    Route::post('/manage/reservations', [App\Http\Controllers\Admin\ManageReservationsController::class, 'approveReservation'])->name('approveReservation');
    Route::post('/manage/reservationas', [App\Http\Controllers\Admin\ManageReservationsController::class, 'diapproveReservation'])->name('disapproveReservation');
    Route::get('/clients_letter', [App\Http\Controllers\Admin\ManageClientsLetterController::class, 'index'])->name('manageClientsLetter');
    Route::get('/clients_letter/{id}', [App\Http\Controllers\Admin\ManageClientsLetterController::class, 'fullLetter'])->name('fullClientLetter');
    Route::post('/clients_letter/{id}', [App\Http\Controllers\Admin\ManageClientsLetterController::class, 'answerLetter'])->name('answerLetter');
    Route::get('/reservations', [App\Http\Controllers\Admin\ConsultReservationsController::class, 'index'])->name('displayReservations');
    Route::post('/manage/users',[App\Http\Controllers\Admin\ManageUsersController::class, 'Destroy'])->name('deleteUser');
    Route::post('/manage/vehicle-type',[App\Http\Controllers\Admin\ManageVehicleTypeController::class, 'addData'])->name('addVehicleType');
    Route::post('/manage/vehicle-type/updated',[App\Http\Controllers\Admin\ManageVehicleTypeController::class, 'updateVehicleType'])->name('updateVehicleType');
    Route::post('/manage/vehicle-type/deleted',[App\Http\Controllers\Admin\ManageVehicleTypeController::class, 'destroy'])->name('deleteVehicleType');
    Route::middleware(['auth:admin'])->group(function(){
        Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'destroy'])->name('admin.logout');
        Route::View('/home', 'home')->name('home');
    });
});
