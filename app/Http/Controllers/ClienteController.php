<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //lista de los todos los registros
        $clientes = Client::all();

        return view("cliente.index", compact("clientes"));
        /* Se puede usar compact o with
        return view("cliente.index")->with('clientes', $clientes);
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("cliente.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validación de los datos ingresados
        $validacion = $request->validate([
            'dni'=>'required|numeric|unique:clients,dni|min:8',
            'apellido'=>'required|string|max:75',
            'nombre'=>'required|string|max:75',
            'email'=>'required|email|unique:clients,email|max:75',
            'telefono'=>'required|numeric|min:9',
        ]);

        //Metodo donde se recogen los datos
        $cliente = new Client();
        $cliente-> dni = $request->input("dni");
        $cliente-> apellido = $request->input("apellido");
        $cliente-> nombre = $request->input("nombre");
        $cliente-> email = $request->input("email");
        $cliente-> telefono = $request->input("telefono");
        $cliente-> direccion = $request->input("direccion");
        $cliente-> estado = $request->input("estado");

        $cliente -> save();

        //ruta de redirección
        return back()->with('message','ok');
        //return redirect()->route('cliente.index')->with('message','ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Client::find($id);
        //return $data;
        return view('cliente.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //metodo de actualización de registro
        $cliente = Client::find($id);

        $cliente-> dni = $request->input("dni");
        $cliente-> apellido = $request->input("apellido");
        $cliente-> nombre = $request->input("nombre");
        $cliente-> email = $request->input("email");
        $cliente-> telefono = $request->input("telefono");
        $cliente-> direccion = $request->input("direccion");
        $cliente-> estado = $request->input("estado");

        $cliente -> save();

        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //para eliminar un registro de la base de datos
        $cliente = Client::find($id);
        $cliente -> delete();

        return back();
    }
}
