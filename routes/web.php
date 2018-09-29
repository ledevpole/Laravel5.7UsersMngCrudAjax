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
	
	
	//Route::resource('messages','MessageController');

	Route::get('/home',function() {
		if (Auth::user()->admin !== 1) {
			return view('home');

		}
		else{
			$users['users'] = \App\User::all();
			return view('adminhome',$users);
		}	
	});
});

Route::group(['prefix' => 'posts','middleware' => ['web', 'auth']], function() {
Route::get('/', 'PostController@index');
Route::match(['get','post'], 'create', 'PostController@create');
Route::match(['get','put'], 'update/{id}', 'PostController@update');
Route::get('show/{id}','PostController@show');
Route::delete('delete/{id}', 'PostController@destroy');
});

Route::group(['prefix' => 'messages','middleware' => ['web', 'auth']], function() {
Route::get('/', 'MessageController@index');
Route::put('/{id}', 'MessageController@update');
Route::get('/{id}/edit','MessageController@show');
Route::delete('/{id}', 'MessageController@destroy');
});

	
//making available theses routes for guests without accompte		
Route::get('messages/create','MessageController@create');
Route::post('messages','MessageController@store');

Route::get('/articleHome','ArticleController@home');
Route::resource('/articles','ArticleController');