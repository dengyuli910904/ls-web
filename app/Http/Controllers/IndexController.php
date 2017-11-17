<?php

namespace App\Http\Controllers;

use App\Models\HomepageModel;
use App\Models\NewsModel;
use App\Models\PartnerModel;
use App\Models\TopicsModel;
use App\Models\TopicsNewsModel;
use Illuminate\Http\Request;
use DateTime;
use App\Models\NewsPicture;
use App\Models\VideoNews;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        $data['topics'] = TopicsNewsModel::join('topics as t','t.id','=','topics_news.topics_id')
                ->select('topics_news.*','t.title','t.intro','t.template')->orderBy('created_at', 'desc')
                ->limit(3)->get();
        $data['banner'] = HomepageModel::where('htype', 0)
            ->where('is_hidden', 0)
            ->orderBy('sort', 'asc')
            ->limit(10)
            ->get();
        if ($data['banner']) {
            foreach ($data['banner'] as $k => $banner) {
                $news = NewsModel::where('id', $banner->news_uuid)->first();
                if ($news) {
                    $data['banner'][$k]['news_title'] = $news->title;
                }
            }
        }
        $data['dynamic'] = NewsModel::where('is_hidden',0)->select('id as news_uuid','title as news_title','intro as news_intro','newtime','cover')->orderBy('newtime','desc')->limit(20)->get();
        $data['match'] = HomepageModel::where('htype', 2)
            ->where('is_hidden', 0)
            ->orderBy('sort', 'asc')
            ->limit(10)
            ->get();
        if ($data['match']) {
            foreach ($data['match'] as $k => $dynamic) {
                $news = NewsModel::where('id', $dynamic->news_uuid)->first();
                if ($news) {
                    $data['match'][$k]['news_title'] = $news->title;
                    $data['match'][$k]['news_intro'] = $news->intro;
                    $data['match'][$k]['news_cover'] = $news->cover;
                    $data['match'][$k]['news_time'] = strtotime($news->newtime);
                }
            }
        }
//        return $data['match'];
        $data['business'] = PartnerModel::where('type',1)->orderby('created_at','desc')->take(3)->get();
        $data['partner'] = PartnerModel::where('type',0)->orderby('created_at','desc')->take(12)->get();


        $data['picdata'] = NewsPicture::take(6)->get();

        $data['videos'] = VideoNews::take(3)->get();

//        return $data['picdata'];

        if($request->path() == 'old'){
            return view('home.default', ['data' => $data]);
        }
     	return view('home.index', ['data' => $data]);
    }
}

// public function upload(){
    
// }
