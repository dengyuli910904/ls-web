<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentsModel;
use Redirect, Input;
use UUID;
use DB;

class CommentsController extends Controller
{
    public function showlist(Request $request){
    	$list = CommentsModel::paginate(5);
    	return view('admin.comments.index',array('data' => $list));
    }
}
