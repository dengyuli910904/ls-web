<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use OSS\OssClient;

class OsspictureController extends Controller
{
//    protected $bucket;
    /*
     *
     */
    public function __construct()
    {
        $this->middleware('check.permission');

    }

    /**
     * 获取图片列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ossClient = new OssClient(env('ALIOSS_ACCESSKEYID'), env('ALIOSS_ACCESSKEYSECRET'), env('ALIOSS_ENDPOINT'), false);
        $prefix = 'pic/upload/';
        $delimiter = '';
        $nextMarker = '';
        $maxkeys = 30;
        $bucket = env('ALIOSS_BUCKET');
        $data= [];
        while (true) {
            $options = array(
                'delimiter' => $delimiter,
                'prefix' => $prefix,
                'max-keys' => $maxkeys,
                'marker' => $nextMarker,
            );
//            var_dump($options);
            try {
                $listObjectInfo = $ossClient->listObjects($bucket, $options);
                $file = $listObjectInfo->getObjectList();
                foreach ($file as $key => $value)
                {

                    $arr =  explode('/',$value->getKey());
                    $filename = $arr[count($arr)-1];
//                    return($value);
                    if($value->getSize() != 0){
//                        var_dump($value);
//                        return;
                        array_push($data,array('url'=>'http://'.env('ALIOSS_ENDPOINT_URL').'/'.$value->getKey(),'key'=>$value->getKey(),'size'=>$value->getSize(),'name'=>$filename));
                    }
//                    array_push($data, self::maketree($prefix,array('key'=>$value->getKey(),'size'=>$value->getSize())));
                }


            } catch (OssException $e) {
                printf(__FUNCTION__ . ": FAILED\n");
                printf($e->getMessage() . "\n");
                return;
            }
            // 得到nextMarker，从上一次listObjects读到的最后一个文件的下一个文件开始继续获取文件列表
            $nextMarker = $listObjectInfo->getNextMarker();
            if ($nextMarker === '') {
                break;
            }
        }
//        return count($data);
        return view('admin.material.pictures',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage. 删除object
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ossClient = new OssClient(env('ALIOSS_ACCESSKEYID'), env('ALIOSS_ACCESSKEYSECRET'), env('ALIOSS_ENDPOINT'), false);
        $bucket =  env('ALIOSS_BUCKET');
//        return $request;//->input('id');
        $result = $ossClient->deleteObject($bucket,$request->input('id'));

        //多object删除 deleteObjects($bucket,$objects,$options);
//        return
        return response()->json(['code' => 200, 'msg' => '操作成功']);
    }


}
