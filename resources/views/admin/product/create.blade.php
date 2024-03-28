@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
    <!-- <link rel="stylesheet" href="{{ asset('assets/admin/libs/filepond/filepond.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/dropzone/dropzone.css') }}"> -->
@endsection
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title fs-21 mb-1">Thêm sản phẩm</h5>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <!-- Start::row-1 -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-md-12">
						<div class="card blog-edit">
							<div class="card-body">
                                <form action="{{ route('admin.createProduct_') }}" method="POST" enctype="multipart/form-data">@csrf
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark">Tên sản phẩm</label>
                                        <input type="text" class="form-control" value="" name="name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark">Danh mục</label>
                                        <select class="form-control" id="language" name="categoryID">
                                            <option value="" selected>Chọn danh mục</option>
                                        @foreach($categorys as $category)
                                            <option value="{{ $category->catergoryID }}">{{ $category->name }}</option>
                                        @endforeach   
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label text-dark">Mô tả</label>
                                        <input type="text" class="form-control" placeholder="Mô tả sản phẩm" name="description">
                                    </div>
                                    
                                    <label class="form-label">Hình ảnh</label>
                                    <div class="p-4 border rounded-6 mb-4 form-group">
                                        <div>
                                            <input class="form-control" type="file" id="formFile" name="image">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                </form>
							</div>
						</div>
					</div>
				</div>
            <!--End::row-1 -->
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
    <!-- <script src="{{ asset('assets/admin/js/blog-post.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/fileupload.js') }}"></script> -->

@endsection
