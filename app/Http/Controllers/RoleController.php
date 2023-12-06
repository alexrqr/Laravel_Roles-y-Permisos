<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        //
        $roles = Role::all();
        return view('cliente.user.roles', compact('roles'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
        $role = Role::create(['name' => $request->input('nombre')]);

        return back();

    }
    public function show(string $id)
    {
        //
    }
    public function edit(Role $role)
    {
        //La misma vista se utilizará para editar los roles y permisos

        //$role = Role::find( $id );//prueba return $role;
        //para ver los permisos
        $permiso = Permission::all();

        return view('cliente.user.rolepermiso', compact('role', 'permiso'));
    }
    public function update(Request $request, Role $role)
    {
        //lógica para asignar permisos a un rol-
        //este metodo permite sincronizar los permisos con los roles
        $role->permissions()->sync($request->permiso);

        return redirect()->route('roles.edit', $role);
    }
    public function destroy(string $id)
    {
        //
    }
}
