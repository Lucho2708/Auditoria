@extends('admin.panel')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Usuarios</h1>
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
                            <th>Nombres</th>
                            <th>E-mail</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Accion</th>

                        </tr>
                        </thead>
                        <tbody>

                            <tr class="odd gradeX">
                                @foreach($users as $user)
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{$user->estado}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{route('admin.users.edit', $user->id)}}" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a class="btn btn-danger" href="{{route('admin.users.destroy',$user->id)}}" onclick="return confirm('Quiere borrar el resgitro de {{$user->name}}  ?') " , role="button"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
