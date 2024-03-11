<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $title = 'Danh sách khách hàng';
        $data = User::all();
        return view('admin.customer.index', compact('data','title'));
    }
}
