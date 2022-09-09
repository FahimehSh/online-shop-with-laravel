<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>فروشگاه اینترنتی - @yield('page-title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>

    <!-- v4.0.0-alpha.6 -->
    <link rel="stylesheet" href="{{asset('/dashboardStyle/dist/bootstrap/css/bootstrap.min.css')}}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/dashboardStyle/dist/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/dashboardStyle/dist/css/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/dashboardStyle/dist/css/et-line-font/et-line-font.css')}}">
    <link rel="stylesheet" href="{{asset('/dashboardStyle/dist/css/themify-icons/themify-icons.css')}}">

    <!-- Chartist CSS -->
    <link rel="stylesheet" href="{{asset('/dashboardStyle/dist/plugins/chartist-js/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('/dashboardStyle/dist/plugins/chartist-js/chartist-plugin-tooltip.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{route('main')}}" class="logo blue-bg" style="background-color: gold">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><img src="dist/img/logo-n.png" alt=""></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">فروشگاه آنلاین</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar blue-bg navbar-static-top" style="background-color: darkblue">
            <!-- Sidebar toggle button-->
            <ul class="nav navbar-nav pull-left">
                <li><a class="sidebar-toggle" data-toggle="push-menu" href=""></a></li>
            </ul>
            <div class="pull-right search-box">
                <form action="#" method="get" class="search-form">
                    <div class="input-group">
            <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat" style="background-color: Gold">
                <i class="fa fa-search text-black"></i>
            </button>
            </span>
                        <input name="search" class="form-control" placeholder="Search..." type="text"
                               style="background-color: Gold">
                    </div>
                </form>
                <!-- search form --> </div>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i
                                class="fa fa-envelope-o"></i>
                            <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 new messages</li>
                            <li>
                                <ul class="menu">
                                    <li><a href="#">
                                            <div class="pull-left"><img src="dist/img/img1.jpg" class="img-circle"
                                                                        alt="User Image"> <span
                                                    class="profile-status online pull-right"></span></div>
                                            <h4>Alex C. Patton</h4>
                                            <p>I've finished it! See you so...</p>
                                            <p><span class="time">9:30 AM</span></p>
                                        </a></li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i
                                class="fa fa-bell-o"></i>
                            <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Notifications</li>
                            <li>
                                <ul class="menu">
                                    <li><a href="#">
                                            <div class="pull-left icon-circle red"><i class="icon-lightbulb"></i></div>
                                            <h4>Alex C. Patton</h4>
                                            <p>I've finished it! See you so...</p>
                                            <p><span class="time">9:30 AM</span></p>
                                        </a></li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">Check all Notifications</a></li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu p-ph-res">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown">
                            <span class="fa fa-user-o"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('personal-info')}}"><i class="icon-profile-male"></i>حساب کاربری</a>
                            </li>
                            <li><a href="#"><i class="icon-envelope"></i>لیست پیام ها</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="icon-gears"></i>تنظیمات</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('logout')}}"><i class="fa fa-power-off"></i>خروج</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('cart.items')}}">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <div class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="image text-center"><img src="{{$user_pic}}" class="img-circle" alt="User Image"></div>
                <div class="info">
                    <h5 class="text-primary font-weight-bold">{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}</h5>
                </div>
            </div>

            @yield('sidebar-menu')
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

    </div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('/dashboardStyle/dist/js/jquery.min.js')}}"></script>

<!-- v4.0.0-alpha.6 -->
<script src="{{asset('/dashboardStyle/dist/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- template -->
<script src="{{asset('/dashboardStyle/dist/js/niche.js')}}"></script>

<!-- Chartjs JavaScript -->
<script src="{{asset('/dashboardStyle/dist/plugins/chartjs/chart.min.js')}}"></script>
<script src="{{asset('/dashboardStyle/dist/plugins/chartjs/chart-int.js')}}"></script>

<!-- Chartist JavaScript -->
<script src="{{asset('/dashboardStyle/dist/plugins/chartist-js/chartist.min.js')}}"></script>
<script src="{{asset('/dashboardStyle/dist/plugins/chartist-js/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('/dashboardStyle/dist/plugins/functions/chartist-init.js')}}"></script>
</body>
</html>
