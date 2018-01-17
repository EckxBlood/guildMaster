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

//Membres
Route::get('/membres', 'GuildController@index')->name('membres');
Route::get('/membres/add', 'MembresController@add')->name('membres.add');

//Quetes
Route::get('/quetes', 'QuetesController@index')->name('quetes');
Route::get('/quetes/start/idMembre/{idMembre}/idQuest/{idQuest}', 'QuetesController@startQuest')->name('quetes.start');
Route::get('/quetes/complete/{idQuest}', 'QuetesController@questComplete')->name('quetes.complete');



