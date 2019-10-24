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
                    Barang Masuk </h3>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('backend.dashboard') }}" class="kt-subheader__breadcrumbs-link">
                        Backend
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('backend.barang_masuk.manage') }}" class="kt-subheader__breadcrumbs-link">
                        Barang Masuk
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Detail
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-grid__item kt-grid__item--fluid">

        <div class="row">
            <div class="col-md-6">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Barang Masuk
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->

                    <div class="kt-portlet__body">

                        <div class="form-group">
                            {!! Form::label('no_faktur', 'No Faktur'); !!}
                            <p class="form-control-static">{{ $model->no_faktur }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('id_vendor', 'Vendor'); !!}
                            <p class="form-control-static">{{ $model->vendor->name }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('transaction_date', 'Tanggal Transaksi'); !!}
                            <p class="form-control-static">{{ date('d/m/Y',strtotime($model->transaction_date)) }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('total', 'Total Transaksi'); !!}
                            <p class="form-control-static">Rp. {{ number_format($model->total,0,',','.') }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Keterangan'); !!}
                            <p class="form-control-static">{{ $model->description }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status'); !!}
                            <p class="form-control-static">{{ ['1'=>'Selesai','2'=>'Proses'][$model->status]}}</p>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <a href="{{ route('backend.barang_masuk.manage') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>

                    <!--end::Form-->

                </div>

                <!--end::Portlet-->
            </div>

            <div class="col-md-6">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Detail Barang
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Serial Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach($model->detail as $detail)
                            <tr>
                                <th scope="row">{{ $no }}</th>
                                <td>{{ $detail->barang->name }}</td>
                                <td>{{ $detail->stock->serial_number }}</td>
                            </tr>
                            @php $no++; @endphp
                            @endforeach
                            </tbody>
                        </table>

                    </div>
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
