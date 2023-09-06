<?php

use Illuminate\Http\Request;

use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HealthProviderController;

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


Route::get('/health', 'HealthCheckController@index');


Route::group(['prefix' => 'users'], function () {
    Route::post('/login', [AuthenticationController::class, 'loginUser']);
    Route::post('/register', [AuthenticationController::class, 'registerUser']);
    Route::get('email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::group([
        'prefix' => 'register',
    ], function () {
        Route::post('/health_provider', [HealthProviderController::class, 'adminCreateHealthProvider']);
    });
});
