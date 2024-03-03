<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;




Route::get('/', [App\Http\Controllers\ProjectController::class, 'index'])->name('index');
Route::post('showAppointment/{id}', [App\Http\Controllers\ProjectController::class, 'showAppointment'])->name('showAppointment')->middleware('auth');
Route::post('booking', [App\Http\Controllers\ProjectController::class, 'booking'])->name('booking')->middleware('auth');
Route::get('/myBookings', [App\Http\Controllers\ProjectController::class, 'myBookings'])->name('myBookings')->middleware('auth');
Route::delete('/cancelBooking', [App\Http\Controllers\ProjectController::class, 'cancelBooking'])->name('cancelBooking')->middleware('auth');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
