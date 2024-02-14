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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
route::post('Register', 'App\Http\Controllers\AuthController@register');
route::post('Login', 'App\Http\Controllers\AuthController@login');
use App\Http\Controllers\UserController;

Route::get('/users/{id}', [UserController::class, 'getUserById']);
