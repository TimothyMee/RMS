@extends('layouts.app')

@section('content')
    <div id="app">
        <div class="container-fluid">
            <div class="row">

                <div class="col-xl-12">
                    <div class="row">
                        <add-department></add-department>
                    </div><!--.row-->
                </div><!--.col-->

                <div class="col-xl-12">
                    <view-departments></view-departments>
                </div><!--.col-->

            </div><!--.row-->
        </div><!--.container-fluid-->
    </div>
@endsection
