<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Sản phẩm';
        $data = Product::all();
        return view('admin.product.index', compact('data','title'));
    }

    public function create()
    {
        $title = 'Thêm sản phẩm';
        $categorys = Category::all();
        return view('admin.product.create', compact('categorys','title'));
    }

    public function create_(Request $request)
    {
        $data = [
            'name' => $request->name,
            'category_id' => $request->categoryID,
            'description' => $request->description,
            'thumnail' => $request->image,
        ];

        // Kiểm tra xem có file ảnh được tải lên hay không
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = rand(0,99) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/product'), $imageName);
            $data['thumnail'] = $imageName;
            Product::create($data);
            return redirect()->route('admin.product'); 
        }
        $data['thumnail'] = '';
        Product::create($data); 
        return redirect()->route('admin.product'); 
    }
    
    public function edit($productID)
    {
        $title = 'Chỉnh sửa sản phẩm';
        $product = Product::find($productID);
        $categorys = Category::all();

        $categoryID = $product->category_id;
        $category_id = $categorys->firstWhere('catergoryID', $categoryID);
        return view('admin.product.edit', compact('product','category_id','categorys','title'));
    }

    public function edit_(Request $request)
    {
    $product = Product::find($request->productID);
    $data = [
        'name' => $request->name,
        'category_id' => $request->categoryID,
        'description' => $request->description,
    ];

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = rand(0,99) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/product'), $imageName);
        $data['thumnail'] = $imageName;
        $product->update($data);
        return redirect()->route('admin.editProduct', ['id' => $request->productID]);
    }
    $product->update($data);
    return redirect()->route('admin.editProduct', ['id' => $request->productID]);
    }


    public function delete($productID)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::where('productID', $productID)->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return redirect()->back();
    }
}
