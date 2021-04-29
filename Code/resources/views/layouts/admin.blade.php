{{-- This page is the layout for admin dashboard pages, from RTL folder in fedash theme in html->demos, using index page   --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{URL::asset('fedash/assets/media/image/favicon.png')}}"/>

    <!-- Main css -->
    <link rel="stylesheet" href="{{URL::asset('fedash/vendors/bundle.css')}}" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="{{URL::asset('fedash/vendors/datepicker/daterangepicker.css')}}" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="{{URL::asset('fedash/vendors/dataTable/datatables.min.css')}}" type="text/css">

<!-- App css -->
    <link rel="stylesheet" href="{{URL::asset('fedash/assets/css/app.min.css')}}" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="rtl">
<!-- layout-wrapper -->
<div class="layout-wrapper">

    <!-- header -->
    <div class="header d-print-none">
        <div class="logo-wrapper">
            <a href="#" class="navigation-toggler">
                <i class="ti-menu"></i>
            </a>
            <div class="logo">
                <a href='/landingdash'>
                    {{-- <img src="../../assets/media/image/logo.png" alt="logo"> --}}
                    <img src="{{URL::asset('fedash/assets/media/image/five.png')}}" alt="logo" height='130' width="250">
                </a>
            </div>
        </div>
        <div class="header-action-left">
            <div class="header-search-form">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn header-search-close-btn">
                                <i class="ti-close"></i>
                            </button>
                        </div>
                        <div class="input-group-prepend">
                            <button class="btn">
                                <i class="ti-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Profile Icon --}}
        @if(Auth::guard('admin')->check())
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" title="User menu"
               data-toggle="dropdown">
                <figure class="avatar avatar-sm">
                    <img src="{{URL::asset('fedash/assets/media/image/user/ava.png')}}"
                    class="rounded-circle" alt="image">

                    {{-- <img src='{{asset("admin/images")}}/{{Auth::guard('admin')->user()->image}}'
                         class="rounded-circle" alt="image"> --}}
                </figure>
                <span class="ml-2 d-sm-inline d-none">
                    {{Auth::guard('admin')->user()->name}}

                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="/super/singleadmin/ {{Auth::guard('admin')->user()->id}}" class="dropdown-item">
                    <i class="ti-user mr-2"></i> الصفحة الشخصية
                </a>

                <a href="/admin/logout" class="dropdown-item">
                    <i class="ti-arrow-right mr-2"></i> الخروج
                </a>

            </div>
        </li>

        @endif
    </div>
    <!-- ./ header -->

    <!-- content-wrapper -->
    <div class="content-wrapper">

        <!-- navigation -->
        <div class="navigation">
            

            <div class="navigation-menu-body">
                <ul>

                    <li class="navigation-divider">
                        {{-- <h3>الصفحات</h3>--}}</li>
                        <li>
                            <a  href="/landingdash">
                                <span class="nav-link-icon">
                                    <i data-feather="home"></i>
                                </span>
                                <span>الصفحة الرئيسية <span>
                            </a>
                        </li>

                        <li>
                            <a target="_blank" href="/totalcategory">
                                <span class="nav-link-icon">
                                    <i class="ti-menu"></i>
                                </span>
                                <span>فئات المناقشة</span>
                            </a>
                        </li>

                    <li>
                        <a  href="/super/alladmins">
                            <span class="nav-link-icon">
                                <i class="fa fa-user-o"></i>
                            </span>
                            <span>المسؤولين </span>
                        </a>
                    </li>

                    <li>
                        <a  href="/reported">
                            <span class="nav-link-icon">
                                <i class="ti-close"></i>
                            </span>
                            <span>المحادثات المشتكي عليها</span>
                        </a>
                    </li>



                </ul>
            </div>
        </div>
        <!-- ./  navigation -->

        <!-- content-body -->
        <div class="content-body">
            <!-- content -->
            <div class="content ">
                <div class="page-header">
                       <div class="d-md-flex align-items-center justify-content-between">
                             <h3 class="mb-0"> @yield('brief')</h3>
                        </div>
                 </div>

                     @yield('main')
            </div>
        <!-- ./ content -->

            <!-- content-footer -->
            <footer class="content-footer d-print-none">
                <div> منظمة أكزيمتي العربية © 2021- <a href="publicwebsite" target="_blank">أكزيمتي</a></div>

            </footer>
            <!-- ./ content-footer -->

        </div>
        <!-- ./ content-body -->

    </div>
    <!-- ./ content-wrapper -->
</div>
<!-- ./ layout-wrapper -->

<!-- Main scripts -->
<script src="{{URL::asset('fedash/vendors/bundle.js')}}"></script>

    <!-- Apex chart -->
    <script src="{{URL::asset('fedash/vendors/charts/apex/apexcharts.min.js')}}"></script>

    <!-- Daterangepicker -->
    <script src="{{URL::asset('fedash/vendors/datepicker/daterangepicker.js')}}"></script>

    <!-- Dashboard scripts -->
    <script src="{{URL::asset('fedash/assets/js/examples/pages/ecommerce-dashboard.js')}}"></script>

<!-- App scripts -->
<script src="{{URL::asset('fedash/assets/js/app.min.js')}}"></script>
</body>
</html>
