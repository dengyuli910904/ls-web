<?php

namespace App\Http\Controllers;

use App\Models\TopicsNewsModel;
use App\Models\TopicsModel;
use Illuminate\Http\Request;
use Redirect, Input;
use UUID;
use DB;

class TopicsNewsController extends Controller
{
	public function showlist()
	{
		$list = DB::table('topics_news')->orderby('created_at','desc')->paginate(5);
		return view('admin.topicsnews.index',array('data'=>$list));
	}

	public function index(Request $request)
	{
	}

	public function show($id)
	{
	}

	public function create()
	{
		return view('admin.topics-news.add');
	}

	public function store(Request $request)
	{
		$otopics = TopicsNewsModel::where('topics_id', $request->input('topics_id'))
			->where('news_id', $request->input('news_id'))->first();
		if (!$otopics) {
			$topics = new TopicsNewsModel();
			$topics->topics_id = (int) $request->input('topics_id');
			$topics->news_id = (int) $request->input('news_id');
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
		return view('admin.subject.edit', ['data' => $data]);
	}

	public function update(Request $request)
	{
//		$topics = TopicsNewsModel::find($id);
//		if ($topics) {
//			$topics->topics_id = (int) $request->input('topics_id');
//			$topics->news_id = (int) $request->input('news_id');
//			$result = $topics->save();
//			if ($result) {
//				return Redirect::back();
//			}
//			return Redirect::back()->withInput()->withErrors('修改失败');
//		}
//		return Redirect::back()->withInput()->withErrors('专题不存在');
	}

	public function destory(Request $request)
	{
		$data = $request->all();
		$topics = TopicsNewsModel::where('topics_id', $data['topics_id'])
			->where('news_id', $data['news_id'])->first();
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
