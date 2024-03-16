<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommentModel;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $title = 'Danh sách bình luận';
        $data = CommentModel::all();
        return view('admin.comment.index', compact('data','title'));
    }

    public function create()
    {
        $title = 'Thêm bình luận';
        $users = User::all();
        $products = Product::all();
        return view('admin.comment.create', compact('users', 'products','title'));
    }

    public function create_(Request $request)
    {
        $request->validate([
            'userID' => 'required|exists:users,userID',
            'content' => 'required|string|max:100',
            'productID' => 'required|exists:product,productID',
        ], [
            'content.required' => 'Nội dung bình luận không được bỏ trống',
            'content.max' => 'Nội dung bình luận không được vượt quá 255 ký tự',
            'productID.required' => 'Vui lòng chọn sản phẩm',
            'productID.exists' => 'Sản phẩm không tồn tại',
        ]);

        CommentModel::create([
            'content' => $request->content,
            'product_id' => $request->productID,
            'user_id' => $request->userID,
        ]);
        notify()->success('Tạo bình luận thành công', 'Tạo thành công');
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
        $request->validate([
            'content' => 'required|string|max:100',
        ], [
            'content.required' => 'Nội dung bình luận không được bỏ trống',
            'content.max' => 'Nội dung bình luận không được vượt quá 255 ký tự',
        ]);

        CommentModel::where('commentID', $request->commentID)->update([
            'content' => $request->content
        ]);
        notify()->success('Cập nhật bình luận thành công', 'Cập nhật thành công');
        return redirect()->route('admin.editComment', ['id' => $request->commentID]);
    }

    public function delete($commentID)
    {
        CommentModel::destroy($commentID);
        return redirect()->back();
    }

    public function showTrash()
    {
        $title = 'Thùng rác bình luận';
        $data = CommentModel::onlyTrashed()->get();
        return view('admin.comment.trash', compact('data','title'));
    }

    public function restore($commentID)
    {
        CommentModel::withTrashed()->find($commentID)->restore();
        notify()->success('Khôi phục bình luậnn thành công', 'Khôi phục thành công');
        return redirect()->back();
    }

    public function forceDelete($commentID)
    {
        CommentModel::withTrashed()->find($commentID)->forceDelete();
        return redirect()->back();
    }

}
