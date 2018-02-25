
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
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Material Design Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--bootstrap -->
    <link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="/plugins/material/material.min.css">
    <link rel="stylesheet" href="/css/material_style.css">
    <!-- Theme Styles -->
    <link href="/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="/css/theme/light/style.css" rel="stylesheet" type="text/css" />
    <link href="/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
    <!-- dropzone -->
    <link href="/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
    <!-- Date Time item CSS -->
    <link rel="stylesheet" href="/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css" />
    <!-- favicon -->
    {{--<link rel="shortcut icon" href="../assets/img/favicon.ico" />--}}
</head>
<!-- END HEAD -->
<body class="">
<div class="">
    <div class="page-container">
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="breadcrumb">
                    <div class="breadcrumb">
                        <div class="pull-left">
                            <div class="page-title"><span style="color:rebeccapurple">Add Student</span></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="card-head">
                                <header><h4>Basic Information</h4></header>
                            </div>
                            <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body row">
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type = "text" name= "firstname">
                                            <label class="mdl-textfield__label">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type = "text" name= "middlename">
                                            <label class="mdl-textfield__label">Second Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type = "text" name="lastname">
                                            <label class="mdl-textfield__label" >Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type = "text" name="identification_no">
                                            <label class="mdl-textfield__label" >Identification No</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type = "email" name="email">
                                            <label class="mdl-textfield__label" >Email</label>
                                            <span class="mdl-textfield__error">Enter Valid Email Address!</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class = "mdl-textfield__input" type = "text"
                                                   pattern = "-?[0-9]*(\.[0-9]+)?" name = "tel_no" id="telephone">
                                            <label class = "mdl-textfield__label" for = "telephone">Mobile Number</label>
                                            <span class = "mdl-textfield__error">Number required!</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                            <select name="department_id" id="" class="form-control">
                                                <option value="">Department</option>
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                            <select name="gender" id="" class="form-control">
                                                <option value="" class="mdl-menu__item">Gender</option>
                                                <option value="Male" class="mdl-menu__item">Male</option>
                                                <option value="Female" class="mdl-menu__item">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class = "mdl-textfield__input" type = "text" name = "DOB" id="dateOfBirth">
                                            <label class = "mdl-textfield__label" >Birth Date</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type = "password" name="password">
                                            <label class="mdl-textfield__label" >Password</label>
                                            <span class="mdl-textfield__error">Enter Your Password!</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type = "password" name="c_password">
                                            <label class="mdl-textfield__label" >Confirm Password</label>
                                            <span class="mdl-textfield__error">Enter Same Password!</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield txt-full-width">
						                     <textarea class = "mdl-textfield__input" rows =  "4"
                                                       name = "address" id="address"></textarea>
                                            <label class = "mdl-textfield__label" for = "address">Address</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 p-t-20">
                                        <label class="control-label col-md-3">Upload Photo
                                        </label>
                                        <div class="col-md-12">
                                            <input type="file" id="" class="dropzone col-md-12 form-control" name="photo"/>
                                        </div>
                                    </div>

                                    <input type="hidden" name ="user_type" value="3">

                                    <div class="col-lg-12 p-t-20 text-center">
                                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                                        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                                        <a href="{{route('login')}}" class="text">Login?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content -->
    </div>
    <!-- end page container -->
    <!-- start footer -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2017 &copy; RMS</div>
        {{--<div class="scroll-to-top">--}}
            {{--<i class="icon-arrow-up"></i>--}}
        {{--</div>--}}
    </div>
    <!-- end footer -->
</div>
<!-- start js include path -->
<script src="/plugins/jquery/jquery.min.js" ></script>
<script src="/plugins/popper/popper.js" ></script>
<script src="/plugins/jquery-blockui/jquery.blockui.min.js" ></script>
<script src="/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- bootstrap -->
<script src="/plugins/bootstrap/js/bootstrap.min.js" ></script>
<!-- Common js-->
<script src="/js/app(copy).js" ></script>
<script src="/js/layout.js" ></script>
<script src="/js/theme-color.js" ></script>
<!-- Material -->
<script src="/plugins/material/material.min.js"></script>
<script src="/js/pages/material-select/getmdl-select.js" ></script>
<script  src="/plugins/material-datetimepicker/moment-with-locales.min.js"></script>
<script  src="/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
<script  src="/plugins/material-datetimepicker/datetimepicker.js"></script>
<!-- dropzone -->
<script src="/plugins/dropzone/dropzone.js" ></script>
<script src="/plugins/dropzone/dropzone-call.js" ></script>
<!-- end js include path -->
</body>
</html>