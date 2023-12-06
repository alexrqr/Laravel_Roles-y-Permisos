@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Gestion de roles y permisos</h1>
    <p>Asignación de permisos a roles</p>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-lg-8 col-md-12 col-sm-12">
                <div class="card-header">
                    <h2>{{$role->name}}</h2>
                </div>
                <div class="card-body">
                    <h5>Lista de permisos</h5>
                    {!! Form::model($role, ['route'=>['roles.update', $role->id], 'method'=>'put']) !!}
                        @foreach ($permiso as $permision)
                            <div>
                                <label>
                                    <!--Con este codigo se puede mostrar el permiso que ha sido asignado a un rol-->
                                    {!! Form::checkbox('permiso[]', $permision->id, $role->hasPermissionTo($permision->id) ? : false, ['class'=>'mr-1']) !!}
                                    {{$permision->name }}
                                </label>
                            </div>
                        @endforeach
                        {!! Form::submit('Asinar permisos', ['class'=>'btn btn-outline-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
