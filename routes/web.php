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

//Route::get('/testcurl','HomeController@index');
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
Route::get('/old', 'IndexController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'golf','namespace' => 'API'],function(){
	Route::get('/','GolfController@index');
	//?y=2017&title=2017公开赛测试&tpl=1 ,y是年份，根据年份查询数据，title 是页面专题的参数显示，tpl是显示的模板名称
	Route::get('/tpl','GolfController@showtpl'); 
	Route::get('/newsinfo','GolfController@news');
	Route::get('/scores','GolfController@scores');
	Route::get('/scores_detail','GolfController@scores_detail');
});
Route::get('/videos',function(){
	return view('home.golf.videos');
});
//欧巡赛
Route::get('/europe','API\GolfController@europe');
Route::get('/scores',function(){
	return view('home.golf.scores-detail');
});


Route::get('email/verify/{token}',['as' => 'email.verify', 'uses' => 'EmailController@verify']);

//Auth::routes();


//新的首页样式
//route::get('/new',function(){
//    return view('home.index');
//});




route::get('test','HomeController@test');
route::get('testupload',function(){
	return view('test');
});



