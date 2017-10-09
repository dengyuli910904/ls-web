<?php
namespace App\Libraries;

class Common
{
    /**
     * 将数据组转成MD5加密字符串
     */
    public static function getsign($data,$timestamp){
    	$signstr = '';
    	foreach ($data as $key => $value) {
    		if($key != '_url'){
    			$signstr = $signstr.$key.$value;
    		}
    	}
    	$signstr = $signstr.'timestamp'.$timestamp;
    	$sign = strtoupper(MD5($signstr));//.toUpperCase();
        // echo $signstr."  ===================";
    	return $sign;
    }


    /**
     * 发送url请求
     * @url 请求地址
     * @param 请求参数
     * @method 请求方式
     */
    public static function sendurl($url,$param,$method){
    	//初始化
    	$curl = curl_init();
    	//设置抓取的url
    	curl_setopt($curl, CURLOPT_URL, $url);
    	//色湖之头文件的信息作为数据流输出
    	curl_setopt($curl, CURLOPT_HEADER, 1);
    	//设置获取的信息以文件流的形式返回，而不是直接输出
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    	//若为post提交方式
    	if($method === 'POST'){
    		//设置post方式提交
    		curl_setopt($curl, CURLOPT_POST, 1);
    		//设置post数据
    		// $post_data = array('username' => 'lily');

    		curl_setopt($curl, CURLOPT_POSTFIELDS, $param);
    	}

    	//执行命令
        $data = json_decode(curl_exec($curl), true);
        echo $url;
        var_dump($param);
        echo $method;
    	// $data = curl_exec($curl);
        var_dump($data);
    	//关闭URL请求
    	curl_close($curl);
    	//显示获得的数据
    	return $data;
    }

     /**
     * post方法
     * @param $url 目标URL
     * @param $params 请求参数
     * @param $transfer
     * @return mixed 返回字串
     */
    public static function post($url, $params, $transfer)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, $transfer);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);//json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $result;
    }

    /**
     * 生成随机短信验证码
     */
    public static function randstr($length){
        // $randpwd = ""; 
        // for ($i = 0; $i < $length; $i++) 
        // { 
        //     $randpwd .= chr(mt_rand(33, 126)); 
        // } 
        // return $randpwd; 
        return rand(pow(10,($length-1)), pow(10,$length)-1);
    }


    /**
     * 公用返回方法
     */
    public static function returnResult($code,$msg,$restult){
        if($code >=300){
            return response()->json(array('code'=>$code,'msg'=>$msg));
        }else{
            return response()->json(array('code'=>$code,'msg'=>$msg,'data'=>$restult));
        }
    }
    /**
     * 公用返回错误方法
     */
    public static function returnSuccessResult($code,$msg,$restult){
        return response()->json(array('code'=>$code,'msg'=>$msg,'data'=>$restult));
    }
    /**
     * 公用返回错误方法
     */
    public static function returnErrorResult($code,$msg){
        return response()->json(array('code'=>$code,'msg'=>$msg));
    }
    /**
     * 根据当前时间戳生成不重复名
     */
    public static function getname($length = 4){
        return timestamp();
    }
    /*
    * 请求URL
    */
    /**
     * @param $url 请求网址
     * @param bool $params 请求参数
     * @param int $ispost 请求方式
     * @param int $https https协议
     * @return bool|mixed
     */
    public static function curl($url, $params = false, $ispost = 0, $https = 0)
    {
        $httpInfo = array();
        $ch = curl_init();
        $header[] = "Content-type: text/xml";//定义content-type为xml
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        curl_setopt($ch, CURLOPT_HEADER, 0); //定义是否显示状态头 1：显示 ； 0：不显示
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);//定义请求类型


        if ($https) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        }
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                if (is_array($params)) {
                    $params = http_build_query($params);
                }
                curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }

        $response = curl_exec($ch);

        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    }
}