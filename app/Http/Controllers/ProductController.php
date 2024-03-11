<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Variant_images;
use App\Models\Category;
class ProductController extends Controller
{
    //
    function shop(){
        $perpage= 9;
        $products = Product::paginate($perpage);
        // thêm ảnh và giá cho sản phẩm vì giá và ảnh ở table khác
        foreach($products as $product){ 
            $variant = Variant::where('product_id', $product->productID)->first();
            $product->image_url = Variant_images::where('variant_id' , $variant->variantID)->value('image_url');
            
            $product->price = $variant->price;
        };
        $categories = Category::get();
        // $idsp = $shop->pluck('productID')->toArray();
        // $variant = Variant::whereIn('product_id',$idsp)->get();
        return view ('client.shop' , ['products'=> $products , 'categories' => $categories]); 
    }

    function Detail($id){
        $product = Product::where('productID', $id)->first();   
        $variants = Variant::where('product_id',$id)->get();
        foreach($variants as $variant) {
            $image_url = Variant_images::where('variant_id' , $variant->variantID)->value('image_url');
            $variant->image_url = $image_url;
        }
        $products = Product::take(4)->get();   
        foreach($products as $product) {
            $variant = Variant::where('product_id', $product->productID)->first();
            $product->image_url = Variant_images::where('variant_id' , $variant->variantID)->value('image_url');
            $product->price = $variant->price;
        }
        return view('client.detail',['sp' => $product , 'variants' => $variants, 'products' => $products]);
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
