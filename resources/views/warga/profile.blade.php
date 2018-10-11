@extends('layout.anggota')

@section('title', 'Anggota - Koperasi Daya Masyarakat Indonesia')

@section('sidebar')

@endsection

@section('content')
<div id="page-wrapper" style="min-height: 356px;">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Profile page</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Profile</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <!-- .row -->
        <div class="row">
            <div class="col-md-6 col-sm-12 col-lg-4">
                <div class="panel">
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
                                <h4>SHU</h4><a href="{{ url('anggota/user/detail') }}" class="btn btn-rounded btn-success">Rp. 0</a></div>
                        </div>
                        <div class="row text-center m-t-30">
                            <div class="col-xs-4 b-r">
                                <h3>Simpanan Pokok</h3>
                                <a href="{{ url('anggota/user/iuran') }}" class="btn btn-rounded btn-warning">Belum Lunas</a>
                            </div>
                            <div class="col-xs-4 b-r">
                                <h3>Simpanan Sukarela</h3>
                                <h4>Rp. 0</h4>
                                <a href="{{ route('anggota.index.save.profile') }}" title="Tambah Simpanan Sukarela"><i class="fa fa-plus"></i> </a>
                            </div>
                            <div class="col-xs-4 b-r">
                                <h3>Simpanan Wajib</h3>
                                <a href="{{ url('anggota/user/iuran') }}" class="btn btn-rounded btn-warning">Belum Lunas</a>
                            </div>
                        </div>
                    </div>
                    <hr class="m-t-10" />
                    <ul class="dp-table profile-social-icons">
                        <li><a href="javascript:void(0)"><i class="fa fa-globe"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <ul class="nav nav-tabs tabs customtab">
                        <li class="tab">
                            <a href="#home" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Activity</span> </a>
                        </li>
                        <li class="tab">
                            <a href="#messages" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Messages</span> </a>
                        </li>
                        <li class="tab active">
                            <a href="#settings" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Profile</span> </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="home">
                            <div class="steamline">
                               
                            </div>
                        </div>
                        <div class="tab-pane" id="messages">
                            <div class="steamline">
                            </div>
                        </div>
                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">NIK</label>
                                    <div class="col-md-12">
                                        <input type="text" name="nik" value="{{ Auth::user()->nik }}" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Nama</label>
                                    <div class="col-md-12">
                                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email"  class="form-control form-control-line" value="{{ Auth::user()->email }}" name="email" id="example-email"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Telepon</label>
                                    <div class="col-md-12">
                                        <input type="text" name="telepon" value="{{ Auth::user()->telepon }}" class="form-control form-control-line"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Agama</label>
                                    <div class="col-md-12">
                                        <?php $agama = ['Islam', 'Kristen', 'Budha', 'Hindu']; ?>
                                        <select class="form-control" name="agama">
                                            <option value=""> - Agama - </option>
                                            @foreach($agama as $item)
                                                <option value="{{ $item }}" {{ $item == Auth::user()->agama ? 'selected' : '' }}> {{ $item }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
    </div>
</div>
@endsection
