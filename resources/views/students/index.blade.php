@extends('layouts.app')

@section('content')
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">
                    <add-students></add-students>
                </div><!--.col-->

                <div class="col-xl-6">
                    <div class="row">
                        <view-students></view-students>
                    </div><!--.row-->
                </div><!--.col-->
            </div><!--.row-->
        </div><!--.container-fluid-->
    </div>
@endsection
