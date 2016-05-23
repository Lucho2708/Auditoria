@extends('member.panel')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Crear Usuario</h1>
            </div>
            <div class="col-lg-12">
                @if(count($errors)>0)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                @endif
            </div>
            <!-- /.col-lg-12 -->
        </div>




        {!! Form::open(['route' => 'member.users.store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo','required'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('email','Correo electrónico') !!}
            {!! Form::email('email',null,['class' =>'form-control', 'placeholder' =>'example@example.com','required'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('password','Contraseña') !!}
            {!! Form::password('password',['class' =>'form-control', 'placeholder' =>'Minimo 6 caracteres','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation','Confirmar contraseña') !!}
            {!! Form::password('password_confirmation',['class' =>'form-control', 'placeholder' =>'Confirmar contraseña anterior','required'])!!}
        </div>
        <div class="form-group"
            {!! Form::label('role','Tipo de usuario') !!}
            {!! Form:: select('role',['class'=>'Seleccione tipo de usuario','member' => 'Miembro'],null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Registrar', ['class' =>'btn btn-primary']) !!}

        </div>


        {!! Form::close() !!}

    </div>
@endsection