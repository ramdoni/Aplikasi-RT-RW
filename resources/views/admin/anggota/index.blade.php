@extends('layout.admin')

@section('title', 'Manage Warga ')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Manage Warga</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="{{ route('admin.anggota.create') }}" class="btn btn-success btn-sm pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus"></i> TAMBAH WARGA</a>
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Warga</li>
                </ol>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-12">
               <div class="white-box">
                    <div class="table-responsive" style="padding-bottom:60px">
                        <table id="data_table_no_button" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>PERUMAHAN</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>TELEPON</th>
                                    <th>AKSES LOGIN</th>
                                    <th>STATUS WARGA</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ isset($item->perumahan->nama_perumahan) ? $item->perumahan->nama_perumahan : '' }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->telepon }}</td>
                                        <td>
                                            @if(!empty($item->access_id))
                                                {{ access_login($item->access_id) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->status == 0 || $item->status === NULL)
                                                <a href="" class="btn btn-warning btn-xs">Belum Aktifivasi</a>
                                            @endif
                                            @if($item->status ==1)
                                                <a href="" class="btn btn-success btn-xs">Aktif</a>
                                            @endif
                                        </td>
                                        <td>    
                                            <div class="btn-group m-r-10">
                                                <button aria-expanded="false" data-toggle="dropdown" class="btn btn-xs btn-info dropdown-toggle waves-effect waves-light" type="button">Action 
                                                    <span class="caret"></span></button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li><a href="{{ route('admin.anggota.edit', ['id' => $item->id]) }}"><i class="ti-pencil-alt"></i> Detail</a></li>
                                                    <li><a onclick="confirm_autologin('{{ route('admin.autologin', $item->id) }}', '{{ $item->name }}')"><i class="fa fa-key"></i> Autologin</a></li>
                                                    @if($item->id != 3)
                                                    <li><a href="{{ route('admin.anggota.destroy', $item->id) }}" onclick="return confirm('Hapus data warga ?')"><i class="ti-trash"></i> Delete</a></li>
                                                    @endif
                                                    @if($item->status == 0)
                                                    <li><a href="{{ route('admin.anggota.aktif', $item->id) }}" onclick="return confirm('Konfirmasi data warga ?')"><i class="ti-check"></i> Konfirmasi Warga</a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
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
@section('footer-script')
<script type="text/javascript">
    var confirm_autologin = function(url, name){
        bootbox.confirm("Login sebagai "+ name +" ?", function(res){
            if(res)
            {
                window.location = url;
            }
        })
    }
</script>
@endsection
@endsection
