<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DestinationController;

Route::prefix('/v1')->group(function () {
    // Auth
    Route::prefix('/auth')->controller(AuthController::class)->group(function () {
        Route::post('/register', 'register');
        Route::post('/login', 'login');
        Route::post('/logout', 'logout')->middleware('auth:sanctum');
    });

    // User
    Route::prefix('/users')->controller(UserController::class)->middleware('auth:sanctum')->group(function () {
        Route::get('/profile', 'profile');
        Route::post('/profile/update', 'update');
        Route::put('/changed-password', 'changePassword');
    });

    // Review
    Route::prefix('/destinations')->controller(DestinationController::class)->group(function () {
        Route::get('/', 'destinationLists');
        Route::get('/{destination_id}/detail', 'detailDestination');
    });
    Route::prefix('/destinations')->controller(ReviewController::class)->group(function () {
        Route::post('/{destination_id}/add-review', 'review')->middleware('auth:sanctum');
    });
});
