@extends('layout.admin')

@section('title', 'Warga')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">FORM WARGA</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Warga</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="white-box">
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.anggota.update', $data->id) }}" method="POST">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">Biodata</a></li>
                        <li><a href="#alamat_domisili" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Alamat Domisili</a></li>                        
                        <li><a href="#alamat_ktp" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Alamat KTP</a></li>
                        <li><a href="#upload_file" aria-controls="upload_file" role="tab" data-toggle="tab" aria-expanded="false">Upload File</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="profile">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label class="col-md-6">Nama</label>
                                    <label class="col-md-6">Jenis Kelamin</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" value="{{ $data->name }}"> 
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="jenis_kelamin">
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
                                    <label class="col-md-6">Tempat Lahir</label>
                                    <label class="col-md-6">Tanggal Lahir</label>
                                    <div class="col-md-6">
                                        <input type="text" name="tempat_lahir" class="form-control" value="{{ $data->tempat_lahir }}"> 
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="tanggal_lahir" class="form-control datepicker" value="{{ $data->tanggal_lahir }}"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">Status KTP</label>
                                    <label class="col-md-6">Agama</label>
                                    <div class="col-md-6">
                                        <select class="form-control">
                                            <option>KTP</option>
                                            <option>E-KTP</option>
                                        </select>
                                        <input type="text" name="nik" class="form-control" placeholder="KTP NUMBER" value="{{ $data->nik }}"> 
                                    </div>
                                    <div class="col-md-6">
                                        <?php $agama = ['Islam', 'Kristen', 'Budha', 'Hindu']; ?>
                                        <select class="form-control" name="agama">
                                            <option value=""> - Agama - </option>
                                            @foreach($agama as $item)
                                                <option value="{{ $item }}" {{ $data->agama == $item ? 'selected' : '' }}> {{ $item }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>        
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
                                    <label class="col-md-6">Password</label>
                                    <label class="col-md-6">Status Pernikahan</label>
                                    <div class="col-md-6">
                                        <input type="password" name="password" class="form-control" value="{{ $data->password }}">
                                        <input type="password" name="confirmation" class="form-control" value="{{ $data->password }}"> 
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="status_pernikahan">
                                            <option>Nikah</option>
                                            <option>Belum Menikah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Akses Warga</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="access_id">
                                            @foreach(access_login() as $k => $item)
                                                <option value="{{ $k }}" {{ $k == $data->access_id ? 'selected' : '' }}>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="alamat_domisili">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-6">Perumahan</label>
                                    <label class="col-md-4">Blok</label>
                                    <label class="col-md-2">No Rumah</label>
                                    <div class="col-md-6">
                                        <select name="perumahan_id" class="form-control">
                                            <option value=""> - Pilih Perumahan - </option>
                                            @foreach(getPerumahan() as $i)
                                            <option value="{{ $i->id }}" {{ $data->perumahan_id == $i->id ? 'selected' : '' }} data-provinsi="{{ isset($i->provinsi->nama) ? $i->provinsi->nama : '' }}" data-kabupaten="{{ isset($i->kabupaten->nama) ? $i->kabupaten->nama : '' }}" data-kecamatan="{{ isset($i->kecamatan->nama) ? $i->kecamatan->nama : '' }}" data-kelurahan="{{ isset($i->kelurahan->nama) ? $i->kelurahan->nama : '' }}">{{ $i->nama_perumahan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="blok_rumah" class="form-control">
                                            <option value="">- Pilih Blok Rumah -</option>
                                            @if(isset($data->perumahan->getBlok))
                                                @foreach($data->perumahan->getBlok as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $data->blok_rumah ? 'selected' : '' }}>{{ $item->blok }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="no_rumah" value="{{ $data->no_rumah }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">Rukun Warga (RW)</label> 
                                    <label class="col-md-6">Rukun Tetangga (RT)</label> 
                                    <div class="col-md-6">
                                        <select class="form-control" name="rw_id">
                                            <option value="">- Pilih Rukun Warga -</option>
                                            @foreach(getRw() as $item)
                                            <option value="{{ $item->id }}" {{ $data->rw_id == $item->id ? 'selected' : '' }}>{{ $item->no }}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="rt_id">
                                            <option value="">- Pilih Rukun Tetangga -</option>
                                            @if(isset($data->rw->getRt))
                                                @foreach($data->rw->getRt as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $data->rt_id ? 'selected' : '' }}>{{ $item->no }}</option>
                                                @endforeach
                                            @endif
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">Status Kepemilikan Rumah</label>
                                    <label class="col-md-6">Status Tempat Tinggal</label>
                                    <div class="col-md-6">
                                        <select name="status_kepemilikan_rumah" class="form-control">
                                            @foreach(getKepemilikanRumah() as $i)
                                            <option {{ $data->status_kepemilikan_rumah == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="status_tempat_tinggal" class="form-control">
                                            <option {{ $data->status_tempat_tinggal == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                                            <option {{ $data->status_tempat_tinggal == 'Tidak Tetap' ? 'selected' : '' }}>Tidak Tetap</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Jenis Bangunan</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="jenis_bangunan">
                                            <option value="">- Pilih Jenis Bangunan -</option>
                                            @foreach(getJenisBangunan() as $item)
                                            <option {{ $item == $data->jenis_bangunan ? 'selected' : '' }}>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="background: #f5f5f5;padding:15px;">
                                <h4>Domisili Perumahan</h4>
                                <div class="form-group">
                                    <label class="col-md-12">Provinsi</label>
                                    <div class="col-md-12">
                                        <input type="text" readonly="true" class="form-control domisili_provinsi" placeholder="Provinsi" value="{{ isset($data->perumahan->provinsi->nama) ? $data->perumahan->provinsi->nama : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Kabupaten / Kota</label>
                                    <div class="col-md-12">
                                        <input type="text" readonly="true" class="form-control domisili_kabupaten" placeholder="Kabupaten" value="{{ isset($data->perumahan->kabupaten->nama) ? $data->perumahan->kabupaten->nama : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Kecamatan</label>
                                    <div class="col-md-12">
                                        <input type="text" readonly="true" class="form-control domisili_kecamatan" placeholder="Kecamatan" value="{{ isset($data->perumahan->kecamatan->nama) ? $data->perumahan->kecamatan->nama : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Kelurahan / Desa</label>
                                    <div class="col-md-12">
                                        <input type="text" readonly="true" class="form-control domisili_kelurahan" placeholder="Kelurahan / Desa" value="{{ isset($data->perumahan->kelurahan->nama) ? $data->perumahan->kelurahan->nama : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="alamat_ktp">        
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><input type="checkbox" name="is_ktp_domisili" value="1"> Alamat KTP sama dengan Domisili</label>
                                    </div>
                                    <div class="content-alamat-ktp">
                                        <div class="form-group">
                                            <label>Alamat KTP</label>
                                            <select name="ktp_provinsi_id" class="form-control">
                                                <option value=""> - Provinsi - </option>
                                                @foreach(get_provinsi() as $item)
                                                <option value="{{ $item->id_prov }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="ktp_kabupaten_id" class="form-control">
                                                <option value=""> - Kota / Kabupaten - </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="ktp_kecamatan_id" class="form-control">
                                                <option value=""> - Kecamatan - </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="ktp_kelurahan_id" class="form-control">
                                                <option value=""> - Kelurahan - </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="ktp_alamat" placeholder="Alamat RT / RW"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="upload_file">
                            <div class="form-group">
                                <label class="col-md-6">KTP</label>
                                <label class="col-md-6">Foto</label>
                                <div class="col-md-6">
                                    <input type="file" name="file_ktp" class="form-control">
                                    @if(!empty($data->foto_ktp))
                                        <div class="col-md-4">
                                            <img src="{{ asset('file_ktp/'. $data->id .'/'.  $data->foto_ktp)}}" style="width: 200px;">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input type="file" name="file_photo" class="form-control">
                                    @if(!empty($data->foto))
                                        <div class="col-md-4">
                                            <img src="{{ asset('file_photo/'. $data->id .'/'.  $data->foto)}}" style="width: 200px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ route('admin.anggota.index') }}" class="btn btn-default btn-sm waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Back</a>
                            <button type="submit" class="btn btn-success waves-effect btn-sm waves-light m-r-10"><i class="fa fa-save"></i> Save </button>
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

<!-- modal simpanan wajib-->
<div id="modal_add_bank" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.anggota.add-rekening-bank') }}">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ $data->id }}" />
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Rekening Bank</h4> 
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Bank</label>
                        <select class="form-control" name="bank_id">
                            <option value="">- Select - </option>
                            @foreach(list_bank() as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Pemilik Rekening</label>
                        <input type="text" class="form-control" name="nama_akun" />
                    </div>
                    <div class="form-group">
                        <label>No Rekening</label>
                        <input type="text" class="form-control" name="no_rekening">
                    </div>
                    <div class="form-group">
                        <label>Cabang</label>
                        <input type="text" class="form-control" name="cabang">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                    <button type="submit" class="btn btn-success waves-effect btn-sm"><i class="fa fa-print"></i> Submit</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@section('footer-script')
    <style type="text/css">
        table#data_table, table#data_table2,table#data_table3 {
            font-size: 13px;
        }
    </style>
    <script src="{{ asset('admin-css/plugins/bower_components/blockUI/jquery.blockUI.js') }}"></script>
    <script type="text/javascript">
        
        $("input[name='is_ktp_domisili']").click(function(){
            if($(this).is(":checked"))
            {
                $('.content-alamat-ktp').find('select').attr('readonly', true);
                $('.content-alamat-ktp').find('textarea').attr('readonly', true);
            }
            else
            {
                $('.content-alamat-ktp').find('textarea').removeAttr('readonly');
                $('.content-alamat-ktp').find('select').removeAttr('readonly');
            }
        });

        $("select[name='perumahan_id']").on('change', function(){

            var id= $(this).val();
            $.ajax({
                url: "{{ route('ajax.get-blok-by-perumahan') }}",
                method:"POST",
                data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType:"json",
                success:function(data)
                {
                    var el = '<option value="">- Pilih Blok Rumah -</option>';

                    $(data.data).each(function(k,v){
                        el += '<option value="'+ v.id +'">'+ v.blok +'</option>';
                    });

                    $("select[name='blok_rumah']").html(el);
                }
            });

            var el = $("select[name='perumahan_id'] option:selected");
            $(".domisili_provinsi").val(el.attr('data-provinsi'));
            $(".domisili_kabupaten").val(el.attr('data-kabupaten'));
            $(".domisili_kecamatan").val(el.attr('data-kecamatan'));
            $(".domisili_kelurahan").val(el.attr('data-kelurahan'));

        });

        $("select[name='rw_id']").on('change', function(){

            var id= $(this).val();
            $.ajax({
                url: "{{ route('ajax.get-rt-by-rw') }}",
                method:"POST",
                data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType:"json",
                success:function(data)
                {
                    var el = '<option value="">- Pilih Rukun Tetangga -</option>';

                    $(data.data).each(function(k,v){
                        el += '<option value="'+ v.id +'">'+ v.no +'</option>';
                    });

                    $("select[name='rt_id']").html(el);
                }
            });

        });

        function add_bank()
        {
            $("#modal_add_bank").modal("show");
        }

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
