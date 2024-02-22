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
									<h2 class="sidebar__heading">FILTER BY PRICE</h2>
									<div class="range-slider-container" >
										<input type="range" class="range-slider" />
										<span id="range-value-bar"></span>
										<span id="range-value">0</span>
									</div>
									<div class="spw">
										<span class="sidebar__span">Giá: $7 - $56</span>
										<button class="btn button-filter">TÌM</button>
									</div>
								</div>
							</ul>	
	
							<ul class="sidebar__category">
								<h2 class="sidebar__heading">PRODUCT CATEGORIES</h2>
							
									<li class="sidebar__category-item">
										<div class="sidebar__category-link" onclick="filter(this)">
											<span>SOFA</span><hr style="width: 85%;">	
											<span>ghe</span><hr style="width: 85%;">	
											<span>SOFA</span><hr style="width: 85%;">				
										</div>
									</li>
								
							</ul>
	
							<ul class="sidebar__tags" >
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
							</ul>
							<ul class="sidebar__tags" >
								<h2 class="sidebar__heading">TRENDING PRODUCTS</h2>
								
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
                            <div class="products__heading-right">
                                <select name="" id="" class="products__heading-right-select">
                                    <option value="" class="products__heading-right-option">12</option>
                                </select>

                                <select name="" id="" class="products__heading-right-select">
                                    <option  value="" class="products__heading-right-option"><i class="fa-solid fa-arrow-up-a-z"></i> Default sorting</option>
                                </select>
                            </div>
                        </div>
						<div class="row ">
						
				 
								
							<!-- Start Column 2 -->
							<div class="col-12 col-md-4 col-lg-4 mb-5">
								
								<a class="product-item" href="#">
									<img src="images/product-1.png" class="img-fluid product-thumbnail">
									<h3 class="product-title">Nordic Chair</h3>
									<strong class="product-price">$50.00</strong>
		
									<span class="icon-cross">
										<img src="images/cross.svg" class="img-fluid">
									</span>
								</a>
							</div> 
							<!-- End Column 2 -->
		
							<!-- Start Column 3 -->
							<div class="col-12 col-md-4 col-lg-4 mb-5">
								<a class="product-item" href="#">
									<img src="images/product-2.png" class="img-fluid product-thumbnail">
									<h3 class="product-title">Kruzo Aero Chair</h3>
									<strong class="product-price">$78.00</strong>
		
									<span class="icon-cross">
										<img src="images/cross.svg" class="img-fluid">
									</span>
								</a>
							</div>
							<!-- End Column 3 -->
		
							<!-- Start Column 4 -->
							<div class="col-12 col-md-4 col-lg-4 mb-5">
								<a class="product-item" href="#">
									<img src="images/product-3.png" class="img-fluid product-thumbnail">
									<h3 class="product-title">Ergonomic Chair</h3>
									<strong class="product-price">$43.00</strong>
		
									<span class="icon-cross">
										<img src="images/cross.svg" class="img-fluid">
									</span>
								</a>
							</div>
							<!-- End Column 4 -->
								<!-- Start Column 4 -->
								<div class="col-12 col-md-4 col-lg-4 mb-5">
									<a class="product-item" href="#">
										<img src="images/product-3.png" class="img-fluid product-thumbnail">
										<h3 class="product-title">Ergonomic Chair</h3>
										<strong class="product-price">$43.00</strong>
			
										<span class="icon-cross">
											<img src="images/cross.svg" class="img-fluid">
										</span>
									</a>
								</div>
								<!-- End Column 4 -->
									<!-- Start Column 4 -->
							<div class="col-12 col-md-4 col-lg-4 mb-5">
								<a class="product-item" href="#">
									<img src="images/product-3.png" class="img-fluid product-thumbnail">
									<h3 class="product-title">Ergonomic Chair</h3>
									<strong class="product-price">$43.00</strong>
		
									<span class="icon-cross">
										<img src="images/cross.svg" class="img-fluid">
									</span>
								</a>
							</div>
							<!-- End Column 4 -->

							
		
		
							
		
						  </div>
					</div>
					
				</div>
				

		      	
		    </div>
			
		</div>
@endsection