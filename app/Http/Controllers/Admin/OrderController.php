<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;

use App\Models\VoucherModel;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $title = 'Danh sách hoá đơn';
        $data = OrderModel::all();
        return view('admin.order.index', compact('data','title'));
    }


    public function view($id)
    {
        $title = 'Danh sách sản phẩm trong một hoá đơn';
        
        $datas = OrderDetailModel::where('order_id', $id)->get();
        $data = Product::all();
        return view('admin.order.view', compact('data','datas','title'));
    }


    public function edit($orderID)
    
    {
        $title = 'Danh sách hoá đơn';
        $data = OrderModel::find($orderID);
        
        $datas = VoucherModel::all();
        return view('admin.order.edit', compact('data','datas', 'title'));
    }
    


    // public function edit_(Request $request)
    // {
    //     OrderModel::where('orderID', $request->orderID)->update([
    //         'coupon_id' => $request->coupon_id,
    //         'order_status' => $request->order_status,
    //         'shipment_status' => $request->shipment_status,
    //         'payment_method' => $request->payment_method,
    //     ]);
    //     return redirect()->route('admin.postEditOrder_', ['id' => $request->orderID]);
        
    // }
 

    public function edit__(Request $request)
{
    OrderModel::where('orderID', $request->orderID)->update([
        'coupon_id' => $request->coupon_id,
        'order_status' => $request->order_status,
        'shipment_status' => $request->shipment_status,
        'payment_method' => $request->payment_method
    ]);

    
    return redirect()->route('admin.editOrder', ['id' => $request->orderID]);
}





}
