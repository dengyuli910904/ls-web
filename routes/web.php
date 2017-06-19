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

Route::any('/upload','UeditorController@server');

Route::group(['prefix'=>'news'],function(){
	Route::get('list','NewsController@showlist');
	Route::get('edit','NewsController@edit');
	Route::post('doedit','NewsController@update');
	Route::get('add','NewsController@add');
	Route::get('delete','NewsController@delete');
	Route::post('doadd','NewsController@create');
});

Route::group(['prefix'=>'newstype'],function(){
	Route::get('list','NewstypeController@showlist');
	Route::get('edit','NewstypeController@edit');
	Route::post('doedit','NewstypeController@update');
	Route::get('add',function(){
		return view('admin.newtype.add');
	});
	Route::post('doadd','NewstypeController@create');
	Route::get('delete','NewstypeController@delete');
});

Route::get('/news', 'NewsController@index')->name('news');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('email/verify/{token}',['as' => 'email.verify', 'uses' => 'EmailController@verify']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


