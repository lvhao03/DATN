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
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bài viết</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm Bài viết</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">

                <div class="card-header">
                    <div class="card-title">
                        Bài viết
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.postAddBlog') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tiêu đề bài viết</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Tiêu đề bài viết" name="title">
<<<<<<< HEAD
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tiêu đề bài viết</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Hình ảnh" name="thumnail">
=======
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình ảnh bài viết</label>
                            <div class="p-4 border rounded-6 mb-4 form-group">
                                <div>
                                    <input class="form-control" type="file" id="formFile" name="thumnail">
                                </div>
                            </div>
>>>>>>> 381b5508eacd4586eacceede5dacf85fd4dff3af
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Người đăng</label>
                            <select class="form-select" name="admin_id" id="">
                                @foreach($admins as $admin)
<<<<<<< HEAD
                                    <option value="{{ $admin->employeeID }}">{{ $admin->name }}</option>
=======
                                    <option value="{{ $admin->userID }}">{{ $admin->name }}</option>
>>>>>>> 381b5508eacd4586eacceede5dacf85fd4dff3af
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung</label>
<<<<<<< HEAD
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nội dung" name="content">
=======
                            <textarea class="form-control" name="content"> </textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
>>>>>>> 381b5508eacd4586eacceede5dacf85fd4dff3af
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm mới</button>
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
