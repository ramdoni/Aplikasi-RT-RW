@extends('layout.general')

@section('title', 'Dashboard Warga')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="{{ route('warga.profile')}}" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Profile</a>
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel">
                    @if(Auth::user()->status == 1)
                        <span  class="btn btn-rounded btn-success" style="position: absolute;right: 25px;top: 10px;">Active</span>
                    @endif
                    @if(Auth::user()->status == 2)
                        <span  class="btn btn-rounded btn-danger" style="position: absolute;right: 25px;top: 10px;">Inactive</span>
                    @endif
                    <div class="p-30">
                        <div class="row">                                
                            <div class="col-xs-4 col-sm-4">
                                @if(Auth::user()->foto != "")
                                    <img src="{{ asset('file_photo/'.  Auth::user()->id .'/'. Auth::user()->foto) }}" alt="{{ Auth::user()->name }}" class="img-circle img-responsive">
                                @else 
                                    <img src="{{ asset('images/user.png') }}" alt="{{ Auth::user()->name }}" class="img-circle img-responsive">
                                @endif
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <h2 class="m-b-0">{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <hr class="m-t-10" />
                </div>
            </div>
            <div class="col-md-8">
            </div>
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
    </div>
    <!-- /.container-fluid -->
    @include('layout.footer-admin')
</div>


@section('footer-script')
    <style type="text/css">
        .price-lable {
            width: auto;
        }
        .pricing-body {
            padding: 20px 0 !important;
        }
        /* override paksa */
        .blockUI.blockMsg.blockElement {
            top: 0 !important;
        }
    </style>
    <script src="{{ asset('admin-css/plugins/bower_components/blockUI/jquery.blockUI.js') }}"></script>
    <script type="text/javascript">
        
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

        var simpanan_wajib = 10000;

        $(".nominal").on('input', function(){ calculate(); });

        function calculate()
        {
            var simpanan_sukarela = $(".nominal").val() == "" ? 0 : parseInt($(".nominal").val());

            total_bayar = parseInt(simpanan_sukarela) + parseInt(simpanan_wajib) + 100000 + 10000;

            $('.total_bayar').html(numberWithComma(total_bayar));
        }


        $("input[name='durasi_pembayaran']").each(function(){

            $(this).click(function(){
                if($(this).val() == 1)
                {
                    $('.nominal_simpanan_wajib').html( '10.000' );
                    simpanan_wajib = 10000;
                }

                if($(this).val() == 3)
                {
                    $('.nominal_simpanan_wajib').html( '30.000' );
                    simpanan_wajib = 30000; 
                }

                if($(this).val() == 6)
                {
                    $('.nominal_simpanan_wajib').html( '60.000' );
                    simpanan_wajib = 60000;
                }

                if($(this).val() == 12)
                {
                    $('.nominal_simpanan_wajib').html( '120.000' );
                    simpanan_wajib = 120000;
                }

                calculate();
            });
        });

    </script>
@endsection

@endsection
