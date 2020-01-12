@extends('Backend.master')
@section('title','Sửa sản phẩm')
@section('link')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="css/image-uploader.min.css">
@stop
@section('main')		
              @include('error.note')
                @include('backend.form.formproduct')
				 <div class="row">
				 	<div class="col-lg-8">
				 		<label>Ảnh Details </label>
                    <div name="image_preview" style=" padding: 5px; border: 1px solid black;">
                    	@if($product_img)
                    	<div style="margin-left: 4%">
							 @foreach($product_img as $key =>$item)
					
						 <div  id="{!! $item['id'] !!}"  style="display:inline; padding: 5px;">
                       <img idHinh="{!! $item['id'] !!}" width="110px" src="{{asset('public/HinhDetails/'.$item['image'])}}">
                       <a data-key="{!! $item['id'] !!}" style="position: relative;top: -50px;left: -40px;font-size: 10px;border-radius: 45px" class="btn btn-danger btn-circle icon_del dell"  href="{{asset('admin/product/delimg/'.$item['id'])}}"><i class="fa fa-times"></i></a>
                       
                  </div>  
					
                  @endforeach
                  </div>
                    	
                    	@else
                    	
								<div style="text-align: center">Chưa có ảnh</div>
                    	
                    	@endif
				</div>
				 	</div>
				 </div>
@stop
@section('script')
<script type="text/javascript" src="js/image-uploader.min.js"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $('.input-images-1').imageUploader();
    
//   $( document ).ready(function() {
//     $("#addimg").click(function () {
//     	$("#insert").append('<div class="form-group" ><input required id="img" type="file" name="img" class="form-control hidden" value="{!! old('img') !!}"><img onlick="changeImg(this)" id="avatar" class="thumbnail thum" width="300px" src="{{asset('public/Hinh/'.$data['image'])}}"></div>');
//     })
// });
//    $( document ).ready(function() {
//     $("a#del").on('click',function () {
//     	var url="http://localhost/toi/admin/product/delimg/";
//     	var _token= $("form[name='formtoken']").find("input[name='_token']").val();
//     	var idHinh = $(this).parent().find("img").attr("idHinh");
//     	var img = $(this).parent().find("img").attr("src");
//     	var rid =$(this).parent().find("img").attr("id");
//     	$.ajax({
//     		url: url=idHinh,
//     		type:'GET',
//     		cache:false,
//     		data:{"_token":_token,"idHinh":idHinh,"urlHinh":img},
//     		success:function(data){
//     			if(data="OK"){
//     				$("#"+rid).remove();
//     			}
//     			else {
//     				alert("Error | please contact admin");
//     			}
//     		}
//     	})
//     })
// });
$(".dell").click(function (e) {
	event.preventDefault();
	let idHinh = $(this).attr('data-key');
	let url = $(this).attr('href');
	var xoa = $(this).parent().find("img").attr("idHinh");
	if(idHinh)
	{
		$.ajax({
  				url: url,
  				type: 'GET',
  				data:{
  					idHinh:idHinh
  				}
		}).done(function(data) {
  				if(data="OK"){
    				$("#"+xoa).remove();
    			}
    			else {
    				alert("Error | please contact admin");
    			}
		});
	}
	})
</script>
@stop