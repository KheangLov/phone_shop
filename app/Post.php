<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'thumbnail',
        'page_id'
    ];
    
    public function page()
    {
        return $this->belongsTo('App\Page');
    }
}
