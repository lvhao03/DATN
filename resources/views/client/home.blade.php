@extends('client.layout')
@section('tieudetrang')
HOME
@endsection
@section('noidungchinh')
		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Studio Chuyên Thiết Kế<span clsas="d-block"> Nội Thất Hiện Đại</span></h1>
								<p class="mb-4">Cho đến cuối đời, chẳng ai là không muốn sắm cho mình một bộ nội thất thật là hiện đại, đẹp mắt, bền bỉ cho ngôi nhà của mình đúng không nào.</p>
								<p><a href="" class="btn btn-secondary me-2">Mua Ngay</a><a href="#" class="btn btn-white-outline">Khám Phá</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="images/couch.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Được chế tạo bằng vật liệu tuyệt vời.</h2>
						<p class="mb-4">Những sản phẩm mà chúng tôi đưa đến tay quý khách là những sản phẩm tuyệt vời với chất liệu đặc biệt.</p>
						<p><a href="shop.html" class="btn">Khám Phá</a></p>
					</div> 
					<!-- End Column 1 -->
			@foreach($products as $pd)
					<!-- Start Column 2 -->			
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="cart.html">
							<img src="{{ asset('images/shop/' .$pd->thumnail) }}" class="img-fluid product-thumbnail">
							<h3 class="product-title">{{ $pd->name }}</h3>
							<strong class="product-price">{{ addCommas($pd->price) }} đ</strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> 
					<!-- End Column 2 -->
			@endforeach
				</div>
			</div>
		</div>
		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Tại Sao Lại Chọn Chúng Tôi</h2>
						<p>Cửa hàng của chúng tôi sẽ mang lại những chất lượng trải nghiệm và dịch vụ tuyệt vời đến với quý khách.</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Vận chuyển nhanh &amp; miễn phí</h3>
									<p>Chúng tôi sẽ miễn phí vận chuyển cho những ai trong khu vực TPHCM.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Dễ dàng mua sắm</h3>
									<p>Quý khách có thể dễ dàng mua sắm tại cửa hàng của chúng tôi hoặc trên trang web.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Hỗ trợ 24/7</h3>
									<p>Luôn có những đội ngũ nhân viên trực 24/7 để hỗ trợ thắc mắc của quý khách.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Bảo hành hoàn trả</h3>
									<p>Tất cả sản phẩm của chúng tôi sẽ được bảo hành dài lâu và sẽ đổi trả nếu sản phẩm lỗi.</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="images/img-grid-1.jpg" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="images/img-grid-2.jpg" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="images/img-grid-3.jpg" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4">Chúng Tôi Giúp Bạn Thiết Kế Nội Thất Hiện Đại</h2>
						<p>Quý khách đang thiếu nội thất trong nhà, chưa biết mua nội thất gì hay thiết kế như thế nào? Hãy để Studio của chúng tôi giúp quý khách thiết kế những nội thất hiện đại</p>

						<ul class="list-unstyled custom-list my-4">
							<li>Thiết kế nội thất phù hợp với không gian phòng</li>
							<li>Chúng tôi lựa chọn những nội thất hiện đại</li>
							<li>Tư vấn chọn lọc kỹ càng với yêu cầu của khách</li>
							<li>Bảo đảm chất lượng cao, giá tốt nhất thị trường</li>
						</ul>
						<p><a herf="#" class="btn">Khám Phá</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- End We Help Section -->

		<!-- Start Popular Product -->
		<div class="popular-product">
			<div class="container">
				<div class="row">

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="images/product-1.png" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Ghế Bắc Âu</h3>
								<p>Với thiết kế hiện đại, ghế Bắc Âu mang lại cảm giác ngồi êm hơn, thư giãn hơn </p>
								<p><a href="#">Xem thêm</a></p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="images/product-2.png" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Ghế Kruzo Aero </h3>
								<p>Ghế với phong cách hiện đại, thoải mái, phù hợp với phòng khách  </p>
								<p><a href="#">Xem thêm</a></p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="images/product-3.png" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Ghế làm việc</h3>
								<p>Với giá thành vừa phải, chiếc ghế này mang lại cho bạn cảm hiacs êm ái khi làm việc </p>
								<p><a href="#">Xem thêm</a></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Popular Product -->

		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-6">
						<h2 class="section-title">Các Bài Viết Gần Đây</h2>
					</div>
					<div class="col-md-6 text-start text-md-end">
						<a href="#" class="more">Xem tất cả bài viết</a>
					</div>
				</div>

				<div class="row">

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="images/post-1.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">First Time Home Owner Ideas</a></h3>
								<div class="meta">
									<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="images/post-2.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">How To Keep Your Furniture Clean</a></h3>
								<div class="meta">
									<span>by <a href="#">Robert Fox</a></span> <span>on <a href="#">Dec 15, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="images/post-3.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Small Space Furniture Apartment Ideas</a></h3>
								<div class="meta">
									<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 12, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Blog Section -->	

@endsection