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

Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', 'TopicsController@index')->name('dashboard');
    Route::get('topic/create', 'TopicsController@create')->name('topic.c');
    Route::get('topic/{id}/show', 'TopicsController@show')->name('topic.sh');
    Route::post('topic/store', 'TopicsController@store')->name('topic.s');
    Route::get('topic/{id}/edit', 'TopicsController@edit')->name('topic.e');
    Route::post('topic/{id}/update', 'TopicsController@update')->name('topic.u');


    Route::get('/paper', 'TopicsController@paper')->name('dashboard.paper');
    Route::get('paper/create', 'TopicsController@createP')->name('paper.c');
    Route::post('paper/store', 'TopicsController@storeP')->name('paper.s');
    Route::get('paper/{id}/show', 'TopicsController@showP')->name('paper.sh');
    Route::get('paper/{id}/do', 'TopicsController@doPaper')->name('paper.do');
    Route::post('paper', 'TopicsController@opPaper')->name('paper.stop');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
