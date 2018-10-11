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
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Rekening Bank</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">REKENING BANK</h3>
                <br />
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('rekening-bank-user.update', $data->id) }}" method="POST">
                    <div class="col-md-6">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-12">Nama Akun</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" required name="nama_akun" value="{{ $data->nama_akun }}"> </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">No Rekening</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control" required name="no_rekening" value="{{ $data->no_rekening }}"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Bank</label>
                            <div class="col-md-12">
                                <select class="form-control" name="bank_id">
                                    @foreach($bank as $item)
                                        <option value="{{ $item->id}}" {{ $data->bank_id == $item->id ? ' selected' : '' }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Cabang</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" required name="cabang"  value="{{ $data->cabang }}"> </div>
                        </div>

                        <a href="{{ route('rekening-bank-user.index') }}" class="btn btn-inverse waves-effect waves-light m-r-10">Cancel</a>
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
