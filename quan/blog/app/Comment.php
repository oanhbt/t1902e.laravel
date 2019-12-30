<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    //
    use SofrDeletes;
    protected $date = ['deleted_at'];
}
