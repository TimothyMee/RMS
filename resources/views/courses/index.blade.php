@extends('layouts.app1')

@section('content')
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">All Courses List</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="#">Courses</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">All Courses List</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="card-box">
                    <div class="card-head">
                        <header>All Courses</header>
                    </div>
                    <div class="card-body ">
                        <!-- start course list -->
                            <view-courses></view-courses>
                        <!-- End course list -->
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end page content -->

@endsection
