<!DOCTYPE html>
<!--[if IE 7 ]><body class="ie ie7"><![endif]-->
<!--[if IE 8 ]><body class="ie ie8"><![endif]-->
<!--[if IE 9 ]><body class="ie ie9"><![endif]-->
<html class='no-js' lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, maximum-scale=1.0">
	<title>@yield('title')</title>
	<meta content="" name="keywords">
	<meta content="" name="description">

	<link type="image/x-icon" href="img/favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" href="{{ asset('advisa/css/bootstrap.css') }}">
	<!--<link rel="stylesheet" href="{{ asset('advisa/css/font-awesome.css') }}"> -->
	<link rel="stylesheet" href="{{ asset('advisa/fontawesome/css/fontawesome-all.css') }}">

	<link rel="stylesheet" href="{{ asset('advisa/css/main.css') }}?v=2">
	<link rel="stylesheet" href="{{ asset('advisa/css/responsive.css') }}">
	<?php 
         $chek_url = @$_SERVER['HTTP_HOST'];
         if (strpos($chek_url, '.local') == false) {
      ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126553963-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-126553963-1');
        </script>

    <?php } ?>
</head>
<body>
<!--===========================-->
<!--==========Header===========-->
<div id="preloader">
	<div id="status">
		<div class="spinner">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
	</div>
</div>

<div class="main-holder">
<header class='main-wrapper header'>
	<div class="container apex">
		<div class="row">

			<nav class="navbar header-navbar" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<div class="logo navbar-brand">
						<img src="{{ asset('images/logo.png') }}" style="width: 200px;" />
					</div>
		      <button class='toggle-slide-left visible-xs collapsed navbar-toggle' type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><i class="fa fa-bars"></i></button>
				</div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<div class="navbar-right">
						<nav class='nav-menu navbar-left main-nav trig-mob slide-menu-left'>
							<ul class='list-unstyled'>
								<li>
									<a href="#" data-scroll="about_kodami">
										<div class="inside">
											<div class="backside"> About Kodami </div>
											<div class="frontside"> About Kodami </div>
										</div>
									</a>
								</li>
								<li>
									<a data-toggle="modal" role="button" href="#myModal">
										<div class="inside">
											<div class="backside"> Hubungi Kami </div>
											<div class="frontside"> Hubungi Kami </div>
										</div>
									</a>
								</li>
								@guest
								<li>
									<a data-toggle="modal" role="button" href="{{ route('login') }}">
										<div class="inside">
											<div class="backside"> Login </div>
											<div class="frontside"> Login </div>
										</div>
									</a>
								</li>
								@endguest
								
								@if(Auth::check())
								  @if(Auth::user()->access_id == 1)
									<li>
										<a data-toggle="modal" role="button" href="{{ route('admin.dashboard') }}">
											<div class="inside">
												<div class="backside"> Admin </div>
												<div class="frontside"> Admin </div>
											</div>
										</a>
									</li>
								  @endif
								  @if(Auth::user()->access_id == 3)
									<li>
										<a data-toggle="modal" role="button" href="{{ route('kasir.index') }}">
											<div class="inside">
												<div class="backside"> Kasir </div>
												<div class="frontside"> Kasir </div>
											</div>
										</a>
									</li>
								  @endif
								  @if(Auth::user()->access_id == 4)
									<li>
										<a data-toggle="modal" role="button" href="{{ route('cs.index') }}">
											<div class="inside">
												<div class="backside"> Customer Service </div>
												<div class="frontside"> Customer Service </div>
											</div>
										</a>
									</li>
								  @endif
								@endif
							</ul>
						</nav>
						<div class="wr-soc">
							<div class="header-social">
								<ul class='social-transform unstyled'>
								<li>
									<a href='#' target='blank' class='front'><div class="fab fa-facebook-f"></div></a>
								</li>
								<li>
									<a href='#' target='blank' class='front'><i class="fab fa-twitter"></i></a>
								</li>
								<li>
									<a href='#' target='blank' class='front'><i class="fab fa-google-plus"></i></a>
								</li>
								</ul>
							</div>
						</div>
					</div>
		    </div><!-- /.navbar-collapse -->
			</nav>

		</div>
	</div>
