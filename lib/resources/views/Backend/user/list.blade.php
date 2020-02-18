@extends('Backend.master')
@section('title','Quản lí thành viên')
@section('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/fontawesome.min.css" />
@stop
@section('main')        
              @include('error.note')
               <div class="row">
                  <div class="col-sm-12">
                    <form action="" class="form-inline" style="margin-bottom: 15px">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Tìm Kiếm..." name="name" value="{{\Request::get('name')}}" id="serach">
                      </div>
                    </form>
                  </div>
                </div>
     <div class="panel panel-primary">
          <div class="panel-body">
            <div class="bootstrap-table">
              <div class="table-responsive">
                <table class="table table-bordered" style="margin-top:20px;">       
                  <thead>
                    <tr class="bg-primary" style="color: white">
                      <th 
                         class="sorting" data-sorting_type="desc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"><i style=" font-size: 1.1em;" class="fas fa-caret-down"></i></span>
                      </th>
                      <th 
                         width="30%" class="sorting" data-sorting_type="asc" data-column_name="name" style="cursor: pointer">Tên <span id="name_icon"></span>
                      </th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Avatar</th>
                      <th>Active</th>
                    </tr>
                  </thead>
                  <tbody>
                    @include('Backend.user.pagination_data')
                  </tbody>
                </table>        
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />      
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
@stop
@section('script')
<script type="text/javascript">
$(document).ready(function(){
  function clear_icon()
 {
  $('#id_icon').html('');
  $('#name_icon').html('');
 }

   function fetch_data(page, sort_type, sort_by, query='')
     {
      $.ajax({
       url:"../../admin/user/pagination/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
       success:function(data)
       {
        console.log(data)
        $('tbody').html('');
        $('tbody').html(data);
       }
      })
     }

    $(document).on('keyup', '#serach', function(){
      var query = $('#serach').val();
      var column_name = $('#hidden_column_name').val();
      var sort_type = $('#hidden_sort_type').val();
      var page = 1;
      fetch_data(page, sort_type, column_name, query);
     });

    $(document).on('click', '.sorting', function(){
      var column_name = $(this).data('column_name');
      var order_type = $(this).data('sorting_type');
      var reverse_order = '';
      if(order_type == 'asc')
      {
       $(this).data('sorting_type', 'desc');
       reverse_order = 'desc';
       clear_icon();
       $('#'+column_name+'_icon').html('<i style=" font-size: 1.1em;" class="fas fa-caret-down"></i>');
      }
      if(order_type == 'desc')
      {
       $(this).data('sorting_type', 'asc');
       reverse_order = 'asc';
       clear_icon();
       $('#'+column_name+'_icon').html('<i style=" font-size: 1.1em;" class="fas fa-caret-up"></i>');
      }
      $('#hidden_column_name').val(column_name);
      $('#hidden_sort_type').val(reverse_order);
      var page = $('#hidden_page').val();
      var query = $('#serach').val();
      fetch_data(page, reverse_order, column_name, query);
     });

    $(document).on('click', '.pagination a', function(event){
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      $('#hidden_page').val(page);
      var column_name = $('#hidden_column_name').val();
      var sort_type = $('#hidden_sort_type').val();

      var query = $('#serach').val();

      // $('li').removeClass('active');
      //       $(this).parent().addClass('active');
      fetch_data(page, sort_type, column_name, query);
     });
});
</script>
@stop 