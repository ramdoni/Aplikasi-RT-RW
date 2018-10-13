@extends('layout.admin')

@section('title', 'PAK RT')

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
                    <li><a href="javascript:void(0)">Dashboard </a></li>
                    <li class="active">Home</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="row row-in">
                        <div class="col-lg-3 col-sm-6 row-in-br">
                            <ul class="col-in">
                                <li>
                                    <span class="circle circle-md bg-danger"><i class="ti-clipboard"></i></span>
                                </li>
                                <li class="col-last">
                                    <h3 class="counter text-right m-t-15">{{ $total_anggota }}</h3>
                                </li>
                                <li class="col-middle">
                                    <h4>Total Warga</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                            <ul class="col-in">
                                <li>
                                    <span class="circle circle-md bg-info"><i class="ti-wallet"></i></span>
                                </li>
                                <li class="col-last">
                                    <h3 class="counter text-right m-t-15">{{ $total_simpanan_pokok }}</h3>
                                </li>
                                <li class="col-middle">
                                    <h4>Total Iuran</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
                    <!-- col-md-9 -->
                    <div class="col-md-4">
                        <div class="manage-users">
                            <div class="sttabs tabs-style-iconbox">
                                <nav>
                                    <ul>
                                        <li class="tab-current"><a href="#section-iconbox-1" class="sticon ti-user"><span>Pembayaran Iuran Terbaru</span></a></li>
                                    </ul>
                                </nav>
                                <div class="content-wrap">
                                    <section id="section-iconbox-1" class="">
                                        <div class="p-20 row">
                                            <div class="col-sm-6">
                                                <h3 class="m-t-0">Pembayaran Iuran Terbaru</h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <ul class="side-icon-text pull-right">
                                                    <li><a href="#"><span class="circle circle-sm bg-success di"><i class="ti-plus"></i></span><span>Add Users</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="table-responsive manage-table">
                                            <table class="table">
                                                 <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NAME</th>
                                                        <th>EMAIL</th>
                                                        <th>LAST SIGNIN</th>
                                                        <th>LAST SIGNOUT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="p-10 p-t-30 row">
                                            <div class="col-sm-8">
                                                <h3>1 members selected</h3>
                                            </div>
                                            <div class="col-sm-2 pull-right m-t-10"><a href="javascript:void(0);" class="btn btn-block p-10 btn-rounded btn-danger"><span>DETAIL</span><i class="ti-arrow-right m-l-5"></i></a></div>
                                        </div>
                                    </section>
                                    <section id="section-iconbox-2" class="">
                                        <div class="p-20 row">
                                            <div class="col-sm-6">
                                                <h3 class="m-t-0">Set Users Permission</h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <ul class="side-icon-text pull-right">
                                                    <li><a href="#"><span class="circle circle-sm bg-success di"><i class="ti-plus"></i></span><span>Add Users</span></a></li>
                                                    <li><a href="#"><span class="circle circle-sm bg-danger di"><i class="ti-pencil-alt"></i></span><span>Edit</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="table-responsive manage-table">
                                            <table class="table">
                                                 <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NAME</th>
                                                        <th>EMAIL</th>
                                                        <th>LAST SIGNIN</th>
                                                        <th>LAST SIGNOUT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="p-10 row">
                                            <div class="col-sm-8">
                                                <h3>1 members selected</h3>
                                            </div>
                                            <div class="col-sm-2 pull-right m-t-10"><a href="javascript:void(0);" class="btn btn-block p-10 btn-rounded btn-danger"><span>DETAIL</span><i class="ti-arrow-right m-l-5"></i></a></div>
                                        </div>
                                    </section>
                                    <section id="section-iconbox-3" class="">
                                       
                                    </section>
                                </div>
                                <!-- /content -->
                            </div>
                            <!-- /tabs -->
                        </div>
                    </div>
                    <!-- /col-md-9 -->
                    <!-- col-md-3 -->
                    <div class="col-md-8">
                        <div class="panel wallet-widgets">
                            <div class="panel-body">
                                <ul class="side-icon-text">
                                    <li class="m-0"><a href="#"><span class="circle circle-md bg-success di vm"><i class="ti-plus"></i></span><div class="di vm"><h1 class="m-b-0">RP. 0</h1><h5 class="m-t-0"></h5></div></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /col-md-3 -->
                </div>


        <!-- ============================================================== -->
    </div>
    <!-- /.container-fluid -->
    @include('layout.footer-admin')
</div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
</div>
@endsection
