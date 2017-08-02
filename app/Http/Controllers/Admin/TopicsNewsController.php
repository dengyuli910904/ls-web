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

class TopicsNewsController extends Controller
{

	public function index(Request $request)
	{
		$wheres = [];
		$data = $request->all();
		if ($request->get('is_recommend', -1) == 1) {
			$wheres['is_recommend'] = 1;
		}
		$wheres['topics_id'] = (int) $request->get('topics_id', 0);
		$list = TopicsNewsModel::where($wheres)->orderby('created_at','desc')->paginate(5);
		foreach ($list as $k => $v) {
			$list[$k]['title'] = '';
			$news = NewsModel::where('news_uuid', $v->news_uuid)->first();
			if ($news) {
				$list[$k]['title'] = $news->title;
			}
		}
		return view('admin.topicsnews.index', ['list' => $list, 'data' => $data]);
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
