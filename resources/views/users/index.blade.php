@extends('layouts.app')

@section('content')
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">
                    <add-user></add-user>
                </div><!--.col-->

                <div class="col-xl-6">
                    <div class="row">
                        <view-users></view-users>
                    </div><!--.row-->
                </div><!--.col-->
            </div><!--.row-->
        </div><!--.container-fluid-->
    </div>
@endsection
