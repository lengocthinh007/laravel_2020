@extends('Backend.master')
@section('title','Thêm sản phẩm')
@section('link')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="css/image-uploader.min.css">
@stop
@section('main')		
              @include('error.note')
	          @include('backend.form.formproduct')
@stop
@section('script')
<script type="text/javascript" src="js/image-uploader.min.js"></script>
<script type="text/javascript">
  $('.input-images-1').imageUploader();
</script>
@stop