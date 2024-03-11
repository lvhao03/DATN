<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $title = 'Danh mục sản phẩm';
        $data = Category::all();
        return view('admin.category.index', compact('data','title'));
    }
}
