<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PicturesNewsCategory extends Model
{
    protected $table = 'picture_news_category';
    public $timestamp = true;
    protected $casts = [
	    'id' => 'string'
	];
	protected $fillable = ['id','categories_id','picture_news_id'];
}
