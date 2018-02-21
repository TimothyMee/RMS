@extends('layouts.studentsApp')

@section('content')
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">
                    <div class="chart-statistic-box">
                        <div class="chart-txt">
                            <div class="chart-txt-top">
                                <p><span class="number">20</span><span class="unit">%</span></p>
                                <p class="caption">Pass Percentage</p>
                            </div>
                            <table class="tbl-data">
                                <tr>
                                    <td class="price color-purple">55%</td>
                                    <td>1 Yr(s) Ago</td>
                                </tr>
                                <tr>
                                    <td class="price color-yellow">60%</td>
                                    <td>2 Yr(s) Ago</td>
                                </tr>
                                <tr>
                                    <td class="price color-lime">55%</td>
                                    <td>3 Yr(s) Ago</td>
                                </tr>
                            </table>
                        </div>
                        <div class="chart-container">
                            <div class="chart-container-in">
                                <div id="chart_div"></div>
                                <header class="chart-container-title">Income</header>
                                {{--<div class="chart-container-x">
                                    <div class="item"></div>
                                    <div class="item">tue</div>
                                    <div class="item">wed</div>
                                    <div class="item">thu</div>
                                    <div class="item">fri</div>
                                    <div class="item">sat</div>
                                    <div class="item">sun</div>
                                    <div class="item">mon</div>
                                    <div class="item"></div>
                                </div>
                                <div class="chart-container-y">
                                    <div class="item">300</div>
                                    <div class="item"></div>
                                    <div class="item">250</div>
                                    <div class="item"></div>
                                    <div class="item">200</div>
                                    <div class="item"></div>
                                    <div class="item">150</div>
                                    <div class="item"></div>
                                    <div class="item">100</div>
                                    <div class="item"></div>
                                    <div class="item">50</div>
                                    <div class="item"></div>
                                </div>--}}
                            </div>
                        </div>
                    </div><!--.chart-statistic-box-->
                </div><!--.col-->

                <div class="col-xl-6">
                    <div class="row">
                        {{--<div class="col-sm-6">
                            <article class="statistic-box yellow">
                                <div>
                                    <div class="number">26</div>
                                    <div class="caption"><div>Approved Results</div></div>
                                </div>
                            </article>
                        </div><!--.col-->
                        <div class="col-sm-6">
                            <article class="statistic-box green">
                                <div>
                                    <div class="number">12</div>
                                    <div class="caption"><div>Disapproved Results</div></div>
                                </div>
                            </article>
                        </div><!--.col-->--}}
                        <div class="col-sm-12">
                            <article class="statistic-box red">
                                <div>
                                    <div class="number"></div>
                                    <div class="caption"><div> Registered Courses</div></div>
                                </div>
                            </article>
                        </div><!--.col-->
                        <div class="col-sm-12">
                            <article class="statistic-box purple">
                                <div>
                                    <div class="number"></div>
                                    <div class="caption"><div> </div></div>
                                </div>
                            </article>
                        </div><!--.col-->
                        {{--<div class="col-sm-6">
                            <article class="statistic-box green">
                                <div>
                                    <div class="number">29</div>
                                    <div class="caption"><div></div></div>
                                    <div class="percent">
                                        <div class="arrow up"></div>
                                        <p>84%</p>
                                    </div>
                                </div>
                            </article>
                        </div><!--.col-->--}}
                    </div><!--.row-->
                </div><!--.col-->
            </div><!--.row-->

            {{--<div class="row">

                <div class="col-xl-6 dahsboard-column">
                    @include('students.view')
                </div><!--.col-->

                <div class="col-xl-6 dahsboard-column">
                    @include('users.view')
                </div><!--.col-->

            </div>--}}
        </div><!--.container-fluid-->
    </div>
@endsection