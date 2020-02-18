@extends('frontend.master')
@section('title','Contact')
@section('link') 
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
@stop
@section('main') 
<div class="contact_info">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_1.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Phone</div>
								<div class="contact_info_text">+38 068 005 3570</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_2.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Email</div>
								<div class="contact_info_text">fastsales@gmail.com</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_3.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Address</div>
								<div class="contact_info_text">10 Suffolk at Soho, London, UK</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact Form -->

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title">Get in Touch</div>

						<form enctype="multipart/form-data" method="post" id="contact_form">
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input name="c_name" type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Họ tên" required="required" data-error="Name is required.">
								<input name="c_email" type="text" id="contact_form_email" class="contact_form_email input_field" placeholder="Your email" data-error="Email is required.">
								<input required="" name="c_title" type="text" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Tiêu đề">
							</div>
							<div class="contact_form_text">
								<textarea id="contact_form_message" class="text_field contact_form_message" name="c_content" rows="4" placeholder="Nội dung" data-error="Please, write us a message."></textarea>
							</div>
							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">Gửi</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>

	<!-- Map -->

	<div class="contact_map">
		<div id="google_map" class="google_map">
			<div class="map_container">
				<div id="map"></div>
			</div>
		</div>
	</div>
	@stop
@section('script') 
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<!-- <script src="js/contact_custom.js"></script> -->
	<script type="text/javascript">
	$(document).ready(function(){

		$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

		 $('#contact_form').on('submit', function(event){
			  event.preventDefault();
			  if($('#contact_form_email').val() != '' && $('#contact_form_message').val() != '')
			  {
			   var form_data = $(this).serialize();
			   let url="{{ route('lien-he') }}";
			   $.ajax({
			    url:url,
			    method:"POST",
			    data:form_data,
			    success:function(data)
			    {
			     $('#contact_form')[0].reset();
			    }
			   });
			  }
			  else
			  {
			   alert("Không được để trống");
			  }
		});
	});	
	</script>
@stop