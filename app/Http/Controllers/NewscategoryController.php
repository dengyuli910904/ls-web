<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News_categoridModel as NewstypeModel;
use Redirect, Input;
use UUID;
use DB;

class NewscategoryController extends Controller
{
    /**
     * 查询类型列表
     */
    public function showlist(Request $request){
    	$list = DB::table('news_category')->orderby('created_at','desc')->paginate(5);
    	return view('admin.newtype.index',array('data'=>$list));
    }

    /**
     * 创建新闻类型
     */
    public function create(Request $request){
    	$model = new NewstypeModel();
    	$model->uuid = UUID::generate();
    	$model->name = $request->input('name');
    	// $model->ordernum = $request->input('ordernum');
    	$result = $model->save();
    	if($result){
    		return Redirect::back();
    	}else{
    		return Redirect::back()->withInput()->withErrors('添加失败');
    	}
    }

    /**
     * 修改类型
     */
    public function edit(Request $request){
    	$model = NewstypeModel::where('uuid','=',$request->input('uuid'))->first();
    	if(empty($model)){
    		return Redirect::back()->withInput()->withErrors('该类型记录不存在'); 
    	}
    	return view('admin.newtype.edit',array('data'=>$model));
    }
    /**
     * 更新新闻类型
     */
    public function update(Request $request){
    	$model = NewstypeModel::where('uuid','=',$request->input('uuid'))->first();
    	if(empty($model)){
    		return Redirect::back()->withInput()->withErrors('该类型记录不存在'); 
    	}else{
    		$model->uuid = UUID::generate();
	    	$model->name = $request->input('name');
	    	// $model->ordernum = $request->input('ordernum');
	    	$result = $model->save();
	    	if($result){
	    		return Redirect::back();
	    	}else{
	    		return Redirect::back()->withInput()->withErrors('修改失败');
	    	}
    	}
    	
    }
    /**
     * 删除类型
     */
    public function delete(Request $request){
    	$model = NewstypeModel::where('uuid','=',$request->input('uuid'))->first();
    	if(empty($model)){
    		return Redirect::back()->withInput()->withErrors('该类型记录不存在'); 
    	}else{
	    	if($model->delete()){
	    		return Redirect::back();
	    	}else{
	    		return Redirect::back()->withInput()->withErrors('删除失败');
	    	}
    	}
    }
}
