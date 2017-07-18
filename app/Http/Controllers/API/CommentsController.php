<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentsModel;
use Redirect, Input;
use UUID;
use DB;
use App\Libraries\Common;
use App\Models\User;

class CommentsController extends Controller
{
    /**
     * 添加留言
     */
    public function add(Request $request){
        $model = new CommentsModel();
        $model->content = $request->input('content');
        $model->id = UUID::generate();
        $model->news_id = $request->input('uuid');
        $model->user_id = 1;
        $model->target_user_id = 0;
        $model->parent_uuid = "";
        $model->level = 0;
        $model->top_id = $model->id;
        if($model->save()){
            $model->dislike_count = 0;
            $model->likes_count = 0;
            $model->comments_count = 0;
            $model->user_name = User::find($model->user_id)->name;
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
        $model->id = UUID::generate();
        $model->news_id = $request->input('uuid');
        $model->user_id = 1;
        $model->target_user_id = $request->input('user_id');
        $model->parent_uuid = $request->input('parent_uuid');
        $model->level = $request->input('level');
        $model->top_id = $request->input('top_id');

        if($model->save()){
            $model->dislike_count = 0;
            $model->likes_count = 0;
            $model->comments_count = 0;

            $parent = CommentsModel::find($model->top_id);
            $parent->comments_count = (int)$parent->comments_count+1;
            $parent->save();
            // $model->user_name = $user->name;
            // $model->user_avatar = $user->avatar;
            return Common::returnSuccessResult(200,'留言成功',$parent);
        }else{
            return Common::returnErrorResult(400,'留言失败');
        }
    }

    /**
     * 获取留言列表
     */
    public function getmsg(Request $request){
        $model = CommentsModel::where('news_id','=',$request->input('uuid'))
        ->where('is_hidden','=','1')
        ->where('level','=','0')
        // ->where('top_id','=','comments_id')
        ->select('id','top_id','content','user_id','parent_uuid','level','likes_count','dislike_count','comments_count','created_at')
        ->orderby('created_at','asc')
        ->skip(5*$request->input('pageindex'))
        ->take(5)
        ->get();
        if(!empty($model)){
            foreach($model as $val){
                $user = User::find($val->user_id);
                if(!empty($user)){
                    $val->user_name = $user->name;
                    $val->user_avatar = $user->avatar;
                }
                $val->commnets_count = CommentsModel::where('news_id','=',$request->input('uuid'))->where('level','<>','0')
                ->where('top_id','=',$val->comments_id)
                ->count();
                $val->replaylist = array();
            }
            return Common::returnSuccessResult(200,'获取成功',$model);
        }else{
            return Common::returnErrorResult(400,'获取失败');
        }
    }

    /**
     * 获取留言回复
     */
    public function getreplay(Request $request){
        $list = CommentsModel::where('news_id','=',$request->input('uuid'))
        ->where('level','<>','0')
        ->where('top_id','=',$request->input('top_id'))
        // ->where('')
        ->select('id','top_id','content','user_id','parent_uuid','level','likes_count','dislike_count','comment_count','created_at')
        ->orderby('created_at','desc')
        ->get();
        if(!empty($list)){
            foreach($list as $val){
                $user = User::find($val->user_id);
                if(!empty($user)){
                    $val->user_name = $user->name;
                    $val->user_avatar = $user->avatar;
                }
                // $val->commnets_count = CommentsModel::where('news_uuid','=',$request->input('uuid'))->where('level','<>','0')
                // ->where('top_id','=',$val->comments_id)
                // ->count();
                // $val->replaylist = array();
            }
            return Common::returnSuccessResult(200,'获取成功',$list);
        }else{
            return Common::returnErrorResult(400,'获取失败');
        }
    }


    /**
     * 留言点赞
     */
    public function likes(Request $request){
        $model = CommentsModel::find($request->input('uuid'));
        // return Common::returnSuccessResult(200,'点赞成功',$model);
        if(!empty($model)){
            $model->likes_count = $model->likes_count+1;
            $result =$model->save();// CommentsModel::->where('id','=',$request->input('uuid'))->update(array('likes_count'=>$model->likes_count+1));
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
        $model = CommentsModel::find($request->input('uuid'));
        if(!empty($model)){
            $model->dislike_count = $model->dislike_count+1;
            $result =$model->save();
            // $result = DB::table('comments')->where('id','=',$request->input('uuid'))->update(array('dislike_count'=>$model->dislike_count+1));
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
