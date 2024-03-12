<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $title = 'Danh sách hoá đơn';
        $data = OrderModel::all();
        return view('admin.order.index', compact('data','title'));
    }
}
