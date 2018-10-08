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
                <a href="{{ route('rekening-bank-user.create') }}" class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus"></i> TAMBAH</a>
                
                <ol class="breadcrumb">
                    <li><a href="{{ route('anggota.dashboard') }}">Dashboard</a></li>
                    <li class="active">Rekening Bank</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">MANAGE REKENING BANK</div>
                    <div class="table-responsive">
                        <div class="col-md-12">
                        
                            <table class="table table-hover manage-u-table">
                                <thead>
                                    <tr>
                                        <th width="70" class="text-center">#</th>
                                        <th>NAMA AKUN</th>
                                        <th>NO REKENING</th>
                                        <th>BANK</th>
                                        <th>CABANG</th>
                                        <th>ADDED</th>
                                        <th width="300">MANAGE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $no => $item)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ $item->nama_akun }}</td>
                                        <td>{{ $item->no_rekening }}</td>
                                        <td><img src="{{ asset('bank/'. $item->bank->image) }}" style="width: 100px;" /></td>
                                        <td>{{ $item->cabang }}</td>
                                        <td>{{ date("d F Y H:i:s", strtotime($item->created_at)) }}</td>
                                         <td>
                                            <a href="{{ route('rekening-bank-user.edit', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs"><i class="ti-pencil-alt"></i> edit</button></a> &nbsp;

                                            <form action="{{ route('rekening-bank-user.destroy', $item->id) }}" onsubmit="return confirm('Hapus data ini?')" method="post" style="float: left; margin-right: 5px;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}                                               
                                                <button type="submit" class="btn btn-danger btn-xs "><i class="ti-trash"></i> hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
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
