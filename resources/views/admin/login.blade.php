@extends('layout.login')

@section('title', 'Login Admin - Kodami Pocket System')

@section('sidebar')

@endsection

@section('content')

<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
    <div class="white-box">
      <form class="form-horizontal form-material" id="loginform" action="{{ url('login')}}" method="POST">
        {{ csrf_field() }}
        <a href="javascript:void(0)" class="text-center db">
          <h2><strong>Kodami Pocket System</strong></h2>
        </a> 
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input class="form-control" type="text" name="email" required="" placeholder="Email" value="{{ old('email') }}">
             @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" type="password" name="password" required=""  placeholder="Password">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Remember me </label>
            </div>
            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
            <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip"  title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip"  title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
          </div>
        </div>
        <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
            <p>Belum menjadi anggota? <a href="<?=url('/')?>#form-register" class="text-primary m-l-5"><b>Daftar</b></a></p>
          </div>
        </div>
      </form>
      <form class="form-horizontal" id="recoverform" action="">
        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recover Password</h3>
            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Email">
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" onsubmit="return false;">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>

@endsection
