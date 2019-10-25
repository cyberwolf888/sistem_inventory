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
                    Barang Keluar </h3>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('backend.dashboard') }}" class="kt-subheader__breadcrumbs-link">
                        Backend
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('backend.barang_keluar.manage') }}" class="kt-subheader__breadcrumbs-link">
                        Barang Keluar
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
                                Barang Keluar
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
                            <p class="form-control-static">{{ ['1'=>'Selesai','2'=>'Pesanan Supplier','3'=>'Sudah Dibayar','4'=>'Dikirim ke Supplier','5'=>'Dibatalkan'][$model->status]}}</p>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <a href="{{ route('backend.barang_keluar.manage') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>

                    <!--end::Form-->

                </div>

                <!--end::Portlet-->
            </div>

            <div class="col-md-6">
                @if(!is_null($model->pemesanan))
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Detail Barang Yang Dipesan
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Harga</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach($model->pemesanan->detail as $detail)
                                <tr>
                                    <th scope="row">{{ $no }}</th>
                                    <td>{{ $detail->barang->name }}</td>
                                    <td>{{ $detail->qty }}</td>
                                    <td>{{ number_format($detail->price,0,',','.') }}</td>
                                </tr>
                                @php $no++; @endphp
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                <!--end::Portlet-->
                @endif

                @if(!is_null($model->detail) && count($model->detail)>0)
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Detail Barang Yang Dikirim
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
                @endif

                @if(!is_null($model->pemesanan) && !is_null($model->pemesanan->pembayaran))
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Detail Pembayaran
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        @if($model->status == 2)
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('backend.barang_keluar.terima_pembayaran', $model->id) }}" class="btn btn-success btn-elevate btn-icon-sm">
                                    <i class="la la-check"></i>
                                    Terima Pembayaran
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('backend.barang_keluar.tolak_pembayaran', $model->id) }}" class="btn btn-danger btn-elevate btn-icon-sm">
                                    <i class="la la-close"></i>
                                    Tolak Pembayaran
                                </a>
                            </div>
                        </div>
                        <br>
                        @endif
                        <img src="{{ url('images/'.$model->pemesanan->pembayaran->images) }}" width="500">

                    </div>
                </div>
                <!--end::Portlet-->
                @endif
            </div>

        </div>

    </div>
    <!-- end:: Content -->



@endsection

@push('vendor_script')

@endpush

@push('page_script')

@endpush
