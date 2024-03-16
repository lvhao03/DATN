<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view ('client.shop' , ['products'=> $products , 'categories' => $categories]); 
    }

    function Detail($id){
        $product = Product::where('productID', $id)->first();
        $id = $product->productID;  
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
        return view('client.detail',['sp' => $product , 'variants' => $variants, 'products' => $products,'id'=> $id]);
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

    function addCart(Request $request, $productID = 0, $soluong = 1, $variantID) {
        $product = Product::where('productID', $productID)->first();
        $variant = Variant::where('product_id', $product->productID)->first();
        $product->image_url = Variant_images::where('variant_id', $variant->variantID)->value('image_url');
        $product->price = $variant->price;
        $product->quantity = $soluong;

        if (!$request->session()->exists('cart')) {//chưa có cart trong session         
            $request->session()->put('cart', [[$productID, $variantID, $product->image_url, $product->price, $product->quantity]]);
        } else {// đã có cart, kiểm tra id_sp có trong cart không
            $cart = $request->session()->get('cart');
            $index_productID = array_search($productID, array_column($cart, 0));
            $index_variantID = array_search($variantID, array_column($cart, 1));
            if ($index_productID !== false && $index_variantID !== false) {//id_sp và variantID đều có trong giỏ hàng thì tăng số lượng
                $cart[$index_variantID][4] += $soluong; // Cộng vào số lượng của biến thể cụ thể
                $request->session()->put('cart', $cart); // Cập nhật giỏ hàng sau khi thay đổi số lượng
            } else { //sp chưa có trong arrary cart thì thêm vào 
                $request->session()->push('cart', [$productID, $variantID, $product->image_url, $product->price, $product->quantity]);
            }
        }
        return redirect('/cart');
    }

    function xoagiohang( Request $request){
        $request->session()->forget('cart');
        return redirect('/');
    }

    function cart(Request $request){
        return view('client.cart');
    }

    function deteleCart(Request $request, $variantID=0){
        $cart =  $request->session()->get('cart'); 
        $index = array_search($variantID, array_column($cart,1));
        if ($index!=''){ 
            array_splice($cart, $index, 1);
            $request->session()->put('cart', $cart);
        }
        return redirect('/cart');
    }

    function getProductInCategory($categoryID){
        $products = DB::table('product')
                ->join('catergory', 'product.category_id', '=', 'catergory.catergoryID')
                ->where('catergory.catergoryID', $categoryID)                
                ->select('product.*')
                ->get();

        foreach($products as $product){ 
            $variant = Variant::where('product_id', $product->productID)->first();
            $product->image_url = Variant_images::where('variant_id' , $variant->variantID)->value('image_url');
            $product->price = $variant->price;
        };

        return response()->json($products);
    }

    public function getProductByName($productName){
        $products = DB::table('product')
            ->where('name', 'like', '%' . $productName . '%')
            ->select('product.*')
            ->get();

        foreach($products as $product){ 
            $variant = Variant::where('product_id', $product->productID)->first();
            $product->image_url = Variant_images::where('variant_id' , $variant->variantID)->value('image_url');
            $product->price = $variant->price;
        };
        return response()->json($products);
    }
}
