<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
class IndexController extends Controller
{
    /**
     * 博客首页
     * @param Article $article
     * @return mixed
     */
    public function index(Article $article)
    {
        $article = $article
            ->select('id','category_id','title','author','description', 'cover', 'created_at')
            ->with(['category','tag'])->paginate(1);
        return view('home.index',compact('article'));
    }

}
