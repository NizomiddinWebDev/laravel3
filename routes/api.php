<?php

use App\Http\Controllers\Api\ApplicationApiController;
use App\Http\Controllers\Api\ProfileApiController;
use App\Models\Role;
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

Route::get('profile/{tg_id}',[ProfileApiController::class,'check_user']);
Route::apiResource('profiles',ProfileApiController::class);
Route::apiResource('applications',ApplicationApiController::class);
