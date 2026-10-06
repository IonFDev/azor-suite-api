<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

Route::get('/test', function () {
    return response()->json([
        'success' => true,
        'application' => 'AzorSuite API',
    ]);
});

Route::post('/login', [AuthController::class, 'login']);
