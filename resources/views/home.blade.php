@extends('layouts.app1')

@section('content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Dashboard</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- start widget -->
        <div class="state-overview">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-green">
                        <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Students</span>
                            @if($data['studentCount'])
                                <span class="info-box-number">{{$data['studentCount']}}</span>
                            @else
                                <span class="info-box-number">0</span>
                            @endif
                            <div class="progress">
                                <div class="progress-bar" style="width: 45%"></div>
                            </div>
                            <span class="progress-description">
						                    45% Increase in 28 Days
						                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-yellow">
                        <span class="info-box-icon push-bottom"><i class="material-icons">person</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Admins</span>
                            @if($data['adminCount'])
                                <span class="info-box-number">{{$data['adminCount']}}</span>
                            @else
                                <span class="info-box-number">0</span>
                            @endif
                            <div class="progress">
                                <div class="progress-bar" style="width: 40%"></div>
                            </div>
                            <span class="progress-description">
						                    40% Increase in 28 Days
						                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-blue">
                        <span class="info-box-icon push-bottom"><i class="material-icons">school</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Course</span>
                            @if($data['courseCount'])
                                <span class="info-box-number">{{$data['courseCount']}}</span>
                            @else
                                <span class="info-box-number">0</span>
                            @endif
                            <div class="progress">
                                <div class="progress-bar" style="width: 85%"></div>
                            </div>
                            <span class="progress-description">
						                    85% Increase in 28 Days
						                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-pink">
                        <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Professors</span>
                            @if($data['professorCount'])
                                <span class="info-box-number">{{$data['professorCount']}}</span>
                            @else
                                <span class="info-box-number">0</span>
                            @endif
                            <div class="progress">
                                <div class="progress-bar" style="width: 50%"></div>
                            </div>
                            <span class="progress-description">
						                    50% Increase in 28 Days
						                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- end widget -->

        <!-- start course list -->
        <div class="row">
            @foreach($data['courses'] as $courses)
                <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                    <div class="blogThumb">
                        <div class="thumb-center"><img class="img-responsive" alt="user" src="../assets/img/course/course1.jpg"></div>
                        <div class="course-box">
                            <h4>{{$courses['name']}}</h4>
                            <div class="text-muted">
                                <span class="m-r-10">{{$courses['created_at']}}</span>
                            </div>
                            <p><span><i class="ti-alarm-clock"></i> Duration: 1 Semester</span></p>
                            <p><span><i class="ti-user"></i> Course Code: {{$courses['course_code']}}</span></p>
                            {{--<p><span><i class="fa fa-graduation-cap"></i> Students: 200+</span></p>--}}
                            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read More</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- End course list -->

        <!-- start new student list -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card  card-box">
                    <div class="card-head">
                        <header>New Student List</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table display product-overview mb-30" id="support_table">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Identification No</th>
                                        <th>Date Of Admit</th>
                                        <th>Gender</th>
                                        <th>Department</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1;?>
                                    @foreach($data['student'] as $students)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$students['lastname']}} {{$students['firstname']}}</td>
                                            <td>{{$students['identification_no']}}</td>
                                            <td>{{$students['created_at']}}</td>
                                            <td>
                                                @if($students['gender'] == 'Male')
                                                    <span class="label label-sm label-success">{{$students['gender']}}</span>
                                                @else
                                                    <span class="label label-sm label-danger">{{$students['gender']}}</span>
                                                @endif
                                            </td>
                                            <td>{{$students['department']}}</td>
                                            <td><a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end new student list -->

        <!-- start new professor list -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card  card-box">
                    <div class="card-head">
                        <header>New Professor List</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table display product-overview mb-30" id="support_table">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Identification No</th>
                                        <th>Date Of Employment</th>
                                        <th>Gender</th>
                                        <th>Department</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1;?>
                                    @foreach($data['professor'] as $professor)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$professor['lastname']}} {{$professor['firstname']}}</td>
                                            <td>{{$professor['identification_no']}}</td>
                                            <td>{{$professor['created_at']}}</td>
                                            <td>
                                                @if($students['gender'] == 'Male')
                                                    <span class="label label-sm label-success">{{$professor['gender']}}</span>
                                                @else
                                                    <span class="label label-sm label-danger">{{$professor['gender']}}</span>
                                                @endif
                                            </td>
                                            <td>{{$professor['department']}}</td>
                                            <td><a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end new professor list -->
    </div>
@endsection
