<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">-->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css" rel="stylesheet" />

    <link href="../assets/css/admin.css?<?php echo time(); ?>" rel="stylesheet" />
    <link href="../assets/css/dataTables.min.css?<?php echo time(); ?>" rel="stylesheet" />


    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js" ></script>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a8018f10c4.js" crossorigin="anonymous"></script>
    <script src="bootstrap-validate.js"></script>

    <!--Style
    <link rel="stylesheet" type="text/css" href="/css/app.css?<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/dataTables.min.css') }}"/>-->

</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="red">
        <div class="logo">
            <a href="/dashboard" class="simple-text logo-mini">
                <img src="/svg/heartWhite.svg">
            </a>
            <a href="/dashboard" class="simple-text logo-normal">
                Praktika
            </a>
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li class="{{ 'dashboard' == request()->path() ? 'active' : ''}}">
                    <a href="/dashboard">
                        <i class="now-ui-icons design_app"></i>
                        <p style="font-size: 14px;">Infolaud</p>
                    </a>
                </li>

                <li>
                    <a href="notifications.html">
                        <i class="now-ui-icons ui-1_bell-53"></i>
                        <p style="font-size: 14px;">Teated</p>
                    </a>
                </li>
                <li class="{{ 'role-register' == request()->path() ? 'active' : ''}}">
                    <a href="/role-register">
                        <i class="now-ui-icons users_single-02"></i>
                        <p style="font-size: 14px;">Kasutajad</p>
                    </a>
                </li>

                <!--Practice Bases-->
                <li>
                    <a data-toggle="collapse" href="#practiceBases" >
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p style="font-size: 14px;">
                            Praktikabaas <b class="caret"></b>
                        </p>
                    </a>
                    <!--Praktikabaasid list-->
                    <div id="practiceBases" class="collapse">
                        <ul class="nav">
                            <li class="{{ 'practiceBases' == request()->path() ? 'active' : ''}}">
                                <a href="/practiceBases">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Praktikabaasid </span>
                                </a>

                            </li>

                            <li class="{{ 'add-practice-base' == request()->path() ? 'active' : ''}}">
                                <a href="/add-practice-base">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Lisa praktikabaas </span>
                                </a>
                            </li>

                            <li class="{{ 'add-unit-to-base' == request()->path() ? 'active' : ''}}">
                                <a href="/add-unit-to-base">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;">baas + üksus </span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </li>
                <!--Practice Units-->
                <li  >
                    <a data-toggle="collapse" href="#practiceUnits">

                        <i class="now-ui-icons design_bullet-list-67"></i>

                        <p style="font-size: 14px;">
                            Praktikaüksus <b class="caret"></b>
                        </p>
                    </a>

                    <div id="practiceUnits" class="collapse" >
                        <ul class="nav" >
                            <li class="{{ 'practiceUnits' == request()->path() ? 'active' : ''}}">
                                <a href="/practiceUnits">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal align-center" style="font-size: 12px;"> Praktikaüksused </span>
                                </a>
                            </li>
                            <li class="{{ 'add-practice-unit' == request()->path() ? 'active' : ''}}">
                                <a href="/add-practice-unit">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Lisa praktikaüksus </span>
                                </a>
                            </li>
                            <li class="{{ 'add-department-to-unit' == request()->path() ? 'active' : ''}}">
                                <a href="/add-department-to-unit">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Lisa praktikaosakond </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--Practice Departments-->
                <li  >
                    <a data-toggle="collapse" href="#practiceDepartment">

                        <i class="now-ui-icons design_bullet-list-67"></i>

                        <p style="font-size: 14px;">
                            Praktika osakond <b class="caret"></b>
                        </p>
                    </a>

                    <div id="practiceDepartment" class="collapse">
                        <ul class="nav">
                            <li class="{{ 'practiceDepartment' == request()->path() ? 'active' : ''}}">
                                <a href="/practiceDepartments">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal align-center" style="font-size: 12px;"> Praktika osakonnad </span>
                                </a>
                            </li>
                            <li class="{{ 'add-practice-department' == request()->path() ? 'active' : ''}}">
                                <a href="/add-practice-department">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Lisa praktika osakond </span>
                                </a>
                            </li>
                            <li class="{{ 'add-department-to-unit' == request()->path() ? 'active' : ''}}">
                                <a href="/add-department-to-unit">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Üksus + osakond </span>
                                </a>
                            </li>
                            <li class="{{ 'add-practice-instructor-to-department' == request()->path() ? 'active' : ''}}">
                                <a href="/add-practice-instructor-to-department">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Osakond + pr.juh </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--Practice Instructor-->
                <li  >
                    <a data-toggle="collapse" href="#practiceInstructor">

                        <i class="now-ui-icons design_bullet-list-67"></i>

                        <p style="font-size: 14px;">
                            Praktikajuhendaja <b class="caret"></b>
                        </p>
                    </a>

                    <div id="practiceInstructor" class="collapse">
                        <ul class="nav ">
                            <li class="{{ 'practiceInstructors' == request()->path() ? 'active' : ''}}">
                                <a href="/practiceInstructors">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal align-center" style="font-size: 12px;"> Praktika juhendajad </span>
                                </a>
                            </li>
                            <li class="{{ 'add-practice-instructor' == request()->path() ? 'active' : ''}}">
                                <a href="/add-practice-instructor">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Lisa praktika juhendaja </span>
                                </a>
                            </li>
                            <li class="{{ 'add-practice-instructor-to-base' == request()->path() ? 'active' : ''}}">
                                <a href="/add-practice-instructor-to-base">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;">baas + pr.juhe </span>
                                </a>
                            </li>
                            <li class="{{ 'add-instructor-to-unit' == request()->path() ? 'active' : ''}}">
                                <a href="/add-instructor-to-unit">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> pr.juh + osakond </span>
                                </a>
                            </li>
                            <li class="{{ 'add-practice-instructor-to-department' == request()->path() ? 'active' : ''}}">
                                <a href="/add-practice-instructor-to-department">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Osakond + pr.juh </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#pablo">Tabelid</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form>
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </div>
                            </div>
                        </div>
                    </form>

                        <!-- New logout from home.blade.php-->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        <!--Old navbar
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons location_world"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Some Actions</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="#pablo">
                                <i class="now-ui-icons users_single-02"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Account</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->



        <div class="panel-header panel-header-sm">
        </div>
        <div class="content">

            @yield('content')

        </div>

</div>

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/dataTables.min.js"></script>



<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->


    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <!--Js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            var date_input=$('input[name="lepinguAlgus"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            var date_input=$('input[name="lepinguLopp"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            var options={
                format: 'yyyy/mm/dd',
                container: container,
                todayHighlight: true,
                autoclose: true
            };
            date_input.datepicker(options).change(dateChanged).on('changeDate', dateChanged);
            function dateChanged(ev) {
                var $this = $(this);
                $this.datepicker('hide');
                var now = new Date();
                var today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
                var selectedDate = Date.parse($this.val());
                if (selectedDate < today) {
                    $this.attr('disabled', true);
                } else {
                    $this.removeAttr('disabled');
                }
            }

        })
    </script>



@yield('scripts')
</body>

</html>
