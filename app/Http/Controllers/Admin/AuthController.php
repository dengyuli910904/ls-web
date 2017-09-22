<?php

namespace App\Http\Controllers\Admin;

use App\Models\System\Admin;

use Redirect, Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $data = $request->all();
            $admin = Admin::where('email', $data['email'])
                ->first();
            if ($admin) {
                if ($admin['password'] == md5($admin['salt'] . md5(env('APP_KEY','') . $data['password']) . 'admin')) {
                    $user = [
                        'id' => $admin['id'],
                        'name' => $admin['name'],
                        'email' => $admin['email'],
                        'avatar' => $admin['avatar'],
                        'created_at' => $admin['created_at'],
                        'updated_at' => $admin['updated_at'],
                    ];
                    $role_ids = \DB::table('admin_role')
                        ->where('admin_id', $user['id'])
                        ->pluck('role_id')->toArray();
                    $permission_ids = \DB::table('permission_role')
                        ->whereIn('role_id', $role_ids)
                        ->pluck('permission_id')->toArray();
                    session(['user' => $user, 'role_ids' => $role_ids, 'permission_ids' => $permission_ids]);
                    return redirect('admin/news/article');
                }
                return Redirect::back()->withInput()->withErrors('密码错误');
            }
            return Redirect::back()->withInput()->withErrors('帐号不存在');
        }
        return view('admin.auth.login');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->forget('role_ids');
        $request->session()->forget('permission_ids');
        return redirect('admin/login');
    }

}