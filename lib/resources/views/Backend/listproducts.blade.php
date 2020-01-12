@extends('Backend.master')
@section('title','Danh sách sản phẩm')
@section('main')        
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
                      <th width="30%">Name</th>
                      <th>Price</th>
                      <th>Date</th>
                       <th>Trạng Thái</th>
                       <th>Nổi Bật</th>
                       <th>Cate</th>
                      <th>Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $stt=0 ?>
                    @foreach($data as $pro)
                    <?php $stt= $stt + 1 ?>
                <tr>
                  <td>{!! $stt !!}</td>
                  <td>{!! $pro->name !!}</td>
                  <td>{!! number_format($pro->price),0,",","." !!}VNĐ</td>
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