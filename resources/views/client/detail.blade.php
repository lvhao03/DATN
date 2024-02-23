@extends('client.layout')
@section('tieudetrang')
DETAIL PRODUCTS
@endsection
@section('noidungchinh')

        <!-- Start Hero Section -->
            <div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

  
        <div class="app">
            <div class="containers">
                <div class="grid">
                    
    
    
          
                    <div class="spw">
                        <div class="gallery">
                            <div class="gallery__item--huge">
                                <img id="productImage" src="{{ asset('images/' . $variants[0]->image_url ) }}" alt="">
                            </div>
                            <div class="spw" style="margin: 0 -7px;">
                                <div class="gallery__item">
                                    <img src="" alt="">
                                </div>
                                <div class="gallery__item">
                                    <img src="" alt="">
                                </div>
                                <div class="gallery__item">
                                    <img src="" alt="">
                                </div>
                                <div class="gallery__item">
                                    <img src="" alt="">
                                </div>
                            </div>
                        </div>
    
                        <div class="infor">
                            <h1 class="infor__title">
                            {{ $sp->name }}
                            </h1>
                            <span class="infor__price">{{ $variants[0]->price }} VNĐ</span>
                            @if(count($variants) > 1)
                                <div class="d-flex">
                                    <span>Mẫu</span>
                                    <ul class="d-flex">
                                        @foreach($variants as $variant)
                                            <li class="d-flex border p-2 mr-4" onclick="get_variant({{$variant->variantID}})">
                                                <img  src="{{ asset('images/' . $variant->image_url) }}" style="width:30px; height:30px" alt="">
                                                {{$variant->color}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <p class="infor__paragraph"></p>
                            <div class="spw">
                                <span class="infor__status">
                                    Số lượng hàng tồn: <b id="stock_quantity"> {{$variants[0]->stock_quantity}}</b>
                                </span>
    
                                <span class="infor__id"> SKU: NO-6700-54</span>
                            </div>
    
                            <hr>
    
                            <div class="spw infor__qty-wrapper">
                                <span class="infor__qty">SL</span>
    
                                <div class="infor__quantity spw">
                                    <a class="infor__quantity-item decrease">-</a>
                                    <a class="infor__quantity-item value">1</a>
                                    <a class="infor__quantity-item increase">+</a>
                                </div>
                                <script>
                                    function themvaogio(productID){
                                        soluong = document.getElementById('soluong').value;
                                        document.location="/themvaogio/" +productID+"/"+ spluong;
                                    }
                                </script>
                               <button class="button add-to-cart" onclick="themvaogio({{$sp->productID}})" id=>Thêm vào giỏ</button>
                            </div>
    
                            <hr>
    
                            <div class="infor__action">
                                <span class="infor__action-item"><img src="img/detail/🦆 icon _heart_.svg" alt="">Yêu thích</span>
                                <span class="infor__action-item">So sánh</span>
                            </div>
    
                            <hr>
    
                            <div class="infor__share">
                                <img src="images/detail/Vector.svg" class="infor__share-item"></img>|
                                <img src="images/detail/Vector-1.svg" class="infor__share-item"></img>|
                                <img src="images/detail/Vector-2.svg" class="infor__share-item"></img>|
                                <img src="images/detail/Vector-3.svg" class="infor__share-item"></img>|
                                <img src="images/detail/Vector-4.svg" class="infor__share-item"></img>|
                            </div>
    
                            <hr>
    
                            <div class="classify">
                                <div class="classify__item"><b>DANH MỤC:</b> Nội thất trang trí</div>
    
                                <div class="classify__item"><b>THẺ:</b> Đồ gốm</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="description">
                        <div class="description__header">
                            <div href="" class="description__nav des">MÔ TẢ</div>
                            <div href="" class="description__nav review">BÌNH LUẬN </div>
                        </div>
                        <hr>
                        <div class="spw detail-sub-content">
                            <div class="description__column">
                                <h3 class="description__heading">HƯỚNG DẪN SỬ DỤNG</h3>
                                <p class="description__paragraph">Sản phẩm được dùng để trang trí, cắm hoa để cho không gian của bạn thật là tao nhã, đẹp đẽ. Tránh để dưới ánh nắng trực tiếp.</p>
                            </div>
    
                            <div class="description__column">
                                <h3 class="description__heading">THÔNG SỐ SẢN PHẨM</h3>
                                <p class="description__paragraph">Chất liệu: Gốm<br>
                                    Kích thước: 24x24.<br>
                                    Cân nặng: 2.15 KG<br>
                                    Được thiết kế và làm thủ công tại YGshop.</p>
                            </div>
    
                            <div class="description__column">
                                <h3 class="description__heading">BẠN CÓ BIẾT KHÔNG?</h3>
                                <p class="description__paragraph">YG cung cấp cho bạn những sản phẩm thiết kế độc đáo và chất lượng cao để trang trí cho không gian sống của bạn. Với đa dạng các loại nội thất như đồ gốm, bàn ăn, giường ngủ và nhiều sản phẩm khác, chúng tôi cam kết sẽ đem đến cho bạn những trải nghiệm tuyệt vời nhất trong việc lựa chọn và sử dụng sản phẩm của chúng tôi. </p>
                            </div>
                        </div>
                    </div>
    
                    <div class="sale">
                        <div class="spw">
                            <div class="sale__title">ĐANG GIẢM GIÁ</div>
                            <a href="./index.php?page=shop" class="sale__all">Xem tất cả</a>
                        </div>
    
                        <ul class="sale__menu spw">
                           
                                    <li class="sale__menu-item">
                                        <a href="index.php?page=detail&id="class="sale__menu-link">
                                            <img src="images/bowl-2.png" alt="" class="sale__img">
                                            <span class="sale__name">0đ</span>
                                            <span class="sale__price"><b>0 VNĐ</b></span>
                                        </a>
                                    </li>
                            
                        </ul>
                    </div>
                </div>
                <br><br><br>
            </div>
  <script>
      
      const increseBtn = $('.increase');
      const decreseBtn = $('.decrease');
      const value = $('.value');

      increseBtn.click(()=> {
          let number = Number(value.text()) + 1;
          if (!isStockAvalible()){
              alert('Số lượng hàng vượt quá số lượng tồn kho');
              return;
          }
          value.html(number)
      })

      decreseBtn.click(()=> {
          let number = Number(value.text()) - 1;
          if (isBelowOne()){
              value.html(1)
              return;
          }
          value.html(number);
      })

      function isBelowOne(){
          if (Number(value.text()) <= 1) {
              return true;
          }
          return false;
      }

      function isStockAvalible(){
          let number = Number(value.text());
          if (number >= stock){
              return false;
          }
          return true;
      }   


      const addToCartBtn = $('.add-to-cart');

      addToCartBtn.click(()=> {
          let productID = addToCartBtn.attr('id');
          window.location.href = 'index.php?page=cart_add&id=' + productID + '&quantity=' + Number(value.text());
      })


  </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function get_variant(variantID){
            $.ajax({
                url: "/variant/" + variantID,
                type: "GET",
                success: function(response) {
                    console.log(response);
                    $('.infor__price').text(response.variant.price);
                    $('#stock_quantity').text(response.variant.stock_quantity);
                    $('#productImage').attr('src', 'http://127.0.0.1:8000/images/' + response.variantImages[0].image_url);
                    console.log(response);
                    // $.each(response, function(index, imageUrl) {
                        
                    //     $('#imageContainer').append('<img src="' + imageUrl + '" alt="Variant Image">');
                    // });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    </script>

  <script>
      const isLogin = <?php 
          if (isset($_SESSION['user'])){
              echo json_encode('true');
          } else {
              echo json_encode('false');
          }
      ?>

      const review = $('.review');
      const detailSubContent = $('.detail-sub-content');
      const description = $('.des');
      const sendCommentBtn = $('.send-comment');
      
      $(document).on('click', '.send-comment', function(){
          const textArea = $('textarea'); 
          if (isLogin == 'false') {
              alert('Vui lòng đăng nhập');
              return;
          }

          $.ajax({
              url: './api/api.php',
              data: {
                  action: 'send_comment',
                  content: textArea.val(),
                  product_id:
              },
              type: 'POST',
              dataType: 'json',
              success: function (result){
                  renderCommentSection(result);
              }
          })
      })

      description.click(function(){
          detailSubContent.html('');
          let html = '';
          html += `     <div class="spw detail-sub-content">
                      <div class="description__column">
                          <h3 class="description__heading">MÔ TẢ</h3>
                          <p class="description__paragraph">Sản phẩm được dùng để trang trí, cắm hoa để cho không gian của bạn thật là tao nhã, đẹp đẽ. Tránh để dưới ánh nắng trực tiếp.</p>
                      </div>

                      <div class="description__column">
                          <h3 class="description__heading">THÔNG SỐ SẢN PHẨM</h3>
                          <p class="description__paragraph">Chất liệu: Gốm<br>
                          Kích thước: 24x24.<br>
                          Cân nặng: 2.15 KG<br>
                          Được thiết kế và làm thủ công tại YGshop.</p>
                      </div>

                      <div class="description__column">
                          <h3 class="description__heading">BẠN CÓ BIẾT KHÔNG?</h3>
                          <p class="description__paragraph">YG cung cấp cho bạn những sản phẩm thiết kế độc đáo và chất lượng cao để trang trí cho không gian sống của bạn. Với đa dạng các loại nội thất như đồ gốm, bàn ăn, giường ngủ và nhiều sản phẩm khác, chúng tôi cam kết sẽ đem đến cho bạn những trải nghiệm tuyệt vời nhất trong việc lựa chọn và sử dụng sản phẩm của chúng tôi.</p>
                      </div>
                  </div>`;
          detailSubContent.html(html);
      })

      review.click(function(){
          detailSubContent.css('flex-direction', 'column');
          detailSubContent.css('margin-left', '30px');
          $.ajax({
              url: './api/api.php',
              data: {
                  action: 'show_comment',
                  productID : 
              },
              type: 'GET',
              dataType: 'json',
              success: function (result){
                  renderCommentSection(result);
              }
          })

      });

      function renderCommentSection(result){
          detailSubContent.html('');
          let html = '';
          if (result.length > 0) {
              $.each(result, (index, comment) => {
                  html += `
                      <div class="flex">
                          <img src='view/img/user/${comment['img']}' class='user-comment-img' >
                          <div>
                          <div class='user-comment-name'>${comment['user_name']}</div>
                          <div>${comment['content']}</div>
                      </div>
                        `;
                  detailSubContent.append(html);
                  html = '';
              });
          } else {
              html += '<p>Hiện chưa có bình luận nào</p>'
          }
          html+= `
          <textarea required class="comment-content" placeholder="Nhập bình luận" name="content" rows="3" cols="10">  </textarea>
                  <button class="add-to-btn send-comment">Gửi bình luận</button>
          `;
          detailSubContent.append(html);
      }


      function sendComment(){

      }
  </script>



@endsection