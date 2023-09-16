<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DeviceActivityController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\LoginController;
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
Route::get('/login', [LoginController::class, 'index']);

Route::get('/communication', [Dashboard::class, 'comDashboard'])->name('dashboard.communication');
Route::get('/communication/create', [Dashboard::class, 'comCreate'])->name('com.create');
Route::post('/communication/store', [DeviceController::class, 'store'])->name('com.store');
Route::get('/communication/detail', [Dashboard::class, 'comDetail'])->name('com.detail');
Route::get('/communication/createActivity', [Dashboard::class, 'comCreateActivity']);
Route::post('/communication/storeActivity', [DeviceActivityController::class, 'store']);
Route::get('/communication/update', [Dashboard::class, 'comUpdate']);
Route::post('/communication/update', [DeviceController::class, 'update'])->name('com.update');
Route::delete('/communication/delete', [DeviceController::class, 'delete'])->name('com.delete');

Route::get('/navigation', [Dashboard::class, 'navDashboard'])->name('dashboard.navigation');
Route::get('/navigation/create', [Dashboard::class, 'navCreate'])->name('nav.create');
Route::post('/navigation/store', [DeviceController::class, 'store'])->name('nav.store');
Route::get('/navigation/detail', [Dashboard::class, 'navDetail'])->name('nav.detail');
Route::get('/navigation/createActivity', [Dashboard::class, 'navCreateActivity']);
Route::post('/navigation/storeActivity', [DeviceActivityController::class, 'store']);
Route::get('/navigation/update', [Dashboard::class, 'update']);
Route::post('/navigation/update', [DeviceController::class, 'update'])->name('nav.update');
Route::delete('/navigation/delete', [DeviceController::class, 'delete'])->name('nav.delete');

Route::get('/surveillance', [Dashboard::class, 'survDashboard'])->name('dashboard.surveillance');
Route::get('/surveillance/create', [Dashboard::class, 'survCreate'])->name('surv.create');
Route::post('/surveillance/store', [DeviceController::class, 'store'])->name('surv.store');
Route::get('/surveillance/detail', [Dashboard::class, 'survDetail'])->name('surv.detail');
Route::get('/surveillance/createActivity', [Dashboard::class, 'survCreateActivity']);
Route::post('/surveillance/storeActivity', [DeviceActivityController::class, 'store']);
Route::get('/surveillance/update', [Dashboard::class, 'update']);
Route::post('/surveillance/update', [DeviceController::class, 'update'])->name('surv.update');
Route::delete('/surveillance/delete', [DeviceController::class, 'delete'])->name('surv.delete');

Route::get('/automation', [Dashboard::class, 'autoDashboard'])->name('dashboard.automation');
Route::get('/automation/create', [Dashboard::class, 'autoCreate'])->name('auto.create');
Route::post('/automation/store', [DeviceController::class, 'store'])->name('auto.store');
Route::get('/automation/detail', [Dashboard::class, 'autoDetail'])->name('auto.detail');
Route::get('/automation/createActivity', [Dashboard::class, 'autoCreateActivity']);
Route::post('/automation/storeActivity', [DeviceActivityController::class, 'store']);
Route::get('/automation/update', [Dashboard::class, 'update']);
Route::post('/automation/update', [DeviceController::class, 'update'])->name('auto.update');
Route::delete('/automation/delete', [DeviceController::class, 'delete'])->name('auto.delete');

Route::get('/support', [Dashboard::class, 'suppDashboard'])->name('dashboard.support');
Route::get('/support/create', [Dashboard::class, 'suppCreate'])->name('supp.create');
Route::post('/support/store', [DeviceController::class, 'store'])->name('supp.store');
Route::get('/support/detail', [Dashboard::class, 'suppDetail'])->name('supp.detail');
Route::get('/support/createActivity', [Dashboard::class, 'suppCreateActivity']);
Route::post('/support/storeActivity', [DeviceActivityController::class, 'store']);
Route::get('/support/update', [Dashboard::class, 'update']);
Route::post('/support/update', [DeviceController::class, 'update'])->name('supp.update');
Route::delete('/support/delete', [DeviceController::class, 'delete'])->name('supp.delete');

Route::get('/device/create', [DeviceController::class, 'create'])->name('device.create');
Route::post('/device/store', [DeviceController::class, 'store'])->name('device.store');

Route::fallback(function(){
    return abort(404);
});
