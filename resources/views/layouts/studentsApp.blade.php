<!DOCTYPE html>
    <html>

    <head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RMS</title>

    <link href="/img/favicon.144x144.html" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="/img/favicon.114x114.html" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="/img/favicon.72x72.html" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="/img/favicon.57x57.html" rel="apple-touch-icon" type="image/png">
    <link href="/img/favicon.html" rel="icon" type="image/png">
    <link href="/img/favicon-2.html" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/css/lobipanel/lobipanel.min.css">
    <link rel="stylesheet" href="/css/vendor/lobipanel.min.css">
    <link rel="stylesheet" href="/css/jqueryui/jquery-ui.min.css">
    <link rel="stylesheet" href="/css/pages/widgets.min.css">
    <link rel="stylesheet" href="/css/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body class="with-side-menu control-panel control-panel-compact">

    <header class="site-header">
        <div class="container-fluid">
            <a href="" class="site-logo">
                {{--<img class="hidden-md-down" src="img/logo-2.png" alt="">--}}
                <img class="hidden-lg-down" src="/img/logo-2-mob.png" alt="">
                <a href="{{route('student.home')}}" class="link">Home</a>
            </a>

            <button class="hamburger hamburger--htla">
                <span>toggle menu</span>
            </button>
            <div class="site-header-content">
                <div class="site-header-content-in">
                    <div class="site-header-shown">
                        <div class="dropdown user-menu">
                            <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="/img/avatar-2-64.png" alt="">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                <a class="dropdown-item" href="{{route('logout')}}"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
                            </div>
                        </div>

                        <button type="button" class="burger-right">
                            <i class="font-icon-menu-addl"></i>
                        </button>
                    </div><!--.site-header-shown-->

                    <div class="mobile-menu-right-overlay"></div>

                </div><!--site-header-content-in-->
            </div><!--.site-header-content-->
        </div><!--.container-fluid-->
</header><!--.site-header-->

<div class="mobile-menu-left-overlay"></div>
<nav class="side-menu">
    <section>
        <header class="side-menu-title">Menu</header>
        <ul class="side-menu-list">

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="tag-color red"></i>
                    Courses <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('course-registration.new')}}">Course Registration</a></li>
                    <li><a href="{{route('course-registration.edit')}}">Edit Registration</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="{{route('student-view-result')}}">
                    <i class="tag-color pink"></i>
                    Result
                </a>
            </li>

            <li class="dropdown">
                <a href="#">
                    <i class="tag-color blue"></i>
                    Profile
                </a>
            </li>



        </ul>
    </section>
</nav><!--.side-menu-->

<div class="page-content">
    @yield('content')
</div><!--.page-content-->

<div class="control-panel-container">
   {{-- <ul>
        <li class="tasks">
            <div class="control-item-header">
                <a href="#" class="icon-toggle">
                    <span class="caret-down fa fa-caret-down"></span>
                    <span class="icon fa fa-tasks"></span>
                </a>
                <span class="text">Task list</span>
                <div class="actions">
                    <a href="#">
                        <span class="fa fa-refresh"></span>
                    </a>
                    <a href="#">
                        <span class="fa fa-cog"></span>
                    </a>
                    <a href="#">
                        <span class="fa fa-trash"></span>
                    </a>
                </div>
            </div>
            <div class="control-item-content">
                <div class="control-item-content-text">You don't have pending tasks.</div>
            </div>
        </li>
        <li class="sticky-note">
            <div class="control-item-header">
                <a href="#" class="icon-toggle">
                    <span class="caret-down fa fa-caret-down"></span>
                    <span class="icon fa fa-file"></span>
                </a>
                <span class="text">Sticky Note</span>
                <div class="actions">
                    <a href="#">
                        <span class="fa fa-refresh"></span>
                    </a>
                    <a href="#">
                        <span class="fa fa-cog"></span>
                    </a>
                    <a href="#">
                        <span class="fa fa-trash"></span>
                    </a>
                </div>
            </div>
            <div class="control-item-content">
                <div class="control-item-content-text">
                    StartUI – a full featured, premium web application admin dashboard built with Twitter Bootstrap 4, JQuery and CSS
                </div>
            </div>
        </li>
        <li class="emails">
            <div class="control-item-header">
                <a href="#" class="icon-toggle">
                    <span class="caret-down fa fa-caret-down"></span>
                    <span class="icon fa fa-envelope"></span>
                </a>
                <span class="text">Recent e-mails</span>
                <div class="actions">
                    <a href="#">
                        <span class="fa fa-refresh"></span>
                    </a>
                    <a href="#">
                        <span class="fa fa-cog"></span>
                    </a>
                    <a href="#">
                        <span class="fa fa-trash"></span>
                    </a>
                </div>
            </div>
            <div class="control-item-content">
                <section class="control-item-actions">
                    <a href="#" class="link">My e-mails</a>
                    <a href="#" class="mark">Mark visible as read</a>
                </section>
                <ul class="control-item-lists">
                    <li>
                        <a href="#">
                            <h6>Welcome to the Community!</h6>
                            <div>Hi, welcome to the my app...</div>
                            <div>
                                Message text
                            </div>
                        </a>
                        <a href="#" class="reply-all">Reply all</a>
                    </li>
                    <li>
                        <a href="#">
                            <h6>Welcome to the Community!</h6>
                            <div>Hi, welcome to the my app...</div>
                            <div>
                                Message text
                            </div>
                        </a>
                        <a href="#" class="reply-all">Reply all</a>
                    </li>
                    <li>
                        <a href="#">
                            <h6>Welcome to the Community!</h6>
                            <div>Hi, welcome to the my app...</div>
                            <div>
                                Message text
                            </div>
                        </a>
                        <a href="#" class="reply-all">Reply all</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="add">
            <div class="control-item-header">
                <a href="#" class="icon-toggle no-caret">
                    <span class="icon fa fa-plus"></span>
                </a>
            </div>
        </li>
    </ul>
    <a class="control-panel-toggle">
        <span class="fa fa-angle-double-left"></span>
    </a>--}}
