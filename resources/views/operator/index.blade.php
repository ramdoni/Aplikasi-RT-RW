@extends('layout.blank')

@section('title', 'OPERATOR - Koperasi Daya Masyarakat Indonesia')

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
                <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                <a href="{{ route('operator.dashboard')}}" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Profile</a>
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        
        <!-- .row -->
        <div class="row">

            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">TRANSAKSI PULSA</h3>
                    <br />
                    <form class="form-horizontal" method="POST" action="">
                        <div class="input-group m-b-30">
                            <span class="input-group-addon" id="basic-addon1">+62</span>
                            <input type="text" class="form-control" placeholder="NO TELEPON" name="no_telepon" aria-describedby="basic-addon1">
                        </div>  
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="example-email">PRODUCT</label>
                                <div>
                                   <select class="form-control">
                                        <option value="">- PRODUCT -</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="bt btn-success btn-sm"> Buy Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-6 col-lg-8 col-sm-12">
                <div class="panel">
                    <div class="panel-heading">HISTORY TRANSAKSI PULSA</div>
                    <div class="table-responsive">
                        <table class="table table-hover manage-u-table">
                            <thead>
                                <tr>
                                    <th style="width: 70px;" class="text-center">#</th>
                                    <th>PAKET</th>
                                    <th>HARGA</th>
                                    <th>TANGGAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($history as $no => $item)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td></td>
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
