<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //protected $table = "baiviet";
    use SoftDeletes;
    protected $date = ['deleted_at'];

    public function comments() {
      return $this->hasMany('\App\Comment');
    }

    public function user() {
      return $this->belongsTo('\App\User');
    }

    public function category() {
      return $this->belongsTo('\App\Category');
    }
}
