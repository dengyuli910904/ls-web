<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use App\Models\TopicsNewsModel;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data = [];
        $data['news'] = NewsModel::orderBy('created_at', 'desc')
            ->limit(10)->get();
        $data['topics'] = TopicsNewsModel::join('topics as t','t.id','=','topics_news.topics_id')->select('topics_news.*','t.title','t.intro','t.template')->orderBy('created_at', 'desc')
            ->limit(10)->get();
        if ($data['topics']) {
            foreach ($data['topics'] as $k => $topic) {
                $news = NewsModel::where('id', $topic->news_uuid)
                    ->first();
                if ($news) {
                    $data['topics'][$k]['news'] = $news;
                }
            }
        }
        // return $data['topics'];
    	return view('home.default', ['data' => $data]);
    }
}
