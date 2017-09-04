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
}
