<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatController;
use GuzzleHttp\Middleware;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/add/cat' , [CatController::class , 'addCat'])->middleware('auth');
Route::post('/cat/store' , [CatController::class , 'store'])->middleware('auth');
Route::get('/cats' , [CatController::class , 'index']);
Route::get('/delete/{id}' , [CatController::class , 'delete'])->middleware('auth');
Route::get('/form/edit/{id}' , [CatController::class , 'show'])->middleware('auth');
Route::post('/edit/{id}' , [CatController::class , 'update'])->middleware('auth');


Route::post('/register' , [AuthController::class , 'register'])->middleware('guest');
Route::get('/form/register' , [AuthController::class , 'showRegister'])->middleware('guest');
Route::get('/form/login' , [AuthController::class , 'showLogin'])->middleware('guest');
Route::post('/login' , [AuthController::class , 'login'])->middleware('guest');
Route::get('/logout' , [AuthController::class , 'logout'])->middleware('auth');








