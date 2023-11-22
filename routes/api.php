<?php

use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PrescriptionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthenticatedController::class, 'store'])->name('login');
Route::post('register', [AuthenticatedController::class, 'register'])->name('register');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthenticatedController::class, 'destroy'])->name('logout');

    Route::apiResource('medicines', MedicineController::class)->except('show');
    Route::apiResource('prescriptions', PrescriptionController::class)->except('show');
});

Route::get('ziggy', fn() => response()->json(new \Tightenco\Ziggy\Ziggy()));
