@extends('frontend.master')
@section('title','Cart')
@section('link') 
<link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
@stop
@section('main') 
<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					@if(Cart::count()>=1)
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						@foreach($items as $item)
						<div class="cart_items">
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="{{asset('public/Hinh/'.$item->options->img)}}" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Tên</div>
											<div class="cart_item_text">{{$item->name}}</div>
										</div>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Số lượng</div>
											<div class="cart_item_text">
												<div class="form-group">
												<input class="form-control" type="number" value="{{$item->qty}}">
											</div>
											</div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Giá</div>
											<div class="cart_item_text">{{number_format($item->price,0,',','.')}} đ</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Thành tiền</div>
											<div class="cart_item_text">{{number_format($item->price*$item->qty,0,',','.')}} đ</div>
										</div>
											<div class="cart_item_color cart_info_col">
											<div class="cart_item_title"><a href="{{asset('cart/delete/'.$item->rowId)}}">Action</a></div>
											<div class="cart_item_text"><a href="{{asset('cart/delete/'.$item->rowId)}}">Xóa</a></div>
										</div>
									</div>
								</li>
							</ul>
						</div>
						@endforeach

						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Tổng tiền:</div>
								<div class="order_total_amount">{{$total}}đ</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
										<a href="#" class="my-btn btn">Mua tiếp</a>
										<a href="#" class="my-btn btn">Cập nhật</a>
										<a href="{{asset('cart/delete/all')}}" class="my-btn btn">Xóa giỏ hàng</a>
									</div>

						<div class="cart_buttons">
							<a href="{{asset('thanh-toan')}}" class="button cart_button_checkout">Thanh toán</a>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	@stop