</div>

<script src="/js/lib/jquery/jquery-3.2.1.min.js"></script>
<script src="/js/lib/popper/popper.min.js"></script>
<script src="/js/lib/tether/tether.min.js"></script>
<script src="/js/lib/bootstrap/bootstrap.min.js"></script>
<script src="/https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
<script src="/js/plugins.js"></script>
<script>
    $(document).ready(function() {
        $('.panel').each(function () {
            try {
                $(this).lobiPanel({
                    sortable: true
                }).on('dragged.lobiPanel', function(ev, lobiPanel){
                    $('.dahsboard-column').matchHeight();
                });
            } catch (err) {}
        });

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn('string', 'Day');
            dataTable.addColumn('number', 'Values');
            // A column for custom tooltip content
            dataTable.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
            dataTable.addRows([
                ['MON',  130, ' '],
                ['TUE',  130, '130'],
                ['WED',  180, '180'],
                ['THU',  175, '175'],
                ['FRI',  200, '200'],
                ['SAT',  170, '170'],
                ['SUN',  250, '250'],
                ['MON',  220, '220'],
                ['TUE',  220, ' ']
            ]);

            var options = {
                height: 314,
                legend: 'none',
                areaOpacity: 0.18,
                axisTitlesPosition: 'out',
                hAxis: {
                    title: '',
                    textStyle: {
                        color: '#fff',
                        fontName: 'Proxima Nova',
                        fontSize: 11,
                        bold: true,
                        italic: false
                    },
                    textPosition: 'out'
                },
                vAxis: {
                    minValue: 0,
                    textPosition: 'out',
                    textStyle: {
                        color: '#fff',
                        fontName: 'Proxima Nova',
                        fontSize: 11,
                        bold: true,
                        italic: false
                    },
                    baselineColor: '#16b4fc',
                    ticks: [0,25,50,75,100,125,150,175,200,225,250,275,300,325,350],
                    gridlines: {
                        color: '#1ba0fc',
                        count: 15
                    }
                },
                lineWidth: 2,
                colors: ['#fff'],
                curveType: 'function',
                pointSize: 5,
                pointShapeType: 'circle',
                pointFillColor: '#f00',
                backgroundColor: {
                    fill: '#008ffb',
                    strokeWidth: 0,
                },
                chartArea:{
                    left:0,
                    top:0,
                    width:'100%',
                    height:'100%'
                },
                fontSize: 11,
                fontName: 'Proxima Nova',
                tooltip: {
                    trigger: 'selection',
                    isHtml: true
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(dataTable, options);
        }
        $(window).resize(function(){
            drawChart();
            setTimeout(function(){
            }, 1000);
        });
    });
</script>
<script src="/js/app1.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>

