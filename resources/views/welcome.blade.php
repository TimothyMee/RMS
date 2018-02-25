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
                            <span class="info-box-number">450</span>
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
                            <span class="info-box-text">New Students</span>
                            <span class="info-box-number">155</span>
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
                            <span class="info-box-number">52</span>
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
                            <span class="info-box-number">13,921</span>
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
            <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                <div class="blogThumb">
                    <div class="thumb-center"><img class="img-responsive" alt="user" src="../assets/img/course/course1.jpg"></div>
                    <div class="course-box">
                        <h4>PHP Development Course</h4>
                        <div class="text-muted"><span class="m-r-10">April 23</span>
                            <a class="course-likes m-l-10" href="#"><i class="fa fa-heart-o"></i> 654</a>
                        </div>
                        <p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
                        <p><span><i class="ti-user"></i> Professor: Jane Doe</span></p>
                        <p><span><i class="fa fa-graduation-cap"></i> Students: 200+</span></p>
                        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read More</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 col-sm-6 ">
                <div class="blogThumb">
                    <div class="thumb-center"><img class="img-responsive" alt="user" src="../assets/img/course/course2.jpg"></div>
                    <div class="course-box">
                        <h4>PHP Development Course</h4>
                        <div class="text-muted"><span class="m-r-10">April 23</span>
                            <a class="course-likes m-l-10" href="#"><i class="fa fa-heart-o"></i> 654</a>
                        </div>
                        <p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
                        <p><span><i class="ti-user"></i> Professor: Jane Doe</span></p>
                        <p><span><i class="fa fa-graduation-cap"></i> Students: 200+</span></p>
                        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read More</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                <div class="blogThumb">
                    <div class="thumb-center"><img class="img-responsive" alt="user" src="../assets/img/course/course3.jpg"></div>
                    <div class="course-box">
                        <h4>PHP Development Course</h4>
                        <div class="text-muted"><span class="m-r-10">April 23</span>
                            <a class="course-likes m-l-10" href="#"><i class="fa fa-heart-o"></i> 654</a>
                        </div>
                        <p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
                        <p><span><i class="ti-user"></i> Professor: Jane Doe</span></p>
                        <p><span><i class="fa fa-graduation-cap"></i> Students: 200+</span></p>
                        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read More</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                <div class="blogThumb">
                    <div class="thumb-center"><img class="img-responsive" alt="user" src="../assets/img/course/course4.jpg"></div>
                    <div class="course-box">
                        <h4>PHP Development Course</h4>
                        <div class="text-muted"><span class="m-r-10">April 23</span>
                            <a class="course-likes m-l-10" href="#"><i class="fa fa-heart-o"></i> 654</a>
                        </div>
                        <p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
                        <p><span><i class="ti-user"></i> Professor: Jane Doe</span></p>
                        <p><span><i class="fa fa-graduation-cap"></i> Students: 200+</span></p>
                        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read More</button>
                    </div>
                </div>
            </div>
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
                                        <th>Assigned Professor</th>
                                        <th>Date Of Admit</th>
                                        <th>Fees</th>
                                        <th>Branch</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Jens Brincker</td>
                                        <td>Kenny Josh</td>
                                        <td>27/05/2016</td>
                                        <td>
                                            <span class="label label-sm label-success">paid</span>
                                        </td>
                                        <td>Mechanical</td>
                                        <td><a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Mark Hay</td>
                                        <td> Mark</td>
                                        <td>26/05/2017</td>
                                        <td>
                                            <span class="label label-sm label-warning">unpaid </span>
                                        </td>
                                        <td>Science</td>
                                        <td><a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Anthony Davie</td>
                                        <td>Cinnabar</td>
                                        <td>21/05/2016</td>
                                        <td>
                                            <span class="label label-sm label-success ">paid</span>
                                        </td>
                                        <td>Commerce</td>
                                        <td><a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>David Perry</td>
                                        <td>Felix </td>
                                        <td>20/04/2016</td>
                                        <td>
                                            <span class="label label-sm label-danger">unpaid</span>
                                        </td>
                                        <td>Mechanical</td>
                                        <td><a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Anthony Davie</td>
                                        <td>Beryl</td>
                                        <td>24/05/2016</td>
                                        <td>
                                            <span class="label label-sm label-success ">paid</span>
                                        </td>
                                        <td>M.B.A.</td>
                                        <td><a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Alan Gilchrist</td>
                                        <td>Joshep</td>
                                        <td>22/05/2016</td>
                                        <td>
                                            <span class="label label-sm label-warning ">unpaid</span>
                                        </td>
                                        <td>Science</td>
                                        <td><a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Mark Hay</td>
                                        <td>Jayesh</td>
                                        <td>18/06/2016</td>
                                        <td>
                                            <span class="label label-sm label-success ">paid</span>
                                        </td>
                                        <td>Commerce</td>
                                        <td><a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Sue Woodger</td>
                                        <td>Sharma</td>
                                        <td>17/05/2016</td>
                                        <td>
                                            <span class="label label-sm label-danger">unpaid</span>
                                        </td>
                                        <td>Mechanical</td>
                                        <td><a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
                                    </tr>
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
                                        <th>Assigned Professor</th>
                                        <th>Date Of Admit</th>
                                        <th>Fees</th>
                                        <th>Branch</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Jens Brincker</td>
                                        <td>Kenny Josh</td>
                                        <td>27/05/2016</td>
                                        <td>
                                            <span class="label label-sm label-success">paid</span>
                                        </td>
                                        <td>Mechanical</td>
                                        <td>
                                            <a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a>
                                            <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Mark Hay</td>
                                        <td> Mark</td>
                                        <td>26/05/2017</td>
                                        <td>
                                            <span class="label label-sm label-warning">unpaid </span>
                                        </td>
                                        <td>Science</td>
                                        <td>
                                            <a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a>
                                            <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Anthony Davie</td>
                                        <td>Cinnabar</td>
                                        <td>21/05/2016</td>
                                        <td>
                                            <span class="label label-sm label-success ">paid</span>
                                        </td>
                                        <td>Commerce</td>
                                        <td>
                                            <a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a>
                                            <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Sue Woodger</td>
                                        <td>Sharma</td>
                                        <td>17/05/2016</td>
                                        <td>
                                            <span class="label label-sm label-danger">unpaid</span>
                                        </td>
                                        <td>Mechanical</td>
                                        <td>
                                            <a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a>
                                            <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end new professor list -->

        {{$data['courses']}}
        @foreach($data['courses'] as $courses)
            {{$courses['name']}}
        @endforeach
    </div>
@endsection
