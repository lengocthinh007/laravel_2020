 @extends('User.master')
@section('title','Thông Tin User')
@section('main')
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
   @include('error.note')
 <form method="post" enctype="multipart/form-data">
                <div class="form-group" >
                    <label>Email</label>
                    <input required type="email" name="email" class="form-control"
                    value="{!! old('email',isset($data) ? $data['email'] : null) !!}" 
                    >
                  </div>
                  <div class="form-group" >
                    <label>Họ Tên</label>
                    <input required type="text" name="name" class="form-control" value="{!! old('name',isset($data) ? $data['name'] : null) !!}">
                     @if($errors->has('name'))
                     <span class="err">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="form-group" >
                    <label>Số điện thoại</label>
                    <input required type="number" name="phone" class="form-control" value="{!! old('phone',isset($data) ? $data['phone'] : null) !!}">
                  </div>   
                   <div class="form-group" >
                    <label>Địa Chỉ</label>
                    <input required type="text" name="address" class="form-control" value="{!! old('address',isset($data) ? $data['address'] : null) !!}">
                  </div>             
                  <div class="form-group" >
                    <label>Giới thiệu bản thân</label><br>
                   <textarea required rows="5" cols="96" name="about">{!! old('about',isset($data) ? $data['about'] : null) !!} </textarea>
                   @if($errors->has('review'))
                     <span class="err">{{ $errors->first('review') }}</span>
                    @endif
                  </div>  
                  <button type="submit" class="btn btn-primary">Lưu</button>
                  <a href="#" class="btn btn-danger">Hủy bỏ</a>
             
               {{csrf_field()}}
            </form>
          </div>
@stop