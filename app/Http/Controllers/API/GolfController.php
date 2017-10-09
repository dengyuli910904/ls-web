<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HomepageModel;
use App\Models\NewsModel;
use App\Models\CommentsModel;
use Redirect,Input;
use App\Models\NewsPicture;
use App\Models\Pictures;
use App\Models\VideoNews;
use App\Models\PartnerModel;

class GolfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['banner'] = HomepageModel::where('htype', 0)
            ->where('is_hidden', 0)
            ->orderBy('sort', 'asc')
            ->limit(10)
            ->get();
        $data['dynamic'] = HomepageModel::where('htype', 1)
            ->where('is_hidden', 0)
            ->orderBy('sort', 'asc')
            ->limit(5)
            ->get();
        if ($data['dynamic']) {
            foreach ($data['dynamic'] as $k => $dynamic) {
                $news = NewsModel::where('id', $dynamic->news_uuid)->where('category_id','4')->first();
                if ($news) {
                    $data['dynamic'][$k]['news_title'] = $news->title;
                    $data['dynamic'][$k]['news_intro'] = $news->intro;
                    $data['dynamic'][$k]['news_time'] = $news->newtime;
                    $data['dynamic'][$k]['news_id'] = $news->id;
                    $data['dynamic'][$k]['cover'] = $news->cover;
                }else{
                    unset($data['dynamic'][$k]);
                }
            }
//            array_values($data['dynamic']);
        }
        $data['picdata'] = NewsPicture::take(4)->get();

        $data['videos'] = VideoNews::take(3)->get();
        // var_dump($data['picdata']);
        return view('home.golf.index',['data'=>$data]);
    }

    /**
     * 模板页面
     */
    public function showtpl(Request $request){
        $years = Date("Y");
        // $title = $request->input('title');
        $title = $years.'新闻';
        $tpl = 1;
        if($request->has('tpl_no')){
            $tpl = $request->input('tpl_no');
        }
        if($request->has('title')){
            $title = $request->input('title');
        }
        if($request->has('y')){
            $y = $request->input('y');
        }
        $data['title'] = $title;
        $data['banner'] = HomepageModel::where('htype', 0)
            ->where('is_hidden', 0)
            ->orderBy('sort', 'asc')
            ->limit(10)
            ->get();
        $data['dynamic'] = HomepageModel::where('htype', 1)
            ->where('is_hidden', 0)
            ->orderBy('sort', 'asc')
            ->limit(5)
            ->get();
        if ($data['dynamic']) {
            foreach ($data['dynamic'] as $k => $dynamic) {
                $news = NewsModel::where('id', $dynamic->news_uuid)->where('category_id','4')->first();
                if ($news) {
                    $data['dynamic'][$k]['news_title'] = $news->title;
                    $data['dynamic'][$k]['news_intro'] = $news->intro;
                    $data['dynamic'][$k]['news_time'] = $news->newtime;
                    $data['dynamic'][$k]['news_id'] = $news->id;
                    $data['dynamic'][$k]['cover'] = $news->cover;
                }else{
                    unset($data['dynamic'][$k]);
                }
            }
//            array_values($data['dynamic']);
        }
        $data['navbar'] = [
                ['id'=>'index','title'=>'首页'],
                ['id'=>'schedule','title'=>'赛程安排'],
                ['id'=>'news-pic','title'=>'精彩图说'],
                ['id'=>'news-video','title'=>'独家视频'],
                ['id'=>'contest-area','title'=>'高端旅游'],
                ['id'=>'back','title'=>'往届回顾']
            ];
        $data['picdata'] = NewsPicture::take(4)->get();

        $data['videos'] = VideoNews::take(3)->get();
        // var_dump($data['picdata']);
        // var_dump( $data['navbar']);
        return view('home.golf.tpl_'.$tpl,['data'=>$data]);
    }
    /**
     * 查看图片新闻
     */
    public function news(Request $request){
        $id = $request->input('id');
        $data = NewsPicture::find($id);
        if(empty($data)){
            return Redirect::back();
        }
        
        $msgcount = CommentsModel::where('news_id','=',$data->id)->count();
        $data->click_count = $data->click_count+1;
        $data->read_count = $data->read_count+1;
        $data->save();
        $data->msgcount = $msgcount;
        $data['picdata'] = Pictures::where('news_id',$id)->get();
        return view('home.golf.newspicture',['data'=>$data]);
    }

    /**
     * 欧巡赛
     */
    public function europe(Request $request){
        $data['banner'] = HomepageModel::where('htype', 0)
            ->where('is_hidden', 0)
            ->orderBy('sort', 'asc')
            ->limit(10)
            ->get();
        $data['dynamic'] = NewsModel::join('news_category','news.id','=','news_category.news_id')
            ->where('news_category.categories_id','=',8)
            ->select('news.*')
//            HomepageModel::join('news','news.id','=','homepages.news_uuid')
//            ->where('homepages.htype', 1)
//            ->where('news.category_id','8')
//            ->where('homepages.is_hidden', 0)
//            // ->where('htype', 1)
//            // ->where('is_hidden', 0)
//            ->orderBy('homepages.sort', 'asc')
            ->limit(10)
            ->get();
//        if ($data['dynamic']) {
//            foreach ($data['dynamic'] as $k => $dynamic) {
//                $news = NewsModel::where('id', $dynamic->news_uuid)->first();
//                if ($news) {
//                    $data['dynamic'][$k]['news_title'] = $news->title;
//                    $data['dynamic'][$k]['news_intro'] = $news->intro;
//                    $data['dynamic'][$k]['news_time'] = $news->newtime;
//                    $data['dynamic'][$k]['news_id'] = $news->id;
//                    $data['dynamic'][$k]['cover'] = $news->cover;
//                }else{
//                    unset($data['dynamic'][$k]);
//                }
//            }
////            array_values($data['dynamic']);
//        }
        $data['picdata'] = NewsPicture::join('picture_news_category','news_picture.id','=','picture_news_category.picture_news_id')
            ->where('picture_news_category.categories_id','=',8)
            ->select('news_picture.*')
            ->take(4)->get();

        $data['videos'] = VideoNews::take(3)->get();
//         var_dump($data['dynamic']);
        $data['partner'] = PartnerModel::get();
        return view('home.golf.europe',['data'=>$data]);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * 赛事直播
     */
    public  function scores(){
        $url = 'http://123.57.0.120/scoringchina/interface/2017interScore_forAli.php?matchid=3901';
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', $url);
        $xmlResult = simplexml_load_string($res->getBody());
        $data = [];
        $i=0;
        foreach($xmlResult->children()->children() as $childItem) {
            $i++;
            //输出xml节点名称和值
            $player = $childItem;
//            echo $player->attributes()['cn-name'].'<br/>';
            array_push($data,array('id'=>$player->attributes()->id,'cn-name' => $player->attributes()['cn-name'],'position'=> $player->attributes()['position'],'score'=> $player->attributes()['score']));
            if($i>10){
                return $data;
            }

        }
        return $data;
    }
    /**
     * 赛事直播
     */
    public  function scores_detail(){
        $url = 'http://123.57.0.120/scoringchina/interface/2017interScore_forAli.php?matchid=3901';
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', $url);
        $xmlResult = simplexml_load_string($res->getBody());
        $data = [];
        $i=0;
        foreach($xmlResult->children()->children() as $childItem) {
            //输出xml节点名称和值
            $player = $childItem;
            $round = [];
            $total = 0;
            foreach($childItem->children() as $r){
                $score = [];
                foreach($r->children() as $s){
                    array_push($score,array(
                        'hole'=>$s->attributes()->hole,
                        'strokes'=>$s->attributes()->strokes,
                        'par'=>$s->attributes()->par,
                        'bunkers'=>$s->attributes()->bunkers,
                        'putts'=>$s->attributes()->putts,
                        'drive'=>$s->attributes()->drive,
                        'fairway'=>$s->attributes()->fairway,
                    ));
                }
                array_push($round,
                    array(
                        'no'=>$r->attributes()->no,
                        'matchnumber'=>$r->attributes()->matchnumber,
                        'matchnumberindex'=>$r->attributes()->matchnumberindex,
                        'teetime'=>$r->attributes()->teetime,
                        'startingtee'=>$r->attributes()->startingtee,
                        'thru'=>$r->attributes()->thru,
                        'today'=>$r->attributes()->today,
                        'total'=>$r->attributes()->total,
                        'round-status'=>$r->attributes()['round-status'],
                        'player-status'=>$r->attributes()['player-status'],
                        'scorelist'=>$score
                    ));

                $total =$total+(float)$r->attributes()->total;
            }
            for($i=0;$i<4;$i++){
                if($i>= count($round)){
                    array_push($round,
                        array(
                            'no'=>'NULL',
                            'matchnumber'=>'NULL',
                            'matchnumberindex'=>'NULL',
                            'teetime'=>'NULL',
                            'startingtee'=>'NULL',
                            'thru'=>'NULL',
                            'today'=>'NULL',
                            'total'=>'NULL',
                            'round-status'=>'NULL',
                            'player-status'=>'NULL',
                            'scorelist'=>'NULL'
                        ));
                }
            }
//            $round =
            array_push($data,array('id'=>$player->attributes()->id,'cn-name' => $player->attributes()['cn-name'],'position'=> $player->attributes()['position'],'score'=> $player->attributes()['score'],'round'=>$round,'total'=>$total));

        }
        return $data;
    }
}
