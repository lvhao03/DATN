<Style>.rounded {
height: 50px;    border-radius: 20px; /* Góc bo tròn */
    padding: 5px; /* Khoảng cách bên trong ô */
    border: 1px solid #ccc; /* Viền của ô */
    width: 300px; /* Độ rộng của ô */
}

.search__bar::placeholder {
    color: #999; /* Màu của placeholder */
    font-style: italic; /* Nghiêng chữ của placeholder */
}</Style>
@extends('client.layout')
@section('tieudetrang')
SHOP
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

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
				<div class="row">
					<div class=" col-md-4 desktop">
						<sidebar class="sidebar__filter-wrapper">
							<ul>
								<div class="sidebar__filter">
									<h2 class="sidebar__heading">Lọc theo giá</h2>
									<div class="range-slider-container" >
										<input type="range" class="range-slider" />
										<span id="range-value-bar"></span>
										<span id="range-value">0</span>
									</div>
									<div class="spw">
										<span class="sidebar__span">Giá: $7 - $56</span>
										<button class="button_shop button-filter">TÌM</button>
									</div>
								</div>
							</ul>	
	
							<ul class="sidebar__category">
								<h2 class="sidebar__heading">Danh mục sản phẩm</h2>
							
									<li class="sidebar__category-item">
										<div class="sidebar__category-link">
											@foreach($categories as $category)
												<span onclick="getProductInCategory({{ $category->catergoryID }})">{{ $category->name }}</span><hr style="width: 85%;">	
											@endforeach			
										</div>
									</li>
								
							</ul>
	
							<!-- <ul class="sidebar__tags" >
								<h2 class="sidebar__heading">TAGS</h2>
								<li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Bình thường</a></li>
								<li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Cổ điển</a></li>
								<li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Sáng tạo</a></li>
								<li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Đồ gốm</a></li>
								<li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Thẩm mỹ</a></li>
								<li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Hằng ngày</a></li>
								<li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Sành điệu</a></li>
								<li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Trang trí</a></li>
								<li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Kiểu mới</a></li>
								<li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Thời thượng</a></li>
							</ul> -->
							<ul class="sidebar__tags" >
								<h2 class="sidebar__heading">Sản phẩm liên quan</h2>
								
								<div class="sidebar__tag-item info-prod-div row" >
									<div class="col" href="" class="image-info-prod">
										<img src="images/product-1.png" alt="" class="image-info">
									</div>
									<div class="info-prod col">
										<div class="name-info">
											<span>Pok Classicle</span>
										</div>
										<div class="star">
											<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
										</div>
										<div class="price-info">
											<span>$</span><span>34.00</span>
										</div>
									</div>
									
								</div><div class="sidebar__tag-item info-prod-div row" >
									<div class="col" href="" class="image-info-prod">
										<img src="images/product-1.png" alt="" class="image-info">
									</div>
									<div class="info-prod col">
										<div class="name-info">
											<span>Pok Classicle</span>
										</div>
										<div class="star">
											<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
										</div>
										<div class="price-info">
											<span>$</span><span>34.00</span>
										</div>
									</div>
									
								</div>
								<div class="sidebar__tag-item info-prod-div row" >
									<div class="col" href="" class="image-info-prod">
										<img src="images/product-1.png" alt="" class="image-info">
									</div>
									<div class="info-prod col">
										<div class="name-info">
											<span>Pok Classicle</span>
										</div>
										<div class="star">
											<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
										</div>
										<div class="price-info">
											<span>$</span><span>34.00</span>
										</div>
									</div>
									
								</div>
							</ul>
							
						</sidebar>
					</div>

					<div class="col col-sm-6 col-md-8">
						<div class="products__heading spw">
                            <div class="products__heading-left">
                                <a href="#" class="products__heading-left-item"><img src="images/Group.svg" alt="" class="products__heading-left-img"></a>
                                <a href="#" class="products__heading-left-item"><img src="images/🦆 icon _list_.svg" alt="" class="products__heading-left-img"></a>
                            </div>

							<input class="rounded search__bar" name="productName" type="text" placeholder="Nhập tên sản phẩm">
                            <div class="products__heading-right">
                                <select name="" id="" class="products__heading-right-select">
                                    <option value="" class="products__heading-right-option">12</option>
                                </select>

                                <select name="" id="" class="products__heading-right-select">
                                    <option  value="" class="products__heading-right-option"><i class="fa-solid fa-arrow-up-a-z"></i>Chọn lọc</option>
                                    <option  value="" class="products__heading-right-option">Lọc theo giá cao đến thấp</option>
                                    <option  value="" class="products__heading-right-option">Lọc theo giá thấp đến cao</option>
                                </select>
                            </div>
                        </div>
						<div class="row product-list">
						@foreach ($products as $product )
							<!-- Start Column 2 -->
							<div class="col-12 col-md-4 col-lg-4 mb-5">
								
								<a class="product-item" href="/detail/{{$product->productID}}">

									<img src="{{ asset('images/shop/' .$product->image_url) }}" class="img-fluid product-thumbnail">
									<h3 class="product-title">{{ $product->name }}</h3>
									<strong class="product-price">{{ addCommas($product->price) }} đ</strong>
									<span class="icon-cross">
										<img src="images/cross.svg" class="img-fluid">
									</span>
								</a>
							</div> 
							<!-- End Column 2 -->
						@endforeach
						{{ $products->links() }}
						</div>
					</div>
				</div>	 	
		    </div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
			const productList = $('.product-list');
			const searchBar = $('.search__bar');

			let typingTimer;
			const doneTypingInterval = 500; // milliseconds

			searchBar.on('input', function() {
				clearTimeout(typingTimer);
				typingTimer = setTimeout(performSearch, doneTypingInterval);
			});

			function performSearch() {
				$.ajax({
					url: '/api/search/' + searchBar.val(),
					type: 'GET',
					dataType: 'json',
					success: function(result) {
						productList.html('');
						let html = '';
						if (result.length == 0){
							html += 'Không tìm thấy sản phẩm';
							productList.append(html);
							return;
						}
						result.forEach(product => {
							html += `		
								<div class="col-12 col-md-4 col-lg-4 mb-5">
									<a class="product-item" href="/detail/${product.productID}">
										<img src="images/shop/${product.image_url}" class="img-fluid product-thumbnail">
										<h3 class="product-title">${product.name}</h3>
										<strong class="product-price">${product.price}</strong>
										<span class="icon-cross">
											<img src="images/cross.svg" class="img-fluid">
										</span>
									</a>
								</div> `;
						});
						productList.append(html);
					}
				});
			}

			function getProductInCategory(categoryID){
				$.ajax({
					url: '/api/category/' + categoryID ,
					type: 'GET',
					dataType: 'json',
					success: function (result){
						productList.html('');
						let html = '';
						result.forEach(product => {
							html += `		
								<div class="col-12 col-md-4 col-lg-4 mb-5">
									<a class="product-item" href="/detail/${ product.productID }">
										<img src="{{ asset('images/shop/' . $product->image_url) }}" class="img-fluid product-thumbnail">
										<h3 class="product-title">${ product.name }</h3>
										<strong class="product-price">${ product.price }</strong>
										<span class="icon-cross">
											<img src="images/cross.svg" class="img-fluid">
										</span>
									</a>
								</div> `;
						})
						productList.append(html);
					}
            	})
			}
		</script>
@endsection