<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function memos(){
        return $this->hasMany('App\Memo');
    }
    
    public function users(){
        return $this->belongsTo('App\User');
    }
}
