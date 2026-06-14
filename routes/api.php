<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\LeadsController;

Route::get('/landing-page', [LandingPageController::class, 'index']);

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{slug}', [NewsController::class, 'show']);
Route::get('/activities', [ActivitiesController::class, 'index']);
Route::get('/activities/{slug}', [ActivitiesController::class, 'show']);

Route::post('/analytics', [AnalyticsController::class, 'store']);
Route::post('/leads', [LeadsController::class, 'store']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
