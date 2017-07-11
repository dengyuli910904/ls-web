<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentsModel;
use Redirect, Input;
use UUID;
use DB;
use App\Libraries\Common;

class CommentsController extends Controller
{
    /**
     * 添加留言
     */
    public function add(Request $request){
        $model = new CommentsModel();
        $model->content = $request->input('content');
        $model->comments_id = UUID::generate();
        $model->news_uuid = $request->input('uuid');
        $model->user_id = 1;
        $model->target_user_id = 0;
        $model->parent_uuid = "";
        $model->level = 0;
        $model->top_id = $model->comments_id;
        if($model->save()){
            return Common::returnSuccessResult(200,'留言成功',$model);
        }else{
            return Common::returnErrorResult(400,'留言失败');
        }
    }

    /**
     * 回复留言
     */
    public function replay(Request $request){
        $model = new CommentsModel();
        $model->content = $request->input('content');
        $model->comments_id = UUID::generate();
        $model->news_uuid = $request->input('uuid');
        $model->user_id = 1;
        $model->target_user_id = $request->input('user_id');
        $model->parent_uuid = $request->input('parent_uuid');
        $model->level = $request->input('level');
        $model->top_id = $request->input('top_id');
        if($model->save()){
            return Common::returnSuccessResult(200,'留言成功',$model);
        }else{
            return Common::returnErrorResult(400,'留言失败');
        }
    }

    /**
     * 获取留言列表
     */
    public function getmsg(Request $request){
        $model = CommentsModel::where('news_uuid','=',$request->input('uuid'))
        ->where('is_hidden','=','1')
        // ->where('top_id','=','comments_id')
        ->select('comments_id','top_id','content','user_id','parent_uuid','level','likes_count','dislike_count','comment_count','created_at')
        ->get();
        if(!empty($model)){
            return Common::returnSuccessResult(200,'获取成功',$model);
        }else{
            return Common::returnErrorResult(400,'获取失败');
        }
    }

    /**
     * 留言点赞
     */
    public function likes(Request $request){
        $model = CommentsModel::where('comments_id','=',$request->input('uuid'))->first();
        // return Common::returnSuccessResult(200,'点赞成功',$model);
        if(!empty($model)){
            $result = DB::table('comments')->where('comments_id','=',$request->input('uuid'))->update(array('likes_count'=>$model->likes_count+1));
            if($result){
                return Common::returnSuccessResult(200,'点赞成功','');
            }else{
                return Common::returnSuccessResult(400,'fail','');
            }
        }else{
            return Common::returnErrorResult(400,'no messagge');
        }
    }
    /**
     * 留言点赞
     */
    public function dislikes(Request $request){
        $model = CommentsModel::where('comments_id','=',$request->input('uuid'))->first();
        if(!empty($model)){
            $result = DB::table('comments')->where('comments_id','=',$request->input('uuid'))->update(array('dislike_count'=>$model->dislike_count+1));
            if($result){
                return Common::returnSuccessResult(200,'点赞成功','');
            }else{
                return Common::returnSuccessResult(400,'点赞失败','');
            }
        }else{
            return Common::returnErrorResult(400,'该记录不存在');
        }
    }
}