</header>
<!--===========================-->
<!--==========Content==========-->
<div class='main-wrapper content' style="background: url('{{ asset('background/15.png') }} ')!important;">
	<section class="relative software_slider" style="background: url('{{ asset('18.png')  }}') !important;">
		<div class="forma-slider">
			<div class="container">
				<div class="row">
					<div id="form_slider" data-anchor="form_slider">

						<ul class="form-bxslider list-unstyled">
							<li>
								<!-- <div class="list-forstart fin_1">
									<h2 class="h-Bold" style="font-size: 24px;opacity: 1;">Kodami Pocket System</h2>
									<p class='desc' style="font-size: 16px;">Adalah layanan digital Kodami yang memungkinkan seluruh anggota maupun calon anggota untuk dapat mengetahui lebih jauh tentang Kodami. Layanan ini memberikan informasi cukup rinci mengenai profil Kodami, pengurus, badan pengawas, tatacara keanggotaan, manfaat, jenis layanan Kodami, armada, proteksi, bagi hasil usaha<br /> dan kegiatan yang telah dan sedang dilakukan oleh Kodami.</p>
								</div> -->
								<div class="img-slider hidden-xs fin_2"><img src="{{ asset('images/banner1.png') }}"></div>
							</li>
						</ul>
					</div>

					<div class="clearfix visible-xs visible-md"></div>

					<div class="container relative fin_3" id='elem-portable'>
						<div class="reg-now" style="top: 100px;">
						@guest
							<h2 class='medium-h text-center'>Registrasi Form</h2>
							<h3 class='xsmall-h text-center'>Daftar disini untuk menjadi anggota Kodami. </h3>

							<form class='reg-now-visible' action="{{ url('registerPost') }}" autocomplete="off" method="POST">

		  						<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />

								<!-- <div class='control-group'>
									<span class="error"><?php echo $errors->first('nik') ?></span>
									<input type="text" name="nik" placeholder="NIK" required class="insert-attr"  value="<?=Form::old('nik')?>" />
								</div> -->
								<div class="control-group">
									<span class="error"><?php echo $errors->first('nama') ?></span>
		    						<input type="text" name="name" placeholder="Nama" required class="insert-attr" value="<?=Form::old('name')?>" />
								</div>
								<div class='control-group'>
									<span class="error"><?php echo $errors->first('email') ?></span>
		    						<input type="text" name="email" placeholder="Email" value="<?=Form::old('email')?>" />
								</div>
								<div class='control-group'>
									<span class="error"><?php echo $errors->first('telepon') ?></span>
		    						<input type="text" name="telepon" placeholder="Telepon" value="<?=Form::old('telepon')?>" />
								</div>
								<div class="control-group">
									<span class="error"><?php echo $errors->first('password') ?></span>
								    <input type="password" name="password" placeholder="Password" />
								</div>
								<div class="control-group">
								    <span class="error"><?php echo $errors->first('confirmation') ?></span>
								    <input type="password" name="confirmation" placeholder="Confirmation Password" />
								</div>
								<button type="submit" value="Register Now" class='btn submit sub-form' name="submit">DAFTAR</button>
							</form>
                        @endguest
						</div>
					</div>
				</div>
			</div><!-- end container -->
		</div>
	</section>
	<section style="position:relative;" class="content-middle">
		<img src="{{ asset('background/text-1.png') }}" style="position: absolute;top: 8%;left:4%;" class="text-middle" />
		<img src="{{ asset('background/14.png') }}" class="background-middle" />
		<button type="submit" value="Register Now" class="btn submit sub-form info_kodami_btn" name="submit" style="color: #415306; border:1px solid #415306; width: 300px; position: absolute; left: 41%; bottom: 25%; ">INFO</button>
	</section>
	<section class="container" data-anchor="about_kodami">
		<div class="spacer1"></div>
			<h2 class='text-center xxh-Bold' style="color: white;">kodami</h2>
			<h3 class='text-center xmedium-h' style="color: white;">Adalah Koperasi Daya Masyarakat Indonesia, merupakan salah satu koperasi produsen yang modern, bekerja dengan memberdayakan masyarakat Indonesia dalam rangka menjadi pelaku ekonomi yang tangguh dan profesional, dengan mengembangkan sistem ekonomi kerakyatan yang bertumpu pada mekanisme pasar yang berkeadilan, dengan suatu tujuan untuk Indonesia yang lebih baik. Layanan Kodami berupa penjualan offline dan online didukung armada kuper (kurir koperasi) dan eskop (ekspedisi koperasi) yang akan membantu masyarakat untuk kemudahan bertransaksi dengan harga yang lebih kompetitif.</h3>
		<div class="clearfix"></div>
		<br />
		<br />
	</section>
	<div class="container">
		<div class="row trainings" id='trainings'>
				<div class="col-md-4">
					<div class="view view-fifth" onclick="slidetoogle_section_keanggotaan()">
						<img src="{{ asset('banner-middle/keanggotaan.png')}}">
						<h4 class='xxsmall-h text-center transition-h'>Keanggotaan</h4>
						<div class="mask col-md-12">
	                        <h2>Keanggotaan</h2>
	                    </div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="view view-fifth">
						<img src="{{ asset('banner-middle/modern.png')}}">
						<h4 class='xxsmall-h text-center transition-h'>Modern</h4>
						<div class="mask col-md-12">
	                        <h2>Modern</h2>
	                    </div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="view view-fifth">
						<img src="{{ asset('banner-middle/profesional.png')}}">
						<h4 class='xxsmall-h text-center transition-h'>Profesional</h4>
						<div class="mask col-md-12">
	                        <h2>Profesional</h2>
	                    </div>
					</div>
				</div>
				<div class="clearfix"></div>
				<br />
				<div class="col-md-4">
					<div class="view view-fifth">
						<img src="{{ asset('banner-middle/berbagi.png')}}">
						<h4 class='xxsmall-h text-center transition-h'>Berbagi</h4>
						<div class="mask col-md-12">
	                        <h2>Berbagi</h2>
	                    </div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="view view-fifth">
						<img src="{{ asset('banner-middle/proteksi.png')}}">
						<h4 class='xxsmall-h text-center transition-h'>Proteksi</h4>
						<div class="mask col-md-12">
	                        <h2>Proteksi</h2>
	                    </div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="view view-fifth">
						<img src="{{ asset('banner-middle/edukasi.png')}}">
						<h4 class='xxsmall-h text-center transition-h'>Edukasi</h4>
						<div class="mask col-md-12">
	                        <h2>Edukasi</h2>
	                    </div>
					</div>
				</div>
				<div class="content_keanggotaan" style="display: none;">
					<img src="{{ asset('background/18.png') }}">
				</div>
			</div>
		<br />
		<br />
	</div>
	<section style="position:relative;" id="slider_bottom">
		<div>
			<ul class="slider-bottom1 unstyled">
				<li><img src="{{ asset('background/13.png') }}" /></li>
				<li><img src="{{ asset('background/16.jpg') }}" /></li>
			</ul>
		</div>
	</section>
