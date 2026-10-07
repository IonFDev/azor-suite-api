<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ListadosController;

/*
 * Login route
 */
Route::post('/login', [AuthController::class, 'login']);
/*
 * Lists routes
 */
Route::get('/listados', [ListadosController::class, 'index']);
Route::get('/listados/{id}', [ListadosController::class, 'show']);
Route::post('/listados', [ListadosController::class, 'store']);
