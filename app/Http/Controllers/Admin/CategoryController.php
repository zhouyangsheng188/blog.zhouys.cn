<?php
/**
 * Created by PhpStorm.
 * User: 周阳生
 * Date: 2018/7/27
 * Time: 0:37
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller {

    public function index()
    {
        $data = Category::withTrashed()->orderBy('sort')->get();
        return view('admin.category.index',compact('data'));
    }
}