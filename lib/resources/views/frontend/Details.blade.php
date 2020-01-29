@extends('frontend.master')
@section('title','Contact')
@section('link') 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<style type="text/css">
	ul > li{margin-right:25px;font-weight:lighter;cursor:pointer}
li.active{border-bottom:3px solid silver;}

.item-photo{display:flex;justify-content:center;align-items:center;border-right:1px solid #f6f6f6;}
.menu-items{list-style-type:none;font-size:11px;display:inline-flex;margin-bottom:0;margin-top:20px}
.btn-success{width:100%;border-radius:0;}
.section{width:100%;margin-left:-15px;padding:2px;padding-left:15px;padding-right:15px;background:#f8f9f9}
.title-price{margin-top:30px;margin-bottom:0;color:black}
.title-attr{margin-top:0;margin-bottom:0;color:black;}
.btn-minus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-right:0;}
.btn-plus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-left:0;}
div.section > div {width:100%;display:inline-flex;}
div.section > div > input {margin:0;padding-left:5px;font-size:10px;padding-right:5px;max-width:18%;text-align:center;}
.attr,.attr2{cursor:pointer;margin-right:5px;height:20px;font-size:10px;padding:2px;border:1px solid gray;border-radius:2px;}
.attr.active,.attr2.active{ border:1px solid orange;}

@media (max-width: 426px) {
    .container {margin-top:0px !important;}
    .container > .row{padding:0 !important;}
    .container > .row > .col-xs-12.col-sm-5{
        padding-right:0 ;    
    }
    .container > .row > .col-xs-12.col-sm-9 > div > p{
        padding-left:0 !important;
        padding-right:0 !important;
    }
    .container > .row > .col-xs-12.col-sm-9 > div > ul{
        padding-left:10px !important;
        
    }            
    .section{width:104%;}
    .menu-items{padding-left:0;}
}
	.list_star i:hover{
		cursor: pointer;
	}
	.list_text{
		display: inline-block;
    margin-left: 10px;
    position: relative;
    background: #52b858;
    color: #fff;
    padding: 2px 8px;
    box-sizing: border-box;
    font-size: 12px;
    border-radius: 2px;
    display: none;
	}
	.list_text:after{
		right: 100%;
    top: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-color: rgba(82,184,88,0);
    border-right-color: #52b858;
    border-width: 6px;
    margin-top: -6px;
	}
	.close_button{
		background: #fff;
    color: #288ad6;
    border: 1px solid black;
    width: 200px;padding: 10px;border-radius: 5px;text-decoration: none;
	}
	.open_button {
	width: 200px;background-color: #288ad6;padding: 10px;color: white !important;border-radius: 5px;
	}
	a {
		text-decoration: none !important;
	}
	.list_star .rating_active{
		color:#fd9727;
	}


.stars-outer {
  position: relative;
  display: inline-block;
  margin-bottom: 5px;
}

.stars-inner {
  position: absolute;
  top: 0;
  left: 0;
  white-space: nowrap;
  overflow: hidden;
  width: 0;
}

.stars-outer::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  color: #ccc;
}

.stars-inner::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  color: #f8ce0b;
}

