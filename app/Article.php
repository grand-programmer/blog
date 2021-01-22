<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    protected $fillable=[
        'title',
        'slug',
        'text,'
    ];
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function like()
    {
        return $this->hasOne('App\Like');
    }

    public function view()
    {
        return $this->hasOne('App\View');
    }
    public function getTagsLinksAttribute()
    {
        return $this->tags()->get();
    }
    public function getLikeCountAttribute()
    {
        return $this->like()->sum('liked');
    }
    public function getViewCountAttribute()
    {
         return $this->view()->sum('viewed');
    }
}
