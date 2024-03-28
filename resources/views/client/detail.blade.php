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
                                <img id="productImage" src="{{ asset('images/shop/' . $variants[0]->image_url ) }}" alt="">
                            </div>
                            <div class="spw" style="margin: 0 -7px;">
                                @for ($i = 0; $i < 4; $i++)
                                    <div class="gallery__item">
                                        <img src="{{ asset('images/shop/' . $variants[0]->image_url ) }}" alt="">
                                    </div>
                                @endfor
                            </div>
                        </div>
    
                        <div class="infor">
                            <h1 class="infor__title">
                            {{ $sp->name }}
                            </h1>
                            <span class="infor__price text-black" >{{ addCommas($variants[0]->price) }} VNĐ</span>
                            @if(count($variants) > 1)
                                <div class="d-flex">
                                    <span>Mẫu</span>
                                    <ul class="d-flex">
                                        @foreach($variants as $variant)
                                            <li class="d-flex border p-2 mr-4" id="variantID" onclick="get_variant({{$variant->variantID}})">
                                                <img  src="{{ asset('images/shop/' . $variant->image_url) }}" style="width:30px; height:30px" alt="">
                                                {{$variant->color}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <p class="infor__paragraph">{{$sp->description}}</p>
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
                                    <input size="" type="number" id="soluong" min="1" value="1" max="{{$variants[0]->stock_quantity}}">
                                    <a class="infor__quantity-item increase">+</a>
                                </div> 
                                <button class="button add-to-cart" style="background-color:#3b5d50" onclick="addCart({{$id}})" id=>Thêm vào giỏ</button>
                            </div>
    
                            <hr>
    
                            <div class="infor__action">
                                <span class="infor__action-item"><img src="img/detail/🦆 icon _heart_.svg" alt="">Yêu thích</span>
                                <span class="infor__action-item">So sánh</span>
                            </div>
    
                            <hr>
    
                            <div class="infor__share">
                                <img src="{{ asset('images/Facebook F.png') }}" class="infor__share-item"></img>|
                                <img src="{{ asset('images/Twitter.png') }}" class="infor__share-item"></img>|
                                <img src="{{ asset('images/Google.png') }}" class="infor__share-item"></img>|
                                <img src="{{ asset('images/Pinterest.png') }}" class="infor__share-item"></img>|
                                <img src="{{ asset('images/Email.png') }}" class="infor__share-item"></img>|
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
                            <div class="sale__title">Có thể bạn sẽ thích</div>
                            <a href="./index.php?page=shop" class="sale__all">Xem tất cả</a>
                        </div>
    
                        <ul class="sale__menu spw">
                            @foreach($products as $product)
                                <li class="sale__menu-item">
                                    <a href="/detail/{{$product->productID}}"class="sale__menu-link">
                                        <img src="{{ asset('images/shop/' . $product->image_url ) }}" alt="" class="sale__img">
                                        <span class="sale__name">{{ $product->name }}</span>
                                        <span class="sale__price"><b>{{ addCommas($product->price) }} đ</b></span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <br><br><br>
            </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>

        const stock = <?php echo $variants[0]->stock_quantity?>;

        const increseBtn = $('.increase');
        const decreseBtn = $('.decrease');
        const valueEle = $('#soluong');

        increseBtn.click(()=> {
            let number = Number(valueEle.val()) + 1;
            if (!isStockAvalible()){
                alert('Vui lòng nhập đúng số lượng hàng tồn');
                return;
            }
            valueEle.val(number);
        })

        decreseBtn.click(()=> {
            let number = Number(valueEle.val()) - 1;
            if (isBelowOne()){
                valueEle.val(1)
                return;
            }
            valueEle.val(number);
        })

        function isBelowOne(){
            if (Number(valueEle.val()) <= 1) {
                return true;
            }
            return false;
        }

        function isStockAvalible(){
            let number = Number(valueEle.val());
            if (number >= stock){
                return false;
            }
            return true;
        }   

        let a = <?php echo $variants[0]->variantID ?>

        let productID = {{ $sp->productID }};
        let userID = {{  \Auth::user()->userID ?? '' }};
        const review = $('.review');
        const detailSubContent = $('.detail-sub-content');
        const description = $('.des');
        const sendCommentBtn = $('.send-comment');
        
        $(document).on('click', '.send-comment', function(){
            const textArea = $('textarea'); 
            $.ajax({
                url: '/api/create/comment',
                data: {
                    content: textArea.val(),
                    productID: productID,
                    userID: userID,
                },
                type: 'POST',
                dataType: 'json',
                success: function (result){
                    showCommentSection(result);
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
                url: '/api/comments/' + productID ,
                type: 'GET',
                dataType: 'json',
                success: function (result){
                    showCommentSection(result);
                }
            })
        });

        function showCommentSection(result){
            detailSubContent.html('');
            let html = '';
            if (result.length > 0) {
                $.each(result, (index, comment) => {
                    html += `
                        <div class="flex">
                            <img src='http://127.0.0.1:8000/storage/${comment['image_url']}' class='user-comment-img' >
                            <div>
                            <div class='user-comment-name'>${comment['customer_name']}</div>
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
                    <button class="add-to-btn send-comment" style="background-color: #3b5d50">Gửi bình luận</button>
            `;
            detailSubContent.append(html);
        }

        function get_variant(variantID){
            a = variantID;
            $.ajax({
                url: "/variant/" + variantID,
                type: "GET",
                success: function(response) {
                    $('.infor__price').text(addCommas(response.variant.price) + ' đ');
                    $('#stock_quantity').text(response.variant.stock_quantity);
                    $('#productImage').attr('src', 'http://127.0.0.1:8000/images/' + response.variantImages[0].image_url);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        function addCart(productID){
            soluong = document.getElementById('soluong').value;
            document.location="/addCart/"+productID+"/"+ soluong + "/" + a ;
        }

        function addCommas(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>

@endsection