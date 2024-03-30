@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
@endsection
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title fs-21 mb-1">Thêm Mã Giảm Giá</h5>

        </div>
    </div>
        <!-- Start:: row-1 -->
        <div class="row">
            <form action="{{ route('admin.createVoucherType_') }}" method="POST">
            @csrf
                    <div class="col-xl-4">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    MÃ GIẢM GIÁ
                                </div>
                                <div class="prism-toggle">
                                        <a href="{{ route('admin.typeVoucher') }}" class="">DANH SÁCH MÃ GIẢM</a>
                                    </div>
                            </div>
                            <div class="card-body">
                            @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                                <div class="row gy-4">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Tên Mã Giảm Giá:</label>
                                        <input type="text" name="name_voucher" class="form-control" id="input" placeholder="Name Voucher" >
                                    </div>
                                    <div class="input-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    
                                        <input min="1" max="100" name="code_discount" type="number" class="form-control" id="input-label" placeholder="Discount" >
                                        <span class="input-group-text" id="basic-addon2">%</span>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label for="input-button" class="form-label"></label>
                                        <input type="submit" class="form-control btn btn-primary" id="input-button"  value="Thêm Mã Giảm Giá">
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                    </div>
                    
                </form>

                <form action="{{ route('admin.createVoucher_') }}" method="post">
                @csrf
                <div class="col-xl-7">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        THÔNG TIN MÃ GIẢM GIÁ
                                    </div>
                                    <div class="prism-toggle">
                                        <a href="{{ route('admin.voucher') }}" class="">DANH SÁCH THÔNG TIN MÃ GIẢM</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                @if ($errors->has('name'))
                                <div class="alert alert-danger">
                       {{ $errors->first('name') }}
                                </div>
                    @endif
                                    <div class="input-group mb-3">
                                        
                                        <input name="name_voucher" type="text" class="form-control" placeholder=" Voucher's Name"
                                            aria-label="Username" aria-describedby="basic-addon1" >
                                    </div>
                                   
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">
                                    Ngày Bắt Đầu
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                @if ($errors->has('start_date'))
                                <div class="alert alert-danger">
                       {{ $errors->first('start_date') }}
                                </div>
                    @endif
                                    <div class="input-group">
                                        <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                        <input name="start_date" type="date" class="form-control" id="date" placeholder="EX: YYYY-MM-DD" ><span class="input-group-text">THÁNG-NGÀY-NĂM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">
                                    Ngày Kết Thúc
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                @if ($errors->has('expired_date'))
                                <div class="alert alert-danger">
                       {{ $errors->first('expired_date') }}
                                </div>
                    @endif
                                    <div class="input-group">
                                        <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                        <input name="expired_date" type="date" class="form-control" id="date" placeholder="EX: YYYY-MM-DD" ><span class="input-group-text">THÁNG-NGÀY-NĂM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <p class="fw-semibold mb-2">Loại Mã Giảm Giá:</p>
                                        <select name="voucher_typeID" class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                            <option  value="">Chọn Loại Mã Giảm Giá</option>
                                            @foreach ($datas as $row)
                                            <option  value="{{ $row->voucher_typeID  }}">{{ $row->voucher_typeID  }} - {{ $row->name }}</option>
                                                
                                            @endforeach
                                        </select>
                                       
                                    </div>  <br>    
                                    @if ($errors->has('quantity'))
                                <div class="alert alert-danger">
                       {{ $errors->first('quantity') }}
                                </div>
                    @endif
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <label for="input-label" class="form-label">Số Lượng Mã Giảm Giá:</label>
                            <input  name="voucher_quantity" type="number" class="form-control" id="input" placeholder="Quantity Voucher" >
                        </div>
                                  
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label for="input-button" class="form-label"></label>
                                        <input type="submit" class="form-control btn btn-primary" id="input-button"  value="Thêm Thông Tin Giảm Giá">
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
