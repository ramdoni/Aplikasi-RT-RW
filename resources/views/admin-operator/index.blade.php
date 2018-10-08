@extends('layout.blank')

@section('title', 'ADMIN OPERATOR - Koperasi Daya Masyarakat Indonesia')

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
                    <li class="active">Dashboard</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        
        <!-- .row -->
        <div class="row">

            <div class="col-md-6 col-lg-8 col-sm-12">
                <div class="panel">
                    <div class="panel-heading">HISTORY TRANSAKSI PULSA</div>
                    <div class="table-responsive">
                        <table class="table table-hover manage-u-table">
                            <thead>
                                <tr>
                                    <th style="width: 70px;" class="text-center">#</th>
                                    <th>PROVIDER</th>
                                    <th>JENIS PRODUCT</th>
                                    <th>PRODUCT</th>
                                    <th>HARGA</th>
                                    <th>LAST UPDATE</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pulsa as $no => $item)
                                <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ $item->jenis_product }}</td>
                                    <td>{{ $item->product }}</td>
                                    <td>{{ $item->nominal }}</td>
                                    <td>{{ $item->updated_at }}</td>
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
