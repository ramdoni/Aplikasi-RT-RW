@extends('layout.admin')

@section('title', 'Anggota - Koperasi Daya Masyarakat Indonesia')

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
                    <a href="{{ url('profile')}}" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Profile</a>
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- .row -->
            <div class="row">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Konfirmasi Pembayaran Anggota</h3>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="post" action="{{ url('anggota/submitkonfirmasianggota') }}" enctype="multipart/form-data">
                                
                                {{ csrf_field() }}

                                <div class="form-group">
                                    @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('file_konfirmasi') }}</strong>
                                      </span>
                                    @endif
                                    
                                    <label for="exampleInputEmail1">Upload Struk Pembayaran</label>
                                    <input type="file" class="form-control" > </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a href="{{ url('anggota') }}" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- ============================================================== -->
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> &copy; Kodami Pocket System </footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
</div>

@endsection
