<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(Request $request){ 
        $image_url = \Auth::user()->image_url;
        if ($request->file('file_image')) {
            $image_url = $request->file('file_image')->store('images/user', 'public');
        };
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
        ], [
            'name.required' => 'Tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email phải để đúng định dạng.',
            'address.required' => 'Địa chỉ không được để trống.',
        ]);

        User::find(\Auth::user()->userID)->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'image_url' => $image_url
        ]);
        return redirect('/user');
    }
}
