<?php

use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DeviceController;
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

Route::get('/', [Dashboard::class, 'homeDashboard'])->name('dashboard.home');
Route::get('/communication', [Dashboard::class, 'comDashboard'])->name('dashboard.communication');
Route::get('/communication/create', [CommunicationController::class, 'create'])->name('communication.create');
Route::get('/communication/store', [CommunicationController::class, 'store'])->name('communication.store');

Route::get('/device/create', [DeviceController::class, 'create'])->name('device.create');
Route::post('/device/store', [DeviceController::class, 'store'])->name('device.store');

Route::fallback(function(){
    return abort(404);
});
