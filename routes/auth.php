<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {


    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

});

Route::middleware('auth')->group(function () {

    Route::get('experiance', [ExperienceController::class, 'index'])->name('experiance');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout'); {{-- --}}
});
