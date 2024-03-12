<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Sản phẩm';
        $data = Product::all();
        return view('admin.product.index', compact('data','title'));
    }
}
