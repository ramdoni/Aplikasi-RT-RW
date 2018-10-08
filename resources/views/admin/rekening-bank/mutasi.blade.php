@extends('layout.admin')

@section('title', 'MUTASI - Koperasi Daya Masyarakat Indonesia')

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
                <h4 class="page-title">MUTASI</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <a href="{{ route('bank.create') }}" class="btn btn-success  btn-sm pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus"></i> TAMBAH</a>
                
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">MUTASI</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">MANAGE MUTASI</h3>
                    <br />
                    <div class="table-responsive">
                        <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>DESCRIPTION</th>
                                    <th>REKENING NUMBER</th>
                                    <th>DATE MOOTA</th>
                                    <th>DATE MUTASI</th>
                                    <th>AMOUNT</th>
                                    <th>TYPE</th>
                                    <th>NOTE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->account_number }}</td>
                                        <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>
                                        <td>{{ date('d F Y', strtotime($item->date)) }}</td>
                                        <td>{{ number_format($item->amount) }}</td>
                                        <td>
                                            @if($item->type == 'CR')
                                                <label class="btn btn-info btn-xs"> KREDIT</label>
                                            @endif
                                            @if($item->type == 'DB')
                                                <label class="btn btn-danger btn-xs">DEBIT</label>
                                            @endif
                                        </td>
                                        <td>{{ $item->note }}</td>
                                    </tr>
                                @endforeach
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
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->

@endsection
