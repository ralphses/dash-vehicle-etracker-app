<?php

use App\Http\Controllers\ParkingSpaceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserVehicleController;
use App\Http\Controllers\UserVehicleEntryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});

Route::middleware('auth')->prefix('dashboard')->group(function () {

    Route::get('', [SiteController::class, 'index'])->name('dashboard');

    Route::controller(ParkingSpaceController::class)->prefix('parking-space')->group(function () {
        Route::get('', 'index')->name('spaces');
        Route::get('/add', 'create')->name('spaces.create');
        Route::post('/add', 'store')->name('spaces.store');
        Route::get('/{space}', 'show')->name('spaces.show');
        Route::delete('', 'delete')->name('spaces.delete');
    });

    Route::prefix('/vehicle')->group(function () {
        Route::controller(UserVehicleEntryController::class)->prefix('/entries')->group(function () {
            Route::get("/", "index")->name('vehicle.entries');
            Route::get("/{entry}", "show")->name('entries.show');
            Route::delete("/{entry}", "delete")->name('entries.delete');
        });

        Route::controller(UserVehicleController::class)->group(function () {
            Route::get('', 'index')->name('vehicles.all');
            Route::get("/{vehicle}", "show")->name('vehicles.show');
            Route::delete("/{vehicle}", "delete")->name('vehicles.delete');
        });
    });


});

Route::controller(UserVehicleController::class)->prefix('vehicle')->group(function () {
    Route::get("/", "create");
    Route::post("/", "store")->name('vehicle.register');
});


require __DIR__ . '/auth.php';
