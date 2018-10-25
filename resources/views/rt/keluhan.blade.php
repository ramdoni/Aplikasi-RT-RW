@extends('layout.general')

@section('title', 'Keluhan dan Saran')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Keluhan dan Saran</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard </a></li>
                    <li class="active">Home</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive" style="padding-bottom:60px">
                        <table id="data_table_no_button" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>WARGA</th>
                                    <th>TO</th>
                                    <th>PESAN</th>
                                    <th>TANGGAL</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $no => $item)
                                <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ isset($item->user->name) ? $item->user->name : '' }}</td>
                                    <td>{{ $item->to }}</td>
                                    <td>{{ $item->pesan }}</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer-admin')
</div>
@endsection
