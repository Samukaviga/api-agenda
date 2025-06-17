<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/test', [AgendaController::class, 'test']);

Route::post('/send', [AgendaController::class, 'send']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
