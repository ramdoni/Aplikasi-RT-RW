@extends('layout.admin')

@section('title', 'Setting - Koperasi Daya Masyarakat Indonesia')

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
                <a href="{{ route('admin.general-setting.create') }}" class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus"></i> TAMBAH</a>
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
                <div class="panel">
                    <div class="panel-heading">MANAGE SETTING </div>
                    <div class="table-responsive">
                        <div class="col-md-12">
                            <table id="data_table_no_button" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="70" class="text-center">#</th>
                                        <th>FIELD</th>
                                        <th>VALUE</th>
                                        <th width="300">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $no => $item)
                                        <tr>
                                            <td class="text-center">{{ $no+1 }}</td>
                                            <td>{{ $item->field }}</td>
                                            <td>{{ $item->value }}</td>
                                            <td>
                                                <a href="{{ route('admin.general-setting.edit', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs"><i class="ti-pencil-alt"></i> edit</button></a>
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