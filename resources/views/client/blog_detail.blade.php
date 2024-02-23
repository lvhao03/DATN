@extends('client.layout')
@section('tieudetrang')
BLOG DETAILS
@endsection
@section('noidungchinh')



<!-- Start Hero Section -->
<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h2>Blog Details</h2>
                                <h1>First Time Home Owner Ideas</h1>
							
							</div>
						</div>
						
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		
        <div class="row g-0">
            <!-- Start Blog Section -->
            <div class="col-sm-12 col-md-8">
                <div class="blog-section">
                    <div class="row">
                        
                  
                                <div class="app detailblog">
                                    <div class="container contain_detail_blog">
                                        
        
                                            <div class="spw">
                                         
                                                <h1 class="infor__title">
                                                    First Time Home Owner Ideas
                                                </h1>
                                                <h6 class="info_user_post">
                                                    
                                                    <p class=" col"> <a href="" class="col-4 _user_post"><i class="fa-solid fa-circle-user"></i> ADMIN_01 </a>  /  <span class="col-4 _user_post"> THÁNG MỘT 16, 2024 </span>  /  <span class="col-4 _user_post"> UNCATEGORIZED </span></p>  

                                                </h6>
                                            
                                            </div>
                                            <?php $quantity = get_number_comment($_GET['id'])?>
                                            <div class="description">
                                               
                                                <div class="spw detail-sub-content">
                                                
                            
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
                                                                <a href="index.php?page=detail&id=<?php echo $product['id'] ?>"class="sale__menu-link">
                                                                    <img src="images/bowl-2.png" alt="" class="sale__img">
                                                                    <span class="sale__name">0đ</span>
                                                                    <span class="sale__price"><b>0 VNĐ</b></span>
                                                                </a>
                                                            </li>
                                                    
                                                </ul>
                                            </div><br>
                                           
                                            <hr style="height: 4.5px; width: 100%;color: black; position: relative;
                                            top: 200px;">
<br>
                                            

                                            
              <form class="traloi">
           
                <div class="form-group mb-5">
                    <h4 style="color: black;">TRẢ LỜI</h4>
                  <label class="text-black" for="message">Đăng nhập với tên admin_1. <span > <a href="">Chỉnh sửa hồ sơ của bạn. </a> </span> <span> <a href=""> ĐĂNG XUẤT? </a> </span> bắt buộc được đánh dấu <span style="color:red;">*</span></s></p>  </label>
                  <textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary-hover-outline">Send</button>
              </form>
                
                                        </div>
                                        
                                    </div>
                               
                                <script>
                                    const stock = <?php echo $current_product['kho_hang']?>;
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
                                                product_id: <?php echo $_GET['id']?>
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
                                                productID : <?php echo $_GET['id']?>
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
                            
                                <?php include_once 'view/components/footer.php'?>;
                           
        
                        
                    </div>
                </div>
                <!-- End Blog Section -->	
        
                <!-- Start Blog Section -->
                
                <!-- End Blog Section -->	
            </div>
            <div class="col">
                <div class="col-11">
                    <sidebar class="sidebar__filter-wrapper">
                     

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
            </div>
          </div>


		<!-- Start Testimonial Slider -->
		<div class="testimonial-section before-footer-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Testimonials</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">
								
								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->

		<div class="blog-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <h2 class="section-title">Recent Blog</h2>
                    </div>
                    <div class="col-md-6 text-start text-md-end">
                        <a href="#" class="more">View All Posts</a>
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
@endsection
