<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsModel;
// use App\Index_news_categoridModel as NewandtypeModel;
use App\Models\CategoriesModel as NewstypeModel;
use App\Models\CommentsModel;
use App\Models\PartnerModel;
use App\Libraries\Common;
use Redirect, Input;
use UUID;
use DB;

class NewsController extends Controller
{
    /**
     * 最新新闻
     */
    public function index(Request $request){
        $data= [];
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
        $data['news'] = $list;
        $data['partner'] = PartnerModel::get();
        // return json_encode(array('code'=>200,'msg'=>'获取成功','data'=>$list));
        return view('home.news.news',['data'=>$data,'searchtxt'=>$searchtxt]);
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
    public function add(){
        $type = NewstypeModel::where('is_hidden','=','0')->get();
    	return view('admin.news.add',array('typedata'=>$type));
    }

    /**
     * 新增新闻
     */
    public function create(Request $request){
    	$model = new NewsModel();
        $model->id = UUID::generate();
        $model->title = $request->input('title');
        $model->intro = $request->input('intro');
        $model->tags = $request->input('newstag');
        // $model->publishtime = $request->input('publishtime');
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
            // $newstype = new NewandtypeModel();
            // $newstype->uuid = UUID::generate();
            // $newstype->news_uuid = $model->uuid;
            // $newstype->type_uuid = $type;
            // $newstype->save();
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
        $model = NewsModel::where('id','=',$uuid)->first();
        // $newsandtype = NewandtypeModel::where('news_uuid','=',$uuid)->first();
        // if(!empty($newsandtype)){
        //     $model->type = $newsandtype->type_uuid;
        // }else{
        //     $model->type = 1;
        // }
        $type = NewstypeModel::where('is_hidden','=','0')->get();
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
        $model = NewsModel::where('id','=',$request->input('uuid'))->first();
        if(!empty($model)){
            // $model->uuid = UUID::generate();
            $model->title = $request->input('title');
            $model->intro = $request->input('intro');
            $model->tags= $request->input('newstag');
            $model->publishtime = $request->input('publishtime');
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
    public function delete(Request $request){
        $model = NewsModel::where('id','=',$request->input('uuid'))->first();
        if(!empty($model)){
            if($model->delete()){
                // $newstype = NewandtypeModel::where('news_uuid','=',$model->uuid)->first();
                // if(!empty($newstype)){
                //     $newstype->delete();
                // }
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

    /**
     * 热门新闻
     */
    public function hot(Request $request){
        if($request->has('searchtxt')){
            $searchtxt = $request->input('searchtxt');
            $list = DB::table('news')->where(function($query) use ($searchtxt){
                $query->where('title','like','%'.$searchtxt.'%')
                      ->orwhere('intro','like','%'.$searchtxt.'%');
            })
            ->where('is_hot','=','1')
            ->orderby('created_at','desc')->paginate(5);
        }else{
            $searchtxt = '';
            $list = DB::table('news')->where('is_hot','=','1')->orderby('created_at','desc')->paginate(5);
        }
        return view('home.news.hotnews',array('data'=>$list));
    }

    /**
     * 推荐新闻
     */
    public function recommend(Request $request){
        if($request->has('searchtxt')){
            $searchtxt = $request->input('searchtxt');
            $list = DB::table('news')->where(function($query) use ($searchtxt){
                $query->where('title','like','%'.$searchtxt.'%')
                      ->orwhere('intro','like','%'.$searchtxt.'%');
            })
            ->where('is_recommend','=','1')
            ->orderby('created_at','desc')->paginate(5);
        }else{
            $searchtxt = '';
            $list = DB::table('news')->where('is_recommend','=','1')->orderby('created_at','desc')
            ->paginate(5);
        }
        return view('home.news.recomend',array('data'=>$list));
    }

    /**
     * 新闻详情页
     */
    public function detail(Request $request){
        $id = $request->input('id');
        $data = NewsModel::find($id);
        if(empty($data)){
            return Redirect::back();
        }
        $msgcount = CommentsModel::where('news_id','=',$id)->count();
        $data->click_count = $data->click_count+1;
        $data->read_count = $data->read_count+1;
        $data->save();
        $data->msgcount = $msgcount;
        // return $data;
        // NewsModel::where('id','=',$id)->update(array('click_count'=>$data->click_count,'read_count'=>$data->read_count));
        return view('home.news.newsdetail',array('data'=>$data));
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

    public function read(Request $request)
    {
        $isRead = $request->session()->get('news:uuid:' . $request->input('news_uuid') .'is_read', 0);
        if ($isRead == 0) {
            $isRead = 1;
            $news = NewsModel::where('id','=',$request->input('news_uuid'))->first();
            if(!empty($news)){
                NewsModel::where('id','=',$request->input('news_uuid'))->update(array('read_count'=>$news->read_count+1));
                session(['news:uuid:' . $request->input('news_uuid') .'is_read' => $isRead]);
                return Common::returnSuccessResult(200,'阅读成功','');
            }else{
                return Common::returnErrorResult(400,'传参错误','');
            }
        }
        return Common::returnErrorResult(400,'已阅读','');
    }

    public function parise(Request $request)
    {
        $isParise = $request->session()->get('news:uuid:' . $request->input('news_uuid') .'is_parise', 0);
        if ($isParise == 0) {
            $isParise = 1;
            $news = NewsModel::where('id','=',$request->input('news_uuid'))->first();
            if(!empty($news)){
                NewsModel::where('id','=',$request->input('news_uuid'))->update(array('parise_count'=>$news->parise_count+1));
                session(['news:uuid:' . $request->input('news_uuid') .'is_parise' => $isParise]);
                return Common::returnSuccessResult(200,'点赞成功','');
            }else{
                return Common::returnErrorResult(400,'传参错误','');
            }
        }
        return Common::returnErrorResult(400,'已点赞','');
    }

    
}
