<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    public function review(){
        return $this->belongsToMany('App\Product');
    }
}
