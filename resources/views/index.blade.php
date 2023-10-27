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
    
    {{-- 
    Morris.Bar({
        element: 'chart3',
        axes: true,
        data: [
            {x: '2013 Q1', y: getRandomInt(1,10), z: getRandomInt(1,10), a: getRandomInt(1,10)},
            {x: '2013 Q2', y: getRandomInt(1,10), z: getRandomInt(1,10), a: getRandomInt(1,10)},
            {x: '2013 Q3', y: getRandomInt(1,10), z: getRandomInt(1,10), a: getRandomInt(1,10)},
            {x: '2013 Q4', y: getRandomInt(1,10), z: getRandomInt(1,10), a: getRandomInt(1,10)}
        ],
        xkey: 'x',
        ykeys: ['y', 'z', 'a'],
        labels: ['Facebook', 'LinkedIn', 'Google+'],
        barColors: ['#707f9b', '#455064', '#242d3c'],
        barColors: function (row, series, type) {
            console.log("--> "+row.label, series, type);
            if(row.label == "Person A") return "#AD1D28";
            else if(row.label == "Person B") return "#DEBB27";
            else if(row.label == "Person C") return "#fec04c";
            else if(row.label == "Person D") return "#1AB244";
        }
    });
     --}}
    @php
        $script = '<script type="text/javascript">';
        $script .= "jQuery(document).ready(function($) { Morris.Bar({ element: 'chart3', axes: true, data: [ ";
        $count = $hospitals->count();

        // Hitung Total Pasien per Tahun
        if ($hospitals) {
            $i = 1;
            foreach ($hospitals as $item) {
                $script .= "{x: '". $item->name ."', y: ". $item->patients->count() ."}, ";
                $i++;
            }
        }
        $script .= "], ";
        $script .= "xkey: 'x', ykeys: ['y'], labels: ['Total Pasien'], stacked: true, xLabelAngle: '10', gridTextSize: 10, resize: 'true', barColors: function (row, series, type) { ";

        // Hitung Total Pasien per Rumah Sakit
        // $script .= "xkey: 'y', ykeys: [";
        if ($hospitals) {
            $i = 1;
            foreach ($hospitals as $item) {
                $script .= "if (row.label == '". $item->name ."') return '". $item->background ."';";
                // if ($i < $count) $script .= ', ';
                $i++;
            }
        }
        $script .= "} }) }) </script>";
        // $script .= "], labels: [";
        // if ($hospitals) {
        //     $i = 1;
        //     foreach ($hospitals as $item) {
        //         $script .= '"' . $item->name . '"';
        //         if ($i < $count) $script .= ', ';
        //         $i++;
        //     }
        // }
        // $script .= "], redraw: true });";
        // $script .= "line_chart_demo.parent().attr('style', ''); console.log(line_chart_demo) }); </script>";

        echo $script;
    @endphp

    @php
        $script = '<script type="text/javascript">jQuery(document).ready(function($) { var donut_chart_demo = $("#donut-chart-demo"); donut_chart_demo.parent().show();';
        $script .= "var donut_chart = Morris.Donut({ element: 'donut-chart-demo', data: [";
        if ($hospitals) {
            $i = 1;
            foreach ($hospitals as $item) {
                $script .= "{label: '". $item->name ."', value: ". $item->patients->count() ."}, ";
                $i++;
            }
        }
        $script .= '], colors: [';
        if ($hospitals) {
            $i = 1;
            foreach ($hospitals as $item) {
                $script .= "'". $item->background ."'";
                if ($i < $count) $script .= ', ';
                $i++;
            }
        }
        $script .= "] }); donut_chart_demo.parent().attr('style', ''); }); </script>";
        echo $script;
    @endphp
    <script type="text/javascript">
        // jQuery(document).ready(function($)
        // {        
        //     // Donut Chart
        //     var donut_chart_demo = $("#donut-chart-demo");
        
        //     donut_chart_demo.parent().show();
        //     console.log(donut_chart_demo);
        
        //     var donut_chart = Morris.Donut({
        //         element: 'donut-chart-demo',
        //         data: [
        //             {label: "Download Sales", value: getRandomInt(10,50)},
        //             {label: "In-Store Sales", value: getRandomInt(10,50)},
        //             {label: "Mail-Order Sales", value: getRandomInt(10,50)}
        //         ],
        //         colors: ['#707f9b', '#455064', '#242d3c']
        //     });
        
        //     donut_chart_demo.parent().attr('style', '');
        // });
        
        function getRandomInt(min, max)
        {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
    </script>
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
                                            <h4 style="color: {{ $action->color }}">{{ $action->name }}</h4>
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

    <div class="row">
        {{-- Bar Chart --}}
        <div class="col-lg-6 col-xs-12">
            <div class="panel panel-primary" id="charts_env">
                <div class="panel-heading">
                    <div class="panel-title">Monitoring Pasien</div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="line-chart">
                            <div id="chart3" style="height: 300px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pie Chart --}}
        <div class="col-lg-6 col-xs-12">
            <div class="panel panel-primary" id="charts_env">
                <div class="panel-heading">
                    <div class="panel-title">Monitoring Pasien</div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="pie-chart">
                            <div id="donut-chart-demo" class="morrischart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-sm-4">

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

        </div> --}}
    </div>


    {{-- <br />

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