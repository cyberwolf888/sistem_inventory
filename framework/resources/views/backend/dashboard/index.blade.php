@extends('layouts.backend')

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
                        Backend </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Default Dashboard </a>
                </div>
            </div>
            <!-- <div class="kt-subheader__toolbar">
                <div class="kt-subheader__wrapper">
                    <a href="#" class="btn kt-subheader__btn-secondary">
                        Reports
                    </a>
                    <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="top">
                        <a href="#" class="btn btn-danger kt-subheader__btn-options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Products
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="la la-plus"></i> New Product</a>
                            <a class="dropdown-item" href="#"><i class="la la-user"></i> New Order</a>
                            <a class="dropdown-item" href="#"><i class="la la-cloud-download"></i> New Download</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="la la-cog"></i> Settings</a>
                        </div>
                    </div>
                </div>
            </div> -->
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
                                Omset Setiap Bulan di Tahun {{ date('Y') }}
                            </h3>
                        </div>

                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit">
                        <div class="kt-widget4 kt-widget4--sticky">
                            <div class="kt-widget4__chart">
                                <canvas id="kt_chart_trends_stats" style="height: 250px;"></canvas>
                            </div>
                        <!-- <div class="kt-widget4__items kt-widget4__items--bottom kt-portlet__space-x kt-margin-b-20">
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__img kt-widget4__img--logo">
                                            <img src="{{ asset('/') }}media/client-logos/logo3.png" alt="">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="#" class="kt-widget4__title">
                                                Phyton
                                            </a>
                                            <span class="kt-widget4__sub">
                                                A Programming Language
                                            </span>
                                        </div>
                                        <span class="kt-widget4__ext">
                                            <span class="kt-widget4__number kt-font-danger">+$17</span>
                                        </span>
                                    </div>
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__img kt-widget4__img--logo">
                                            <img src="{{ asset('/') }}media/client-logos/logo1.png" alt="">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="#" class="kt-widget4__title">
                                                FlyThemes
                                            </a>
                                            <span class="kt-widget4__sub">
                                                A Let's Fly Fast Again Language
                                            </span>
                                        </div>
                                        <span class="kt-widget4__ext">
                                            <span class="kt-widget4__number kt-font-danger">+$300</span>
                                        </span>
                                    </div>
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__img kt-widget4__img--logo">
                                            <img src="{{ asset('/') }}media/client-logos/logo2.png" alt="">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="#" class="kt-widget4__title">
                                                AirApp
                                            </a>
                                            <span class="kt-widget4__sub">
                                                Awesome App For Project Management
                                            </span>
                                        </div>
                                        <span class="kt-widget4__ext">
                                            <span class="kt-widget4__number kt-font-danger">+$6700</span>
                                        </span>
                                    </div>
                                </div> -->
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Trends-->
            </div>
            <div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">

                <!--begin:: Widgets/Sales Stats-->
                <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
                    <div class="kt-portlet__head kt-portlet__head--noborder">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Jumlah Transaksi Setiap Bulan di Tahun {{ date('Y') }}
                            </h3>
                        </div>

                    </div>
                    <div class="kt-portlet__body">

                        <!--begin::Widget 6-->
                        <div class="kt-widget15">
                            <div class="kt-widget15__chart">
                                <canvas id="kt_chart_sales_stats" style="height:250px;"></canvas>
                            </div>
                            <!-- <div class="kt-widget15__items kt-margin-t-40">
                                <div class="row">
                                    <div class="col">
                                        <div class="kt-widget15__item">
                                            <span class="kt-widget15__stats">
                                                63%
                                            </span>
                                            <span class="kt-widget15__text">
                                                Sales Grow
                                            </span>
                                            <div class="kt-space-10"></div>
                                            <div class="progress kt-widget15__chart-progress--sm">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="kt-widget15__item">
                                            <span class="kt-widget15__stats">
                                                54%
                                            </span>
                                            <span class="kt-widget15__text">
                                                Orders Grow
                                            </span>
                                            <div class="kt-space-10"></div>
                                            <div class="progress kt-progress--sm">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="kt-widget15__item">
                                            <span class="kt-widget15__stats">
                                                41%
                                            </span>
                                            <span class="kt-widget15__text">
                                                Profit Grow
                                            </span>
                                            <div class="kt-space-10"></div>
                                            <div class="progress kt-progress--sm">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 55%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="kt-widget15__item">
                                            <span class="kt-widget15__stats">
                                                79%
                                            </span>
                                            <span class="kt-widget15__text">
                                                Member Grow
                                            </span>
                                            <div class="kt-space-10"></div>
                                            <div class="progress kt-progress--sm">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 60%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="kt-widget15__desc">
                                            * lorem ipsum dolor sit amet consectetuer sediat elit
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <!--end::Widget 6-->
                    </div>
                </div>

                <!--end:: Widgets/Sales Stats-->
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
    // Trends Stats.
    // Based on Chartjs plugin - http://www.chartjs.org/
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
                labels: {!! $omset['label'] !!},
                datasets: [{
                    label: "Omset",
                    backgroundColor: gradient, // Put the gradient here as a fill color
                    borderColor: '#0dc8de',

                    pointBackgroundColor: Chart.helpers.color('#ffffff').alpha(0).rgbString(),
                    pointBorderColor: Chart.helpers.color('#ffffff').alpha(0).rgbString(),
                    pointHoverBackgroundColor: KTApp.getStateColor('danger'),
                    pointHoverBorderColor: Chart.helpers.color('#000000').alpha(0.2).rgbString(),

                    //fill: 'start',
                    data: {!! $omset['data'] !!}
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

    // Sales Stats.
    // Based on Chartjs plugin - http://www.chartjs.org/
    var salesStats = function() {
        if (!KTUtil.getByID('kt_chart_sales_stats')) {
            return;
        }

        var config = {
            type: 'line',
            data: {
                labels: {!! $jumlah_transaksi['label'] !!},
                datasets: [{
                    label: "Jumlah",
                    borderColor: KTApp.getStateColor('brand'),
                    borderWidth: 2,
                    //pointBackgroundColor: KTApp.getStateColor('brand'),
                    backgroundColor: KTApp.getStateColor('brand'),
                    pointBackgroundColor: Chart.helpers.color('#ffffff').alpha(0).rgbString(),
                    pointBorderColor: Chart.helpers.color('#ffffff').alpha(0).rgbString(),
                    pointHoverBackgroundColor: KTApp.getStateColor('danger'),
                    pointHoverBorderColor: Chart.helpers.color(KTApp.getStateColor('danger')).alpha(0.2).rgbString(),
                    data: {!! $jumlah_transaksi['data'] !!}
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
                    display: false,
                    labels: {
                        usePointStyle: false
                    }
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
                        }
                    }]
                },

                elements: {
                    point: {
                        radius: 3,
                        borderWidth: 0,

                        hoverRadius: 8,
                        hoverBorderWidth: 2
                    }
                }
            }
        };

        var chart = new Chart(KTUtil.getByID('kt_chart_sales_stats'), config);
    };

    // Class initialization on page load
    jQuery(document).ready(function() {
        trendsStats();
        salesStats();
    });
</script>
@endpush
