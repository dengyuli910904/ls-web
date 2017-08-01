<?php

namespace App\Http\Controllers;

use App\Models\HomepageModel;
use App\Models\NewsModel;
use App\Models\TopicsModel;
use App\Models\TopicsNewsModel;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data = [];
        $data['topics'] = TopicsModel::orderBy('sort', 'asc')
            ->limit(3)->get();
        $data['banner'] = HomepageModel::where('htype', 0)
            ->where('is_hidden', 0)
            ->orderBy('sort', 'asc')
            ->limit(10)
            ->get();
        if ($data['banner']) {
            foreach ($data['banner'] as $k => $banner) {
                $news = NewsModel::where('news_uuid', $banner->news_uuid)->first();
                if ($news) {
                    $data['banner'][$k]['news_title'] = $news->title;
                }
            }
        }
        $data['dynamic'] = HomepageModel::where('htype', 1)
            ->where('is_hidden', 0)
            ->orderBy('sort', 'asc')
            ->limit(10)
            ->get();
        if ($data['dynamic']) {
            foreach ($data['dynamic'] as $k => $dynamic) {
                $news = NewsModel::where('news_uuid', $banner->news_uuid)->first();
                if ($news) {
                    $data['dynamic'][$k]['news_title'] = $news->title;
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
                $news = NewsModel::where('news_uuid', $banner->news_uuid)->first();
                if ($news) {
                    $data['match'][$k]['news_title'] = $news->title;
                }
            }
        }
    	return view('home.default', ['data' => $data]);
    }
}
