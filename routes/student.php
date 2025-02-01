<?php
use App\Http\Controllers\Student\FinalReportController;
use App\Http\Controllers\Student\OrgRatingController;
use App\Http\Controllers\Student\StudentChatController;
use App\Http\Controllers\Student\WebsiteRatingController;
use App\Http\Controllers\Student\WeeklyReportController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\PlanReportController;

Route::middleware(['auth', RoleMiddleware::class])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/plan-form', [PlanReportController::class,'create'])->name('student.plan-form');
    Route::post('/create-plan-form', [PlanReportController::class,'store'])->name('student.plan-form.store');
    Route::get('/weekly-form', [WeeklyReportController::class,'create'])->name('student.weekly-form');
    Route::post('/create-weekly-form', [WeeklyReportController::class,'store'])->name('student.weekly-form.store');
    Route::get('/final-form', [FinalReportController::class, 'create'])->name('student.final-form');
    Route::post('/create-final-form', [FinalReportController::class, 'store'])->name('student.final-form.store');
    Route::get('/experiance-form', [OrgRatingController::class, 'create'])->name('student.experiance-form');
    Route::post('/create-experiance-form', [OrgRatingController::class, 'store'])->name('student.experiance-form.store');
    Route::get('/website-rating', [WebsiteRatingController::class, 'create'])->name('student.website-rating');
    Route::post('/create-website-rating', [WebsiteRatingController::class, 'store'])->name('student.website-rating.store');

    Route::get('/student/chat', [StudentChatController::class, 'studentChat'])->name('student.chat');
    Route::post('/student-chat/send', [StudentChatController::class, 'studentSend'])->name('student.chat.send');

    Route::get('/student/reports', [StudentReportController::class, 'index'])->name('student.reports');

});
