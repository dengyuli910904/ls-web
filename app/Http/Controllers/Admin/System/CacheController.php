<?php namespace App\Http\Controllers\Admin\System;

use Redis;

//use App\Models\Info\Info;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CacheController extends Controller
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
        $data = $request->all();
        $this->validate($request, [
            'init' => 'required|in:cache,infos'
        ]);
        switch ($data['init']) {
            case 'cache' :
                \Cache::flush();
                break;
            case 'infos' :
                $this->infos();
                break;
        }
        return response()->json(['flag' => 1, 'msg' => '成功']);
    }

    /**
     * 编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
    }

    /**
     * 更新
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * 删除
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
    }

    /**
     * 淘宝客索引初始化
     */
    public function infos()
    {
        Info::indexDrop();
        Info::indexCreate();

        $infos = Info::all()->toArray();
        foreach ($infos as $info) {
            app('elasticsearch')->documentInsert('tenqing_infos', 'tenqing_infos', [
                'id' => $info['id'],
                'infotype_id' => $info['infotype_id'],
                'atype' => $info['atype'],
                'title' => $info['title'],
                'label' => $info['label'],
                'hits' => $info['hits'],
                'likes' => $info['likes'],
                'collections' => $info['collections'],
                'comments' => $info['comments'],
                'released_at' => $info['released_at'],
                'created_at' => $info['created_at'],
            ]);
        }
        return 1;
    }

}