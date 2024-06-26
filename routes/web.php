<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JingleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\LegalController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OnboardingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ActorProfileController;

Route::get('link-storage', function () {
    Artisan::call('storage:link');
});

Route::middleware(['guest:admin'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name('admin.login');
        Route::post('/login', 'login')->name('admin.make.login');
        Route::get('/admin/forget/password/view', 'forget_password_view')->name('admin.forget.password.view');
        Route::post('/admin/forget/password', 'forget_password')->name('admin.forget.password');
        Route::get('/admin/change/password/{code}', 'change_password');
        Route::post('/admin/update/password/{code}', 'update_password')->name('admin.update.password');
    });
    Route::controller(UserAuthController::class)->group(function () {
        Route::get('/user/change/password/{code}', 'change_password');
        Route::post('/user/update/password/{code}', 'update_password')->name('user.update.password');
    });
});

Route::controller(UserAuthController::class)->group(function () {
    Route::get('/user/verify/email/{code}', 'email_verified');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout', 'logout')->name('admin.logout');
    });
   

    Route::prefix('admin')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'index')->name('admin.dashboard');
            Route::get('dashboard2', 'index1')->name('admin.dashboard2');
            Route::get('dashboard3', 'login')->name('admin.dashboard3');
            Route::get('notification', 'notification')->name('admin.notification.index');
            Route::get('notification/create', 'notificationCreate')->name('admin.notification.create');
            Route::get('notification/delete/{id}', 'deleteNotification')->name('admin.notification.delete');
            Route::post('send/notification', 'send_notification')->name('admin.notification.send');
            Route::get('review', 'getReviews')->name('admin.review.index');
            Route::get('review/search', 'search')->name('admin.review.search');
            Route::get('notification/search', 'search_notification')->name('admin.notification.search');
            Route::get('review/delete/{id}', 'deleteReviews')->name('admin.review.delete');
            Route::post('get/version', 'getVersion')->name('admin.get.version');
            Route::get('/send/mail/{id}', 'send_mail_view')->name('admin.send.mail.view');
            Route::post('/send/mail/{id}', 'send_mail')->name('admin.send.mail');
        });
        Route::prefix('sub-category')->group(function () {
            Route::controller(SubCategoryController::class)->group(function () {
                Route::get('list', 'index')->name('admin.sub-category.index');
                Route::get('create', 'create')->name('admin.sub-category.create');
                Route::post('store', 'store')->name('admin.sub-category.store');
                Route::get('edit/{id}', 'edit')->name('admin.sub-category.edit');
                Route::post('update/{id}', 'update')->name('admin.sub-category.update');
                Route::get('delete/{id}', 'delete')->name('admin.sub-category.delete');
            });
        });
        Route::prefix('users')->group(function () {
            Route::controller(UserController::class)->group(function () {
                Route::get('list', 'index')->name('admin.user.index');
                Route::get('delete/{id}', 'delete')->name('admin.user.delete');
                Route::get('suspend/{id}', 'suspend')->name('admin.user.suspend');
            });
        });
        Route::prefix('onboarding')->group(function () {
            Route::controller(OnboardingController::class)->group(function () {
                Route::get('list', 'index')->name('admin.onboarding.index');
                Route::get('create', 'create')->name('admin.onboarding.create');
                Route::post('store', 'store')->name('admin.onboarding.store');
                Route::get('edit/{id}', 'edit')->name('admin.onboarding.edit');
                Route::post('update/{id}', 'update')->name('admin.onboarding.update');
                Route::get('delete/{id}', 'delete')->name('admin.onboarding.delete');
            });
        });
        Route::prefix('content')->group(function () {
            Route::controller(ContentController::class)->group(function () {
                Route::get('list', 'index')->name('admin.content.index');
                Route::post('get/sub/categories', 'getSubCategories')->name('admin.content.get.subcategories');
                Route::post('get/sub/categories/update', 'getUpdateSubCategories')->name('admin.content.get.update.subcategories');
                Route::post('content/store', 'contentAssets')->name('admin.content.assets.store');
                Route::get('create', 'create')->name('admin.content.create');
                Route::post('store', 'store')->name('admin.content.store');
                Route::get('edit/{id}', 'edit')->name('admin.content.edit');
                Route::post('update/{id}', 'update')->name('admin.content.update');
                Route::get('delete/{id}', 'delete')->name('admin.content.delete');
                Route::get('delete/playlist/{id}/content/{content_id}', 'delete_playlist');
            });
        });
        Route::prefix('actor')->group(function () {
            Route::controller(ActorProfileController::class)->group(function () {
                Route::get('list', 'index')->name('admin.actor.index');
                Route::get('create', 'create')->name('admin.actor.create');
                Route::post('store', 'store')->name('admin.actor.store');
                Route::get('edit/{id}', 'edit')->name('admin.actor.edit');
                Route::post('update/{id}', 'update')->name('admin.actor.update');
                Route::get('delete/{id}', 'delete')->name('admin.actor.delete');
            });
        });
        Route::controller(AdminController::class)->group(function () {
            Route::get('list', 'index')->name('admin.admin.index');
            Route::get('getAdmins', 'getAdmins')->name('admin.admin.index');
            Route::get('search', 'search')->name('admin.admin.search');
            Route::get('create', 'create')->name('admin.admin.create');
            Route::post('store', 'store')->name('admin.admin.store');
            Route::get('edit/{id}', 'edit')->name('admin.admin.edit');
            Route::get('reset/password/{id}', 'resetPassword')->name('admin.admin.reset.password');
            Route::post('update/password/{id}', 'updatePassword')->name('admin.admin.update.password');
            Route::post('update/{id}', 'update')->name('admin.admin.update');
            Route::get('delete/{id}', 'delete')->name('admin.admin.delete');
        });
        Route::controller(JingleController::class)->group(function () {
            Route::get('/jingle/list', 'index')->name('admin.jingle.index');
            Route::get('/jingle/search', 'search')->name('admin.jingle.search');
            Route::get('/jingle/create', 'create')->name('admin.jingle.create');
            Route::post('/jingle/store', 'store')->name('admin.jingle.store');
            Route::get('/jingle/edit/{id}', 'edit')->name('admin.jingle.edit');
            Route::post('/jingle/update/{id}', 'update')->name('admin.jingle.update');
            Route::get('/jingle/delete/{id}', 'delete')->name('admin.jingle.delete');
            Route::get('/jingle/suspend/{id}', 'suspend')->name('admin.jingle.suspend');
        });

        Route::controller(LegalController::class)->group(function () {
            Route::get('/legal/list', 'index')->name('admin.legal.index');
            Route::post('/legal/update/{id}', 'update')->name('admin.legal.update');
        });
    });
});
