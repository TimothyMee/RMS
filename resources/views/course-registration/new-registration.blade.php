@extends('layouts.studentsApp')

@section('content')
    <div id="app">
        <div class="container-fluid">
            {{--<div class="row">

                <div class="col-xl-12">
                    <div class="row">
                        <add-course></add-course>
                    </div><!--.row-->
                </div><!--.col-->

                <div class="col-xl-12">
                    <view-courses></view-courses>
                </div><!--.col-->

            </div><!--.row-->--}}

            <new-registration></new-registration>
        </div><!--.container-fluid-->
    </div>
@endsection
