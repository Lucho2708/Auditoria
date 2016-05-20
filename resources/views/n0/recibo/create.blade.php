@extends('n0.panel')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Crear Recibo</h1>
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




        {!! Form::open(['route' => 'auditor.recibo.store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('cod','Nombre') !!}
            {!! Form::text('cod',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('fac','Nombre') !!}
            {!! Form::text('fac',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('val','Nombre') !!}
            {!! Form::text('val',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('desc','Nombre') !!}
            {!! Form::text('desc',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo','required'])!!}
        </div>


        <div class="form-group">
            {!! Form::submit('Registrar', ['class' =>'btn btn-primary']) !!}

        </div>


        {!! Form::close() !!}

    </div>
@endsection