@extends('layouts.supplier')

@push('vendor_css')
<link href="{{ asset('/') }}plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
@endpush

@push('page_css')

@endpush

@section('content')

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Dashboard </h3>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Supplier </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Default Dashboard </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Subheader -->


    <!-- begin:: Content -->
    <div class="kt-container  kt-grid__item kt-grid__item--fluid">

            <!--Begin::Dashboard 3-->

            <!--Begin::Row-->
            <div class="row">

                <div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">

                    <!--begin:: Widgets/Trends-->
                    <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
                        <div class="kt-portlet__head kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Barang Yang Paling Sering Dibeli
                                </h3>
                            </div>

                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit">
                            <div class="kt-widget4 kt-widget4--sticky">
                                <div class="kt-widget4__chart">
                                    <canvas id="kt_chart_trends_stats" style="height: 240px;"></canvas>
                                </div>
                                <div class="kt-widget4__items kt-widget4__items--bottom kt-portlet__space-x kt-margin-b-20">
                                    @foreach($data as $row)
                                        <div class="kt-widget4__item">
                                            <div class="kt-widget4__img kt-widget4__img--logo">
                                                <img src="{{ url('images/'.$row->image) }}" alt="" width="50px" height="50px">
                                            </div>
                                            <div class="kt-widget4__info">
                                                <a href="#" class="kt-widget4__title">
                                                    {{ $row->name }}
                                                </a>
                                            </div>
                                            <span class="kt-widget4__ext">
                                            <span class="kt-widget4__number kt-font-danger">{{ $row->jumlah }} Unit</span>
                                        </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end:: Widgets/Trends-->
                </div>

                <div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">

                    <!--begin:: Widgets/Trends-->
                    <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
                        <div class="kt-portlet__head kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Barang Terbaru
                                </h3>
                            </div>

                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit">
                            <div class="kt-widget4 kt-widget4--sticky">
                                <div class="kt-widget4__items kt-portlet__space-x kt-margin-b-20">
                                    @foreach($barang as $row)
                                        <div class="kt-widget4__item">
                                            <div class="kt-widget4__img kt-widget4__img--logo">
                                                <img src="{{ url('images/'.$row->image) }}" alt="" width="50px" height="50px">
                                            </div>
                                            <div class="kt-widget4__info">
                                                <a href="#" class="kt-widget4__title">
                                                    {{ $row->name }} ({{ $row->sku }})
                                                </a>
                                                <span class="kt-widget4__sub">
                                                    Rp. {{ number_format($row->price,0,',','.') }}
                                                </span>
                                            </div>
                                            <span class="kt-widget4__ext">
                                            <span class="kt-widget4__number kt-font-danger">{{ $row->stock == 0 ? 'KOSONG' : $row->stock }}</span>
                                        </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end:: Widgets/Trends-->
                </div>

            </div>

            <!--End::Row-->

            <!--End::Dashboard 3-->
        </div>

        <!-- end:: Content -->

@endsection

@push('vendor_script')
<script src="{{ asset('/') }}plugins/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
<script src="{{ asset('/') }}plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>
@endpush

@push('page_script')
<script>
    var trendsStats = function() {
        if ($('#kt_chart_trends_stats').length == 0) {
            return;
        }
        var ctx = document.getElementById("kt_chart_trends_stats").getContext("2d");

        var gradient = ctx.createLinearGradient(0, 0, 0, 240);
        gradient.addColorStop(0, Chart.helpers.color('#00c5dc').alpha(0.7).rgbString());
        gradient.addColorStop(1, Chart.helpers.color('#f2feff').alpha(0).rgbString());

        var config = {
            type: 'line',
            data: {
                labels: {!! $chart['label'] !!},
                datasets: [{
                    label: "Pembelian",
                    backgroundColor: gradient, // Put the gradient here as a fill color
                    borderColor: '#0dc8de',

                    pointBackgroundColor: Chart.helpers.color('#ffffff').alpha(0).rgbString(),
                    pointBorderColor: Chart.helpers.color('#ffffff').alpha(0).rgbString(),
                    pointHoverBackgroundColor: KTApp.getStateColor('danger'),
                    pointHoverBorderColor: Chart.helpers.color('#000000').alpha(0.2).rgbString(),

                    //fill: 'start',
                    data: {!! $chart['data'] !!}
                }]
            },
            options: {
                title: {
                    display: false,
                },
                tooltips: {
                    intersect: false,
                    mode: 'nearest',
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                legend: {
                    display: false
                },
                responsive: true,
                maintainAspectRatio: false,
                hover: {
                    mode: 'index'
                },
                scales: {
                    xAxes: [{
                        display: false,
                        gridLines: false,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: false,
                        gridLines: false,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                elements: {
                    line: {
                        tension: 0.19
                    },
                    point: {
                        radius: 4,
                        borderWidth: 12
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 5,
                        bottom: 0
                    }
                }
            }
        };

        var chart = new Chart(ctx, config);
    };

    jQuery(document).ready(function() {
        trendsStats();
    });
</script>
@endpush
