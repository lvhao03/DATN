<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'Thông tin nhân viên';
        $staff = User::find(\Auth::user()->userID);
        return view('admin.profile.index', compact('staff','title'));
    }

    public function edit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $request->userID . ',userID',
        ], [
            'name.required' => 'Tên không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Vui lòng nhập email đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
        ]);

        User::where('userID', $request->userID)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        notify()->success('Cập nhật nhân viên thành công', 'Cập nhật thành công');
        return redirect()->route('admin.profile');
    }

}
