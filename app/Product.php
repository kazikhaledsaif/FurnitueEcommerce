<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo('App\ProductCategory');
    }
    public function comment(){
        return $this->belongsToMany('App\Comment');
    }

    public function review(){
        return $this->belongsToMany('App\Review');
    }
}
