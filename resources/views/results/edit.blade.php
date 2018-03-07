@extends('layouts.app1')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Edit Result</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="#">Result</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Edit Result</li>
                    </ol>
                </div>
            </div>
            <edit-result></edit-result>
        </div>
    </div>

@endsection
