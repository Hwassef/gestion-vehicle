<?php
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Select2Dropdown;
Route::get('/vehicles', [App\Http\Controllers\User\VehiclesController::class, 'index'])->name('vehicles_list');
Route::get('/vehicles/reserve/{id}', [App\Http\Controllers\User\VehiclesController::class, 'displayReserveVehicle'])->name('reserve_vehicle_page');
Route::post('/vehicles/reserve/{id}', [App\Http\Controllers\User\VehiclesController::class, 'reserveVehicle'])->name('userReserveVehicle');
Route::get('/reservations', [App\Http\Controllers\User\ReservationController::class, 'index'])->name('user.showReservations');
Route::get('/notify', function(){
    event(new App\Events\adminApproved('Congratulation Your Reservation Has Been Approved'));
    return "Event Has Been Sent";
})
?>
