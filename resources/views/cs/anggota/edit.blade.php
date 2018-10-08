@extends('layout.cs')

@section('title', 'Customer Service - Koperasi Daya Masyarakat Indonesia')

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
                    <li class="active">Anggota</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
            <div class="white-box">
                @if(Session::has('message-success-content'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: black;">&times;</button> 
                        <strong> <i class="fa fa-info-circle"></i> Data Anggota berhasil disimpan, silahkan melakukan pembayaran ke kasir !</strong>
                    </div>
                @endif
                <h3 class="box-title m-b-0">Data Anggota #<label class="text-danger">{{ $data->no_anggota }}</label></h3>
                <hr />
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('cs.anggota.update', $data->id) }}" method="POST">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active" role="presentation" class=""><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Profile</span></a></li>
                        <li role="presentation" class=""><a href="#simpanan" aria-controls="simpanan" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Simpanan</span></a></li>
                         <li role="presentation" class=""><a href="#upload_file" aria-controls="upload_file" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Upload File</span></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="profile">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-6">No Anggota</label>
                                    <label class="col-md-6">KTP Number</label>
                                    <div class="col-md-6">
                                        <input type="text" name="no_anggota" readonly="true" value="{{ $data->no_anggota }}" class="form-control"> 
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="nik" class="form-control" value="{{ $data->nik }}"> 
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">Nama</label>
                                    <label class="col-md-6">Jenis Kelamin</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" value="{{ $data->name }}"> 
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="jenis_kelamin" required>
                                            <option value=""> - Jenis Kelamin - </option>
                                            @foreach(['Laki-laki', 'Perempuan'] as $item)
                                                <option {{ $data->jenis_kelamin == $item ? 'selected' : '' }}>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">Email</label>
                                    <label class="col-md-6">Telepon</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" value="{{ $data->email }}"> 
                                    </div>
                                     <div class="col-md-6">
                                        <input type="text" name="telepon" class="form-control" value="{{ $data->telepon }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Agama</label>
                                    <label class="col-md-4">Tempat Lahir</label>
                                    <label class="col-md-4">Tanggal Lahir</label>
                                    <div class="col-md-4"s>
                                        <?php $agama = ['Islam', 'Kristen', 'Budha', 'Hindu']; ?>
                                        <select class="form-control" name="agama">
                                            <option value=""> - Agama - </option>
                                            @foreach($agama as $item)
                                                <option value="{{ $item }}" {{ $data->agama == $item ? 'selected' : '' }}> {{ $item }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="tempat_lahir" class="form-control" value="{{ $data->tempat_lahir }}"> 
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="tanggal_lahir" class="form-control datepicker" value="{{ $data->tanggal_lahir }}"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">Password</label>
                                    <label class="col-md-6">Ketik Ulang Password</label>
                                    <div class="col-md-6">
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" name="confirmation" class="form-control"> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12">Domisili Alamat</label>
                                        <div  class="col-md-12">
                                            <select name="domisili_provinsi_id" class="form-control">
                                                <option value=""> - Provinsi - </option>
                                                @foreach(get_provinsi() as $item)
                                                <option value="{{ $item->id_prov }}" {{ $item->id_prov == $data->domisili_provinsi_id ? 'selected' : '' }} >{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                        <div class="col-md-12">
                                            <select name="domisili_kabupaten_id" class="form-control">
                                                <option value=""> - Kota / Kabupaten - </option>
                                                @if($data->domisiliKabupatenByProvinsi)
                                                    @foreach($data->domisiliKabupatenByProvinsi as $item)
                                                        <option value="{{ $item->id_kab }}" {{ $item->id_kab == $data->domisili_kabupaten_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <select name="domisili_kecamatan_id" class="form-control">
                                                <option value=""> - Kecamatan - </option>
                                                @if($data->domisiliKecamatanByKabupaten)
                                                    @foreach($data->domisiliKecamatanByKabupaten as $item)
                                                        <option value="{{ $item->id_kec }}" {{ $item->id_kec == $data->domisili_kecamatan_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <select name="domisili_kelurahan_id" class="form-control">
                                                <option value=""> - Kelurahan - </option>
                                                @if($data->domisiliKelurahanByKecamatan)
                                                    @foreach($data->domisiliKelurahanByKecamatan as $item)
                                                        <option value="{{ $item->id_kel }}" {{ $item->id_kel == $data->domisili_kelurahan_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="domisili_alamat" placeholder="Alamat RT / RW">{{ $data->domisili_alamat }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat KTP</label>
                                        <select name="ktp_provinsi_id" class="form-control">
                                            <option value=""> - Provinsi - </option>
                                            @foreach(get_provinsi() as $item)
                                            <option value="{{ $item->id_prov }}" {{ $item->id_prov == $data->ktp_provinsi_id ? 'selected' : '' }} >{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="ktp_kabupaten_id" class="form-control">
                                            <option value=""> - Kota / Kabupaten - </option>
                                            @if($data->ktpKabupatenByProvinsi)
                                                @foreach($data->ktpKabupatenByProvinsi as $item)
                                                    <option value="{{ $item->id_kab }}" {{ $item->id_kab == $data->ktp_kabupaten_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="ktp_kecamatan_id" class="form-control">
                                            <option value=""> - Kecamatan - </option>
                                            @if($data->ktpKecamatanByKabupaten)
                                                @foreach($data->ktpKecamatanByKabupaten as $item)
                                                    <option value="{{ $item->id_kec }}" {{ $item->id_kec == $data->ktp_kecamatan_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="ktp_kelurahan_id" class="form-control">
                                            <option value=""> - Kelurahan - </option>
                                            @if($data->ktpKelurahanByKecamatan)
                                                @foreach($data->ktpKelurahanByKecamatan as $item)
                                                    <option value="{{ $item->id_kel }}" {{ $item->id_kel == $data->ktp_kelurahan_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="ktp_alamat" placeholder="Alamat RT / RW">{{ $data->ktp_alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-6">Passport Number</label>
                                        <label class="col-md-6">KK Number</label>
                                        <div class="col-md-6">
                                            <input type="text" name="passport_number" class="form-control" value="{{ $data->passport_number }}">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="kk_number" class="form-control" value="{{ $data->kk_number }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6">NPWP Number</label>
                                        <label class="col-md-6">BPJS Number</label>
                                        <div class="col-md-6">
                                            <input type="text" name="npwp_number" class="form-control" value="{{ $data->npwp_number }}">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="bpjs_number" class="form-control" value="{{ $data->bpjs_number }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="upload_file">
                            <div class="form-group">
                                    <label class="col-md-4">KTP</label>
                                    <label class="col-md-4">Foto</label>
                                    <label class="col-md-4">NPWP</label>
                                    <div class="col-md-4">
                                        <input type="file" name="file_ktp" class="form-control">
                                        @if(!empty($data->foto_ktp))
                                            <div class="col-md-4">
                                                <img src="{{ asset('file_ktp/'. $data->id .'/'.  $data->foto_ktp)}}" style="width: 200px;">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" name="file_photo" class="form-control">
                                        @if(!empty($data->foto))
                                            <div class="col-md-4">
                                                <img src="{{ asset('file_photo/'. $data->id .'/'.  $data->foto)}}" style="width: 200px;">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" name="file_npwp" class="form-control">
                                        @if(!empty($data->file_npwp))
                                            <div class="col-md-4">
                                                <img src="{{ asset('file_npwp/'. $data->id .'/'.  $data->file_npwp)}}" style="width: 200px;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                               
                        </div>
                        <div role="tabpanel" class="tab-pane" id="simpanan">

                            <div class="col-md-2">
                                <h3 style="margin-top: 0;"><small>Simpanan Wajib</small>
                                    <br /> Rp. {{ number_format(simpanan_wajib($data->id)->where('status', 3)->sum('nominal')) }}
                                                                </h3>
                                <label class="btn btn-info btn-xs" onclick="topup_simpanan_wajib()"><i class="fa fa-plus"></i> Topup</label>
                            
                                <p>Jatuh tempo pembayaran selanjutnya<br /> <label class="text-danger">{{ date('d F Y', strtotime($data->first_durasi_pembayaran_date ." + ". $data->durasi_pembayaran ." month") ) }}</label></p>
                            
                            </div>
                            <div class="col-md-2">
                                <h3><small>Simpanan Pokok</small><br /> Rp. {{ number_format(simpanan_pokok($data->id)->where('status', 3)->sum('nominal')) }}</h3>
                                
                                @if(simpanan_pokok($data->id)->where('status', 3)->sum('nominal') == 0)
                                    <label class="btn btn-info btn-xs" onclick="topup_simpanan_pokok()"><i class="fa fa-plus"></i> Topup</label>
                                @endif

                            </div>
                            <div class="col-md-2">
                                <h3><small>Simpanan Sukarela</small><br /> Rp. {{ number_format(simpanan_sukarela($data->id)->where('status', 3)->sum('nominal')) }}</h3>
                                <label class="btn btn-info btn-xs" onclick="topup()"><i class="fa fa-plus"></i> Topup</label>
                            </div>
                            <div class="clearfix"></div>
                            <hr />
                            <br />

                             <div>
                                <div class="col-md-2">
                                    <ul class="nav tabs-vertical">
                                        <li class="tab active">
                                            <a data-toggle="tab" href="#simpanan_pokok" aria-expanded="true"> <span class="visible-xs"><i class="ti-home"></i></span> <span class="hidden-xs">Simpanan Pokok</span> </a>
                                        </li>
                                        <li class="tab">
                                            <a data-toggle="tab" href="#simpanan_sukarela" aria-expanded="false"> <span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Simpanan Sukarela</span> </a>
                                        </li>
                                        <li class="tab">
                                            <a aria-expanded="false" data-toggle="tab" href="#simpanan_wajib"> <span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Simpanan Wajib</span> </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-10">
                                    <div class="tab-content" style="margin-top:0;">
                                        <div id="simpanan_pokok" class="tab-pane active">
                                            <h3>Simpanan Pokok</h3>
                                            <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nominal</th>
                                                        <th>Tanggal</th>
                                                        <th>User Proses</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach(simpanan_pokok($data->id)->orderBy('id', 'DESC')->get() as $no => $item)
                                                    <tr>
                                                        <td>{{ $no+1 }}</td>
                                                        <td>{{ number_format($item->nominal) }}</td>    
                                                        <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>    
                                                        <td>{{ isset($item->user_proses->name) ? $item->user_proses->name : '' }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.anggota.cetak-kwitansi', $item->id) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-print"></i> cetak kwitansi</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="simpanan_sukarela" class="tab-pane">
                                            <h3>Simpanan Sukarela</h3>
                                            <table id="data_table2" class="display nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nominal</th>
                                                        <th>Tanggal</th>
                                                        <th>User Proses</th>
                                                        <th>#</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                @foreach(simpanan_sukarela($data->id)->orderBy('id', 'DESC')->get() as $no => $item)
                                                    <tr>
                                                        <td>{{ $no+1 }}</td>
                                                        <td>{{ number_format($item->nominal) }}</td>    
                                                        <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>    
                                                        <td>{{ isset($item->user_proses->name) ? $item->user_proses->name : '' }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.anggota.cetak-kwitansi', $item->id) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-print"></i> cetak kwitansi</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="simpanan_wajib" class="tab-pane">
                                            <h3>Simpanan Wajib</h3>
                                            <table id="data_table3" class="display nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nominal</th>
                                                        <th>Tanggal</th>
                                                        <th>User Proses</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                @foreach(simpanan_wajib($data->id)->orderBy('id', 'DESC')->get() as $no => $item)
                                                    <tr>
                                                        <td>{{ $no+1 }}</td>
                                                        <td>{{ number_format($item->nominal) }}</td>    
                                                        <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>  
                                                        <td>{{ isset($item->user_proses->name) ? $item->user_proses->name : '' }}</td>  
                                                        <td>
                                                            <a href="{{ route('admin.anggota.cetak-kwitansi', $item->id) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-print"></i> cetak kwitansi</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ route('cs.anggota.index') }}" class="btn btn-default btn-sm waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Back</a>
                            <button type="submit" class="btn btn-success waves-effect btn-sm waves-light m-r-10"><i class="fa fa-save"></i> Save Anggota</button>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </form>
              </div>
            </div>                        
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
    </div>
    <!-- /.container-fluid -->
    @include('layout.footer-admin')
</div>
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Topup</h4> </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" name="nominal" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Submit Topup</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal simpanan pokok-->
<div id="modal_simpanan_pokok" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.anggota.topup-simpanan-pokok') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Topup Simpanan Pokok</h4> 
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" name="nominal" class="form-control" value="{{ get_setting('simpanan_pokok') }}">
                    </div>
                    <input type="hidden" name="user_id" value="{{ $data->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                    <button type="submit" class="btn btn-success waves-effect btn-sm"><i class="fa fa-print"></i> Topup Simpanan Pokok</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal simpanan wajib-->
<div id="modal_simpanan_wajib" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.anggota.topup-simpanan-wajib') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Topup Simpanan Wajib</h4> 
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" readonly="true" name="nominal" class="form-control modal_nominal_simpanan_wajib" value="{{ get_setting('simpanan_wajib') }}">
                    </div>
                    Durasi Pembayaran : 
                    <select class="form-control" name="durasi_pembayaran">
                        <option value="1">1 Bulan</option>                        
                        <option value="3">3 Bulan</option>                        
                        <option value="6">6 Bulan</option>                        
                        <option value="12">12 Bulan</option>                        
                    </select>
                    <br />
                    <label>Total : </label>
                    <input type="input" name="total" class="form-control total_simpanan_wajib" readonly="true" value="{{ get_setting('simpanan_wajib') }}" />
                    <input type="hidden" name="user_id" value="{{ $data->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                    <button type="submit" class="btn btn-success waves-effect btn-sm"><i class="fa fa-print"></i> Topup Simpanan Wajib</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
@section('footer-script')
    <style type="text/css">
        table#data_table, table#data_table2,table#data_table3 {
            font-size: 13px;
        }
    </style>
    <script src="{{ asset('admin-css/plugins/bower_components/blockUI/jquery.blockUI.js') }}"></script>
    <script type="text/javascript">
        
        $("select[name='durasi_pembayaran']").on('change', function(){

            var total = parseInt($(this).val()) * parseInt($('.modal_nominal_simpanan_wajib').val());

            $(".total_simpanan_wajib").val( total );
        });

        var topup_simpanan_wajib = function(){
            $("#modal_simpanan_wajib").modal("show");
        }

        var topup_simpanan_pokok = function(){
            $("#modal_simpanan_pokok").modal("show");
        }

        function topup()
        {
            var pr = bootbox.prompt({
                title: "Topup Simpanan Sukarela ",
                inputType: 'number',
                callback: function (nominal) 
                {
                    if(nominal != null)
                    {
                        var confirm = bootbox.confirm({
                            message: "Apakah anda ingin Topup Simpanan Sukarela ?",
                            buttons: {
                                confirm: {
                                    label: '<i class="fa fa-check"></i> Yes',
                                    className: 'btn-success btn-sm'
                                },
                                cancel: {
                                    label: '<i class="fa fa-close"></i> No',
                                    className: 'btn-danger btn-sm'
                                }
                            },
                            callback: function (result) {
                                
                                if(result)
                                {   
                                    confirm.find('.bootbox-body').html('<p><i class="fa fa-spin fa-spinner"></i> Silahkan tunggu beberapa saat ...</p>');

                                    setTimeout(function(){
                                         $.ajax({
                                            url: "{{ route('ajax.admin.submit-simpanan-sukarela') }}", 
                                            data: {'_token' : '{{csrf_token()}}', 'user_id' : {{ $data->id }}, 'nominal' : nominal },
                                            type: 'POST',
                                            success: function(res)
                                            {
                                                if(res.message == 'success')
                                                {
                                                    confirm.modal('hide');
                                                    
                                                    bootbox.alert("Anda Berhasil Topup Simpanan Sukarela sebesar <strong>Rp. "+ numberWithComma(nominal) +"</strong>", function() {
                                                        location.reload();
                                                    });

                                                }else{
                                                    confirm.find('.bootbox-body').html('<p><i class="fa fa-times-octagon"></i> '+ res.data +'</p>');
                                                }
                                            }
                                        })
                                    }, 2000);

                                    return false;
                                }
                            }
                        });
                    }
                }
            });
        }

</script>
<script type="text/javascript">
    
    function reload_page()
    {
        location.reload();
    }
        jQuery('.datepicker').datepicker({  
            format: 'yyyy-mm-dd',
        });

        /**
         * DOMISILI LOKASI
         */
        $("select[name='domisili_provinsi_id']").on('change', function(){

            var id = $(this).val();
            
            // get kabupaten
            $.ajax({
                url: "{{ route('ajax.get-kabupaten-by-provinsi-id') }}",
                method:"POST",
                data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType:"json",
                success:function(data)
                {
                    var el = '<option value="">- Kota / Kabupaten -</option>';

                    $(data.data).each(function(k,v){
                        el += '<option value="'+ v.id_kab +'">'+ v.nama +'</option>';
                    });

                    $("select[name='domisili_kabupaten_id']").html(el);
                }
            });
        });

        $("select[name='domisili_kabupaten_id']").on('change', function(){

            var id = $(this).val();
            
            // get kecamatan
            $.ajax({
                url: "{{ route('ajax.get-kecamatan-by-kabupaten-id') }}",
                method:"POST",
                data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType:"json",
                success:function(data)
                {
                    var el = '<option value="">- Kecamatan -</option>';

                    $(data.data).each(function(k,v){
                        el += '<option value="'+ v.id_kec +'">'+ v.nama +'</option>';
                    });

                    $("select[name='domisili_kecamatan_id']").html(el);
                }
            });
        });

        $("select[name='domisili_kecamatan_id']").on('change', function(){

            var id = $(this).val();
            
            // get kelurahan
            $.ajax({
                url: "{{ route('ajax.get-kelurahan-by-kecamatan-id') }}",
                method:"POST",
                data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType:"json",
                success:function(data)
                {
                    var el = '<option value="">- Kelurahan -</option>';

                    $(data.data).each(function(k,v){
                        el += '<option value="'+ v.id_kel +'">'+ v.nama +'</option>';
                    });

                    $("select[name='domisili_kelurahan_id']").html(el);
                }
            });
        });
        /**
         * END LOKASI
         */


        /**
         * KTP LOKASI
         */
        $("select[name='ktp_provinsi_id']").on('change', function(){

            var id = $(this).val();
            
            // get kabupaten
            $.ajax({
                url: "{{ route('ajax.get-kabupaten-by-provinsi-id') }}",
                method:"POST",
                data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType:"json",
                success:function(data)
                {
                    var el = '<option value="">- Kota / Kabupaten -</option>';

                    $(data.data).each(function(k,v){
                        el += '<option value="'+ v.id_kab +'">'+ v.nama +'</option>';
                    });

                    $("select[name='ktp_kabupaten_id']").html(el);
                }
            });
        });

        $("select[name='ktp_kabupaten_id']").on('change', function(){

            var id = $(this).val();
            
            // get kecamatan
            $.ajax({
                url: "{{ route('ajax.get-kecamatan-by-kabupaten-id') }}",
                method:"POST",
                data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType:"json",
                success:function(data)
                {
                    var el = '<option value="">- Kecamatan -</option>';

                    $(data.data).each(function(k,v){
                        el += '<option value="'+ v.id_kec +'">'+ v.nama +'</option>';
                    });

                    $("select[name='ktp_kecamatan_id']").html(el);
                }
            });
        });

        $("select[name='ktp_kecamatan_id']").on('change', function(){

            var id = $(this).val();
            
            // get kelurahan
            $.ajax({
                url: "{{ route('ajax.get-kelurahan-by-kecamatan-id') }}",
                method:"POST",
                data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType:"json",
                success:function(data)
                {
                    var el = '<option value="">- Kelurahan -</option>';

                    $(data.data).each(function(k,v){
                        el += '<option value="'+ v.id_kel +'">'+ v.nama +'</option>';
                    });

                    $("select[name='ktp_kelurahan_id']").html(el);
                }
            });
        });
        /**
         * END KTP LOKASI
         */
    </script>
@endsection

@endsection
