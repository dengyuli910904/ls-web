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
     return view('home.default');
 });

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


// //新闻管理
// Route::group(['prefix'=>'news'],function(){
//     Route::get('list','NewsController@showlist');
//     Route::get('edit','NewsController@edit');
//     Route::post('doedit','NewsController@update');
//     Route::get('add','NewsController@add');
//     Route::get('delete','NewsController@delete');
//     Route::post('doadd','NewsController@create');

//     Route::post('getlist','NewsController@getnewslit');
// });

// //新闻类型管理
// Route::group(['prefix'=>'newstype'],function(){
//     Route::get('list','CategoriesController@showlist');
//     Route::get('edit','CategoriesController@edit');
//     Route::post('doedit','CategoriesController@update');
//     Route::get('add',function(){
//         return view('admin.newtype.add');
//     });
//     Route::post('doadd','CategoriesController@create');
//     Route::get('delete','CategoriesController@delete');
// });
// //留言管理
// Route::group(['prefix'=>'comments'],function(){
//     Route::get('list','CommentsController@showlist');
// });

Route::resource('topics', 'TopicsController');
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::resource('topics', 'TopicsController');
    Route::resource('topics-news', 'TopicsNewsController');
    Route::resource('friendship', 'FriendshipController');
    Route::resource('sponsor', 'SponsorController');
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




Route::get('/news', 'API\NewsController@index');
Route::get('/hotnews', 'API\NewsController@hot');
Route::get('/newsdetail', 'API\NewsController@detail');

//Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('email/verify/{token}',['as' => 'email.verify', 'uses' => 'EmailController@verify']);

//Auth::routes();



