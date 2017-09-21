<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoNews extends Model
{
    protected $table = 'videonews';
    public $timestamp = true;
    protected $fillable = ['id','title','intro','cover','content','newtime','editor','user_id','is_recommend','is_hot','is_recommend_frontpage','is_hidden',
	'is_approved','comment_count','click_count','read_count','parise_count','collect_count','tags','keyword','resource','resource_url','allow_comment'];
}
