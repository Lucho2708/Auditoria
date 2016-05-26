@extends('admin.panel')

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




        {!! Form::open(['route' => 'admin.recibo.store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('cod','Codigo') !!}
            {!! Form::text('cod',null,['class' =>'form-control', 'placeholder' =>'Ingrese un codigo','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('fac','N° Factura') !!}
            {!! Form::number('fac',null,['class' =>'form-control', 'placeholder' =>'Ingrese un numero de factura','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('val','Valor') !!}
            {!! Form::text('val',null,['class' =>'form-control', 'placeholder' =>'Ingrese un valor','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('desc','Descripcion') !!}
            {!! Form::text('desc',null,['class' =>'form-control', 'placeholder' =>'Ingrese una descripcion','required'])



            !!}
        </div>
        <div>

        </div>


        <div class="form-group">
            {!! Form::submit('Registrar', ['class' =>'btn btn-primary']) !!}

        </div>


        {!! Form::close() !!}

    </div>
@endsection
@section('scripts')

    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
