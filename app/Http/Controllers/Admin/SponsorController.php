<?php

namespace App\Http\Controllers\Admin;

use App\Models\SponsorModel;
use Illuminate\Http\Request;
use Redirect, Input;
//use UUID;
use DB;

use App\Http\Controllers\Controller;

class SponsorController extends Controller
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
		$list = SponsorModel::where($wheres)->orderby('created_at','desc')->paginate(5);
		return view('admin.sponsor.index', ['list' => $list, 'data' => $data]);
	}

	public function show($id)
	{
	}

	public function create()
	{
		return view('admin.sponsor.create');
	}

	public function store(Request $request)
	{
		$osponsor = SponsorModel::where('name', $request->input('name'))->first();
		if (!$osponsor) {
			$sponsor = new SponsorModel();
			$sponsor->name = $request->input('name');
			$sponsor->url = $request->input('url');
			$sponsor->description = $request->input('description');
			$sponsor->cover = $request->input('cover');
			$sponsor->is_hidden = $request->input('is_hidden');
			$sponsor->sort = $request->input('sort');
			$result = $sponsor->save();
			if ($result) {
				return Redirect::back();
			}
			return Redirect::back()->withInput()->withErrors('添加失败');
		}
		return Redirect::back()->withInput()->withErrors('赞助商已存在');
	}

	public function edit($id)
	{
		$data = SponsorModel::find($id);
		return view('admin.sponsor.edit', ['data' => $data]);
	}

	public function update(Request $request, $id)
	{
		$sponsor = SponsorModel::find($id);
		if ($sponsor) {
			$sponsor->name = $request->input('name');
			$sponsor->url = $request->input('url');
			$sponsor->description = $request->input('description');
			$sponsor->cover = $request->input('cover');
			$sponsor->is_hidden = (int) $request->input('is_hidden', 0);
			$sponsor->sort = (int) $request->input('sort', 0);
			$result = $sponsor->save();
			if ($result) {
				return Redirect::back();
			}
			return Redirect::back()->withInput()->withErrors('修改失败');
		}
		return Redirect::back()->withInput()->withErrors('赞助商不存在');
	}

	public function destroy($id)
	{
		$friendship = SponsorModel::find($id);
		if ($friendship) {
			$result = $friendship->delete();
			if ($result) {
				return response()->json(['status' => 0, 'msg' => '删除成功']);
			}
			return response()->json(['status' => 0, 'msg' => '删除失败']);
		}
		return response()->json(['status' => 0, 'msg' => '赞助商不存在']);
	}


}