</style>
@stop
@section('main') 
  <div class="container" style="margin-top: 50px">
      @include('error.note')
        	<div class="row">
               <div class="col-xs-5 item-photo">
                    <img style="max-width:100%;width: 250px" src="{{asset('public/Hinh/'.$products->image)}}" />
                </div>
                <div class="col-xs-7" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3>{!!$products->name!!}</h3>    
                   
        			<?php
        			 $age = 0;
                     $star = 0;
                      if($products->pro_total_rating)
                      {
                        $age = round($products->pro_total_number / $products->pro_total_rating,1);
                        $star = ($age / 5)*100;
                      }
        			?>
                    <!-- Precios -->
                   <div class="stars-outer">
            			<div class="stars-inner" style="width: {{$star}}%"></div>
         		   </div>
          <span class="number-rating">{{$age}}</span>
                    <h3 style="margin-top:0px;">{!!number_format($products->price,0,',','.') !!}đ</h3>
        
                    <!-- Detalles especificos del producto -->
                   
                    <div class="section" style="padding-bottom:5px;">
                       {!!$products->description!!}
                    </div>   
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>Số lượng</small></h6>                    
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input value="1" />
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>
                    </div>                
        
                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                        <a href="{{asset('cart/add/'.$products->id)}}" class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Thêm Vào Giỏ</a>
                        <h6><a href="#"><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span>Thích</a></h6>
                    </div>                                        
                </div>                              
        
                <div class="col-md-12 col-md-push-0">
                    <ul class="menu-items">
                        <li class="active">Chi tiết sản phẩm</li>
                        
                    </ul>
                    <div style="width:100%;border-top:1px solid silver">
                        <small>
                            <ul>
                                <li>Super AMOLED capacitive touchscreen display with 16M colors</li>
                                <li>Available on GSM, AT T, T-Mobile and other carriers</li>
                                <li>Compatible with GSM 850 / 900 / 1800; HSDPA 850 / 1900 / 2100 LTE; 700 MHz Class 17 / 1700 / 2100 networks</li>
                                <li>MicroUSB and USB connectivity</li>
                                <li>Interfaces with Wi-Fi 802.11 a/b/g/n/ac, dual band and Bluetooth</li>
                                <li>Wi-Fi hotspot to keep other devices online when a connection is not available</li>
                                <li>SMS, MMS, email, Push Mail, IM and RSS messaging</li>
                                <li>Front-facing camera features autofocus, an LED flash, dual video call capability and a sharp 4128 x 3096 pixel picture</li>
                                <li>Features 16 GB memory and 2 GB RAM</li>
                                <li>Upgradeable Jelly Bean v4.2.2 to Jelly Bean v4.3 Android OS</li>
                                <li>17 hours of talk time, 350 hours standby time on one charge</li>
                                <li>Available in white or black</li>
                                <li>Model I337</li>
                                <li>Package includes phone, charger, battery and user manual</li>
                                <li>Phone is 5.38 inches high x 2.75 inches wide x 0.13 inches deep and weighs a mere 4.59 oz </li>
                            </ul>  
                        </small>
                    </div>
                </div>		
            </div>
            <div class="component_rating" style="margin-bottom: 20px;">
            	<h3>Đánh Giá SẢn Phẩm</h3>
            <div class="component_rating_content" style="display: flex;align-items: center;position: relative;border-radius: 5px;border: 1px solid #dedede">
            	<div class="rating_item" style="width: 20%">
            		<span class="fa fa-star" style="font-size: 100px;color: #fd9727;display: block;text-align: center;margin: 0 auto">
            		</span>
            		<b style="top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);position: absolute;color: white;font-size: 20px">{{$age}}
            		</b>
            	</div>
            		<div class="list_rating" style="width: 60%;padding: 20px">
            			@foreach($arrayrating as $key => $arrayrating)
            			<?php
            			$itemage = round(($arrayrating['total'] / $products->pro_total_rating)*100);
            			?>
            	<div class="item_rating" style="display: flex;align-items: center;">
            			<div style="width: 10%">
            					{{$key}}<span class="fa fa-star"></span>	
            			</div>
            			<div style="width: 70%;margin:0 20px">
            				 <span style="width: 100%;height: 8px;display: block;border: 1px solid #dedede;border-radius: 5px;background-color: #e9e9e9">
            				 	<b style="width: {{$itemage}}%;background-color: #fd9727;display: block;border-radius: 5px;height: 100%">
            				 	</b>
            				 </span>
            			</div>
            			<div style="width: 20%">
            					<a href="">{{$arrayrating['total']}} Đánh giá ({{$itemage}}%)</a>
            			</div>
            			</div>
            			@endforeach
            		</div>
            	<div style="width: 20%">
            			<a class="js_rating_action open_button" href="">Gửi Đánh Giá</a>
            	</div>
            	
            </div>
          <div class="form_rating hidden">
          	  <div style="display: flex;margin-top: 15px">
            		<p style="margin-bottom: 0px">Chọn Đánh giá</p>
            		<span style="margin: 0 15px;font-size: 15px" class="list_star">
            			@for($i=1;$i<=5;$i++)
            			<i class="fa fa-star" data-key="{{$i}}"></i>
            			@endfor
            		</span>
            		<span class="list_text">Tốt</span>
            		<input type="hidden" value="" class="number_rating">
            </div>
            <div style="margin-top: 15px">
            	<textarea id="ra_content" class="form-control" cols="30" rows="3"></textarea>
            </div>
            <div style="margin-top: 15px">
            	<a href="{{asset('ajax/danh-gia/'.$products->id)}}" class="js_rating_product" style="width: 200px;background-color: #288ad6;padding: 10px;color: white;border-radius: 5px">Gửi đánh giá</a>
            </div>
          </div>
        </div>
            <div class="component_list_rating">
            	@foreach($listrating as $item)
            	<div class="rating_item" style="margin-bottom: 20px">
            		<div>
            			<span>{{$item->user->name}}</span>
            			<a href="" style="color:#2ba832"><i class="fas fa-check"></i>  Đã mua hàng tại web</a>
            		</div>
            		<p style="margin-bottom: 0px">
            			<span>
            				 <div class="stars-outer">
            					<div class="stars-inner" style="width: {{($item->number/5)*100}}%"></div>
         		   			</div>
            			</span>
            			 {{$item->content}}
            			 <div>
            			<span><i class="fas fa-eye"></i>  {{$item->created_at}}</span>
            		</div>
            		</p>
            		</div>
            	@endforeach
            	
            </div>
        </div>    
	@stop
	@section('script') 
	<script type="text/javascript">
		//danh gia
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$(function(){
			let liststar = $(".list_star .fa");
			listratingtext = {
            		1 : 'Không Thích',
            		2 : 'Tạm Được',
            		3 : 'Bình Thường',
            		4 : 'Rất Tốt',
            		5 : 'Tuyệt Vời Quá',
            	}

			liststar.mouseover(function(){
			let $this = $(this);
			let number = $this.attr('data-key');
			$(".number_rating").val(number);
			liststar.removeClass('rating_active')

			$.each(liststar, function(key,value){
				if(key+1 <= number)
				{
					$(this).addClass('rating_active');
				}
			});

			$(".list_text").text('').text(listratingtext[$this.attr('data-key')]).show();
			});
		});
		$(".js_rating_action").click(function(event){
			event.preventDefault();
			if($(".form_rating").hasClass('hidden'))
			{
				$(".js_rating_action").addClass('close_button').removeClass('open_button').text('').text('Đóng')
				$(".form_rating").addClass('active').removeClass('hidden')
			}
			else
			{
				$(".js_rating_action").removeClass('close_button').addClass('open_button').text('').text('Gửi Đánh Giá')
				$(".form_rating").addClass('hidden').removeClass('active')
			}
		});
		$(".js_rating_product").click(function(e){
			event.preventDefault();
			let content = $("#ra_content").val();
			let number = $(".number_rating").val();
			let url = $(this).attr('href');
			if(content && number)
			{
				  $.ajax({
		            url: url,
		            type:"post",
		           	data : {
				 	number : number,
				 	content: content
				 },
		            success:function(data){
		                if(data == "OK")
		                {	
		                	alert("Đánh giá thành công");
		                	location.reload();
		                }
		            },error:function(){ 
		                alert("error!!!!");
		            }
		        });
			}
		});



		

		//giao dien
		   $(document).ready(function(){
            //-- Click on detail
            $("ul.menu-items > li").on("click",function(){
                $("ul.menu-items > li").removeClass("active");
                $(this).addClass("active");
            })

            $(".attr,.attr2").on("click",function(){
                var clase = $(this).attr("class");

                $("." + clase).removeClass("active");
                $(this).addClass("active");
            })

            //-- Click on QUANTITY
            $(".btn-minus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(".section > div > input").val(now);
                }else{
                    $(".section > div > input").val("1");
                }
            })            
            $(".btn-plus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    $(".section > div > input").val(parseInt(now)+1);
                }else{
                    $(".section > div > input").val("1");
                }
            })                        
        }) 
	</script>



@stop