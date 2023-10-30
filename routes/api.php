<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AkarKuadratController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);


Route::middleware(['jwt.verify'])->group( function () {
    Route::get('getMe', [AuthController::class, 'getMe']);

    // ALL -> DESC
    Route::get('getPlSql', [AuthController::class, 'getPlSql']);
    Route::get('getGolang', [AuthController::class, 'getGolang']);

    // ALL - Count, MAX, MIN, AVG
    Route::get('aggregatePlSql', [AuthController::class, 'aggregatePlSql']);
    Route::get('aggregateGolang', [AuthController::class, 'aggregateGolang']);

    // By NIM
    Route::get('getPlSqlByNim', [AuthController::class, 'getPlSqlByNim']);
    Route::get('getGolangByNim', [AuthController::class, 'getGolangByNim']);

    // By NIM - Count, MAX, MIN, AVG
    Route::get('aggregatePlSqlByNim', [AuthController::class, 'aggregatePlSqlByNim']);
    Route::get('aggregateGolangByNim', [AuthController::class, 'aggregateGolangByNim']);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/akar-kuadrat', [AkarKuadratController::class, 'hitungAkarKuadrat']);