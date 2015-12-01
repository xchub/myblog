<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Exceptions\CategoryNotFoundException;

class IndexController extends Controller
{

    
    const PAGE_SIZE = 2;

    public function ___construct()
    {
        
    }

    public function getIndex()
    {
        $articles =  $this->findAllPaginated();
        $pageTitle = 'StoneWorld最新文章';
        $categories = $this->getAllCategory();
        return view('home.index', compact('articles', 'pageTitle', 'categories'));
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
        return view('home.index', compact('articles', 'pageTitle', 'categories'));

    }

    public function getTagIndex()
    {
        
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

}
