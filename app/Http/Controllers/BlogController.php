<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
    	
    }

    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')->with('categories')->whereSlug($slug)->firstOrFail();
        //var_dump($post);
        return view('home.blog.content')->withPost($post);
    }
}
