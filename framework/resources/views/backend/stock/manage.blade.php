@extends('layouts.backend')

@push('vendor_css')

@endpush

@push('page_css')

@endpush

@section('content')

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Stock Barang </h3>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('backend.dashboard') }}" class="kt-subheader__breadcrumbs-link">
                        Backend
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Stock Barang
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Manage
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Data Stock Barang
                    </h3>
                </div>

                @if(Auth::user()->type !=4)
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="{{ route('backend.barang.stock.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Tambah Data Baru
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="kt-portlet__body">
                <!--begin: Search Form -->
                <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-2 order-xl-1">
                            <div class="row align-items-center">
                                <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                    <div class="kt-input-icon kt-input-icon--left">
                                        <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                        <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                            <span><i class="la la-search"></i></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                    <div class="kt-form__group kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label>Status:</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <select class="form-control bootstrap-select" id="kt_form_status">
                                                <option value="">All</option>
                                                <option value="1">Ready</option>
                                                <option value="2">Sold</option>
                                                <option value="3">Retur</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end: Search Form -->
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">

                <!--begin: Datatable -->
                <div class="kt-datatable" id="json_data"></div>

                <!--end: Datatable -->
            </div>
        </div>
    </div>

    <!-- end:: Content -->

@endsection

@push('vendor_script')

@endpush

@push('page_script')
<script>
    "use strict";
    // Class definition

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var KTDatatableJsonRemoteDemo = function () {
        // Private functions

        // basic demo
        var demo = function () {

            var datatable = $('.kt-datatable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: '{{ route('backend.barang.stock.json_data') }}',
                    pageSize: 10,
                },
                order: [],

                // layout definition
                layout: {
                    scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                    footer: false // display/hide footer
                },

                // column sorting
                sortable: true,

                pagination: true,

                search: {
                    input: $('#generalSearch')
                },

                // columns definition
                columns: [
                    {
                        field: 'RecordID',
                        title: '#',
                        width: 20,
                        type: 'number',
                        //selector: {class: 'kt-checkbox--solid'},
                        textAlign: 'center',
                        template: function(row,i) {
                            return i+1;
                        }
                    },
                    {
                        field: 'id_barang',
                        title: 'Nama Barang',
                        template: function (row) {
                            return row.barang.name;
                        }
                    },
                    {
                        field: 'serial_number',
                        title: 'Serial Number'
                    },
                    {
                        field: 'location',
                        title: 'Lokasi'
                    },
                    {
                        field: 'receive_date',
                        title: 'Tanggal Masuk',
                        type: 'date',
                        format: 'DD/MM/YYYY',
                    },
                    {
                        field: 'status',
                        title: 'Status',
                        // callback function support for column rendering
                        template: function(row) {
                            var status = {
                                1: {'title': 'Ready', 'class': 'kt-badge--info'},
                                2: {'title': 'Sold', 'class': ' kt-badge--success'},
                                3: {'title': 'Retur', 'class': 'kt-badge--danger'}
                            };
                            return '<span class="kt-badge ' + status[row.status].class + ' kt-badge--inline kt-badge--pill">' + status[row.status].title + '</span>';
                        },
                    },

                    {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        width: 110,
                        autoHide: false,
                        overflow: 'visible',
                        template: function(row) {
                            @if(Auth::user()->type != 4)
                            return '\
                                <a href="' + row.link_edit + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit Data">\
                                    <i class="la la-edit"></i>\
                                </a>\
                            ';
                            @else
                                return 'No Action';
                            @endif
                        },
                    }

                    ],

            });

        $('#kt_form_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'status');
        });

        $('#kt_form_status,#kt_form_type').selectpicker();

        };

        return {
            // public functions
            init: function () {
                demo();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTDatatableJsonRemoteDemo.init();
    });
</script>
@endpush
