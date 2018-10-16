<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin-css/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ asset('admin-css/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('admin-css/plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset('admin-css/plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('admin-css/plugins/bower_components/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-css/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="{{ asset('admin-css/plugins/bower_components/calendar/dist/fullcalendar.css') }}" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="{{ asset('admin-css/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('admin-css/css/style.css') }}?time=<?=date('His')?>" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('admin-css/css/colors/green.css') }}" id="theme" rel="stylesheet">

    <link href="{{ asset('admin-css/plugins/bower_components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style type="text/css">
        body {
            font-size: 12px;
        }
    </style>
</head>
<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="{{ url('anggota') }}">
                        <span class="hidden-xs"><b>RT KU</b></span> 
                    </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i class="ti-close ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="javascript:void(0)">
                          @if(Auth::user()->foto != "")
                                <img src="{{ asset('file_photo/'.  Auth::user()->id .'/'. Auth::user()->foto) }}" alt="{{ Auth::user()->name }}" class="img-circle" style="width:36px; height: 36px;">
                            @else 
                                <img src="{{ asset('admin-css/images/user.png') }}" alt="user-img" width="36" class="img-circle"> 
                            @endif 
                            <b class="hidden-xs">{{ Auth::user()->name }}</b><span class="caret"></span> 
                        </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img pull-left">
                                        @if(Auth::user()->foto != "")
                                            <img src="{{ asset('file_photo/'.  Auth::user()->id .'/'. Auth::user()->foto) }}" alt="{{ Auth::user()->name }}" class="img-circle" style="width:36px; height: 36px;">
                                        @else 
                                            <img src="{{ asset('admin-css/images/user.png') }}" alt="user-img" width="36" class="img-circle"> 
                                        @endif 
                                    </div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p><a class="btn btn-rounded btn-danger btn-sm">{{ get_jabatan(\Auth::user()->access_id) }}</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            @if(Auth::user()->access_id == 2)
                                @if(\Session::get('is_login_admin'))
                                    <li>
                                        <a href="{{ route('warga.back-to-admin') }}"> <i class="fa fa-key"></i> Back to Admin</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                @endif
                            @endif
                            @if(Auth::user()->access_id == 3)
                                @if(\Session::get('is_login_admin'))
                                    <li>
                                        <a href="{{ route('bendahara.back-to-admin') }}"> <i class="fa fa-key"></i> Back to Admin</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                @endif
                            @endif
                            @if(Auth::user()->access_id == 4)
                                @if(\Session::get('is_login_admin'))
                                    <li>
                                        <a href="{{ route('rt.back-to-admin') }}"> <i class="fa fa-key"></i> Back to Admin</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                @endif
                            @endif
                            <li><a href="{{ url('logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                @include('layout.nav')
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->

        @yield('content')
        
        @include('layout.alert')
        <div class="modal fade" id="modal_keluhan" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form method="POST" action="{{ route('warga.submit-keluhan') }}">
                    {{ csrf_field() }}            
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Keluhan dan Saran</h4> 
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="form-control" name="to">
                                <option value="">- Ditujukan Untuk -</option>
                                <option>Rukun Tetannga (RT)</option>
                                <option>Rukun Warga (RW)</option>
                                <option>Pakrt.id</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="pesan"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Oke</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('admin-css/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('admin-css/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('admin-css/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ asset('admin-css/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('admin-css/js/waves.js') }}"></script>
    <!--Counter js -->
    <script src="{{ asset('admin-css/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('admin-css/plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
    <!--Morris JavaScript -->
    <script src="{{ asset('admin-css/plugins/bower_components/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('admin-css/plugins/bower_components/morrisjs/morris.js') }}"></script>
    <!-- chartist chart -->
    <script src="{{ asset('admin-css/plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('admin-css/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!-- Calendar JavaScript -->
    <script src="{{ asset('admin-css/plugins/bower_components/moment/moment.js') }}"></script>
    <script src="{{ asset('admin-css/plugins/bower_components/calendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('admin-css/plugins/bower_components/calendar/dist/cal-init.js') }}"></script>
    <script src="{{ asset('admin-css/plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('admin-css/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin-css/js/dashboard1.js') }}?time=<?=date('His')?>"></script>
    <script src="{{ asset('js/bootbox.min.js') }}"></script>
    <!-- Custom tab JavaScript -->
    <script src="{{ asset('admin-css/js/cbpFWTabs.js') }}"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <!-- start - This is for export functionality only -->
    <script src="{{ asset('admin-css/plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="{{ asset('js/general.js?v='. date('His')) }}"></script>
    <script src="{{ asset('js/set-datable.js?v='. date('His')) }}"></script>
    
    <script type="text/javascript">
    
    $('#data_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        pageLength : 20
    });

    /**
     * [numberWithComma description]
     * @param  {[type]} x [description]
     * @return {[type]}   [description]
     */
    function numberWithComma(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    (function() {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
            new CBPFWTabs(el);
        });
    })();

    $(".myadmin-alert .closed").click(function(event) {
        $(this).parents(".myadmin-alert").fadeToggle(350);
        return false;   
    });

    function form_keluhan()
    {
        $("#modal_keluhan").modal("show");        
    }

    </script>

    @yield('footer-script')
     <script type="text/javascript">
        @if(Session::has('message-success'))
            bootbox.alert('<h3 class="text-success pull-left"><i class="fa fa-check"></i></h3><h4 class="pull-left" style="margin-left: 10px;"> {{ Session::get('message-success') }}</h4><br class="clearfix" /><br class="clearfix" />');
        @endif
        
        @if(Session::has('message-error'))
            bootbox.alert('<h3 class="text-danger pull-left"><i class="fa fa-check"></i></h3><h4 class="pull-left" style="margin-left: 10px;"> {{ Session::get('message-error') }}</h4><br class="clearfix" /><br class="clearfix" />');
        @endif
    </script>
</body>
</html>