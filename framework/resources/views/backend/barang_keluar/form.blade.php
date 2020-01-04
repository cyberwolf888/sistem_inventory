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
        {!! Form::open(['route' => isset($update) ? ['backend.barang_keluar.update', $model->id] :'backend.barang_keluar.store', 'method' => 'post', 'class'=>'kt-form']) !!}
        <div class="row">
                <div class="col-md-6">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Form Barang Keluar
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
                                    {!! Form::label('id_supplier', 'Supplier'); !!}
                                    {!! Form::select('id_supplier', \App\User::where('type',3)->where('isActive',1)->pluck('name','id'), $model->id_supplier, ['class'=>'form-control','required']); !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('transaction_date', 'Tanggal Transaksi'); !!}
                                    {!! Form::text('transaction_date', isset($update) ? date('d/m/Y',strtotime($model->transaction_date)) : null, ['id'=>'transaction_date', 'class'=>'form-control','required']); !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('label_total', 'Total Transaksi'); !!}
                                    {!! Form::text('label_total', isset($update) ? $model->total : null, ['id'=>'label_total','class'=>'form-control','required','readonly']); !!}
                                    <input type="hidden" name="total" value="{{ $model->total }}" id="total">
                                </div>
                                <div class="form-group">
                                    {!! Form::label('description', 'Keterangan'); !!}
                                    {!! Form::textArea('description', $model->description, ['class'=>'form-control', 'rows'=>'3']); !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('status', 'Status'); !!}
                                    {!! Form::select('status', ['1'=>'Selesai','2'=>'Pesanan Supplier','3'=>'Sudah Dibayar','4'=>'Dikirim ke Supplier','5'=>'Dibatalkan'], $model->status, ['class'=>'form-control','required']); !!}
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('backend.barang_keluar.manage') }}" class="btn btn-secondary">Batal</a>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('stock_barang','Barang'); !!}
                                        {!! Form::select('stock_barang', [], null, ['id'=>'stock_barang', 'class'=>'form-control','required']); !!}
                                    </div>
                                </div>
                            </div>
                            <div id="form_detail_barang">

                            </div>
                            <button type="button" class="btn btn-primary" id="btn_tambah">Tambah</button>
                            <br><br>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Serial Number</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Tanggal Masuk</th>
                                    <th> </th>
                                </tr>
                                </thead>
                                <tbody id="detail_barang">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            Silakan Tambahkan Barang
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
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
    var stock_barang;
    var total_transaksi = 0;
    var selected_stock = [];

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
        tambah_detail_barang();
    });

    function tambah_detail_barang() {
        var detail_barang = $("#detail_barang");
        var detail_barang_keluar = $("#form_detail_barang");
        var id_stock = $("#stock_barang").val();
        var barang = stock_barang.filter(p => p.id == id_stock);

        if(barang.length > 0){
            var isexist = selected_stock.filter(p => p.id == id_stock);
            //console.log(isexist);
            if(isexist.length == 0){
                selected_stock.push(barang[0]);
                total_transaksi+=barang[0].barang.price;
                $("#total").val(total_transaksi);
                $("#label_total").val(total_transaksi.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
                detail_barang.empty();
                detail_barang_keluar.empty();
                var no = 1;
                for(i=0; i<selected_stock.length; i++){
                    var html = '<tr class="tr_'+ selected_stock[i].id +'">\n' +
                        '       <td>'+ no +'</td>\n' +
                        '       <td>'+ selected_stock[i].serial_number +'</td>\n' +
                        '       <td>'+ selected_stock[i].barang.name +'</td>\n' +
                        '       <td>'+ selected_stock[i].barang.price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') +'</td>\n' +
                        '       <td>'+ selected_stock[i].receive_date +'</td>\n' +
                        '       <td><button type="button" class="btn btn-danger btn-hapus" onClick="hapus_detail('+ selected_stock[i].id +')">Hapus</button></td>\n' +
                        '       </tr>';
                    detail_barang.append(html);
                    detail_barang_keluar.append('<input type="hidden" name="id_stock[]" value="'+ selected_stock[i].id +'" id="id_stock_'+ selected_stock[i].id +'">');
                    no++;
                }
            }else{
                alert('Barang sudah dimasukan.')
            }
        }

        no_detail++;
    }
    function hapus_detail(no_detail){
        var data =  selected_stock.filter(p => p.id == no_detail)[0];
        //console.log(data);
        $(".tr_"+data.id).remove();
        $("#id_stock_"+data.id).remove();
        selected_stock = selected_stock.filter(p => p.id != no_detail);
    }

    $("#stock_barang").select2({
        placeholder: "Serial Number Barang",
        allowClear: true,
        ajax: {
            url: "{{ route('backend.barang.stock.json_data') }}",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    status: 1
                };
            },
            processResults: function(data, params) {
                stock_barang = data;
                params.page = params.page || 1;
                var results = [];
                for(i=0; i<data.length; i++){
                    var item = [];
                    item["id"] = data[i].id;
                    item["text"] = data[i].serial_number + " - " + data[i].barang.name;
                    results.push(item)
                }

                return {
                    results: results,
                    pagination: {
                        more: false
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function(markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 3,
    });
</script>
@endpush
