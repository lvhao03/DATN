@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
@endsection
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title fs-21 mb-1">{{ $title }}</h5>
            <nav>
                <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.staff')}}">Danh sách nhân viên</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm nhân viên mới</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">

                <div class="card-header">
                    <div class="card-title">
                        Bình luận
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.createStaff_') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên nhân viên</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputPassword1" placeholder="Nhập tên" name="name">
                        </div>
                        @error('name')
                            <div class="text-danger" style="position: relative; top: -10px;">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputPassword1" placeholder="Nhập email" name="email">
                        </div>
                        @error('email')
                            <div class="text-danger" style="position: relative; top: -10px;">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mật khẩu</label>
                            <input type="text" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Nhập mật khẩu" name="password">
                        </div>
                        @error('password')
                            <div class="text-danger" style="position: relative; top: -10px;">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputPassword1">Chức vụ</label>
                            <select class="form-select @error('role') is-invalid @enderror" name="role" id="">
                                <option value="1">Nhân viên</option>
                                <option value="2">Chủ quản</option>
                                <option value="3">Tác giả</option>
                            </select>
                        </div>
                        @error('role')
                            <div class="text-danger" style="position: relative; top: -10px;">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
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
