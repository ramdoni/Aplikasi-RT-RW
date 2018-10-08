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
                    <li class="active">Home</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">MANAGE USER GROUP <a href="{{ url('admin/user-group/create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> TAMBAH</a></div>
                    <div class="table-responsive">
                        <div class="col-md-12">
                            
                        </div>
                        <table class="table table-hover manage-u-table">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>ADDED</th>
                                    <th width="300">MANAGE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('user-group.edit', ['id' => $item->id]) }}"> <button class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button></a>

                                            <form action="{{ route('user-group.destroy', $item->id) }}" method="post" style="float: left;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}                                               
                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash"></i></button>
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
