<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag', 'title', 'page_image', 'meta_description',
    ];
    /**
     * 标签文章多对多
     * @return [type] [BelongsToMany]
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_tag_pivot');
    }
    /**
     * 增加当前不存在却需要的标签
     * @param array $tags [description]
     */
    public static function addNeededTags(array $tags)
    {
        if (count($tags) === 0) {
            return;
        }
        $found = static::whereIn('tag', $tag)->list()->all();
        foreach (array_diff($tags, $found) as $tag) {
            static::create([
                'tag' => $tag,
                'title' => $tag,
                'page_image' => '',
                'meta_description' => '',
            ]);
        }
    }
}
