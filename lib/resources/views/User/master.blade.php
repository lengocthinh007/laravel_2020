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
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">{{get_data_user('admin','name')}}</a>
          <a class="dropdown-item" href="#">Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Đăng xuất</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{asset('User/home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span class="{{\Request::route()->getName()=='User.home'?'acti':''}}">Tổng Quang</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        
       
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{asset('User/infor')}}">
          <i class="fas fa-fw fa-folder"></i>
          <span 
          class="{{\Request::route()->getName()=='User.infor'?'acti':''}}" >
            Thông Tin
        </span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{asset('User/password')}}">
          <i class="fas fa-fw fa-table"></i>
          <span class="{{\Request::route()->getName()=='User.password'?'acti':''}}">Password</span></a>
      </li>
    </ul>
    <div id="content-wrapper">

      <div class="container-fluid">
       @if(get_data_user('web','active')==1)
        <p class="alert alert-danger">Tài khoản của bạn chưa kích hoạt. Hãy check địa chỉ email của bạn để kích hoạt</p>
        @endif
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
          <a class="btn btn-primary" href="{{asset('dang-xuat')}}">Logout</a>
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
  @yield('script')
</body>

</html>
