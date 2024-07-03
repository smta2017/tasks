<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RegisterController;
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

Route::post('auth/register',  [RegisterController::class,'register']);
Route::post('auth/verify-register',  [RegisterController::class,'verify_register']);

Route::group(['prefix' => 'auth'], function ($router) {

    Route::post('login',  [AuthController::class,'login']);
    Route::post('logout',  [AuthController::class,'logout']);
    Route::post('refresh',  [AuthController::class,'refresh']);
    Route::post('me',  [AuthController::class,'me']);

});

Route::resource('posts', App\Http\Controllers\API\PostAPIController::class)
    ->except(['create', 'edit']);