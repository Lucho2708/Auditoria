@extends('index')

@section('panel')
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="#"><i class="fa fa-dashboard fa-fw"></i> {{ Auth::user()->name}} - {{ Auth::user()->role }}</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-pencil fa-fw"></i>Recibos<span class="fa arrow"></span></a></a>

                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('auditor.recibo.index')}}">Listar Recibos</a>
                    </li>
                    <li>
                        <a href="{{route('auditor.recibo.create')}}">Crear Recibo</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href=""><i class="fa fa-user fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('auditor.users.index')}}">Listar Usuarios</a>
                    </li>
                    <li>
                        <a href="{{route('auditor.users.create')}}">Crear Usuario</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-file"></i> Logs Historicos </a>
            </li>

        </ul>
    </div>


@endsection