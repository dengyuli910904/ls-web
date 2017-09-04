<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VideoNews;
use Illuminate\Http\Request;
use App\Models\NewsModel;
// use App\Index_news_categoridModel as NewandtypeModel;
use App\Models\CategoriesModel as NewstypeModel;
use App\Models\CommentsModel;
use App\Models\PartnerModel;
use App\Libraries\Common;
use Redirect, Input;
use UUID;
use DB;

class VideoNewsController extends Controller
{
    /**
     * 最新新闻
     */
    public function index(Request $request)
    {
    }

    public function show($id)
    {
        $news = VideoNews::find($id);
        $list = VideoNews::orderBy('created_at', 'desc')->limit(10)->get();
        return view('home.videonews.show', ['news' => $news, 'list' => $list]);
    }
    
}
