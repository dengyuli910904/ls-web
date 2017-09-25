<?php namespace App\Http\Controllers\Admin\System;

use App\Models\System\Permission;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class PermissionController extends Controller
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
//                'permission_id' => 'integer',
//            ]);

            $data['req'] = $request->all();
            if (!empty($data['req']['keywords'])) {
                if ($data['req']['keyworks_type'] != 'name') {
                    if ($data['req']['keyworks_type'] == 'permission_id') {
                        $wheres['id'] = $data['req']['keywords'];
                    } else {
                        $wheres[$data['req']['keyworks_type']] = $data['req']['keywords'];
                    }
                }
            }
            $preList = Permission::where($wheres);
            if (!empty($data['req']['keywords']) && $data['req']['keyworks_type'] == 'name') {
                $preList->where('name', 'like', '%' . $data['req']['keywords'] . '%');
            }
            $list = $preList->whereNull('deleted_at')
                ->orderBy('id', 'desc')
                ->paginate($pagesize, [
                    'id', 'enname', 'name', 'descript', 'level', 'tree', 'ptype', 'created_at', 'updated_at'
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
        return view('admin.system.permission.index', ['data' => $list]);
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
        $data['pid'] = Permission::where('level', '<', 2)->orderBy('tree', 'asc')->get(['id', 'enname', 'name', 'level']);
        return view('admin.system.permission.create', ['data' => $data]);
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
            'pid' => 'required|integer',
            'enname' => 'required|string',
            'name' => 'required|string',
//            'descript' => 'string',
            'ptype' => 'required|in:0,1,2,3'
        ]);
        $permission = Permission::where('enname', $data['enname'])
            ->first();
        if (!$permission) {
            $level = 0;
            $tree = '';
            if ($data['pid'] > 0) {
                $pid = Permission::find($data['pid']);
                if ($pid) {
                    $level = $pid['level'] + 1;
                    $tree = $pid['tree'];
                }
            }
            $permission = new Permission();
            $permission->pid = $data['pid'];
            $permission->enname = $data['enname'];
            $permission->name = $data['name'];
            $permission->descript = !empty($data['descript']) ? $data['descript'] : '';
            $permission->level = $level;
            $permission->tree = $tree;
            $permission->ptype = $data['ptype'];
            $permission->save();
            $permission->tree = $data['pid'] > 0 ? $tree . '|[' . $permission->id . ']' : '[' . $permission->id . ']';
            $permission->save();
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
        $data['pid'] = Permission::where('level', '<', 2)->orderBy('tree', 'asc')->get(['id', 'enname', 'name', 'level']);
        $data['permission'] = Permission::find($id);
        if ($data['permission']) {
            return view('admin.system.permission.edit', ['data' => $data]);
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
            'pid' => 'required|integer|not_in:' . $id,
            'enname' => 'required|string',
            'name' => 'required|string',
//            'descript' => 'string',
            'ptype' => 'required|in:0,1,2,3'
        ]);
        $permission = Permission::find($id);
        if ($permission) {
            $oldPid = $permission->pid;
            $level = 0;
            $tree = '';
            if ($data['pid'] > 0) {
                $pid = Permission::find($data['pid']);
                if ($pid) {
                    $level = $pid['level'] + 1;
                    $tree = $pid['tree'];
                }
            }
            $permission->pid = $data['pid'];
            $permission->name = $data['name'];
            $permission->enname = $data['enname'];
            $permission->descript = !empty($data['descript']) ? $data['descript'] : '';
            $permission->level = $level;
            $permission->tree = $data['pid'] ? $tree . '|[' . $id . ']' : '[' . $id . ']';
            $permission->ptype =  $data['ptype'];
            $permission->save();
            if ($oldPid != $data['pid']) {
                $this->updateChild($id);
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
        $permission = Permission::find($id);
        if ($permission) {
            $permission->delete();
            return redirect()->back();
        }
        return redirect()->back()->withInput()->withErrors('不存在');
    }

    /**
     * 更新子权限树
     * @param int $pid
     */
    private function updateChild($pid = 0)
    {
        if ($pid > 0) {
            $childs = Permission::where('pid', $pid)
                ->get();
            if ($childs) {
                $permission = Permission::find($pid);
                foreach ($childs as $child) {
                    $child->tree = $permission->tree . '|[' . $child->id . ']';
                    $child->save();
                    $this->updateChild($child->id);
                }
            }
        }
    }

}