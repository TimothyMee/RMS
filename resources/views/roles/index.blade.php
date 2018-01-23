@extends('layouts.app')

@section('content')
    <div id="app">
        <div class="container-fluid">
            <div class="row">

                <div class="col-xl-12">
                    <div class="row">
                        <add-role></add-role>
                    </div><!--.row-->
                </div><!--.col-->

                <div class="col-xl-12">
                    <view-roles></view-roles>
                </div><!--.col-->

            </div><!--.row-->
        </div><!--.container-fluid-->
    </div>
@endsection