</div>
<!--===========================-->
<!--=========Footer============-->
<footer class='main-wrapper footer'>
	<div class="container">
		<a href="#" data-scroll="form_slider" class='btn submit a-trig reg-footer'>Daftar sekarang</a>
	</div>
	<div class="container bottom">

		<ul class='social-transform footer-soc list-unstyled'>
			<li>
				<a href='#' target='blank' class='front'><div class="fab fa-facebook-f"></div></a>
			</li>
			<li>
				<a href='#' target='blank' class='front'><i class="fab fa-twitter"></i></a>
			</li>
			<li>
				<a href='#' target='blank' class='front'><i class="fab fa-google-plus"></i></a>
			</li>
			<li>
				<a href='#' target='blank' class='front'><i class='fab fa-youtube'></i></a>
			</li>
		</ul>
		<div class="clearifx"></div>
		<span class="copyright">
			&#169; <?=date('Y')?> Koperasi Daya Masyarakat Indonesia
		</span>
		<div class="container-fluid responsive-switcher hidden-md hidden-lg">
			<i class="fa fa-mobile"></i>
			Mobile version: Enabled
		</div>
	</div>
</footer>
<!-- Top -->
<div id="back-top-wrapper" class="visible-lg">
	<p id="back-top" class='bounceOut'>
		<a href="#top">
			<span></span>
		</a>
	</p>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-wr" style="width: 525px; left: 40%;">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h2 style="font-size: 20px;">Silakan hubungi kami untuk memberikan saran, kritik, keluhan, menanyakan keanggotaan, mekanisme kerja sama dan sebagainya. Kami selalu siap membantu anda.</h2>
		<br />
		<form id='contact' action="{{ route('contact-us') }}" method="post" accept-charset="utf-8" role="form">
			{{ csrf_field() }}
			<div class='control-group'>
				<input type="text" required name="nama" placeholder='Nama' data-required>
			</div>
			<div class='control-group'>
				<input type="email" required placeholder='Email' name="email" class='insert-attr' data-required>
			</div>
			<div class='control-group'>
				<input type="text" required placeholder='No Telepon' name="telepon" class='insert-attr' data-required>
			</div>
			<div class='control-group'>
				<textarea name='message' cols="30" required rows="10" maxlength="300" placeholder='Ketik pertanyaan anda disini.' data-required></textarea>
			</div>
			<button type="submit" value="Submit" class='btn submit' name="submit">Submit</button>
		</form>
	</div>
