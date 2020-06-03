<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;

class EmpresasController extends Controller
{    
    function index()
    {
        $empresas = Empresa::all();
        return view('empresas.index', compact('empresas'));
    } 

    function create()
    {
        return view('empresas.crear');
    }

    function store(Request $request)
    {
        $empresa = new Empresa;
        $empresa->nombre = $request->nombre;
        $empresa->nit = $request->nit;
        $empresa->telefono = $request->telefono;
        $empresa->direccion = $request->direccion;
        $empresa->correo = $request->correo;
        $empresa->save();

        return redirect()->route('empresas.index')->with('success','Empresa creada satisfactoriamente');     
    }

    function edit($id)
    {
        $empresa = Empresa::find($id);
        return view('empresas.editar', compact('empresa'));
    }

    function update($id, Request $request)
    {
        $empresa = Empresa::find($id);
        $empresa->nombre = $request->nombre;
        $empresa->nit = $request->nit;
        $empresa->telefono = $request->telefono;
        $empresa->direccion = $request->direccion;
        $empresa->correo = $request->correo;
        $empresa->save();
        return redirect()->route('empresas.index')->with('success','Empresa actualizada satisfactoriamente');     
    }

    function destroy($id)
    {
        DB::transaction(function () use ($id){
            User::where('empresa_id', $id)->delete();
            Empresa::find($id)->delete();
        });
        return redirect()->route('empresas.index')->with('success','Empresa y sus usuarios eliminados satisfactoriamente');     
    }
}