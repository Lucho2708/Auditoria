@extends('index')

@section('panel')
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Auditoria
                    </a>
                </li>
                <li>
                    <a href="#">Consultas</a>
                </li>
                <li>
                    <a href="#">Registros</a>
                </li>
                <li>
                    <a href="#">Log Historico</a>
                </li>
                <li>
                    <a href="#">Crear Usuarios</a>
                </li>
            </ul>
        </div>
        @yield('contenido0')

    </div>



@endsection