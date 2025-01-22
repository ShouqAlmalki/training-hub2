<?php 
use App\Http\Middleware\CheckIfUserIsSupervisor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Supervisor\SupervisorController;

Route::middleware(['auth', CheckIfUserIsSupervisor::class])->group(function () {
    Route::get('/dashboard', [SupervisorController::class, 'index'])->name('supervisor.dashboard');
    // Add more supervisor-specific routes here
});