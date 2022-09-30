<?php

use App\Http\Controllers\AlgoApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'v1'], function(){
    Route::group(['prefix' => 'test'], function(){
        Route::get("/sort_str/{str}", [AlgoApiController::class, 'sortString']);
        Route::get("/place_value/{num}", [AlgoApiController::class, 'placeOfDigit']);
        Route::get("/convert_to_binary/{string}", [AlgoApiController::class, 'replaceNumberWithBinary']);
        Route::post("/prefix_notation_evaluation", [AlgoApiController::class, 'PrefixNotationEvaluation']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
