<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'code',
        'short_description',
        'body'
    ];

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function path() {
        return route('articles.show', $this);
    }
}
