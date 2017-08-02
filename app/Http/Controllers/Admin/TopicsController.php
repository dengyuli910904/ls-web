<?php

namespace App\Http\Controllers\Admin;

use App\Models\TopicsModel;
use Illuminate\Http\Request;
use Redirect, Input;
//use UUID;
use DB;

use App\Http\Controllers\Controller;

class TopicsController extends Controller
{
	public function index(Request $request)
	{
		$wheres = [];
		$data = $request->all();
		if (!empty($data['name'])) {
			$wheres['name'] = $data['name'];
		}
		$list = TopicsModel::where($wheres)->orderby('created_at','desc')->paginate(5);
		return view('admin.topics.index', ['list' => $list, 'data' => $data]);
	}

	public function show($id)
	{
	}

	public function create()
	{
		return view('admin.topics.create');
	}

	public function store(Request $request)
	{
		$otopics = TopicsModel::where('title', $request->input('title'))->first();
		if (!$otopics) {
			$topics = new TopicsModel();
			$topics->title = $request->input('title');
			$topics->intro = $request->input('intro');
			$topics->cover = $request->input('cover');
			$topics->template = $request->input('template');
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
		$data = TopicsModel::find($id);
		return view('admin.topics.edit', ['data' => $data]);
	}

	public function update(Request $request, $id)
	{
		$topics = TopicsModel::find($id);
		if ($topics) {
			$topics->title = $request->input('title');
			$topics->intro = $request->input('intro');
			$topics->cover = $request->input('cover');
			$topics->template = $request->input('template');
			$result = $topics->save();
			if ($result) {
				return Redirect::back();
			}
			return Redirect::back()->withInput()->withErrors('修改失败');
		}
		return Redirect::back()->withInput()->withErrors('专题不存在');
	}

	public function destroy($id)
	{
		$topics = TopicsModel::find($id);
		if ($topics) {
			$result = $topics->delete();
			if ($result) {
				return response()->json(['status' => 0, 'msg' => '删除成功']);
			}
			return response()->json(['status' => 0, 'msg' => '删除失败']);
		}
		return response()->json(['status' => 0, 'msg' => '专题不存在']);
	}


}
