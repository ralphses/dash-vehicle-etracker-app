<?php

use App\Http\Controllers\ParkingSpaceController;
use App\Http\Controllers\UserVehicleController;
use App\Http\Controllers\UserVehicleEntryController;
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

Route::controller(UserVehicleController::class)->group(function() {

    Route::get('/vehicle', 'vehicle');
});

Route::controller(UserVehicleEntryController::class)->group(function() {

    Route::get('/entry', 'entry');
    Route::post('/entry', 'store');
    Route::post('/exit', 'exit');
});

Route::controller(ParkingSpaceController::class)->group(function() {

    Route::get('/space', 'get');
});