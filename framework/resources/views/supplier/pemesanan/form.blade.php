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
                    Pemesanan </h3>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('supplier.dashboard') }}" class="kt-subheader__breadcrumbs-link">
                        Supplier
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('supplier.pemesanan.manage') }}" class="kt-subheader__breadcrumbs-link">
                        Pemesanan
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
        {!! Form::open(['route' => isset($update) ? ['supplier.pemesanan.update', $model->id] :'supplier.pemesanan.store', 'method' => 'post', 'class'=>'kt-form']) !!}
        <div class="row">
                <div class="col-md-6">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Form Pemesanan
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
                                    {!! Form::label('address', 'Alamat Pengiriman'); !!}
                                    {!! Form::text('address', isset($update) ? $model->address : Auth::user()->address, ['class'=>'form-control','required']); !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('description', 'Keterangan'); !!}
                                    {!! Form::textArea('description', $model->description, ['class'=>'form-control','required', 'rows'=>'3']); !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('label_total', 'Total Transaksi'); !!}
                                    {!! Form::text('label_total', isset($update) ? $model->total : null, ['id'=>'label_total','class'=>'form-control','required','readonly']); !!}
                                    <input type="hidden" name="total" value="{{ $model->total }}" id="total">
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('supplier.pemesanan.manage') }}" class="btn btn-secondary">Batal</a>
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
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th width="100px">Qty</th>
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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
            if(isexist.length === 0){
                selected_stock.push(barang[0]);
                total_transaksi+=barang[0].price;
                detail_barang.empty();
                detail_barang_keluar.empty();
                var no = 1;
                for(i=0; i<selected_stock.length; i++){
                    var html = '<tr class="tr_'+ selected_stock[i].id +'">\n' +
                        '       <td>'+ no +'</td>\n' +
                        '       <td>'+ selected_stock[i].name +'</td>\n' +
                        '       <td>'+ selected_stock[i].price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') +'</td>\n' +
                        '       <td><input type="number" name="qty_stock[]" id="qty_'+ selected_stock[i].id +'" min="1" class="form-control" value="1" onchange="qty_change('+ selected_stock[i].id +')"></td>\n' +
                        '       <td><button type="button" class="btn btn-danger btn-hapus" onClick="hapus_detail('+ selected_stock[i].id +')">Hapus</button></td>\n' +
                        '       </tr>';
                    detail_barang.append(html);
                    detail_barang_keluar.append('<input type="hidden" name="id_stock[]" value="'+ selected_stock[i].id +'" id="id_stock_'+ selected_stock[i].id +'">');
                    no++;
                }
                hitung_total();
            }else{
                alert('Barang sudah dimasukan.')
            }
        }

        no_detail++;
    }

    function qty_change(no_detail) {
        var barang =  selected_stock.filter(p => p.id === no_detail)[0];
        var qty = $("#qty_"+no_detail).val();
        $.post( "{{ route('supplier.pemesanan.check_stock') }}", { id_barang: no_detail })
        .done(function( data ) {
            if( parseInt(qty) > parseInt(data)){
                alert("Stock yang tersisa untuk "  + barang.name + " hanya " + data);
                $("#qty_"+no_detail).val(data);
            }
            hitung_total();
        });
    }

    function hitung_total() {
        var new_total = 0;
        if(selected_stock.length > 0){
            for(i=0; i<selected_stock.length; i++){
                new_total+= selected_stock[i].price * $("#qty_"+selected_stock[i].id).val();
            }
        }
        //console.log(new_total);
        total_transaksi = new_total;
        $("#total").val(total_transaksi);
        $("#label_total").val(total_transaksi.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
    }

    function hapus_detail(no_detail){
        var data =  selected_stock.filter(p => p.id == no_detail)[0];
        //console.log(data);
        $(".tr_"+data.id).remove();
        $("#id_stock_"+data.id).remove();
        selected_stock = selected_stock.filter(p => p.id != no_detail);
        hitung_total();
    }

    $("#stock_barang").select2({
        placeholder: "Pilih Barang",
        allowClear: true,
        ajax: {
            url: "{{ route('supplier.pemesanan.data_barang') }}",
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
                    item["text"] = data[i].nama_sku;
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
        //minimumInputLength: 3,
    });
</script>
@endpush
