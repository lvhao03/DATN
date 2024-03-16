<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Variant;
use App\Models\Variant_images;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $perpage= 9;
        $products = Product::Paginate($perpage);
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
}
