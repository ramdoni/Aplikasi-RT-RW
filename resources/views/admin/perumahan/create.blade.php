@extends('layout.admin')

@section('title', 'Perumahan')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Perumahan</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">PERUMAHAN</h3>
                <br />
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.perumahan.store') }}" method="POST">
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-12">Nama Perumahan</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" required name="nama_perumahan"> </div>
                        </div>
                         <div class="form-group">
                                <label class="col-md-12">Provinsi</label>
                                <div  class="col-md-12">
                                    <select name="provinsi_id" class="form-control">
                                        <option value=""> - Provinsi - </option>
                                        @foreach(get_provinsi() as $item)
                                        <option value="{{ $item->id_prov }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <select name="kabupaten_id" class="form-control">
                                        <option value=""> - Kota / Kabupaten - </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <select name="kecamatan_id" class="form-control">
                                        <option value=""> - Kecamatan - </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <select name="kelurahan_id" class="form-control">
                                        <option value=""> - Desa / Kelurahan - </option>
                                    </select>
                                </div>
                            </div>
                        <div class="form-group">
                            <label class="col-md-12">Logo Perumahan</label>
                            <div class="col-md-12">
                                <input type="file" name="logo" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="background: #f5f5f5;padding:15px;margin-top: 22px;">
                            <h4>Blok Perumahan</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="20" class="text-center">No</th>
                                            <th>Blok</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tr-blok">
                                        <tr class="td-empty">
                                            <th colspan="4"><i>Empty</i></th>
                                        </tr>
                                    </tbody>
                                </table>
                                <a class="btn btn-default btn-sm btn-add-blok"><i class="fa fa-plus"></i> Tambah Blok</a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr />
                    <a href="{{ url('admin/user-group') }}" class="btn btn-default btn-sm waves-effect waves-light m-r-10">Cancel</a>
                    <button type="submit" class="btn btn-success btn-sm waves-effect waves-light m-r-10">Save</button>
                </form>
              </div>
            </div>
        </div>
    </div>
    @include('layout.footer-admin')
</div>
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form>
            {{ csrf_field() }}            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Blok</h4> 
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control modal-blok"> 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-sm" id="add" data-dismiss="modal">Oke</button>
            </div>
          </form>
        </div>
    </div>
</div>
<style type="text/css">
    .table-responsive tr th, .table-responsive tr td {font-size: 12px !important;}
</style>
@section('footer-script')
<script type="text/javascript">
    $("#add").click(function(){
        $(".td-empty").remove();    
        
        var el = "<tr>";
            el += "<td>"+ ($('.tr-blok tr').length + 1) +"</td>";
            el += "<td>"+ $(".modal-blok").val() +"</td>";
            el += "<td><a href=\"javascript:;\" onclick=\"delete_el(this)\" class=\"text-danger\"><i class=\"fa fa-trash\"></i></a></td>"
            el += "<input type=\"hidden\" name=\"blok[]\" value=\""+ $(".modal-blok").val() +"\">";
            el += "</tr>";

        $('.tr-blok').append(el);
        $(".modal-blok").val("")
    });

    function delete_el(el)
    {
        if(confirm('Hapus data ini ?'))
        {
            $(el).parent().parent().remove();
        }
    }

    $(".btn-add-blok").click(function(){
        $('#modal_add').modal('show');
    })    
    $("select[name='provinsi_id']").on('change', function(){

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
                        var nama= '';
                    
                        if(v.id_jenis == 1)
                        {
                            nama = 'KABUPATEN '+ v.nama;
                        }
                        else
                        {
                            nama = 'KOTA '+ v.nama;
                        }
                        el += '<option value="'+ v.id_kab +'">'+ nama +'</option>';
                    });

                    $("select[name='kabupaten_id']").html(el);
                }
            });
        });

        $("select[name='kabupaten_id']").on('change', function(){

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

                    $("select[name='kecamatan_id']").html(el);
                }
            });
        });

        $("select[name='kecamatan_id']").on('change', function(){

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

                    $("select[name='kelurahan_id']").html(el);
                }
            });
        });
</script>
@endsection
@endsection
