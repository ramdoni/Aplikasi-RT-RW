@extends('layout.anggota')

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
                <h4 class="page-title">Dashboard</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <ol class="breadcrumb">
                    <li><a href="{{ route('anggota.index') }}">Dashboard</a></li>
                    <li class="active">Rekening Bank</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">

                @include('layout.alert');

                <div class="panel">
                    <div class="panel-heading">MANAGE REKENING BANK <a href="{{ route('anggota.rekening-bank.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> TAMBAH</a></div>
                    <div class="table-responsive">
                        <div class="col-md-12">
                            
                        </div>
                        <table class="table table-hover manage-u-table">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>NAMA AKUN</th>
                                    <th>NO REKENING</th>
                                    <th>NAMA BANK</th>
                                    <th>CABANG</th>
                                    <th>ADDED</th>
                                    <th width="300">MANAGE</th>
                                </tr>
                            </thead>
                            <tbody>
                                
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
