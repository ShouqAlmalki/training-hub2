<?php
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;

Route::middleware(['auth', RoleMiddleware::class])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    // Add more student-specific routes here
});
