<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(Article $article)
    {
        $article = $article
            ->select('id','title','category_id','click','deleted_at','created_at','deleted_at')
            ->with('category')->orderBy('created_at', 'desc')->withTrashed()->paginate(1);
        return view('admin.article.index',compact('article'));
    }
}
