@extends('layout.admin')

@section('title', 'Simpanan Wajib - Koperasi Daya Masyarakat Indonesia')

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
                    <li class="active">Simpanan Wajib</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
               <div class="white-box">
                    <h3 class="box-title m-b-0">Manage Simpanan Wajib</h3>
                    <br />
                    <div class="table-responsive">
                        <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>NAME</th>
                                    <th>NO ANGGOTA</th>
                                    <th>NOMINAL</th>
                                    <th>STATUS</th>
                                    <th>ADDED</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $no => $item)
                                  @if(isset($item->user->name))
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->user->no_anggota }}</td>
                                        <td>{{ number_format($item->nominal) }}</td>
                                        <td>{!! status_deposit($item->status) !!}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td></td>
                                    </tr>
                                  @endif
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
