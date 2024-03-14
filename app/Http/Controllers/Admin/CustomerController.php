<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CuscomerController extends Controller
{
    public function index()
    {
        $title = 'Danh sách khách hàng';
        $data = User::all();
        return view('admin.cuscomer.index', compact('data','title'));
    }
}
