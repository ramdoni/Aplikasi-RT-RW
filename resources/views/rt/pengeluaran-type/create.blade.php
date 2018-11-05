@extends('layout.general')

@section('title', 'Jenis Pengeluaran')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Jenis Pengeluaran</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Jenis Pengeluaran</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="white-box">
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('rt.pengeluaran-type.store') }}" method="POST">
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-12">Jenis Pengeluaran</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" placeholder="Jenis Pengeluaran">
                            </div>
                        </div>
                        <hr />
                        <a href="{{ route('rt.pengeluaran.index') }}" class="btn btn-default btn-sm waves-effect waves-light m-r-10">Cancel</a>
                        <button type="submit" class="btn btn-success btn-sm waves-effect waves-light m-r-10">Save</button>
                    </div>
                    <br style="clear: both;" />
                </form>
              </div>
            </div>
        </div>
    </div>
    @include('layout.footer-admin')
</div>
@endsection
