@extends('layout.admin')

@section('title', 'Admin - Koperasi Daya Masyarakat Indonesia')

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
                <a href="{{ route('admin.anggota.create') }}" class="btn btn-success btn-sm pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus"></i> TAMBAH</a>
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
                    <h3 class="box-title m-b-0"><i class="fa fa-users"></i> Manage Anggota</h3>
                    <br />
                    <div class="table-responsive">
                        <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>NAME</th>
                                    <th>NO ANGGOTA</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>TELEPON</th>
                                    <th>EMAIL</th>
                                    <th>ADDED</th>
                                    <th>STATUS LOGIN</th>
                                    <th>ACCESS LOGIN</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->no_anggota }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->telepon }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            {!! status_anggota($item->id) !!}
                                        </td>
                                        <td>{!! access_rules($item->access_id) !!}</td>
                                        <td>
                                            @php ($status_deposit_awal = status_deposit_awal($item->id))
                                            @if($status_deposit_awal == 2)
                                                <a href="{{ route('admin.anggota.confirm', $item->id) }}" class="btn btn-warning btn-xs">Konfirmasi</a><br />
                                            @endif

                                            <a href="{{ route('admin.anggota.edit', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs"><i class="ti-pencil-alt"></i> detail</button></a>
                                            <form action="{{ route('admin.anggota.destroy', $item->id) }}" onsubmit="return confirm('Hapus data ini?')" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}                                               
                                                <button type="submit" class="btn btn-danger btn-xs"><i class="ti-trash"></i> delete</button>
                                            </form>
                                            <a class="btn btn-warning btn-xs" onclick="confirm_autologin('{{ route('admin.autologin', $item->id) }}', '{{ $item->name }}')"><i class="fa fa-key"></i> Autologin</a>
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
