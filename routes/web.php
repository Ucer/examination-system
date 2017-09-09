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
    Route::post('topic/store', 'TopicsController@store')->name('topic.s');
    Route::get('topic/{id}/edit', 'TopicsController@edit')->name('topic.e');
    Route::post('topic/{id}/update', 'TopicsController@update')->name('topic.u');
});
