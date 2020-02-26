<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name',
        'page_type_id',
        'status',
        'position'
    ];

    public function pageType()
    {
        return $this->belongsTo('App\PageType');
    }

    public function posts()
    {
      return $this->hasMany('App\Post');
    }
}
