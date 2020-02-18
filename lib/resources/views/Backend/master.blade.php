<!DOCTYPE html>
<html lang="en">

<head>
<base href="{{asset('public/backend')}}/">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/mystyle.css" rel="stylesheet">
  @yield('link')
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Admin</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    
    </form>

    <!-- Navbar -->
   <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger"></span>
        </a>
        <div style="width: 400px;height: 100px;height: 350px;
    overflow-y: scroll;" class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
         
          <h5 style="text-align: center;"> Tin mới</h5>
          <ul class="list-group drop-mess">
            
          </ul>
</div>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">{{get_data_user('admin','name')}}</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{asset('admin/home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        
       
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{asset('admin/category')}}">
          <i class="fas fa-fw fa-folder"></i>
          <span 
          class="{{\Request::route()->getName()=='admin.cate.list'?'acti':''}}" >
              Quản lí Danh Mục
        </span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{asset('admin/product')}}">
          <i class="fas fa-fw fa-table"></i>
          <span class="{{\Request::route()->getName()=='admin.cate.pro'?'acti':''}}">Quản lí Sản phẩm</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{asset('admin/transaction')}}">
          <i class="fas fa-fw fa-table"></i>
          <span class="{{\Request::route()->getName()=='admin.transaction.index'?'acti':''}}">Quản lí đơn hàng</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{asset('admin/user')}}">
          <i class="fas fa-fw fa-table"></i>
          <span class="{{\Request::route()->getName()=='admin.user.index'?'acti':''}}">Quản lí thành viên</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{asset('admin/kho')}}">
          <i class="fas fa-fw fa-table"></i>
          <span class="{{\Request::route()->getName()=='kho'?'acti':''}}">Kho</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>

        <!-- Page Content -->
      
          @yield('main')
       

     
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->


    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{asset('Admin/logout')}}">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <script src="js/myscript.js"></script>
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
       function load_unseen_notification(view = '')
     {
        let url="{{ route('notify') }}";
        $.ajax({
         url:url,
         method:"POST",
         data:{view:view},
         dataType:"json",
         success:function(data)
         { 
          var html = '';
                 if(data.notification!='')
                   {
                    $.each (data.notification, function (key, item){
                            html +=  '<li><a href="fdfd" class="list-group-item list-group-item-action flex-column align-items-start">';
                            html +='<div class="d-flex w-100 justify-content-between">';
                            html +='<h6 class="mb-1">'+item['name']+'</h6>';
                            html +='<small class="text-muted">'+item['created_at']+'</small>';
                            html +='</div>';
                            html +='<p class="mb-1">'+item['title']+'</p>';
                            html +='</a></li>';
                          });
                   }
                   else
                   {
                     html +=  '<li class="list-group-item list-group-item-action flex-column align-items-start">Không có tin nhắn</li>';
                   }
          $('.drop-mess').html(html);
          if(data.unseen_notification > 0)
              {
               $('.count').html(data.unseen_notification);
              }
          else
              {
                 $('.count').html('');
              }
          }//endsuccess
         });
      }; 

        load_unseen_notification();

         $(document).on('click', '#messagesDropdown', function(){
            $('.count').html('');
            load_unseen_notification('yes');
         });
        
         setInterval(function(){ 
            load_unseen_notification();; 
            }, 5000);
        });
  </script>
  @yield('script')
</body>

</html>
