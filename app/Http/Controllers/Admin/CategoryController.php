<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller{
//-------------------------------------------------------------------------------------------------------- 
    public function index()
    {
        $title = 'Danh mục';
        $data = Category::all();
        return view('admin.category.index', compact('data','title'));
    }
//-------------------------------------------------------------------------------------------------------- 
    public function view_add(){
        $title = 'Thêm danh mục mới';
        return view('admin.category.add', compact('title'));
    }

    public function add(Request $request){
        $request->validate([
            'name' => 'required|max:100|unique:catergory,name,' . $request->categoryID . ',categoryID',

        ], [
            'name.required' => 'Tên danh mục không được bỏ trống',
            'name.max' => 'Tên danh mục không được vượt quá 100 ký tự',
            'name.unique' => 'Tên danh mục đã tồn tại',
        ]);

        // Tạo mới danh mục
        Category::create([
            'name' => $request->name,
        ]);

        notify()->success('Tạo danh mục thành công', 'Tạo thành công');
        return redirect()->route('admin.category');
    }

//-------------------------------------------------------------------------------------------------------- 
    public function view_edit($categoryID){
        $title = 'Chỉnh sửa danh mục';
        $category = Category::find($categoryID);
        return view('admin.category.edit', compact('title','category'));
    }

    public function edit(Request $request){
        $request->validate([
            'name' => 'required|max:100|unique:catergory,name,' . $request->categoryID . ',categoryID',

        ], [
            'name.required' => 'Tên danh mục không được bỏ trống',
            'name.max' => 'Tên danh mục không được vượt quá 100 ký tự',
            'name.unique' => 'Tên danh mục đã tồn tại',
        ]);

        Category::where('categoryID', $request->categoryID)->update([
            'name' => $request->name,
        ]);

        notify()->success('Cập nhật danh mục thành công', 'Cập nhật thành công');
        return redirect()->route('admin.category');
}
//-------------------------------------------------------------------------------------------------------- 
    public function delete($categoryID){
        $delete = Category::find($categoryID);
        $delete->delete();
        return redirect()->route('admin.category');
    }

}
