<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index(){
        $title ='Biến thể';
        $data = Variant::all();
        return view("admin.variant.index",compact("title","data"));
    }
}
