<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pictures extends Model
{
    protected $table ='pictures';
    public $timestamp = true;
    protected $casts = [
	    'id' => 'string'
	];
}
