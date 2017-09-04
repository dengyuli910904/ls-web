<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 用户模型
 * Class User
 * @package App\Models
 *
 * ptype
 *   0 权限
 *   1 功能
 *   2 目录
 *   3 模块
 */
class Permission extends Model
{
    use SoftDeletes;

    protected $fillable = ['pid', 'enname', 'name', 'descript', 'level', 'tree', 'ptype'];
    protected $hidden = ['deleted_at'];

    /**
     * 角色
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\System\Role');
    }

    /**
     * @param int $pid
     * @return array
     */
    public static function getPermissionTree($pid = 0)
    {
        $permissions = Permission::where('pid', $pid)
            ->get(['id', 'pid', 'enname', 'name', 'level'])
            ->toArray();
        if ($permissions) {
            foreach ($permissions as $k => $permission) {
                $permissions[$k]['child'] = Permission::getPermissionTree($permission['id']);
            }
            return $permissions;
        }
        return [];
    }

}
