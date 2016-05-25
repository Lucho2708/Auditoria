@extends('admin.panel')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Logs</h1>
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

                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Accion</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>


                        </tr>
                        </thead>
                        <tbody>

                        <tr class="odd gradeX">
                            @foreach($logs as $log)

                                <td>{{$log->usuario}}</td>
                                <td>{{$log->email}}</td>
                                <td>{{$log->role}}</td>
                                <td>{{$log->accion}}</td>
                                <td>{{$log->descripcion}}</td>
                                <td>{{$log->date_time}}</td>

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
