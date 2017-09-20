<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoNewsCategory extends Model
{
    protected $table = 'video_news_category';
    public $timestamp = true;
    protected $casts = [
	    'id' => 'string'
	];
}
