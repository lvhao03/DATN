@extends('client.layout')
@section('tieudetrang')
CART
@endsection
@section('noidungchinh')

<!-- Start Hero Section -->
<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Cart</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Ảnh</th>
                          <th class="product-name">Tên sản phẩm</th>
                          <th class="product-price">Giá</th>
                          <th class="product-quantity">Số lượng</th>
                          <th class="product-total">Tổng tiền</th>
                          <th class="product-remove">Xóa</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php
                        $cart = session('cart');
                        $totalMoney = 0;
                        
                      @endphp
                      @foreach($cart as $key => $c)
                        @php
                                $productID = $c[0];            
                                $variantID = $c[1];            
                                $quantity = $c[4];
                                $price = $c[3];
                                $image = $c[2];
                                $ten_sp = \DB::table('product')->where('productID', '=', $productID)->value('name');
                                
                                $total = $price * $quantity;
                                $totalMoney += $total;
                          
                        @endphp
                        <tr>
                          <td class="product-thumbnail">
                          <img src="{{ asset('images/shop/' . $c[2] ) }}" alt="Image" class="img-fluid">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black">{{$ten_sp}}</h2>
                          </td>
                          <td>{{ addCommas($price)}} đ</td>
                          <td>
                            <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                              <div class="input-group-prepend" onclick="decrease(this)">
                                <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                              </div>
                              <input id="{{ $key }}" data-stock="{{ $c[5] }}" type="text" class="form-control text-center quantity-amount" value="{{$c[4]}}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                              <div class="input-group-append" onclick="increase(this)">
                                <button class="btn btn-outline-black increase" type="button">&plus;</button>
                              </div>
                            </div>
        
                          </td>
                          <td>{{addCommas($total)}} đ</td>
                          <td><a href="/deteleCart/{{$variantID}}" class="btn btn-black btn-sm">X</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <button class="btn btn-black btn-sm btn-block">Update Cart</button>
                    </div>
                    <div class="col-md-6">
                      <button class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-black h4" for="coupon">Coupon</label>
                      <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                      <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-black">Apply Coupon</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black"></strong>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">{{addCommas($totalMoney)}} đ</strong>
                        </div>
                      </div>
                      
        
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='checkout.html'">Proceed To Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        function isStockAvalible(stock, number){
            if (number > stock){
                return false;
            }
            return true;
        }   

        function increase(e){
            var element = $(e);
            const valueEle = element.siblings('.quantity-amount');
            let number = Number(valueEle.val()) + 1;
            if (!isStockAvalible(valueEle.data('stock'), number)){
                alert('Vui lòng nhập đúng số lượng hàng tồn');
                valueEle.val(valueEle.data('stock'));
                return;
            }
            let index = valueEle.attr('id');
            valueEle.val(number);
            $.ajax({
                url: '/cart/modify',
                data: {
                    quantity: number,
                    index: index
                },
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (result){
                    window.location.reload();
                }
            })
        }

        function decrease(e){
          var element = $(e);
            const valueEle = element.siblings('.quantity-amount');
            let number = Number(valueEle.val()) - 1;
            if (isBelowOne(number)){
                alert('Vui lòng nhập đúng số lượng đúng');
                valueEle.val(1);
                return;
            }
            let index = valueEle.attr('id');
            valueEle.val(number);
            $.ajax({
                url: '/cart/modify',
                data: {
                    quantity: number,
                    index: index
                },
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (result){
                    window.location.reload();
                }
            })
        }

        function isBelowOne(number){
            if (Number(number) < 1) {
                return true;
            }
            return false;
        }

    </script>
@endsection