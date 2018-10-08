@extends('layout.admin')

@section('title', 'Konfirmasi Pembayaran - Koperasi Daya Masyarakat Indonesia')

@section('sidebar')

@endsection

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
                    <li class="active">Anggota</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
            <div class="white-box" style="padding-bottom:0;">
                <h3 class="box-title m-b-0">Konfirmasi Pembayaran</h3>
                <br />
                <form class="form-horizontal" id="form_confirmation" enctype="multipart/form-data" action="{{ route('admin.anggota.confirm-submit') }}" method="POST">
                    <div class="white-box printableArea">
                        {{ csrf_field() }}
                        <h3><b>INVOICE</b> <span class="pull-right">#{{ $deposit->no_invoice }}</span></h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h3>Transfer Ke,</h3> 
                                    <div class="transfer_ke">
                                        <img src="http://localhost/kodami.co.id/public/bank/1519125431.png">
                                        <p>
                                            No Rekening : <strong class="no_rekening">123456789</strong><br>
                                            <strong class="nama_akun">Koperasi Daya Masyarakat</strong>
                                        </p>
                                    </div> 
                                </div>
                                <div class="pull-right text-right">
                                    <address>
                                        <h3>To,</h3>
                                        <h4 class="font-bold">{{ $deposit->user->name }},</h4>
                                        <p class="text-muted m-l-30">{{ $deposit->user->alamat }}</p>
                                        <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> {{ $deposit->created_at }}</p>
                                        <p><b>Due Date :</b> <i class="fa fa-calendar"></i> {{ date('d F Y', strtotime($deposit->due_date)) }}</p>
                                    </address>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive m-t-40" style="clear: both;">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Pembayaran</th>
                                                <th class="text-right">Nominal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>Simpanan Pokok</td>
                                                <td class="text-right">Rp. {{ number_format(get_setting('simpanan_pokok')) }} </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td>Simpanan Wajib</td>
                                                <td class="text-right">Rp. {{ number_format( ($data->durasi_pembayaran * get_setting('simpanan_wajib') )) }} ( {{ $data->durasi_pembayaran }} Bulan )</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td>Kartu Anggota</td>
                                                <td class="text-right">Rp. {{ number_format( get_setting('kartu_anggota') ) }} (1 Kali Bayar) </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td>Simpanan Sukarela</td>
                                                <td class="text-right">Rp. {{ number_format($data->first_simpanan_sukarela ) }} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="pull-right m-t-30 text-right">
                                    <h4>Unique Code <label class="label label-success">{{ $deposit->code }}</label></h4>
                                    <h3><b>Total :</b> Rp. {{ number_format($deposit->nominal) }}</h3> </div>
                                <div class="clearfix"></div>
                                <hr>
                                <div class="form-group">
                                    <h4>File Confirmation</h4>
                                    <img src="{{ asset('file_confirmation/'. $data->id .'/'. $deposit->file_confirmation)}}" style="width: 50%;" />
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('admin.anggota.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
                                    <span class="btn btn-danger" id="reject"><i class="fa fa-close"></i> Reject </span>
                                    <span class="btn btn-success" id="approve"><i class="fa fa-check"></i> Approve </span>
                                </div>
                                <input type="hidden" name="status" value="0" />
                                <input type="hidden" name="user_id" value="{{ $data->id }}"  />
                                <input type="hidden" name="deposit_id" value="{{ $deposit->id }}"  />
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
              </div>
            </div>                        
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
    </div>
    <!-- /.container-fluid -->
    @extends('layout.footer-admin')
</div>

@section('footer-script')
    <script type="text/javascript">
       $("#approve").click(function(){
            if(confirm('Approve pembayaran Anggota ?'))
            {
                $("input[name='status']").val(1);
                $("#form_confirmation").submit();
            }
       }); 

        $("#reject").click(function(){
            if(confirm('Reject pembayaran Anggota ?'))
            {
                $("input[name='status']").val(0);
                $("#form_confirmation").submit();
            }
       }); 
    </script>
@endsection

<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
@endsection
