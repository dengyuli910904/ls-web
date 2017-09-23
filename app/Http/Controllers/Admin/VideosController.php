<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VideoNews;
use Redirect,Input;
use UUID;
use App\Models\CategoriesModel;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = VideoNews::get();
        return view('admin.material.videos',['data'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CategoriesModel::get();
        return view('admin.material.videos_add',['categories'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = new VideoNews();
        $video->id = UUID::generate();
        $video->category_id = $request->input('category_id');
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->cover = $request->input('cover');
        $video->vpath = $request->input('vpath');
        if($video->save())
            return Redirect::back();
        else
             return Redirect::back()->withInput()->withErrors('添加失败');
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
    public function edit(Request $request)
    {
        if(!$request->has('id'))
             return Redirect::back()->withInput()->withErrors('参数错误');
        $video = VideoNews::find($request->input('id'));
        if(!$video)
             return Redirect::back()->withInput()->withErrors('未找到相关记录');
         else{
            $category = CategoriesModel::get();
             return view('admin.material.videos_edit',['videos'=>$video,'categories'=>$category]);
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(!$request->has('id'))
             return Redirect::back()->withInput()->withErrors('参数错误');
        $video = VideoNews::find($request->input('id'));
        if(!$video)
             return Redirect::back()->withInput()->withErrors('未找到相关记录');
         else{
            $video->id = UUID::generate();
            $video->category_id = $request->input('category_id');
            $video->title = $request->input('title');
            $video->description = $request->input('description');
            $video->cover = $request->input('cover');
            $video->vpath = $request->input('vpath');
            if($video->save())
                return Redirect::back();
            else
                 return Redirect::back()->withInput()->withErrors('修改失败');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(!$request->has('id'))
            return response()->json(['code' => 400, 'msg' => '参数错误']);
        $id = $request->input('id');
        $v = VideoNews::find($id);
        if(!$v)
            return response()->json(['code' => 204, 'msg' => '信息不存在']);
        if($v->delete())
            return response()->json(['code' => 200, 'msg' => '删除成功']);
        else
            return response()->json(['code' => 400, 'msg' => '删除失败']);
    }

    /**
     * 修改
     */
    // public function showedit(Request $request){
    //     return view('admin.material.edit');
    // }

    /**
     * 隐藏/发布
     */
    public function handle(Request $request){
        if(!$request->has('id'))
            return response()->json(['code' => 400, 'msg' => '参数不正确']);
        $pic = VideoNews::find($request->input('id'));
        if(!$pic)
            return response()->json(['code' => 400, 'msg' => '视频记录不存在']);

        $pic->is_hidden = $request->input('is_hidden');
        if($pic->save())
            return response()->json(['code' => 200, 'msg' => '操作成功']);
        else
            return response()->json(['code' => 400, 'msg' => '操作失败']);
    }
}
