<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TrackerController;
use App\Http\Controllers\ZoneController;
use App\Http\Livewire\ParcelEditor;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth:sanctum', 'verified']
], function () {
    /**
     * -----------------------
     *      Merchant
     * -----------------------
     */
    Route::view('/', 'dashboard')->name('dashboard');
    Route::resource('parcels', ParcelController::class);
    Route::resource('shops', ShopController::class);
    Route::get('/earnings', function () {
        return view('earnings.index');
    })->name('earnings');

    /**
     * -----------------------
     *      Admin
     * -----------------------
     */
    Route::resource('zones', ZoneController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('tracker', TrackerController::class);
});
