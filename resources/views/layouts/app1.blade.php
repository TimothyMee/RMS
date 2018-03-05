
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="RMS, Result Management System">
    <meta name="keywords" content="RMS, Result Management System, Timothy, Timothy-mee">
    <title>RMS | Register</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    {{--<link href="/css/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css"/>--}}
    <link rel="stylesheet" href="/css/fonts.googleapis.com/icone91f.css?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Material Design Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--bootstrap -->
    <link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="/plugins/material/material.min.css">
    <link rel="stylesheet" href="/css/material_style.css">
    <!-- Theme Styles -->
    @if(session('theme') == 0)
        <link href="/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
        <link href="/css/theme/light/style.css" rel="stylesheet" type="text/css" />
        <link href="/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
    @elseif(session('theme') == 1)
        <link href="/css/theme/dark/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
        <link href="/css/theme/dark/style.css" rel="stylesheet" type="text/css" />
        <link href="/css/theme/dark/theme-color.css" rel="stylesheet" type="text/css" />
    @endif
    <link href="/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="/css/pages/formlayout.css" rel="stylesheet" type="text/css" />
    <!-- inbox style -->
    <link href="/css/pages/inbox.min.css" rel="stylesheet" type="text/css" />
    <!-- favicon -->
    {{--<link rel="shortcut icon" href="../assets/img/favicon.ico" />--}}
</head>
<!-- END HEAD -->
@if(session('theme') == 0)
 <body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
@elseif(session('theme') == 1)
 <body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-dark dark-sidebar-color logo-dark dark-theme">
