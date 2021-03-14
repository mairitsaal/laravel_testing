<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/svg" href="../svg/heart.svg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css" rel="stylesheet" />

    <link href="../assets/css/admin.css?<?php echo time(); ?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.min.css" />
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">


    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js" ></script>

    <!-- FontAwesome for collapse-->
    <script src="https://kit.fontawesome.com/a8018f10c4.js" crossorigin="anonymous"></script>
    <script src="bootstrap-validate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->


    <meta name="csrf-token" content="{{ csrf_token() }}"/>


</head>

<body class="">


<div class="wrapper" >
    <div class="sidebar" data-color="red">
        <div class="logo">

            <a href="/dashboard" class="simple-text logo-normal" style="text-align: center; font-size: 1.2em;">
                Praktika korraldus
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

                <!--Kasutajad-->
                <li class="{{ 'role-register' == request()->path() ? 'active' : ''}}">
                    <a href="/role-register">
                        <i class="now-ui-icons users_single-02"></i>
                        <p style="font-size: 14px;">Kasutajad</p>
                    </a>
                </li>

                <!--Practice Bases-->
                <li>
                    <a data-toggle="collapse" href="#practiceBases" type="button" class="btn btn-success">
                        <!--<i class="now-ui-icons design_bullet-list-67"></i>-->
                        <p style="font-size: 14px; text-align: center;">
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
                                    <span class="sidebar-normal" style="font-size: 12px;">Baas + üksus</span>
                                </a>
                            </li>
                            <li class="{{ 'add-dep-to-unit' == request()->path() ? 'active' : ''}}">
                                <a href="/add-dep-to-unit">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;">Üksus + osakond</span>
                                </a>
                            </li>
                            <li class="{{ 'add-unit-dep-to-base' == request()->path() ? 'active' : ''}}">
                                <a href="/baseUnitsDeps">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Lisa alamüksused </span>
                                </a>
                            </li>
                            <li class="{{ 'dynamic-dropdown' == request()->path() ? 'active' : ''}}">
                                <a href="/dynamic-dropdown">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> dynamic-dropdown </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--Practice Units-->
                <li>
                    <a data-toggle="collapse" href="#practiceUnits" type="button" class="btn btn-success">

                        <!--<i class="now-ui-icons design_bullet-list-67"></i>-->

                        <p style="font-size: 14px; text-align: center;">
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
                        </ul>
                    </div>
                </li>

                <!--Practice Departments-->
                <li  >
                    <a data-toggle="collapse" href="#practiceDepartment" type="button" class="btn btn-success">

                        <!--<i class="now-ui-icons design_bullet-list-67"></i>-->

                        <p style="font-size: 14px; text-align: center;">
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



                <!--speciality-->
                <li >
                    <a data-toggle="collapse" href="#speciality" type="button" class="btn btn-warning">

                        <!-- <i class="now-ui-icons design_bullet-list-67"></i>-->

                        <p style="font-size: 14px; text-align: center;">
                            Erialad <b class="caret"></b>
                        </p>
                    </a>

                    <div id="speciality" class="collapse">
                        <ul class="nav navbarDropdown">
                            <li class="{{ 'specialities' == request()->path() ? 'active' : ''}}">
                                <a href="/specialities">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal align-center" style="font-size: 12px;">Kõik erialad </span>
                                </a>
                            </li>
                            <li class="{{ 'add-speciality' == request()->path() ? 'active' : ''}}">
                                <a href="/add-speciality">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Lisa uus eriala </span>
                                </a>
                            </li>
                            <li class="{{ 'specialityCourses' == request()->path() ? 'active' : ''}}">
                                <a href="/specialityCourses">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> eriala + kursus </span>
                                </a>
                            </li>
                            <li class="{{ 'dropdown' == request()->path() ? 'active' : ''}}">
                                <a href="/dropdown">

                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> dynamic-dropdown </span>
                                </a>

                            </li>
                        </ul>
                    </div>
                </li>
                <!--Course-->
                <li >
                    <a data-toggle="collapse" href="#course" type="button" class="btn btn-warning">

                        <!-- <i class="now-ui-icons design_bullet-list-67"></i>-->

                        <p style="font-size: 14px; text-align: center;">
                            Kursused <b class="caret"></b>
                        </p>
                    </a>

                    <div id="course" class="collapse">
                        <ul class="nav navbarDropdown">
                            <li class="{{ 'courses' == request()->path() ? 'active' : ''}}">
                                <a href="/courses">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal align-center" style="font-size: 12px;">Kursused</span>
                                </a>
                            </li>
                            <li class="{{ 'add-course' == request()->path() ? 'active' : ''}}">
                                <a href="/add-course">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Lisa uus kursus</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--Requirements-->
                <li >
                    <a data-toggle="collapse" href="#requirement" type="button" class="btn btn-warning">

                        <!-- <i class="now-ui-icons design_bullet-list-67"></i>-->

                        <p style="font-size: 14px; text-align: center;">
                            Praktikanõuded <b class="caret"></b>
                        </p>
                    </a>

                    <div id="requirement" class="collapse">
                        <ul class="nav navbarDropdown">
                            <li class="{{ 'requirement' == request()->path() ? 'active' : ''}}">
                                <a href="/practiceReqs">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal align-center" style="font-size: 12px;">Praktikanõuded</span>
                                </a>
                            </li>
                            <li class="{{ 'add-practice-requirement' == request()->path() ? 'active' : ''}}">
                                <a href="/add-practice-requirement">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Lisa praktikanõue</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <!--speciality-->
                <li >
                    <a data-toggle="collapse" href="#practiceGroup" type="button" class="btn btn-info">

                        <!-- <i class="now-ui-icons design_bullet-list-67"></i>-->

                        <p style="font-size: 14px; text-align: center;">
                            Praktikagrupid <b class="caret"></b>
                        </p>
                    </a>

                    <div id="practiceGroup" class="collapse">
                        <ul class="nav navbarDropdown">
                            <li class="{{ 'practiceGroups' == request()->path() ? 'active' : ''}}">
                                <a href="/practiceGroups">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal align-center" style="font-size: 12px;">Praktika grupid</span>
                                </a>
                            </li>
                            <li class="{{ 'add-practice-group' == request()->path() ? 'active' : ''}}">
                                <a href="/add-practice-group">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Lisa praktika grupp</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li >
                    <a data-toggle="collapse" href="#practiceDistribution" type="button" class="btn btn-info">

                        <!-- <i class="now-ui-icons design_bullet-list-67"></i>-->

                        <p style="font-size: 14px; text-align: center;">
                            Pr. kohtade jaotus <b class="caret"></b>
                        </p>
                    </a>

                    <div id="practiceDistribution" class="collapse">
                        <ul class="nav navbarDropdown">
                            <li class="{{ 'practiceDistributions' == request()->path() ? 'active' : ''}}">
                                <a href="/practiceDistributions">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal align-center" style="font-size: 12px;"> Pr.kohtade jaotus</span>
                                </a>
                            </li>
                            <li class="{{ 'add-practice-instructor' == request()->path() ? 'active' : ''}}">
                                <a href="/add-practice-distribution">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Lisa uus jaotus</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li >
                    <a data-toggle="collapse" href="#practice" type="button" class="btn btn-info">

                        <!-- <i class="now-ui-icons design_bullet-list-67"></i>-->

                        <p style="font-size: 14px; text-align: center;">
                            Praktika <b class="caret"></b>
                        </p>
                    </a>

                    <div id="practice" class="collapse">
                        <ul class="nav navbarDropdown">
                            <li class="{{ 'practices' == request()->path() ? 'active' : ''}}">
                                <a href="/practices">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal align-center" style="font-size: 12px;">Kõik praktikad</span>
                                </a>
                            </li>
                            <li class="{{ 'add-practice' == request()->path() ? 'active' : ''}}">
                                <a href="/add-practice">
                                    <span class="sidebar-mini-icon ml-5"></span>
                                    <span class="sidebar-normal" style="font-size: 12px;"> Lisa praktika</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--Example-->



            </ul>
        </div>
    </div>
    <!--End of Sidebar-->

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
                    <a class="navbar-brand" href="#pablo">

                        <div class="logo">
                            <a href="/dashboard" class="simple-text logo-mini">
                                <img src="/svg/heartWhite.svg" style="width: 50px;">
                            </a>
                        </div>

                    </a>
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

