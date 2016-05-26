@extends('auditor.panel')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Editar Recibo</h1>
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



        {!! Form::open(['route' =>[ 'admin.recibo.update',$recibo], 'method' => 'PUT']) !!}
        <div>
            {!! Form::label('cod','Codigo') !!}
            {!! Form::text('cod',$recibo->cod,['class' =>'form-control', 'placeholder' =>'Ingrese un codigo','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('fac','N° Factura') !!}
            {!! Form::text('fac',$recibo->fac,['class' =>'form-control', 'placeholder' =>'Ingrese un numero de factura','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('val','Valor') !!}
            {!! Form::text('val',$recibo->val,['class' =>'form-control', 'placeholder' =>'Ingrese un valor','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('desc','Descripcion') !!}
            {!! Form::text('desc',$recibo->desc,['class' =>'form-control', 'placeholder' =>'Ingrese una descripcion','required'])!!}
        </div>


        <div class="form-group">
            {!! Form::submit('Actualizar', ['class' =>'btn btn-primary']) !!}

        </div>


        {!! Form::close() !!}
    </div>
@endsection