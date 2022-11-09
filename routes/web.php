<?php

use App\Http\Controllers\CanteenPermanenceController;
use App\Http\Controllers\SeasonController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('canteenpermanence', CanteenPermanenceController::class)
    ->only(['store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);


Route::controller(CanteenPermanenceController::class)->group(function() {
    Route::get('/canteenpermanence/{season:year?}','index')->name('canteenpermanence.season');
});


Route::controller(SeasonController::class)->group(function() {
    Route::get('/seasons/{season?}','index')->name('season.index');
});

require __DIR__.'/auth.php';
