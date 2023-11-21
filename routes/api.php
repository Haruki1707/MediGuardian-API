<?php

use App\Http\Controllers\AuthenticatedController;
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

Route::get('login', [AuthenticatedController::class, 'store'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthenticatedController::class, 'destroy'])->name('logout');
});

Route::get('ziggy', fn() => response()->json(new \Tightenco\Ziggy\Ziggy()));
