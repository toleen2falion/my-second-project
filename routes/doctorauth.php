<?php

use App\Http\Controllers\DoctorAuth\AuthenticatedSessionController;
use App\Http\Controllers\DoctorAuth\ConfirmablePasswordController;
use App\Http\Controllers\DoctorAuth\EmailVerificationNotificationController;
use App\Http\Controllers\DoctorAuth\EmailVerificationPromptController;
use App\Http\Controllers\DoctorAuth\NewPasswordController;
use App\Http\Controllers\DoctorAuth\PasswordController;
use App\Http\Controllers\DoctorAuth\PasswordResetLinkController;
use App\Http\Controllers\DoctorAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:doctor')->group(function () {

    Route::get('doctor/login', [AuthenticatedSessionController::class, 'create'])
                ->name('doctor.login');

    Route::post('doctor/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('doctor/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('doctor.password.request');

    Route::post('doctor/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('doctor.password.email');

    Route::get('doctor/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('doctor.password.reset');

    Route::post('doctor/reset-password', [NewPasswordController::class, 'store'])
                ->name('doctor.password.store');
});

Route::middleware('auth:doctor')->group(function () {
    Route::get('doctor/verify-email', EmailVerificationPromptController::class)
                ->name('doctor.verification.notice');

    Route::get('doctor/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('doctor.verification.verify');

    Route::post('doctor/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('doctor.verification.send');

    Route::get('doctor/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('doctor.password.confirm');

    Route::post('doctor/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('doctor/password', [PasswordController::class, 'update'])->name('doctor.password.update');

    Route::post('doctor/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('doctor.logout');
});
