<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Article extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function path() {
        return route('articles.show', $this);
    }

    public function prettyBody() {
        return Markdown::convertToHtml($this->body);
    }
}
