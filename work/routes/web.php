<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckInController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/check-ins', [CheckInController::class, 'index'])->name('check-ins.index');
    Route::post('/check-ins/clock-in', [CheckInController::class, 'clockIn'])->name('check-ins.clock-in');
    Route::post('/check-ins/check-in/{period}', [CheckInController::class, 'checkIn'])->name('check-ins.check-in');
    Route::get('/check-ins/history', [CheckInController::class, 'history'])->name('check-ins.history');
    Route::post('/check-ins/clock-out', [CheckInController::class, 'clockOut'])->name('check-ins.clock-out');
});

// Login routes
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
// Register routes
Route::get('/register', function () {
    return view('register');
});