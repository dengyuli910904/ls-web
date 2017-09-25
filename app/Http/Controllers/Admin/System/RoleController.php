<?php namespace App\Http\Controllers\Admin\System;

use App\Models\System\Role;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.permission');
    }

    /**
     * 列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $wheres = [];
        $pagesize = 5;//config('common.pagesize');
//        if ($request->ajax()) {
//            $this->validate($request, [
//                'name' => 'string',
//                'enname' => 'string',
//                'role_id' => 'integer'
//            ]);

            $data['req'] = $request->all();
            if (!empty($data['req']['keywords'])) {
                if ($data['req']['keyworks_type'] != 'name') {
                    if ($data['req']['keyworks_type'] == 'role_id') {
                        $wheres['id'] = $data['req']['keywords'];
                    } else {
                        $wheres[$data['req']['keyworks_type']] = $data['req']['keywords'];
                    }
                }
            }
            $preList = Role::where($wheres);
            if (!empty($data['req']['keywords']) && $data['req']['keyworks_type'] == 'name') {
                $preList->where('name', 'like', '%' . $data['req']['keywords'] . '%');
            }
            $list = $preList->whereNull('deleted_at')
                ->orderBy('id', 'desc')
                ->paginate($pagesize, [
                    'id', 'enname', 'name', 'isadmin', 'created_at', 'updated_at'
                ], 'page', intval($request->get('start', 0) / $pagesize) + 1)
                ->appends($data['req']);

//            $list = $data['list']->toArray();
//            if ($list['total'] > 0) {
//                foreach ($list['data'] as $k => $user) {
//                }
//            }
//            $res = [
//                'recordsTotal' => $list['total'],
//                'recordsFiltered' => $list['total'],
//                'data' => $list['data']
//            ];
//            return response()->json($res);
//        }
        return view('admin.system.role.index', ['data' => $list]);
    }

    /**
     * 详情
     * @param $id
     */
    public function show($id)
    {
    }

    /**
     * 创建
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.system.role.create');
    }

    /**
     * 保存
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'enname' => 'required|string',
            'name' => 'required|string',
        ]);
        $role = Role::where('enname', $data['enname'])
            ->first();
        if (!$role) {
            $role = new Role();
            $role->enname = $data['enname'];
            $role->name = $data['name'];
            $role->save();
            return redirect()->back();
        }
        return redirect()->back()->withInput()->withErrors('已存在');
    }

    /**
     * 编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = [];
        $data['role'] = Role::find($id);
        if ($data['role']) {
            return view('admin.system.role.edit', ['data' => $data]);
        }
        return redirect()->back()->withInput()->withErrors('不存在');
    }

    /**
     * 更新
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->validate($request, [
            'name' => 'required|string',
            'enname' => 'required|string',
        ]);
        $role = Role::find($id);
        if ($role) {
            $role->name = $data['name'];
            $role->enname = $data['enname'];
            $role->save();
            return redirect()->back();
        }
        return redirect()->back()->withInput()->withErrors('不存在');
    }

    /**
     * 删除
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role) {
            $role->delete();
            $role->admins()->sync([]);
            $role->permissions()->sync([]);
            return redirect()->back();
        }
        return redirect()->back()->withInput()->withErrors('不存在');
    }

}