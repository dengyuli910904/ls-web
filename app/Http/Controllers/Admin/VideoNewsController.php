<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VideoNews;
use Redirect,Input;
use UUID;
use App\Models\TopicsModel;
use App\Models\CategoriesModel;
use App\Models\VideoNewsCategory;
use App\Models\TopicsNewsModel;
use DB;

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
            })->orderby('created_at','desc')
            ->get();//->paginate(5);
        }else{
            $searchtxt = '';
            $list = VideoNews::orderby('created_at','desc')->get();//->paginate(5);
        }
        // return json_encode(array('code'=>200,'msg'=>'获取成功','data'=>$list));
        return view('admin.news.videonews',array('data'=>$list,'searchtxt'=>$searchtxt));
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
        $type = CategoriesModel::where('is_hidden','=','0')->where('categories_num','<',1000)->get();
        // return view('admin.news.picturenews_add',['topics'=>$topics,'typedata'=>$type]);
        return view('admin.news.videonews_add',['topics'=>$topics,'typedata'=>$type]);
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
            DB::beginTransaction();
            try{
//                $categories_id = $request->input('categories');
//                $topics_id = $request->input('topics');
                $newtime =  date('y-m-d h:i:s',time());
                if(!empty($request->input('newtime'))){
                    $newtime = $request->input('newtime');
                }

                $id = (string)UUID::generate();
                $news = VideoNews::create([
                    'id'=>$id,
                    'title' => $request->input('title'),
                    'description' => $request->input('intro'),
                    'tags' => $request->input('tags'),
                    'resource' => $request->input('resource'),
                    'resource_url' => $request->input('resource_url'),
                    'keyword' => $request->input('keyword'),
                    'editor' => $request->input('editor'),
                    'click_count' => $request->input('click_count'),
                    'read_count' => $request->input('read_count'),
                    'cover' => $request->input('cover'),
                    'vpath' => $request->input('vpath'),
                    // 'content' => $request->input('editorValue'),
                    'user_id' => 123456,
                    'editor' => $request->input('editor'),
                    'publishtime' => $newtime
                    ]);
                $categories_id = $request->input('categories');
                if(count($categories_id)>0){
                    $ct = array();
                    foreach ($categories_id as $cid) {
                        array_push($ct, array('id'=>(string)UUID::generate(),'categories_id'=>$cid,'video_news_id'=>$id));
                    }
                    $category = VideoNewsCategory::insert($ct);
                }


                $topics_id = $request->input('topics');
                // return $ct;
                if(count($topics_id)>0){
                    $tp = array();
                    foreach ($topics_id as $tid) {
                        array_push($tp, array('topics_id'=>$tid,'news_uuid'=>$id,'news_type'=>2));
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

            // $model = new VideoNews();
            // $model->id = UUID::generate();
            // $model->title = $request->input('name');
            // $model->description = $request->input('description');
            // $model->cover = $request->input('cover');
            // $model->vpath = $request->input('vpath');
            // if($model->save()){
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
    public function edit(Request $request)
    {
      $id = $request->input('id');
      $model = VideoNews::find($id);
      if($model){
          return view('admin.news.videonews_edit',['data'=>$model]);
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
      $id = $request->input('id');
        $model = VideoNews::find($id);
        if($model){
            $model->title = $request->input('title');
            $model->description = $request->input('intro');
            $model->cover = $request->input('cover');
            $model->vpath = $request->input('vpath');
            $model->tags = $request->input('tags');
            $model->resource = $request->input('resource');
            $model->resource_url = $request->input('resource_url');
            $model->keyword = $request->input('keyword');
            $model->editor = $request->input('editor');
            $model->click_count = $request->input('click_count');
            $model->read_count = $request->input('read_count');
            $model->cover = $request->input('cover');
            $model->vpath = $request->input('vpath');
            // 'content' = $request->input('editorValue'),
            $model->user_id = 123456;
            $model->editor =  $request->input('editor');
            $model->newtime= $request->input('newtime');
            $model->allow_comment = $request->input('allow_comment');
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
                return response()->json(['code' => 200, 'msg' => '删除成功']);
            }
            return response()->json(['code' => 400, 'msg' => '删除失败']);
        }
        return response()->json(['code' => 204, 'msg' => '新闻不存在']);
    }
}
