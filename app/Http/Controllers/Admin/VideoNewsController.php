<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VideoNews;
use Redirect,Input;
use UUID;

class VideoNewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('check.permission');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('searchtxt')){
            $searchtxt = $request->input('searchtxt');
            $list = VideoNews::where(function($query) use ($searchtxt){
                $query->where('title','like','%'.$searchtxt.'%')
                      ->orwhere('description','like','%'.$searchtxt.'%');
            })->orderby('created_at','desc')->paginate(5);
        }else{
            $searchtxt = '';
            $list = VideoNews::orderby('created_at','desc')->paginate(5);
        }
        // return json_encode(array('code'=>200,'msg'=>'获取成功','data'=>$list));
        return view('admin.videonews.index',array('data'=>$list,'searchtxt'=>$searchtxt));
        // return view('news.news');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videonews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = VideoNews::where('title',$request->input('name'))->first();
        if(!$model){
            $model = new VideoNews();
            $model->id = UUID::generate();
            $model->title = $request->input('name');
            $model->description = $request->input('description');
            $model->cover = $request->input('cover');
            $model->vpath = $request->input('vpath');
            if($model->save()){
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
        $model = VideoNews::find($id);
        if($model){
            return view('admin.videonews.edit',['data'=>$model]);
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
        $model = VideoNews::find($id);
        if($model){
            return view('admin.videonews.edit',['data'=>$model]);
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
        $model = VideoNews::find($id);
        if($model){
            $model->title = $request->input('title');
            $model->description = $request->input('description');
            $model->cover = $request->input('cover');
            $model->vpath = $request->input('vpath');
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
        $model = VideoNews::find($id);
        if($model){
            if($model->delete()){
                return response()->json(['status' => 0, 'msg' => '删除成功']);
            }
            return response()->json(['status' => 0, 'msg' => '删除失败']);
        }
        return response()->json(['status' => 0, 'msg' => '新闻不存在']);
    }
}
