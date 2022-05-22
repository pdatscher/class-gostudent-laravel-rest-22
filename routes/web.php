<?php

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

//LISTENANSICHT
Route::get('/', function () {
    $tutoringOffers = DB::table('tutoring_offers')->get();
    return view('index',compact('tutoringOffers'));
});

//DETAILANSICHT
Route::get('/tutoringoffers/{id}', function($id) {
    $tutoringOffer = DB::table('tutoring_offers')->find($id);
    //dd($tutoringOffer);
    return view('show',compact('tutoringOffer'));
});

//FILTEROPTIONEN
// zB im zugehörigen Model isFavourite-Funktion einbauen


