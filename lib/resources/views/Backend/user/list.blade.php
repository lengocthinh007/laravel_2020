@extends('Backend.master')
@section('title','Quản lí thành viên')
@section('main')        
              @include('error.note')
     <div class="panel panel-primary">
          <div class="panel-body">
            <div class="bootstrap-table">
              <div class="table-responsive">
                <a href="{{asset('admin/category/add/')}}" class="btn btn-primary">Thêm danh mục</a>
                <table class="table table-bordered" style="margin-top:20px;">       
                  <thead>
                    <tr class="bg-primary" style="color: white">
                      <th>ID</th>
                      <th width="30%">Tên</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Avatar</th>
                      <th>Avatar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($user))
                    
                    @foreach($user as $item)
                <tr>
                  <td>{!! $item->id !!}</td>
                  <td>{!! $item->name !!}</td>
                  <td>{!! $item->email !!}</td>
                  <td>{!! $item->phone !!}</td> 
                  <td>{!! $item->avatar !!}</td>
                  <td>
                              <a href="{{asset('admin/category/edit/'.$item->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                              <a href="{{asset('admin/category/delete/'.$item->id)}}" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                            </td>
                          </tr>
                       @endforeach
                       @endif
                  </tbody>
                </table>              
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
@stop