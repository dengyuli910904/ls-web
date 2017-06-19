<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsModel;
use App\NewandtypeModel;
use App\NewstypeModel;
use Redirect, Input;
use UUID;
use DB;

class NewsController extends Controller
{

    public function index(Request $request){
        return view('news');
    }

    /**
     * 获取列表
     */
    public function showlist(Request $request){
        $list = DB::table('tb_news')->orderby('created_at','desc')->paginate(5);//NewsModel::all();
        return View('admin.news.index',array('data'=>$list));
    }
    /**
     * 添加新闻
     */
    public function add(){
        $type = NewstypeModel::where('isshow','=','1')->get();
    	return view('admin.news.add',array('typedata'=>$type));
    }

    /**
     * 新增新闻
     */
    public function create(Request $request){
    	$model = new NewsModel();
        $model->uuid = UUID::generate();
        $model->title = $request->input('title');
        $model->intro = $request->input('intro');
        $model->newstag = $request->input('newstag');
        $model->publishtime = $request->input('publishtime');
        $model->resource = $request->input('resource');
        $model->resourceurl = $request->input('resourceurl');
        $model->keyword = $request->input('keyword');
        $model->editor = $request->input('editor');
        $model->clicknum = $request->input('clicknum');
        $model->readnum = $request->input('readnum');
        $model->ordernum = $request->input('ordernum');
        $model->cover = $request->input('cover');
        $model->content = $request->input('editorValue');
        $type = $request->input('type');
        $result = $model->save();
        if($result){
            $newstype = new NewandtypeModel();
            $newstype->uuid = UUID::generate();
            $newstype->news_uuid = $model->uuid;
            $newstype->type_uuid = $type;
            $newstype->save();
            return Redirect::back();
        }else{
            return Redirect::back()->withInput()->withErrors('添加失败');
        }
    }

    /**
     * 修改新闻
     */
    public function edit(Request $request){
        $uuid = $request->input('uuid');
        $model = NewsModel::where('uuid','=',$uuid)->first();
        $newsandtype = NewandtypeModel::where('news_uuid','=',$uuid)->first();
        if(!empty($newsandtype)){
            $model->type = $newsandtype->type_uuid;
        }else{
            $model->type = 1;
        }
        $type = NewstypeModel::where('isshow','=','1')->get();
        if(!empty($model)){
            return View('admin.news.edit',array('data'=>$model,'typedata'=>$type));
        }else{
            return Redirect::back()->withInput()->withErrors('该新闻记录不存在');
        }
    }

    /**
     * 更新新闻
     */
    public function update(Request $request){
        $model = NewsModel::where('uuid','=',$request->input('uuid'))->first();
        if(!empty($model)){
            // $model->uuid = UUID::generate();
            $model->title = $request->input('title');
            $model->intro = $request->input('intro');
            $model->newstag = $request->input('newstag');
            $model->publishtime = $request->input('publishtime');
            $model->resource = $request->input('resource');
            $model->resourceurl = $request->input('resourceurl');
            $model->keyword = $request->input('keyword');
            $model->editor = $request->input('editor');
            $model->clicknum = $request->input('clicknum');
            $model->readnum = $request->input('readnum');
            $model->ordernum = $request->input('ordernum');
            $model->cover = $request->input('cover');
            $model->content = $request->input('editorValue');
            $type = $request->input('type');
            $result = $model->save();
            if($result){
                $newstype = NewandtypeModel::where('news_uuid','=',$model->uuid)->first();
                if(!empty($newstype)){
                    $newstype->type_uuid = $type;
                    $newstype->save();
                }
                return Redirect::back();
            }else{
                return Redirect::back()->withInput()->withErrors('修改失败');
            }
        }else{
            return Redirect::back()->withInput()->withErrors('该新闻记录不存在');
        }
    }

    /**
     * 删除新闻
     */
    public function delete(Request $request){
        $model = NewsModel::where('uuid','=',$request->input('uuid'))->first();
        if(!empty($model)){
            if($model->delete()){
                $newstype = NewandtypeModel::where('news_uuid','=',$model->uuid)->first();
                if(!empty($newstype)){
                    $newstype->delete();
                }
                return Redirect::back();
            }else{
                return Redirect::back()->withInput()->withErrors('删除失败！');
            }
        }else{
            return Redirect::back()->withInput()->withErrors('该新闻记录不存在');
        }
    }

    /**
     * 操作新闻，启用禁用，审核类
     */
    public function handle(Request $request){

    }
}
