<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=>'comments'],function(){
	Route::post('add','CommentsController@add');
	Route::get('getmsg','CommentsController@getmsg');
	Route::post('likes','CommentsController@likes');
	Route::post('dislikes','CommentsController@dislikes');
	Route::post('replay','CommentsController@replay');
	Route::get('getreplay','CommentsController@getreplay');
});

Route::group(['prefix'=>'collect'],function(){
	Route::post('add','NewsCollectionController@store');
});

Route::resource('favorites','FavoritesController');
