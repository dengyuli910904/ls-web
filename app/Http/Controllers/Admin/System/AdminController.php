<?php namespace App\Http\Controllers\Admin\System;

use App\Models\System\Admin;
use App\Models\System\Role;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class AdminController extends Controller
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
            $this->validate($request, [
                'name' => 'string',
                'email' => 'email',
                'admin_id' => 'integer',
            ]);

            $data['req'] = $request->all();
            if (!empty($data['req']['keywords'])) {
                if ($data['req']['keyworks_type'] != 'name') {
                    if ($data['req']['keyworks_type'] == 'admin_id') {
                        $wheres['id'] = $data['req']['keywords'];
                    } else {
                        $wheres[$data['req']['keyworks_type']] = $data['req']['keywords'];
                    }
                }
            }
            $preList = Admin::where($wheres);
            if (!empty($data['req']['keywords']) && $data['req']['keyworks_type'] == 'name') {
                $preList->where('name', 'like', '%' . $data['req']['keywords'] . '%');
            }
            $list = $preList
                ->orderBy('id', 'desc')
                ->paginate($pagesize, [
                    'id', 'name', 'email', 'avatar', 'created_at', 'updated_at',
//                ], 'page', intval($request->get('start', 0) / $pagesize) + 1)
                ])
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
        return view('admin.system.admin.index', ['data' => $list]);
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
        $data = [];
        $data['roles'] = Role::all();
        return view('admin.system.admin.create', ['data' => $data]);
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
            'name' => 'required|string',
            'email' => 'required',
            'password' => 'required|string',
            'role_id' => 'array'
        ]);
        $admin = Admin::where('email', $data['email'])
            ->first();
        if (!$admin) {
            $data['salt'] = str_random(6);
            $admin = new Admin();
            $admin->name = $data['name'];
            $admin->email = $data['email'];
            $admin->salt = $data['salt'];
            $admin->password = md5($admin['salt'] . md5(env('APP_KEY','') . $data['password']) . 'admin');
            $admin->save();
            if (isset($data['role_id'])) {
                $admin->roles()->sync($data['role_id']);
            }
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
        $data['admin'] = Admin::find($id);
        if ($data['admin']) {
            $data['roles'] = Role::all();
            $data['admin']['roles'] = \DB::table('admin_role')
                ->where('admin_id', $data['admin']['id'])
                ->pluck('role_id')->toArray();
            return view('admin.system.admin.edit', ['data' => $data]);
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
            'role_id' => 'array'
        ]);
        $admin = Admin::find($id);
        if ($admin) {
            $admin->name = $data['name'];
            $admin->save();
            if (isset($data['role_id'])) {
                $admin->roles()->sync($data['role_id']);
            }
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
        $admin = Admin::find($id);
        if ($admin) {
            $admin->delete();
            $admin->roles()->sync([]);
            return response()->json(['flag' => 1, 'msg' => '删除成功']);
        }
        return response()->json(['flag' => 0, 'msg' => '不存在']);
    }

}