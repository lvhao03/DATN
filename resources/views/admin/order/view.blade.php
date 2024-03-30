@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
@endsection
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title fs-21 mb-1">Danh sách sản phẩm trong một hóa đơn</h5>
            
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">

                <div class="card-header justify-content-between">
                    <div class="card-title">
                        <a href="{{ route('admin.order') }}" class="">DANH SÁCH HÓA ĐƠN</a>
                    </div>
                    <div class="prism-toggle">
                        <a href="{{ route('admin.order') }}" class="">TRỞ LẠI</a>     
                    </div>
                </div>

                <div class="card-body">

                    <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>Order_detail_ID</th>
                               
                                <th>Order_ID</th>
                                <th>Product_ID</th>
                                <th>Thumnail</th>
                           
                                <th>Quantity</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($datas as $row)
        <tr>
            <td>{{ $row->order_detailID }}</td>
            <td>{{ $row->order_ID }}</td>
            <td>{{ $row->product_ID }}</td>
            <!-- Tìm thông tin sản phẩm trong $data dựa trên product_ID của hàng hiện tại -->
            @php
            $product = $data->where('productID', $row->product_ID)->first();
            @endphp
            <td>
                @if ($product)
                <img src="{{ asset('images/'.$product->thumnail)}}" alt="Thumbnail" width="100px">
                @else
                N/A <!-- Nếu không tìm thấy sản phẩm, hiển thị "N/A" -->
                @endif
            </td>
            <td>{{ $row->quantity }}</td>
        </tr>
        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
