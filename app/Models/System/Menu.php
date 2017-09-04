<?php

namespace App\Models\System;

use Cache;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Menu
 * @package App\Models
 *
 */
class Menu extends Model
{
    use SoftDeletes;

    protected $fillable = ['pid', 'permission_id', 'enname', 'name', 'descript', 'url', 'level', 'tree'];
    protected $hidden = ['deleted_at'];

    /**
     * 角色
     */
    public function permission()
    {
        return $this->hasOne('App\Models\System\Permission');
    }

}
