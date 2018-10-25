@extends('layout.admin')

@section('title', 'Setting')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">All Setting</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">All Setting</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <hr /><br />
                    <div>
                        <div class="col-md-2">
                            <a href="{{ route('rt.setting-iuran.index') }}"><i class="mdi mdi-wallet fa-fw"></i><span class="hide-menu">IURAN</span></a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('rt.pengeluaran-type.index') }}"><i class="mdi mdi-information fa-fw"></i><span class="hide-menu">Jenis Pengeluaran</span></a>
                        </div>
                        <div class="clearfix"></div><hr />
                    </div>
                </div>
            </div>                        
        </div>
    </div>
   @include('layout.footer-admin')
</div>
@endsection