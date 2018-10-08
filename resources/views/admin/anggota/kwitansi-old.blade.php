@extends('layout.admin')

@section('title', 'Admin - Koperasi Daya Masyarakat Indonesia')

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
                <h4 class="page-title">Anggota</h4> </div>
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
                <div class="white-box printableArea">
                    <h3><b>KWITANSI</b> <span class="pull-right">#{{ $data->no_invoice }}</span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3><b class="text-danger">
                                        <img src="{{ asset('logo-biru.png')}}" style="height: 50px;" />
                                    </b></h3>
                                    <p class="text-muted m-l-5">{!! get_setting('alamat') !!}</p>
                                </address>
                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <h3>To,</h3>
                                    <h4 class="font-bold">{{ $data->user->name }},</h4>
                                    <p class="text-muted m-l-30">
                                        {{ isset($data->user->ktp_provinsi->nama) ? $data->user->ktp_provinsi->nama : '' }}
                                        <br />
                                        {{ isset($data->user->ktp_kabupaten->nama) ? $data->user->ktp_kabupaten->nama : '' }}
                                        <br />
                                        {{ $data->user->ktp_alamat }}
                                    </p>
                                    <p class="m-t-30"><b>Kwitansi Date :</b> <i class="fa fa-calendar"></i> {{ date('d F Y', strtotime($data->created_at)) }}</p>
                                    <!-- <p><b>Due Date :</b> <i class="fa fa-calendar"></i> 25th Jan 2016</p> -->
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Description</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Nominal</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>{{ type_deposit($data->type) }}</td>
                                            <td class="text-right">1 </td>
                                            <td class="text-right"> {{ number_format($data->nominal) }} </td>
                                            <td class="text-right"> {{ number_format($data->nominal) }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <div class="pull-left m-t-30 text-left"">
                                <label>{{ get_setting('nama') }}</label>
                                <br />
                                {{ date('d F Y') }}
                                <br />
                                <br />
                                <br />
                                <br />
                                <p><u><b>{{ isset($data->user_proses->name) ? $data->user_proses->name : '' }}</b></u><br />
                                    {{ get_jabatan($data->user_proses->access_id) }}
                                    </p>
                            </div>
                            <div class="pull-right m-t-30 text-right">
                                <hr>
                                <h3><b>Total : </b>Rp. {{ number_format($data->nominal) }}</h3> </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-right">
                                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Cetak</span> </button>
                            </div>
                            <style type="text/css">
                                @media print {
                                   #print { display: none; }
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
    </div>
    <!-- /.container-fluid -->
    @extends('layout.footer-admin')
</div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
@section('footer-script')
    <script src="{{ asset('admin-css/js/jquery.PrintArea.js') }}" type="text/JavaScript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>
@endsection
@endsection