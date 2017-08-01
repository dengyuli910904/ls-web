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
        $data['topics'] = TopicsNewsModel::orderBy('created_at', 'desc')
            ->limit(10)->get();
        if ($data['topics']) {
            foreach ($data['topics'] as $k => $topic) {
                $news = NewsModel::where('news_uuid', $topic->uuid)
                    ->first();
                if ($news) {
                    $data['topics'][$k]['news'] = $news;
                }
            }
        }
    	return view('home.index', ['data' => $data]);
    }
}
