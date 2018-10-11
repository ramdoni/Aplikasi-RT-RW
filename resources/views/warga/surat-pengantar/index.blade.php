@extends('layout.general')

@section('title', 'Surat Pengantar')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">&nbsp;</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Surat Pengantar</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">SURAT PENGANTAR</h3>
                    <hr />
                    <form method="POST" action="{{ route('warga.surat-pengantar.request-submit') }}" onsubmit="return confirm('Proses Surat Pengantar ini ?')">
                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <select class="form-control" name="surat_pengantar">
                                <option value="">- Pilih Surat Pengantar -</option>
                                @foreach(list_surat_pengantar() as $item)
                                <option>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-info btn-sm">Request Surat Pengantar</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <div class="table-responsive">
                        <table id="data_table_no_search" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>SURAT PENGANTAR</th>
                                    <th>STATUS</th>
                                    <th>CREATED</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ $item->surat_pengantar }}</td>
                                        <td>
                                            @if($item->status == 1)
                                                <label class="btn btn-warning btn-xs">Waiting Approval</label>
                                            @endif
                                            @if($item->status == 2)
                                                <label class="btn btn-success btn-xs">Approved</label>
                                            @endif

                                        </td>
                                        <td>{{ $item->created_at }}</td>
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
