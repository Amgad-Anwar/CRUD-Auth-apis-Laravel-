<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiCatController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
 //   return $request->user();
//});


Route::get("/cats" ,[ApiCatController::class , "index"]);                             // CRUD
Route::get("/cats/show/{id}" ,[ApiCatController::class , "show"]);
Route::get("/cats/delete/{id}" ,[ApiCatController::class , "delete"])->middleware('api-auth');
Route::post("/cats/store" ,[ApiCatController::class , "store"])->middleware('api-auth');
Route::post("/cats/update/{id}" ,[ApiCatController::class , "update"])->middleware('api-auth');


Route::post("/register" ,[ApiAuthController::class , "register"]);
Route::post("/login" ,[ApiAuthController::class , "login"]);               //Auth
Route::get("/logout" ,[ApiAuthController::class , "logout"])->middleware('api-auth');                       //Auth



