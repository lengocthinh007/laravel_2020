@extends('Backend.master')
@section('title','Danh mục sản phẩm')
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
                      <th width="30%">Name</th>
                      <th>Category Parent</th>
                      <th>Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $cate)
                <tr>
                  <td>{!! $cate["id"] !!}</td>
                  <td>{!! $cate["name"] !!}</td>
                  <td>@if($cate["parent_id"] ==0)
                    {!! "None" !!}
                    @else
                    <?php
                        $parent = DB::table('cates')->where('id',$cate['parent_id'])->first();
                        echo $parent->name;
                    ?>
                    @endif
                  </td>
                  <td>
                              <a href="{{asset('admin/category/edit/'.$cate['id'])}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                              <a href="{{asset('admin/category/delete/'.$cate['id'])}}" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
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