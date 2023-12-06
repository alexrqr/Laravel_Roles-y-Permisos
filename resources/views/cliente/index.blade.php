@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard | Lista de clientes</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-lg-10 col-ms-12 col-md-12">
                <!--Se muestran los datos de la base de datos como tal
                {{$clientes}}
                -->
                <div class="card-body">
                    <table id="list-clients" class="table table-striped shadow-lg" width:"100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DNI</th>
                                <th>AAPELLIDO</th>
                                <th>NOMBRE</th>
                                <th>EMAIL</th>
                                <th>TELEFONO</th>
                                <th>DIRECCION</th>
                                <th>ESTADO</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->dni}}</td>
                                <td>{{$data->apellido}}</td>
                                <td>{{$data->nombre}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->telefono}}</td>
                                <td>{{$data->direccion}}</td>
                                <td>{{$data->estado}}</td>
                                <td>
                                    <!--Limita a que solo el rol mencionado acceda a ciertas funcionalidades--->

                                        <form action="{{ route('cliente.destroy', $data->id) }}" method="POST" class="formEliminar">
                                            <a href="{{ route('cliente.edit', $data->id) }}" class="btn btn-outline-secondary">EDIT</a>

                                            @can('Administrar configuracion')
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">DELETE</button>
                                            @endcan

                                        </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

     {{-- CDN DataTables Responsive --}}
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
     <link rel="stylesheet" type="text/css"
     href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />

    {{--Estilos para el select de cantidad de registros--}}
    <style>
        .dataTables_length select {
            padding: 0px 20px;
            margin: 10px;
        }
    </style>
@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#list-clients').DataTable({
                responsive: true,
                autoWidth: false,
                "bDestroy": true,
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                "language": {
                    "zeroRecords": "No se encontraron registros",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtro de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "lengthMenu": "Mostrar _MENU_ registros por página"

                }
            });
        });
    </script>

    <script>
        // Código para mostrar alerta antes de eliminar un registro
        $(document).ready(function(){
            $('.formEliminar').submit(function(e){
                e.preventDefault();

                // Capturamos la referencia al formulario actual
                var form = this;

                // Mostramos la alerta de confirmación
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "No podrás recuperar el registro!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si el usuario confirma, enviamos el formulario
                        form.submit();
                    }
                });
            });
        });
    </script>


@stop
