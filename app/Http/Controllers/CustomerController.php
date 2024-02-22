<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function edit(Request $request){ 
        $image_url = \Auth::user()->image_url;
        if ($request->file('file_image')) {
            $image_url = $request->file('file_image')->store('images/user', 'public');
            \Log::info($image_url);
        };
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required' ,
            'address' => 'required',
        ]);
        User::find(\Auth::user()->customerID)->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'image_url' => $image_url
        ]);
        return redirect('/user');
    }
}
