<?php

use App\Http\Controllers\Api\ApiAboutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiPageController;
use App\Http\Controllers\Api\ApiBrandController;
use App\Http\Controllers\Api\ApiClientController;
use App\Http\Controllers\Api\ApiContactController;
use App\Http\Controllers\Api\ApiPortfolioController;
use App\Http\Controllers\Api\ApiServiceController;
use App\Http\Controllers\Api\ApiSliderController;
use App\Http\Controllers\Api\ApiTeamController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//API Pages Routes
Route::get('pages', [ApiPageController::class, 'index']);
Route::get('pages/show/{id}',[ApiPageController::class, 'show']);
Route::post('pages/store',[ApiPageController::class, 'store']);
Route::post('pages/update/{id}',[ApiPageController::class, 'update']);
Route::delete('pages/destroy/{id}',[ApiPageController::class, 'destroy']);



//API About Routes
Route::get('abouts', [ApiAboutController::class, 'index']);
Route::get('abouts/show/{id}',[ApiAboutController::class, 'show']);
Route::post('abouts/store',[ApiAboutController::class, 'store']);
Route::post('abouts/update/{id}',[ApiAboutController::class, 'update']);
Route::delete('abouts/destroy/{id}',[ApiAboutController::class, 'destroy']);



//API Brand Routes
Route::apiResource('brands', ApiBrandController::class);

//API Client Routes
Route::apiResource('clients', ApiClientController::class);

//API Contact Routes
Route::apiResource('contacts', ApiContactController::class);

//API Service Routes
Route::apiResource('services', ApiServiceController::class);

//API Portfolio Route
Route::apiResource('portfolios', ApiPortfolioController::class);

//api Team route
Route::apiResource('teams', ApiTeamcontroller::class);

//api slider Route
Route::apiResource('sliders', ApiSliderController::class);

