@extends('layout.admin')

@section('title', 'Warga')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Warga</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Warga</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">FORM WARGA</h3>
                <hr />
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.anggota.store') }}" method="POST">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <ul class="nav customtab nav-tabs" role="tablist">
                        <li class="active"><a href="#biodata" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Biodata</a></li>                        
                        <li><a href="#alamat_domisili" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Alamat Domisili</a></li>                        
                        <li><a href="#alamat_ktp" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Alamat KTP</a></li>                        
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="biodata">        
                             <div class="col-md-6">
                                {{ csrf_field() }}
                                 <div class="form-group">
                                    <label class="col-md-6">Nama</label>
                                    <label class="col-md-6">Jenis Kelamin</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control"> 
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="jenis_kelamin" required>
                                            <option value=""> - Jenis Kelamin - </option>
                                            @foreach(['Laki-laki', 'Perempuan'] as $item)
                                                <option>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">Email</label>
                                    <label class="col-md-6">Telepon</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email"> 
                                    </div>
                                     <div class="col-md-6">
                                        <input type="text" name="telepon" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">Tempat Lahir</label>
                                    <label class="col-md-6">Tanggal Lahir</label>
                                    <div class="col-md-6">
                                        <input type="text" name="tempat_lahir" class="form-control"> 
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="tanggal_lahir" class="form-control datepicker"> 
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
                                        <input type="text" name="nik" class="form-control" placeholder="KTP NUMBER"> 
                                    </div> 
                                     <div class="col-md-6">
                                        <?php $agama = ['Islam', 'Kristen', 'Budha', 'Hindu']; ?>
                                        <select class="form-control" name="agama">
                                            <option value=""> - Agama - </option>
                                            @foreach($agama as $item)
                                                <option value="{{ $item }}"> {{ $item }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">KTP</label>
                                    <label class="col-md-6">Status Login</label>
                                    <div class="col-md-6">
                                        <input type="file" name="file_ktp" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="radio" name="status" value="1" /> Active </label> &nbsp;
                                        <label><input type="radio" name="status" value="0" /> Inactive </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">Passport Number</label>
                                    <label class="col-md-6">KK Number</label>
                                    <div class="col-md-6">
                                        <input type="text" name="passport_number" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="kk_number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">Password</label>
                                    <label class="col-md-6">Status Pernikahan</label>
                                    <div class="col-md-6">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <input type="password" name="confirmation" placeholder="Ketik Ulang Password" class="form-control"> 
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="status_pernikahan">
                                            <option>Nikah</option>
                                            <option>Belum Menikah</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                                            <option value="{{ $i->id }}" data-provinsi="{{ isset($i->provinsi->nama) ? $i->provinsi->nama : '' }}" data-kabupaten="{{ isset($i->kabupaten->nama) ? $i->kabupaten->nama : '' }}" data-kecamatan="{{ isset($i->kecamatan->nama) ? $i->kecamatan->nama : '' }}" data-kelurahan="{{ isset($i->kelurahan->nama) ? $i->kelurahan->nama : '' }}">{{ $i->nama_perumahan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="blok_rumah" class="form-control">
                                            <option value="">- Pilih Blok Rumah -</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="no_rumah">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">Rukun Warga (RW)</label> 
                                    <label class="col-md-6">Rukun Tetangga (RT)</label> 
                                    <div class="col-md-6">
                                        <select class="form-control" name="rw_id">
                                            <option>- Pilih Rukun Warga -</option>
                                            @foreach(getRw() as $item)
                                            <option value="{{ $item->id }}">{{ $item->no }}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="rt_id">
                                            <option>- Pilih Rukun Tetangga -</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">Status Kepemilikan Rumah</label>
                                    <label class="col-md-6">Status Tempat Tinggal</label>
                                    <div class="col-md-6">
                                        <select name="status_kepemilikan_rumah" class="form-control">
                                            <option>Milik Sendiri</option>
                                            <option>Keluarga</option>
                                            <option>Kontrak / Sewa</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="status_tempat_tinggal" class="form-control">
                                            <option>Tetap</option>
                                            <option>Tidak Tetap</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Jenis Bangunan</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="jenis_bangunan">
                                            <option value="">- Pilih Jenis Bangunan -</option>
                                            @foreach(getJenisBangunan() as $item)
                                            <option>{{ $item }}</option>
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
                                        <input type="text" readonly="true" class="form-control domisili_provinsi" placeholder="Provinsi">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Kabupaten / Kota</label>
                                    <div class="col-md-12">
                                        <input type="text" readonly="true" class="form-control domisili_kabupaten" placeholder="Kabupaten">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Kecamatan</label>
                                    <div class="col-md-12">
                                        <input type="text" readonly="true" class="form-control domisili_kecamatan" placeholder="Kecamatan">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Kelurahan / Desa</label>
                                    <div class="col-md-12">
                                        <input type="text" readonly="true" class="form-control domisili_kelurahan" placeholder="Kelurahan / Desa">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="alamat_ktp">        
                            <div class="col-md-6">
                                <div class="col-md-12">
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
                    <div style="clear: both;"></div>
                    <hr />
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ route('admin.anggota.index') }}" class="btn btn-default btn-sm waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Back</a>
                            <button type="submit" class="btn btn-success waves-effect btn-sm waves-light m-r-10"><i class="fa fa-save"></i>  Save</button>
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
    @extends('layout.footer-admin')
</div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
@section('footer-script')
    <script src="{{ asset('admin-css/plugins/bower_components/blockUI/jquery.blockUI.js') }}"></script>
    <script type="text/javascript">
        
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

        jQuery('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
        });

        $("select[name='perumahan_id']").on('change', function(){
            
            var el = $("select[name='perumahan_id'] option:selected");
            $(".domisili_provinsi").val(el.attr('data-provinsi'));
            $(".domisili_kabupaten").val(el.attr('data-kabupaten'));
            $(".domisili_kecamatan").val(el.attr('data-kecamatan'));
            $(".domisili_kelurahan").val(el.attr('data-kelurahan'));
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
