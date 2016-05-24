@extends('auditor.panel')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Recibos</h1>
            </div>

            <div class="panel-body">
                <div class="col-lg-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{Session::get('message')}}
                        </div>

                    @endif
                </div>


                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Codigo</th>
                            <th>Factura</th>
                            <th>Valor</th>
                            <th>Descripcion</th>
                            <th>Accionesr</th>

                        </tr>
                        </thead>
                        <tbody>

                            <tr class="odd gradeX">
                                @foreach($recibos as $recibo)
                                   <td>{{$recibo->id}}</td>
                                    <td>{{$recibo->cod}}</td>
                                    <td>{{$recibo->fac}}</td>
                                    <td>{{$recibo->val}}</td>
                                    <td>{{$recibo->desc}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{route('admin.recibo.edit', $recibo->id)}}" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a class="btn btn-danger" href="{{route('admin.recibo.destroy',$recibo->id)}}" onclick="return confirm('Quiere borrar el resgitro de {{$recibo->id}}  ?') " , role="button"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
        </div>
        </div>
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