</div>

<div id="modal_success" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-wr">
		<h2>Terima kasih</h2> 
		<p>{{ Session::get('messages') }}</p>
	</div>
</div>

</div>
<!-- Animasi -->
<style type="text/css">

.xmedium-h {
	margin-bottom: 30px;
}
.trainings > div {
	min-height: 270px;
}
.view {
   /*float: left;*/
   overflow: hidden;
   position: relative;
   text-align: center;
   cursor: default;

    width: 200px;
    margin: auto;
}
.view .mask,.view .content {
   position: absolute;
   overflow: hidden;
   top: 0;
   left: 0;
}
.view img {
   /*display: block;*/
   /*position: relative;*/
}
.view h2 {
   text-transform: uppercase;
   color: #fff;
   text-align: center;
   position: relative;
   font-size: 17px;
   padding: 10px;
   margin: 20px 0 0 0;
}
.view p {
   font-family: Georgia, serif;
   font-style: italic;
   font-size: 12px;
   position: relative;
   color: #fff;
   padding: 10px 20px 20px;
   text-align: center;
}
.view a.info {
   display: inline-block;
   text-decoration: none;
   padding: 7px 14px;
   background: #000;
   color: #fff;
   text-transform: uppercase;
   -webkit-box-shadow: 0 0 1px #000;
   -moz-box-shadow: 0 0 1px #000;
   box-shadow: 0 0 1px #000;
}
.view a.info: hover {
   -webkit-box-shadow: 0 0 5px #000;
   -moz-box-shadow: 0 0 5px #000;
   box-shadow: 0 0 5px #000;
}
.view-fifth {
	padding:0;
	border: 0;
	background: white;
}
.view-fifth h4 {
	color: black;
	position: absolute;
    bottom: 20px;
    left: 0;
    margin: auto;
    right: 0;
}
.view-fifth h4:hover {
	color: black;
}
.view-fifth:last-child{

}

