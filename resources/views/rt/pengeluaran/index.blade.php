@extends('layout.general')

@section('title', 'Pengeluaran')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Manage Pengeluaran</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="{{ route('rt.pengeluaran.create') }}" class="btn btn-info btn-sm pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus"></i> TAMBAH PENGELUARAN</a>
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Pengeluaran</li>
                </ol>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-12">
               <div class="white-box">
                    <form method="GET">
                        <div class="col-md-1">
                            <select class="form-control" name="tahun">
                                <option value="">Pilih Tahun</option>
                                @for($y = 2018; $y <= date('Y'); $y++)
                                <option>{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-1">
                            <select class="form-control" name="bulan">
                                <option value="">Pilih Bulan</option>
                                @foreach(bulan() as $no => $str)
                                <option value="{{ $no }}">{{ $str }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-info btn-sm">Filter</button>
                        </div>
                        <div class="col-md-6 pull-right text-right">
                            <h3>Total Pengeluaran : Rp . {{ number_format($total_pengeluaran) }}</h3>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <div class="table-responsive" style="padding-bottom:60px">
                        <table id="data_table_no_button" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>PENGELUARAN</th>
                                    <th>NOMINAL</th>
                                    <th>TANGGAL</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $no => $item)
                                <tr>
                                    <td class="text-center">{{ $no+1 }}</td>
                                    <td>{{ isset($item->pengeluaranType->name) ? $item->pengeluaranType->name : '' }}</td>
                                    <td>{{ number_format($item->nominal) }}</td>
                                    <td>{{ date('d F Y', strtotime($item->tanggal)) }}</td>
                                    <td>    
                                        <div class="btn-group m-r-10">
                                            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-xs btn-info dropdown-toggle waves-effect waves-light" type="button">Action 
                                                <span class="caret"></span>
                                            </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a onclick="return confirm('Hapus data ini ?')" href="{{ route('rt.pengeluaran.destroy', $item->id) }}"><i class="fa fa-trash"></i> Delete</a></li>
                                            </ul>
                                        </div>
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
<style type="text/css">
    #data_table_no_button_filter {display: none;}
</style>
@section('footer-script')
<script type="text/javascript">
    var confirm_autologin = function(url, name){
        bootbox.confirm("Login sebagai "+ name +" ?", function(res){
            if(res)
            {
                window.location = url;
            }
        })
    }
</script>
@endsection
@endsection
