@extends('Backend.master')
@section('title','Danh sách sản phẩm')
@section('main')
<style type="text/css">
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
              @include('error.note')
               <div class="row">
                	<div class="col-sm-12">
                		<form action="" class="form-inline" style="margin-bottom: 15px">
                			<div class="form-group">
                				<input type="text" class="form-control" placeholder="Tên sản phẩm ..." name="name" value="{{\Request::get('name')}}">
                			</div>
                			<div class="form-group">
                				<select name="cate" id="" class="form-control">
                					<option value="">Danh mục</option>
                					<?php cate_parent($cate,0,"--",\Request::get('cate')); ?>
                				</select>
                				<button type="submit" style="border:0.5px solid #C0C0C0" class="btn btn-default"> <i class="fa fa-search"></i> </button>
                			</div>
                		</form>
                	</div>
                </div>
     <div class="panel panel-primary">
          <div class="panel-body">
            <div class="bootstrap-table">
              <div class="table-responsive">
                <a href="{{asset('admin/product/add/')}}" class="btn btn-primary">Thêm sản phẩm</a>
                <table class="table table-bordered" style="margin-top:20px;">       
                  <thead>
                    <tr class="bg-primary" style="color: white">
                      <th>ID</th>
                      <th width="30%">Tên</th>
                      <th>Hình</th>
                      <th>Thời gian</th>
                       <th>Trạng Thái</th>
                       <th>Nổi Bật</th>
                       <th>Danh mục</th>
                      <th>Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $stt=0 ?>
                    @foreach($data as $pro)
                    <?php $stt= $stt + 1;
                      $age = 0;
                      $star=0;
                      if($pro->pro_total_rating)
                      {
                        $age = round($pro->pro_total_number / $pro->pro_total_rating,1);
                        $star = ($age / 5)*100;
                      }
                    ?>
                <tr>
                  <td>{!! $stt !!}</td>
                  <td>
                        {!! $pro->name !!}
                    <ul style="margin:0px;list-style: none">
                      <li><span>Giá {!!number_format($pro->price,0,',','.') !!}(đ)</i></span></li>
                      <li><span>KM {!! $pro->pro_sale !!}(%)</i></span></li>
                      <li style="margin-top: 0px"><span>Số lượng: {{$pro->pro_number}}</span></li>
                      <li><span>Đánh Giá</span>
                         <div class="stars-outer">
                            <div class="stars-inner" style="width:{{$star}}%"></div>
                        </div>
                      <span class="number-rating">{{$age}}</span>
                    </li>
                   
                    </ul>
                  </td>
                  <td><img src="{{asset('public/Hinh/'.$pro->image)}}" width="100px"></td>
                  <td>
                    {!! \Carbon\Carbon::createFromTimeStamp(strtotime($pro->created_at))->diffForHumans() !!}
                  </td>
                  <td>
                    <a href="{{ route('admin.product.action',['active',$pro->id]) }}" class="badge {{ $pro->getstatus($pro->pro_active)['class']}}">{{ $pro->getstatus($pro->pro_active)['name']}}</a>
                  </td>
                  <td>
                    <a href="{{ route('admin.product.action',['hot',$pro->id]) }}" class="badge {{ $pro->gethot($pro->pro_hot)['class']}}">{{ $pro->gethot($pro->pro_hot)['name']}}</a>
                  </td>
                  <td>
                    <?php
                        $parent = DB::table('cates')->where('id',$pro->cate_id)->first();
                        echo $parent->name;
                    ?>
                  </td>
                  <td>
                              <a href="{{asset('admin/product/edit/'.$pro->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                              <a href="{{asset('admin/product/delete/'.$pro->id)}}" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                            </td>
                          </tr>
                       @endforeach
                  </tbody>
                </table>              
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
@stop