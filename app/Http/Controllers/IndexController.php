<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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

    public function getCategoryIndex()
    {
        return 1234;
    }

    public function getTagIndex()
    {

    }
    protected function findAllPaginated($perPage = self::PAGE_SIZE)
    {
        $articles = Post::orderBy('created_at', 'DESC')->paginate($perPage);
        return $articles;
    }

    protected function getAllCategory()
    {
        $categories = Category::all();
        return $categories;
    }

}
