@extends('frontend.master')
@section('title','Shop')
@section('main') 
<style type="text/css">
	.acti{
		color:#007bff !important;
	}
</style>
<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Smartphones & Tablets</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								<li><a href="#">Computers & Laptops</a></li>
								<li><a href="#">Cameras & Photos</a></li>
								<li><a href="#">Hardware</a></li>
								<li><a href="#">Smartphones & Tablets</a></li>
								<li><a href="#">TV & Audio</a></li>
								<li><a href="#">Gadgets</a></li>
								<li><a href="#">Car Electronics</a></li>
								<li><a href="#">Video Games & Consoles</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle color_subtitle">Color</div>
							<ul class="colors_list">
								<li class="color"><a href="#" style="background: #b19c83;"></a></li>
								<li class="color"><a href="#" style="background: #000000;"></a></li>
								<li class="color"><a href="#" style="background: #999999;"></a></li>
								<li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
								<li class="color"><a href="#" style="background: #df3b3b;"></a></li>
								<li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
							</ul>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Khoảng Giá</div>
							<ul class="brands_list">
								<?php $a=Request::url() ?>
								<li class="brand">
									<a class="{{Request::get('price')==1?'acti':''}}" href="{{request()->fullUrlWithQuery(['price'=>1])}}">Dưới 1.000.000</a>
								</li>
								<li class="brand">
									<a class="{{Request::get('price')==2?'acti':''}}" href="{{request()->fullUrlWithQuery(['price'=>2])}}">1.000.000 - 3.000.000</a>
								</li>
								<li class="brand">
									<a class="{{Request::get('price')==3?'acti':''}}" href="{{request()->fullUrlWithQuery(['price'=>3])}}">3.000.000 - 5.000.000</a></li>
								<li class="brand">
									<a class="{{Request::get('price')==4?'acti':''}}" href="{{request()->fullUrlWithQuery(['price'=>4])}}">5.000.000 - 7.000.000</a></li>
								<li class="brand">
									<a class="{{Request::get('price')==5?'acti':''}}" href="{{request()->fullUrlWithQuery(['price'=>5])}}">7.000.000 - 10.000.000</a></li>
								<li class="brand">
									<a class="{{Request::get('price')==6?'acti':''}}" href="{{request()->fullUrlWithQuery(['price'=>6])}}">Lớn hơn 10.000.000</a>
								</li>
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							@if(isset($cate->name))
							<div class="shop_product_count">{{$cate->name}}</div>
							@endif
							@if(isset($key) && $key!='')
							<div class="shop_product_count"><b>Tìm Kiếm : {{$key}}</b></div>
							@endif
							<form id="form_order" method="get">
								<div class="shop_sorting">
								<span>Sắp xếp:</span>
								<ul>
									<li><select name="orderby" class="orderby" style="text-decoration: none;color: black;border-bottom: none;">
										<span class="sorting_text">Theo<i class="fas fa-chevron-down"></span></i>
										<ul> 
											
											<option value="md" {{Request::get('orderby')=='md'||Request::get('orderby')?'selected':''}}>
													<li class="shop_sorting_button" >Mặc định</li>
											</option>
											<option  value="desc" {{Request::get('orderby')=='desc'?'selected':''}}>
											<li class="shop_sorting_button">Mới Nhất</li>
											</option>
											<option value="asc" {{Request::get('orderby')=='asc'?'selected':''}}>
											<li class="shop_sorting_button" >Sản phẩm cũ</li>
											</option>
											<option value="price_max" {{Request::get('orderby')=='price_max'?'selected':''}}>
											<li class="shop_sorting_button" >Giá tăng dần</li>
											</option>
											<option value="price_min" {{Request::get('orderby')=='price_min'?'selected':''}}>
											<li class="shop_sorting_button" >Giá giảm dần</li>
											</option>
											
										</ul>
										</select>
									</li>
								</ul>
							</div>
							</form>
						</div>
						@if(isset($products))
						<div class="product_grid">
							<div class="product_grid_border"></div>
								@foreach($products as $item)
							<!-- Product Item -->
							<a href="{{asset('Details/'.$item->id.'/'.$item->alias)}}">
							<div class="product_item is_new">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('public/Hinh/'.$item->image)}}" alt=""></div>
								<div class="product_content">
									<div class="product_price">{!! number_format($item->price,0,',','.') !!}</div>
									<div class="product_name"><div><a href="" tabindex="0">{!! doimau($item->name,$key) !!}</a></div></div>
								</div>

								<div class="product_fav"><i class="fas fa-heart"></i></div>
								<ul class="product_marks">
									<li class="product_mark product_discount">-25%</li>
									<li class="product_mark product_new">new</li>
								</ul>
							</div>
							</a>
								@endforeach
							

						</div>
						@endif

						<!-- Shop Page Navigation -->
				<?php
				  $pagination = paginate($products->currentPage(),$products->lastPage());
				?>
						<div class="shop_page_nav d-flex flex-row">
							@if($pagination[0] != $products->currentPage())
							<a href="{!! $products->appends($query)->url($products->currentPage()-1) !!}">
								<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left">
							</i></div>
							</a>
							@endif
							<ul class="page_nav d-flex flex-row">
							@foreach($pagination as $i)
							<li class="paginate_button page-item {!! ($i==$products->currentPage())?'active':'' !!}">
                             <a href="{!! $products->appends($query)->url($i) !!}" class="page-link">{{$i}}</a>
                   			</li>
                   			@endforeach
							<!-- {!! $products->appends($query)->Links() !!} -->
							</ul>
							@if($pagination[count($pagination) - 1] != $products->currentPage())
							<a href="{!! $products->appends($query)->url($products->currentPage()+1) !!}">
								<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
							</a>
							@endif
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
@stop
@section('script')
<script type="text/javascript">
	$(function(){
		$('.orderby').change(function(){
			$("#form_order").submit();
		});
	});
</script> 
@stop