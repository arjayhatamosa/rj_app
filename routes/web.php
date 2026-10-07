<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);


Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);


Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| User Management
|--------------------------------------------------------------------------
*/

Route::resource('users', UserController::class)
    ->middleware(['auth', 'role:Administrator']);


/*
|--------------------------------------------------------------------------
| Rooms & Cottages Management
|--------------------------------------------------------------------------
*/

Route::resource('rooms', RoomController::class)
    ->middleware(['auth', 'role:Administrator,Manager,Resort Staff']);

Route::resource('reservations', ReservationController::class)
    ->middleware('auth');