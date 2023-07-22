<?php

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

Route::apiResource("v1/usuarios", App\Http\Controllers\Api\V1\UserController::class);

//Ruta login
Route::post("v1/login", [App\Http\Controllers\Api\V1\UserController::class, "login"]);