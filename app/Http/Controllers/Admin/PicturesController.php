<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pictures;
use Redirect,Input;
use UUID;
use App\Models\NewsPicture;

class PicturesController extends Controller
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
        // var_dump($request->input());
        if(!$request->has('id')){
            $list = Pictures::leftjoin('news_picture','pictures.news_id','=','news_picture.id')
            ->select('pictures.*','news_picture.name as news_name')->get();//paginate(10);
            return view('admin.material.pictures',['data'=>$list]);
        }else{
            $list = Pictures::where('news_id',$request->input('id'))->get();
            return view('admin.newspicture.list',['data'=>$list,'id'=>$request->input('id')]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(!$request->has('id')){
            // return Redirect::back();
            $act = NewsPicture::where('is_hidden','0')->orderby('updated_at','desc')->select('name','id')->get();
            return view('admin.material.pictures_add',['act_list'=>$act]);
        }
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
        // return $request;
        if(!$request->has('news_id'))
            return Redirect::back()->withInput()->withErrors('需要传入图片新闻id');
        if(!$request->has('cover') || empty($request->input('cover')))
            return Redirect::back()->withInput()->withErrors('需要上传图片');

        $pic = Pictures::where('news_id',$request->input('news_id'))->where('name',$request->input('name'))->first();
        if($pic)
            return Redirect::back()->withInput()->withErrors('已存在同名图片');

        $pic = new Pictures();
        $pic->id = UUID::generate();
        $pic->name = $request->input('name');
        $pic->news_id = $request->input('news_id');
        $pic->description = $request->input('description');
        $pic->url = $request->input('cover');
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
    public function edit(Request $request)
    {
        if(!$request->has('id'))
            return response()->json(['code' => 400, 'msg' => '参数不正确']);
        $pic = Pictures::find($request->input('id'));
        if(!$pic){
            return Redirect::back();
        }
        else{
            $act = NewsPicture::where('is_hidden','0')->orderby('updated_at','desc')->select('name','id')->get();
            return view('admin.material.pictures_edit',['act_list'=>$act,'pictures'=>$pic]);
        }
            
            // return view('admin.newspicture.editimg',['data'=>$pic]);
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
        $id = $request->input('id');
        $pic = Pictures::find($id);
        if(!$pic)
            return Redirect::back()->withInput()->withErrors('图片信息不存在');
        
        $pic->name = $request->input('name');
        $pic->news_id = $request->input('news_id');
        $pic->description = $request->input('description');
        $pic->url = $request->input('cover');
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


    /**
     * 修改
     */
    public function showedit(Request $request){
        return view('admin.material.edit');
    }

    /**
     * 隐藏/发布
     */
    public function handle(Request $request){
        if(!$request->has('id'))
            return response()->json(['code' => 400, 'msg' => '参数不正确']);
        $pic = Pictures::find($request->input('id'));
        if(!$pic)
            return response()->json(['code' => 400, 'msg' => '参数不正确']);

        $pic->is_hidden = $request->input('is_hidden');
        if($pic->save())
            return response()->json(['code' => 200, 'msg' => '操作成功']);
        else
            return response()->json(['code' => 400, 'msg' => '操作失败']);
    }
}
