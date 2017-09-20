<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    public $timestamp = true;
    protected $casts = [
	    'id' => 'string'
	];
	protected $fillable = ['id','title','intro','cover','content','newtime','editor','user_id','is_recommend','is_hot','is_recommend_frontpage','is_hidden',
	'is_approved','comment_count','click_count','read_count','parise_count','collect_count','tags','keyword','resource','resource_url','allow_comment'];
	public function category()
    {
        return $this->belongsToMany($this,'news_category','news_id','categories_id');
    }
}
