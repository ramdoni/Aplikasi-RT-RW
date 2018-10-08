
@if(Session::has('message-success'))
	<div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-success myadmin-alert-top alerttop" style="display: block;"> <i class="ti-user"></i> {{ Session::get('message-success') }} <a href="javascript:void(0)" class="closed">×</a> </div>
@endif

@if(Session::has('message-error'))
	<div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger myadmin-alert-bottom alertbottom" style="display: block; top:0 !important; bottom: auto;"> <i class="ti-user"></i> {{ Session::get('message-error') }} <a href="javascript:void(0)" class="closed">×</a> </div>
@endif