<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommentModel;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $title = 'Danh sách bình luận';
        $data = CommentModel::all();
        return view('admin.comment.index', compact('data','title'));
    }
}
