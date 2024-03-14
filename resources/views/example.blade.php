<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <form action="{{ route('payWithVNPAY') }}" method="POST" id="vnpayForm" class="form-control container mt-5">
        <h3>Dữ liệu thanh toán mẫu</h3>
        @csrf
        <!-- Ở đây hãy lấy id sản phẩm nằm trong giỏ hàng ra. Dữ liệu mẫu ở dưới -->
        @php
            $carts = [
                ['productID' => 1, 'name' => 'Bình hoa trang trí '],
                ['productID' => 2, 'name' => 'Chân nến thủy tinh'],
            ];
        @endphp
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Voucher</label>
            <input type="text" class="form-control" placeholder="Nhập mã giảm giá vào đây" name="voucher">
        </div>
        @foreach ($carts as $row)
            <input type="hidden" name="product_id[]" value="{{ encrypt($row['productID']) }}">
        @endforeach
        <button class="nav-link btn btn-success p-2 text-white" id="vnpay" data-bs-toggle="pill">Thanh toán</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
