<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('api-login', [LoginController::class, 'login']);
Route::post('api-register', [RegisterController::class, 'register']);
Route::post('refresh', [LoginController::class, 'refresh']);

Route::group(['middleware'=>'auth:api'], function(){
    Route::post('logout', [LoginController::class, 'logout']);
});
