@extends('n0.panel')

@section('contenido0')

    <div class="table-scrol">
        <h1 align="center">INGRESAR XXXXX</h1>
        <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
            <div class="row"><!-- row class is used for grid system in Bootstrap-->
                <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
                    <div class="login-panel panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"></h3>
                        </div>
                        <div class="panel-body">
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

                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="register" >
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection