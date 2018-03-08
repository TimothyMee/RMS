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

<body>
    <div class="table-scrollable">
        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle">
            <thead>
            <tr>
                <th align="center">Course Code</th>
                <th align="center">Unit</th>
                <th align="center">C.A</th>
                <th align="center">Exam</th>
                <th align="center">Total</th>
                <th align="center">Grade</th>
            </tr>
            </thead>
            @foreach($data['resultArray'] as $results)
                @foreach($results as $result)
                    @if($data['student_id'] ==  $result['student_id'])
                     <tbody v-for="">
                        <tr v-for="result in results" v-if="result.student_id == selectedStudentId">
                            <td align="center">{{$result['course_code']}}</td>
                            <td align="center">{{$result['unit']}}</td>
                            <td align="center">{{$result['C_A']}}</td>
                            <td align="center">{{$result['Exam']}}</td>
                            <td align="center">{{$result['total']}}</td>
                            <td align="center">{{$result['grade']}}</td>
                        </tr>
                     </tbody>
                    @endif
                @endforeach
            @endforeach
                <tbody>
                    <tr>
                        <th align="center" colspan="2">Total Grade Points: {{$data['gpa']['totalGradePoints']}}</th>
                        <th align="center" colspan="2">Total Units: {{$data['gpa']['totalUnits']}}</th>
                        <th align="center" colspan="2">GPA: {{$data['gpa']['gpa']}}</th>
                    </tr>
                </tbody>
        </table>
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

