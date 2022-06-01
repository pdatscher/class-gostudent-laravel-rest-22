<?php

use App\Http\Controllers\TutoringController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\AuthController;


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

Route::group(['middleware' => ['api', 'auth.jwt']], function() {
    //LOGGED IN OPERATIONS
    Route::post('tutoringoffers', [TutoringController::class,'save']);
    Route::put('tutoringoffers/{id}', [TutoringController::class,'update']);
    Route::delete('tutoringoffers/{id}', [TutoringController::class,'delete']);

    Route::post('users', [UserController::class, 'save']);
    Route::put('users/{id}', [UserController::class,'update']);
    Route::delete('users/{id}', [UserController::class,'delete']);

    Route::post('dates', [DateController::class, 'save']);
    Route::put('dates/{id}', [DateController::class, 'update']);
    Route::delete('dates/{id}', [DateController::class, 'delete']);

    Route::get('dates/bookings/{id}', [DateController::class, 'datesByUserID']);

    Route::post('auth/logout',[AuthController::class,'logout']);
});

Route::get('tutoringoffers', [TutoringController::class,'index']);
Route::get('tutoringoffers/{id}', [TutoringController::class,'findByID']);
Route::get('tutoringoffers/checkid/{id}', [TutoringController::class,'checkID']);
Route::get('tutoringoffers/search/{subject}', [TutoringController::class,'findBySubject']);

Route::get('users', [UserController::class,'index']);
Route::get('users/{id}', [UserController::class,'findByID']);

Route::post('auth/login',[AuthController::class,'login']);





