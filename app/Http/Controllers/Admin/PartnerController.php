<?php

namespace App\Http\Controllers\Admin;

use App\Models\PartnerModel;
use App\Models\TopicsModel;
use Illuminate\Http\Request;
use Redirect, Input;
//use UUID;
use DB;

use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
	public function index(Request $request)
	{
		$wheres = [];
		$data = $request->all();
		if (!empty($data['name'])) {
			$wheres['name'] = $data['name'];
		}
		$list = PartnerModel::where($wheres)->orderby('created_at','desc')->paginate(5);
		return view('admin.partner.index', ['list' => $list, 'data' => $data]);
	}

	public function show($id)
	{
	}

	public function create()
	{
		return view('admin.partner.create');
	}

	public function store(Request $request)
	{
		$partner = PartnerModel::where('name', $request->input('name'))->first();
		if (!$partner) {
			$partner = new TopicsModel();
			$partner->name = $request->input('name');
			$partner->cover = $request->input('cover');
			$result = $partner->save();
			if ($result) {
				return Redirect::back();
			}
			return Redirect::back()->withInput()->withErrors('添加失败');
		}
		return Redirect::back()->withInput()->withErrors('专题已存在');
	}

	public function edit($id)
	{
		$data = PartnerModel::find($id);
		return view('admin.partner.edit', ['data' => $data]);
	}

	public function update(Request $request, $id)
	{
		$partner = PartnerModel::find($id);
		if ($partner) {
			$partner->name = $request->input('name');
			$partner->cover = $request->input('cover');
			$partner->template = $request->input('template');
			$result = $partner->save();
			if ($result) {
				return Redirect::back();
			}
			return Redirect::back()->withInput()->withErrors('修改失败');
		}
		return Redirect::back()->withInput()->withErrors('专题不存在');
	}

	public function destroy($id)
	{
		$partner = PartnerModel::find($id);
		if ($partner) {
			$result = $partner->delete();
			if ($result) {
				return response()->json(['status' => 0, 'msg' => '删除成功']);
			}
			return response()->json(['status' => 0, 'msg' => '删除失败']);
		}
		return response()->json(['status' => 0, 'msg' => '专题不存在']);
	}


}
