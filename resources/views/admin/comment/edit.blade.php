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
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bình luận</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách bình luận</li>
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
                    <form action="{{ route('admin.editComment_') }}" method="POST">
                        @csrf
                        <input type="text" value="{{ $comment->commentID }}" name="commentID" hidden>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Người bình luận</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{!! Helper::getNameByID($comment->customer_id,'customer') !!}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="content" value="{{ $comment->content }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Sản phẩm bình luận</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{!! Helper::getNameByID($comment->product_id,'product') !!}" disabled>
                        </div>
                        <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
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
