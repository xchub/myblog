<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Event;
use App\Http\Requests;
use App\Events\BlogView;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
    	
    }

    public function showPost($slug, Request $request)
    {
        $post = Post::whereSlug($slug)->firstOrFail();

        //利用事件进行访问数量的添加
        Event::fire(new BlogView($post));
        return view('home.blog.content')->withPost($post);
    }

}
