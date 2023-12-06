@extends('adminlte::page')

@section('title', 'Register ADD')

@section('content_header')
    <h4>Dashboard | Registro de usuarios</h4>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-lg-10 col-sm-12 col-md-10">
            <!--Metodo para alertas -> propia de ADMIN LTE, al crearse una sesión se mostrará el mensaje.-->
            @php
                if(session()){
                    if(session('message')=='ok'){
                        echo '
                            <x-adminlte-alert theme="secondary" icon="" title="Secondary Notification">
                                El registro a sido registrado con éxito!
                            </x-adminlte-alert>
                        ';
                    }
                }
            @endphp
            <!--end codigo-->
            <form action="/client" method="POST">
                @csrf
                <div class="card-header">
                    <p>Formulario de registro de cliente</p>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="label-control">DNI</label>
                        <input type="text" name="dni" id="dni" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label-control">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label-control">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label-control">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label-control">Telefono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" max="9">
                    </div>
                    <div class="form-group">
                        <label for="" class="label-control">Direccion</label>
                        <input type="text" name="direccion" id="direccion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label-control">Estado</label>
                        <select name="estado" id="estado" class="border">
                            <option value="">Seleccionar estado</option>
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="Divorciado">Divorciado</option>
                            <option value="Viudo">Viudo</option>
                        </select>
                        <!--<input type="text" name="estado" id="estado" class="form-control">-->
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <p>¿Desea guardar datos del cliente?</p>
                    <button type="submit" name="guardar" class="ml-2 border btn btn-outline-success">Guardar</button>
                    <button type="button" name="cancelar" class="ml-2 border btn btn-outline-danger">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!--Estilos CSS-->
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body{
            max-height: 100vh;
            height: 100vh;
        }
        .card-header{
            background-color: #FF6479 !important;
        }
        .card-body{
            background-color: #FFE1E3 !important;
        }
        .card-footer{
            background-color: #FFC8CE !important;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
