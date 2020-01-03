<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDelete;
class Post extends Model
{
    //
    use SoftDelete;
    protected $date=['delete_at'];
}
