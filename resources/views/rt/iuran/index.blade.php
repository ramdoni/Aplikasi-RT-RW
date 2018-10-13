@extends('layout.general')

@section('title', 'Manage Iuran Warga ')

@section('content')
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Iuran Warga</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row --> 
        <div class="row">
            <div class="col-md-12">
               <div class="white-box">
                    <h3 class="box-title m-b-0"> Manage Iuran Warga</h3>
                    <hr />
                    <form method="GET">
                        <div class="col-md-3" style="padding-left:0;">
                            <select class="form-control" name="tahun">
                                <option value="">- Pilih Tahun - </option>
                                @for($t = 2018; $t <= date('Y'); $t++)
                                <option {{ (isset($_GET['tahun']) and $_GET['tahun'] == $t) ? 'selected' : '' }}>{{ $t }}</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Filter</button>
                        <div class="clearfix"></div>
                    </form>
                    <br />
                    <ul class="nav customtab nav-tabs" role="tablist">
                        <li class="active"><a href="#data-iuran" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Data Iuran</a></li>                        
                        <li><a href="#data-notifikasi" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Notifikasi</a></li>                        
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="data-iuran">        
                            <div class="table-responsive">
                                <table id="data_table_no_search2" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="70" class="text-center">#</th>
                                            <th>NAMA WARGA</th>
                                            <th>JAN</th>
                                            <th>FEB</th>
                                            <th>MARET</th>
                                            <th>ARPIL</th>
                                            <th>MEI</th>
                                            <th>JUNI</th>
                                            <th>JULY</th>
                                            <th>AUG</th>
                                            <th>SEPT</th>
                                            <th>OKT</th>
                                            <th>NOV</th>
                                            <th>DES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $no => $item)
                                        @if($item->id == 3)
                                            <?php continue; ?>
                                        @endif
                                        <tr>
                                            <td>{{ $no+1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            @php($bulan=[1,2,3,4,5,6,7,8,9,10,11,12])
                                            @foreach($bulan as $i)
                                            <td>
                                                @php($chekIuran = check_iuran_warga($item->id, $i, $tahun, true))
                                                
                                                @if($chekIuran)
                                                    @if($chekIuran->status !=2)
                                                        @php($chekIuran = false)    
                                                    @endif
                                                @endif

                                                @if($chekIuran)
                                                    <div class="btn-group m-r-10">
                                                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-xs btn-info dropdown-toggle waves-effect waves-light" type="button"> Lunas
                                                            <span class="caret"></span></button>
                                                        <ul role="menu" class="dropdown-menu">
                                                            <li><a href="{{ route('rt.iuran.bayar-rollback', ['id' => $chekIuran->id]) }}" onclick="return confirm('Proses Pembayaran ini ?')" class="text-success" style="color: red !important;"><i class="fa fa-check"></i> Belum Lunas</a></li>
                                                        </ul>
                                                    </div><br />
                                                    <label title="Tanggal" style="font-weight: normal;"><small>{{ date('d F Y', strtotime($chekIuran->date_proses)) }}</small></label>                                    
                                                @endif

                                                @if(!$chekIuran)
                                                <div class="btn-group m-r-10">
                                                    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-xs btn-danger dropdown-toggle waves-effect waves-light" type="button">Belum Lunas 
                                                        <span class="caret"></span></button>
                                                    <ul role="menu" class="dropdown-menu">
                                                        <li><a href="javascript:void(0)" onclick="confirm_belum_lunas({{$i}}, {{ $tahun }}, {{ nominal_iuran($item->id) }}, {{ $item->id }})" class="text-success" style="color: green !important;"><i class="fa fa-check"></i> Lunas</a></li>
                                                    </ul>
                                                </div>
                                                @endif
                                            </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>      
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="data-notifikasi">        
                                <div class="table-responsive">
                                    <table id="data_table_no_search" class="display nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="70" class="text-center">#</th>
                                                <th>NAMA WARGA</th>
                                                <th>JAN</th>
                                                <th>FEB</th>
                                                <th>MARET</th>
                                                <th>ARPIL</th>
                                                <th>MEI</th>
                                                <th>JUNI</th>
                                                <th>JULY</th>
                                                <th>AUG</th>
                                                <th>SEPT</th>
                                                <th>OKT</th>
                                                <th>NOV</th>
                                                <th>DES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $no => $item)
                                            <tr>
                                                <td>{{ $no+1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                @php($bulan=[1,2,3,4,5,6,7,8,9,10,11,12])
                                                @foreach($bulan as $i)
                                                <td>
                                                    @php($chekIuran = check_iuran_warga($item->id, $i, $tahun, true))
                                                    
                                                    @if($chekIuran)
                                                        @if($chekIuran->status !=2)
                                                            @php($chekIuran = false)    
                                                        @endif
                                                    @endif

                                                    @if($chekIuran)
                                                        <div class="btn-group m-r-10">
                                                            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-xs btn-info dropdown-toggle waves-effect waves-light" type="button"> Lunas
                                                                <span class="caret"></span></button>
                                                            <ul role="menu" class="dropdown-menu">
                                                                <li><a href="" onclick="return confirm('Kirim Notifikasi ?')" class="text-success" style="color: red !important;"><i class="fa fa-check"></i> Kirim Notifikasi Lunas</a></li>
                                                            </ul>
                                                        </div><br />
                                                        <label title="Tanggal" style="font-weight: normal;"><small>{{ date('d F Y', strtotime($chekIuran->date_proses)) }}</small></label>                                    
                                                    @endif

                                                    @if(!$chekIuran)
                                                    <div class="btn-group m-r-10">
                                                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-xs btn-danger dropdown-toggle waves-effect waves-light" type="button">Belum Lunas 
                                                            <span class="caret"></span></button>
                                                            <ul role="menu" class="dropdown-menu">
                                                                <li><a href="" class="text-success" style="color: green !important;"><i class="fa fa-check"></i> Lunas</a></li>
                                                            </ul>
                                                    </div>
                                                    @endif
                                                </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    </div>
   @include('layout.footer-admin')
</div>
<div class="modal fade" id="modal_belum_lunas" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="POST" action="{{ route('rt.iuran.bayar') }}" id="proses_pembayaran">
            {{ csrf_field() }}            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Iuran Bulan <label class="modal-bulan"></label></h4> 
            </div>
            <div class="modal-body">
                <div class="form-group">
                   <div class="radio radio-success">
                        <input type="radio" class="tanggal_hari_ini" name="tanggal_hari_ini" id="radio14" value="{{ date('Y-m-d') }}" checked="true">
                        <label for="radio14"> Tanggal hari ini :  {{ date('d F Y') }} </label>
                    </div>
                </div>
                <div class="form-group">
                   <div class="radio radio-success">
                        <input type="radio" name="tanggal_hari_ini" id="radio1" value="" class="option_tanggal_lain">
                        <label for="radio1"> Pilih tanggal lain</label>
                        <input type="text" name="date_proses" class="form-control datepicker" readonly="true" placeholder="Tanggal Lain">
                    </div>
                </div>

                <table  class="table table-bordered" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <th>Total Iuran</th>
                            <th>Rp . <label class="modal-total-iuran"></label> </th>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" name="nominal" class="modal-input-total-iuran" />
                <input type="hidden" name="user_id" class="modal-user_id" />
                <input type="hidden" name="bulan" class="modal-bulan" />
                <input type="hidden" name="tahun" class="modal-tahun" />
                <br />
                <button type="button" class="btn btn-info btn-sm pull-right" onclick="confirm_pembayaran()"><i class="fa fa-check"></i> Update Pembayaran</button>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
    </div>
</div>

<style>
    active-blok
</style>

@section('footer-script')
<script type="text/javascript">
    
    $('.option_tanggal_lain').click(function(){
        $("input[name='date_proses']").removeAttr('readonly');
    });

    $('.tanggal_hari_ini').click(function(){
        $("input[name='date_proses']").attr('readonly', true);
    });

    var confirm_pembayaran = function(){

        if($("select[name='tanggal']").val() == "")
        {
            alert('Tanggal pembayaran harus dipilih !');
            return false;
        }
        if(confirm("Proses Pembayaran ?"))
        {
            $("#proses_pembayaran").submit();
        }
    }

    var confirm_belum_lunas = function(bulan, tahun, total, user_id){
        $("#modal_belum_lunas").modal('show');
        $('.modal-total-iuran').html(numberWithComma(total));
        $('.modal-input-total-iuran').val(total);
        $('.modal-user_id').val(user_id);
        $('.modal-tahun').val(tahun);
        $('.modal-bulan').val(bulan);
    }

    var confirm_autologin = function(url, name){
        bootbox.confirm("Login sebagai "+ name +" ?", function(res){
            if(res)
            {
                window.location = url;
            }
        })
    }
</script>
@endsection
@endsection
