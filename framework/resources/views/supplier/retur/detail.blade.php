@extends('layouts.supplier')

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
                    Retur </h3>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('supplier.dashboard') }}" class="kt-subheader__breadcrumbs-link">
                        Supplier
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('supplier.retur.manage') }}" class="kt-subheader__breadcrumbs-link">
                        Retur
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
                                Retur
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->

                    <div class="kt-portlet__body">

                        <div class="form-group">
                            {!! Form::label('no_faktur', 'No Faktur'); !!}
                            <p class="form-control-static">{{ $model->id }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('id_supplier', 'Supplier'); !!}
                            <p class="form-control-static">{{ $model->supplier->name }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('retur_date', 'Tanggal Retur'); !!}
                            <p class="form-control-static">{{ date('d/m/Y',strtotime($model->retur_date)) }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Keterangan'); !!}
                            <p class="form-control-static">{{ $model->description }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status'); !!}
                            <p class="form-control-static">{{ ['1'=>'Proses di Gudang','2'=>'Dikirim Ke Vendor','3'=>'Proses di Vendor','4'=>'Selesai'][$model->status]}}</p>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <a href="{{ route('supplier.retur.manage') }}" class="btn btn-secondary">Kembali</a>
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
                                <td>{{ $detail->stock->barang->name }}</td>
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
