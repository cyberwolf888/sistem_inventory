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
                    Barang </h3>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('backend.dashboard') }}" class="kt-subheader__breadcrumbs-link">
                        Backend
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('backend.barang.data.manage') }}" class="kt-subheader__breadcrumbs-link">
                        Barang
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
        {!! Form::open(['route' => isset($update) ? ['backend.barang.data.update', $model->id] :'backend.barang.data.store', 'method' => 'post', 'files' => true, 'class'=>'kt-form']) !!}
        <div class="row">

                <div class="col-md-6">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Form Barang
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
                                {!! Form::label('name', 'Nama Barang'); !!}
                                {!! Form::text('name', $model->name, ['class'=>'form-control','required']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('id_category', 'Kategori'); !!}
                                {!! Form::select('id_category', App\Models\Category::where('status','1')->pluck('name','id'), $model->id_category, ['class'=>'form-control','required']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('sku', 'Kode SKU'); !!}
                                {!! Form::text('sku', $model->sku, ['class'=>'form-control','required']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('id_vendor', 'Vendor'); !!}
                                {!! Form::select('id_vendor', App\Models\Vendor::where('status','1')->pluck('name','id'), $model->vendor, ['class'=>'form-control','required']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('price', 'Harga'); !!}
                                {!! Form::text('price', $model->price, ['class'=>'form-control','required']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('warranty', 'Garansi (bulan)'); !!}
                                {!! Form::text('warranty', $model->warranty, ['class'=>'form-control','required']); !!}
                            </div>
                            @if(isset($update))
                            <div class="form-group">
                                <img class="img-responsive" src="{{ url('images/'.$model->image) }}" style="max-width: 200px; max-height: 200px;">
                            </div>
                            @endif
                            <div class="form-group">
                                {!! Form::label('image', 'Gambar Barang'); !!}
                                {!! Form::file('image',['class'=>'form-control']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('status', 'Status'); !!}
                                {!! Form::select('status', ['1'=>'Aktif','2'=>'Tidak Aktif'], $model->status, ['class'=>'form-control','required']); !!}
                            </div>

                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('backend.barang.data.manage') }}" class="btn btn-secondary">Batal</a>
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
                                            {!! Form::label('detail_option','Spesifikasi'); !!}
                                            {!! Form::text('detail_option[]', null, ['class'=>'form-control','required']); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            {!! Form::label('detail_value', 'Nilai'); !!}
                                            {!! Form::text('detail_value[]', null, ['class'=>'form-control','required']); !!}
                                        </div>
                                    </div>
                                </div>
                                @else
                                    @foreach($model->detail as $detail_key => $detail)
                                        @if($detail_key == 0)
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {!! Form::label('detail_option','Spesifikasi'); !!}
                                                        {!! Form::text('detail_option[]', $detail->option, ['class'=>'form-control','required']); !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {!! Form::label('detail_value', 'Nilai'); !!}
                                                        {!! Form::text('detail_value[]', $detail->value, ['class'=>'form-control','required']); !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row" id="detail_{{ $detail_key }}">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {!! Form::label('detail_option','Spesifikasi'); !!}
                                                        {!! Form::text('detail_option[]', $detail->option, ['class'=>'form-control','required']); !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {!! Form::label('detail_value', 'Nilai'); !!}
                                                        {!! Form::text('detail_value[]', $detail->value, ['class'=>'form-control','required']); !!}
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
        <!--end::Form-->
    </div>
    <!-- end:: Content -->



@endsection

@push('vendor_script')

@endpush

@push('page_script')
<script>
    var no_detail = {{ $model->detail->count()+1 }};
    $("#btn_tambah").click(function () {
        var detail_form = $("#detail_form");
        var data = '<div class="row" id="detail_'+ no_detail + '">\n' +
            '                                    <div class="col-md-5">\n' +
            '                                        <div class="form-group">\n' +
            '                                            {!! Form::label('detail_option','Spesifikasi'); !!}\n' +
            '                                            {!! Form::text('detail_option[]', null, ['class'=>'form-control','required']); !!}\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-md-5">\n' +
            '                                        <div class="form-group">\n' +
            '                                            {!! Form::label('detail_value', 'Nilai'); !!}\n' +
            '                                            {!! Form::text('detail_value[]', null, ['class'=>'form-control','required']); !!}\n' +
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
