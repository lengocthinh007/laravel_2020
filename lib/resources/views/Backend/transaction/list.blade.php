@extends('Backend.master')
@section('title','Quản lí đơn hàng')
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
                      <th width="30%">Tên khác hàng</th>
                      <th>Số điện thoại</th>
                      <th>Tổng tiền</th>
                      <th>Trạng thái</th>
                      <th>Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($transaction))
                    @foreach($transaction as $item)
                <tr>
                  <td>{!! $item['id'] !!}</td>
                  <td>{{ isset($item->user->name) ? $item->user->name : 'gdf'}}</td>
                  <td>{!! $item['phone'] !!}</td>
                  <td>{!! $item['total'] !!}</td>
                  <td>@if($item['status'] ==1)
                   <a href="{{asset('admin/transaction/')}}" class="badge badge-primary"> Đã xử lý</a>
                    @else
                    <a href="{{asset('admin/transaction/active/'.$item['id'])}}" class="badge badge-warning">Chưa xử lý</a>
                    @endif
                  </td>
                  <td>
                              <a href="{{asset('admin/transaction/view'.$item['id'])}}" data-key="{{$item['id']}}" class="btn btn-warning js_order_item"><span class="glyphicon glyphicon-edit"></span> Xem</a>
                              <a href="{{asset('admin/category/delete/'.$item['id'])}}" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
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
        <div class="modal fade" id="myModalorder" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title" style="float: left">Chi tiết đơn hàng có mã #<b class="transaction_id"></b></h4>
        </div>
        <div class="modal-body" id="md_content">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
      </div>
      
    </div>
  </div>
@stop
@section('script')
<script type="text/javascript">
  $(function(){
    $('.js_order_item').click(function(event){
      event.preventDefault();
      let $this = $(this);
      let url = $this.attr('href');
      $("#md_content").html('');
      $(".transaction_id").text('').text($this.attr('data-key'));
      $("#myModalorder").modal('show');
     $.ajax({
        url: url,
      }).done(function(result) {
        if(result)
        {
          $("#md_content").append(result);
        }
      });
    }); 
  });
</script>        
@stop