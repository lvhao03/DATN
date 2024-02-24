<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\ProductFilter;
class ShopController extends Controller
{
    public function all_products_cate()
    {
        $query = DB::table('product')
        ->select('*');
        $data=$query->get();
        $query = DB::table('catergory')
        ->select('*');
        $datacate=$query->get();
        return view('client.shop',['data'=>$data,'datacate'=>$datacate]);
    }
    public function all_products_theoloai($idloai)
    {
        $query = DB::table('product')
        ->select('*')
        ->where('category_id','=',$idloai);
        $datatheoloai=$query->get();
        $query = DB::table('catergory')
        ->select('*');
        $datacate=$query->get();
        return view('client.shop',['data'=>$datatheoloai,'datacate'=>$datacate]);
    }

    
}
