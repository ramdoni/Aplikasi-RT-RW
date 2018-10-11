@extends('layout.anggota')

@section('title', 'Pembayaran Anggota - Koperasi Daya Masyarakat Indonesia')

@section('sidebar')

@endsection

@section('content')

<div id="page-wrapper" style="min-height: 439px;">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Pembayaran</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="{{ route('anggota.profile') }}" class="btn-info btn-circle pull-right m-l-20"><i class="ti-user text-white"></i></a>
                <ol class="breadcrumb">
                    <li><a href="{{ route('anggota.dashboard') }}">Home</a></li>
                    <li class="active">Pembayaran</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <div class="vtabs">
                        <ul class="nav tabs-vertical col-md-4">
                            <li class="tab active li-tab-opsi_pembayaran">
                                <a data-toggle="tab" href="#tab-opsi_pembayaran" aria-expanded="false"> <span><i class="fa fa-money"></i> Opsi Pembayaran</span></a>

                            </li>
                            <li class="tab li-tab-rekening">
                                <a data-toggle="tab" href="#tab-rekening" aria-expanded="false"> <span><i class="fa fa-bank"></i> Rekening Bank</span></a>
                            </li>
                            <li class="tab li-tab-pembayaran">
                                <a aria-expanded="true" data-toggle="tab" href="#tab-pembayaran"> <span><i class="ti-email"></i> Pembayaran</span></a>
                            </li>
                        </ul>
                        <div class="tab-content col-md-7">
                            <div id="tab-opsi_pembayaran" class="tab-pane active">
                                <div class="col-lg-12 col-sm-12 col-xs-12">
                                    <div class="white-box">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#transfer" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false"><span><i class="fa fa-bank"></i> Bank Transfer</span></a></li>
                                            
                                            <li role="presentation" class=""><a href="#iprofile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span><i class="fa fa-credit-card-alt"></i> Kartu Kredit / Debit Online</span> </a></li>

                                            <li role="presentation" class=""><a href="#imessages" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="true"><span><i class="fa fa-bank"></i> Indomaret</span></a></li>
                                            
                                            <li role="presentation" class=""><a href="#isettings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span><i class="fa fa-bank"></i> Alfamart</span></a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="transfer">
                                                <div class="col-md-12 show-grid">
                                                    <h3>Bank Transfer</h3>
                                                    <p>Pilih salah satu bank yang akan anda transfer</p>  
                                                    @foreach($rekening_bank as $item)
                                                    <div class="col-md-4 list-bank" style="margin-right: 20px; cursor: pointer;">
                                                        <input type="hidden" class="hidden-rekening_bank_id" value="{{ $item->id }}">
                                                        <input type="hidden" class="hidden-rekening_bank_nama_akun" value="{{ $item->nama_akun }}">
                                                        <input type="hidden" class="hidden-rekening_bank_no_rekening" value="{{ $item->no_rekening }}">
                                                        <input type="hidden" class="hidden-rekening_bank_image" value="{{ asset('bank/'.$item->bank->image) }}">
                                                        <input type="hidden" class="hidden-rekening_bank_bank_id" value="{{ $item->bank_id }}">

                                                        <span class="btn btn-xs btn-rounded btn-success checklist-bank"><i class="fa fa-check"></i></span>

                                                        <img src="{{ asset('bank/'. $item->bank->image) }}">
                                                        <p>
                                                            No Rekening : <strong>{{ $item->no_rekening }}</strong><br />
                                                            <strong>{{ $item->nama_akun }}</strong>
                                                        </p>
                                                    </div>
                                                    @endforeach  
                                                </div>
                                                <button class="btn btn-success pull-right btn-next" style="display:none;">Berikutnya <i class="fa fa-arrow-right"></i> </button>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="iprofile">
                                                <br />
                                                <h4><i class="fa fa-ban"></i> <i> Maaf sistem pembayaran ini belum bisa digunakan</i></h4>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="imessages">
                                                <br />
                                                <h4><i class="fa fa-ban"></i> <i>Maaf sistem pembayaran ini belum bisa digunakan</i></h4>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="isettings">
                                                <br />
                                                <h4><i class="fa fa-ban"></i> <i>Maaf sistem pembayaran ini belum bisa digunakan</i></h4>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="clearfix"></div>
                            </div>

                            <div id="tab-rekening" class="tab-pane">
                                <h3>Rekening Bank Anda</h3>
                                
                                <!-- <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_rekening_bank"><i class="fa fa-plus"></i> Tambah Rekening Bank</a> -->
                                <a class="btn btn-sm btn-success" onclick="tambah_rekening_bank()"><i class="fa fa-plus"></i> Tambah Rekening Bank</a>
                                
                                <br style="clear:both;" />
                                <br style="clear:both;" />
                                <table class="table table-bordered" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Akun</th>
                                            <th>No Rekening</th>
                                            <th>Bank</th>
                                            <th>Cabang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rekening_bank_user as $no => $item)
                                        <tr style="cursor: pointer;" class="rekening_bank_user">
                                            <td style="position: relative;">
                                                <input type="hidden" class="rekening_bank_user_id" value="{{ $item->id }}">
                                                <span class="btn btn-xs btn-rounded btn-success checklist-rekening-bank"><i class="fa fa-check"></i></span>
                                                {{ $no+1 }}
                                            </td>
                                            <td>{{ $item->nama_akun }}</td>
                                            <td>{{ $item->no_rekening }}</td>
                                            <td><img src="{{ asset('bank/'. $item->bank->image) }}" style="width: 200px;" /></td>
                                            <td>{{ $item->cabang }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <button class="btn btn-success pull-right btn-next-rekening-bank" style="display:none;">Berikutnya <i class="fa fa-arrow-right"></i> </button>
                            </div>
                            <div id="tab-pembayaran" class="tab-pane">
                                <div class="white-box printableArea">
                                  <form method="post" id="form_payment" action="{{ route('anggota.bayar.submit') }}">
                                    {{ csrf_field() }}
                                    <h3><b>INVOICE</b> <span class="pull-right">#{{ $no_invoice }}</span></h3>

                                    <input type="hidden" name="no_invoice" value="{{ $no_invoice }}">
                                    <input type="hidden" name="total_pembayaran" value="{{ $total_pembayaran }}" />
                                    <input type="hidden" name="rekening_bank_id" />
                                    <input type="hidden" name="rekening_bank_user_id" />
                                    <input type="hidden" name="due_date" value="{{ $due_date }}" />
                                    <input type="hidden" name="code" value="{{ $code }}" />
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-left">
                                                <h3>Transfer Ke,</h3> 
                                                <div class="transfer_ke">
                                                    <img src="http://localhost/kodami.co.id/public/bank/1519125431.png">
                                                    <p>
                                                        No Rekening : <strong class="no_rekening">123456789</strong><br>
                                                        <strong class="nama_akun">Koperasi Daya Masyarakat</strong>
                                                    </p>
                                                </div> 
                                            </div>
                                            <div class="pull-right text-right">
                                                <address>
                                                    <h3>To,</h3>
                                                    <h4 class="font-bold">{{ Auth::user()->name }},</h4>
                                                    <p class="text-muted m-l-30">{{ Auth::user()->alamat }}</p>
                                                    <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> {{ $invoice_date }}</p>
                                                    <p><b>Due Date :</b> <i class="fa fa-calendar"></i> {{ date('d F Y', strtotime($due_date)) }}</p>
                                                </address>
                                            </div>
                                        </div> 
                                        <div class="col-md-12">
                                            <div class="table-responsive m-t-40" style="clear: both;">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th>Pembayaran</th>
                                                            <th class="text-right">Nominal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">1</td>
                                                            <td>Simpanan Pokok</td>
                                                            <td class="text-right">
                                                                Rp. {{ number_format(get_setting('simpanan_pokok')) }} 
                                                                <input type="hidden" name="simpanan_pokok" value="{{ get_setting('simpanan_pokok') }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">2</td>
                                                            <td>Simpanan Wajib</td>
                                                            <td class="text-right">
                                                                Rp. {{ number_format( (Auth::user()->durasi_pembayaran * get_setting('simpanan_wajib') )) }} ( {{ Auth::user()->durasi_pembayaran }} Bulan )
                                                                <input type="hidden" name="simpanan_wajib" value="{{ (Auth::user()->durasi_pembayaran * get_setting('simpanan_wajib')) }}" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">3</td>
                                                            <td>Kartu Anggota</td>
                                                            <td class="text-right">
                                                                Rp. {{ number_format( get_setting('kartu_anggota') ) }} (1 Kali Bayar) 
                                                                <input type="hidden" name="kartu_anggota" value="{{ get_setting('kartu_anggota') }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">3</td>
                                                            <td>Simpanan Sukarela</td>
                                                            <td class="text-right">
                                                                Rp. {{ number_format(Auth::user()->first_simpanan_sukarela ) }} 
                                                                <input type="hidden" name="simpanan_sukarela" value="{{ Auth::user()->first_simpanan_sukarela  }}" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="pull-right m-t-30 text-right">
                                                <h4>Unique Code <label class="label label-success">{{ $code }}</label></h4>
                                                <h3><b>Total :</b> Rp. {{ number_format($total_pembayaran) }}</h3> </div>
                                            <div class="clearfix"></div>
                                            <hr>
                                            <div class="text-right">
                                                <span class="btn btn-danger" id="submit_payment"> Proceed to payment </span>
                                                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                            </div>
                                        </div>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <div class="modal fade" id="modal_rekening_bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <form method="POST" action="{{ route('anggota.bayar.add-rekening-bank') }}" id="form-add-rekening">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Rekening Bank</h4> </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Akun:</label>
                                <input type="text" class="form-control" name="nama_akun" required> </div>
                            
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">No Rekening:</label>
                                <input type="text" class="form-control" name="no_rekening" required> </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Bank:</label>
                                <select class="form-control" name="bank_id" required>
                                    <option value=""> - Bank - </option>
                                    @foreach($bank as $item)
                                        <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                                    @endforeach
                                </select>
                                </div>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Cabang:</label>
                                <input type="text" class="form-control" name="cabang" required> </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="modal-simpan-rekening">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    @include('layout.footer-admin')
</div>

@section('footer-script')
<script type="text/javascript">
    
    var tambah_rekening_bank = function(){
        $("#modal_rekening_bank").modal("show");
    }

    if (window.location.hash)
    {
        $('a[data-toggle=tab][href="' + window.location.hash + '"]').tab('show');
    }
</script>

    <style type="text/css">
        /**
         * overide style
         */
        .vtabs {
            width: 100%;
        }
        .active-bank{
            background-color: #cfe1ec !important;
        }
        .checklist-bank {
            position: absolute;
            top: -10px;
            left: -10px;
            display: none;
        }
        .tab-content {
            margin-top:0;
            padding-top:0 !important;
        }
        .checklist-rekening-bank {
            position: absolute;
            top: -10px;
            left: -10px;
            display: none;
        }
    </style>
    <script src="{{ asset('js/bayar.js') }}"></script>
@endsection

@endsection