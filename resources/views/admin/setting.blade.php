@extends('layout.admin')

@section('title', 'Admin')

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
                <h4 class="page-title">All Setting</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">All Setting</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <hr /><br />
                    <div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.general-setting.index') }}"><i class="mdi mdi-settings fa-fw"></i><span class="hide-menu">General</span></a>
                        </div><!-- 
                        <div class="col-md-2">
                            <a href="{{ route('admin.bank.index') }}"><i class="mdi mdi-bank fa-fw"></i><span class="hide-menu">Master Bank</span></a>
                        </div> -->
                        <div class="col-md-2">
                            <a href="{{ route('admin.iuran.index') }}"><i class="mdi mdi-wallet fa-fw"></i><span class="hide-menu">IURAN</span></a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.rw.index') }}"><i class="mdi mdi-home fa-fw"></i><span class="hide-menu">Rukun Warga (RW) </span></a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.rt.index') }}"><i class="mdi mdi-home fa-fw"></i><span class="hide-menu">Rukun Tetangga (RT) </span></a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.perumahan.index') }}"><i class="mdi mdi-home-variant fa-fw"></i><span class="hide-menu">Perumahan</span></a>
                        </div>
                        <!-- <div class="col-md-2">
                            <a href="{{ route('admin.rekening-bank.index') }}"><i class="mdi mdi-bank fa-fw"></i><span class="hide-menu">Bank Pengurus</span></a>
                        </div> -->
                        <div class="clearfix"></div><hr />
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
