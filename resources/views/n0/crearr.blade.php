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

</div>
<div class="col-lg-12">
    <h1>Simple Sidebar</h1>
    <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
    <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
</div>



@endsection