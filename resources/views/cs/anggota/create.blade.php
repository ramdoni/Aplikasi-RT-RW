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
                <h4 class="page-title">Anggota</h4> </div>
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
                <h3 class="box-title m-b-0">FORM ANGGOTA</h3>
                <hr />
                <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" action="{{ route('cs.anggota.store') }}" method="POST">
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
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-6">No Anggota</label>
                            <label class="col-md-6">KTP Number</label>
                            <div class="col-md-6">
                                <input type="text" name="no_anggota" readonly="true" value="{{ $no_anggota }}" class="form-control"> 
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="nik" class="form-control"> 
                            </div> 
                        </div>
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
                            <label class="col-md-4">Agama</label>
                            <label class="col-md-4">Tempat Lahir</label>
                            <label class="col-md-4">Tanggal Lahir</label>
                            <div class="col-md-4"s>
                                <?php $agama = ['Islam', 'Kristen', 'Budha', 'Hindu']; ?>
                                <select class="form-control" name="agama">
                                    <option value=""> - Agama - </option>
                                    @foreach($agama as $item)
                                        <option value="{{ $item }}"> {{ $item }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="tempat_lahir" class="form-control"> 
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="tanggal_lahir" class="form-control datepicker"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4">KTP</label>
                            <label class="col-md-4">Foto</label>
                            <label class="col-md-4">NPWP</label>
                            <div class="col-md-4">
                                <input type="file" name="file_ktp" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="file_photo" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="file_npwp" class="form-control">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-4">Password</label>
                            <label class="col-md-4">Ketik Ulang Password</label>
                            <div class="col-md-4">
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="col-md-4">
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
                                        <option value="{{ $item->id_prov }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <select name="domisili_kabupaten_id" class="form-control">
                                        <option value=""> - Kota / Kabupaten - </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <select name="domisili_kecamatan_id" class="form-control">
                                        <option value=""> - Kecamatan - </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <select name="domisili_kelurahan_id" class="form-control">
                                        <option value=""> - Kelurahan - </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea class="form-control" name="domisili_alamat" placeholder="Alamat RT / RW"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
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
                        <div class="col-md-12">
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
                                <label class="col-md-6">NPWP Number</label>
                                <label class="col-md-6">BPJS Number</label>
                                <div class="col-md-6">
                                    <input type="text" name="npwp_number" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="bpjs_number" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="clear: both;"></div>

                    <hr />
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ route('cs.anggota.index') }}" class="btn btn-default btn-sm waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Back</a>
                            <button type="submit" class="btn btn-success waves-effect btn-sm waves-light m-r-10"><i class="fa fa-save"></i>  Save Anggota</button>
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
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
@section('footer-script')
    <script src="{{ asset('admin-css/plugins/bower_components/blockUI/jquery.blockUI.js') }}"></script>
    <script type="text/javascript">
        
        jQuery('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear : true,
            changeMonth : true
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
