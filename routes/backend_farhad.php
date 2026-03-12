<?php

use App\Http\Controllers\Backend\Farhad\BannerController;
use App\Http\Controllers\Backend\Farhad\CategoryController;
use App\Http\Controllers\Backend\Farhad\DashboardController;
use App\Http\Controllers\Backend\Farhad\PackageController;
use App\Http\Controllers\Backend\Farhad\ProductController;
use App\Http\Controllers\Backend\Farhad\SliderController;
use App\Http\Controllers\Backend\Farhad\StatusController;
use App\Http\Controllers\Backend\Farhad\SubscriberController;
use App\Http\Controllers\Backend\Setting\AdminSettingController;
use App\Http\Controllers\Backend\Setting\MailSettingController;
use App\Http\Controllers\Backend\Setting\ManagerController;
use App\Http\Controllers\Backend\Setting\ProfileSettingController;
use App\Http\Controllers\Backend\Setting\SocialSettingController;
use App\Http\Controllers\Backend\Setting\StripeSettingController;
use App\Http\Controllers\Backend\Setting\SystemSettingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:web', 'role:admin,manager'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard route
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Banners routes
    Route::get('banners', [BannerController::class, 'index'])->name('banners.index');
    Route::get('banners/create', [BannerController::class, 'create'])->name('banners.create');
    Route::post('banners', [BannerController::class, 'store'])->name('banners.store');
    Route::get('banners/{banner}', [BannerController::class, 'show'])->name('banners.show');
    Route::get('banners/{banner}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::put('banners/{banner}', [BannerController::class, 'update'])->name('banners.update');
    Route::delete('banners/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');

    // Sliders routes
    Route::get('sliders', [SliderController::class, 'index'])->name('sliders.index');
    Route::get('sliders/create', [SliderController::class, 'create'])->name('sliders.create');
    Route::post('sliders', [SliderController::class, 'store'])->name('sliders.store');
    Route::get('sliders/{slider}', [SliderController::class, 'show'])->name('sliders.show');
    Route::get('sliders/{slider}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
    Route::put('sliders/{slider}', [SliderController::class, 'update'])->name('sliders.update');
    Route::delete('sliders/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');

    // Categories routes
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Products routes
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Packages routes
    Route::get('packages', [PackageController::class, 'index'])->name('packages.index');
    Route::get('packages/create', [PackageController::class, 'create'])->name('packages.create');
    Route::post('packages', [PackageController::class, 'store'])->name('packages.store');
    Route::get('packages/{package}/edit', [PackageController::class, 'edit'])->name('packages.edit');
    Route::put('packages/{package}', [PackageController::class, 'update'])->name('packages.update');
    Route::delete('packages/{package}', [PackageController::class, 'destroy'])->name('packages.destroy');

    // Subscribers routes
    Route::get('subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');
    Route::delete('subscribers/{subscriber}', [SubscriberController::class, 'destroy'])->name('subscribers.destroy');

    //Status
    Route::post('/update-status', [StatusController::class, 'update'])->name('status.update');

    // ------------------- Settings routes start ------------------
    // Profile settings routes
    Route::get('settings/profile', [ProfileSettingController::class, 'edit'])->name('profile-settings.edit');
    Route::post('settings/profile/{id}', [ProfileSettingController::class, 'update'])->name('profile-settings.update');
    Route::post('settings/profile/change-password', [ProfileSettingController::class, 'changePassword'])->name('profile-settings.change-password');

    // Manager management routes
    Route::get('settings/managers', [ManagerController::class, 'index'])->name('managers.index');
    Route::post('settings/managers', [ManagerController::class, 'store'])->name('managers.store');
    Route::put('settings/managers/{id}', [ManagerController::class, 'update'])->name('managers.update');
    Route::delete('settings/managers/{id}', [ManagerController::class, 'destroy'])->name('managers.destroy');

    // Social settings routes
    Route::get('settings/social', [SocialSettingController::class, 'edit'])->name('social-settings.edit');
    Route::post('settings/social', [SocialSettingController::class, 'update'])->name('social-settings.update');

    // Mail settings routes
    Route::get('settings/mail', [MailSettingController::class, 'edit'])->name('mail-settings.edit');
    Route::post('settings/mail', [MailSettingController::class, 'update'])->name('mail-settings.update');

    // Stripe Settings routes
    Route::get('settings/stripe', [StripeSettingController::class, 'edit'])->name('stripe-settings.edit');
    Route::post('settings/stripe', [StripeSettingController::class, 'update'])->name('stripe-settings.update');

    // System Settings routes
    Route::get('settings/system', [SystemSettingController::class, 'edit'])->name('system-settings.edit');
    Route::post('settings/system', [SystemSettingController::class, 'update'])->name('system-settings.update');

    // Admin Settings routes
    Route::get('settings/admin', [AdminSettingController::class, 'edit'])->name('admin-settings.edit');
    Route::post('settings/admin', [AdminSettingController::class, 'update'])->name('admin-settings.update');
    // ------------------- Settings routes end ------------------
});
