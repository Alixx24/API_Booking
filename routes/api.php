<?php

use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Models\Business;
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
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::apiResource('user', UserController::class);
Route::apiResource('business', BusinessController::class);
Route::post('update_business/{id}', [Business::class, 'update']);
Route::get('auth', function(Request $request) {
    return response()->json(['message' => 'please login first']);
});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
