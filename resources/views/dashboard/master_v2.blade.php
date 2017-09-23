<!DOCTYPE html>
<html lang="en">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Togetther,we learn! Together, we conquer!</title>
      <!-- JQuery-UI-->
      <link rel="stylesheet" href="/vendors/jquery-ui/jquery-ui.min.css">
      <!-- Bootstrap -->
      <link rel="stylesheet" href="/vendors/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- NProgress -->
      <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
      <!-- iCheck -->
      <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

      <link href="/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

      <!-- bootstrap-progressbar -->
      <link href="/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
      <!-- JQVMap -->
      <link href="/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
      <!-- bootstrap-daterangepicker -->
      <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

      @yield('style')


      <!-- Custom Theme Style -->
      <link href="/build/css/custom.min.css" rel="stylesheet">


    </head>
    <body class="nav-md">
      <div class="container body">
        <div class="main_container">
          <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
              <div class="navbar nav_title" style="border: 0;">
                <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Welearn</span></a>
              </div>

              <div class="clearfix"></div>

              <!-- menu profile quick info -->
              <div class="profile clearfix">
                <div class="profile_pic">
                  <img src="https://scontent.fhan3-1.fna.fbcdn.net/v/t1.0-9/18193711_1471316319605635_5350625752603422041_n.jpg?oh=825513fec58f54d39dae71cf9f8b7b28&oe=59FC8FC0" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2>Nhu Y Pham</h2>
                </div>
              </div>
              <!-- /menu profile quick info -->

              <br />

              <!-- sidebar menu -->
              @include('dashboard.left_side_bar')
              <!-- /sidebar menu -->

              <!-- /menu footer buttons -->
              <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                  <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                  <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
              </div>
              <!-- /menu footer buttons -->
            </div>
          </div>

          <!-- top navigation -->
          <div class="top_nav">
            <div class="nav_menu">
              <nav>
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                  <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="https://scontent.fhan3-1.fna.fbcdn.net/v/t1.0-9/18193711_1471316319605635_5350625752603422041_n.jpg?oh=825513fec58f54d39dae71cf9f8b7b28&oe=59FC8FC0" alt="">John Doe
                      <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <li><a href="javascript:;"> Profile</a></li>
                      <li>
                        <a href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                      </li>
                      <li><a href="javascript:;">Help</a></li>
                      <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                  </li>

                  <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                      <li>
                        <a>
                          <span class="image"><img src="/images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li>
                        <a>
                          <span class="image"><img src="/images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li>
                        <a>
                          <span class="image"><img src="/images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li>
                        <a>
                          <span class="image"><img src="/images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li>
                        <div class="text-center">
                          <a>
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <!-- /top navigation -->

          <!--content -->
          <div class="right_col" rold"main">
            <div>
              @yield('error')
              @yield('title')
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>@yield('table_name')</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        @yield('list_actions')
                      </ul>
                      <div class="clearfix"></div>

                      <div class="x_content">
                          @yield('content')
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div style="display: none;" id="dialog-confirm" title="Delete role!"><!--Start confirm dialog-->
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this role?</p>
          </div><!--End confirm dialog-->

          <!-- stop page content -->

          <!-- footer content -->
          <footer>
            <div class="pull-right">
              Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
          </footer>
          <!-- /footer content -->
        </div>
      </div>

      <!-- jQuery -->
      <script src="/vendors/jquery/dist/jquery.min.js"></script>

      <script src="/vendors/jquery-ui/jquery-ui.min.js"></script>

      <!-- Bootstrap -->
      <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- FastClick -->
      <script src="/vendors/fastclick/lib/fastclick.js"></script>
      <!-- NProgress -->
      <script src="/vendors/nprogress/nprogress.js"></script>
      <!-- Chart.js -->
      <script src="/vendors/Chart.js/dist/Chart.min.js"></script>
      <!-- gauge.js -->
      <script src="/vendors/gauge.js/dist/gauge.min.js"></script>
      <!-- bootstrap-progressbar -->
      <script src="/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
      <!-- iCheck -->
      <script src="/vendors/iCheck/icheck.min.js"></script>
      <!-- Skycons -->
      <script src="/vendors/skycons/skycons.js/"></script>
      <!-- Flot -->
      <script src="/vendors/Flot/jquery.flot.js"></script>
      <script src="/vendors/Flot/jquery.flot.pie.js"></script>
      <script src="/vendors/Flot/jquery.flot.time.js"></script>
      <script src="/vendors/Flot/jquery.flot.stack.js"></script>
      <script src="/vendors/Flot/jquery.flot.resize.js"></script>

      <!-- Flot plugins -->
      <script src="/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
      <script src="/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
      <script src="/vendors/flot.curvedlines/curvedLines.js"></script>
      <!-- DateJS -->
      <script src="/vendors/DateJS/build/date.js"></script>
      <!-- JQVMap -->
      <script src="/vendors/jqvmap/dist/jquery.vmap.js"></script>
      <script src="/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
      <script src="/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
      <!-- bootstrap-daterangepicker -->
      <script src="/vendors/moment/min/moment.min.js"></script>
      <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

      <!-- Custom Theme Scripts -->
      <script src="/build/js/custom.min.js"></script>    
      @yield('script')

    </body>
  </html>
</html>
