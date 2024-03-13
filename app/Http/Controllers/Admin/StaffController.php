<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $title = 'Danh mục nhân viên';
        $data = User::where('role' , '!=', 0)->get();
        return view('admin.employee.index', compact('data','title'));
    }

    public function create()
    {
        $title = 'Thêm nhân viên mới';
        return view('admin.employee.create', compact('title'));
    }

    public function create_(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'image_url' => 'images/user/default-avatar.jpg',
            'address' => '',
            'google_id' => '',
        ]);
        return redirect()->route('admin.staff');
    }

    public function edit($userID)
    {
        $title = 'Chỉnh sửa thông tin nhân viên';
        $staff = User::find($userID);
        return view('admin.employee.edit', compact('staff','title'));
    }

    public function edit_(Request $request)
    {
        User::where('userID', $request->userID)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        return redirect()->route('admin.editStaff', ['id' => $request->userID]);
    }

    public function delete($userID)
    {
        User::destroy($userID);
        return redirect()->back();
    }

}
