@extends('layout.admin')

@section('title', 'IURAN')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">IURAN</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">IURAN</h3>
                <br />
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('rt.setting-iuran.update', $data->id) }}" method="POST">
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label class="col-md-12">IURAN</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" required name="name" value="{{ $data->name }}"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">NOMINAL (RP.)</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control" required placeholder="Rp. " name="nominal" value="{{ $data->nominal }}"> 
                            </div>
                        </div>
                        <hr />
                        <a href="{{ route('rt.setting-iuran.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10">Cancel</a>
                        <button type="submit" class="btn btn-success waves-effect btn-sm waves-light m-r-10">Submit</button>
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
