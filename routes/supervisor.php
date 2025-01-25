<?php 
use App\Http\Controllers\Supervisor\ChatController;
use App\Http\Middleware\CheckIfUserIsSupervisor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Supervisor\SupervisorController;

Route::middleware(['auth', CheckIfUserIsSupervisor::class])->group(function () {
    Route::get('/dashboard', [SupervisorController::class, 'index'])->name('supervisor.dashboard');
    // Add more supervisor-specific routes here
    Route::post('/student/plan-report/{id}/reject', [SupervisorController::class, 'reject'])->name('supervisor.planForm.reject');
    Route::post('/student/plan-report/{id}/accept', [SupervisorController::class, 'accept'])->name('supervisor.planForm.accept');

    Route::post('/student/weekly-report/{id}/reject', [SupervisorController::class, 'rejectWeeklyReport'])->name('supervisor.weeklyForm.reject');
    Route::post('/student/weekly-report/{id}/accept', [SupervisorController::class, 'acceptWeeklyReport'])->name('supervisor.weeklyForm.accept');

    Route::post('/student/final-report/{id}/reject', [SupervisorController::class, 'rejectFinalReport'])->name('supervisor.finalForm.reject');
    Route::post('/student/final-report/{id}/accept', [SupervisorController::class, 'acceptFinalReport'])->name('supervisor.finalForm.accept');

    Route::post('/student/exp-report/{id}/reject', [SupervisorController::class, 'rejectExpReport'])->name('supervisor.expForm.reject');
    Route::post('/student/exp-report/{id}/accept', [SupervisorController::class, 'acceptExpReport'])->name('supervisor.expForm.accept');

    Route::get('/chat', [ChatController::class, 'index'])->name('supervisor.chat');
    Route::get('/chat/{studentId}', [ChatController::class, 'start'])->name('supervisor.start.chat');
    Route::post('/chat/{studentId}/send', [ChatController::class, 'send'])->name('supervisor.chat.send');


    Route::post('/send/notification', [SupervisorController::class, 'sendNotificationToStudent'])->name('supervisor.send.notification');
});