<?php

namespace App\Http\Controllers\Admin;

use App\Models\NewsModel;
use UUID;
use App\Models\HomepageModel;
use App\Models\TopicsModel;
use Illuminate\Http\Request;
use Redirect, Input;
//use UUID;
use DB;

use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
	public function index(Request $request)
	{
		$wheres = [];
		$data = $request->all();
		if (!empty($data['name'])) {
			$wheres['name'] = $data['name'];
		}
		$list = HomepageModel::where($wheres)->orderby('created_at','desc')->paginate(5);
		if ($list->total()>0) {
			foreach ($list as $k => $v) {
				$list[$k]['news_title'] = '';
				$news = NewsModel::where('id', $v->news_uuid)->first();
				if ($news) {
					$list[$k]['news_title'] = $news->title;
				}

			}
		}
		return view('admin.homepage.index', ['list' => $list, 'data' => $data]);
	}

	public function show($id)
	{
	}

	public function create(Request $request)
	{
		if($request->has('news_uuid')){
			$data['news_uuid'] = $request->input('news_uuid');
		}else{
			$data['news_uuid'] = '';
		}
		return view('admin.homepage.create',['data'=> $data]);
	}

	public function store(Request $request)
	{
//		$otopics = HomepageModel::where('title', $request->input('title'))->first();
//		if (!$otopics) {
		
		if($request->input('htype') == 0){
			if(empty($request->input('cover'))){
				return Redirect::back()->withInput()->withErrors('banner图片不能为空');
			}
		}else{
			if(empty($request->input('news_uuid'))){
				return Redirect::back()->withInput()->withErrors('新闻编号不能为空');
			}
			$homepage = HomepageModel::where('news_uuid',$request->input('news_uuid'))->first();
			if($homepage){
				return Redirect::back()->withInput()->withErrors('新闻已经添加');
			}
		}
		$homepage = new HomepageModel();
		$homepage->uuid =  UUID::generate();
		$homepage->htype = $request->input('htype');
		$homepage->news_uuid = $request->input('news_uuid');
		$homepage->cover = $request->input('cover');
		$homepage->sort = $request->input('sort');
		$homepage->url = $request->input('url');
		$homepage->description = $request->input('description');
		$result = $homepage->save();
		if ($result) {
			return Redirect::back();
		}
		return Redirect::back()->withInput()->withErrors('添加失败');
//		}
//		return Redirect::back()->withInput()->withErrors('专题已存在');
	}

	public function edit($id)
	{
		$data = HomepageModel::find($id);
		return view('admin.homepage.edit', ['data' => $data]);
	}

	public function update(Request $request, $id)
	{
		$homepage = HomepageModel::find($id);
		if ($homepage) {
			if($request->input('htype') == 0){
				if(empty($request->input('cover'))){
					return Redirect::back()->withInput()->withErrors('banner图片不能为空');
				}
			}else{
				if(empty($request->input('news_uuid'))){
					return Redirect::back()->withInput()->withErrors('新闻编号不能为空');
				}
			}

			$homepage->htype = $request->input('htype');
			$homepage->news_uuid = $request->input('news_uuid');
			$homepage->cover = $request->input('cover');
			$homepage->sort = $request->input('sort');
			$homepage->url = $request->input('url');
			$homepage->description = $request->input('description');
			$result = $homepage->save();
			if ($result) {
				return Redirect::back();
			}
			return Redirect::back()->withInput()->withErrors('修改失败');
		}
		return Redirect::back()->withInput()->withErrors('专题不存在');
	}

	public function destroy($id)
	{
		$homepage = HomepageModel::find($id);
		if ($homepage) {
			$result = $homepage->delete();
			if ($result) {
				return response()->json(['status' => 0, 'msg' => '删除成功']);
			}
			return response()->json(['status' => 0, 'msg' => '删除失败']);
		}
		return response()->json(['status' => 0, 'msg' => '专题不存在']);
	}


}
