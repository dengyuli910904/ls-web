<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_category';
    public $timestamp = true;
    protected $fillable = ['id','news_id','categories_id'];
    protected $casts = [
	    'id' => 'string',
    	// 'news_id' => 'string'
	];
}
