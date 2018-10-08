<nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="<?=url('/')?>">
                        <b>KODAMI
                     </b>
                     <span class="hidden-xs">
                        System
                     </span> </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i class="ti-close ti-menu"></i></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="javascript:void(0)"> <i class="mdi mdi-gmail"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="javascript:void(0)">
                                        <div class="user-img"> <img src="{{ asset('images/people.png') }}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <div class="user-img"> <img src="{{ asset('images/people.png') }}" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <div class="user-img"> <img src="{{ asset('images/people.png') }}" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <div class="user-img"> <img src="{{ asset('images/people.png') }}" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- .Task dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="javascript:void(0)"> <i class="mdi mdi-check-circle"></i>
                            <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                        </a>
                        <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                            <li>
                                <a href="javascript:void(0)">
                                    <div>
                                        <p> <strong>Task 1</strong> <span class="pull-right text-muted">40% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:void(0)">
                                    <div>
                                        <p> <strong>Task 2</strong> <span class="pull-right text-muted">20% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:void(0)">
                                    <div>
                                        <p> <strong>Task 3</strong> <span class="pull-right text-muted">60% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:void(0)">
                                    <div>
                                        <p> <strong>Task 4</strong> <span class="pull-right text-muted">80% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="javascript:void(0)"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                    <!-- .Megamenu -->
                    <li class="mega-dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="javascript:void(0)"><span class="hidden-xs">All Menu</span> <i class="icon-options-vertical"></i></a>
                        <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Products</li>
                                    <li><a href="#">All Products</a></li>
                                    <li><a href="#">Category Products</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Report</li>
                                    <li><a href="#">Products</a></li>
                                    <li><a href="#">Member</a></li>
                                    <li><a href="#">Pemesanan</a></li>
                                    <li><a href="#">Product Category</a></li>
                                    <li><a href="#">Data Transaksi</a></li>
                                    <li><a href="#">Pembayaran</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Transaksi</li>
                                    <li><a href="#">Data Transaksi</a></li>
                                    <li><a href="#">Status Pemesanan</a></li>
                                    <li><a href="#">Status Pembayaran</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Transaksi</li>
                                    <li><a href="#">Data Transaksi</a> </li>
                                    <li><a href="#">Status Pemesanan</a></li>
                                    <li><a href="#">Status Pembayaran</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- /.Megamenu -->
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="javascript:void(0)"> <img src="{{ asset('images/people.png') }}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Ramdoni</b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{ asset('images/people.png') }}" alt="user" /></div>
                                    <div class="u-text">
                                        <h4>Ramdoni</h4>
                                        <p class="text-muted">ramdoni@kodami.co.id</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
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
                    <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
                <ul class="nav" id="side-menu">
                    <li class="user-pro">
                        <a href="javascript:void(0)" class="waves-effect"><img src="{{ asset('images/people.png') }}" alt="user-img" class="img-circle"> <span class="hide-menu"> Ramdoni<span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> <span class="hide-menu">My Profile</span></a></li>
                            <li><a href="javascript:void(0)"><i class="ti-wallet"></i> <span class="hide-menu">My Balance</span></a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> <span class="hide-menu">Inbox</span></a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> <span class="hide-menu">Account Setting</span></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="waves-effect active"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard <span class="fa arrow"></span> <span class="label label-rouded label-inverse pull-right">4</span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?=url('/dashboard-related')?>"><span class="hide-menu">Related Data</span></a> </li>
                            <li> <a href="<?=url('/dashboard-statistics')?>"><span class="hide-menu">Statistics Data</span></a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect "><i class="mdi mdi-database fa-fw"></i> <span class="hide-menu">Products<span class="fa arrow"></span><span class="label label-rouded label-warning pull-right">30</span></span></a>
                        <ul class="nav nav-second-level ">
                            <li><a href="<?=url('products')?>"><i class="mdi mdi-database fa-fw"></i> <span class="hide-menu">All Products</span></a></li>

                            <li><a href="<?=url('product-category')?>"><i class="mdi mdi-database fa-fw"></i> <span class="hide-menu">Category Product</span></a></li>
                        </ul>
                    </li>
                    <li class="devider"></li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Report<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level two-li">
                            <li><a href="<?=url('report-products')?>"><i class="mdi mdi-file-document-box fa-fw"></i><span class="hide-menu">Products</span></a></li>
                            <li><a href="<?=url('report-product-category')?>"><i class="mdi mdi-file-document-box fa-fw"></i><span class="hide-menu">Products Category</span></a></li>
                            <li><a href="<?=url('report-member')?>"><i class="mdi mdi-file-document-box fa-fw"></i><span class="hide-menu">Member</span></a></li>
                            <li> <a href="<?=url('report-transaksi')?>" class="waves-effect"><i class="mdi mdi-library-books fa-fw"></i><span class="hide-menu">Data Transaksi</span></a> </li>
                             <li> <a href="<?=url('report-pemesanan')?>" class="waves-effect"><i class="mdi mdi-library-books fa-fw"></i><span class="hide-menu">Pemesanan</span></a> </li>
                             <li> <a href="<?=url('report-pembayaran')?>" class="waves-effect"><i class="mdi mdi-library-books fa-fw"></i><span class="hide-menu">Pembayaran</span></a> </li>
                        </ul>
                    </li>
                    <li class="last-nav"><a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-apps fa-fw"></i> <span class="hide-menu">Transaksi<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                             <li> <a href="<?=url('transaksi')?>" class="waves-effect"><i class="mdi mdi-library-books fa-fw"></i><span class="hide-menu">Data Transaksi</span></a> </li>
                             <li> <a href="<?=url('data-pemesanan')?>" class="waves-effect"><i class="mdi mdi-library-books fa-fw"></i><span class="hide-menu">Status Pemesanan</span></a> </li>
                             <li> <a href="<?=url('data-pembayaran')?>" class="waves-effect"><i class="mdi mdi-library-books fa-fw"></i><span class="hide-menu">Status Pembayaran</span></a> </li>
                        </ul>
                    </li>
                    <li class="devider"></li>
                    <li> <a href="<?=url('setting')?>" class="waves-effect"><i  class="mdi mdi-settings fa-fw"></i> <span class="hide-menu">Setting</span></a> 
                        <ul class="nav nav-second-level">
                            <li> <a href="<?=url('setting-calendar')?>" class="waves-effect"><i class="mdi mdi-calendar-check fa-fw"></i> <span class="hide-menu">Calendar</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        