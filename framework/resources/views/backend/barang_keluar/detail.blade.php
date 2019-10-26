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
                        @if(!is_null($model->pemesanan))
                        <div class="row">
                            @if($model->status == 3)
                            <div class="col-md-6">
                                <button type="button" class="btn btn-success btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_4">
                                    <i class="la la-check"></i>
                                    Kirim Pesanan
                                </button>
                            </div>
                            @endif
                            @if($model->status != 5 && $model->status != 1)
                            <div class="col-md-6">
                                <a href="{{ route('backend.barang_keluar.batalkan_pesanan', $model->id) }}" class="btn btn-danger btn-elevate btn-icon-sm">
                                    <i class="la la-close"></i>
                                    Batalkan Pesanan
                                </a>
                            </div>
                            @endif
                        </div>
                        <br>
                        @endif

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





    <!--begin::Modal-->
    <div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                {!! Form::open(['route' => ['backend.barang_keluar.kirim_pesanan', $model->id], 'method' => 'post', 'class'=>'kt-form']) !!}
                <div class="modal-body">

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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!--end::Modal-->

@endsection

@push('vendor_script')

@endpush

@push('page_script')
    <script>
        var stock_barang;
        var total_transaksi = 0;
        var selected_stock = [];

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
