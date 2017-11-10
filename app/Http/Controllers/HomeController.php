<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OSS\OssClient;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.home');
    }

    public function test(){
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
                foreach ($file as $key => $value) {
                    array_push($data,array('key'=>$value->getKey(),'size'=>$value->getSize()));
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
        return $data;
    }

    /**
     * @param 根路径
     * @param 数组
     * @return 将数据返回
     */
    public  function maketree($rootPath,$data){
        $tree = [];
        if($data['key'] == $rootPath){
            $data['pid'] = 0;
            $data['parentpath'] = '';
            array_push($tree,$data);
            return $tree;
        }
        $path = ltrim($data['key'],$rootPath);

        return $tree;
    }
    /**
     * 列出Bucket内所有目录和文件， 根据返回的nextMarker循环调用listObjects接口得到所有文件和目录
     *
     * @param OssClient $ossClient OssClient实例
     * @param string $bucket 存储空间名称
     * @return null
     */
    public function listAllObjects($ossClient, $bucket)
    {
        //构造dir下的文件和虚拟目录
        for ($i = 0; $i < 100; $i += 1) {
            $ossClient->putObject($bucket, "dir/obj" . strval($i), "hi");
            $ossClient->createObjectDir($bucket, "dir/obj" . strval($i));
        }
        $prefix = 'dir/';
        $delimiter = '/';
        $nextMarker = '';
        $maxkeys = 30;
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
                var_dump($listObjectInfo);
            } catch (OssException $e) {
                printf(__FUNCTION__ . ": FAILED\n");
                printf($e->getMessage() . "\n");
                return;
            }
            // 得到nextMarker，从上一次listObjects读到的最后一个文件的下一个文件开始继续获取文件列表
            $nextMarker = $listObjectInfo->getNextMarker();
            $listObject = $listObjectInfo->getObjectList();
            $listPrefix = $listObjectInfo->getPrefixList();
//            var_dump($listObject);
//            var_dump(count($listPrefix));
            if ($nextMarker === '') {
                break;
            }
        }
    }
}
