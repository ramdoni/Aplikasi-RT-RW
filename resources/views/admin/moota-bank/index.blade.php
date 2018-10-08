@extends('layout.admin')

@section('title', 'Bank - Koperasi Daya Masyarakat Indonesia')

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
                <h4 class="page-title">BANK</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <a href="{{ route('bank.create') }}" class="btn btn-success  btn-sm pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus"></i> TAMBAH</a>
                
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Bank</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">MANAGE BANK</h3>
                    <br />
                    <div class="table-responsive">
                        <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>BANK TYPE</th>
                                    <th>ATAS NAMA</th>
                                    <th>ACCOUNT NUMBER</th>
                                    <th>STATUS</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ strtoupper($item->nama) }}</td>
                                        <td>{{ $item->owner }}</td>
                                        <td>{{ $item->no_rekening }}</td>
                                        <td>
                                            @if($item->is_active == 1)
                                                <label class="btn btn-success btn-xs">Active</label>
                                            @endif
                                            @if($item->is_active == 0)
                                                <label class="btn btn-danger btn-xs">Inactive</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.moota-bank.mutasi', [$item->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-list"></i> Mutasi</a>
                                        </td>
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
