<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommentModel;
<<<<<<< HEAD
=======
use App\Models\User;
use App\Models\Product;
>>>>>>> c2d87cbfe5e9c12810cbfef9a90434e6b71df32d
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $title = 'Danh sách bình luận';
        $data = CommentModel::all();
        return view('admin.comment.index', compact('data','title'));
    }
<<<<<<< HEAD
=======

    public function create()
    {
        $title = 'Thêm bình luận';
        $users = User::all();
        $products = Product::all();
        return view('admin.comment.create', compact('users', 'products','title'));
    }

    public function create_(Request $request)
    {
        CommentModel::create([
            'content' => $request->content,
            'product_id' => $request->productID,
            'customer_id' => $request->userID,
        ]);
        return redirect()->route('admin.comment');
    }

    public function edit($commentID)
    {
        $title = 'Chỉnh sửa bình luận';
        $comment = CommentModel::find($commentID);
        return view('admin.comment.edit', compact('comment','title'));
    }

    public function edit_(Request $request)
    {
        CommentModel::where('commentID', $request->commentID)->update([
            'content' => $request->content
        ]);
        return redirect()->route('admin.editComment', ['id' => $request->commentID]);
    }

    public function delete($commentID)
    {
        CommentModel::destroy($commentID);
        return redirect()->back();
    }
>>>>>>> c2d87cbfe5e9c12810cbfef9a90434e6b71df32d
}
