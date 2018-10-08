@extends('layout.kasir')

@section('title', 'Kasir - Koperasi Daya Masyarakat Indonesia')

@section('sidebar')

@endsection

@section('content')
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-md-1">
                <h4 class="page-title">PENCARIAN : </h4> 
            </div>
            <div class="col-md-6">
                <form method="POST">
                    <input type="text" class="form-control autocomplete-anggota" placeholder="Nama Anggota / No Anggota">
                </form>
            </div>
        </div>
        <!-- .row --> 
        <div class="row">
            <div class="col-md-12">
                <!-- .tmp-search -->
                <div class="white-box" style="position:relative;">
                    <h2># {{ $data->name }} / {{ $data->no_anggota }}</h2>
                    <hr style="margin-top:0;" >
                    <h3 class="pull-right" style="position: absolute;top:0;right:30px;cursor:pointer;" onclick="delete_el(this)"><i class="fa fa-close"></i></h3>
                    <div class="col-md-2">
                        <h3 style="margin-top: 0;"><small>Simpanan Wajib</small>
                            <br /> Rp. {{ number_format(simpanan_wajib($data->id)->where('status', 3)->sum('nominal')) }}
                                                        </h3>
                        <label class="btn btn-info btn-xs" onclick="topup_simpanan_wajib()"><i class="fa fa-plus"></i> Topup</label>
                    
                        <p>Jatuh tempo pembayaran selanjutnya<br /> <label class="text-danger">{{ date('d F Y', strtotime($data->first_durasi_pembayaran_date ." + ". $data->durasi_pembayaran ." month") ) }}</label></p>
                    </div>
                    <div class="col-md-2">
                        <h3><small>Simpanan Pokok</small><br /> Rp. {{ number_format(simpanan_pokok($data->id)->where('status', 3)->sum('nominal')) }}</h3>
                        @if(simpanan_pokok($data->id)->where('status', 3)->sum('nominal') == 0)
                            <label class="btn btn-info btn-xs" onclick="topup_simpanan_pokok()"><i class="fa fa-plus"></i> Topup</label>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <h3><small>Simpanan Sukarela</small><br /> Rp. {{ number_format(simpanan_sukarela($data->id)->where('status', 3)->sum('nominal')) }}</h3>
                        <label class="btn btn-info btn-xs" onclick="topup()"><i class="fa fa-plus"></i> Topup</label>
                    </div>
                    <div class="clearfix"></div>
                    <hr />
                    <br />
                     <div>
                        <div class="col-md-2">
                            <ul class="nav tabs-vertical">
                                <li class="tab active">
                                    <a data-toggle="tab" href="#transaksi" aria-expanded="true"> <span class="visible-xs"><i class="ti-home"></i></span> <span class="hidden-xs">Transaksi</span> </a>
                                </li>
                                <li class="tab">
                                    <a data-toggle="tab" href="#simpanan_pokok" aria-expanded="true"> <span class="visible-xs"><i class="ti-home"></i></span> <span class="hidden-xs">Simpanan Pokok</span> </a>
                                </li>
                                <li class="tab">
                                    <a data-toggle="tab" href="#simpanan_sukarela" aria-expanded="false"> <span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Simpanan Sukarela</span> </a>
                                </li>
                                <li class="tab">
                                    <a aria-expanded="false" data-toggle="tab" href="#simpanan_wajib"> <span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Simpanan Wajib</span> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <div class="tab-content" style="margin-top:0;">
                                <div id="transaksi" class="tab-pane active">
                                    <h3>Transaksi</h3>
                                    <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nominal</th>
                                                <th>Tanggal</th>
                                                <th>User Proses</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transaksi as $no => $item)
                                                <tr>
                                                    <td>{{ $no+1 }}</td>
                                                    <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>    
                                                    <td>{{ isset($item->user_proses->name) ? $item->user_proses->name : '' }}</td>
                                                    <td>
                                                        <a href="{{ route('kasir.anggota.cetak-kwitansi', $item->id) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-print"></i> cetak kwitansi</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div id="simpanan_pokok" class="tab-pane">
                                    <h3>Simpanan Pokok</h3>
                                    <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nominal</th>
                                                <th>Tanggal</th>
                                                <th>User Proses</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(simpanan_pokok($data->id)->orderBy('id', 'DESC')->get() as $no => $item)
                                            <tr>
                                                <td>{{ $no+1 }}</td>
                                                <td>{{ number_format($item->nominal) }}</td>    
                                                <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>    
                                                <td>{{ isset($item->user_proses->name) ? $item->user_proses->name : '' }}</td>
                                                <td>
                                                    <a href="{{ route('admin.anggota.cetak-kwitansi', $item->id) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-print"></i> cetak kwitansi</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div id="simpanan_sukarela" class="tab-pane">
                                    <h3>Simpanan Sukarela</h3>
                                    <table id="data_table2" class="display nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nominal</th>
                                                <th>Tanggal</th>
                                                <th>User Proses</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                        @foreach(simpanan_sukarela($data->id)->orderBy('id', 'DESC')->get() as $no => $item)
                                            <tr>
                                                <td>{{ $no+1 }}</td>
                                                <td>{{ number_format($item->nominal) }}</td>    
                                                <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>    
                                                <td>{{ isset($item->user_proses->name) ? $item->user_proses->name : '' }}</td>
                                                <td>
                                                    <a href="{{ route('admin.anggota.cetak-kwitansi', $item->id) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-print"></i> cetak kwitansi</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div id="simpanan_wajib" class="tab-pane">
                                    <h3>Simpanan Wajib</h3>
                                    <table id="data_table3" class="display nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nominal</th>
                                                <th>Tanggal</th>
                                                <th>User Proses</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                        @foreach(simpanan_wajib($data->id)->orderBy('id', 'DESC')->get() as $no => $item)
                                            <tr>
                                                <td>{{ $no+1 }}</td>
                                                <td>{{ number_format($item->nominal) }}</td>    
                                                <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>  
                                                <td>{{ isset($item->user_proses->name) ? $item->user_proses->name : '' }}</td>  
                                                <td>
                                                    <a href="{{ route('admin.anggota.cetak-kwitansi', $item->id) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-print"></i> cetak kwitansi</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">DATA ANGGOTA</h3>
                        <ul class="list-inline two-part">
                            <li><i class="icon-people text-info"></i></li>
                            <li class="text-right"><span class="counter">{{ total_anggota('active') }}</span></li>
                        </ul>
                        <a href="{{ route('cs.anggota.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Anggota</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">SIMPANAN POKOK</h3>
                        <ul class="list-inline two-part">
                            <li><i class="icon-folder text-purple"></i></li>
                            <li class="text-right"><h2 class="counter">{{ all_simpanan_pokok()->where('status', 3)->sum('nominal') }}</h2></li>
                        </ul>
                        <button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Simpanan Pokok</button>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">SIMPANAN SUKARELA</h3>
                        <ul class="list-inline two-part">
                            <li><i class="icon-folder-alt text-danger"></i></li>
                            <li class="text-right"><h2 class="">{{ all_simpanan_sukarela()->where('status', 3)->sum('nominal') }}</h2></li>
                        </ul>
                        <button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Simpanan Sukarela</button>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">SIMPANAN WAJIB</h3>
                        <ul class="list-inline two-part">
                            <li><i class="ti-wallet text-success"></i></li>
                            <li class="text-right"><h2 class="">{{ number_format(all_simpanan_wajib()->where('status', 3)->sum('nominal')) }}</h2></li>
                        </ul>
                        <button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Simpanan Wajib</button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Topup</h4> </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" name="nominal" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Submit Topup</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal simpanan pokok-->
