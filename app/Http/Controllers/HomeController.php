<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(3)->get();
        foreach($products as $product){
            $variant = Variant::where('product_id', $product->productID)->first();
            $product->price = $variant->price;
         }
        
        return view ('client.home' , ['products' => $products, 'variant' => $variant ]); 
    }
}
