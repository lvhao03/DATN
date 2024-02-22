<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Variant_images;

class ProductController extends Controller
{
    //

    function Detail($id){
        $sp = Product::where ('productID', $id)->first();   
        $idsp = $sp->productID;   
        // $variant =  Variant::where('product_id', $idsp)
        // ->orderBy('ngay','desc')->limit(4)->get()->except($idsp);  
        return view('client.detail',['id'=>$id,'sp'=>$sp]);
    }

    function themvaogio(Request $request, $productID = 0, $soluong=1){
        if ($request->session()->exists('cart')==false) {//chưa có cart trong session           
            $request->session()->push('cart', ['producutID'=> $productID,  'soluong'=> $soluong]);          
        } else {// đã có cart, kiểm tra id_sp có trong cart không
            $cart =  $request->session()->get('cart'); 
            $index = array_search($productID, array_column($cart, 'productID'));
            if ($index!=''){ //id_sp có trong giỏ hàng thì tăhg số lượng
                $cart[$index]['soluong']+=$soluong;
                $request->session()->put('cart', $cart);
            }
            else { //sp chưa có trong arrary cart thì thêm vào 
                $cart[]= ['productID'=> $productID, 'soluong'=> $soluong];
                $request->session()->put('cart', $cart);
            }    
        }
        return redirect('/hiengiohang');
        //$request->session()->forget('cart');
    }

    function xoagiohang( Request $request){
        $request->session()->forget('cart');
        return redirect('/');
    }

    function hiengiohang(Request $request){
        $cart =  $request->session()->get('cart'); 
        return view('client.cart', ['cart'=> $cart]);
    }

    function xoasptronggio(Request $request, $id_sp=0){
        $cart =  $request->session()->get('cart'); 
        $index = array_search($id_sp, array_column($cart, 'id_sp'));
        if ($index!=''){ 
            array_splice($cart, $index, 1);
            $request->session()->put('cart', $cart);
        }
        return redirect('/hiengiohang');
    }
}
