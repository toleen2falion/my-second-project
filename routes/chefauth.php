<?php

use App\Http\Controllers\ChefAuth\AuthenticatedSessionController;
use App\Http\Controllers\ChefAuth\ConfirmablePasswordController;
use App\Http\Controllers\ChefAuth\EmailVerificationNotificationController;
use App\Http\Controllers\ChefAuth\EmailVerificationPromptController;
use App\Http\Controllers\ChefAuth\NewPasswordController;
use App\Http\Controllers\ChefAuth\PasswordController;
use App\Http\Controllers\ChefAuth\PasswordResetLinkController;
use App\Http\Controllers\ChefAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:chef')->group(function () {

    Route::get('chef/login', [AuthenticatedSessionController::class, 'create'])
                ->name('chef.login');

    Route::post('chef/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('chef/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('chef.password.request');

    Route::post('chef/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('chef.password.email');

    Route::get('chef/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('chef.password.reset');

    Route::post('chef/reset-password', [NewPasswordController::class, 'store'])
                ->name('chef.password.store');
});

Route::middleware('auth:chef')->group(function () {
    Route::get('chef/verify-email', EmailVerificationPromptController::class)
                ->name('chef.verification.notice');

    Route::get('chef/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('chef.verification.verify');

    Route::post('chef/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('chef.verification.send');

    Route::get('chef/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('chef.password.confirm');

    Route::post('chef/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('chef/password', [PasswordController::class, 'update'])->name('chef.password.update');

    Route::post('chef/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('chef.logout');
});
