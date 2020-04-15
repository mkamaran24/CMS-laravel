<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // import class of soft delete
    use SoftDeletes;
     
    
    // protecting the colom of table 
    protected $fillable = [
        'title', 'content', 'category_id','image','slug'
    ];
    
    // Soft Delete, temporary Delete
    protected $dates = ['deleted_at'];

    // get the location of image, and send to controller
    public function getImageAttribute($image)
    {
        return asset($image);
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

}
