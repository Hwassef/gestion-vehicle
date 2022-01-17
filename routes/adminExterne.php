<?php

use Illuminate\Support\Facades\Route;
Route::prefix('/admin_externe')->name('adminExterne.')->middleware('theme:AdminExterne')->namespace('AdminExterne')->group(function(){
    Route::View('/dashboard', 'home')->name('home');
    Route::View('/login', 'auth.login')->name('login');

        
     
  });


     //Login Routes
     Route::post('/admin_externe/login',[App\Http\Controllers\AdminExterne\Auth\LoginController::class, 'login'])->name('AdminExterne.loginForm');
    // Route::post('/logout',[App\Http\Controllers\AdminExterne\Auth\LoginController::class, 'logout'])->name('logout'); 