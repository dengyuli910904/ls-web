<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsPicture extends Model
{
    protected $table = 'news_picture';
    public $timestamp = true;
    protected $casts = [
	    'id' => 'string'
	];
	protected $fillable = ['id','name','description','cover','content','publishtime','editor','user_id','is_recommend','is_hot','is_recommend_frontpage','is_hidden',
	'is_approved','comment_count','click_count','read_count','parise_count','collect_count','tags','keyword','resource','resource_url','allow_comment'];
}
