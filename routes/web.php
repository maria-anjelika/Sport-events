<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('sportsEvents','SportEventController');
Route::resource('organizers','OrganizerController');
Route::resource('types','TypeController');
Route::resource('images', 'ImageController');

Route::post('sportsEvents.search','SearchController@searchSpotsEvents');
Route::post('organizers.search','SearchController@searchOrganizers');
Route::post('types.search','SearchController@searchTypes');