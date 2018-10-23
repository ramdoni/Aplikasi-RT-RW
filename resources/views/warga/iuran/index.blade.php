@extends('layout.general')

@section('title', 'Iuran Warga')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Iuran Warga</h4> </div>
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

                    <div class="table-responsive">
                        <table id="data_table_no_search_no_sorting" class="display nowrap" cellspacing="0" width="auto" >
                            <thead>
                                <tr>
                                    <th>BULAN</th>
                                    <th>NOMINAL</th>
                                    <th>STATUS</th>
                                    <th style="text-align: center;">
                                        <label><input type="checkbox" class="check_all"> BAYAR</label>
                                    </th>
                                    <th>KONFIRMASI PEMBAYARAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($bulan=[1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'])
                                @foreach($bulan as $no => $item)
                                    @php($chekcIuran = check_iuran_warga(\Auth::user()->id, $no, $tahun, true))
                                    @php($nominal_iuran = nominal_iuran($no, $tahun))
                                    <tr>
                                        <td>{{ $item }}</td>
                                        <td>Rp. {{ number_format($nominal_iuran) }}</td>
                                        <td>
                                            @if($chekcIuran)
                                                <label class="btn btn-success btn-xs">Lunas</label>
                                            @endif
                                            @if(!$chekcIuran)
                                                <!--<a href="javascript:void(0)" onclick="bayar({{ $no }}, '{{ $item }}', {{ $tahun }}, '{{ $nominal_iuran }}', {{$no}})">-->
                                                    <label class="btn btn-danger btn-xs">Belum Lunas</label>
                                                <!-- </a> -->
                                            @endif
                                        </td>
                                        <td  style="text-align: center;">
                                            @if(!$chekcIuran)
                                                <input type="checkbox" name="bulan[]" data-bulan="{{ $item }}" data-iuran="{{ $nominal_iuran }}" value="{{ $no }}" class="check_item">
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$chekcIuran)
                                                <input type="file" name="konfirmasi_pembayaran[{{ $no }}]"">
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center;">
                                        <a href="javascript:void(0)" class="btn btn-info" onclick="bayar_selected()">Bayar </a>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>                        
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
    </div>
    <!-- /.container-fluid -->
   @include('layout.footer-admin')
</div>

<div class="modal fade" id="modal_add" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form>
            {{ csrf_field() }}            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Iuran Bulan <label class="modal-bulan"></label></h4> 
            </div>
            <div class="modal-body">
                <table  class="table table-bordered" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <th>Total Iuran</th>
                            <th>Rp . <label class="modal-total-iuran"></label> </th>
                        </tr>
                    </tbody>
                </table>
                <br />
                <button type="button" class="btn btn-info btn-sm pull-right" onclick="confirm_pembayaran()"><i class="fa fa-check"></i> Rp.  Lakukan Pembayaran</button>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_pembayaran" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="POST" id="modal_form_pembayaran" action="{{ route('warga.iuran.bayar') }}">
            {{ csrf_field() }}            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi Pembayaran Iuran </h4> 
            </div>
            <div class="modal-body">
                <table  class="table table-bordered" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <th>Iuran Bulan</th>
                            <th class="modal-th-bulan"></th>
                        </tr>
                        <tr>
                            <th>Total Iuran</th>
                            <th>Rp . <label class="modal-total-iuran"></label> </th>
                        </tr>
                        <tr>
                            <th>Unique Code</th>
                            <th><label class="modal-unique"></label> </th>
                        </tr>
                        <tr>
                            <th>Total yang harus Dibayarkan</th>
                            <th style="color: red;">Rp . <label class="modal-total-transfer"></label></th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p style="color: black;">
                                    <label>*Catatan</label><br />
                                    Jika anda melakukan metode pembayaran transfer, pastikan Nominal Transfer yang dibayarkan <label style="font-weight: normal;color: red">HARUS SAMA</label> dengan nominal yang tertera.
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr />
                <h4>Metode Pambayaran</h4>
                <div class="col-md-6" style="border: 1px solid #eee; padding-top: 10px;padding-bottom: 10px;min-height: 125px;">
                    <p>
                        <label>Transfer</label><br />                
                    </p>
                </div>
                <div class="col-md-6" style="border: 1px solid #eee; padding-top: 10px;padding-bottom: 10px;min-height: 125px;">
                    <p><label>Manual</label><br />
                        Silahkan melakukan pembayaran secara Tunai / Cash ke pengurus Rukun Tetangga (RT).
                    </p>
                </div>
                <div class="clearfix"></div>
                    <input type="hidden" name="nominal" class="modal-nominal" value="">
                    <input type="hidden" name="bulan" class="modal-bulan" value="">
                    <input type="hidden" name="tahun" class="modal-tahun" value="">
                    <input type="hidden" name="unique" class="modal-unique" value="">
                <br />
                <button type="button" class="btn btn-info btn-sm pull-right" onclick="confirm_last()"><i class="fa fa-check"></i> Konfirmasi Pembayaran</button>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_pembayaran_item" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="POST" id="modal_form_pembayaran_item" action="{{ route('warga.iuran.bayar') }}">
            {{ csrf_field() }}            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi Pembayaran Iuran </h4> 
            </div>
            <div class="modal-body">
                <table  class="table table-bordered" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <th>Iuran Bulan</th>
                            <th class="modal-th-bulan"></th>
                        </tr>
                        <tr>
                            <th>Total Iuran</th>
                            <th>Rp . <label class="modal-total-iuran"></label> </th>
                        </tr>
                        <tr>
                            <th>Unique Code</th>
                            <th><label class="modal-unique"></label> </th>
                        </tr>
                        <tr>
                            <th>Total yang harus Dibayarkan</th>
                            <th style="color: red;">Rp . <label class="modal-total-transfer"></label></th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p style="color: black;">
                                    <label>*Catatan</label><br />
                                    Jika anda melakukan metode pembayaran transfer, pastikan Nominal Transfer yang dibayarkan <label style="font-weight: normal;color: red">HARUS SAMA</label> dengan nominal yang tertera.
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr />
                <h4>Metode Pambayaran</h4>
                <div class="col-md-6" style="border: 1px solid #eee; padding-top: 10px;padding-bottom: 10px;min-height: 125px;">
                    <p>
                        <label>Transfer</label><br /> 
                        @foreach(getRekeningBank() as $item)
                            {{ $item->bank->nama }}  / {{ $item->no_rekening }} - {{ $item->owner }} 
                        @endforeach               
                    </p>
                </div>
                <div class="col-md-6" style="border: 1px solid #eee; padding-top: 10px;padding-bottom: 10px;min-height: 125px;">
                    <p><label>Manual</label><br />
                        Silahkan melakukan pembayaran secara Tunai / Cash ke pengurus Rukun Tetangga (RT).
                    </p>
                </div>
                <div class="clearfix"></div>
                <input type="hidden" name="nominal" class="modal-nominal" value="">
                <input type="hidden" name="tahun" class="modal-tahun" value="">
                <input type="hidden" name="unique" class="modal-unique" value="">
                <br />
                <button type="button" class="btn btn-info btn-sm pull-right" onclick="confirm_last()"><i class="fa fa-check"></i> Konfirmasi Pembayaran</button>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
    </div>
</div>
@section('footer-script')
<script type="text/javascript">
    var bulan,bulan_int, tahun, total_iuran;

    function bayar_selected()
    {
        $("#modal_pembayaran_item").modal("show");

        var bulan = [];
        var total_iuran=0;
        var el="";
        $('.check_item').each(function(){
            if($(this).is(':checked'))
            {
                el += '<input type="hidden" value="bulan['+ $(this).attr('data-bulan') +']" value="'+ $(this).attr('data-iuran') +'" />';
                bulan.push($(this).attr('data-bulan'));
                total_iuran += parseInt($(this).attr('data-iuran'));
            }
        });

        $('.modal-th-bulan').html(bulan.join(', '));
        $('.modal-total-iuran').html(numberWithComma(total_iuran));
         var rand = get_random_code();

        $(".modal-unique").html(rand);
        $(".modal-total-transfer").html( numberWithComma(parseInt(rand)+parseInt(total_iuran)) );
        $(".modal-nominal").val(total_iuran);
        $(".modal-unique").val(rand);
        $('.modal-tahun').val({{ $tahun }});
        $("#modal_form_pembayaran_item").append(el);
    }
    
    $(".check_all").click(function(){

        if($(this).is(':checked'))
        {
            $('.check_item').attr('checked', true);            
        }
        else
        {
            $('.check_item').removeAttr('checked');            
        }

    });

    function confirm_last()
    {
        if(confirm('Apakah anda ingin melakukan Pembayaran ?'))
        {
            $("#modal_form_pembayaran").submit()            
        }
    }

    function confirm_pembayaran()
    {
        var rand = get_random_code();
        $("#modal_add").modal("hide");
        $("#modal_pembayaran").modal("show");
        $(".modal-unique").html(rand);
        $('.modal-th-bulan').html(bulan);
        $(".modal-total-transfer").html( numberWithComma(parseInt(rand)+parseInt(total_iuran)) );
        $(".modal-nominal").val(total_iuran);
        $(".modal-bulan").val(bulan_int);
    }

    function get_random_code()
    {
        var rand = Math.floor(Math.random() * 255);
        if(rand == 0)
        {
            get_random_code();       
        }
        else
        {
            return rand;
        } 
    }

    function bayar(no, b, t, to, b_int)
    {
        bulan = b;
        tahun=t;
        total_iuran=to;
        bulan_int = b_int;

        $("#modal_add").modal("show");
        $(".modal-bulan").html(bulan);
        $('.modal-total-iuran').html(numberWithComma(total_iuran));
    }
</script>
@endsection
@endsection
