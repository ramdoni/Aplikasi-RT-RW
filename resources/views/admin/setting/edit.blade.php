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
                    <li class="active">Setting</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">SETTING</h3>
                <br />
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.general-setting.update', $data->id) }}" method="POST">
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label class="col-md-12">Field</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" readonly="true" value="{{ $data->field }}" name="field"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Value</label>
                            <div class="col-md-12">
                                <textarea class="form-control" name="value">{{ $data->value }}</textarea> 
                            </div>
                        </div>
                        <a href="{{ route('admin.general-setting.index') }}" class="btn btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Cancel</a>
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i> Update</button>
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
