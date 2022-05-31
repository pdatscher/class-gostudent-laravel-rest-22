<?php

use App\Models\TutoringOffer;
use App\Http\Controllers\TutoringController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [TutoringController::class, 'index']);
Route::get('/tutoringoffers', [TutoringController::class, 'index']);
Route::get('/tutoringoffers/{id}', [TutoringController::class, 'show']);


