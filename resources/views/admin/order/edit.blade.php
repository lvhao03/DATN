@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
@endsection
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title fs-21 mb-1">Sửa Thông Tin HÓA ĐƠN</h5>

        </div>
    </div>
        <!-- Start:: row-1 -->
        <div class="row">
        <form action="{{ route('admin.postEditOrder__') }}" method="POST">
        @csrf
        <input type="hidden" name="orderID" value="{{ $data->orderID }}">
                <div class="col-xl-7">

                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        THÔNG TIN HÓA ĐƠN
                                    </div>
                                    <div class="prism-toggle"> 
                                        <a href="{{ route('admin.order') }}" class="">DANH SÁCH HÓA ĐƠN</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                <div class="input-group mb-3">
                                        <span class="input-group-text">ID Hóa Đơn:</span>
                                        <input type="text" class="form-control" placeholder="{{ $data->orderID }}" disabled        
                                            aria-label="Amount (to the nearest dollar)">
                                        
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">ID Khách Hàng:</span>
                                        <input type="text" class="form-control" placeholder="{{ $data->customer_id }}" disabled
                                            aria-label="Amount (to the nearest dollar)">
                                        
                                    </div>
                                <div class="input-group mb-3">
                                        <span class="input-group-text">Tổng Giá Tiền:</span>
                                        <input type="text" class="form-control" placeholder="{{ $data->total_ammount }}" disabled
                                            aria-label="Amount (to the nearest dollar)">
                                        <span class="input-group-text">VNĐ</span>
                                    </div>
                                   
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">
                                    Ngày Mua
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                        <input disabled type="text" class="form-control" id="date" placeholder="{{ Carbon\Carbon::parse($data->order_date)->format('d/m/Y') }}"><span class="input-group-text">DD-MM-YYYY</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <p class="fw-semibold mb-2">Loại GIẢM GIÁ:</p>
                                        <select  class="form-control" data-trigger name="coupon_id" id="choices-single-default">
                                            <option value="{{ $data->coupon_id  }}">{{ $data->coupon_id  }}</option>
                                            @foreach ($datas as $rows)
                                            <option value="{{ $rows->voucherID  }}">{{ $rows->voucherID  }} - {{ $rows->name }}</option>
                                                
                                            @endforeach
                                         
                                    
                                        </select>
                                       
                                    </div> <br> 
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <p class="fw-semibold mb-2">Tình Trạng Đơn Hàng:</p>
                                        <select class="form-control" data-trigger name="order_status" id="choices-single-default">
                                            <option value="{{ $data->order_status }}">{{ $data->order_status }}</option>
                                            <option value="Chưa Xử Lý">Chưa Xử Lý</option>
                                            <option value="Đã Hủy">Đã Hủy</option>
                                            <option value="Hoàn Tất">Hoàn Tất</option>
                                           
                                         
                                    
                                        </select>
                                       
                                    </div> <br> 
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <p class="fw-semibold mb-2">Tình Trạng Giao Hàng:</p>
                                        <select class="form-control" data-trigger name="shipment_status" id="choices-single-default">
                                            <option value="{{ $data->shipment_status }}">{{ $data->shipment_status }}</option>
                                            <option value="Chưa Giao Hàng">Chưa Giao Hàng</option>
                                            <option value="Đã Giao Hàng">Đã Giao Hàng</option>
                                         
                                           
                                         
                                    
                                        </select>
                                       
                                    </div> <br> 
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <p class="fw-semibold mb-2">Phương Thức Thanh Toán:</p>
                                        <select class="form-control" data-trigger name="payment_method" id="choices-single-default">
                                            <option value="{{ $data->payment_method }}">{{ $data->payment_method }}</option>
                                            <option value="Tiền Mặt">Tiền Mặt</option>
                                            <option value="Chuyển Khoản">Chuyển Khoản</option>
                                         
                                    
                                        </select>
                                       
                                    </div> <br> 
                                   
                                  
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label for="input-button" class="form-label"></label>
                                        <input type="submit" class="form-control btn btn-primary" id="input-button"  value="Sửa Thông Tin Hóa Đơn">
                                    </div>
                                </div>
                               
                            </div>
                          
                        </div>
                        
                </form>

                
            </div>
        </div>
        <!-- End:: row-1 -->
@endsection
@section('js')
    <!-- Datatables Cdn -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <!-- Internal Datatables JS -->
    <script src="{{ asset('assets/admin/js/datatables.js') }}"></script>
@endsection
