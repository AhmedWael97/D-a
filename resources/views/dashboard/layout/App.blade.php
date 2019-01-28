<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{url('/')}}/assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="{{url('/')}}/assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('/')}}/assets/img/favicon-16x16.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="{{url('/')}}/assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('/')}}/assets/vendors/css/base/elisyam-1.5.min.css">
        <link rel="stylesheet" href="{{url('/')}}/assets/css/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="{{url('/')}}/assets/css/owl-carousel/owl.theme.min.css">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <link rel="stylesheet" href="{{url('/')}}/assets/css/datatables/datatables.min.css">
        <link rel="stylesheet" href="{{url('/')}}/assets/vendors/css/base/elisyam-1.5.min.css">
        <link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap-select/bootstrap-select.min.css">

        <style type="text/css">
            .modal-dialog{
                max-width: 90%;
            }
            .maxs{
                height: 50px
            }
            .maxs2{
                height: 83px;
            }
        </style>
            {!! Charts::assets() !!}


    </head>
    <body id="page-top">
<!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="{{url('/')}}/assets/img/logo.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <div class="page">
            <!-- Begin Header -->
            <header class="header">
                <nav class="navbar fixed-top">         
                    <!-- Begin Search Box-->
                    <div class="search-box">
                        <button class="dismiss"><i class="ion-close-round"></i></button>
                        <form id="searchForm" action="#" role="search">
                            <input type="search" placeholder="Search something ..." class="form-control">
                        </form>
                    </div>
                    <!-- End Search Box-->
                    <!-- Begin Topbar -->
                    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                        <!-- Begin Logo -->
                        <div class="navbar-header">
                            <a href="{{url('/')}}/dashboard" class="navbar-brand">
                                <div class="brand-image brand-big">
                                    <img src="{{url('/')}}/assets/img/logo-big.png" alt="logo" class="logo-big">
                                </div>
                                <div class="brand-image brand-small">
                                    <img src="{{url('/')}}/assets/img/logo.png" alt="logo" class="logo-small">
                                </div>
                            </a>
                            <!-- Toggle Button -->
                            <a id="toggle-btn" href="#" class="menu-btn active">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <!-- End Toggle -->
                        </div>
                        <!-- End Logo -->
                        <!-- Begin Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                            <!-- Search -->
                            
                            <!-- End Search -->
                            <!-- Begin Notifications -->
                            
                            <!-- End Notifications -->
                            <!-- User -->
                            <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="{{url('/')}}/assets/img/avatar/avatar-01.jpg" alt="..." class="avatar rounded-circle"></a>
                                <ul aria-labelledby="user" class="user-size dropdown-menu">
                                    <li class="welcome">
                                        
                                        <img src="{{url('/')}}/assets/img/avatar/avatar-01.jpg" alt="..." class="rounded-circle">
                                    </li>
                                    
                                    <li>
                                        <a href="{{url('/inbox')}}" class="dropdown-item"> 
                                            Messages
                                        </a>
                                    </li>
                                    
                                    <li class="separator"></li>
                                    
                                    <li><a rel="nofollow" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();" class="dropdown-item logout text-center">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form><i class="ti-power-off"></i></a></li>
                                </ul>
                            </li>
                            <!-- End User -->
                            <!-- Begin Quick Actions -->
                            
                            <!-- End Quick Actions -->
                        </ul>
                        <!-- End Navbar Menu -->
                    </div>
                    <!-- End Topbar -->
                </nav>
            </header>
            <!-- End Header -->
            <!-- Begin Page Content -->
            <div class="page-content d-flex align-items-stretch">
                <div class="default-sidebar">
                    <!-- Begin Side Navbar -->
                    <nav class="side-navbar box-scroll sidebar-scroll">
                        <!-- Begin Main Navigation -->
                        <ul class="list-unstyled">
                            <li class="active"><a href="#dropdown-db" aria-expanded="true" data-toggle="collapse"><i class="la la-columns"></i><span>Home</span></a>
                                <ul id="dropdown-db" class="collapse list-unstyled show pt-0">
                                    <li><a class="{{substr(strrchr(url()->current(), "/"), 1) =='charts' ? 'active' : ''}}" href="{{url('/charts')}}">Home</a></li>
                                    <li><a class="{{substr(strrchr(url()->current(), "/"), 1) =='category' ? 'active' : ''}}" href="{{url('/category')}}">Category</a></li>
                                    <li><a class="{{substr(strrchr(url()->current(), "/"), 1) =='product' ? 'active' : ''}}" href="{{url('/product')}}">Product</a></li>
                                    <li><a class="{{substr(strrchr(url()->current(), "/"), 1) =='settings_home_slider' ? 'active' : ''}}" href="{{url('/settings_home_slider')}}">Home Slider</a></li>
                                    <li><a class="{{substr(strrchr(url()->current(), "/"), 1) =='deal' ? 'active' : ''}}" href="{{url('/deal')}}">Deal</a></li>
                                    <li><a class="{{substr(strrchr(url()->current(), "/"), 1) =='OfferSection' ? 'active' : ''}}" href="{{url('/OfferSection')}}">Offers Section</a></li>
                                    <li><a class="{{substr(strrchr(url()->current(), "/"), 1) =='inbox' ? 'active' : ''}}" href="{{url('/inbox')}}">Inbox</a></li>
                                    <li><a class="{{substr(strrchr(url()->current(), "/"), 1) =='CustomerOpinion' ? 'active' : ''}}" href="{{url('/CustomerOpinion')}}">Customer Opinions</a></li>
                                    <li><a class="{{substr(strrchr(url()->current(), "/"), 1) =='about' ? 'active' : ''}}" href="{{url('/about')}}">About & Social</a></li>
                                    <li><a class="{{substr(strrchr(url()->current(), "/"), 1) =='admins' ? 'active' : ''}}" href="{{url('/admins')}}">Admins</a></li>
                                    <li><a class="{{substr(strrchr(url()->current(), "/"), 1) =='Orders' ? 'active' : ''}}" href="{{url('/Orders')}}">Orders</a></li>
                                    <li><a class="{{substr(strrchr(url()->current(), "/"), 1) =='sende-mail' ? 'active' : ''}}" href="{{url('/sende-mail')}}">Send E-mail</a></li>
                                    <li><a class="{{substr(strrchr(url()->current(), "/"), 1) =='coupon' ? 'active' : ''}}" href="{{url('/coupon')}}">Copons</a></li>
                                </ul>
                            </li>
                            
                            
                        </ul>
                        
                        <!-- End Main Navigation -->
                    </nav>
                    <!-- End Side Navbar -->
                </div>
                <!-- End Left Sidebar -->
                <div class="content-inner">
                    <div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
                                <div class="d-flex align-items-center">
                                    <h2 class="page-header-title">Dashboard</h2>
                                    
                                </div>
                            </div>
                        </div>
                        
                        @yield('content')

                        </div>
                    <!-- End Container -->
                    <!-- Begin Page Footer-->
                    <footer class="main-footer">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                                <p class="text-gradient-02">Design By Smart Geeks</p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="documentation.html">Smart Geeks</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="changelog.html">Show Website</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                    <!-- End Page Footer -->
                    
                    <!-- End Offcanvas Sidebar -->
                </div>
                <!-- End Content -->
            </div>
            <!-- End Page Content -->
        </div>
        <!-- Begin Success Modal -->
        <div id="delay-modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="sa-icon sa-success animate" style="display: block;">
                            <span class="sa-line sa-tip animateSuccessTip"></span>
                            <span class="sa-line sa-long animateSuccessLong"></span>
                            <div class="sa-placeholder"></div>
                            <div class="sa-fix"></div>
                        </div>
                        <div class="section-title mt-5 mb-5">
                            <h2 class="text-dark">Meeting successfully created</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Success Modal -->
        <!-- Begin Modal -->
        <div id="modal-view-event" class="modal modal-top fade calendar-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title event-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="media">
                            <div class="media-left align-self-center mr-3">
                                <div class="event-icon"></div>
                            </div>
                            <div class="media-body align-self-center mt-3 mb-3">
                                <div class="event-body"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Begin Vendor Js -->
        <script src="{{url('/')}}/assets/vendors/js/base/jquery.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="{{url('/')}}/assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/chart/chart.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/progress/circle-progress.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/calendar/moment.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/calendar/fullcalendar.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/owl-carousel/owl.carousel.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/app/app.js"></script>

        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="{{url('/')}}/assets/js/dashboard/db-default.js"></script>
        <!-- End Page Snippets -->
        <!-- Begin Page Vendor Js -->
        <script src="{{url('/')}}/assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/chart/chart.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="{{url('/')}}/assets/js/components/chartjs/chartjs.min.js"></script>

        <script src="{{url('/')}}/assets/vendors/js/datatables/datatables.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/datatables/dataTables.buttons.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/datatables/jszip.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/datatables/buttons.html5.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/datatables/pdfmake.min.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/datatables/vfs_fonts.js"></script>
        <script src="{{url('/')}}/assets/vendors/js/datatables/buttons.print.min.js"></script>

        <script>
        $(document).ready( function () {
            $('#sorting-table').DataTable();
        } );
    </script>
    </body>
</html>