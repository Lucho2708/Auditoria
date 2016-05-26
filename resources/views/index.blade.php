<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Soft - Auditor</title>

    <!-- Bootstrap Core CSS -->

    {!! Html::style('../bower_components/bootstrap/dist/css/bootstrap.min.css') !!}



    <!-- MetisMenu CSS -->
    {!! Html::style('../bower_components/metisMenu/dist/metisMenu.min.css')!!}


            <!-- DataTables CSS -->
    {!! Html::style('../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')!!}


    <!-- DataTables Responsive CSS -->
    {!! Html::style('../bower_components/datatables-responsive/css/dataTables.responsive.css')!!}



<!-- Timeline CSS -->
    {!! Html::style('../css/timeline.css')!!}


<!-- Custom CSS -->
    {!! Html::style('../dist/css/sb-admin-2.css')!!}



<!-- Morris Charts CSS -->
    {!! Html::style('../bower_components/morrisjs/morris.css')!!}



<!-- Custom Fonts -->
    {!! Html::style('../bower_components/font-awesome/css/font-awesome.min.css')!!}



<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>

    {!! Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') !!}

    {!! Html::script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') !!}

<![endif]-->

</head>
<body>
<div id="wrapper">
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Soft - Auditor</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">


        <!-- /.dropdown -->


        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>


            <ul class="dropdown-menu dropdown-user">
                @if (Auth::guest())

                    <li><a href="{{route('login')}}"><i class="fa fa-user fa-fw"></i>Iniciar Sesión</a></li>
                @else
                    <li><a href=""><i class="fa fa-user fa-fw"></i>Perfil</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i>Configuración</a>
                    </li>
                    <li><a href="#"><i class="fa  fa-life-saver fa-fw"></i>Ayuda</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
                    </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        @yield('panel')
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
    @endif
</nav>

</div>

@yield('content')


    <!-- jQuery -->
{!! Html::script('../bower_components/jquery/dist/jquery.min.js') !!}


<!-- Bootstrap Core JavaScript -->
{!! Html::script('../bower_components/bootstrap/dist/js/bootstrap.min.js') !!}


<!-- Metis Menu Plugin JavaScript -->
{!! Html::script('../bower_components/metisMenu/dist/metisMenu.min.js') !!}


{!! Html::script('../bower_components/datatables/media/js/jquery.dataTables.min.js') !!}

{!! Html::script('../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') !!}




<!-- Flot Charts JavaScript -->
{!! Html::script('../bower_components/flot/excanvas.min.js') !!}

{!! Html::script('../bower_components/flot/jquery.flot.js') !!}

{!! Html::script('../bower_components/flot/jquery.flot.pie.js') !!}

{!! Html::script('../bower_components/flot/jquery.flot.resize.js') !!}

{!! Html::script('../bower_components/flot/jquery.flot.time.js') !!}

{!! Html::script('../bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js') !!}

{!! Html::script('../js/flot-data.js') !!}



<!-- Custom Theme JavaScript -->
{!! Html::script('../dist/js/sb-admin-2.js') !!}

        <!-- Custom Acconting -->
{!! Html::script('../accounting.js') !!}
{!! Html::script('../js/accounting.min.js') !!}




@yield('scripts')
</body>
</html>