<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{   protected $fillable = [
    'uid', 'pid'];

    public function user(){
        return $this->belongsTo('app\User');
    }
}
