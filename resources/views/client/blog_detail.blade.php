

@extends('client.layout')
@section('tieudetrang')
BLOG DETAILS
@endsection
@section('noidungchinh')

@foreach  ($data as $post)

<!-- Start Hero Section -->
<div class="hero">
				<div class="container">
			
					
							<div class="intro-excerpt">
								<h2>Blog Details</h2>
                                <h1>{{ $post->title }}</h1>
							
							</div>
					
						
					
				</div>
			</div>
		<!-- End Hero Section -->

		

		
  
            <!-- Start Blog Section -->

                <div class="blog-section">
              

                                <div class="app detailblog">
                                    <div class="container contain_detail_blog">
                                        
        
                                            <div class="title_post">
                                         
                                                <h1 class="infor__title">
                                                {{ $post->title }}
                                                </h1><br>
                                                <h6 class="info_user_post">
                                                    
                                                    <p class=" col"> <a href="/user" class="col-4 _user_post"><i class="fa-solid fa-circle-user"></i> {{ $post->name_admin }} </a>  /  <span class="col-4 _user_post"> {{ date('M d, Y', strtotime($post->post_time)) }} </span>  /  <span class="col-4 _user_post"> {{ $post->tags }} </span></p>  

                                                </h6>
                                            
                                            </div>

                                            <div class="">
                                               
                                                <div class="spw ">
                                                
                            
                                                    <div class="">
                                                    
                                                       
                                                        <p class="">{{ $post->content }}.</p>
                                                    </div>
                                                </div>
                                            </div>
                            
                                         <br>
                                           
                                            <hr style="height: 4.5px; width: 100%;color: black; position: relative;
                                            top: 200px;">
<br>
                                            

                                            
              <form class="traloi">
           
                <div class="form-group mb-5">
                    <h4 style="color: black;">TRẢ LỜI</h4>
                  <label class="text-black" for="message">Đăng nhập với tên <span class="boldfont">admin_1</span>. <span class="boldfon"> <a href="/user">Chỉnh sửa hồ sơ của bạn. </a> </span> <span class="boldfont"> <a href="/home"> ĐĂNG XUẤT? </a> </span> bắt buộc được đánh dấu <span style="color:red;">*</span></s></p>  </label>
                  <textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary-hover-outline">Send</button>
              </form>
                
                                        </div>
                                        
                                    </div>
                        
                                    </div>                

                <!-- End Blog Section -->	
        
                @endforeach
           
            
         
  <!-- Start Testimonial Slider -->
  <div class="testimonial-section">
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
														<img src="{{ asset('images/person-1.png') }}" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->

		<!-- Start Blog Section -->
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
                <?php foreach( $datas as $posts ){ ?>
					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="/blog_detail/{{ $posts->postID }}" class="post-thumbnail"><img src="{{ asset(('images/'.$posts->thumnail)) }}" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="/blog_detail/{{ $posts->postID }}">{{ $posts->title }}</a></h3>
								<div class="meta">
									<span>by <a href="/user">{{ $posts->name_admin }}</a></span> <span>on <a href="#">{{ date('M d, Y', strtotime($post->post_time)) }} </a></span>
								</div>
							</div>
						</div>
					</div>
                <?php } ?>
				

				</div>
			</div>
		</div>
		<!-- End Blog Section -->	
       
@endsection
