<?php

namespace App\Http\Controllers;

use App\Models\TopicsModel;
use App\Models\TopicsNewsModel;
use App\NewsModel;
use Illuminate\Http\Request;
use Redirect, Input;
//use UUID;
use DB;

class TopicsController extends Controller
{

	public function index(Request $request)
	{
		$list = TopicsModel::orderby('created_at','desc')->paginate(6);
		if ($request->ajax()) {
			return response()->json($list);
		}
//		dd($list);
		return view('home.topics.index', ['list' => $list]);
	}

	public function show($id)
	{
		$topics = TopicsModel::find($id);
		$recommends = TopicsNewsModel::where('is_recommend', 1)
			->where('topics_id', $topics->id)
			->orderBy('sort')
			->limit(5)
			->get();
		if (count($recommends) > 0) {
			foreach ($recommends as $k => $v) {
				$news = NewsModel::find($v['news_id']);
				$recommends[$k]['title'] = $news->title;
				$recommends[$k]['intro'] = $news->intro;
				$recommends[$k]['cover'] = $news->cover;
			}
		}
		$list = TopicsNewsModel::where('topics_id', $topics->id)
			->orderBy('id', 'desc')
			->paginate(5);
		if (count($list) > 0) {
			foreach ($list as $k => $v) {
				$news = NewsModel::find($v['news_id']);
				$list[$k]['title'] = $news->title;
				$list[$k]['intro'] = $news->intro;
				$list[$k]['cover'] = $news->cover;
				$list[$k]['editor'] = $news->editor;
				$list[$k]['click_count'] = $news->click_count;
				$list[$k]['read_count'] = $news->read_count;
				$list[$k]['publishtime'] = date('Y年m月d日', strtotime($news->publishtime));
			}
		}
		return view('home.topics.detail', ['topics' => $topics, 'recommends' => $recommends, 'list' => $list]);
	}



}
