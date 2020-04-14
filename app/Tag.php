<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{   

    protected $guarded = [];

    public function getRouteKeyName()
    {

    	return 'url';

    }

    public function posts()
    {

    	return $this->belongsToMany(Post::class);

    }

    public function setNameAttribute($name)
    {

    	$this->attributes['name'] = $name;
    	$this->attributes['url'] = Str::slug($name);

    }
}
