@extends('layout.anggota')

@section('title', 'Simpanan Sukarela - Koperasi Daya Masyarakat Indonesia')

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
                    <li class="active">Simpanan Sukarela</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">SIMPANAN SUKARELA</h3>
                <br />
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('anggota.simpanan-sukarela.store') }}" method="POST">
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-12">Nominal</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control" required name="nominal"> </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Upload Bukti Transfer</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="file_confirmation"> </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr />
                    <a href="{{ route('anggota.simpanan-sukarela.index') }}" class="btn btn-default waves-effect waves-light m-r-10 btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10 btn-sm"><i class="fa fa-arrow-right"></i> Submit Simpanan Sukarela</button>
                    <br style="clear: both;" />
                </form>
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
@endsection
