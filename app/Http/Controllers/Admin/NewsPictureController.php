<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsPicture;
use Redirect,Input;

class NewsPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        // return json_encode(array('code'=>200,'msg'=>'获取成功','data'=>$list));
        return view('newspicture.index',array('data'=>$list,'searchtxt'=>$searchtxt));
        // return view('news.news');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newspicture.add');
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
        if(!$model){
            $model->name = $request->input('name');
            $model->description = $request->input('description');
            $model->path = $request->input('path');
            $model->news_id = $request->input('news_id');
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
        $model = NewsPicture::find($id);
        if($model){
            return view('newspicture.edit',['data'=>$model]);
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
            return view('newspicture.edit',['data'=>$model]);
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
            $model->path = $request->input('path');
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
