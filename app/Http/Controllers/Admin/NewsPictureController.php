<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsPicture;
use App\Models\Pictures;
use Redirect,Input;
use UUID;

class NewsPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('searchtxt')){
            $searchtxt = $request->input('searchtxt');
            $list = NewsPicture::where(function($query) use ($searchtxt){
                $query->where('name','like','%'.$searchtxt.'%')
                      ->orwhere('description','like','%'.$searchtxt.'%');
            })->orderby('created_at','desc')->paginate(5);
        }else{
            $searchtxt = '';
            $list = NewsPicture::orderby('created_at','desc')->paginate(5);
        }
        foreach ($list as $val) {
            $pics = Pictures::where('news_id',$val->id)->get();
            $val->pics = $pics;
        }
        // return $list;
        // return json_encode(array('code'=>200,'msg'=>'获取成功','data'=>$list));
        return view('admin.newspicture.index',array('data'=>$list,'searchtxt'=>$searchtxt));
        // return view('news.news');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newspicture.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = NewsPicture::where('name',$request->input('name'))->first();
        $news_id = UUID::generate();
        if(!$model){
            $model = new NewsPicture();
            $model->id = $news_id;
            $model->name = $request->input('name');
            $model->description = $request->input('description');
            $model->publishtime = $request->input('publishtime');
            $model->tags = $request->input('newstag');
            // $model->publishtime = $request->input('publishtime');
            $model->resource = $request->input('resource');
            $model->resource_url = $request->input('resourceurl');
            $model->keyword = $request->input('keyword');
            $model->editor = $request->input('editor');
            $model->click_count = $request->input('click_count');
            $model->read_count = $request->input('read_count');
            // $model->ordernum = $request->input('ordernum');
            // $model->cover = $request->input('cover');
            // $model->content = $request->input('editorValue');
            // $model->category_id = $request->input('type');
            $model->user_id = 0;//默认为当前登陆用户
            // $model->news_id = $request->input('news_id');
            if($model->save()){
                $path = $request->input('path');
                if(!empty($path)){
                    $arr = explode(',', $path);
                    foreach ($arr as $val) {
                        $pic = new Pictures();
                        $pic->id = UUID::generate();
                        $pic->news_id = $news_id;
                        $pic->url = $val;
                        // $pic->orders
                        $pic->save();
                    }
                }
                return Redirect::back();
            }
            else{
                return Redirect::back()->withInput()->withErrors('添加失败'); 
            }
        }else{
            return Redirect::back()->withInput()->withErrors('该记录已存在');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = NewsPicture::find($id);
        if($model){
            return view('admin.newspicture.edit',['data'=>$model]);
        }else{
            return Redirect::back()->withInput()->withErrors('该记录不存在');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = NewsPicture::find($id);
        if($model){
            $pics = Pictures::where('news_id',$id)->select('url')->get();
            $arr = [];
            foreach ($pics as $key => $value) {
                array_push($arr, $value->url);
                if($key === 0){
                    $path = $value->url.',';
                }else{
                    $path = $path.','.$value->url;
                }
            }
            $model->path = $path;
            $model->pics = $arr;
            return view('admin.newspicture.edit',['data'=>$model]);
        }else{
            return Redirect::back()->withInput()->withErrors('该记录不存在');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = NewsPicture::find($id);
        if($model){
            $model->name = $request->input('name');
            $model->description = $request->input('description');
            // $model->path = $request->input('path');
            $model->news_id = $request->input('news_id');
            if($model->save()){
                return Redirect::back();
            }
            else{
                return Redirect::back()->withInput()->withErrors('保存失败'); 
            }
        }else{
            return Redirect::back()->withInput()->withErrors('该记录不存在');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = NewsPicture::find($id);
        if($model){
            if($model->delete()){
                return response()->json(['status' => 0, 'msg' => '删除成功']);
            }
            return response()->json(['status' => 0, 'msg' => '删除失败']);
        }
        return response()->json(['status' => 0, 'msg' => '新闻不存在']);
    }
}