@endif
    <div class="page-wrapper">
    <!-- start header -->
    <div class="page-header navbar navbar-fixed-top">
        <div class="page-header-inner ">
            <!-- logo start -->
            <div class="page-logo">
                <a href="{{route('home')}}">
                    <span class="logo-icon material-icons fa-rotate-50">school</span>
                    <span class="logo-default" >RMS</span> </a>
            </div>
            <!-- logo end -->
            <ul class="nav navbar-nav navbar-left in">
                <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
            </ul>
            {{--<form class="search-form-opened" action="#" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." name="query">
                    <span class="input-group-btn">
                          <a href="javascript:;" class="btn submit">
                             <i class="icon-magnifier"></i>
                           </a>
                        </span>
                </div>
            </form>--}}

            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- start message dropdown -->
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge headerBadgeColor2"> 2 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3><span class="bold">Messages</span></h3>
                                <span class="notification-label cyan-bgcolor">New 2</span>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                                    <li>
                                        <a href="#">
                                                <span class="photo">
                                                	<img src="../assets/img/prof/prof2.jpg" class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                	<span class="from"> Sarah Smith </span>
                                                	<span class="time">Just Now </span>
                                                </span>
                                            <span class="message"> Jatin I found you on LinkedIn... </span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="dropdown-menu-footer">
                                    <a href="#"> All Messages </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- end message dropdown -->
                    <!-- start manage user dropdown -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle " src="/images/{{auth()->user()->image}}" />
                            <span class="username username-hide-on-mobile"> {{auth()->user()->lastname}} {{auth()->user()->firstname}}</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="user_profile.html">
                                    <i class="icon-user"></i> Profile </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="lock_screen.html">
                                    <i class="icon-lock"></i> Lock
                                </a>
                            </li>
                            <li>
                                <a href="{{route('logout')}}">
                                    <i class="icon-logout"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end manage user dropdown -->
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
                            <i class="material-icons">more_vert</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end header -->
    <!-- start page container -->
    <div class="page-container">
        <!-- start sidebar menu -->
        <div class="sidebar-container">
            <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                <div id="remove-scroll">
                    <ul class="sidemenu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                        </li>
                        <li class="sidebar-user-panel">
                            <div class="user-panel">
                                <div class="pull-left image">
                                    <img src="/images/{{auth()->user()->image}}" class="img-circle user-img-circle" alt="User Image" />
                                </div>
                                <div class="pull-left info">
                                    <p> {{auth()->user()->lastname}} {{auth()->user()->firstname}}</p>
                                    <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline"> Online</span></a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item start">
                            <a href="{{route('home')}}" class="nav-link">
                                <i class="material-icons">dashboard</i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('professor.index')}}" class="nav-link nav-toggle"> <i class="material-icons">person</i>
                                <span class="title">Professors</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('professor.index')}}" class="nav-link "> <span class="title">All Professors</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('professor.add')}}" class="nav-link "> <span class="title">Add Professor</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('professor.edit')}}" class="nav-link "> <span class="title">Edit Professor</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"><i class="material-icons">group</i>
                                <span class="title">Students</span><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('student.index')}}" class="nav-link "> <span class="title">All Students</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('student.add')}}" class="nav-link "> <span class="title">Add Student</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('student.edit')}}" class="nav-link "> <span class="title">Edit Student</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">school</i>
                                <span class="title">Courses</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('course.index')}}" class="nav-link "> <span class="title">All Courses</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('course.add')}}" class="nav-link "> <span class="title">Add Course</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('course.edit')}}" class="nav-link "> <span class="title">Edit Course</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">business</i>
                                <span class="title">Departments</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('department.index')}}" class="nav-link "> <span class="title">All Departments</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('department.add')}}" class="nav-link "> <span class="title">Add Department</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">face</i>
                                <span class="title">Admin</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.index')}}" class="nav-link "> <span class="title">All Admin</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.add')}}" class="nav-link "> <span class="title">Add Admin</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.edit')}}" class="nav-link "> <span class="title">Edit Admin</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="material-icons">email</i>
                                <span class="title">Email</span>
                                <span class="arrow"></span>
                                <span class="label label-rouded label-menu label-danger">new</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link ">
                                        <span class="title">Inbox</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link ">
                                        <span class="title">View Mail</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link ">
                                        <span class="title">Compose Mail</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="material-icons">local_library</i>
                                <span class="title">Results</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('result.index')}}" class="nav-link ">
                                        <span class="title">Enter Results</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('result.view')}}" class="nav-link ">
                                        <span class="title">View Results</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('result.edit')}}" class="nav-link ">
                                        <span class="title">Edit Results</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- end sidebar menu -->

        <!-- start page content -->
        <div class="page-content-wrapper">
            <div id="app">
                @yield('content')
            </div>

        </div>
        <!-- end page content -->

        <!-- start chat sidebar -->
        <div class="chat-sidebar-container" data-close-on-body-click="false">
            <div class="chat-sidebar">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#quick_sidebar_tab_3" class="nav-link tab-icon"  data-toggle="tab"> <i class="material-icons">settings</i> Settings
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- Start Setting Panel -->
                    <div class="tab-pane chat-sidebar-settings" role="tabpanel" id="quick_sidebar_tab_3">
                        <div class="chat-sidebar-settings-list slimscroll-style">
                            <div class="chat-header"><h5 class="list-heading">Layout Settings</h5></div>
                            <div class="chatpane inner-content ">
                                <div class="settings-list">
                                    <div class="setting-item">
                                        <div class="setting-text">Sidebar Position</div>
                                        <div class="setting-set">
                                            <select class="sidebar-pos-option form-control input-inline input-sm input-small ">
                                                <option value="left" selected="selected">Left</option>
                                                <option value="right">Right</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Header</div>
                                        <div class="setting-set">
                                            <select class="page-header-option form-control input-inline input-sm input-small ">
                                                <option value="fixed" selected="selected">Fixed</option>
                                                <option value="default">Default</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Sidebar Menu </div>
                                        <div class="setting-set">
                                            <select class="sidebar-menu-option form-control input-inline input-sm input-small ">
                                                <option value="accordion" selected="selected">Accordion</option>
                                                <option value="hover">Hover</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Footer</div>
                                        <div class="setting-set">
                                            <select class="page-footer-option form-control input-inline input-sm input-small ">
                                                <option value="fixed">Fixed</option>
                                                <option value="default" selected="selected">Default</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br><br><br>

                                    <div class="chat-header"><h5 class="list-heading">Theme Settings</h5></div>
                                    <div class="setting-item">
                                        <div class="setting-text">Theme Mode</div>
                                        <div class="setting-set">
                                            <form method="post" action="{{route('save_theme')}}" >
                                                {{csrf_field()}}
                                                <select class="page-footer-option form-control input-inline input-sm input-small " name="theme">
                                                    <option value="0">Day Mode</option>
                                                    <option value="1">Night Mode</option>
                                                </select>
                                                <br>
                                                <input type="submit" class="btn btn-primary btn-sm" value="Save Theme Setting">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end chat sidebar -->
    </div>
    <!-- end page container -->
    <!-- start footer -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2017 &copy; RMS
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- end footer -->
</div>
{{--My Vue.js Include--}}
<script src="/js/app.js"></script>
<!-- start js include path -->
<script src="/plugins/jquery/jquery.min.js" ></script>
<script src="/plugins/popper/popper.js" ></script>
<script src="/plugins/jquery-blockui/jquery.blockui.min.js" ></script>
<script src="/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- bootstrap -->
<script src="/plugins/bootstrap/js/bootstrap.min.js" ></script>
<script src="/plugins/bootstrap-switch/js/bootstrap-switch.min.js" ></script>
<script src="/plugins/sparkline/jquery.sparkline.js" ></script>
<script src="/js/pages/sparkline/sparkline-data.js" ></script>
<script src="/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"  charset="UTF-8"></script>
<script src="/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js"  charset="UTF-8"></script>

<!-- Common js-->
<script src="/js/app(copy).js" ></script>
<script src="/js/layout.js" ></script>
<script src="/js/pages/validation/form-validation.js" ></script>
<script src="/js/theme-color.js" ></script>
<!-- material -->
<script src="/plugins/material/material.min.js"></script>
<!-- chart js -->
<script src="/plugins/chart-js/Chart.bundle.js" ></script>
<script src="/plugins/chart-js/utils.js" ></script>
<script src="/js/pages/chart/chartjs/home-data.js" ></script>
<!-- summernote -->
<script src="/plugins/summernote/summernote.js" ></script>
<script src="/js/pages/summernote/summernote-data.js" ></script>
<!-- end js include path -->
</body>
</html>