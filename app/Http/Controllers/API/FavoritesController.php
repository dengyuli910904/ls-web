<?php

namespace App\Http\Controllers\API;

use App\Models\FavoritesModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UUID;

class FavoritesController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $model = new FavoritesModel();
        $model->id = UUID::generate();
        $model->users_id = $request->input('users_id');
        $model->news_id = $request->input('news_id');
        if($model->save()){
            return Common::returnErrorResult(200,'收藏成功','');
        }
        else{
            return Common::returnErrorResult(400,'传参错误','');
        }
        // $result = \Auth::user()->favorites()->attach($request->get('news_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FavoritesModel  $favoritesModel
     * @return \Illuminate\Http\Response
     */
    public function show(FavoritesModel $favoritesModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FavoritesModel  $favoritesModel
     * @return \Illuminate\Http\Response
     */
    public function edit(FavoritesModel $favoritesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FavoritesModel  $favoritesModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FavoritesModel $favoritesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FavoritesModel  $favoritesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = FavoritesModel::where('users_id','=',$request->input('users_id'))->where('news_id','=',$request->input('news_id'))->first();
        if($model->delete()){
            return Common::returnErrorResult(200,'取消收藏成功','');
        }
        else{
            return Common::returnErrorResult(400,'传参错误','');
        }
        // \Auth::user()->favorites()->detach($id);
        // return redirect()->back();
    }
}
