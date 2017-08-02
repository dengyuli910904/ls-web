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

Route::get('/','IndexController@index');


Route::prefix('admin')
    ->namespace('Admin')
    ->group(base_path('routes/admin.php'));

Route::prefix('api')
	->namespace('API')
	->group(base_path('routes/api.php'));

// Route::any('/upload','UeditorController@server');
Route::group(['namespace' => 'Common'],function(){
    Route::any('/upload','UeditorController@server');
    Route::any('/fileupload','UeditorController@uploadimg');
});


Route::resource('topics', 'TopicsController');
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::resource('topics', 'TopicsController');
    Route::resource('topics-news', 'TopicsNewsController');
    Route::resource('friendship', 'FriendshipController');
    Route::resource('sponsor', 'SponsorController');
    Route::resource('homepage', 'HomepageController');
    Route::resource('partner', 'PartnerController');
});


Route::get('/topicsdetail', 'TopicsController@detail')->name('detail');
Route::group(['prefix'=>'about'],function(){
	Route::get('/', function(){
		return view('home.about.about');
	});
	Route::get('team', function(){
		return view('home.about.team');
	});
	Route::get('culture', function(){
		return view('home.about.culture');
	});
	Route::get('history', function(){
		return view('home.about.history');
	});
	Route::get('connectus', function(){
		return view('home.about.connectus');
	});
});
Route::group(['prefix'=>'knowledge'],function(){
	Route::get('/', function(){
		return view('home.knowledge.index');
	});
});


Route::group(['prefix'=>'news'],function(){
        Route::get('/', 'API\NewsController@index');
        Route::get('hot', 'API\NewsController@hot');
        Route::get('recommend', 'API\NewsController@recommend');
        Route::get('detail', 'API\NewsController@detail');
});



Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('email/verify/{token}',['as' => 'email.verify', 'uses' => 'EmailController@verify']);

//Auth::routes();



