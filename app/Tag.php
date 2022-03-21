<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{   
    public function category(){
        return $this->belongsToMany('App\Post');
    }
}
