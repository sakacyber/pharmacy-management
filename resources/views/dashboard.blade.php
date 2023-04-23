@extends(backpack_view('blank'))

@php
    if (config('backpack.base.show_getting_started')) {
        $widgets['before_content'][] = [
            'type' => 'view',
            'view' => 'backpack::inc.getting_started',
        ];
    } else {
        $widgets['before_content'][] = [
            'type' => 'jumbotron',
            'heading' => trans('backpack::base.welcome'),
            'content' => trans('backpack::base.use_sidebar'),
            'button_link' => backpack_url('logout'),
            'button_text' => trans('backpack::base.logout'),
        ];
    }
@endphp

@section('content')
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-primary">
                <div class="card-body pb-0">
                    <div class="btn-group float-right">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="icon-settings"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a
                                class="dropdown-item" href="#">Another action</a><a class="dropdown-item"
                                href="#">Something else here</a></div>
                    </div>
                    <div class="text-value">9.823</div>
                    <div>Members online</div>
                </div>
                <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas class="chart chartjs-render-monitor" id="card-chart1" height="70"
                        style="display: block; width: 372px; height: 70px;" width="372"></canvas>
                </div>
            </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-success">
                <div class="card-body pb-0">
                    <button class="btn btn-transparent p-0 float-right" type="button"><i
                            class="icon-location-pin"></i></button>
                    <div class="text-value">9.823</div>
                    <div>Members online</div>
                </div>
                <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas class="chart chartjs-render-monitor" id="card-chart2" height="70"
                        style="display: block; width: 370px; height: 70px;" width="370"></canvas>
                    <div id="card-chart2-tooltip" class="chartjs-tooltip bottom"
                        style="opacity: 0; left: 85.4399px; top: 146.054px;">
                        <div class="tooltip-header">
                            <div class="tooltip-header-item">January</div>
                        </div>
                        <div class="tooltip-body">
                            <div class="tooltip-body-item"><span class="tooltip-body-item-color"
                                    style="background-color: rgb(70, 127, 208);"></span><span
                                    class="tooltip-body-item-label">My First dataset</span><span
                                    class="tooltip-body-item-value">1</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-warning">
                <div class="card-body pb-0">
                    <div class="btn-group float-right">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="icon-settings"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a
                                class="dropdown-item" href="#">Another action</a><a class="dropdown-item"
                                href="#">Something else here</a></div>
                    </div>
                    <div class="text-value">9.823</div>
                    <div>Members online</div>
                </div>
                <div class="chart-wrapper mt-3" style="height:70px;">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas class="chart chartjs-render-monitor" id="card-chart3" height="70"
                        style="display: block; width: 404px; height: 70px;" width="404"></canvas>
                </div>
            </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-dark">
                <div class="card-body pb-0">
                    <div class="btn-group float-right">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="icon-settings"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a
                                class="dropdown-item" href="#">Something else here</a></div>
                    </div>
                    <div class="text-value">9.823</div>
                    <div>Members online</div>
                </div>
                <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas class="chart chartjs-render-monitor" id="card-chart4" height="70"
                        style="display: block; width: 370px; height: 70px;" width="370"></canvas>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
@endsection
