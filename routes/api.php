<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//user
Route::post('/login',[UserController::class, 'login']);
Route::post('/signup',[UserController::class, 'signup']);

Route::get('/student',[PostController::class, 'index']);
Route::get('/student/{id}',[PostController::class, 'show']);

Route::group(['middleware' =>['auth:sanctum']], function(){
    //student Rount
    Route::put('/student/{id}',[PostController::class, 'update']);
    Route::delete('/student/{id}',[PostController::class, 'destroy']);
    Route::post('/student',[PostController::class, 'store']);
    Route::post('/signout',[UserController::class, 'signout']);
    
});