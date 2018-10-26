@extends('layout.general')

@section('title', 'Dashboard Warga')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <div class="row row-in">
                        <div class="col-lg-3 col-sm-6 row-in-br">
                            <ul class="col-in">
                                <li>
                                    <span class="circle circle-md bg-danger"><i class="ti-clipboard"></i></span>
                                </li>
                                <li class="col-last">
                                    <h3 class="counter text-right m-t-15">{{ total_warga_rt() }}</h3>
                                </li>
                                <li class="col-middle">
                                    <h4>Total Warga</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-3">
                            <ul class="col-in">
                                <li>
                                    <span class="circle circle-md bg-info"><i class="ti-wallet"></i></span>
                                </li>
                                <li class="col-last">
                                    <a href="{{ route('warga.iuran-all') }}"><h3 class="counter text-right m-t-15">{{ number_format(total_iuran_rt()) }}</h3></a>
                                </li>
                                <li class="col-middle">
                                    <h4>Total Iuran</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-3">
                            <ul class="col-in">
                                <li>
                                    <span class="circle circle-md bg-info"><i class="ti-wallet"></i></span>
                                </li>
                                <li class="col-last">
                                    <h3 class="counter text-right m-t-15">{{ number_format(total_pengeluaran_rt()) }}</h3>
                                </li>
                                <li class="col-middle">
                                    <h4>Total Pengeluaran</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="white-box">
                        <h5 class="pull-left"><strong>IURAN WARGA</strong></h5>
                        <h5 class="pull-right"><strong>TOTAL IURAN : Rp. {{ number_format($total_iuran) }}</strong></h5>
                        <div class="clearfix"></div>
                        <hr />
                        <form method="GET">
                            <div class="col-md-4" style="padding-left: 0;margin-left:0;">
                                <select class="form-control" name="tahun_iuran">
                                    <option value="">Pilih Tahun</option>
                                    @for($y = 2018; $y <= date('Y'); $y++)
                                    <option>{{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="bulan_iuran">
                                    <option value="">Pilih Bulan</option>
                                    @foreach(bulan() as $no => $str)
                                    <option value="{{ $no }}">{{ $str }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-info btn-sm">Filter</button>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <table id="data_table_no_search_no_sorting" class="display nowrap" cellspacing="0" width="auto" >
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>WARGA</th>
                                        <th>NOMINAL</th>
                                        <th>TANGGAL PEMBAYARAN</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $no => $item)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ isset($item->user->name) ? $item->user->name : '' }}</td>
                                        <td>{{ number_format($item->nominal) }}</td>
                                        <td>{{ date('d F Y', strtotime($item->date_proses))  }}</td>
                                        <td>
                                            @if($item->status ==1 )
                                                <label class="btn btn-warning btn-xs">Menunggu Konfirmasi RT</label>
                                            @else 
                                                <label class="btn btn-success btn-xs">Berhasil</label>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="white-box">
                        <h5 class="pull-left"><strong>PENGELUARAN</strong></h5>
                        <h5 class="pull-right"><strong>TOTAL IURAN : Rp. {{ number_format($total_pengeluaran) }}</strong></h5>
                        <div class="clearfix"></div>
                        <hr />
                        <form method="GET">
                            <div class="col-md-4" style="padding-left: 0;margin-left:0;">
                                <select class="form-control" name="tahun_pengeluaran">
                                    <option value="">Pilih Tahun</option>
                                    @for($y = 2018; $y <= date('Y'); $y++)
                                    <option>{{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="bulan_pengeluaran">
                                    <option value="">Pilih Bulan</option>
                                    @foreach(bulan() as $no => $str)
                                    <option value="{{ $no }}">{{ $str }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-info btn-sm">Filter</button>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <table class="display nowrap data_table_no_search_no_sorting" cellspacing="0" width="auto" >
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>JENIS PENGELUARAN</th>
                                        <th>NOMINAL</th>
                                        <th>TANGGAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pengeluaran as $no => $item)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ isset($item->pengeluaranType->name) ? $item->pengeluaranType->name : ''  }}</td>
                                        <td>{{ number_format($item->nominal)  }}</td>
                                        <td>{{ date('d F Y', strtotime($item->tanggal))  }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer-admin')
</div>
<style type="text/css">
    .col-in h3 {
        font-size: 24px;
    }
</style>
@endsection
