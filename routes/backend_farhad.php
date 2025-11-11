<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Farhad\DashboardController;
use App\Http\Controllers\Backend\Setting\MailSettingController;
use App\Http\Controllers\Backend\Setting\SocialSettingController;
use App\Http\Controllers\Backend\Setting\StripeSettingController;
use App\Http\Controllers\Backend\Setting\SystemSettingController;
use App\Http\Controllers\Backend\Setting\ProfileSettingController;

Route::middleware(['auth:web'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard route
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile settings routes
    Route::get('profile/settings', [ProfileSettingController::class, 'edit'])->name('profile-settings.edit');
    Route::post('profile/settings/{id}', [ProfileSettingController::class, 'update'])->name('profile-settings.update');

    // Social settings routes
    Route::get('social/settings', [SocialSettingController::class, 'edit'])->name('social-settings.edit');
    Route::post('social/settings', [SocialSettingController::class, 'update'])->name('social-settings.update');

    // Mail settings routes
    Route::get('mail/settings', [MailSettingController::class, 'edit'])->name('mail-settings.edit');
    Route::post('mail/settings', [MailSettingController::class, 'update'])->name('mail-settings.update');

    // Stripe Settings routes
    Route::get('stripe/settings', [StripeSettingController::class, 'edit'])->name('stripe-settings.edit');
    Route::post('stripe/settings', [StripeSettingController::class, 'update'])->name('stripe-settings.update');

    // Systems routes
    Route::get('system/settings', [SystemSettingController::class, 'edit'])->name('system-settings.edit');
    Route::post('system/settings', [SystemSettingController::class, 'update'])->name('system-settings.update');

    });
