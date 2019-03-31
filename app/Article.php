<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'author_name',
        'cover_image_src',
        'content',
    ];

    /**
     *
     * @return void
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    /**
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @param  string  $slug
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeOfSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}