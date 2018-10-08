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
                <h4 class="page-title">Dashboard</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

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
                <h3 class="box-title m-b-0">BANK</h3>
                <br />
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('bank.store') }}" method="POST">
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-12">Nama Bank</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" required name="nama"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Bank Code</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" required name="bank_code"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Logo</label>
                            <div class="col-md-12">
                                <input type="file" name="logo" class="form-control" required />
                            </div>
                        </div>
                        <a href="{{ url('admin/user-group') }}" class="btn btn-inverse waves-effect waves-light m-r-10">Cancel</a>
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                    </div>
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
