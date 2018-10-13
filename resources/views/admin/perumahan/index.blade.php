@extends('layout.admin')

@section('title', 'Perumahan')

@section('content')
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Perumahan</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="{{ route('admin.perumahan.create') }}" class="btn btn-success  btn-sm pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus"></i> TAMBAH</a>
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Perumahan</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">MANAGE PERUMAHAN</h3>
                    <br /> 
                    <div class="table-responsive">
                        <table id="data_table_no_button" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>NAMA PERUMAHAN</th>
                                    <th>LOGO</th>
                                    <th>ADDED</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ $item->nama_perumahan }}</td>
                                        <td>
                                            @if(!empty($item->logo))
                                            <img src="{{ asset('uploads/logo-perumahan/'. $item->logo) }}" style="width: 80px;" />
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.perumahan.edit', ['id' => $item->id]) }}"> <button class="btn btn-default btn-xs"><i class="ti-pencil-alt"></i> edit</button></a>

                                            <form action="{{ route('admin.perumahan.destroy', $item->id) }}" onsubmit="return confirm('Hapus data ini?')" method="post" style="float: left; margin-right: 5px;">
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
