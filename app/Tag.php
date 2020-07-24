<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function posts()
    {
        return $this->morphedByMany('App\Post','taggable');
    }

    public function videos()
    {
        return $this->morphedByMany('App\Video','taggable');
    }

    public function getRouteKeyName()//override method from Model class to make "name" as primary key
    {
        return 'name';
    }
}
