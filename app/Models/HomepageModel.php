<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageModel extends Model
{
    protected $table = 'homepages';
    public $timestamp = true;
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
}
