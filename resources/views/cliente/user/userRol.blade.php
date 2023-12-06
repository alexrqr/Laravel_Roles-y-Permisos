@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administración de usuarios</h1>
    <p>Intefaz para asignación de roles a los usuarios</p>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-lg-8 col-md-12 col-sm-12">
                <div class="card-header">
                    <h2>{{$user->name}}</h2>
                </div>
                <div class="card-body">
                    <h5>Lista de permisos</h5>
                    {!! Form::model($user, ['route'=>['users.update', $user->id], 'method'=>'put']) !!}
                        @foreach ($roles as $role)
                            <div>
                                <label>
                                    <!--Con este codigo se puede mostrar el permiso que ha sido asignado a un rol-->
                                    {!! Form::checkbox('roles[]', $role->id, $user->hasAnyRole($role->id) ? : false, ['class'=>'mr-1']) !!}
                                    {{$role->name }}
                                </label>
                            </div>
                        @endforeach
                        {!! Form::submit('Asinar roles', ['class'=>'btn btn-outline-primary mt-3']) !!}
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
