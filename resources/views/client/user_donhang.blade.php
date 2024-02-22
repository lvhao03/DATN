@extends('client.layout')
@section('tieudetrang')
USER DON HANG
@endsection
@section('noidungchinh')

<nav class="container d-flex flex-row" style="margin-bottom: 10%">
    <nav class="col-3">
        <div class="d-flex flex-row justify-content-around col-12">
            <div class="col-4"  >
                <div class="circle"></div>
            </div>
            <div class="col-8 ">
                <b>Account name</b>
                <p>Sửa hồ sơ</p>
            </div>
        </div>
        <div class="d-flex flex-column col-12">
            <div class="p-2">Tài khoản của tôi</div>
            <div class="p-2">Đơn hàng</div>
          </div>
    </nav>
    <nav class="col-9">
        <div class="d-flex flex-column ">
            <ul class="nav justify-content-around border-bottom" style="font-size: 15px;">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Tất cả</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Vận chuyển</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Giao hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Chờ giao hàng</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Hoàn thành</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Đã hủy</a>
                  </li>
              </ul>
              <nav class="navbar bg-body-tertiary ">
                    <input class="col-12 bg-dark border border-0 " style="padding-left:2% ;padding-right:2% ;" type="search" placeholder="Bạn có thể tìm kiếm theo tên Shop, ID đơn hàng hoặc tên sản phẩm" aria-label="Search">
              </nav>
            <div>
                <div class="d-flex flex-row">
                    <div class="col-9 d-flex flex-row">
                <p style="font-size: 23px; margin-right: 2%;">
                    Tên sản phẩm 1
                </p>
                <button type="button" class="btn mauda rounded p-1" style="margin-right: 3px; font-size:12px;height:fit-content ;"><i class="fas fa-comment-alt"></i>Chat</button>
                <button type="button" class="btn mauda rounded p-1" style="font-size:12px ;height:fit-content ;"><i class="fa-solid fa-shop"></i>Xem shop</button>
                </div>
                <div class="col-3" style="text-align: right;">
                    Đã hủy
            </div>
                </div>
                <div class="d-flex flex-row border-bottom">
                    <div class="col-2"><img class="col-12" src="images/bowl-2.png" alt=""></div>
                    <div class="col-8">
                        <p style="font-size: 27px;">Tên sản phẩm 1</p>
                    </div>
                    <div class="col-2 " style="margin:auto 0">
                        <del style="font-size:13px">₫100.000</del><b style="font-size:15px">₫50.000</b>
                    </div>

                </div>
                <div class="d-flex flex-row-reverse">
                    <b style="font-size:20px">₫60000</b><p>Thành tiền:</p>
                </div>
                <div class="d-flex flex-row">
                    <div class="col-2 flex-grow-1 ">
                    <P style="margin:auto 0">Đã hủy bởi bạn</P>
                    </div>
                        <div class="col-9 d-flex flex-row-reverse justify-content-sm-evenly flex-fill">
                            
                            
                            <button type="button" class="btn btn-outline-secondary rounded">Liên hệ người bán</button>
                            <button type="button" class="btn btn-outline-secondary rounded">Xem chi tiết hủy đơn</button>
                            <button type="button" class="btn btn-primary mauda rounded">Mua lại</button>
                        </div>
                 </div>
            </div>
          </div>          
    </nav>
</nav>
@endsection