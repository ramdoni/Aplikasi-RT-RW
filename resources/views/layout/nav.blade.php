<!--WARGA--->
@if(Auth::user()->access_id == 2)
<ul class="nav" id="side-menu">
    <li class="user-pro">
        <a href="javascript:void(0)" class="waves-effect">
            @if(Auth::user()->foto != "")
                <img src="{{ asset('file_photo/'.  Auth::user()->id .'/'. Auth::user()->foto) }}" alt="{{ Auth::user()->name }}" class="img-circle img-responsive" style="width:50px; height: 50px;">
            @else 
                <img src="{{ asset('admin-css/images/user.png') }}" alt="user-img" class="img-circle"> 
            @endif
            <span class="hide-menu"> {{ Auth::user()->name }}<span class="fa arrow"></span></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li><a href="{{ url('logout') }}"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a></li>
        </ul>
    </li>
    <li> <a href="{{ route('warga.dashboard') }}" class="waves-effect active"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i>Dashboard </a></li>
    <li>
        <a href="{{ route('warga.iuran.index') }}" class="waves-effect"><i class="mdi mdi-apps fa-fw"></i> Iuran</a>
    </li>
    <li>
        <a href="{{ route('warga.surat-pengantar.index') }}" class="waves-effect"><i class="mdi mdi-account-card-details fa-fw"></i> Surat Pengantar</a>
    </li>
    <li class="last-nav" onclick="form_keluhan()">
        <a class="waves-effect"><i class="mdi mdi-message-text-outline fa-fw"></i> Keluhan dan Saran</a>
    </li>
    
</ul>
@endif

<!--BENDAHARA--->
@if(Auth::user()->access_id == 3)
<ul class="nav" id="side-menu">
    <li class="user-pro">
        <a href="javascript:void(0)" class="waves-effect">
            @if(Auth::user()->foto != "")
                <img src="{{ asset('file_photo/'.  Auth::user()->id .'/'. Auth::user()->foto) }}" alt="{{ Auth::user()->name }}" class="img-circle img-responsive" style="width:50px; height: 50px;">
            @else 
                <img src="{{ asset('admin-css/images/user.png') }}" alt="user-img" class="img-circle"> 
            @endif
            <span class="hide-menu"> {{ Auth::user()->name }}<span class="fa arrow"></span></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li><a href="{{ url('logout') }}"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a></li>
        </ul>
    </li>
    <li>
        <a href="{{ url('anggota') }}" class="waves-effect active"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard <span class="fa arrow"></span> </span></a>
    </li>
    <li class="last-nav"><a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-account-card-details fa-fw"></i> <span class="hide-menu">Iuran<span class="fa arrow"></span></span></a>
    </li>
</ul>
@endif

<!--RT--->
@if(Auth::user()->access_id == 4)
<ul class="nav" id="side-menu">
    <li class="user-pro">
        <a href="javascript:void(0)" class="waves-effect">
            @if(Auth::user()->foto != "")
                <img src="{{ asset('file_photo/'.  Auth::user()->id .'/'. Auth::user()->foto) }}" alt="{{ Auth::user()->name }}" class="img-circle img-responsive" style="width:50px; height: 50px;">
            @else 
                <img src="{{ asset('admin-css/images/user.png') }}" alt="user-img" class="img-circle"> 
            @endif
            <span class="hide-menu"> {{ Auth::user()->name }}<span class="fa arrow"></span></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li><a href="{{ url('logout') }}"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a></li>
        </ul>
    </li>
    <li> 
        <a href="{{ route('rt.dashboard') }}" class="waves-effect active">
            <i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> Dashboard </a></li>
    <li>
        <a href="{{ route('rt.warga.index') }}" class="waves-effect"><i class="mdi mdi-account fa-fw"></i> Data Warga</a>
    </li>
    <li>
        <a href="{{ route('rt.iuran.index') }}" class="waves-effect"><i class="mdi mdi-account-card-details fa-fw"></i> Iuran</a>
    </li>
     <li>
        <a href="{{ route('rt.pengeluaran.index') }}" class="waves-effect"><i class="mdi mdi-account-minus fa-fw"></i> Pengeluaran</a>
    </li>
    <li class="last-nav">
        <a href="{{ route('rt.surat-pengantar.index') }}" class="waves-effect"><i class="mdi mdi-account-card-details fa-fw"></i> Surat Pengantar</a>
    </li>
    <li>
        <a href="{{ route('rt.keluhan-dan-saran') }}" class="waves-effect"><i class="mdi mdi-message-text-outline fa-fw"></i> Keluhan dan Saran</a>
    </li>
    <li class="last-nav">
        <a href="{{ route('rt.setting.index') }}" class="waves-effect">
            <i class="mdi mdi-settings fa-fw"></i> <span class="hide-menu">Setting</span>
        </a>
    </li>
</ul>
@endif