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
                    Pembayaran </h3>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('supplier.dashboard') }}" class="kt-subheader__breadcrumbs-link">
                        Supplier
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('supplier.pembayaran.create', $pemesanan->id) }}" class="kt-subheader__breadcrumbs-link">
                        Pembayaran
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
        <!--begin::Form-->
        {!! Form::open(['route' =>  ['supplier.pembayaran.store', $pemesanan->id], 'method' => 'post', 'files' => true, 'class'=>'kt-form']) !!}
        <div class="row">

                <div class="col-md-6">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Form Pembayaran
                                </h3>
                            </div>
                        </div>
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
                                {!! Form::label('id_transaksi', 'No. Transaksi'); !!}
                                {!! Form::text('id_transaksi', $pemesanan->id, ['class'=>'form-control','readonly']); !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('image', 'Bukti Pembayaran'); !!}
                                {!! Form::file('image',['class'=>'form-control', 'accept'=>'image/jpeg,image/gif,image/png']); !!}
                            </div>

                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('supplier.pemesanan.detail', $pemesanan->id) }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Portlet-->
                </div>

                <div class="col-md-6">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Detail Pemesanan
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">

                            <div class="form-group">
                                {!! Form::label('transaction_date', 'Tanggal Transaksi'); !!}
                                <p class="form-control-static">{{ date('d/m/Y',strtotime($pemesanan->created_at)) }}</p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('total', 'Total Transaksi'); !!}
                                <p class="form-control-static">Rp. {{ number_format($pemesanan->barang_keluar->total,0,',','.') }}</p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Keterangan'); !!}
                                <p class="form-control-static">{{ $pemesanan->description }}</p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('status', 'Status'); !!}
                                <p class="form-control-static">{{ ['1'=>'Selesai','2'=>'Belum Dibayar','3'=>'Sudah Dibayar','4'=>'Sedang Dikirim','5'=>'Dibatalkan'][$pemesanan->barang_keluar->status]}}</p>
                            </div>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($pemesanan->detail as $detail)
                                    <tr>
                                        <th scope="row">{{ $no }}</th>
                                        <td>{{ $detail->barang->name }}</td>
                                        <td>{{ $detail->qty }}</td>
                                        <td>{{ number_format($detail->barang->price,0,',','.') }}</td>
                                        <td>{{ number_format($detail->qty*$detail->barang->price,0,',','.') }}</td>
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
        {!! Form::close() !!}
        <!--end::Form-->
    </div>
    <!-- end:: Content -->



@endsection

@push('vendor_script')

@endpush

@push('page_script')
@endpush