.view-fifth img {
   -webkit-transition: all 0.3s ease-in-out;
   -moz-transition: all 0.3s ease-in-out;
   -o-transition: all 0.3s ease-in-out;
   -ms-transition: all 0.3s ease-in-out;
   transition: all 0.3s ease-in-out;
}
.view-fifth .mask {
   -webkit-transform: translateX(-300px);
   -moz-transform: translateX(-300px);
   -o-transform: translateX(-300px);
   -ms-transform: translateX(-300px);
   transform: translateX(-300px);
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
   filter: alpha(opacity=100);
   opacity: 1;
   -webkit-transition: all 0.3s ease-in-out;
   -moz-transition: all 0.3s ease-in-out;
   -o-transition: all 0.3s ease-in-out;
   -ms-transition: all 0.3s ease-in-out;
   transition: all 0.3s ease-in-out;
}
.view-fifth h2 {
   color: #000;
}
.view-fifth p {
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
   filter: alpha(opacity=0);
   opacity: 0;
   color: #333;
   -webkit-transition: all 0.2s linear;
   -moz-transition: all 0.2s linear;
   -o-transition: all 0.2s linear;
   -ms-transition: all 0.2s linear;
   transition: all 0.2s linear;
}
.view-fifth:hover .mask {
   -webkit-transform: translateX(0px);
   -moz-transform: translateX(0px);
   -o-transform: translateX(0px);
   -ms-transform: translateX(0px);
   transform: translateX(0px);
}
.view-fifth:hover img {
   -webkit-transform: translateX(300px);
   -moz-transform: translateX(300px);
   -o-transform: translateX(300px);
   -ms-transform: translateX(300px);
   transform: translateX(300px);
}
.view-fifth:hover p {
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
   filter: alpha(opacity=100);
   opacity: 1;
}
</style>



	<div class="mask"></div>
	<script src="{{ asset('advisa/js/libs/jquery-1.10.1.min.js') }}"></script>
	<script src="{{ asset('advisa/js/libs/bootstrap.min.js') }}"></script>
	<script src="{{ asset('advisa/js/cross/modernizr.js') }}"></script>
	<script src="{{ asset('advisa/js/jquery.bxslider.min.js') }}"></script>
	<script src="{{ asset('advisa/js/jquery.customSelect.js') }}"></script>
	<script src="{{ asset('advisa/js/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('advisa/js/jquery.colorbox-min.js') }}"></script>
	<script src="{{ asset('advisa/js/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('advisa/js/jquery.parallax-1.1.3.js') }}"></script>
	<script src="{{ asset('advisa/js/custom.js?v=2') }}"></script>
	<!-- file loader -->
	<script src="{{ asset('advisa/js/loader.js?v=2') }}"></script>
	<script type="text/javascript">
			

		function slidetoogle_section_keanggotaan()
		{
			// $('.content_keanggotaan').slideToggle();
		}

		$( ".hover_btn" ).hover(
		  function() {
		    $( this ).find('img').src('{{ asset('background/middle/btn.png') }}');
		  }, function() {
		    $( this ).find('img').src('{{ asset('background/middle/btn_hover.png') }}');
		  }
		);

		@if(Session::has('messages'))
		$("#modal_success").modal('show');
		@endif;


		$('.slider-bottom1').bxSlider({
			mode: 'horizontal',
			pause: 2500,
			autoHover: true,
			pager: false,
			auto: true
		});


	</script>
	<style type="text/css">


		@media (min-width: 1281px) {  }
		@media (min-width: 1025px) and (max-width: 1280px) {}
		@media (min-width: 768px) and (max-width: 1024px) {}
		@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {}
		@media (min-width: 481px) and (max-width: 767px) {
		  
		}

		@media (min-width: 320px) and (max-width: 480px) 
		{
		  .content-middle .text-middle {
		  	width: 179px;
		  	top: 2% !important;
		  }
		  .info_kodami_btn {
		  	width: 85px !important;
		  	left: 35% !important;
		  	color: white !important;
		  	bottom: 5% !important;
		  	height: 26px !important;
		  	padding-top: 2px !important;
		  	font-size: 10px !important;
		  }

		  	.trainings .col-md-4 .view-fifth
			{
				background: transparent;
			}
			.trainings .col-md-4 .view {
				margin-bottom: 15px;
				float: none;
			}
			.trainings .col-md-4 .view img {
				display: inline;
			}

			.trainings div.clearfix {
				min-height: 0;
			}
		}

		#slider_bottom .bx-wrapper .bx-controls-direction a {
	       margin-top: -9%;
	    }
		.info_kodami_btn:hover
		{
			background: transparent;
		}
		.software_slider {
			padding-top: 94px;
		}
		.trainings > div
		{
			margin-bottom: 0;
		}
		.thumbnails {
		    background: #f7efef;
		    border: 1px solid #ffffff;
		}
		.trainings i {
			color: #de2c23;
		}

		.xxsmall-h {
			color: white;
		}
		.list-forstart .desc  {
			font: 20px/28px 'OpenSans_Regular',Arial
		}
		 .xmedium-h {
		 	font: 14px/19px 'OpenSans_Regular',Arial	
		 }
		
		/*.list-forstart {
			width: 55%;
		}*/

		.fa-share-alt:before {
		    content: "\f1e0";
		}
	</style>
</body>
</html>