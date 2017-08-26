<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pictures;
use Redirect,Input;
use UUID;

class PicturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // var_dump($request->input());
        if(!$request->has('id'))
            return Redirect::back();

        $list = Pictures::where('news_id',$request->input('id'))->get();
        return view('admin.newspicture.list',['data'=>$list,'id'=>$request->input('id')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(!$request->has('id'))
            return Redirect::back();
        return view('admin.newspicture.addimg',['id'=>$request->input('id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->has('news_id'))
            return Redirect::back()->withInput()->withErrors('需要传入图片新闻id');
        if(!$request->has('path') || empty($request->input('path')))
            return Redirect::back()->withInput()->withErrors('需要上传图片');

        $pic = Pictures::where('news_id',$request->input('news_id'))->where('name',$request->input('name'))->first();
        if($pic)
            return Redirect::back()->withInput()->withErrors('已存在同名图片');

        $pic = new Pictures();
        $pic->id = UUID::generate();
        $pic->name = $request->input('name');
        $pic->news_id = $request->input('news_id');
        $pic->description = $request->input('description');
        $pic->url = $request->input('path');
        if($pic->save())
            return Redirect::back();
        else
            return Redirect::back()->withInput()->withErrors('图片信息添加失败');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pic = Pictures::find($id);
        if(!$pic)
            return Redirect::back();
        else
            return view('admin.newspicture.editimg',['data'=>$pic]);
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
        $pic = Pictures::find($id);
        if(!$pic)
            return Redirect::back()->withInput()->withErrors('图片信息不存在');
        
        $pic->name = $request->input('name');
        $pic->news_id = $request->input('news_id');
        $pic->description = $request->input('description');
        $pic->url = $request->input('path');
        if($pic->save())
            return Redirect::back();
        else
            return Redirect::back()->withInput()->withErrors('图片信息保存失败');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pic = Pictures::find($id);
        if(!$pic)
            return response()->json(['status' => 0, 'msg' => '图片信息不存在']);
        if($pic->delete())
            return response()->json(['status' => 0, 'msg' => '删除成功']);
        else
            return response()->json(['status' => 0, 'msg' => '删除失败']);
    }
}
