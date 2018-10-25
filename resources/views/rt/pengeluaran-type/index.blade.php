@extends('layout.general')

@section('title', 'Jenis Pengeluaran')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Manage Jenis Pengeluaran</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="{{ route('rt.pengeluaran-type.create') }}" class="btn btn-info btn-sm pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus"></i> TAMBAH JENIS PENGELUARAN</a>
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Jenis Pengeluaran</li>
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
                                    <th>JENIS PENGELUARAN</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $no => $item)
                                <tr>
                                    <td class="text-center">{{ $no+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>    
                                        <div class="btn-group m-r-10">
                                            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-xs btn-info dropdown-toggle waves-effect waves-light" type="button">Action 
                                                <span class="caret"></span>
                                            </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a href="{{ route('rt.pengeluaran-type.edit', ['id' => $item->id]) }}"><i class="ti-pencil-alt"></i> Edit</a></li>
                                                <li><a href="{{ route('rt.pengeluaran-type.destroy', ['id' => $item->id]) }}" onclick="return confirm('Hapus data ini ?')"><i class="fa fa-trash"></i> Delete</a></li>
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
    </div>
   @include('layout.footer-admin')
</div>
@endsection