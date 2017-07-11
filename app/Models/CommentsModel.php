<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{
    protected $table = 'comments';
    public $timestamp = true;
    // protected $primaryKey = 'comments_id';
}
