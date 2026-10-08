<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ListadosController;

/*
 * Login route
 */
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    /*
     * Protected routes
     */
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
/*
 * Lists routes
 */
Route::get('/listados', [ListadosController::class, 'index']);
Route::get('/listados/{id}', [ListadosController::class, 'show']);
Route::post('/listados', [ListadosController::class, 'store']);
