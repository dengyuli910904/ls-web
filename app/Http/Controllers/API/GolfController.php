<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HomepageModel;
use App\Models\NewsModel;
use App\Models\CommentsModel;
use Redirect,Input;

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
        return view('home.golf.index',['data'=>$data]);
    }

    /**
     * 查看图片新闻
     */
    public function news(Request $request){
        // $id = $request->input('id');
        $data = NewsModel::first();
        if(empty($data)){
            return Redirect::back();
        }
        $msgcount = CommentsModel::where('news_id','=',$data->id)->count();
        $data->click_count = $data->click_count+1;
        $data->read_count = $data->read_count+1;
        $data->save();
        $data->msgcount = $msgcount;
        return view('home.golf.newspicture',['data'=>$data]);
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
}
