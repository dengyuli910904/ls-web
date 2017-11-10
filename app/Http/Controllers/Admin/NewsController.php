<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsModel;
// use App\Index_news_categoridModel as NewandtypeModel;
use App\Models\CategoriesModel as NewstypeModel;
use Redirect, Input;
use UUID;
use DB;
use App\Models\TopicsNewsModel;
use App\Models\TopicsModel;
use App\Models\NewsCategory;
// use App\Models\CategoriesModel;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.permission');
    }
    public function index(Request $request){
        if($request->has('searchtxt')){
            $searchtxt = $request->input('searchtxt');
            $list = DB::table('news')->where(function($query) use ($searchtxt){
                $query->where('title','like','%'.$searchtxt.'%')
                      ->orwhere('intro','like','%'.$searchtxt.'%');
            })->orderby('created_at','desc')
            ->get();
            //->paginate(5);
        }else{
            $searchtxt = '';
            $list = DB::table('news')->orderby('created_at','desc')
            ->get();//->paginate(5);
        }
        // return json_encode(array('code'=>200,'msg'=>'获取成功','data'=>$list));
        return view('admin.news.news',array('data'=>$list,'searchtxt'=>$searchtxt));
        // return view('news.news');
    }

    /**
     * 获取列表
     */
    public function showlist(Request $request){

        if($request->has('searchtxt')){
            $searchtxt = $request->input('searchtxt');
            $list = DB::table('news')->where(function($query) use ($searchtxt){
                $query->where('title','like','%'.$searchtxt.'%')
                      ->orwhere('intro','like','%'.$searchtxt.'%');
            })->orderby('created_at','desc')->paginate(5);
        }else{
            $searchtxt = '';
            $list = DB::table('news')->orderby('created_at','desc')->paginate(5);
        }
        
        return view('admin.news.index',array('data'=>$list,'searchtxt'=>$searchtxt));

        // $list = DB::table('news')->orderby('created_at','desc')->paginate(5);//NewsModel::all();
        // return View('admin.news.index',array('data'=>$list));
    }
    /**
     * 添加新闻
     */
    public function create(){
        // $category = CategoriesModel::get();
        $topics = TopicsModel::select('title','id')->orderby('created_at','desc')->take(10)->get();
        $type = NewstypeModel::where('is_hidden','=','0')->where('categories_num','<',1000)->get();

    	return view('admin.news.news_add',array('typedata'=>$type,'topics'=>$topics));
    }

    /**
     * 新增新闻
     */
    public function store(Request $request){
        DB::beginTransaction();
        try{
//            $categories_id = $request->input('categories');
//            $topics_id = $request->input('topics');
            $newtime =  date('y-m-d h:i:s',time());
            if(!empty($request->input('newtime'))){
                $newtime = $request->input('newtime');
            }
            $id = (string)UUID::generate();
            $news = NewsModel::create([
                'id'=>$id,
                'title' => $request->input('title'),
                'intro' => $request->input('intro'),
                'tags' => $request->input('tags'),
                'resource' => $request->input('resource'),
                'resource_url' => $request->input('resource_url'),
                'keyword' => $request->input('keyword'),
                'editor' => $request->input('editor'),
                'click_count' => $request->input('click_count'),
                'read_count' => $request->input('read_count'),
                'cover' => $request->input('cover'),
                'content' => $request->input('editorValue'),
                'user_id' => 123456,
                'editor' => $request->input('editor'),
                'newtime' =>$newtime,
                'category_id' => 0
                ]);
            $categories_id = $request->input('categories');
            if(count($categories_id)>0){
                $ct = array();
                foreach ($categories_id as $cid) {
                    array_push($ct, array('id'=>(string)UUID::generate(),'categories_id'=>$cid,'news_id'=>$id));
                }
                $category = NewsCategory::insert($ct);
            }


            $topics_id = $request->input('topics');
            // return $ct;
            if(count($topics_id)>0){
                $tp = array();
                foreach ($topics_id as $tid) {
                    array_push($tp, array('topics_id'=>$tid,'news_uuid'=>$id,'news_type'=>0));
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

        

    	// $model = new NewsModel();
     //    $id = (string)UUID::generate();
     //    $model->id = $id;
     //    $model->title = $request->input('title');
     //    $model->intro = $request->input('intro');
     //    $model->tags = $request->input('newstag');
     //    // $model->publishtime = $request->input('publishtime');
     //    $model->resource = $request->input('resource');
     //    $model->resource_url = $request->input('resourceurl');
     //    $model->keyword = $request->input('keyword');
     //    $model->editor = $request->input('editor');
     //    $model->click_count = $request->input('click_count');
     //    $model->read_count = $request->input('read_count');
     //    // $model->ordernum = $request->input('ordernum');
     //    $model->cover = $request->input('cover');
     //    $model->content = $request->input('editorValue');
     //    $model->category_id = $request->input('type');
     //    $model->user_id = 0;//默认为当前登陆用户
     //    // $model->is_recommend  //是否推荐
     //    // $model->is_hot  //是否热门
     //    // $model->is_recommend_frontpage //是否推荐到首页
     //    // $model->is_hidden //是否隐藏
     //    // $model->is_approved //
     //    // $model->comment_count //评论数
     //    // $model->parise_count //点赞数
     //    // $model->collect_count //收藏数
     //    $result = $model->save();
        // if($result){

        //     // $newstype = new NewandtypeModel();
        //     // $newstype->uuid = UUID::generate();
        //     // $newstype->news_uuid = $model->uuid;
        //     // $newstype->type_uuid = $type;
        //     // $newstype->save();
        //     return Redirect::back();
        // }else{
        //     return Redirect::back()->withInput()->withErrors('添加失败');
        // }
    }

    /**
     * 修改新闻
     */
    public function edit(Request $request){
        if(!$request->has('id'))
            return Redirect::back()->withInput()->withErrors('参数错误');
        $uuid = $request->input('id');
        $model = NewsModel::find($uuid);
        // $newsandtype = NewandtypeModel::where('news_uuid','=',$uuid)->first();
        // if(!empty($newsandtype)){
        //     $model->type = $newsandtype->type_uuid;
        // }else{
        //     $model->type = 1;
        // }
        $type = NewstypeModel::where('is_hidden','=','0')->get();
        if(!empty($model)){
            return View('admin.news.news_edit',array('data'=>$model,'typedata'=>$type));
        }else{
            return Redirect::back()->withInput()->withErrors('该新闻记录不存在');
        }
    }

    /**
     * 更新新闻
     */
    public function update(Request $request){
        $model = NewsModel::find($request->input('id'));
        if(!empty($model)){
            // $model->uuid = UUID::generate();
            $model->title = $request->input('title');
            $model->intro = $request->input('intro');
            $model->tags= $request->input('newstag');
            $model->newtime = $request->input('publishtime');
            $model->resource = $request->input('resource');
            $model->resource_url = $request->input('resourceurl');
            $model->keyword = $request->input('keyword');
            $model->editor = $request->input('editor');
            $model->click_count = $request->input('click_count');
            $model->read_count = $request->input('read_count');
            // $model->ordernum = $request->input('ordernum');
            $model->cover = $request->input('cover');
            $model->content = $request->input('editorValue');

            $model->category_id = $request->input('type');
            $model->user_id = 0;//默认为当前登陆用户
            // $model->is_recommend  //是否推荐
            // $model->is_hot  //是否热门
            // $model->is_recommend_frontpage //是否推荐到首页
            // $model->is_hidden //是否隐藏
            // $model->is_approved //
            // $model->comment_count //评论数
            // $model->parise_count //点赞数
            // $model->collect_count //收藏数
            $result = $model->save();
            if($result){
                // $newstype = NewandtypeModel::where('news_uuid','=',$model->uuid)->first();
                // if(!empty($newstype)){
                //     $newstype->type_uuid = $type;
                //     $newstype->save();
                // }
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
    public function destroy(Request $request){
        $model = NewsModel::find($request->input('id'));
        if(!empty($model)){
            if($model->delete()){
                    return response()->json(['code' => 200, 'msg' => '删除成功']);
                }
                return response()->json(['code' => 400, 'msg' => '删除失败']);
            }
            return response()->json(['code' => 204, 'msg' => '信息不存在']);
    }

    /**
     * 操作新闻，启用禁用，审核类
     */
    public function handle(Request $request){
        $new = NewsModel::find($request->input('id'));
        if(!empty($new)){
            if($request->has('is_hidden')){
                $new->is_hidden = $request->input('is_hidden') == 0?1:0;
            }else if($request->has('is_hot')){
                $new->is_hot = $request->input('is_hot') == 0?1:0;
            }else if($request->has('is_recommend')){
                $new->is_recommend = $request->input('is_recommend') == 0?1:0;
            }else if($request->has('is_recommend_frontpage')){
                $new->is_recommend_frontpage = $request->input('is_recommend_frontpage') == 0?1:0;
            }else{
                // return Redirect::back()->withInput()->withErrors('没有更新项');
                return response()->json(['code' => 201, 'msg' => '没有更新项']);
            }
            if($new->save()){
                // return Redirect::back();
                return response()->json(['code' => 200, 'msg' => '保存失败']);
            }else{
                // return Redirect::back()->withInput()->withErrors("保存失败");
                return response()->json(['code' => 400, 'msg' => '操作失败']);
            }
        }else{
            // return Redirect::back()->withInput()->withErrors('该新闻记录不存在');
            return response()->json(['code' => 204, 'msg' => '该新闻记录不存在']);
        }
    }

    /**
     * 热门新闻
     */
    public function hot(Request $request){
        if($request->has('searchtxt')){
            $searchtxt = $request->input('searchtxt');
            $list = DB::table('news')->where(function($query) use ($searchtxt){
                $query->where('title','like','%'.$searchtxt.'%')
                      ->orwhere('intro','like','%'.$searchtxt.'%');
            })->orderby('created_at','desc')->paginate(5);
        }else{
            $searchtxt = '';
            $list = DB::table('news')->orderby('created_at','desc')->paginate(5);
        }
        return view('news.hotnews',array('data'=>$list));
    }

    /**
     * 新闻详情页
     */
    public function detail(Request $request){
        $id = $request->input('id');
        $data = NewsModel::where('id','=',$id)->first();
        // return json_encode($data);
        if(empty($data)){
            return Redirect::back();
        }
        return view('news.newsdetail',array('data'=>$data));
    }

    /**
     * 获取新闻列表
     */
    public function getnewslit(Request $request){
        if($request->has('searchtxt')){
            $searchtxt = $request->input('searchtxt');
            $list = DB::table('news')->where(function($query) use ($searchtxt){
                $query->where('title','like','%'.$searchtxt.'%')
                      ->orwhere('intro','like','%'.$searchtxt.'%');
            })->orderby('created_at','desc')->paginate(5);
        }else{
            $searchtxt = '';
            $list = DB::table('news')->orderby('created_at','desc')->paginate(5);
        }
        return json_encode(array('code'=>200,'msg'=>'获取成功','data'=>$list));
        // return view('news.news',array('data'=>$list,'searchtxt'=>$searchtxt));
    }
}
