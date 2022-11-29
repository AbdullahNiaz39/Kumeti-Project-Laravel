<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <title>Kumeti</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="" />
      <meta name="keywords" content="">
      <meta name="author" content="" />

      <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/waves.min.css')}}" type="text/css" media="all">
      <link rel="stylesheet" type="text/css" href="{{asset('admin/css/feather.css')}}">
      <link type="text/css" rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('admin/css/font-awesome-n.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('admin/css/widget.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('admin/css/datatables.min.css')}}"/>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
      @yield('css')
   </head>
   <body>
    <div class="loader-bg" style="display: none;">
        <div class="loader-bar"></div>
     </div>
     <div id="pcoded" class="pcoded iscollapsed" nav-type="st2" theme-layout="vertical" vertical-placement="left" vertical-layout="wide" pcoded-device-type="desktop" vertical-nav-type="expanded" vertical-effect="shrink" vnavigation-view="view1">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
           <nav class="navbar header-navbar pcoded-header iscollapsed" header-theme="themelight1" pcoded-header-position="fixed">
              <div class="navbar-wrapper">
                 <div class="navbar-logo" logo-theme="theme6">
                    <a href="#">
                    Kumeti
                    </a>

                    <a class="mobile-options waves-effect waves-light">
                    <i class="feather icon-more-horizontal"></i>
                    </a>
                 </div>
                 <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                       <li class="header-search">
                          <div class="main-search morphsearch-search">
                             <div class="input-group">
                                <span class="input-group-prepend search-close">
                                <i class="feather icon-x input-group-text"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Enter Keyword">
                                <span class="input-group-append search-btn">
                                <i class="feather icon-search input-group-text"></i>
                                </span>
                             </div>
                          </div>
                       </li>

                    </ul>
                    <ul class="nav-right">
                       <li class="user-profile header-notification">
                          <div class="dropdown-primary dropdown">
                             <div class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{asset('admin/images/avatar-4.jpg')}}" class="img-radius" alt="User-Profile-Image">
                                @if (session()->has('USER_NAME'))
                                <span>{{ session('USER_NAME') }}</span>
                                @endif

                                <i class="feather icon-chevron-down"></i>
                             </div>
                             <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                <li>
                                   <a href="{{url('/logout')}}">
                                   <i class="feather icon-log-out"></i> Logout
                                   </a>
                                </li>
                             </ul>
                          </div>
                       </li>
                    </ul>
                 </div>
              </div>
           </nav>


           <div class="pcoded-main-container" style="margin-top: 52px;">
              <div class="pcoded-wrapper">
                 <div class="main-sidebar main-sidebar-sticky side-menu ps ps--active-y">

                    <div class="main-sidebar-body">
                       <ul class="nav">
                        <li class="nav-item @yield('dashboard')"> <a class="nav-link" href="{{url('dashboard')}}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon feather icon-home"></i><span class="sidemenu-label">Dashboard</span></a> </li>
                            <li class="nav-item @yield('users')"> <a class="nav-link" href="{{url('users')}}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon feather icon-users"></i><span class="sidemenu-label">Users</span></a> </li>
                            <li class="nav-item @yield('kumeti_defination')"> <a class="nav-link" href="{{url('kumeti_defination')}}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon feather fa fa-book"></i><span class="sidemenu-label">Kumeti Defination</span></a> </li>
                            <li class="nav-item @yield('members_list')"> <a class="nav-link" href="{{url('members_list')}}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon feather fa fa-list"></i><span class="sidemenu-label">Members List</span></a> </li>
                            <li class="nav-item @yield('kumeti_member_registration')"> <a class="nav-link" href="{{url('kumeti_member_registration')}}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon feather fa fa-user-plus"></i><span class="sidemenu-label">Kumeti Member Registration</span></a> </li>
                            <li class="nav-item @yield('recovery')"> <a class="nav-link" href="{{url('recovery')}}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon feather fa fa-sync"></i><span class="sidemenu-label">Recovery</span></a> </li>
                            <li class="nav-item @yield('return_kumeti')"> <a class="nav-link" href="{{url('return_kumeti')}}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon feather fa fa-undo"></i><span class="sidemenu-label">Return Kumeti</span></a> </li>
                            <li class="nav-item @yield('reports')"> <a class="nav-link" href="{{url('reports')}}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon feather fa fa-clipboard"></i><span class="sidemenu-label">Reports</span></a> </li>
                            <li class="nav-item @yield('city')"> <a class="nav-link" href="{{url('city')}}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon feather fa fa-building"></i><span class="sidemenu-label">City</span></a> </li>
                         </ul>
                    </div>
                 </div>

                    @yield('main');

                 <div id="styleSelector"></div>
              </div>
           </div>
        </div>
     </div>


   <!-- popup service setup -->


      {{-- <script type="ee45905e6a603b8806b7bf74-text/javascript" src="{{asset('admin/js/jquery.min.js')}}"></script> --}}
      <script type="ee45905e6a603b8806b7bf74-text/javascript" src="{{asset('admin/jquery-ui.min.js')}}"></script>
      <script type="ee45905e6a603b8806b7bf74-text/javascript" src="{{asset('admin/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('admin/js/pcoded.min.js')}}" type="ee45905e6a603b8806b7bf74-text/javascript"></script>
      <script src="{{asset('admin/js/vertical-layout.min.js')}}" type="ee45905e6a603b8806b7bf74-text/javascript"></script>
      <script type="ee45905e6a603b8806b7bf74-text/javascript" src="{{asset('admin/js/script.min.js')}}"></script>
      <script src="{{asset('admin/js/rocket-loader.min.js')}}" data-cf-settings="ee45905e6a603b8806b7bf74-|49" defer=""></script>
      <script src="{{asset('admin/js/jquery.min.js')}}"></script>

      <script src="{{asset('admin/js/custom.js')}}"></script>



      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
      <script>
         $('.myselect').select2();
       </script>
<script type="text/javascript" src="{{asset('admin/js/datatables.min.js')}}"></script>
@stack('scripts')

</body>
</html>
