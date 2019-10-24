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
        {!! Form::open(['route' => isset($update) ? ['backend.barang_masuk.update', $model->id] :'backend.barang_masuk.store', 'method' => 'post', 'class'=>'kt-form']) !!}
        <div class="row">
                <div class="col-md-6">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Form Barang Masuk
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->

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
                                    {!! Form::label('no_faktur', 'No Faktur'); !!}
                                    {!! Form::text('no_faktur', $model->no_faktur, ['class'=>'form-control','required']); !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('id_vendor', 'Vendor'); !!}
                                    {!! Form::select('id_vendor', App\Models\Vendor::where('status','1')->pluck('name','id'), $model->id_vendor, ['class'=>'form-control','required']); !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('transaction_date', 'Tanggal Transaksi'); !!}
                                    {!! Form::text('transaction_date', isset($update) ? date('d/m/Y',strtotime($model->transaction_date)) : null, ['id'=>'transaction_date', 'class'=>'form-control','required']); !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('total', 'Total Transaksi'); !!}
                                    {!! Form::text('total', $model->total, ['class'=>'form-control','required']); !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('description', 'Keterangan'); !!}
                                    {!! Form::textArea('description', $model->description, ['class'=>'form-control','required', 'rows'=>'3']); !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('status', 'Status'); !!}
                                    {!! Form::select('status', ['1'=>'Selesai','2'=>'Proses'], $model->status, ['class'=>'form-control','required']); !!}
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('backend.barang_masuk.manage') }}" class="btn btn-secondary">Batal</a>
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

                            <div id="detail_form">
                                @if(!isset($update))
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                {!! Form::label('id_barang','Barang'); !!}
                                                {!! Form::select('id_barang[]', \App\Models\Barang::where('status','1')->get()->pluck('nama_sku','id'), null, ['class'=>'form-control','required']); !!}
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                {!! Form::label('serial_number', 'Serial Number'); !!}
                                                {!! Form::text('serial_number[]', null, ['class'=>'form-control','required']); !!}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @foreach($model->detail as $detail_key => $detail)
                                        @if($detail_key == 0)
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {!! Form::label('id_barang','Barang'); !!}
                                                        {!! Form::select('id_barang[]', \App\Models\Barang::where('status','1')->get()->pluck('nama_sku','id'), $detail->id_barang, ['class'=>'form-control','required']); !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {!! Form::label('serial_number', 'Serial Number'); !!}
                                                        {!! Form::text('serial_number[]', null, ['class'=>'form-control','required']); !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row" id="detail_{{ $detail_key }}">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {!! Form::label('id_barang','Barang'); !!}
                                                        {!! Form::select('id_barang[]', \App\Models\Barang::where('status','1')->get()->pluck('nama_sku','id'), $detail->id_barang, ['class'=>'form-control','required']); !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {!! Form::label('serial_number', 'Serial Number'); !!}
                                                        {!! Form::text('serial_number[]', null, ['class'=>'form-control','required']); !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        {!! Form::label('detail_value', 'hapus',['style'=>'visibility:hidden']); !!}
                                                        <button type="button" class="btn btn-danger btn-hapus" onClick="hapus_detail({{ $detail_key }})">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" class="btn btn-primary" id="btn_tambah">Tambah</button>

                        </div>
                    </div>
                    <!--end::Portlet-->
                </div>

        </div>
        {!! Form::close() !!}
    </div>
    <!-- end:: Content -->



@endsection

@push('vendor_script')

@endpush

@push('page_script')
<script>
    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }
    $('#transaction_date').datepicker({
        rtl: KTUtil.isRTL(),
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        autoclose: true,
        orientation: "bottom left",
        templates: arrows
    });

    var no_detail = {{ $model->detail->count()+1 }};
    $("#btn_tambah").click(function () {
        var detail_form = $("#detail_form");
        var data = '<div class="row" id="detail_'+ no_detail + '">\n' +
            '                                    <div class="col-md-5">\n' +
            '                                        <div class="form-group">\n' +
            '                                            {!! Form::label('id_barang','Barang'); !!}\n' +
            '                                            {!! Form::select('id_barang[]', \App\Models\Barang::where('status','1')->get()->pluck('nama_sku','id'), null, ['class'=>'form-control','required']); !!}\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-md-5">\n' +
            '                                        <div class="form-group">\n' +
            '                                            {!! Form::label('serial_number', 'Serial Number'); !!}\n' +
            '                                            {!! Form::text('serial_number[]', null, ['class'=>'form-control','required']); !!}\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-md-2">\n' +
            '                                        <div class="form-group">\n' +
            '                                             {!! Form::label('detail_value', 'hapus',['style'=>'visibility:hidden']); !!}\n' +
            '                                            <button type="button" class="btn btn-danger btn-hapus" onClick="hapus_detail('+no_detail+')">Hapus</button>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                </div>';
        detail_form.append(data);
        no_detail++;
    });
    function hapus_detail(no_detail){
        $("#detail_"+no_detail).remove();
    }
</script>
@endpush
