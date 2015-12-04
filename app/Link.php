<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'name', 'cid', 'href',
    ];

    public function setHrefAttribute($value)
    {
        if (substr($value, 0, 4) != 'http') {
            $this->attributes['href'] = "http://".$value;
        } else {
            $this->attributes['href'] = $value;
        }
        $this->attributes['link_icon'] = "http://www.google.com/s2/favicons?domain=".$this->attributes['href'];
    }
    
}
