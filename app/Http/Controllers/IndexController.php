<?php

namespace App\Http\Controllers;

use App\Models\HomepageModel;
use App\Models\NewsModel;
use App\Models\PartnerModel;
use App\Models\TopicsModel;
use App\Models\TopicsNewsModel;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data = [];
//        $data['news'] = NewsModel::orderBy('created_at', 'desc')
//            ->limit(10)->get();
   
//        $data['topics'] = TopicsModel::orderBy('sort', 'asc')
//            ->limit(3)->get();

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
        $data['dynamic'] = HomepageModel::where('htype', 1)
            ->where('is_hidden', 0)
            ->orderBy('sort', 'asc')
            ->limit(20)
            ->get();
        if ($data['dynamic']) {
            foreach ($data['dynamic'] as $k => $dynamic) {
                $news = NewsModel::where('id', $dynamic->news_uuid)->first();
                if ($news) {
                    $data['dynamic'][$k]['news_title'] = $news->title;
                    $data['dynamic'][$k]['news_intro'] = $news->intro;
                }else{
                    unset($data['dynamic'][$k]);
                }
            }
        }
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
                }
            }
        }
        $data['partner'] = PartnerModel::get();
    	return view('home.default', ['data' => $data]);
    }
}
