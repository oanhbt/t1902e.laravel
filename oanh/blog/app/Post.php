<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //protected $table = "baiviet";
    use SoftDeletes;
    protected $date = ['deleted_at'];
}
