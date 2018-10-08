@extends('layout.login')

@section('content')
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="new-login-register">
      <a href="{{ url('/') }}" class="back_index"><i class="fa fa-arrow-left"></i></a>
      
      <div class="lg-info-panel">
              <div class="inner-panel">
                  <a href="javascript:void(0)" class="p-20 di"></a>
                  <div class="lg-content">
                      <h2>Aplikasi RT  / RW</h2>
                      <p class="text-muted"></p>
                      <a href="javascript:void(0)" class="btn btn-rounded btn-danger p-l-20 p-r-20"> Daftar</a>
                  </div>
              </div>
      </div>
      <div class="new-login-box">
          <div class="white-box">
              <h3 class="box-title m-b-0">RT / RW PINTAR</h3>
              <small>Sign In to and Enter your details below</small>
            <form class="form-horizontal new-lg-form" method="POST" id="loginform" action="{{ route('login') }}">
              
              {{ csrf_field() }}
              
              <div class="form-group  m-t-20">
                <div class="col-xs-12">
                  <label>NIK</label>
                  <input class="form-control" type="text" required="" name="email" placeholder="No Induk Kependudukan" value="{{ old('email') }}">
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12">
                  <label>Password</label>
                  <input class="form-control" name="password" type="password" required="" placeholder="Password">
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="checkbox checkbox-info pull-left p-t-0">
                    <input id="checkbox-signup" type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="checkbox-signup"> Remember me </label>
                  </div>
                <!--   <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> --> 
                </div>
              </div>
              <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                  <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Log In</button>
                </div>
              </div>
              <!--
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                  <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip"  title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip"  title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
                </div>
              </div>
              -->
              <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                  <p>Belum menjadi anggota? <a href="{{ url('home') }}" class="text-primary m-l-5"><b>Daftar</b></a></p>
                </div>
              </div>
            </form>
            <form class="form-horizontal" id="recoverform" action="index.html">
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
                  <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                </div>
              </div>
            </form>
          </div>
      </div>              
</section>
@endsection


