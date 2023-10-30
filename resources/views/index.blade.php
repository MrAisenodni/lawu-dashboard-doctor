@extends('layouts.main')

@section('title', $c_menu->title)

@section('styles')
    <!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{ asset('/js/select2/select2-bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/select2/select2.css') }}">

    {{-- ApexChart --}}
    <link href="{{ asset('/js/simplebar/css/simplebar.css') }}" rel="stylesheet" />
@endsection

@section('scripts')
    <!-- Imported scripts on this page -->
    <script src="{{ asset('/js/select2/select2.min.js') }}"></script>

    {{-- ApexChart --}}
    <script src="{{ asset('/js/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/js/simplebar/js/simplebar.min.js') }}"></script>

    {{-- Morris --}}
	<script src="{{ asset('/js/raphael-min.js') }}"></script>
	<script src="{{ asset('/js/morris.min.js') }}"></script>
    
    @php
        $count = $hospitals->count();

        $script = '<script type="text/javascript">jQuery(document).ready(function($) { var donut_chart_demo = $("#donut-chart-demo"); donut_chart_demo.parent().show();';
        $script .= "var donut_chart = Morris.Donut({ element: 'donut-chart-demo', data: [";
        if ($hospitals) {
            $i = 1;
            foreach ($hospitals as $item) {
                $script .= "{label: '". $item->name ."', value: ". $c_hospital->getCount($item->id, $search) ."}, ";
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
        $(function() {
            "use strict";
            var hospital = {!! json_encode($hospitals->toArray()) !!}
            var patient = {!! json_encode($patients->toArray()) !!}

            const monthNames = ["Jan", "Feb", "Mar", "Apr",
                                "May", "Jun", "Jul", "Aug",
                                "Sep", "Oct", "Nov", "Dec"
                            ];
            const data = []
            const color = []

            if (hospital) {
                for (let i = 0; i < hospital.length; i++) {
                    var title = hospital[i].name
                    const data_patient = []

                    if (patient) {
                        for (let a = 0; a < patient.length; a++) {
                            if (patient[a].hospital_id == hospital[i].id) {
                                const year = new Date(patient[a].registration_date)
                                const month = new Date(patient[a].registration_date)

                                data_patient.push({
                                    x: monthNames[month.getMonth()] + '-' + year.getFullYear(),
                                    y: patient[a].count_patient,
                                })
                            }
                            else {
                                false
                            }
                        }
                    }

                    data.push({
                        name: title,
                        data: data_patient,
                    })
                    color.push(hospital[i].background)
                }
            }

            var options = {
                series: data,
                    chart: {
                    type: 'bar',
                    height: 300,
                },
                xaxis: {
                    labels: {
                        rotate: -45,
                        rotateAlways: true,
                        show: true,
                        style: {
                            colors: ['#000'],
                            fontSize: '9px',
                        }
                    },
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    offsetY: -20,
                    offsetX: 0,
                    style: {
                        fontSize: '9px',
                        colors: ['#000'],
                    }
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#000']
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    followCursor: true,
                },
                fill: {
                    colors: color,
                },
                legend: {
                    position: 'top',
                    show: true,
                    showForSingleSeries: true,
                    customLegendItems: ['p1', 'p2', 'p3'],
                    markers: {
                        fillColors: color
                    }
                }
            }
                
            var chart = new ApexCharts(document.querySelector("#chart-group"), options);
            chart.render();
        })
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
    <div class="row" style="align-content: center">
        <div class="col-lg-12 col-xs-12">
            <form class="g-3" action="{{ $c_menu->url }}" method="GET">
                @method('get')
                @csrf
                <div class="row mb-2">
                    <div class="col-lg-5 col-xs-5" style="padding-right: 0">
                        <select class="select2 @error('search') validate-has-error @enderror" id="search" name="search">
                            <option value="" @if (old('search', $search)) selected @endif>SEMUA</option>
                            @if ($months)
                                @foreach ($months as $item)
                                    <option value="{{ date('Y-m', strtotime($item->registration_date)) }}" @if (date('Y-m', strtotime($item->registration_date)) == old('search', $search)) selected @endif>{{ date('M-Y', strtotime($item->registration_date)) }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-lg-1 col-xs-1" style="padding-left: 5px">
                        <button class="btn btn-success" type="submit"><i class="entypo-search text-white"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
                                <h2 class="fw-bold" style="color: {{ $item->color }}; margin-bottom: 5px; margin-top: 5px" data-start="0" 
                                    data-end="{{ $c_hospital->getCount($item->id, $search) }}" data-postfix="" data-duration="1000" data-delay="0"
                                >
                                    {{ $c_hospital->getCount($item->id, $search) }}
                                </h2>

                                @if ($assurances)
                                    @foreach ($assurances as $assurance)
                                        <div class="row" style="margin-left: 0.5px; margin-right: 0.5px">
                                            <div class="tile-stats col-sm-12 col-xs-12" style="background: {{ $assurance->background }}; padding: 10px">
                                                <h4 style="color: {{ $assurance->color }}; margin-top: 0px; margin-bottom: 0px">Pasien {{ $assurance->name }}</h4>
                                                <h2 class="fw-bold" style="color: {{ $assurance->color }}; margin-top: 0px; margin-bottom: 0px" 
                                                    data-start="0" data-end="{{ $c_assurance->getCount($assurance->id, $item->id, $search) }}" data-postfix="" data-duration="1000" data-delay="0"
                                                >
                                                    {{ $c_assurance->getCount($assurance->id, $item->id, $search) }}
                                                </h2>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        @if ($actions)
                            @foreach ($actions as $action)
                                <div class="col-sm-3 col-xs-12">
                                    <div class="tile-stats tile-red" style="background: {{ $action->background }}">
                                        <div class="icon"><i class="entypo-users"></i></div>
                                        <h4 style="color: {{ $action->color }}">{{ $action->name }}</h4>
                                        <h2 class="fw-bold" style="color: {{ $action->color }}; margin-bottom: 5px; margin-top: 5px" data-start="0" 
                                            data-end="{{ $c_action->getCount($action->id, $item->id, $search) }}" data-postfix="" data-duration="1000" data-delay="0"
                                        >
                                            {{ $c_action->getCount($action->id, $item->id, $search) }}
                                        </h2>
                                    </div>
                                </div>
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
                            <div id="legend" class="chart-legend mt-0 mb-24pt justify-content-start"></div>
                            <div id="chart-group" style="height: 350px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pie Chart --}}
        <div class="col-lg-6 col-xs-12">
            <div class="panel panel-primary" id="charts_env">
                <div class="panel-heading">
                    <div class="panel-title">Monitoring Pasien @if ($search) <span class="text-danger fw-bold">{{ date('M-Y', strtotime($search)) }}</span> @else <span class="text-danger fw-bold">Semua Tanggal</span> @endif</div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="pie-chart">
                            <div id="donut-chart-demo" class="morrischart" style="height: 350px;"></div>
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