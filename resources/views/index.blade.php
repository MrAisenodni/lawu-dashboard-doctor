@extends('layouts.main')

@section('title', $c_menu->title)

@section('styles')
    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="{{ asset('/js/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <link rel="stylesheet" href="{{ asset('/js/rickshaw/rickshaw.min.css') }}">
@endsection

@section('scripts')
    <!-- Imported scripts on this page -->
	<script src="{{ asset('/js/jvectormap/jquery-jvectormap-europe-merc-en.js') }}"></script>
	<script src="{{ asset('/js/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('/js/rickshaw/vendor/d3.v3.js') }}"></script>
	<script src="{{ asset('/js/rickshaw/rickshaw.min.js') }}"></script>
	<script src="{{ asset('/js/raphael-min.js') }}"></script>
	<script src="{{ asset('/js/morris.min.js') }}"></script>
	<script src="{{ asset('/js/toastr.js') }}"></script>
	<script src="{{ asset('/js/neon-chat.js') }}"></script>
    
    {{-- <script type="text/javascript">
        jQuery(document).ready(function($)
        {
            // Sample Toastr Notification
            setTimeout(function()
            {
                var opts = {
                    "closeButton": true,
                    "debug": false,
                    "positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
                    "toastClass": "black",
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
        
                toastr.success("You have been awarded with 1 year free subscription. Enjoy it!", "Account Subcription Updated", opts);
            }, 3000);
        
        
            // Sparkline Charts
            $('.inlinebar').sparkline('html', {type: 'bar', barColor: '#ff6264'} );
            $('.inlinebar-2').sparkline('html', {type: 'bar', barColor: '#445982'} );
            $('.inlinebar-3').sparkline('html', {type: 'bar', barColor: '#00b19d'} );
            $('.bar').sparkline([ [1,4], [2, 3], [3, 2], [4, 1] ], { type: 'bar' });
            $('.pie').sparkline('html', {type: 'pie',borderWidth: 0, sliceColors: ['#3d4554', '#ee4749','#00b19d']});
            $('.linechart').sparkline();
            $('.pageviews').sparkline('html', {type: 'bar', height: '30px', barColor: '#ff6264'} );
            $('.uniquevisitors').sparkline('html', {type: 'bar', height: '30px', barColor: '#00b19d'} );
        
        
            $(".monthly-sales").sparkline([1,2,3,5,6,7,2,3,3,4,3,5,7,2,4,3,5,4,5,6,3,2], {
                type: 'bar',
                barColor: '#485671',
                height: '80px',
                barWidth: 10,
                barSpacing: 2
            });
        
        
            // JVector Maps
            var map = $("#map");
        
            map.vectorMap({
                map: 'europe_merc_en',
                zoomMin: '3',
                backgroundColor: '#383f47',
                focusOn: { x: 0.5, y: 0.8, scale: 3 }
            });
        
        
        
            // Line Charts
            var line_chart_demo = $("#line-chart-demo");
        
            var line_chart = Morris.Line({
                element: 'line-chart-demo',
                data: [
                    { y: '2006', a: 100, b: 90 },
                    { y: '2007', a: 75,  b: 65 },
                    { y: '2008', a: 50,  b: 40 },
                    { y: '2009', a: 75,  b: 65 },
                    { y: '2010', a: 50,  b: 40 },
                    { y: '2011', a: 75,  b: 65 },
                    { y: '2012', a: 100, b: 90 }
                ],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['October 2013', 'November 2013'],
                redraw: true
            });
        
            line_chart_demo.parent().attr('style', '');
        
        
            // Donut Chart
            var donut_chart_demo = $("#donut-chart-demo");
        
            donut_chart_demo.parent().show();
        
            var donut_chart = Morris.Donut({
                element: 'donut-chart-demo',
                data: [
                    {label: "Download Sales", value: getRandomInt(10,50)},
                    {label: "In-Store Sales", value: getRandomInt(10,50)},
                    {label: "Mail-Order Sales", value: getRandomInt(10,50)}
                ],
                colors: ['#707f9b', '#455064', '#242d3c']
            });
        
            donut_chart_demo.parent().attr('style', '');
        
        
            // Area Chart
            var area_chart_demo = $("#area-chart-demo");
        
            area_chart_demo.parent().show();
        
            var area_chart = Morris.Area({
                element: 'area-chart-demo',
                data: [
                    { y: '2006', a: 100, b: 90 },
                    { y: '2007', a: 75,  b: 65 },
                    { y: '2008', a: 50,  b: 40 },
                    { y: '2009', a: 75,  b: 65 },
                    { y: '2010', a: 50,  b: 40 },
                    { y: '2011', a: 75,  b: 65 },
                    { y: '2012', a: 100, b: 90 }
                ],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Series A', 'Series B'],
                lineColors: ['#303641', '#576277']
            });
        
            area_chart_demo.parent().attr('style', '');
        
        
        
        
            // Rickshaw
            var seriesData = [ [], [] ];
        
            var random = new Rickshaw.Fixtures.RandomData(50);
        
            for (var i = 0; i < 50; i++)
            {
                random.addData(seriesData);
            }
        
            var graph = new Rickshaw.Graph( {
                element: document.getElementById("rickshaw-chart-demo"),
                height: 193,
                renderer: 'area',
                stroke: false,
                preserve: true,
                series: [{
                        color: '#73c8ff',
                        data: seriesData[0],
                        name: 'Upload'
                    }, {
                        color: '#e0f2ff',
                        data: seriesData[1],
                        name: 'Download'
                    }
                ]
            } );
        
            graph.render();
        
            var hoverDetail = new Rickshaw.Graph.HoverDetail( {
                graph: graph,
                xFormatter: function(x) {
                    return new Date(x * 1000).toString();
                }
            } );
        
            var legend = new Rickshaw.Graph.Legend( {
                graph: graph,
                element: document.getElementById('rickshaw-legend')
            } );
        
            var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight( {
                graph: graph,
                legend: legend
            } );
        
            setInterval( function() {
                random.removeData(seriesData);
                random.addData(seriesData);
                graph.update();
        
            }, 500 );
        });
        
        
        function getRandomInt(min, max)
        {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
    </script> --}}
@endsection

@section('content')

    @if ($hospitals)
        @foreach ($hospitals as $item)
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <h2 class="fw-bold">{{ $item->code }} - {{ $item->name }}</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3 col-xs-12">
                            <div class="tile-stats tile-red" style="background: {{ $item->background }}">
                                <div class="icon"><i class="entypo-users"></i></div>
                                <h4 style="color: {{ $item->color }}">Total Pasien</h4>
                                <h2 class="fw-bold" style="color: {{ $item->color }}; margin-bottom: 5px; margin-top: 5px" data-start="0" data-end="
                                    @if ($item->patients)
                                        {{ $item->patients->count() }} 
                                    @endif" data-postfix="" data-duration="1000" data-delay="0"
                                >
                                    @if ($item->patients) 
                                        {{ $item->patients->count() }} 
                                    @endif
                                </h2>

                                @if ($assurances)
                                    @foreach ($assurances as $assurance)
                                        @if ($data['hospital_' . $item->id])
                                            <div class="row" style="margin-left: 0.5px; margin-right: 0.5px">
                                                <div class="tile-stats col-sm-12 col-xs-12" style="background: {{ $assurance->background }}; padding: 10px">
                                                    <h4 style="color: {{ $assurance->color }}; margin-top: 0px; margin-bottom: 0px">Pasien {{ $assurance->name }}</h4>
                                                    <h2 class="fw-bold" style="color: {{ $assurance->color }}; margin-top: 0px; margin-bottom: 0px" 
                                                        data-start="0" data-end="@if ($data['hospital_' . $item->id]['assurance_' . $assurance->id]) 
                                                            {{ $data['hospital_' . $item->id]['assurance_' . $assurance->id] }} 
                                                        @endif" data-postfix="" data-duration="1000" data-delay="0"
                                                    >
                                                        @if ($data['hospital_' . $item->id]['assurance_' . $assurance->id]) 
                                                            {{ $data['hospital_' . $item->id]['assurance_' . $assurance->id] }} 
                                                        @endif
                                                    </h2>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        @if ($actions)
                            @foreach ($actions as $action)
                                @if ($data['hospital_' . $item->id])
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="tile-stats tile-red" style="background: {{ $action->background }}">
                                            <div class="icon"><i class="entypo-users"></i></div>
                                            <h4 style="color: {{ $action->color }}">Total Pasien {{ $action->name }}</h4>
                                            <h2 class="fw-bold" style="color: {{ $action->color }}; margin-bottom: 5px; margin-top: 5px" data-start="0" 
                                                data-end="@if ($data['hospital_' . $item->id]['action_' . $action->id]) 
                                                    {{ $data['hospital_' . $item->id]['action_' . $action->id] }} 
                                                @endif" data-postfix="" data-duration="1000" data-delay="0"
                                            >
                                                @if ($data['hospital_' . $item->id]['action_' . $action->id]) 
                                                    {{ $data['hospital_' . $item->id]['action_' . $action->id] }} 
                                                @endif
                                            </h2>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif

                        {{-- @if ($visit_methods)
                            @foreach ($visit_methods as $visit_method)
                                @if ($data['hospital_' . $item->id])
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="tile-stats tile-red" style="background: {{ $visit_method->background }}">
                                            <div class="icon"><i class="entypo-users"></i></div>
                                            <div class="num" style="color: {{ $visit_method->color }}" data-start="0" data-end="@if ($data['hospital_' . $item->id]['visit_method_' . $visit_method->id]) {{ $data['hospital_' . $item->id]['visit_method_' . $visit_method->id] }} @endif" data-postfix="" data-duration="1000" data-delay="0">@if ($data['hospital_' . $item->id]['visit_method_' . $visit_method->id]) {{ $data['hospital_' . $item->id]['visit_method_' . $visit_method->id] }} @endif</div>
                            
                                            <h3 style="color: {{ $visit_method->color }}">Total {{ $visit_method->name }}</h3>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif --}}
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <br />

    {{-- <div class="row">
        <div class="col-sm-8">

            <div class="panel panel-primary" id="charts_env">

                <div class="panel-heading">
                    <div class="panel-title">Site Stats</div>

                    <div class="panel-options">
                        <ul class="nav nav-tabs">
                            <li class=""><a href="#area-chart" data-toggle="tab">Area Chart</a></li>
                            <li class="active"><a href="#line-chart" data-toggle="tab">Line Charts</a></li>
                            <li class=""><a href="#pie-chart" data-toggle="tab">Pie Chart</a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">

                    <div class="tab-content">

                        <div class="tab-pane" id="area-chart">
                            <div id="area-chart-demo" class="morrischart" style="height: 300px"></div>
                        </div>

                        <div class="tab-pane active" id="line-chart">
                            <div id="line-chart-demo" class="morrischart" style="height: 300px"></div>
                        </div>

                        <div class="tab-pane" id="pie-chart">
                            <div id="donut-chart-demo" class="morrischart" style="height: 300px;"></div>
                        </div>

                    </div>

                </div>

                <table class="table table-bordered table-responsive">

                    <thead>
                        <tr>
                            <th width="50%" class="col-padding-1">
                                <div class="pull-left">
                                    <div class="h4 no-margin">Pageviews</div>
                                    <small>54,127</small>
                                </div>
                                <span class="pull-right pageviews">4,3,5,4,5,6,5</span>

                            </th>
                            <th width="50%" class="col-padding-1">
                                <div class="pull-left">
                                    <div class="h4 no-margin">Unique Visitors</div>
                                    <small>25,127</small>
                                </div>
                                <span class="pull-right uniquevisitors">2,3,5,4,3,4,5</span>
                            </th>
                        </tr>
                    </thead>

                </table>

            </div>

        </div>

        <div class="col-sm-4">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>
                            Real Time Stats
                            <br />
                            <small>current server uptime</small>
                        </h4>
                    </div>

                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                        <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                    </div>
                </div>

                <div class="panel-body no-padding">
                    <div id="rickshaw-chart-demo">
                        <div id="rickshaw-legend"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <br />

    <div class="row">

        <div class="col-sm-4">

            <div class="panel panel-primary">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th class="padding-bottom-none text-center">
                                <br />
                                <br />
                                <span class="monthly-sales"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="panel-heading">
                                <h4>Monthly Sales</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="col-sm-8">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Latest Updated Profiles</div>

                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                        <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                    </div>
                </div>

                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Activity</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Art Ramadani</td>
                            <td>CEO</td>
                            <td class="text-center"><span class="inlinebar">4,3,5,4,5,6</span></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Ylli Pylla</td>
                            <td>Font-end Developer</td>
                            <td class="text-center"><span class="inlinebar-2">1,3,4,5,3,5</span></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Arlind Nushi</td>
                            <td>Co-founder</td>
                            <td class="text-center"><span class="inlinebar-3">5,3,2,5,4,5</span></td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <br /> --}}
@endsection