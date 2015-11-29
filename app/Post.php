<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use EndaEditor;

class Post extends Model
{
    protected $dates = ['published_at'];
    protected $fillable = [
        'title', 'cid', 'content_raw', 'content_html', 'meta_description', 'is_draft', 'published_at', 'first_imgurl',
    ];
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tag_pivot');
    }

    public function categories()
    {
        return $this->belongsTo('App\Category', 'cid');
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
    /**
     * get the content_html
     */
    protected function SetContentRawAttribute($value)
    {
        $this->attributes['content_raw'] = $value;
        $this->attributes['content_html'] = EndaEditor::MarkDecode($value);
    }
    /**
     * 编辑的话不再改变。只在添加的时候进行添加 考虑到URL问题 潜在404 
     * 因为文章的url是 post/slug just so 
     *判断当前模型是否已经存在 不存在添加 存在略过 
     * @param [type] $value [description]
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        //编辑的话不再改变。只在添加的时候进行添加 考虑到URL问题 潜在404 因为文章的url是 post/slug just so 
        //判断当前模型是否已经存在 不存在添加 存在略过 
        if (! $this->exists) {
            $this->setUniqueSlug($value, '');
        }
    }

    public function setFirstImgurlAttribute($value)
    {
        $this->attributes['first_imgurl'] = $value;
    }
    protected function setUniqueSlug($title, $extra)
    {
        $slug = md5($title.'-'.$extra);//不是为了加密只是为了以防重复
        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($title, $extra + 1);
            return;
        }
        $this->attributes['slug'] = $slug;
    }



}