</div>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>

<script type="text/javascript" charset="utf8" src="../assets/js/dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>



<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- dropdownlist-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>




<!-- Chart JS -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->


<script  type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <!--  jQuery -->

    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script type="text/javascript">
    $(document).ready( function ()
    {
        $('#dataTable').DataTable( {
            //"scrollX": true,
            "language": {
                "paginate": {
                    "first": "Esimene",
                    "last": "Viimane",
                    "previous": "Eelmine",
                    "next": "Järgmine"
                },
                "search": "Otsi",
                "lengthMenu": "Näita _MENU_ rida",
                "info": "Näitab ridu _START_ kuni _END_, kokku tabelis _TOTAL_ rida"
            }
        });
    } );
</script>


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
<script type="text/javascript">
    $(document).ready(function () {

        $('#master').on('click', function(e) {
            if($(this).is(':checked',true))
            {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked',false);
            }
        });

        $('.delete_all').on('click', function(e) {

            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <=0)
            {
                alert("Palun vali read.");
            }  else {

                var check = confirm("Oled sa kindel, et soovid valitud ridu kustutada?");
                if(check == true){

                    var join_selected_values = allVals.join(",");

                    $.ajax({
                        url: $(this).data('url'),
                        type: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });

                    $.each(allVals, function( index, value ) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
        });

        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });

        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();

            $.ajax({
                url: ele.href,
                type: 'GET',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });

            return false;
        });
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="speciality"]').on('change', function() {
            var speciality_id = $(this).val();
            if(speciality_id) {
                $.ajax({
                    url: '/course/'+speciality_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="course_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="course_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="course_id"]').empty();
            }
        });
    });
</script>




@yield('scripts')

</body>

</html>
