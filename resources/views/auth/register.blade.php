@extends('layout.login')

@section('content')
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
    <div class="white-box">
      <form class="form-horizontal form-material" method="POST" action="{{ route('register.submit') }}">
        {{ csrf_field() }}
        <h3 class="box-title m-t-40 m-b-0">Daftar Warga Pak RT</h3><small>Mudah daftar menjadi warga Pak RT </small>   

        @if($errors->has('name'))
          <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif
        @if($errors->has('telepon'))
          <span class="help-block">
              <strong>{{ $errors->first('telepon') }}</strong>
          </span>
        @endif
        @if($errors->has('perumahan_id'))
          <span class="help-block">
              <strong>{{ $errors->first('perumahan_id') }}</strong>
          </span>
        @endif
        @if($errors->has('password'))
          <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
        @if($errors->has('confirm'))
          <span class="help-block">
              <strong>{{ $errors->first('confirm') }}</strong>
          </span>
        @endif
        <div class="form-group m-t-20">
          <div class="col-xs-12">
            <input class="form-control" name="name" type="text" required placeholder="Nama">
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" name="telepon" type="text" required placeholder="Telepon">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <select name="perumahan_id" class="form-control" required>
                <option value="">Pilih Perumahan</option>
                @foreach(getPerumahan() as $item)
                <option value="{{ $item->id }}">{{ $item->nama_perumahan }}</option>
                @endforeach
            </select>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" name="password" type="password" required placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" name="confirm" type="password" required placeholder="Confirm Password">
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Daftar</button>
          </div>
        </div>
        <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
            <p>Anda sudah punya akun Pak RT? <a href="{{ route('login') }}" class="text-primary m-l-5"><b>Login disini</b></a></p>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
@section('footer-script')
<script type="text/javascript">
  @if(Session::has('message-success'))
      bootbox.alert('<h4 class="pull-left" style="margin-left: 10px;"> {{ Session::get('message-success') }}</h4><br class="clearfix" /><br class="clearfix" />');
  @endif
  
  @if(Session::has('message-error'))
      bootbox.alert('<h4 class="pull-left" style="margin-left: 10px;"> {{ Session::get('message-error') }}</h4><br class="clearfix" /><br class="clearfix" />');
  @endif
</script>
@endsection
@endsection


