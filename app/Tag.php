<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    // protecting the colom of table 
    protected $fillable = [
       'tag'
    ];
        
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
