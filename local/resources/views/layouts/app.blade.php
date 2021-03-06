<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ivoire Depannage Express</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/components-font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">
    
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/iCheck/skins/flat/_all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <style>
    canvas{
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}</style>
    @yield('css')
    
</head>

<body class="skin-green sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
            <b>IDE</b>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('./images/logo.png') }}"
                                 class="user-image" alt="User Image"/>
                            <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{ asset('./images/logo.png') }}"
                                     class="img-circle" alt="User Image" style="background: #fff;"/>
                                <p>
                                    {!! Auth::user()->name !!}
                                    <small>Derni??re connexion {!! Auth::user()->updated_at->format('M. Y') !!}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <!-- <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Mon compte</a>
                                </div> -->
                                <div class="pull-right">
                                    <a href="{!! url('/logout') !!}" class="btn btn-danger btn-flat"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Deconnexion
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="full-content">
        <?php
            if(!isset($_GET['archives'])) {
                ?>
                @yield('content')
                <?php
            }
            else{
                ?>
                 @yield('archives')
                <?php
            }
        ?>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer" style="max-height: 100px;text-align: center">
        <strong>Copyright ?? 2018 <a href="http://infyom.com" target="_blank">Ivoire Depannage Express</a>.</strong>
    </footer>

</div>


<!-- jQuery 3.1.1 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('bower_components/iCheck/icheck.min.js')}}"></script>
<script src="{{ asset('bower_components/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/app.min.js') }}"></script>

@yield('scripts')
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue',
            increaseArea: '20%' // optional
        });
        $('select').select2();
        $(".table:not('.criteria')").DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : false,
            'language': {
                'search':'Recherche',
                "lengthMenu": "Afficher _MENU_ lignes par page",
                "zeroRecords": "Aucun r??sultat - D??sol??",
                "info": "Actuellement ?? la page _PAGE_ sur _PAGES_",
                "infoEmpty": "Aucun ??l??ment",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "first":      "D??but",
                    "last":       "Fin",
                    "next":       "Suivant",
                    "previous":   "Pr??c??dent"
                },
                "aria": {
                    "sortAscending":  ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            }
        })
    });
</script>
</body>
</html>