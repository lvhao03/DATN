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
    function shop(){
        $perpage= 9;
        $shop = Product::paginate($perpage);
        $variant = Variant::get();
        // $idsp = $shop->pluck('productID')->toArray();
        // $variant = Variant::whereIn('product_id',$idsp)->get();
        return view ('client.shop' , ['shop'=>$shop,'variant'=>$variant]); 
    }

    function Detail($id){
        $product = Product::where('productID', $id)->first();   
        $variants = Variant::where('product_id',$id)->get();
        foreach($variants as $variant) {
            $image_url = Variant_images::where('variant_id' , $variant->variantID)->value('image_url');
            $variant->image_url = $image_url;
        }
        return view('client.detail',['sp' => $product , 'variants' => $variants]);
    }

    function getVariant($variantID){
        $variant = Variant::where('variantID', $variantID)->first();
        $variantImages = Variant_images::where('variant_id' , $variantID)->get();

        $data = [
            'variant' => $variant,
            'variantImages' => $variantImages
        ];
        return response()->json($data);
    }

    function themvaogio(Request $request, $productID = 0, $soluong=1){
        if ($request->session()->exists('cart')==false) {//chưa có cart trong session           
            $request->session()->push('cart', ['productID'=> $productID,  'soluong'=> $soluong]);          
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
        return view('client.cart');
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
