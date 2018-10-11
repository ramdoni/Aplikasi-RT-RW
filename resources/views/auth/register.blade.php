@extends('layout.login')

@section('content')
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
    <div class="white-box">
      <form class="form-horizontal form-material" id="loginform" action="index.html">
        <h3 class="box-title m-t-40 m-b-0">Daftar Sekarang</h3><small>Create your account and enjoy</small> 
        <div class="form-group m-t-20">
          <div class="col-xs-12">
            <input class="form-control" name="name" type="text" required placeholder="Nama">
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" name="email" type="text" required placeholder="Email">
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" name="password" type="password" required placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" name="password" type="password" required placeholder="Confirm Password">
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
          </div>
        </div>
        <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
            <p>Already have an account? <a href="{{ route('login') }}" class="text-primary m-l-5"><b>Sign In</b></a></p>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection


