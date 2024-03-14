<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Trang chủ';
<<<<<<< HEAD
        return view("admin.home.index",compact("title"));
=======
        return view("admin.home.index", compact("title"));
>>>>>>> c2d87cbfe5e9c12810cbfef9a90434e6b71df32d
    }
}
