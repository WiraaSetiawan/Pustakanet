<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiUserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function () {
    Route::get('/', [ApiUserController::class, 'index']);
    Route::get('/{id}', [ApiUserController::class, 'show']);
    Route::post('/', [ApiUserController::class, 'store']);
    Route::put('/{id}', [ApiUserController::class, 'update']);
    Route::delete('/{id}', [ApiUserController::class, 'destroy']);
});
