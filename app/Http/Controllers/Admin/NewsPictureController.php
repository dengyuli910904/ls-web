<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsPicture;
use App\Models\Pictures;
use Redirect,Input;
use UUID;
use App\Models\TopicsModel;
use App\Models\CategoriesModel;
use App\Models\PicturesNewsCategory;
use App\Models\TopicsNewsModel;
use DB;

class NewsPictureController extends Controller
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
            $list = NewsPicture::where(function($query) use ($searchtxt){
                $query->where('name','like','%'.$searchtxt.'%')
                      ->orwhere('description','like','%'.$searchtxt.'%');
            })->orderby('created_at','desc')
            ->get();//->paginate(5);
        }else{
            $searchtxt = '';
            $list = NewsPicture::orderby('created_at','desc')
            ->get();//->paginate(5);
        }
        foreach ($list as $val) {
            $pics = Pictures::where('news_id',$val->id)->get();
            $val->pics = $pics;
        }
        // return $list;
        // return json_encode(array('code'=>200,'msg'=>'获取成功','data'=>$list));
        return view('admin.news.picturenews',array('data'=>$list,'searchtxt'=>$searchtxt));
        // return view('news.news');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = TopicsModel::select('title','id')->orderby('created_at','desc')->take(10)->get();
        $type = CategoriesModel::where('is_hidden','=','0')->get();
        return view('admin.news.picturenews_add',['topics'=>$topics,'typedata'=>$type]);
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
            DB::beginTransaction();
            try{


                $id = (string)UUID::generate();
                $news = NewsPicture::create([
                    'id'=>$id,
                    'name' => $request->input('title'),
                    'description' => $request->input('intro'),
                    'tags' => $request->input('tags'),
                    'resource' => $request->input('resource'),
                    'resource_url' => $request->input('resource_url'),
                    'keyword' => $request->input('keyword'),
                    'editor' => $request->input('editor'),
                    'click_count' => $request->input('click_count'),
                    'read_count' => $request->input('read_count'),
                    'cover' => $request->input('cover'),
                    // 'content' => $request->input('editorValue'),
                    'user_id' => 123456,
                    'editor' => $request->input('editor'),
                    'publishtime' =>$request->input('newtime')
                    ]);
                $categories_id = $request->input('categories');
                if(count($categories_id)>0){
                    $ct = array();
                    foreach ($categories_id as $cid) {
                        array_push($ct, array('id'=>(string)UUID::generate(),'categories_id'=>$cid,'picture_news_id'=>$id));
                    }
                    $category = PicturesNewsCategory::insert($ct);
                }


                $topics_id = $request->input('topics');
                  // return $ct;
                if(count($topics_id)>0){
                    $tp = array();
                    foreach ($topics_id as $tid) {
                        array_push($tp, array('topics_id'=>$tid,'news_uuid'=>$id,'news_type'=>1));
                    }
                    $topic = TopicsNewsModel::insert($tp);
                }


                DB::commit();
                return Redirect::back();
            }catch(\Illuminate\Database\QueryException $ex) {
                DB::rollback();
                return Redirect::back()->withInput()->withErrors('添加失败');
                // return \Response::json(['status' => 'error', 'error_msg' => 'Failed, please contact supervisor']);
            }
            // $model = new NewsPicture();
            // $model->id = $news_id;
            // $model->name = $request->input('name');
            // $model->description = $request->input('description');
            // $model->publishtime = $request->input('publishtime');
            // $model->tags = $request->input('newstag');
            // // $model->publishtime = $request->input('publishtime');
            // $model->resource = $request->input('resource');
            // $model->resource_url = $request->input('resourceurl');
            // $model->keyword = $request->input('keyword');
            // $model->editor = $request->input('editor');
            // $model->click_count = $request->input('click_count');
            // $model->read_count = $request->input('read_count');
            // // $model->ordernum = $request->input('ordernum');
            // $model->cover = $request->input('path');
            // // $model->content = $request->input('editorValue');
            // // $model->category_id = $request->input('type');
            // $model->user_id = 0;//默认为当前登陆用户
            // // $model->news_id = $request->input('news_id');
            // if($model->save()){
            //     $path = $request->input('path');
            //     if(!empty($path)){
            //         $arr = explode(',', $path);
            //         foreach ($arr as $val) {
            //             $pic = new Pictures();
            //             $pic->id = UUID::generate();
            //             $pic->news_id = $news_id;
            //             $pic->url = $val;
            //             // $pic->orders
            //             $pic->save();
            //         }
            //     }
            //     return Redirect::back();
            // }
            // else{
            //     return Redirect::back()->withInput()->withErrors('添加失败'); 
            // }
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
    public function edit(Request $request)
    {
        if(!$request->input('id'))
            return Redirect::back()->withInput()->withErrors('参数错误'); 
        $id = $request->input('id');
        $model = NewsPicture::find($id);
        if($model){
//            $pics = Pictures::where('news_id',$id)->select('url')->get();
//            $arr = [];
//            foreach ($pics as $key => $value) {
//                array_push($arr, $value->url);
//                if($key === 0){
//                    $path = $value->url.',';
//                }else{
//                    $path = $path.','.$value->url;
//                }
//            }
//            $model->path = $path;
//            $model->pics = $arr;
            return view('admin.news.picturenews_edit',['data'=>$model]);
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
    public function update(Request $request)
    {
        if(!$request->has('id'))
            return Redirect::back()->withInput()->withErrors('保存失败'); 
        $id = $request->input('id'); 
        $model = NewsPicture::find($id);
        if($model){
            if($request->has('handle_type')){
                $model->is_hidden = !$request->input('is_hidden');
            }else{
                $model->name = $request->input('name');
                $model->description = $request->input('description');
                // $model->path = $request->input('path');
                // $model->news_id = $request->input('news_id');
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
                $model->cover = $request->input('path');
            }
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
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $model = NewsPicture::find($id);
        if($model){
            if($model->delete()){
                return response()->json(['code' => 200, 'msg' => '删除成功']);
            }
            return response()->json(['code' => 400, 'msg' => '删除失败']);
        }
        return response()->json(['code' => 204, 'msg' => '新闻不存在']);
    }
    

    /**
     * 新闻图片列表
     */
    public function picture_list(Request $request){
        if(!$request->has('id'))
            return Redirect::back()->withInput()->withErrors('参数错误');
        $news = NewsPicture::find($request->input('id'));
        if(!$news)
            return Redirect::back()->withInput()->withErrors('该记录不存在');
        $list = Pictures::where('news_id',$request->input('id'))->get();
        return view('admin.news.pictures',['data'=>$list]);
    }
}
