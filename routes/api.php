<?php

// use App\Http\Controllers\ApiController;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;

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
Route::apiResource('songs', SongController::class);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

;

Route::get('song',[SongController::class,'index']);

Route::post('song',[SongController::class,'upload']);

//LOGIN AND SIGNUP 
Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);
Route::get('/detail', [ApiController::class, 'detail'])
->middleware('auth:sanctum');





