<?php namespace App\Http\Controllers\Admin\System;

use App\Models\System\Menu;
use App\Models\System\Permission;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class MenuController extends Controller
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
//                'menu_id' => 'integer',
//            ]);

            $data['req'] = $request->all();
            if (!empty($data['req']['keywords'])) {
                if ($data['req']['keyworks_type'] != 'name') {
                    if ($data['req']['keyworks_type'] == 'menu_id') {
                        $wheres['id'] = $data['req']['keywords'];
                    } else {
                        $wheres[$data['req']['keyworks_type']] = $data['req']['keywords'];
                    }
                }
            }
            $preList = Menu::where($wheres);
            if (!empty($data['req']['keywords']) && $data['req']['keyworks_type'] == 'name') {
                $preList->where('name', 'like', '%' . $data['req']['keywords'] . '%');
            }
            $list = $preList->whereNull('deleted_at')
                ->orderBy('id', 'desc')
                ->paginate($pagesize, [
                    'id', 'enname', 'name', 'descript', 'url', 'level', 'tree', 'created_at', 'updated_at'
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
        return view('admin.system.menu.index', ['data' => $list]);
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
        $data['pid'] = Menu::orderBy('tree', 'asc')->get(['id', 'enname', 'name', 'level']);
        $data['permissions'] = Permission::orderBy('tree', 'asc')->get(['id', 'enname', 'name', 'level']);
        return view('admin.system.menu.create', ['data' => $data]);
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
//            'url' => 'string',
//            'descript' => 'string',
            'permission_id' => 'required|integer'
        ]);
        $menu = Menu::where('enname', $data['enname'])
            ->first();
        if (!$menu) {
            $level = 0;
            $tree = '';
            if ($data['pid'] > 0) {
                $pid = Menu::find($data['pid']);
                if ($pid) {
                    $level = $pid['level'] + 1;
                    $tree = $pid['tree'];
                }
            }
            $menu = new Menu();
            $menu->pid = $data['pid'];
            $menu->enname = $data['enname'];
            $menu->name = $data['name'];
            $menu->descript = !empty($data['descript']) ? $data['descript'] : '';
            $menu->url = !empty($data['url']) ? $data['url'] : '';
            $menu->level = $level;
            $menu->tree = $tree;
            $menu->permission_id = $data['permission_id'];
            $menu->save();
            $menu->tree = $data['pid'] > 0 ? $tree . '|[' . $menu->id . ']' : '[' . $menu->id . ']';
            $menu->save();
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
        $data['pid'] = Menu::orderBy('tree', 'asc')->get(['id', 'enname', 'name', 'level']);
        $data['permissions'] = Permission::orderBy('tree', 'asc')->get(['id', 'enname', 'name', 'level']);
        $data['menu'] = Menu::find($id);
        if ($data['menu']) {
            return view('admin.system.menu.edit', ['data' => $data]);
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
//            'url' => 'string',
//            'descript' => 'string',
            'permission_id' => 'required|integer'
        ]);
        $menu = Menu::find($id);
        if ($menu) {
            $oldPid = $menu->pid;
            $level = 0;
            $tree = '';
            if ($data['pid'] > 0) {
                $pid = Menu::find($data['pid']);
                if ($pid) {
                    $level = $pid['level'] + 1;
                    $tree = $pid['tree'];
                }
            }
            $menu->pid = $data['pid'];
            $menu->name = $data['name'];
            $menu->enname = $data['enname'];
            $menu->descript = !empty($data['descript']) ? $data['descript'] : '';
            $menu->url = !empty($data['url']) ? $data['url'] : '';
            $menu->level = $level;
            $menu->tree = $data['pid'] ? $tree . '|[' . $id . ']' : '[' . $id . ']';
            $menu->permission_id = $data['permission_id'];
            $menu->save();
            if ($oldPid != $data['pid']) {
                $this->updateChild($menu->id);
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
        $menu = Menu::find($id);
        if ($menu) {
            $menu->delete();
            return redirect()->back();
        }
        return redirect()->back()->withInput()->withErrors('不存在');
    }

    /**
     * 更新子权限树
     * @param int $pid
     */
    private function updateChild($menu_id = 0)
    {
        if ($menu_id > 0) {
            $pid = Menu::find($menu_id);
            $childs = Menu::where('pid', $menu_id)
                ->get();
            if ($pid && $childs) {
                foreach ($childs as $child) {
                    $child->tree = $pid->tree . '|[' . $child->id . ']';
                    $child->save();
                    $this->updateChild($child->id);
                }
            }
        }
    }

}