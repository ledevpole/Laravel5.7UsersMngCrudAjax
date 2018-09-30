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

Route::get('/landing', function () {
	    return view('landing');
	});


Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function() {
	
	
	Route::resource('messages','MessageController');

	Route::get('/home',function() {
		if (Auth::user()->admin !== 1) {
			return view('home');

		}
		else{
			$users['users'] = \App\User::all();
			return view('adminhome',$users);
		}	
	})->name('home');
});
	
//making available theses routes for guests without accompte		
Route::get('messages/create','MessageController@create')->name('messages.create');
Route::post('messages','MessageController@store');

Route::get('/articleHome','ArticleController@home')->name('articles.home');
Route::resource('/articles','ArticleController');