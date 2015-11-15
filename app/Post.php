<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];
    protected $fillable = [
        'title', 'content_raw', 'meta_description', 'is_draft', 'published_at',
    ];
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tag_pivot');
    }

    //同步标签
    public function syncTags(array $tags)
    {
        Tag::addNeededTags($tags);
        if (count($tags)) {
            $this->tags()->sync(
                Tag::whereIn('tag', $tags)->lists('id')->all()
            );
            return;
        }
        $this->tags()->detach();
    }

    public function getPublishDateAttribute($value)
    {
        return $this->published_at->format('M-j-Y');
    }

    /**
    * Return the time portion of published_at
    */
    public function getPublishTimeAttribute($value)
    {
        return $this->published_at->format('g:i A');
    }

    /**
    * Alias for content_raw
    */
    public function getContentAttribute($value)
    {
        return $this->content_raw;
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (! $this->exists) {
            $this->setUniqueSlug($value, '');
        }
    }

    protected function setUniqueSlug($title, $extra)
    {
        $slug = str_slug($title.'-'.$extra);

        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($title, $extra + 1);
            return;
        }

        $this->attributes['slug'] = $slug;
    }

}
