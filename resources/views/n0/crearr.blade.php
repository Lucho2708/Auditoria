@extends('n0.panel')

@section('contenido0')

    <div class="col-lg-12">

            <h1 align="center">REGISTRAR xxxxx</h1>

        <form role="form" method="post" action="#">
            <fieldset>

                <div class="form-group">
                    <input class="form-control" placeholder=" No. Documento De Identidad" name="documento" type="text" autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Nombres" name="nombre" type="text" autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Apellidos" name="apellido" type="text" autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Usuario" name="usuario" type="text" autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Contraseña" name="pass1" type="password" value="">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Confirmar Contraseña" name="pass2" type="password" value="">
                </div>


                <input class="btn btn-lg btn-success btn-block" type="submit" value="REGISTRAR" name="register" >
            </fieldset>
        </form>
    </div>


@endsection