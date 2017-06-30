<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentsModel;
use Redirect, Input;
use UUID;
use DB;

class CommentsController extends Controller
{
    public function showlist(Request $request){
    	if($request->has('searchtxt')){
    		$searchtxt = $request->input('searchtxt');
    		$list = CommentsModel::where('content','like','%'.$searchtxt.'%')->orderby('created_at','desc')->paginate(5);
    	}else{
    		$searchtxt = '';
    		$list = CommentsModel::orderby('created_at','desc')->paginate(5);
    	}
    	// $list = CommentsModel::paginate(5);
    	return view('admin.comments.index',array('data' => $list,'searchtxt'=>$searchtxt));
    }


    public function delete(Request $request){
    	if($request->has('id')){
    		$id = $request->input('id');
    		$model = CommentsModel::where('commnets_id','=',$id)->first();
    		if(!empty($model)){
    			if($model->delete()){
    				return Redirect::back();//->withInput()->withErrors('修改失败');
    			}else{
    				return Redirect::back()->withInput()->withErrors('删除失败');
    			}
    		}else{
    			return Redirect::back()->withInput()->withErrors('该记录不存在');
    		}
    	}else{
    		return Redirect::back()->withInput()->withErrors('参数错误');
    	}
    }


    
}
