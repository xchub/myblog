<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Exceptions\CategoryNotFoundException;

class IndexController extends Controller
{

    
    const PAGE_SIZE = 2;
    public $viewArticles;
    public function __construct()
    {
        $this->viewArticles = $this->getViewLimit();
        //dd($this->viewArticles);
    }

    public function getIndex()
    {
        $articles =  $this->findAllPaginated();
        $pageTitle = 'StoneWorld最新文章';
        $categories = $this->getAllCategory();
        $viewArticles = $this->viewArticles;
        //dd($viewArticles);
        return view('home.index', compact('articles', 'pageTitle', 'categories', 'viewArticles'));
    }
    
    public function getCategoryIndex($slug, $perPage = self::PAGE_SIZE)
    {
        $category = Category::whereSlug($slug)->first();
        if (is_null($category)) {
            throw new CategoryNotFoundException('这个 "'.$slug.'" 分类不存在，请不要没事找事！');
        }
        $categories = $this->getAllCategory();
        $articles = $category->posts()->orderBy('created_at', 'DESC')->paginate($perPage);
        $pageTitle = $category->name . '分类下的文章';
        $viewArticles = $this->viewArticles;
        return view('home.index', compact('articles', 'pageTitle', 'categories', 'viewArticles'));

    }

    public function getTagIndex($slug, $perPage = self::PAGE_SIZE)
    {
        $tag = Tag::whereTag($slug)->first();
        if (is_null($tag)) {
            throw new TagNotFoundException('这个 "'.$slug.'" 标签不存在，请不要没事找事！');
        }
        $categories = $this->getAllCategory();
        $articles = $tag->posts()->orderBy('created_at', 'DESC')->paginate($perPage);
        $pageTitle = $tag->name . '分类下的文章';
        $viewArticles = $this->viewArticles;
        return view('home.index', compact('articles', 'pageTitle', 'categories', 'viewArticles'));
    }
    protected function findAllPaginated($perPage = self::PAGE_SIZE)
    {
        $articles = Post::orderBy('created_at', 'DESC')->where('is_draft','=',0)->paginate($perPage);
        return $articles;
    }

    protected function getAllCategory()
    {
        $categories = Category::all();
        return $categories;
    }
    protected function getViewLimit($perPage = 4)
    {
        $articles = Post::orderBy('view_cache', 'DESC')->where('is_draft','=',0)->skip(0)->take($perPage)->get();
        return $articles;
    }

}
