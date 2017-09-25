<?php

namespace App\Http\Controllers\Admin;

use App\Models\TopicsNewsModel;
use App\Models\TopicsModel;
use App\NewsModel;
use Illuminate\Http\Request;
use Redirect, Input;
use UUID;
use DB;
use App\Http\Controllers\Controller;
use App\Models\NewsPicture;

class TopicsNewsController extends Controller
{
	public function __construct()
	{
		$this->middleware('check.permission');
	}

	public function index(Request $request)
	{
		$wheres = [];
		$data = $request->all();
		// if ($request->get('is_recommend', -1) == 1) {
		// 	$wheres['is_recommend'] = 1;
		// }
		// $wheres['topics_id'] = (int) $request->get('topics_id', 0);
		$news = TopicsNewsModel::join('news',function($join){
			$join->on('news.id','=','topics_news.news_uuid');
				 // ->on('topics_news.news_type = 2');
		})
		->select('news.id','news.title','news.intro','news.cover','topics_news.topics_id','topics_news.news_type','news.created_at')
		->where('topics_news.news_type','=',0)
		->orderby('topics_news.created_at','desc')->get();
		
		$pictures = TopicsNewsModel::join('news_picture',function($join){
			$join->on('news_picture.id','=','topics_news.news_uuid');
				 // ->on('topics_news.news_type = 2');
		})
		->select('news_picture.id','news_picture.name as title','news_picture.description as intro','news_picture.cover','topics_news.topics_id','topics_news.news_type','news_picture.created_at')
		->where('topics_news.news_type','=',1)
		->orderby('topics_news.created_at','desc')->get();
		
		$videos = TopicsNewsModel::join('videonews',function($join){
			$join->on('videonews.id','=','topics_news.news_uuid');
				 // ->on('topics_news.news_type = 2');
		})
		->select('videonews.id','videonews.title','videonews.description as intro','videonews.cover','topics_news.topics_id','topics_news.news_type','videonews.created_at')
		->where('topics_news.news_type','=',2)
		->orderby('topics_news.created_at','desc')->get();
		$newsdata = [];
		foreach ($news as $n) {
			$n->type_text = "文字新闻";
			array_push($newsdata,$n);
		}
		foreach ($pictures as $n) {
			$n->type_text = "图片新闻";
			array_push($newsdata,$n);
		}
		foreach ($videos as $n) {
			$n->type_text = "视频新闻";
			array_push($newsdata,$n);
		}
		
		// array_push($newsdata,$pictures);
		// array_push($newsdata,$videos);
		// return json_encode($newsdata);
		// return;
		return view('admin.topics.news', ['list' => $newsdata, 'data' => $data]);
	}


	public function create(Request $request)
	{
		$data = $request->all();
		return view('admin.topicsnews.create', ['data' => $data]);
	}

	public function store(Request $request)
	{
		$otopics = TopicsNewsModel::where('topics_id', $request->input('topics_id'))
			->where('news_uuid', $request->input('news_uuid'))->first();
		if (!$otopics) {
			$topics = new TopicsNewsModel();
			$topics->topics_id = (int) $request->input('topics_id', 0);
			$topics->news_uuid = $request->input('news_uuid');
			$topics->is_recommend = (int) $request->input('is_recommend', 0);
			$topics->sort = (int) $request->input('sort');
			$result = $topics->save();
			if ($result) {
				return Redirect::back();
			}
			return Redirect::back()->withInput()->withErrors('添加失败');
		}
		return Redirect::back()->withInput()->withErrors('专题已存在');
	}

	public function edit($id)
	{
		$data = TopicsNewsModel::find($id);
		return view('admin.topicsnews.edit', ['data' => $data]);
	}

	public function update(Request $request, $id)
	{
		$topics = TopicsNewsModel::find($id);
		if ($topics) {
			$topics->topics_id = (int) $request->input('topics_id');
			$topics->news_uuid = $request->input('news_uuid');
			$topics->is_recommend = (int) $request->input('is_recommend');
			$topics->sort = (int) $request->input('sort');
			$result = $topics->save();
			if ($result) {
				return Redirect::back();
			}
			return Redirect::back()->withInput()->withErrors('修改失败');
		}
		return Redirect::back()->withInput()->withErrors('专题不存在');
	}

	public function destory(Request $request, $id)
	{
//		$data = $request->all();
		$topics = TopicsNewsModel::find($id);
		if ($topics) {
			$result = $topics->delete();
			if ($result) {
				return Redirect::back();
			}
			return Redirect::back()->withInput()->withErrors('修改失败');
		}
	return Redirect::back()->withInput()->withErrors('专题不存在');
	}


}
