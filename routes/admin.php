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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::group(['namespace'=>'Admin'],function(){
	Route::get('/test',function (Request $request){
		return view('admin.index');
	});
	//新闻管理
	Route::group(['prefix'=>'news'],function(){
		Route::get('list','NewsController@showlist');
		Route::get('edit','NewsController@edit');
		Route::post('doedit','NewsController@update');
		Route::get('add','NewsController@add');
		Route::get('delete','NewsController@delete');
		Route::post('doadd','NewsController@create');

		Route::post('getlist','NewsController@getnewslit');
		Route::post('handle','NewsController@handle');
	});

	//新闻类型管理
	Route::group(['prefix'=>'newstype'],function(){
		Route::get('list','CategoriesController@showlist');
		Route::get('edit','CategoriesController@edit');
		Route::post('doedit','CategoriesController@update');
		Route::get('add',function(){
			return view('admin.newtype.add');
		});
		Route::post('doadd','CategoriesController@create');
		Route::get('delete','CategoriesController@delete');
	});

	//留言管理
	Route::group(['prefix'=>'comments'],function(){
		Route::get('list','CommentsController@showlist');
		Route::post('add','CommentsController@add');
	});
	//首页管理
	Route::resource('homepage', 'HomepageController');
	//合作伙伴
	Route::resource('partner','PartnerController');

	//图片新闻
	Route::resource('newpicture','NewsPictureController');
	//图片新闻-图片
	Route::resource('pictures','PicturesController');

	//视频新闻
	Route::resource('videonews','VideoNewsController');

	//
	// Route::group(['namespace'=>'Admin',prefix' => 'admin'], function(){
	//     Route::resource('topics', 'TopicsController');
	//     Route::resource('topics-news', 'TopicsNewsController');
	//     Route::resource('friendship', 'FriendshipController');
	//     Route::resource('sponsor', 'SponsorController');
	//     Route::resource('homepage', 'HomepageController');
	//     Route::resource('partner', 'PartnerController');
	// });

	Route::resources([
		// 'topics' => 'TopicsController',
		'topics-news' => 'TopicsNewsController',
		'friendship' => 'FriendshipController',
		'sponsor' => 'SponsorController',
		'homepage' => 'HomepageController',
		'partner' => 'PartnerController',
	]);

	Route::resources([
		'system' => 'System\SystemController',
		'menu' => 'System\MenuController',
		'admin' => 'System\AdminController',
		'role' => 'System\RoleController',
		'permission' => 'System\PermissionController',
		'permission-role' => 'System\PermissionRoleController',
		'cache' => 'System\CacheController',
	]);

	Route::get('login', 'AuthController@login');
	Route::post('login', 'AuthController@login');
	Route::get('logout', 'AuthController@logout');
	Route::post('logout', 'AuthController@logout');







	// 2017-09-10

	/*素材管理*/

	Route::group(['prefix'=>'material'],function(){
		// Route::resources([
		// 	'pictures' => 'PicturesController',
		// 	'videos' => 'VideosController'
		// ]);
		route::get('pictures/','PicturesController@index');
		route::get('pictures/edit','PicturesController@edit');
		route::get('pictures/create','PicturesController@create');
		route::post('pictures/store','PicturesController@store');
		route::post('pictures/update','PicturesController@update');
		route::delete('pictures/delete/{$id}','PicturesController@delete');
		route::put('pictures/handle','PicturesController@handle');
		
		route::get('videos/','VideosController@index');
		route::get('videos/showedit','VideosController@showedit');
		route::get('videos/create','VideosController@create');
		route::post('videos/store','VideosController@store');
		route::put('videos/update','VideosController@update');
	});
	/*新闻管理*/
	Route::group(['prefix'=>'news'],function(){
		route::get('article/','NewsController@index');
		route::get('article/create','NewsController@create');
		route::get('article/showedit','NewsController@showedit');
		route::post('article/store','NewsController@store');
		route::put('article/update','NewsController@update');

		route::get('pictures/','NewsPictureController@index');
		route::get('pictures/create','NewsPictureController@create');
		route::get('pictures/showedit','NewsPictureController@showedit');
		route::post('pictures/store','NewsPictureController@store');
		route::put('pictures/update','NewsPictureController@update');
		route::get('pictures/list','NewsPictureController@picture_list');

		route::get('videos/','VideoNewsController@index');
		route::get('videos/create','VideoNewsController@create');
		route::get('videos/showedit','VideoNewsController@showedit');
		route::post('videos/store','VideoNewsController@store');
		route::put('videos/update','VideoNewsController@update');


	});
	/**
	 * 	专题管理
	 */
	Route::group(['prefix'=>'topics'],function(){
		route::get('/','TopicsController@index');
		route::get('create','TopicsController@create');
		route::get('edit','TopicsController@edit');
		route::post('store','TopicsController@store');
		route::post('update','TopicsController@update');
		//专题新闻管理
		route::get('news_list','TopicsNewsController@index');
	});

	/*类别管理*/
	Route::group(['prefix'=>'category'],function(){
		route::get('/','CategoriesController@index');
		route::get('create','CategoriesController@create');
		route::get('edit','CategoriesController@edit');
		route::post('store','CategoriesController@store');
		route::put('update','CategoriesController@update');
	});
	/*评论管理*/
	Route::group(['prefix'=>'comments'],function(){
		route::get('comment','CommentsController@index');
		route::get('feedback+','FeedbackController@index');
	});
	/*会员管理*/
	Route::group(['prefix'=>'member'],function(){
		route::get('/','UsersController@index');
		route::get('droped','UsersController@droped_user');
		route::get('slm','UsersController@server_level_management');//等级服务管理
		route::get('pos','UsersController@award_point_system');//积分管理
		// route::get('browsinghistory','');// 用户浏览记录
		// route::get('downloads','');//下载记录
		// route::get('shares','');//分享记录

	});
	/*管理员管理*/
	route::group(['prefix'=>'admins'],function(){
		route::get('role/','RoleController@index');
		route::get('role/create','RoleController@create');
		route::get('role/edit','RoleController@edit');
		route::post('role/store','RoleController@store');
		route::put('role/store','RoleController@store');

		route::get('promision/','PromisionController@index');
		route::get('promision/create','PromisionController@create');
		route::get('promision/edit','PromisionController@edit');
		route::post('promision/store','PromisionController@store');
		route::put('promision/update','PromisionController@update');

		route::get('admin/','AdminController@index');
		route::get('admin/create','AdminController@create');
		route::get('admin/edit','AdminController@edit');
		route::post('admin/store','AdminController@store');
		route::put('admin/update','AdminController@update');
	});
	/*系统统计*/
	/*系统管理*/

