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
		return "hhahahhahahaha";
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
		// Route::post('handle',function(Request $request){
		// 	if($request->has('is_hidden')){
				
		// 	}else if($request->has('is_hot')){

		// 	}else if($request->has('is_recommend')){

		// 	}else if($request->has('is_recommend_frontpage')){

		// 	}else{
		// 		// return Redirect::back()
		// 	}

		// });
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
// });
