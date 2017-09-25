<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsPicture;
use App\Models\Pictures;

class NewsPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = NewsPicture::orderby('publishtime','desc')->paginate(5);
        // return view('web.')
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
     * @param  \App\Models\FavoritesModel  $favoritesModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = NewsPicture::find($id);
        if(!$model)
        	return Redirect::back();

        $list = Pictures::where('news_id',$id)->get();
        $model->pictures = $list;
        return view('',['data'=>$model]);
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
       //
    }
}
