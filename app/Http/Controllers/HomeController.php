<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\Common;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = 'http://123.57.0.120/scoringchina/interface/2017interScore_forAli.php?matchid=3901';
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', $url);
        $xmlResult = simplexml_load_string($res->getBody());
        $data = [];
        foreach($xmlResult->children()->children() as $childItem) {
            //输出xml节点名称和值
            $player = $childItem;
//            echo $player->attributes()['cn-name'].'<br/>';
            array_push($data,array('id'=>$player->attributes()->id,'cn-name' => $player->attributes()['cn-name'],'position'=> $player->attributes()['position'],'score'=> $player->attributes()['score']));
        }
        return $data;
    }
}
