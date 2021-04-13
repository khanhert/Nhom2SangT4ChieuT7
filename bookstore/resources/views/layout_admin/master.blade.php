<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{URL::asset('storage/css_js_image_admin/')}}/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{URL::asset('storage/css_js_image_admin/')}}/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{URL::asset('storage/css_js_image_admin/')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{URL::asset('storage/css_js_image_admin/')}}/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="{{url('/')}}"><img src="{{URL::asset('storage/css_js_image_admin/')}}/image/logo.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="{{url('/')}}"><img src="{{URL::asset('storage/css_js_image_admin/')}}/image/logo.png" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
         
          <li class="nav-item dropdown mr-4">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="mdi mdi-information mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="mdi mdi-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="mdi mdi-account-box mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            
              <span class="nav-profile-name">{{Session::get('admin')->ho_nguoi_dung}}{{Session::get('admin')->ten_nguoi_dung}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             
              <a href="{{url('/admin/logout')}}" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/Home')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Trang Chủ</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/them-sach')}}">
              <img src="{{URL::asset('storage/icon/add_to_photos-black-18dp.svg')}}" />
              &nbsp;
              &nbsp;
              &nbsp;
              <span class="menu-title">Thêm Sách</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/ds-tg')}}">
            <img src="{{URL::asset('storage/icon/bubble_chart-black-18dp.svg')}}" />

              
              &nbsp;
              &nbsp;
              &nbsp;
              
              <span class="menu-title">Danh Sách Tác Giả  </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/ds-nxb')}}">
            <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Danh Sách Nhà Xuất Bản </span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/kho-sach')}}" >
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Kho</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/them-tg')}}">
            <img src="{{URL::asset('storage/icon/person_add-black-18dp.svg')}}" />
            &nbsp;
              &nbsp;
              &nbsp;
              <span class="menu-title">Thêm Tác Giả</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/them-nxb')}}">
            <img src="{{URL::asset('storage/icon/group_add-black-18dp.svg')}}" />
            &emsp;
              &nbsp;
              <span class="menu-title">Thêm Nhà Xuất Bản </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Tài Khoản Khách Hàng</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/ds-kh')}}"> Danh Sách Tài Khoản </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/ds-kh-vip')}}">Danh Sách Khách Hàng Vip</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/ds-don-hang')}}">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Danh sách Đơn Hàng </span>
            </a>
          </li>
          </li>
        
        </ul>
      </nav>
     @yield('content')
    </div>
    </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{URL::asset('storage/css_js_image_admin/')}}/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{URL::asset('storage/css_js_image_admin/')}}/vendors/chart.js/Chart.min.js"></script>
  <script src="{{URL::asset('storage/css_js_image_admin/')}}/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{URL::asset('storage/css_js_image_admin/')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{URL::asset('storage/css_js_image_admin/')}}/js/off-canvas.js"></script>
  <script src="{{URL::asset('storage/css_js_image_admin/')}}/js/hoverable-collapse.js"></script>
  <script src="{{URL::asset('storage/css_js_image_admin/')}}/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{URL::asset('storage/css_js_image_admin/')}}/js/dashboard.js"></script>
  <script src="{{URL::asset('storage/css_js_image_admin/')}}/js/data-table.js"></script>
  <script src="{{URL::asset('storage/css_js_image_admin/')}}/js/jquery.dataTables.js"></script>
  <script src="{{URL::asset('storage/css_js_image_admin/')}}/js/dataTables.bootstrap4.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  @yield('script')
  <!-- End custom js for this page-->
</body>

</html>

