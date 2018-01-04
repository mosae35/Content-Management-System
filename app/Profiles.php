<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $fillable = ['about','user_id','avatar','facebook','youtube'];

    public function user(){
    return $this->belongsTo('\App\User');
}
}
