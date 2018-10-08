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
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.contact-us') }}"><i class="mdi mdi-account-multiple    multiple fa-fw"></i><span class="hide-menu">Submit Kontak Kami</span></a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.bank.index') }}"><i class="mdi mdi-bank fa-fw"></i><span class="hide-menu">Master Bank</span></a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.rekening-bank.index') }}"><i class="mdi mdi-bank fa-fw"></i><span class="hide-menu">Rekening Bank KODAMI</span></a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.user.index') }}"><i class="mdi mdi-key fa-fw"></i><span class="hide-menu">User Karyawan</span></a>
                        </div>
                        <div class="clearfix"></div><hr />

                        <div class="clearfix"></div><br />
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
