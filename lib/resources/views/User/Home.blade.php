@extends('User.master')
@section('title','Tổng Quang')
@section('main') 
</style>


        <!-- Breadcrumbs-->
  @include('error.note')
        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">26 New Messages!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">{{$totaltransaction}} Đơn Hàng</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">{{$totaltransactiondone}} Đã Xử Lý</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">{{$totaltransaction - $totaltransactiondone}} Chưa Xử Lý</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- Area Chart Example-->

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="margin-top:20px;">       
                  <thead>
                    <tr class="bg-primary" style="color: white">
                      <th>ID</th>
                      <th>Tên khác hàng</th>
                      <th>Địa Chỉ</th>
                      <th>Số điện thoại</th>
                      <th>Tổng tiền</th>
                      <th>Trạng thái</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($Transaction))
                    @foreach($Transaction as $item)
                <tr>
                  <td>{!! $item['id'] !!}</td>
                  <td>{{ isset($item->user->name) ? $item->user->name : 'gdf'}}</td>
                  <td>{!! $item['address'] !!}</td>
                  <td>{!! $item['phone'] !!}</td>
                  <td>{!! $item['total'] !!}</td>
                  <td>@if($item['status'] ==1)
                   <a href="{{asset('admin/transaction/')}}" class="badge badge-primary"> Đã xử lý</a>
                    @else
                    <a href="{{asset('admin/transaction/active/'.$item['id'])}}" class="badge badge-warning">Chưa xử lý</a>
                    @endif
                  </td>
                   <td>{{$item['created_at']->format('d-m-Y')}}</td>
                          </tr>
                       @endforeach
                       @endif
                  </tbody>
                </table>   
               
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

    
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
    

  
@stop
@section('script') 
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

@stop