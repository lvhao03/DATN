@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
@endsection
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title fs-21 mb-1">Chỉnh Thông Tin Mã Giảm Giá</h5>

        </div>
    </div>
        <!-- Start:: row-1 -->
        <div class="row">
            
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
                            <form action="{{ route('admin.edit_type_voucher__') }}" method="POST">
            @csrf
          
                                <div class="row gy-4">
                                <input type="hidden" name="voucher_typeID" value="{{ $data->voucher_typeID }}">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Tên Mã Giảm Giá:</label>
                                        <input  value="{{ $data->name }}" type="text" name="name" class="form-control" id="input" placeholder="{{ $data->name }}">
                                    </div>
                                    <div class="input-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    
                                        <input value="{{ $data->discount }}"  type="number" min="1" max="100" name="discount" class="form-control" id="input-label" placeholder="{{ $data->discount }}">
                                        <span class="input-group-text" id="basic-addon2">%</span>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label for="input-button" class="form-label"></label>
                                        <input  type="submit" class="form-control btn btn-primary" id="input-button"  value="Chỉnh Thông Tin Mã Giảm Giá">
                                    </div>
                                    
                                </div>
                                </form>
                            </div>
                           
                        </div>     
                    </div>
                   
               

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
