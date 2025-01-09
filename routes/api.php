<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DivisionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/divisions', [DivisionController::class, 'index']);
});