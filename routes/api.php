<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/landing-page', [LandingPageController::class, 'index']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
