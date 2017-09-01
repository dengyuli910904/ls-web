<?php namespace App\Http\Controllers\Admin\System;

use App\Models\System\Permission;
use App\Models\System\Role;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class PermissionRoleController extends Controller
{
    /**
     * 列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
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
    }

    /**
     * 保存
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
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
            $data['role']['permission_ids'] = [];
            $data['permissions'] = Permission::getPermissionTree(0);
            $permissions = $data['role']->permissions;
            if ($permissions) {
                $permission_ids = [];
                foreach ($permissions as $permission) {
                    $permission_ids[] = $permission['id'];
                }
                $data['role']['permission_ids'] = $permission_ids;
            }
            return view('admin.system.role.permission', ['data' => $data]);
        }
        return redirect()->back()->withInput()->withErrors('无此角色');
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
            'permission_id' => 'array',
        ]);
        $role = Role::find($id);
        if ($role) {
            $role->permissions()->sync($data['permission_id']);
            return redirect()->back();
        }
        return redirect()->back()->withInput()->withErrors('无此角色');
    }

    /**
     * 删除
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
    }

}