<div id="modal_simpanan_pokok" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.anggota.topup-simpanan-pokok') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Topup Simpanan Pokok</h4> 
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" name="nominal" class="form-control" value="{{ get_setting('simpanan_pokok') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                    <button type="submit" class="btn btn-success waves-effect btn-sm"><i class="fa fa-print"></i> Topup Simpanan Pokok</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- modal simpanan wajib-->
<div id="modal_simpanan_wajib" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.anggota.topup-simpanan-wajib') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Topup Simpanan Wajib</h4> 
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" readonly="true" name="nominal" class="form-control modal_nominal_simpanan_wajib" value="{{ get_setting('simpanan_wajib') }}">
                    </div>
                    Durasi Pembayaran : 
                    <select class="form-control" name="durasi_pembayaran">
                        <option value="1">1 Bulan</option>                        
                        <option value="3">3 Bulan</option>                        
                        <option value="6">6 Bulan</option>                        
                        <option value="12">12 Bulan</option>                        
                    </select>
                    <br />
                    <label>Total : </label>
                    <input type="input" name="total" class="form-control total_simpanan_wajib" readonly="true" value="{{ get_setting('simpanan_wajib') }}" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                    <button type="submit" class="btn btn-success waves-effect btn-sm"><i class="fa fa-print"></i> Topup Simpanan Wajib</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@include('layout.footer-admin')
</div>
@section('footer-script')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    function delete_el(el)
    {
        $(el).parent().remove();
    }
    $(".autocomplete-anggota" ).autocomplete({
        minLength:0,
        limit: 25,
        source: function( request, response ) {
            $.ajax({
              url: "{{ route('ajax.get-anggota') }}",
              method : 'POST',
              data: {
                'name': request.term,'_token' : $("meta[name='csrf-token']").attr('content')
              },
              success: function( data ) {
                response( data.data );
              }
            });
        },
        select: function( event, ui ) {

            window.location = '{{ url('kasir/anggota/detail') }}/'+ ui.item.id;

            $.ajax({
                type: 'POST',
                url: '{{ route('ajax.get-anggota-by-id-html') }}',
                data: {'id' : ui.item.id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType: 'json',
                success: function (data) {

                    $("#content-search-anggota").prepend(data.data);

                    setTimeout(function(){
                        $(".autocomplete-anggota").val(" ");
                        init_datatable();
                    }, 500);
                }
            });

            $(".autocomplete-anggota" ).val("");
        }
    }).on('focus', function () {
            $(this).autocomplete("search", "");
    });

    $("select[name='durasi_pembayaran']").on('change', function(){

            var total = parseInt($(this).val()) * parseInt($('.modal_nominal_simpanan_wajib').val());

            $(".total_simpanan_wajib").val( total );
        });

        var topup_simpanan_wajib = function(user_id){
            $("#modal_simpanan_wajib").modal("show");
        }

        var topup_simpanan_pokok = function(){
            $("#modal_simpanan_pokok").modal("show");
        }

        function topup()
        {
            var pr = bootbox.prompt({
                title: "Topup Simpanan Sukarela ",
                inputType: 'number',
                callback: function (nominal) 
                {
                    if(nominal != null)
                    {
                        var confirm = bootbox.confirm({
                            message: "Apakah anda ingin Topup Simpanan Sukarela ?",
                            buttons: {
                                confirm: {
                                    label: '<i class="fa fa-check"></i> Yes',
                                    className: 'btn-success btn-sm'
                                },
                                cancel: {
                                    label: '<i class="fa fa-close"></i> No',
                                    className: 'btn-danger btn-sm'
                                }
                            },
                            callback: function (result) {
                                
                                if(result)
                                {   
                                    confirm.find('.bootbox-body').html('<p><i class="fa fa-spin fa-spinner"></i> Silahkan tunggu beberapa saat ...</p>');

                                    setTimeout(function(){
                                         $.ajax({
                                            url: "{{ route('ajax.admin.submit-simpanan-sukarela') }}", 
                                            data: {'_token' : '{{csrf_token()}}','nominal' : nominal },
                                            type: 'POST',
                                            success: function(res)
                                            {
                                                if(res.message == 'success')
                                                {
                                                    confirm.modal('hide');
                                                    
                                                    bootbox.alert("Anda Berhasil Topup Simpanan Sukarela sebesar <strong>Rp. "+ numberWithComma(nominal) +"</strong>", function() {
                                                        location.reload();
                                                    });

                                                }else{
                                                    confirm.find('.bootbox-body').html('<p><i class="fa fa-times-octagon"></i> '+ res.data +'</p>');
                                                }
                                            }
                                        })
                                    }, 2000);

                                    return false;
                                }
                            }
                        });
                    }
                }
            });
        }
</script>
@endsection
@endsection
