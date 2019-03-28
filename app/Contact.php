<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message'
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