<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
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

    //编辑文章
    public function edit($id)
    {
        $article = Article::withTrashed()->find($id);
        $article->tag_ids = ArticleTag::where('article_id', $id)->pluck('tag_id')->toArray();
        $category = Category::all();
        $tag = Tag::all();
        return view('admin.article.edit',compact('article','category','tag'));
    }

    //新建文章
    public function create()
    {
        $category = Category::all();
        $tag = Tag::all();
        return view('admin.article.create',compact('category','tag'));
    }

    //保存文章
    public function store(Request $request)
    {
        $file = $request->file('articlePic');
        $filename = $file->getClientOriginalName();
        $path = $request->file('articlePic')->storeAs('article',$filename);

        exit(json_encode(["errno"=>0,"data"=>[
            asset('uploads/'.$path)
        ]]));
        return asset('uploads/'.$path);
    }
}
