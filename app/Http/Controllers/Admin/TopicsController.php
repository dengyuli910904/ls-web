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
	public function __construct()
	{
		$this->middleware('check.permission');
	}

	public function index(Request $request)
	{
		$wheres = [];
		$data = $request->all();
		if (!empty($data['name'])) {
			$wheres['name'] = $data['name'];
		}
		$list = TopicsModel::where($wheres)->orderby('created_at','desc')->paginate(5);
		return view('admin.topics.topics', ['list' => $list, 'data' => $data]);
	}

	public function show($id)
	{
	}

	public function create()
	{
		return view('admin.topics.topics_add');
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

	public function edit(Request $request)
	{
		if(!$request->has('id'))
			return Redirect::back()->withInput()->withErrors('参数错误');
		$data = TopicsModel::find($request->input('id'));
		return view('admin.topics.topics_edit', ['data' => $data]);
	}

	public function update(Request $request)
	{
		if(!$request->has('id'))
			return Redirect::back()->withInput()->withErrors('参数错误');
		$topics = TopicsModel::find($request->input('id'));
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

	public function destroy(Request $request)
	{
		$id = $request->input('id');
		$topics = TopicsModel::find($id);
		if ($topics) {
			$result = $topics->delete();
			if ($result) {
				return response()->json(['code' => 200, 'msg' => '删除成功']);
			}
			return response()->json(['code' => 400, 'msg' => '删除失败']);
		}
		return response()->json(['code' => 204, 'msg' => '信息不存在']);
	}

	/**
     * 隐藏/发布
     */
    public function handle(Request $request){
        if(!$request->has('id'))
            return response()->json(['code' => 400, 'msg' => '参数不正确']);
        $pic = TopicsModel::find($request->input('id'));
        if(!$pic)
            return response()->json(['code' => 400, 'msg' => '记录不存在']);

        $pic->is_hidden = $request->input('is_hidden');
        if($pic->save())
            return response()->json(['code' => 200, 'msg' => '操作成功']);
        else
            return response()->json(['code' => 400, 'msg' => '操作失败']);
    }


}
