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
                    <a href="{{ route('backend.barang.stock.manage') }}" class="kt-subheader__breadcrumbs-link">
                        Stock Barang
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        @if(isset($update))
                            Edit Data
                        @else
                            Tambah Data
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-grid__item kt-grid__item--fluid">
        <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Form Stock Barang
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        {!! Form::open(['route' => isset($update) ? ['backend.barang.stock.update', $model->id] :'backend.barang.stock.store', 'method' => 'post', 'class'=>'kt-form']) !!}
                            <div class="kt-portlet__body">

                                @if (count($errors) > 0)
                                <div class="form-group form-group-last">
                                    <div class="alert alert-danger " role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                        <div class="alert-text">
                                            <h4 class="alert-heading">Ooppss ada error.</h4>
                                            @foreach ($errors->all() as $error)
                                                <p><i class="fa fa-exclamation"></i> &nbsp; {{ $error }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="form-group">
                                    {!! Form::label('id_barang', 'Barang'); !!}
                                    {!! Form::select('id_barang', \App\Models\Barang::where('status','1')->get()->pluck('nama_sku','id'), $model->id_barang, ['class'=>'form-control','required']); !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('serial_number', 'Serial Number'); !!}
                                    {!! Form::text('serial_number', $model->serial_number, ['class'=>'form-control','required']); !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('receive_date', 'Tanggal Masuk'); !!}
                                    {!! Form::text('receive_date', $model->receive_date, ['class'=>'form-control','required']); !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('status', 'Status'); !!}
                                    {!! Form::select('status', ['1'=>'Ready','2'=>'Sold','3'=>'Retur'], $model->status, ['class'=>'form-control','required']); !!}
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('backend.barang.stock.manage') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                        {!! Form::close() !!}
                        <!--end::Form-->

                    </div>

                    <!--end::Portlet-->
                </div>
        </div>
    </div>
    <!-- end:: Content -->



@endsection

@push('vendor_script')

@endpush

@push('page_script')

@endpush
