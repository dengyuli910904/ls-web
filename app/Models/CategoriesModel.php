<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    protected $table = 'categories';
    public $timestamp = true;
    // public function newstocategory()
    // {
    //     return $this->belongsToMany('NewsModel','news','categories_id','news_id');
    // }
}
