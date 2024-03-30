<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VoucherModel;
use App\Models\OrderModel;
use App\Models\VoucherTypeModel;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $title = 'Danh sách mã giảm giá';
        $data = VoucherModel::all();
        return view('admin.voucher.index', compact('data','title'));
    }


    public function add_voucher()
    {
        $title = 'Thêm mã giảm giá';
        $data = VoucherModel::all();
        $datas = VoucherTypeModel::all();
        return view('admin.voucher.add_voucher', compact('data','datas','title'));
        
    }




    public function create_(Request $request)
    {
        // VoucherTypeModel::create([
        //     'name' => $request->name_voucher,
        //     'discount' => $request->code_discount,
        // ]); 
        // return redirect()->route('admin.typeVoucher');  


    // Kiểm tra xem dữ liệu nhập vào có hợp lệ không
    $nameVoucher = $request->input('name_voucher');
    $codeDiscount = $request->input('code_discount');
    if (empty($nameVoucher) || !is_numeric($codeDiscount) || $codeDiscount < 1 || $codeDiscount > 100) {
        return redirect()->back()->with('error', 'Vui lòng điền đầy đủ thông tin.');
    }

        // Kiểm tra độ dài của tên mã giảm giá
        if (strlen($nameVoucher) > 60) {
            return redirect()->back()->with('error', 'Tên mã giảm giá không được vượt quá 60 ký tự.');
        }
  // Kiểm tra xem tên mã giảm giá có chứa ký tự lặp lại liên tục không
  if (preg_match('/(.)\1{2,}/', $nameVoucher)) {
    return redirect()->back()->with('error', 'Tên mã giảm giá không được chứa ký tự lặp lại liên tục.');
}



    // Nếu thông tin hợp lệ, tiến hành tạo mới
    VoucherTypeModel::create([
        'name' => $nameVoucher,
        'discount' => $codeDiscount,
    ]); 

    return redirect()->route('admin.typeVoucher')->with('success', 'Mã giảm giá đã được tạo thành công.');



    }









    public function create_voucher_(Request $request)
    {


           // Validate the request data
           $validatedData = $request->validate([
            'name_voucher' => [
                'required',
                'regex:/^([a-zA-Z])\1+$/',// Kiểm tra chuỗi có chứa ký tự lặp lại nhiều lần
            ],
            'start_date' => 'required|date',
            'expired_date' => 'required|date',
            'voucher_typeID' => 'required',
            'voucher_quantity' => 'required|numeric|min:1',
        ], [
            // Custom error messages
            'name_voucher.required' => 'Vui lòng nhập tên.',
            'name_voucher.regex' => 'Tên không được chứa ký tự lặp lại nhiều lần.',
            'start_date.required' => 'Vui lòng chọn ngày bắt đầu.',
            'start_date.date' => 'Ngày bắt đầu không hợp lệ.',
            'expired_date.required' => 'Vui lòng chọn ngày kết thúc.',
            'expired_date.date' => 'Ngày kết thúc không hợp lệ.',
            'voucher_typeID.required' => 'Vui lòng chọn loại giảm giá.',
            'voucher_quantity.required' => 'Vui lòng nhập số lượng mã giảm giá.',
            'voucher_quantity.numeric' => 'Số lượng mã giảm giá phải là số.',
            'voucher_quantity.min' => 'Số lượng mã giảm giá phải lớn hơn hoặc bằng 1.',
        ]);
    






       // Nếu thông tin hợp lệ, tiến hành tạo mới
    VoucherModel::create([
        'name' => $request->name_voucher,
        'start_date' => $request->start_date,
        'expired_date' => $request->expired_date,
        'voucher_typeID' => $request->voucher_typeID,
        'voucher_quantity' => $request->voucher_quantity
    ]); 

    return redirect()->route('admin.voucher')->with('success', 'Thông tin giảm giá đã được thêm thành công.');
    }







    public function delete($id)
    {
    //       // Kiểm tra xem có hàng nào trong bảng voucher liên kết với voucher_typeID này không
    // $relatedVouchers = VoucherModel::where('voucher_typeID', $id)->get();

    // if ($relatedVouchers->isNotEmpty()) {
    //     // Nếu có, bạn có thể xử lý tùy thuộc vào logic của bạn, có thể là thông báo lỗi hoặc xóa các voucher liên quan
    //     // Ví dụ: 
    //     foreach ($relatedVouchers as $voucher) {
    //         $voucher->delete();
    //     }
    // }

    // // Tiếp tục xóa phần tử cha
    // VoucherTypeModel::where('voucher_typeID', $id)->delete();

    // return redirect()->back();




      // Cập nhật trường voucher_typeID trong bảng voucher thành nullz
      VoucherModel::where('voucher_typeID', $id)->update(['voucher_typeID' => null]);

      // Tiếp tục xóa phần tử cha
      VoucherTypeModel::where('voucher_typeID', $id)->delete();
  
      return redirect()->back();
    }






    public function delete_voucher($id)
    {
        // VoucherModel::where('voucherID', $id)->delete();
        // return redirect()->back();



            // Cập nhật trường voucher_typeID trong bảng voucher thành nullz
      OrderModel::where('coupon_id', $id)->update(['coupon_id' => null]);

      // Tiếp tục xóa phần tử cha
      VoucherModel::where('voucherID', $id)->delete();
  
      return redirect()->back();
    }






    public function type_voucher()
    {
        $title = 'Loại mã giảm giá';
        $data = VoucherTypeModel::all();
        return view('admin.voucher.type_voucher', compact('data','title'));
    }



    public function edit_type_voucher($voucher_typeID)
    {
        $title = 'Chỉnh thông tin mã giảm giá';
        $data = VoucherTypeModel::find($voucher_typeID);
        return view('admin.voucher.edit_type_voucher', compact('data','title'));
    }



    public function edit_type_voucher__(Request $request)
    {


         // Kiểm tra xem dữ liệu nhập vào có hợp lệ không
    $name = $request->input('name');
    $discount = $request->input('discount');
    if (empty($name) || !is_numeric($discount) || $discount < 1 || $discount > 100) {
        return redirect()->back()->with('error', 'Vui lòng điền đầy đủ thông tin.');
    }

    // Kiểm tra độ dài của tên mã giảm giá
    if (strlen($name) > 60) {
        return redirect()->back()->with('error', 'Tên mã giảm giá không được vượt quá 60 ký tự.');
    }


  // Kiểm tra xem tên mã giảm giá có chứa ký tự lặp lại liên tục không
  if (preg_match('/(.)\1{2,}/', $name)) {
    return redirect()->back()->with('error', 'Tên mã giảm giá không được chứa ký tự lặp lại liên tục.');
}




        VoucherTypeModel::where('voucher_typeID', $request->voucher_typeID)->update([
            'name' => $request->name,
            'discount' => $request->discount
        ]);
        return redirect()->route('admin.typeVoucher', ['id' => $request->voucher_typeID]);
    }









    public function edit_voucher($voucherID)
    {
        $title = 'Chỉnh thông tin mã giảm giá';
        $data = VoucherModel::find($voucherID);
        $datas = VoucherTypeModel::all();
        return view('admin.voucher.edit_voucher', compact('data','datas','title'));
    }


    public function edit_voucher__(Request $request)
    {
        // VoucherModel::where('voucherID', $request->voucherID)->update([
        //     'name' => $request->name,
        //     'start_date' => $request->start_date,
        //     'expired_date' => $request->expired_date,
        //     'voucher_typeID' => $request->voucher_typeID,
        //     'voucher_quantity'=> $request->quantity
        // ]);
        // return redirect()->route('admin.voucher', ['id' => $request->voucherID]);





           // Validate the request data
    $validatedData = $request->validate([
        'name' => [
            'required',
            'regex:/^([a-zA-Z])\1+$/',// Kiểm tra chuỗi có chứa ký tự lặp lại nhiều lần
        ],
        'start_date' => 'required|date',
        'expired_date' => 'required|date',
        'voucher_typeID' => 'required',
        'quantity' => 'required|numeric|min:1',
    ], [
        // Custom error messages
        'name.required' => 'Vui lòng nhập tên.',
        'name.regex' => 'Tên không được chứa ký tự lặp lại nhiều lần.',
        'start_date.required' => 'Vui lòng chọn ngày bắt đầu.',
        'start_date.date' => 'Ngày bắt đầu không hợp lệ.',
        'expired_date.required' => 'Vui lòng chọn ngày kết thúc.',
        'expired_date.date' => 'Ngày kết thúc không hợp lệ.',
        'voucher_typeID.required' => 'Vui lòng chọn loại giảm giá.',
        'quantity.required' => 'Vui lòng nhập số lượng mã giảm giá.',
        'quantity.numeric' => 'Số lượng mã giảm giá phải là số.',
        'quantity.min' => 'Số lượng mã giảm giá phải lớn hơn hoặc bằng 1.',
    ]);

    // Update voucher information
    VoucherModel::where('voucherID', $request->voucherID)->update([
        'name' => $validatedData['name'],
        'start_date' => $validatedData['start_date'],
        'expired_date' => $validatedData['expired_date'],
        'voucher_typeID' => $validatedData['voucher_typeID'],
        'voucher_quantity' => $validatedData['quantity']
    ]);

    // Redirect with success message
    return redirect()->route('admin.voucher', ['id' => $request->voucherID])->with('success', 'Thông tin giảm giá đã được cập nhật thành công.');
    }
}

