<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 用户模型
 * Class User
 * @package App\Models
 */
class Role extends Model
{
    use SoftDeletes;

    protected $fillable = ['enname', 'name', 'isadmin'];
    protected $hidden = ['deleted_at'];

    /**
     * 角色
     */
    public function admins()
    {
        return $this->belongsToMany('App\Models\System\Admin');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\System\Permission');
    }

}
