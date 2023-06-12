<?php

use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ArtisansServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Requests\ArtisanRequest;
use App\Models\ArtisanService;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/services', [ServiceController::class, 'index']);
    Route::get('/Artisans', [ArtisansServiceController::class, 'showByService']);
    Route::post('/getReview', [ReviewController::class , 'getReview']);
    Route::get('/getArtisan', [ArtisanController::class, 'getArtisan']);
    Route::post('/Work', [ArtisanController::class ,'create'] );
});

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);

