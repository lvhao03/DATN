<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostModel;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $title = 'Danh sách bài viết';
        $data = PostModel::all();
        return view('admin.blog.index', compact('data','title'));
    }
}
