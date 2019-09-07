<?php

namespace Pdusan\SimpleBlog\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'posts';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
        'tags',
        'status',
    ];

    public function comments()
    {
        return $this->hasMany('Pdusan\SimpleBlog\Models\Comment');
    }

    public function category()
    {
        return $this->belongsTo('Pdusan\SimpleBlog\Models\Category');
    }

}