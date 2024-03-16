<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Variant;
use App\Models\MaterialModel;
use App\Models\Variant_images;
use App\Models\SizeModel;
use App\Models\Product;



use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index(){
        $title ='Biến thể';
        $data = Variant::all();
        return view("admin.variant.index",compact("title","data"));
    }
    public function create()
    {
        $title = 'Thêm biến thể';
        $products=Product::all();
        $sizes = SizeModel::all();
        $materials = MaterialModel::all();
        return view('admin.variant.create', compact('products', 'materials','sizes','title'));
    }
    public function create_(Request $request)
    {
        Variant::create([
            'color'=> $request->color,
            'size_id'=> $request->size_id,
            'material_id'=> $request->material,
            'stock_quantity'=> $request->stock,
            'product_id'=> $request->pro_id,
            'price'=> $request->price,
        ]);

        return redirect()->route('admin.variant');
    }
    public function edit($variantID)
    {
        $title = 'Chỉnh sửa biến thể';
        $products=Product::all();
        $sizes = SizeModel::all();
        $materials = MaterialModel::all();
        $variant = Variant::find($variantID);
        return view('admin.variant.edit', compact('variant','products','materials','sizes','title'));
    }
    public function edit_(Request $request)
    {
        Variant::where('variantID', $request->variantID)->update([
            'color'=> $request->color,
            'size_id'=> $request->size_id,
            'material_id'=> $request->material,
            'stock_quantity'=> $request->stock,
            'product_id'=> $request->pro_id,
            'price'=> $request->price,
        ]);
        return redirect()->route('admin.editVariant', ['id' => $request->variantID]);
    }

    public function delete($variantID)
    {
        Variant_images::destroy($variantID);
        Variant::destroy($variantID);
        return redirect()->back();
    }
}
