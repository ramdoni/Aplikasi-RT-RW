@extends('layout.admin')

@section('title', 'MUTASI - Koperasi Daya Masyarakat Indonesia')

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
                <h4 class="page-title"></h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">MUTASI</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">MANAGE MUTASI BANK {{ $bank->nama }}</h3>
                    <hr />
                    <form method="GET" class="filter-div" autocomplete="off">
                        <div class="col-md-3" style="margin-left:0;padding-left: 0;">
                            <div class="input-daterange input-group" id="date-range">
                                <input type="text" placeholder="Start Date" class="form-control" name="start" id="from" value="{{ isset($_GET['start']) ? $_GET['start'] : '' }}" /> <span class="input-group-addon bg-info b-0 text-white">to</span>
                                <input type="text" placeholder="End Date" class="form-control" name="end" id="to"  value="{{ isset($_GET['end']) ? $_GET['end'] : '' }}" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <select name="type" class="form-control">
                                <option value="">Tipe Transaksi</option>
                                <option value="1">Kredit</option>
                                <option value="2">Debit</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-info"><i class="fa fa-search-plus"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>
                        </div>
                    </form>
                    <div class="clearfix"></div>                    
                    <br />
                    <div class="col-sm-12" style="padding-left: 0;">
                        <div class="white-box" style="padding-left:0;padding-bottom:0;margin-bottom:0;">
                            <div class="row row-in">
                                <div class="col-md-2 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-danger"><i class="ti-clipboard"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="text-right m-t-15">2.000.000.000</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Pemasukan</h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40%</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-2 row-in-br  b-r-none">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-info"><i class="ti-wallet"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="text-right m-t-15">700.000.000</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Pengeluaran</h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-2 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-success"><i class=" ti-shopping-cart"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="text-right m-t-15">200.000.000</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Transaksi Masuk</h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-2 b-0">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-warning"><i class="fa fa-dollar"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="text-right m-t-15">300.000.000</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Transaksi Keluar</h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 b-0">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-warning"><i class="fa fa-dollar"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="text-right m-t-15" style="font-size: 36px;">830.000.000.000</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Total Saldo</h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr />
                    <div class="table-responsive">
                        <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>DESCRIPTION</th>
                                    <th>REKENING NUMBER</th>
                                    <th>DATE MOOTA</th>
                                    <th>DATE MUTASI</th>
                                    <th>AMOUNT</th>
                                    <th>TYPE</th>
                                    <th>NOTE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->account_number }}</td>
                                        <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>
                                        <td>{{ date('d F Y', strtotime($item->date_transfer)) }}</td>
                                        <td>{{ number_format($item->amount) }}</td>
                                        <td>
                                            @if($item->type == 1)
                                                <label class="btn btn-info btn-xs"> KREDIT</label>
                                            @endif
                                            @if($item->type == 2)
                                                <label class="btn btn-danger btn-xs">DEBIT</label>
                                            @endif
                                        </td>
                                        <td>{{ $item->note }}</td>
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
    .col-in h3 {
        font-size: 17px;
    }
    .col-in li.col-middle {
        width: 100%;
    }
    .m-t-15 {
        margin-top: 6px!important;
    }
    .circle-md {
        width: 40px;
        padding-top: 9px;
        height: 40px;
        font-size: 13px!important;
    }
</style>
@section('footer-script')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
    $( "#from, #to" ).datepicker({
        defaultDate: "-1w",
        changeMonth: true,
        numberOfMonths: 2,
        dateFormat: 'yy-mm-dd',
        maxDate: new Date(),
        onSelect: function( selectedDate ) {
            if(this.id == 'from'){
              var dateMin = $('#from').datepicker("getDate");
              var rMin = new Date(dateMin.getFullYear(), dateMin.getMonth(),dateMin.getDate()); // Min Today
              var rMax = new Date(); // Max Today
              $('#to').datepicker("option","minDate",rMin);
              $('#to').datepicker("option","maxDate",rMax);                    
            }
        }
    });

</script>
@endsection
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->

@endsection
