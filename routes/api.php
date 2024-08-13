<?php

use App\Http\Controllers\Admin\BusienessController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Busieness\ServiceController;
use App\Models\Busieness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Ticket;

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
Route::apiResource('busieness', BusienessController::class);
Route::post('update_busieness/{id}', [Busieness::class, 'update']);

Route::apiResource('admin/ticket', TicketController::class);

// Route::get('auth')->group(function (Request $request) {

    Route::apiResource('service', ServiceController::class);
    Route::apiResource('booking', BookingController::class);
    Route::post('update_service/{id}', [ServiceController::class, 'update']);

// });
// Route::get('auth', function (Request $request) {
//     return response()->json(['message' => 'please login first']);
// });


