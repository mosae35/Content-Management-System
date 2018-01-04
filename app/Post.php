<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
      return  $this->belongsToMany('App\Tag');
    }

    protected $fillable = ['image','title','content','category_id','slug'];

    protected  $dates = ['deleted_at'];
}
