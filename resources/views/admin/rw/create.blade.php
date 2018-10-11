@extends('layout.admin')

@section('title', 'Rukun Warga')

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
                    <li class="active">Home</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">FORM RUKUN WARGA</h3>
                <hr />
                <form class="form-horizontal" action="{{ route('admin.rw.store') }}" method="POST" autocomplete="off">
                    {{ csrf_field() }}
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
                        <div class="form-group">
                            <label class="col-md-12">NO RUKUN WARGA</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="no" value="{{ old('no') }}" /> 
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr />
                    <div class="col-md-6">
                        <h4>Pengurus Rukun Warga</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="40" class="text-center">#</th>
                                        <th>NAMA</th>
                                        <th>JABATAN</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody class="tr-pengurus">
                                    <tr class="td-empty">
                                        <th colspan="4"><i>Empty</i></th>
                                    </tr>
                                </tbody>
                            </table>
                            <a class="btn btn-default btn-sm btn-add-pengurus"><i class="fa fa-plus"></i> Tambah Pengurus</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr />
                    <a href="{{ route('admin.user.index') }}" class="btn btn-default btn-sm waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" class="btn btn-success btn-sm waves-effect waves-light m-r-10"><i class="fa fa-save"></i> Save</button>
                    <br style="clear: both;" />
                </form>
              </div>
            </div>                        
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
    </div>
    @extends('layout.footer-admin')
</div>

<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form>
            {{ csrf_field() }}            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pengurus Rukun Warga</h4> 
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <labelclass="control-label">Jabatan:</label>
                    <select class="form-control" name="modal-jabatan">
                        <option class="">- Pilih Jabatan -</option>
                        <option>Ketua</option>
                        <option>Pengurus</option>
                    </select>
                    <input type="text" name="modal-keterangan" class="form-control" placeholder="Jabatan Pengurus" style="display: none;" >
                </div>
                <div class="form-group">
                    <labelclass="control-label">Pilih Warga:</label>
                    <input type="text" class="form-control autocomplete-warga"> 
                    <input type="hidden" name="modal-user_id" >
                    <input type="hidden" name="modal-nama" >
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
    .ui-menu.ui-widget.ui-widget-content.ui-autocomplete.ui-front { z-index: 9999;}
</style>
@section('footer-script')
<script type="text/javascript">
    $('.btn-add-pengurus').click(function(){
        $("#modal_add").modal("show");
    });
     $("#add").click(function(){
        $(".td-empty").remove();    

        if($( "input[name='modal-jabatan']").val() == 'Ketua')
        {
            var jabatan = $("select[name='modal-jabatan']").val();
        }
        else
        {
            var jabatan = $("select[name='modal-jabatan']").val() + ' ' + $( "input[name='modal-keterangan']").val();
        }
        
        var el = "";
            el += "<tr>";
            el += "<td>"+ ($('.tr-pengurus tr').length + 1) +"</td>";
            el += "<td>"+ $("input[name='modal-nama']").val() +"</td>";
            el += "<td>"+ jabatan  +"</td>";
            el += "<td></td>";
            el += "<input type=\"hidden\" name=\"user_id[]\" value=\""+ $( "input[name='modal-user_id']").val() +"\">";
            el += "<input type=\"hidden\" name=\"jabatan[]\" value=\""+ $( "select[name='modal-jabatan']").val() +"\">";
            el += "<input type=\"hidden\" name=\"keterangan[]\" value=\""+ $( "input[name='modal-keterangan']").val() +"\">";
            el += "</tr>";

        $('.tr-pengurus').append(el);

        $(".autocomplete-warga").val("");
        $("input[name='modal-user_id']").val("");
        $("select[name='modal-jabatan']").val("");
        $("input[name='modal-keterangan']").val("");
    });

    $("select[name='modal-jabatan']").on('change', function(){
        if($(this).val() == 'Ketua')
        {
            $("input[name='modal-keterangan']").hide();
        }
        else
        {
            $("input[name='modal-keterangan']").show();
        }
    })

    $(".autocomplete-warga" ).autocomplete({
        minLength:0,
        limit: 25,
        source: function( request, response ) {
            $.ajax({
              url: "{{ route('ajax.get-warga') }}",
              method : 'POST',
              data: {
                'name': request.term,'_token' : $("meta[name='csrf-token']").attr('content')
              },
              success: function( data ) {
                response( data );
              }
            });
        },
        select: function( event, ui ) {
            $( "input[name='modal-user_id']").val(ui.item.id);
            $( "input[name='modal-nama']").val(ui.item.value);
        }
    }).on('focus', function () {
            $(this).autocomplete("search", "");
    });
</script>
@endsection
@endsection
