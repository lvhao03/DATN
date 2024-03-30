@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
@endsection
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title fs-21 mb-1">Danh mục</h5>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Khách hàng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách khách hàng</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">

                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Sửa người dùng
                    </div>
                    <div class="prism-toggle">
                        <a href="{{route('admin.user')}}" class="btn btn-sm btn-primary-light">Trở về</a>
                    </div>
                </div>

                <div class="card-body">
                    <form class="card-body" action="{{ route('admin.postEditUser')}}" method="POST">
                    @csrf
                        <input type="text" name="userID" value="{{ $user->userID }}" hidden>
                                <div class="mb-3">
                                    <label for="form-password" class="form-label fs-14 text-dark">Nhập họ tên</label>
                                    <input type="username" required class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
                                </div>
                                @error('name')
                                    <div class="text-danger" style="position: relative; top: -10px;">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label for="form-password" class="form-label fs-14 text-dark">Nhập email</label>
                                    <input type="email" required class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{$user->email}}">
                                </div>
                                @error('email')
                                    <div class="text-danger" style="position: relative; top: -10px;">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label for="form-text" class="form-label fs-14 text-dark">Nhập mật khẩu</label>
                                    <input type="password" required class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{$user->password}}">
                                </div>
                                @error('password')
                                    <div class="text-danger" style="position: relative; top: -10px;">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label for="form-password" class="form-label fs-14 text-dark">Nhập hình ảnh</label>
                                    <input type="file" required class="form-control @error('image_url') is-invalid @enderror" name="image_url" placeholder="{{$user->image_url}}">
                                </div>
                                @error('image_url')
                                    <div class="text-danger" style="position: relative; top: -10px;">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label for="form-password" class="form-label fs-14 text-dark">Nhập địa chỉ</label>
                                    <input type="address" required class="form-control @error('address') is-invalid @enderror" name="address" placeholder="{{$user->address}}">
                                </div>
                                @error('address')
                                    <div class="text-danger" style="position: relative; top: -10px;">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label for="form-text" class="form-label fs-14 text-dark">Nhập Google ID</label>
                                    <input type="text" required class="form-control @error('google_id') is-invalid @enderror" name="google_id" placeholder="{{$user->google_id}}">
                                </div>
                                @error('google_id')
                                    <div class="text-danger" style="position: relative; top: -10px;">{{ $message }}</div>
                                @enderror
                            <button class="btn btn-primary mb-3" type="submit">Sửa</button>

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
