@extends('admin.panel')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Editar Usuario</h1>
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




        {!! Form::open(['route' => ['admin.users.update',$user], 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name',$user->name,['class' =>'form-control', 'placeholder' =>'Nombre Completo','required'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('email','Correo electrónico') !!}
            {!! Form::email('email',$user->email,['class' =>'form-control', 'placeholder' =>'example@gmail.com','required'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('password','Contraseña') !!}
            {!! Form::password('password',['class' =>'form-control', 'placeholder' =>'Minimo 6 caracteres','required'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('password_confirmation','Confirmar contraseña') !!}
            {!! Form::password('password_confirmation',['class' =>'form-control', 'placeholder' =>'Confirmar contraseña anterior','required'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('role','Tipo de usuario') !!}
            {!! Form:: select('role',['class'=>'Seleccione tipo de usuario','Administrador'=>'Administrador','Editor'=>'Editor','Miembro' => 'Miembro'  ,'Auditor' => 'Auditor'],$user->role, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('estado','Estado') !!}
            {!! Form:: select('estado',['class'=>'Seleccione tipo de estado','Activado'=>'Activado','Desacivado'=>'Desacivado'],$user->estado, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Actualizar', ['class' =>'btn btn-primary']) !!}

        </div>


        {!! Form::close() !!}

    </div>
@endsection