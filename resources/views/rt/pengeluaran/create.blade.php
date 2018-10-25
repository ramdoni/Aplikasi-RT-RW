@extends('layout.general')

@section('title', 'Pengeluaran')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Pengeluaran</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Pengeluaran</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="white-box">
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('rt.pengeluaran.store') }}" method="POST" autocomplete="off">
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-12">Jenis Pengeluaran</label>
                            <div class="col-md-10">
                                <select class="form-control" name="pengeluaran_type_id">
                                    @foreach(pengeluaran_type(\Auth::user()->id) as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5">Nominal</label>
                            <label class="col-md-6">Tanggal Pengeluaran</label>
                            <div class="col-md-5">
                                <input type="number" name="nominal" class="form-control">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control datepicker" name="tanggal">
                            </div>
                        </div>
                        <hr />
                        <a href="{{ route('rt.pengeluaran.index') }}" class="btn btn-default btn-sm waves-effect waves-light m-r-10">Cancel</a>
                        <button type="submit" class="btn btn-success waves-effect btn-sm waves-light m-r-10">Save</button>
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
