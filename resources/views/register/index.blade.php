@extends('layout.login')

@section('title', 'Kodami Pocket System')

@section('content')
	<div class="info">
	    <h1>KODAMI System</h1>
	    <h2>Register</h2>
	  </div>
	</div>
	<form method="post" action="{{ url('registerPost') }}" class="form" enctype="multipart/form-data">
		  <div>
		  	<img src="{{ asset('logo.jpeg') }}" style="width: 100%;margin-bottom:10px;border-radius: 5px;" />
		  </div>
		  <form class="login-form" method="POST" action="">
		  	@if(\Session::has('alert-success'))
                <div class="alert alert-success">
	                <br/>
	                <h3  style="color: green;">{{Session::get('alert-success')}}</h3>
	                <br/><br/>
            	</div>
            @endif
		  	<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />

		    <span class="error"><?php echo $errors->first('nik') ?></span>
		    <input type="text" name="nik" placeholder="NIK" value="<?=Form::old('nik')?>" />

		    <span class="error"><?php echo $errors->first('name') ?></span>
		    <input type="text" name="name" placeholder="Nama" value="<?=Form::old('name')?>" />

		    <span class="error"><?php echo $errors->first('telepon') ?></span>
		    <input type="text" name="telepon" placeholder="Telepon" value="<?=Form::old('telepon')?>" />

		    <span class="error"><?php echo $errors->first('email') ?></span>
		    <input type="text" name="email" placeholder="Email" value="<?=Form::old('email')?>" />
		    
		    <span class="error"><?php echo $errors->first('tempat_lahir') ?></span>
		    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?=Form::old('tempat_lahir')?>" />

		    <span class="error"><?php echo $errors->first('tanggal_lahir') ?></span>
		    <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?=Form::old('tanggal_lahir')?>" />

		    <span class="error"><?php echo $errors->first('jenis_kelamin') ?></span>
		    <?=Form::select('jenis_kelamin', array('' => '- Jenis Kelamin - ', 'Laki-laki' => 'Laki-laki', 'Wanita' => 'Wanita'));?>

		    <span class="error"><?php echo $errors->first('alamat') ?></span>
		    <input type="text" name="alamat" placeholder="Alamat" value="<?=Form::old('alamat')?>" />

		    <p style="text-align: left;">Foto</p>
		    <span class="error"><?php echo $errors->first('foto') ?></span>
		    <input type="file" name="foto" />

		    <p style="text-align: left;">Foto TKP</p>
		    <span class="error"><?php echo $errors->first('foto_ktp') ?></span>
		    <input type="file" name="foto_ktp" />

		    <span class="error"><?php echo $errors->first('password') ?></span>
		    <input type="password" name="password" placeholder="Password" />

		    <span class="error"><?php echo $errors->first('confirmation') ?></span>
		    <input type="password" name="confirmation" placeholder="Confirmation Password" />

		    <button type="submit"><strong>Register</strong></button>
		  </form>
	</form>
	<style type="text/css">
		.error {
			font-size: 12px;
			color: red;
		}
	</style>
@endsection