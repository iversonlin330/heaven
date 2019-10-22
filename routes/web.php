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
Route::get('/logout', 'Auth\LoginController@getLogout');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
	if(Auth::check()){
		return redirect('backend/index');
	}else{
		return view('login');
	}
})->name('login');

Route::post('/login', 'Auth\LoginController@postLogin');
Route::group(['middleware' => ['auth']], function () {
	Route::group(['prefix' => 'backend'], function () {
		Route::get('index','BackendController@index');
		Route::get('ratio','BackendController@getRatio');
		Route::post('ratio','BackendController@postRatio');
		Route::get('server','BackendController@getServer');
		Route::post('server','BackendController@postServer');
		Route::get('casher','BackendController@getCasher');
		Route::post('casher','BackendController@postCasher');
		Route::get('limit','BackendController@getLimit');
		Route::post('limit','BackendController@postLimit');
		Route::get('frontend','BackendController@getFrontend');
		Route::post('frontend','BackendController@postFrontend');
		Route::get('admin','BackendController@getAdmin');
		Route::post('admin','BackendController@postAdmin');
		Route::get('user','BackendController@getUser');
		Route::post('user','BackendController@postUser');
		Route::get('item','BackendController@getItem');
		Route::post('item','BackendController@postItem');
	});
});

Route::group(['prefix' => 'frontend'], function () {
	Route::get('index','FrontendController@index');
	Route::post('index','FrontendController@postindex');
	Route::post('result','FrontendController@postResult');
	Route::post('cvs','FrontendController@postCvs');
	//Route::get('result','FrontendController@postResult');
});

Route::get('sample','FrontendController@getSample');
Route::post('sample','FrontendController@postSample');

//Route::resource('ratios', 'RatioController');
