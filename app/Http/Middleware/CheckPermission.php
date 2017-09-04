<?php

namespace App\Http\Middleware;

use App\Models\System\Permission;
use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $flag = 0;
        $user = session('user');

        if (!$user) {
            return redirect()->to('admin/login');
        }

        $action = $request->route()->getAction();
        if (isset($action['as'])) {
            $route = $action['as'];
            $function = explode('.', $action['as']);
            switch ($function[1]) {
                case 'index' :
                case 'show' :
                    $route = $function[0] . '.index';
                    break;
                case 'create' :
                case 'store' :
                    $route = $function[0] . '.store';
                    break;
                case 'edit' :
                case 'update' :
                    $route = $function[0] . '.update';
                    break;
                case 'mdel' :
                case 'destroy' :
                    $route = $function[0] . '.destroy';
                    break;
            }

            if ($user['id'] > 1) {
                $permission_ids = session('permission_ids');
                $permission = Permission::where('enname', $route)
                    ->first();
                if ($permission && in_array($permission->id, $permission_ids)) {
                    $flag = 1;
                }
            } else if ($user['id'] == 1) {
                $flag = 1;
            }
        } else {
            $flag = 1;
        }
        if (!$flag) {
            if ($request->ajax()) {
                return response()->json(['flag' => 0, 'msg' => '无权限操作']);
            }
            return response('无权限操作');
        }
        return $next($request);
    }
}
