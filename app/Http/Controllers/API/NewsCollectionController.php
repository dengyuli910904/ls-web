<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsCollectionModel;
use App\Models\NewsModel;
use UUID;
use App\Libraries\Common;

class NewsCollectionController extends Controller
{
    public function store(Request $request)
	{
		$news = NewsModel::where('id','=',$request->input('news_uuid'))->first();
		if(!empty($news)){
			$model = NewsCollectionModel::where('id','=',$request->input('news_uuid'))->where('users_id','=',$request->input('users_id'))->first();
			if (empty($model)) {
				$collect = new NewsCollectionModel();
				$collect->users_id = $request->input('users_id');
				$collect->news_uuid = $request->input('news_uuid');
				$collect->id = UUID::generate();
				$result = $collect->save();
				if ($result) {
					NewsModel::where('id','=',$request->input('news_uuid'))->update(array('collect_count'=>$news->collect_count+1));
					return Common::returnSuccessResult(200,'收藏成功','');
				}
				return Common::returnErrorResult(400,'收藏失败','');
			}
			return Common::returnErrorResult(400,'已收藏','');
		}else{
			return Common::returnErrorResult(400,'传参错误','');
		}
	}

}
