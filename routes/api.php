<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('user')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/register', 'register');
        Route::post('/google/register', 'google_register');
        Route::post('/apple/register', 'apple_register');
        Route::post('/login', 'login');
        Route::post('/password/forget', 'forget_password');
    });
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/delete', 'deleteAccount');
            
        });
        Route::controller(HomeController::class)->group(function () {
            Route::get('/onboarding', 'onboarding');
            Route::get('/notifications/{token}', 'notifications');  
              Route::get('/update/notifications/status/{token}', 'update_notification_status');  
            
            Route::post('/save/token', 'saveToken');
            Route::get('/sub/category/content/{category}', 'sub_category_with_content');
            Route::get('/next/previous/{id}', 'next_previous_song');
            Route::post('/play/song/{id}', 'play_songs');
            Route::get('/single/song/{id}', 'get_single_song');
            Route::get('/delete/recent/{id}', 'delete_recent');
            Route::get('/recent/song', 'recent_song');
            Route::post('/add/review', 'review');
            Route::post('/search', 'search_song');
            Route::get('/getActorProfile/{id}', 'getActorProfile');
            Route::post('/getAuthorProfiles', 'getAuthorProfiles');
            Route::get('/getActorWithContent/{id}', 'getActorWithContent');
        });
    });
});
