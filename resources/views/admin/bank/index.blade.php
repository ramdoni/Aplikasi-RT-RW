@extends('layout.admin')

@section('title', 'Bank - Koperasi Daya Masyarakat Indonesia')

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
                <h4 class="page-title">BANK</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <a href="{{ route('bank.create') }}" class="btn btn-success  btn-sm pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus"></i> TAMBAH</a>
                
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
                    <h3 class="box-title m-b-0">MANAGE BANK</h3>
                    <br />
                    <div class="table-responsive">
                        <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>NAMA BANK</th>
                                    <th>LOGO</th>
                                    <th>ADDED</th>
                                    <th width="300">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td><img src="{{ asset('bank/'. $item->image) }}" style="width: 80px;" /></td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('bank.edit', ['id' => $item->id]) }}"> <button class="btn btn-default btn-xs"><i class="ti-pencil-alt"></i> edit</button></a>

                                            <form action="{{ route('bank.destroy', $item->id) }}" onsubmit="return confirm('Hapus data ini?')" method="post" style="float: left; margin-right: 5px;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}                                               
                                                <button type="submit" class="btn btn-danger btn-xs"><i class="ti-trash"></i> hapus</button>
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
