@extends('layout.cs')

@section('title', 'Customer Service - Koperasi Daya Masyarakat Indonesia')

@section('sidebar')

@endsection

@section('content')
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <br />
        <div class="clearfix"></div>
        <!-- .row --> 
        <div class="row">
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
                    <div class="white-box" style="min-height: 207px;">
                        <h3 class="box-title">SIMPANAN POKOK</h3>
                        <ul class="list-inline two-part">
                            <li><i class="icon-folder text-purple"></i></li>
                            <li class="text-right"><h2 class="counter">{{ number_format(all_simpanan_pokok()->where('status', 3)->sum('nominal')) }}</h2></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="white-box" style="min-height: 207px;">
                        <h3 class="box-title">SIMPANAN SUKARELA</h3>
                        <ul class="list-inline two-part">
                            <li><i class="icon-folder-alt text-danger"></i></li>
                            <li class="text-right"><h2 class="">{{ number_format(all_simpanan_sukarela()->where('status', 3)->sum('nominal')) }}</h2></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="white-box" style="min-height: 207px;">
                        <h3 class="box-title">SIMPANAN WAJIB</h3>
                        <ul class="list-inline two-part">
                            <li><i class="ti-wallet text-success"></i></li>
                            <li class="text-right"><h2 class="">{{ number_format(all_simpanan_wajib()->where('status', 3)->sum('nominal')) }}</h2></li>
                        </ul>
                        <div class="clearfix"></div>
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
