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
	    return view('landing');
	});




Route::group(['middleware' => ['web', 'auth']], function() {
	
	
	Route::resource('messages','MessageController');

	Route::get('/home','UserController@index')->name('home');
	Route::resource('/admin/users','UserController');


	Route::get('/articleHome','ArticleController@home')->name('articles.home');
	Route::resource('/articles','ArticleController');

});
	
//making available theses routes for guests without login		
Route::get('messages/create','MessageController@create')->name('messages.create');
Route::post('messages','MessageController@store');

Auth::routes();