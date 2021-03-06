<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<base href="{{asset('public/frontend')}}/">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">
@yield('link')
<style type="text/css">
	#result {
   position: absolute;
   width: 100%;
   max-width:870px;
   cursor: pointer;
   overflow-y: auto;
   max-height: 400px;
   box-sizing: border-box;
   z-index: 1001;
   top: 100%
  }
  .link-class:hover{
   background-color:#f1f1f1;
  }
</style>
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>+38 068 005 3570</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<!-- <li>
										<a href="#">English<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">Italian</a></li>
											<li><a href="#">Spanish</a></li>
											<li><a href="#">Japanese</a></li>
										</ul>
									</li> -->
									@if(Auth::check())
									<li>
										<a href="#">{{ get_data_user('web','name') }}<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="{{asset('User/home')}}">Quản lí</a></li>
											<li><a href="#">Sản phẩm yêu thích</a></li>
											<li><a href="{{asset('dang-xuat')}}">Thoát</a></li>
										</ul>
									</li>
									@endif
								</ul>
							</div>
								@if(!Auth::check())
							<div class="top_bar_user">
								<div class="user_icon"><img src="images/user.svg" alt=""></div>
								<div><a href="{{asset('dang-ky')}}">Đăng ký</a></div>
								<div><a href="{{asset('dang-nhap')}}">Đăng nhập</a></div>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-4 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="{{url('/')}}">OneTech</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-4 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="{{route('tim-kiem')}}" class="header_search_form clearfix" method="get">
										{{ csrf_field() }}
									<input style="width: 100% !important;position: relative;" name="k" type="text" id="search_name" required="required" class="header_search_input" placeholder="Search for products...">
									 <ul class="list-group" id="result">

									 </ul>

										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
						<!-- 	<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon"><img src="images/heart.png" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="#">Wishlist</a></div>
									<div class="wishlist_count">115</div>
								</div>
							</div> -->

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="images/cart.png" alt="">
										<div class="cart_count"><span>{{Cart::count()}}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="{{asset('cart/show')}}">Cart</a></div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">categories</div>
								</div>

								<ul class="cat_menu">
									<?php
									$menu_1 = DB::table('cates')->where('parent_id',0)->get();
									?>
								@foreach($menu_1 as $menu_1)
									<li class="hassubs">
										<a href="{{asset('loaisanpham/'.$menu_1->id.'/'.$menu_1->alias)}}">{!! $menu_1->name !!}<i class="fas fa-chevron-right"></i></a>
										<ul>
										<?php
									$menu_2 = DB::table('cates')->where('parent_id',$menu_1->id)->get();
									?>	
										@foreach($menu_2 as $menu_2)
											<li><a href="{{asset('loaisanpham/'.$menu_2->id.'/'.$menu_2->alias)}}">{!! $menu_2->name !!}<i class="fas fa-chevron-right"></i></a></li>
											@endforeach
										</ul>
									</li>
								@endforeach
								</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="#">Home<i class="fas fa-chevron-down"></i></a></li>
									<?php
									$menu_1 = DB::table('cates')->where('parent_id',0)->get();
									?>
									@foreach($menu_1 as $menu_1)
									<li class="hassubs">
										<a href="{{asset('loaisanpham/'.$menu_1->id.'/'.$menu_1->alias)}}">{!! $menu_1->name !!}<i class="fas fa-chevron-down"></i></a>
										<ul>
											<?php
									$menu_2 = DB::table('cates')->where('parent_id',$menu_1->id)->get();
									?>
										@foreach($menu_2 as $menu_2)
											<li><a href="{{asset('loaisanpham/'.$menu_2->id.'/'.$menu_2->alias)}}">{!! $menu_2->name !!}<i class="fas fa-chevron-down"></i></a></li>
										@endforeach
										</ul>
									</li>
									@endforeach
									<li><a href="{{asset('lien-he')}}">Contact<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>
		
		<!-- Menu -->

		

	</header>
	
	<!-- Home -->

	

	<!-- Shop -->

	 @yield('main')

	<!-- Recently Viewed -->

	

	<!-- Brands -->

	

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">OneTech</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">+38 068 005 3570</div>
						<div class="footer_contact_text">
							<p>17 Princess Road, London</p>
							<p>Grester London NW18JR, UK</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
							<li><a href="#">Computers & Laptops</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Smartphones & Tablets</a></li>
							<li><a href="#">TV & Audio</a></li>
						</ul>
						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a href="#">Car Electronics</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="#">Video Games & Consoles</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Computers & Laptops</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<!-- <script src="js/shop_custom.js"></script>
 -->@yield('script')
<script type="text/javascript">
$(document).ready(function(){
		var timeout = null;
 	$('#search_name').keyup(function(){ 
 		clearTimeout(timeout);
 		 var $this = $(this);
 		$('#result').html('');
 	  timeout = setTimeout(function ()
	       {
	      	  ajaxValidation($this);
	       }, 500);
    });


    var ajaxValidation = function (object) {
            var $this   = $(object);
            var query   = $this.val();
        if(query != '')
	        {
	         var _token = $('input[name="_token"]').val();
	         $.ajax({
			          url:"{{ route('autocomplete.fetch') }}",
			          method:"POST",
			          dataType : 'json',
			          data:{query:query, _token:_token},
			          success:function(result){
			           $('#result').fadeIn(); 
			           var html = '';
			           if(result!='')
			             {
			             	$.each (result, function (key, item){
                            html +=  '<li class="list-group-item link-class">';
	           				 html +=  '<img src="../../public/hinh/'+item['image']+'" height="40" width="40" class="img-thumbnail" /> '+item['name']+' | <span class="text-muted">'+formatNumber(item['price'], '.', ',')+' VNĐ</span>';
	                            html +=  '</li>';
	                        });
			             }
			             else
			             {
			             	 html +=  '<li class="list-group-item link-class">Không có kết quả</li>';
			             }
			           $('#result').html(html);
			          }
		           });
	     	 }
       };

    $(document).on('click', 'li', function(){  
    	var click_text = $(this).text().split('|');
    	// $('#search_name').val($.trim(click_text[0]));
    	$('#search_name').val(click_text[0]);
        // $('#search_name').val($(this).text());  
        $('#result').fadeOut();
    });  

     function formatNumber(nStr, decSeperate, groupSeperate) {
            nStr += '';
            x = nStr.split(decSeperate);
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
            }
            return x1 + x2;
        }

});
</script>
</body>

</html>